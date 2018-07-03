<?php
require_once('config/database.php');
$mysql_conn->table('userinfo')->remove();
$mysql_conn->table('times')->remove();

$records = $sql_conn->table('CHECKINOUT')->findAll();

foreach ($records as $record) {
    $mysql_conn->table('times')->save([
        'USERID' => $record['USERID'],
        'CHECKTIME' => $record['CHECKTIME'],
        'CHECKTYPE' => $record['CHECKTYPE']
    ]);
}
$records = $sql_conn->table('USERINFO')->findAll();
foreach ($records as $record) {
    $mysql_conn->table('userinfo')->save([
        'USERID' => $record['USERID'],
        'NAME' => $record['NAME'],
    ]);
}


header("location:javascript://history.go(-1)");
exit;