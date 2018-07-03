<?php
require_once('config/database.php');
$records = $mysql_conn->table('staff')->join('userinfo', 'USERID', 'USERID')->findAll();
$data = array();
var_dump($data);
?>

<table class="tabl table-hover">
    <thead>
    <tr>
        <th>NAME</th>
        <th>USERID</th>
        <th>NAME</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($records as $record) { ?>
        <tr>
            <td><?= $record['staff_name'] ?></td>
            <td><?= $record['USERID'] ?></td>
            <td><?= $record['NAME'] ?></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>