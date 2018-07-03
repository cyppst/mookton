
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620"> 
                  <div id="salary" class="tab-pane ">
                  <h1>ประวัติการเลื่อนขั้นเงินเดือน</h1><br><br>
                      <div class="row">
                      
                      <form role="form" method="post">
                          <div class="form-group">
                          <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                            <div class="col-lg-2">
                            <input type="date" class="form-control" id="ffni2" name="start2" minlength="13" maxlength="13">
                          </div>
                          </div>
                            <div class="form-group">
                            <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                            <div class="col-lg-2">
                              <input type="date" class="form-control" id="ffin2" name="end2" minlength="13" maxlength="13">
                          </div>
                          </div>
                          <button type="submit" class="btn btn-primary">ค้นหา</button>
                          </form>
                          <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#addsalary" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                             
                          
                        </div>
                      </div>
                  <table class="table table-bordered" id="example2">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>วัน/เดือน/ปี</th>
                      <th>ตำแหน่ง</th>
                      <th>ระดับ</th>
                      <th>ขั้น</th>
                      <th>คำสั่ง</th>
                      <th>เอกสาร</th>
                      
                      <th>เมนู</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_GET['IDedit'];
                  if(isset($_POST['start2'])){
                    $start2 = $_POST['start2'];
                    $end2 = $_POST['end2'];   
                    if(!empty($end2)){          
                           $sql = "SELECT * FROM `salary` WHERE `salary_date` >= '$start2' AND `staff_ID` = '$id' AND `salary_date` <= '$end2' ";
                      }else{
						   $sql = "SELECT * FROM `salary` WHERE `salary_date` >= '$start2' AND `staff_ID` = '$id'";                    
                      }
                  } else {
                    $sql = "SELECT * FROM salary where staff_ID='$id'";

                  }
                  
                  
                  $result = $db_connection->query($sql);
                  if (@$result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                          ?>
                    <tr>
                      <td><?php $i++; echo $i; ?></td>
                      <td><?php echo $row["salary_date"]; ?></td>
                      <td><?php echo $row["salary_position"]; ?></td>
                      <td><?php echo $row["salary_lv"]; ?></td>
                      <td><?php echo $row["salary_step"]; ?></td>
                      <td><?php echo $row["salary_command"]; ?></td>
                      <td><button class='btn' onclick="window.location.href='uploads/<?php echo $row["salary_doc"];?>'"><i class="icon_documents_alt"></i></button></td>
                      <?php if(isset($_SESSION['staff_user'])&&($_SESSION['staff_lv'])>=2){
                    ?>
                     <th>
                     <div class="btn-group">
                    <!--ปุ่มแก้ไข-->
                     <a  class="btn btn-success salary_edit"
                     data-idsalary="<?php echo $row["salary_ID"]; ?>"
                     data-datesalary="<?php echo $row["salary_date"]; ?>"
                     data-positionsalary="<?php echo $row["salary_position"]; ?>"
                     data-lvsalary="<?php echo $row["salary_lv"]; ?>"
                     data-stepsalary="<?php echo $row["salary_step"]; ?>"
                     data-comsalary="<?php echo $row["salary_command"]; ?>"
                     data-filesalary="<?php echo $row["salary_doc"]; ?>"
                     data-toggle="modal">
                    <i class="icon_pencil-edit_alt"></i></a>
                     <!--end btn edit-->
                     <!--ปุ่มลบ-->
                     <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2.php?Delsalary=<?php echo $row["salary_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
                      </div>
                     </th>
                     <?php } ?>
                     
                                           <?php  } ?>
                                            
                                           <?php } ?>
                    </tr>
                  </tbody>
                </table>
                    
                  </div>
                  <!-- profile -->
                  
                  <!-- edit-profile -->
                
 <!--โมเดลเพิ่ม-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addsalary" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการเลื่อนขั้นและอัตราเงินเดือน</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="adddatesalary">วัน/เดือน/ปี</label>
                            <input type="date" class="form-control" id="adddatesalary" name="adddatesalary" >
                          </div>
                          <div class="form-group">
                            <label for="addpositionsalary">ตำแหน่ง</label>
                            <input type="text" class="form-control" id="addpositionsalary" name="addpositionsalary" >
                          </div>
                          <div class="form-group">
                            <label for="addlvsalary">ระดับ</label>
                            <input type="text" class="form-control" id="addlvsalary" name="addlvsalary" >
                          </div>
                          <div class="form-group">
                            <label for="addstepsalary">ขั้น</label>
                            <input type="text" class="form-control" id="addstepsalary" name="addstepsalary" >
                          </div>
                          <div class="form-group">
                            <label for="addcomsalary">คำสั่ง</label>
                            <input type="text" class="form-control" id="addcomsalary" name="addcomsalary" >
                          </div>
                          <div class="form-group">
                            <label for="addfilesalary">File input</label>
                            <input type="file" name="addfilesalary" id="addfilesalary">
                          </div>
                          <input type="hidden" name="salaryMethod" id="salaryMethod" value="1">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
    <!--โมเดลแก้ไข-->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="salary_edit" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">แก้ไขข้อมูลประวัติการเลื่อนขั้นเงินเดือน</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                        <input type="hidden" name="idsalary" id="idsalary">
                        <div class="form-group">
                        <label for="datesalary">วัน/เดือน/ปี</label>
                        <input type="date" class="form-control" id="datesalary" name="datesalary" >
                      </div>
                      <div class="form-group">
                        <label for="positionsalary">ตำแหน่ง</label>
                        <input type="text" class="form-control" id="positionsalary" name="positionsalary" >
                      </div>
                      <div class="form-group">
                        <label for="lvsalary">ระดับ</label>
                        <input type="text" class="form-control" id="lvsalary" name="lvsalary" >
                      </div>
                      <div class="form-group">
                        <label for="stepsalary">ขั้น</label>
                        <input type="text" class="form-control" id="stepsalary" name="stepsalary" >
                      </div>
                      <div class="form-group">
                        <label for="comsalary">คำสั่ง</label>
                        <input type="text" class="form-control" id="comsalary" name="comsalary" >
                      </div>
                      <div class="form-group">
                            <label for="filesalary">File input</label>
                            <input type="file" name="fileToUpload5" id="fileToUpload5">
                            <input type="text" name="filesalary" id="filesalary">
                          </div>                         
                        <input type="hidden" name="salaryMethod2" id="salaryMethod2" value="2">

                         
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
  <script src="https://cdn.datatables.net/plug-ins/1.10.16/filtering/row-based/range_dates.js"></script>


  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
 
  <script src="assets/chart-master/Chart.js"></script>
  
  
  <script>
  
// get data from edit btn

    $('.salary_edit').click(function(){
        var idsalary = $(this).attr('data-idsalary');
        var datesalary = $(this).attr('data-datesalary');
        var positionsalary = $(this).attr('data-positionsalary');
        var lvsalary = $(this).attr('data-lvsalary');
        var stepsalary = $(this).attr('data-stepsalary');
        var comsalary = $(this).attr('data-comsalary');
        var filesalary = $(this).attr('data-filesalary');
      

        $('#idsalary').val(idsalary);
        $('#datesalary').val(datesalary);
        $('#positionsalary').val(positionsalary);
        $('#lvsalary').val(lvsalary);
        $('#stepsalary').val(stepsalary);
        $('#comsalary').val(comsalary);
        $('#filesalary').val(filesalary);
        
        $('#salary_edit').modal('show');

    });
</script>
 
 <script>
        $(document).ready(function () {
            $('#example2').DataTable({
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
                     {
				text: 'PDF',
				action: function ( e, dt, button, config ) {
				window.location = 'mpdf/salary_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
				}
					},
                    { extend: 'print', text: 'สั่งพิมพ์ข้อมูลในตาราง' ,exportOptions: { columns: ':visible'}  },
                    { extend: 'colvis', text: 'เลือกคอลัมน์' },
                ]
            });
        });</script>
      
 