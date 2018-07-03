<div id="profile" class="tab-pane">
<div class="col-lg-offset-2 col-lg-9">
              <table class="table table-bordered" id="example">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ตำแหน่ง</th>
                      <th>สังกัดหน่วยงาน</th>
                      <th>ระยะเวลา</th>
                      
                      <th>เมนู</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_GET['IDedit'];
                  $sql = "SELECT * FROM job where staff_ID='$id'";
                          $result = $db_connection->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>
                    <tr>
                      <td><?php $i++; echo $i; ?></td>
                      <td><?php echo $row["job_position"]; ?></td>
                      <td><?php echo $row["job_department"]; ?></td>
                      <td><?php echo $row["job_year"]; ?></td>
                      <?php if(isset($_SESSION['staff_user'])&&($_SESSION['staff_lv'])>=2){
                    ?>
                     <th>
                     <div class="btn-group">
                    <!--ปุ่มแก้ไข-->
                     <a  class="btn btn-success job_edit"
                     data-id="<?php echo $row["job_ID"]; ?>"
                     data-position="<?php echo $row["job_position"]; ?>"
                     data-department="<?php echo $row["job_department"]; ?>"
                     data-year="<?php echo $row["job_year"]; ?>"
                     data-toggle="modal"><i class="icon_pencil-edit_alt"></i></a>
                     <!--end btn edit-->
                     <!--ปุ่มลบ-->
                     <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app.php?Deljob=<?php echo $row["job_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
                      </div>
                     </th>
                     <?php } ?>

                      <?php  } }else{ ?>
                        <div class="alert alert-danger">
                        <strong>อุปส์ ว่างเปล่า !</strong> กรุณาเพิ่มข้อมูล
                      </div>
                      <?php } ?>
                    </tr>
                  </tbody>
                </table></div>
                
                   
                  </div>