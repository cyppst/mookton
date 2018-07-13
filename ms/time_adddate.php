<?php
/**
 * Created by PhpStorm.
 * User: ton
 * Date: 7/12/2018
 * Time: 9:49 PM
 */
require 'dbconfig.php';
$currentDate = date("Y-m-d");
/*$sql = "SELECT * FROM times2 WHERE date WHERE date = ".$currentDate." LIMIT 1";
if(mysqli_num_rows($db_connection->query($sql)) > 0) {
}*/



$sql = "SELECT staff_ID,USERID FROM staff";
$result = $db_connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $sql = "INSERT INTO times2 (date, staff_ID, USERID) VALUES ('" . $currentDate . "','" . $row['staff_ID'] . "','" . $row['USERID'] . "')";
        $db_connection->query($sql);

    }
}

