<?php
require_once 'pdo.php';

$records = $pdo->query('SELECT * FROM times')->fetchAll();

foreach ($records as $record) {
    $dt = new DateTime($record['CHECJTIME']);
    $date = $dt->format('m/d/Y');
    $time = $dt->format('H:i:s');

    if ($record['CHECKTYPE'] == 'I') {
        $stmt = $pdo->prepare("UPDATE times2 SET time_in=:time WHERE staff_ID=:staff_ID AND date=:date;");
    } else {
        $stmt = $pdo->prepare("UPDATE times2 SET time_out=:time WHERE staff_ID=:staff_ID AND date=:date;");
    }

    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':staff_ID', $staff_ID);
    $stmt->bindParam(':date', $date);
    $stmt->execute();


}