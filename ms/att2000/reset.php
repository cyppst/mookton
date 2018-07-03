<?php
require_once('config/database.php');


try {
    $sql_conn->execute('CREATE TABLE USERINFO  AUTO_INCREMENT = 1');
    $mysql_conn->execute("ALTER TABLE userinfo AUTO_INCREMENT = 1 ");

} catch (PDOException $e) {
    echo $e;
}