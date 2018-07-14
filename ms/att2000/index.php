<?php
require_once('config/database.php');
require_once('config/pdo.php');

$mysql_conn->table('userinfo')->remove();
$mysql_conn->table('times2')->remove();

$records = $sql_conn->table('CHECKINOUT')->findAll();

foreach ($records as $record) {
    $dt = new DateTime($record['CHECJTIME']);
    $date = $dt->format('m/d/Y');
    $time = $dt->format('H:i:s');

    if ($record['CHECKTYPE'] == 'I') {
        $stmt = $pdo->prepare("UPDATE times2 SET time_in=:time WHERE USERID=:USERID AND date=:date;");
    } else {
        $stmt = $pdo->prepare("UPDATE times2 SET time_out=:time WHERE USERID=:USERID AND date=:date;");
    }
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':USERID', $record['USERID']);
    $stmt->bindParam(':date', $date);
    $stmt->execute();

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