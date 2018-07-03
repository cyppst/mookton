<!--SELECT * FROM `times` WHERE `CHECKTIME` BETWEEN '2018-06-01 00:00:00.000000' AND '2018-06-19 00:00:00.000000'-->

<form role="form" method="post">
                      <div class="form-group">
                      <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                        <div class="col-lg-2">
                        <input type="date" class="form-control" id="ffni" name="start1" minlength="13" maxlength="13">
                      </div>
                      </div>
                        <div class="form-group">
                        <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                        <div class="col-lg-2">
                          <input type="date" class="form-control" id="ffin" name="end1" minlength="13" maxlength="13">
                      </div>
                      </div>
                      <button type="submit" class="btn btn-primary">ค้นหา</button>
                      </form>
<?php
include("dbconfig.php");



if(isset($_POST['start1'])){
  $start1 = $_POST['start1'];
  $end1 = $_POST['end1'];       
  echo   $start1;
  echo  $end1;
  if(isset($end1)){          
  $sql = "SELECT * FROM `job` WHERE `job_year` >= '$start1' AND `staff_ID` = 1";
  }else{
    $sql = "SELECT * FROM `job` WHERE `job_year` >= '$start1' AND `staff_ID` = 1 AND `job_year2` <= '$end1' ";
  }
  echo $sql;
} else {
  $sql = "SELECT * FROM job where staff_ID='1'";

}

        $result = $db_connection->query($sql);
        if (@$result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
  <tr>
  
    <td><?php echo $row["job_position"]; ?></td>
    <td><?php echo $row["job_department"]; ?></td>
    <td><?php echo $row["job_year"]; ?></td>
    <td><?php echo $row["job_year2"]; ?></td>
        <?php }}?>
               