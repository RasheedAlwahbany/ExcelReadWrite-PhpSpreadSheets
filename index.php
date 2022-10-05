<?php

require 'vendor/autoload.php';
require_once 'Pages/Header.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome</title>
</head>

<body class="container">
    <div class="navbar-light bg-light" role="navigation">
        <div class="container-fluid"><br/><br/><br/><br/>
            <h2>Welcome to Export/Import Data To/From Excel files From/To Mysql Database</h2>
            <p>
                Created using:
            <pre>
            Bootstrap 5.
            use PhpOffice\PhpSpreadsheet\Spreadsheet.
            use PhpOffice\PhpSpreadsheet\Writer\Xlsx.
            Composer.
        </pre>
            </p>
        </div>
    </div>

</body>

</html>

<?php include("Pages/footer.php");?>