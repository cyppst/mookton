
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620"> 
                  <div id="aaa" class="tab-pane ">
                  <h1>ประวัติการลา</h1><br><br>
                      <div class="row">
                  
                      <form role="form" method="post">
                      <div class="form-group">
                      <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                        <div class="col-lg-2">
                        <input type="date" class="form-control" id="ffni6" name="start6" minlength="13" maxlength="13">
                      </div>
                      </div>
                        <div class="form-group">
                        <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                        <div class="col-lg-2">
                          <input type="date" class="form-control" id="ffin6" name="end6" minlength="13" maxlength="13">
                      </div>
                      </div>
                      <button type="submit" class="btn btn-primary">ค้นหา</button>
                      </form>
                          <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#addleave" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                                 
                          
                        </div>
                      </div>
                  <table class="table table-bordered" id="example101">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ประเภทการลา</th>
					  <th>เรื่องที่ลา</th>
                      <th>ตั้งแต่วันที่</th>				
                      <th>ถึงวันที่</th>
                      <th>ผู้อนุมัติ</th>
                      <th>เอกสาร</th>
                      
                      <th>เมนู</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_GET['IDedit'];
                  if(isset($_POST['start6'])){
                    $start6 = $_POST['start6'];
                    $end6 = $_POST['end6'];                    
                    if(!empty($end6)){          
                     $sql = "SELECT * FROM `historyleave` WHERE `leave_date` >= '$start6' AND `staff_ID` = '$id' AND `leave_dateend` <= '$end6' ";
                      }else{
						  $sql = "SELECT * FROM `historyleave` WHERE `leave_date` >= '$start6' AND `staff_ID` = '$id'";                       
                      }
                  } else {
                    $sql = "SELECT * FROM historyleave where staff_ID='$id'";

                  }
                  
                          $result = $db_connection->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>
                    <tr>
                      <td><?php $i++; echo $i; ?></td>
                      <td><?php echo $row["leave_type"]; ?></td>
					  <td><?php echo $row["leave_sub"]; ?></td>
                      <td><?php echo $row["leave_date"]; ?></td>					 
                      <td><?php echo $row["leave_dateend"]; ?></td>
                      <td><?php echo $row["leave_ok"]; ?></td>
                      <td><button class="btn" onclick="window.location.href='uploads/<?php echo $row["leave_doc"];?>'"><i class="icon_documents_alt"></i></button></button></td>
                      <?php if(isset($_SESSION['staff_user'])&&($_SESSION['staff_lv'])>=2){
                    ?>
                     <th>
                     <div class="btn-group">
                    <!--ปุ่มแก้ไข-->
                     <a  class="btn btn-success leave_edit"
                     data-idleave="<?php echo $row["leave_ID"]; ?>"
                     data-leavetype="<?php echo $row["leave_type"]; ?>"
					  data-leavesub="<?php echo $row["leave_sub"]; ?>"
                     data-leavedate="<?php echo $row["leave_date"]; ?>"					 
                     data-leavedateend="<?php echo $row["leave_dateend"]; ?>"
                     data-leaveok="<?php echo $row["leave_ok"]; ?>"
                     data-leavefile="<?php echo $row["leave_doc"]; ?>"
                     data-toggle="modal"><i class="icon_pencil-edit_alt"></i></a>
                     <!--end btn edit-->
                     <!--ปุ่มลบ-->
                     <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2.php?Delleave=<?php echo $row["leave_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
                      </div>
                     </th>
                     <?php } ?>

                      <?php  }  ?>
                       
                      <?php } ?>
                    </tr>
                  </tbody>c
                </table>
                    
                  </div>
                  <!-- profile -->
                  
                  <!-- edit-profile -->
                
 <!--โมเดลเพิ่ม-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addleave" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการลา</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                          <div class="form-group">
                          <label for="leavetype">ประเภทการลา</label>
                          <select class="form-control m-bot15" id="addleavetype" name="addleavetype">
                                            <option value="ลาพักผ่อน">ลาพักผ่อน</option>
                                            <option value="ลาป่วย/ลาคลอด">ลาป่วย/ลาคลอด</option>
                                        </select>
                          </div>
						  <div class="form-group">
                            <label for="leaveok">เรื่องที่ลา</label>
                            <input type="text" class="form-control" id="addleavesub" name="addleavesub" >
                          </div>
                          <div class="form-group">
                            <label for="leavedate">ตั้งแต่วันที่</label>
                            <input type="date" class="form-control" id="addleavedate" name="addleavedate" >
                          </div>
                          <div class="form-group">
                            <label for="leavedateend">ถึงวันที่</label>
                            <input type="date" class="form-control" id="addleavedateend" name="addleavedateend" >
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
                            <label for="leavefile">เอกสาร</label>
                            <input type="file" name="addleavefile" id="addleavefile">
                          </div>
                          <input type="hidden" name="leaveMethod" id="leaveMethod" value="1">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
    <!--โมเดลแก้ไข-->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="leave_edit" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">แก้ไขข้อมูลประวัติการลา</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                        <input type="hidden" name="idleave" id="idleave" value="">
                        <div class="form-group">
                        <label for="leavetype">ประเภทการลา</label>
                        <select class="form-control m-bot15" id="leavetype" name="leavetype">
                                          <option value="ลาพักผ่อน">ลาพักผ่อน</option>
                                          <option value="ลาป่วย/ลาคลอด">ลาป่วย/ลาคลอด</option>
                                      </select>
                        </div>
						<div class="form-group">
                          <label for="leaveok">เรื่องที่ลา</label>
                          <input type="text" class="form-control" id="leavesub" name="leavesub" >
                        </div>
                        <div class="form-group">
                          <label for="leavedate">ตั้งแต่วันที่</label>
                          <input type="date" class="form-control" id="leavedate" name="leavedate" >
                        </div>
                        <div class="form-group">
                          <label for="leavedateend">ถึงวันที่</label>
                          <input type="date" class="form-control" id="leavedateend" name="leavedateend" >
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
                          <label for="leavefile">เอกสาร</label>
                          <input type="file" name="leavefile2" id="leavefile2">
                            <input type="text" class="leavefile" id="leavefile" name="leavefile">
                          
                          </div>
                          
                        <input type="hidden" name="leaveMethod2" id="leaveMethod2" value="2">

                         
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
  
                
<!-- javascripts -->

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
 


  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  



  
  <script>
  
// get data from edit btn

    $('.leave_edit').click(function(){
        var idleave = $(this).attr('data-idleave');
        var leavetype = $(this).attr('data-leavetype');
		var leavesub = $(this).attr('data-leavesub');
        var leavedate = $(this).attr('data-leavedate');
        var leavedateend = $(this).attr('data-leavedateend');
        var leaveok = $(this).attr('data-leaveok');
        var leavefile = $(this).attr('data-leavefile');
      

        $('#idleave').val(idleave);
        $('#leavetype').val(leavetype);
		$('#leavesub').val(leavesub);
        $('#leavedate').val(leavedate);
        $('#leavedateend').val(leavedateend);
        $('#leaveok').val(leaveok);
        $('#leavefile').val(leavefile);
        
        $('#leave_edit').modal('show');

    });
</script>
 
 <script>
        $(document).ready(function () {
            $('#example101').DataTable({
                "order": [[0, "asc"]],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'  , 'colvis'
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
    