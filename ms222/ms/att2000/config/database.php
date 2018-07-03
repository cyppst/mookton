<?php

require('C:\laragon\www\project\ms\att2000\vendor\autoload.php');

use PicoDb\Database;

$sql_conn = new Database([
    'driver' => 'mssql',
    'hostname' => 'DESKTOP-3TGR10C\SQLSERVER',
    'username' => 'sa',
    'password' => '123456',
    'database' => 'project',
]);

$mysql_conn = new Database([
    'driver' => 'mysql',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '123456',
    'database' => 'project'
]);