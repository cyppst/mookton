        
 
 <meta http-equiv="Content-Type" content="text/html; charset=TIS-620"> 
                  <div id="train" class="tab-pane ">
                  <h1>ประวัติการฝึกอบรม ดูงาน</h1><br><br>
                      <div class="row">
                  
                      <form role="form" method="post">
                          <div class="form-group">
                          <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                            <div class="col-lg-2">
                            <input type="date" class="form-control" id="ffni4" name="start4" minlength="13" maxlength="13">
                          </div>
                          </div>
                            <div class="form-group">
                            <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                            <div class="col-lg-2">
                              <input type="date" class="form-control" id="ffin4" name="end4" minlength="13" maxlength="13">
                          </div>
                          </div>
                          <button type="submit" class="btn btn-primary">ค้นหา</button>
                          </form>
                          <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#trainadd" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                          
                        </div>
                      </div>
                  <table class="table table-bordered" id="example46">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>หลักสูตร</th>
                      <th>หน่วยงานผู้จัด</th>
                      <th>สถานที่</th>
					  <th>ผู้อนุมัติ</th>
                      <th>ตั้งแต่วันที่</th>
                      <th>ถึงวันที่</th>
                      <th>เมนู</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_GET['IDedit'];
                  if(isset($_POST['start4'])){
                    $start4 = $_POST['start4'];
                    $end4 = $_POST['end4'];   
                    if(!empty($end4)){    
						$sql = "SELECT * FROM `train` WHERE `train_year` >= '$start4' AND `staff_ID` = '$id' AND `train_year2` <= '$end4' ";					
                      
                      }else{
                        $sql = "SELECT * FROM `train` WHERE `train_year` >= '$start4' AND `staff_ID` = '$id'";
                      }
                  } else {
                    $sql = "SELECT * FROM train where staff_ID='$id'";

                  }
                          $result = $db_connection->query($sql);
                          if (@$result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>
                    <tr>
                      <td><?php $i++; echo $i; ?></td>
                      <td><?php echo $row["train_sub"]; ?></td>
                      <td><?php echo $row["train_department"]; ?></td>
                      <td><?php echo $row["train_location"]; ?></td>
					  <td><?php echo $row["train_approvers"]; ?></td>
                      <td><?php echo $row["train_year"]; ?></td>
                      <td><?php echo $row["train_year2"]; ?></td>
                      <?php if(isset($_SESSION['staff_user'])&&($_SESSION['staff_lv'])>=2){
                    ?>
                     <th>
                     <div class="btn-group">
                    <!--ปุ่มแก้ไข-->
                     <a  class="btn btn-success train_edit"
                     data-idtrain="<?php echo $row["train_ID"]; ?>"
                     data-sub="<?php echo $row["train_sub"]; ?>"
                     data-departmenttrain="<?php echo $row["train_department"]; ?>"
                     data-location="<?php echo $row["train_location"]; ?>"
                     data-yeartrain="<?php echo $row["train_year"]; ?>"
                     data-yeartrain2="<?php echo $row["train_year2"]; ?>"
                     data-toggle="modal"><i class="icon_pencil-edit_alt"></i></a>
                     <!--end btn edit-->
                     <!--ปุ่มลบ-->
                     <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2.php?Deltrain=<?php echo $row["train_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
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
                </table>
                    
                  </div>
                  <!-- profile -->
                  
                  <!-- edit-profile -->
                
 <!--โมเดลเพิ่ม-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="trainadd" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการฝึกอบรม</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="sub">หลักสูตร</label>
                            <input type="text" class="form-control" id="addsub" name="addsub" >
                          </div>
                          <div class="form-group">
                            <label for="departmenttrain">หน่วยงานผู้จัด</label>
                            <input type="text" class="form-control" id="adddepartmenttrain" name="adddepartmenttrain" >
                          </div>
                          <div class="form-group">
                            <label for="location">สถานที่</label>
                            <input type="text" class="form-control" id="addlocation" name="addlocation" >
                          </div>
						  <div class="form-group">
                            <label for="location">ผู้อนุมัติ</label>
                           
					
       
        <select  class="form-control" name="addapprovers" id="addapprovers"  data-validation="required">
        <option value=""disabled>เลือกผู้อนุมัติ</option>
        <?php
		require("dbconfig.php");
        $result1 = mysqli_query($db_connection,"SELECT * FROM approvers ");
        while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
    ?>
        <option value="<?php echo $row['appro_name'];?>"><?php echo $row['appro_name'];?></option>
    <?php
        }
    ?>
        </select>
 
   
                </div>
                          <div class="form-group">
                            <label for="yeartrain">ตั้งแต่วันที่</label>
                            <input type="date" class="form-control" id="addyeartrain" name="addyeartrain" placeholder="ระยะเวลา">
                          </div>
                          <div class="form-group">
                            <label for="yeartrain2">ถึงวันที่</label>
                            <input type="date" class="form-control" id="addyeartrain2" name="addyeartrain2" placeholder="ระยะเวลา">
                          </div>
                          <input type="hidden" name="trainMethod" id="trainMethod" value="1">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
    <!--โมเดลแก้ไข-->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="trainedit" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">แก้ไขข้อมูลประวัติการฝึกอบรม</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                        <input type="hidden" name="idtrain" id="idtrain" value="">
                        <div class="form-group">
                        <label for="sub">หลักสูตร</label>
                        <input type="text" class="form-control" id="sub" name="sub" >
                      </div>
                      <div class="form-group">
                        <label for="departmenttrain">หน่วยงานผู้จัด</label>
                        <input type="text" class="form-control" id="departmenttrain" name="departmenttrain" >
                      </div>
                      <div class="form-group">
                        <label for="location">สถานที่</label>
                        <input type="text" class="form-control" id="location" name="location" >
                      </div>
					   <div class="form-group">
                            <label for="location">ผู้อนุมัติ</label>
					  <select  class="form-control" name="addapprovers" id="addapprovers"  data-validation="required">
        <option value=""disabled>เลือกผู้อนุมัติ</option>
        <?php
		require("dbconfig.php");
        $result1 = mysqli_query($db_connection,"SELECT * FROM approvers ");
        while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
    ?>
        <option value="<?php echo $row['appro_name'];?>"><?php echo $row['appro_name'];?></option>
    <?php
        }
    ?>
        </select>
                      <div class="form-group">
                        <label for="yeartrain">ตั้งแต่วันที่</label>
                        <input type="date" class="form-control" id="yeartrain" name="yeartrain" placeholder="ระยะเวลา">
                      </div>
                      <div class="form-group">
                        <label for="yeartrain2">ถึงวันที่</label>
                        <input type="date" class="form-control" id="yeartrain2" name="yeartrain2" placeholder="ระยะเวลา">
                      </div>
                        <input type="hidden" name="trainMethod2" id="trainMethod2" value="2">

                         
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
  
                
<!-- javascripts -->
<script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>
   <!-- modal sec-->
  <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script> 

  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  
  <script>

// get data from edit btn

    $('.train_edit').click(function(){
        var idtrain = $(this).attr('data-idtrain');
        var sub = $(this).attr('data-sub');
        var departmenttrain = $(this).attr('data-departmenttrain');
        var location = $(this).attr('data-location');
        var yeartrain = $(this).attr('data-yeartrain');
        var yeartrain2 = $(this).attr('data-yeartrain2');

        $('#idtrain').val(idtrain);
        $('#sub').val(sub);
        $('#departmenttrain').val(departmenttrain);
        $('#location').val(location);
        $('#yeartrain').val(yeartrain);
        $('#yeartrain2').val(yeartrain2);
        $('#trainedit').modal('show');

    });
</script>

<script>
        $(document).ready(function () {
            $('#example46').DataTable({
                "order": [[0, "asc"]],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print' , 'colvis'
                ],
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "ทั้งหมด"]],
                "oLanguage": {
                    "sSearch": "คำค้นหา: ",
                    "sZeroRecords": "ไม่มีข้อมูลที่คุณต้องการ",
                    "sLengthMenu": 'Display <select>' +
                    '<option value="5">5</option>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">ทั้งหมด</option>' +
                    '</select> records',
                    "sLengthMenu": "แสดง _MENU_ แถวในหน้า&nbsp;&nbsp;&nbsp;ออกรายงานเป็น:&nbsp;&nbsp;&nbsp;",
                    "oPaginate": {
                        "sNext": "หน้าถัดไป",
                        "sPrevious": "ก่อนหน้านี้"
                    },
                    "sInfo": "มีข้อมูลทั้งหมด _TOTAL_ ข้อมูล แสดงข้อมูลตั้งแต่ (_START_ จนถึง _END_)"
                },
                buttons: [
                    { extend: 'copy', text: 'คัดลอกเป็นข้อความ' },
                    { extend: 'excel', text: 'Excel File' },
                    { extend: 'pdf', text: 'PDF File' },
                    { extend: 'print', text: 'สั่งพิมพ์ข้อมูลในตาราง',exportOptions: { columns: ':visible'} },
                    { extend: 'colvis', text: 'เลือกคอลัมน์' },
                ]
            });
        });
    </script>
    