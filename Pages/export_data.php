<?php

require_once 'Header.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function ExportData($table)
{
    global $connection;
    global $columns;
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $writer = new Xlsx($spreadsheet);
    if ($connection) {
        $query = $connection->prepare("SELECT * FROM " . $table);
        if ($query->execute()) {
            $is_header = true;
            $row_index = 1;
            while ($row = $query->fetchObject()) {
                $sheet->insertNewRowBefore($row_index);
                $i = 0;
                foreach ($row as $key => $value) {
                    if (!empty(getCellName($i)))
                        $i = 0;
                    $col = getCellName($i) . $columns[$i];
                    if ($is_header) {
                        $sheet->setCellValue($col . '' . $row_index, $key);
                    } else {
                        $sheet->setCellValue($col . '' . $row_index, $value);
                    }
                    $i = $i + 1;
                }
                $is_header = false;
                $row_index = $row_index + 1;
            }
            if (!empty($sheet->getCoordinates())) {
                if (is_file('../DataBackup/' . $table . '.xlsx')) {
                    $i = 0;
                    while (is_file('../DataBackup/' . $table . $i . '.xlsx')) {
                        $i = $i + 1;
                    }
                    $writer->save('../DataBackup/' . $table . $i . '.xlsx');
                    print('<br/> The ( DataBackup/' . $table . $i . '.xlsx ) file created succesfully.<br/>');
                } else
                    $writer->save('../DataBackup/' . $table . '.xlsx');
                print('<br/> The ( DataBackup/' . $table . '.xlsx ) file created succesfully.<br/>');
            } else {

                echo "<br/><br/> Oopsy error.<br/> This is ( $table ) table is blank. <br/><br/>";
                return false;
            }
        }
    }
    return true;
}
?>

<div class="container ">
    <div class="navbar-light bg-light" role="navigation">
        <div class="container-fluid">
            <h2>Export Data </h2><br />
        </div>
    </div>
    <div class="navbar-light bg-light" role="navigation">
        <div class="container-fluid">
            <ul class="nav nav-tabs">

                <li class="nav-item active">
                    <div class="dropdown">
                        <button class="btn btn-secondary" onclick="checkDropDown();" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Export custom database backup
                        </button>
                        <ul class="list-group" id="dropdownMenuButtonMenu">
                            <?php
                            if ($connection) {
                                $query = $connection->prepare(" SHOW TABLES FROM `maintenances_supervisor_dbms` ");
                                if ($query->execute()) {
                                    $i = 1;
                                    while ($row = $query->fetchObject()) { ?>
                                        <li class="list-group-item <?php if (str_contains($_SERVER['REQUEST_URI'], '=' . $row->Tables_in_maintenances_supervisor_dbms . '')) echo "active"; ?>"><a class="dropdown-item  <?php if (str_contains($_SERVER['REQUEST_URI'], '=' . $row->Tables_in_maintenances_supervisor_dbms . '')) echo "active"; ?>" href="?Controller=<?php echo $row->Tables_in_maintenances_supervisor_dbms; ?>">
                                                <?php echo " Table ( " . $i . " ) => " . $row->Tables_in_maintenances_supervisor_dbms; ?>
                                            </a></li>
                            <?php $i = $i + 1;
                                    }
                                }
                            } ?>
                        </ul>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="?Controller=All">Export all database tables backup</a>
                </li>
            </ul>
        </div>
        <div class="container " id="page-logs">
            <h1>
                Operation logs:
            </h1>

            <?php
            if (!empty($_GET['Controller'])) {
                $error = false;
                if ($_GET['Controller'] != "All") {
                    $error = ExportData($_GET['Controller']);
                } else {
                    $query = $connection->prepare("SHOW TABLES FROM `maintenances_supervisor_dbms` ");
                    if ($query->execute()) {
                        while ($row = $query->fetchObject()) {
                            // if(!str_contains($row->Tables_in_maintenances_supervisor_dbms, "view"))
                            $error = ExportData($row->Tables_in_maintenances_supervisor_dbms);
                        }
                    }
                }
                if (!$error)
                    echo "<script>document.location='http://localhost:8000/Pages/export_data.php?'</script>";
            }

            ?>
        </div>
    </div>
</div>

<?php include("footer.php");?>