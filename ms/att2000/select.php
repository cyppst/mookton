<?php
require_once('config/database.php');
$records = $sql_conn->table('USERINFO')->findAll();
?>
<div class="form-group">
    <label for="" class="col-sm-2 control-label"></label>
    <select class="form-control" id="">
        <?php foreach ($records as $record) { ?>
            <option value="<?= $record['USERID'] ?>"><?= $record['NAME'] . '( ' . $record['USERID'] . ' )' ?></option>
        <?php } ?>
    </select>
</div>