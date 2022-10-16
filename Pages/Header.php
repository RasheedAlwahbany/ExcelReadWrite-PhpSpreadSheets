<?php
// Eng.Rasheed Al-Wahbany &copy;2022
session_start();
error_reporting(E_ALL);
try{
if(!empty($_GET['logout'])){
    session_unset();
    echo "<script>document.location='http://localhost:8000/';</script>";
}
$columns = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
function getCellName($i)
{
    $col = "";
    if ($i <= 25)
        $col = "";
    else if ($i > 25) {
        $col = 'A';
        $i = 0;
    } else if ($i > 51) {
        $col = 'B';
        $i = 0;
    } else if ($i > 77) {
        $col = 'C';
        $i = 0;
    } else if ($i > 103) {
        $col = 'D';
        $i = 0;
    } else {
        $col = 'E';
        $i = 0;
    }

    return $col;
}
if (!strpos($_SERVER['REQUEST_URI'], "export") && !strpos($_SERVER['REQUEST_URI'], "import"))
    $dir = '';
else
    $dir = "../";
?>
<html>

<head>
    <title>Excel Import/Export Data</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $dir; ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $dir; ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $dir; ?>vendor/twbs/bootstrap/dist/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo $dir; ?>vendor/twbs/bootstrap/dist/css/phpspreadsheet.css" />
    <script src="<?php echo $dir; ?>vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo $dir; ?>vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

</head>

<div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="https://github.com/RasheedAlwahbany">Eng.Rasheed Al-Wahbany &copy;2022</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <ul class="nav nav-tabs collapse navbar-collapse">
                <li class="nav-item <?php if (!strpos($_SERVER['REQUEST_URI'], "export") && !strpos($_SERVER['REQUEST_URI'], "import")) echo "active"; ?>">
                    <a class="nav-link <?php if (!strpos($_SERVER['REQUEST_URI'], "export") && !strpos($_SERVER['REQUEST_URI'], "import")) echo "active"; ?>" aria-current="page" href="/">Home</a>
                </li>
                <?php if(!empty($_SESSION['USERINFO'])){ ?>
                <li class="nav-item <?php if (strpos($_SERVER['REQUEST_URI'], "export")) echo "active"; ?>">
                    <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "export")) echo "active"; ?>" href="/Pages/export_data.php">Export Data To Excel</a>
                </li>
                <li class="nav-item  <?php if (strpos($_SERVER['REQUEST_URI'], "import")) echo "active"; ?>">
                    <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "import")) echo "active"; ?>" href="/Pages/import_data.php">Import Data From Excel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#page-logs">Operation logs</a>
                </li>
                <li class="nav-item justify-content-left">
                    <a class="nav-link" href="http://localhost:8000/?logout=1" onclick="">Log Out</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>


    <?php
function o_check($p, $p_hashed)
{
    return password_verify($p, $p_hashed);
}
    $connection = new PDO("mysql:host=localhost;dbname=maintenances_supervisor_dbms;port=3306;charset=utf8", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    if (!is_dir('../DataBackup'))
        mkdir("../DataBackup");

 // Eng.Rasheed Al-Wahbany &copy;2022

}catch(Exception $ex){
    $connection=false;
}
