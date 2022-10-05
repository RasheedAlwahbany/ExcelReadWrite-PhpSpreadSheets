<?php

// use PhpOffice\PhpSpreadsheet\Helper\Sample;

error_reporting(E_ALL);

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

?>
<html>

<head>
    <title>Excel Import/Export Data</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/bootstrap/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/bootstrap/css/phpspreadsheet.css" />
    <script src="/bootstrap/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>

</head>

<div class="container">
    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">PHPSpreadsheet</a>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pages/export_data.php">Export Data To Excel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pages/import_data.php">Import Data From Excel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Info</a>
                </li>
            </ul>
        </div>
    </div>


    <?php
    
    $connection = new pdo("mysql:host=localhost;dbname=maintenances_supervisor_dbms;port=3306;charset=utf8", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    if(!is_dir('../DataBackup'))
        mkdir("../DataBackup");
