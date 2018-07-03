
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620"> 
                  <div id="gojob" class="tab-pane ">
                  <h1>ประวัติการไปราชการ</h1><br><br>
                      <div class="row">
                  
                      <form role="form" method="post">
                          <div class="form-group">
                          <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                            <div class="col-lg-2">
                            <input type="date" class="form-control" id="ffni5" name="start5" minlength="13" maxlength="13">
                          </div>
                          </div>
                            <div class="form-group">
                            <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                            <div class="col-lg-2">
                              <input type="date" class="form-control" id="ffin5" name="end5" minlength="13" maxlength="13">
                          </div>
                          </div>
                          <button type="submit" class="btn btn-primary">ค้นหา</button>
                          </form>
                          <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#addgojob" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                                 
                          
                        </div>
                      </div>
                  <table class="table table-bordered" id="example47">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>เลขที่หนังสือ</th>
                      <th>เดินทางไปราการเรื่อง</th>
                      <th>ตั้งแต่วันที่</th>
                      <th>ถึงวันที่</th>                                     
                      <th>เอกสาร</th>                    
                      <th>เมนู</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_GET['IDedit'];
                  if(isset($_POST['start5'])){
                    $start5 = $_POST['start5'];
                    $end5 = $_POST['end5'];   
                    if(!empty($end5)){          
                     $sql = "SELECT * FROM `gojob` WHERE `gojob_year` >= '$start5' AND `staff_ID` = '$id' AND `gojob_year2` <= '$end5' ";
                      }else{
						 $sql = "SELECT * FROM `gojob` WHERE `gojob_year` >= '$start5' AND `staff_ID` = '$id'";                      
                      }
                  } else {
                    $sql = "SELECT * FROM gojob where staff_ID='$id'";

                  }
                  
                          $result = $db_connection->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>
                    <tr>
                      <td><?php $i++; echo $i; ?></td>
                      <td><?php echo $row["gojob_no"]; ?></td>
                      <td><?php echo $row["gojob_sub"]; ?></td>
                      <td><?php echo $row["gojob_year"]; ?></td>
                      <td><?php echo $row["gojob_year2"]; ?></td>
                      
                      <td><button class="btn" onclick="window.location.href='uploads/<?php echo $row["gojob_doc"];?>'"><i class="icon_documents_alt"></i></button></button></td>
                      <?php if(isset($_SESSION['staff_user'])&&($_SESSION['staff_lv'])>=2){
                    ?>
                     <th>
                     <div class="btn-group">
                    <!--ปุ่มแก้ไข-->
                     <a  class="btn btn-success gojob_edit"
                     data-idgojob="<?php echo $row["gojob_ID"]; ?>"
                     data-nogojob="<?php echo $row["gojob_no"]; ?>"
                     data-subgojob="<?php echo $row["gojob_sub"]; ?>"
                     data-yeargojob="<?php echo $row["gojob_year"]; ?>"
                     data-yeargojob2="<?php echo $row["gojob_year2"]; ?>"
                     data-filegojob="<?php echo $row["gojob_doc"];?>"
                     data-toggle="modal">
                    <i class="icon_pencil-edit_alt"></i></a>
                     <!--end btn edit-->
                     <!--ปุ่มลบ-->
                     <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2.php?Delgojob=<?php echo $row["gojob_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
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
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addgojob" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการไปราชการ สมนา</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="nogojob">เลขที่หนังสือ</label>
                            <input type="text" class="form-control" id="addnogojob" name="addnogojob" >
                          </div>
                          <div class="form-group">
                            <label for="subgojob">เดินทางไปราชการเรื่อง</label>
                            <input type="text" class="form-control" id="addsubgojob" name="addsubgojob" >
                          </div>
                          <div class="form-group">
                            <label for="yeargojob">ตั้งแต่วันที่</label>
                            <input type="date" class="form-control" id="addyeargojob" name="addyeargojob" >
                          </div>
                          <div class="form-group">
                            <label for="yeargojob2">ถึงวันที่</label>
                            <input type="date" class="form-control" id="addyeargojob2" name="addyeargojob2" >
                          </div>
                          <div class="form-group">
                            <label for="filegojob">File input</label>
                            <input type="file" name="addfilegojob" id="addfilegojob">
                            
                          </div>
                          <input type="hidden" name="gojobMethod" id="gojobMethod" value="1">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
    <!--โมเดลแก้ไข-->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="gojob_edit" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">แก้ไขข้อมูลประวัติการไปราชการ สมนา</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                        <input type="hidden" name="idgojob" id="idgojob" value="">
                          <div class="form-group">
                            <label for="nogojob">เลขที่หนังสือ</label>
                            <input type="text" class="form-control" id="nogojob" name="nogojob">
                          </div>
                          <div class="form-group">
                            <label for="subgojob">เดินทางไปราการเรื่อง</label>
                            <input type="text" class="form-control" id="subgojob" name="subgojob">
                          </div>
                          <div class="form-group">
                            <label for="yeargojob">ตั้งแต่วันที่</label>
                            <input type="date" class="form-control" id="yeargojob" name="yeargojob">
                          </div>
                          <div class="form-group">
                            <label for="yeargojob2">ถึงวันที่</label>
                            <input type="date" class="form-control" id="yeargojob2" name="yeargojob2">
                          </div>
                          <div class="form-group">
                            <label for="filegojob">File input</label>
                            <input type="file" name="fileToUpload3" id="fileToUpload3">
                           
                            <input type="text"  id="filegojob" name="filegojob">
                          
                          </div>
                          
                        <input type="hidden" name="gojobMethod2" id="gojobMethod2" value="2">

                         
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

    $('.gojob_edit').click(function(){
        var idgojob = $(this).attr('data-idgojob');
        var nogojob = $(this).attr('data-nogojob');
        var subgojob = $(this).attr('data-subgojob');
        var yeargojob = $(this).attr('data-yeargojob');
        var yeargojob2 = $(this).attr('data-yeargojob2');
        var filegojob = $(this).attr('data-filegojob');


        $('#idgojob').val(idgojob);
        $('#nogojob').val(nogojob);
        $('#subgojob').val(subgojob);
        $('#yeargojob').val(yeargojob);
        $('#yeargojob2').val(yeargojob2);
        $('#filegojob').val(filegojob);
        $('#gojob_edit').modal('show');

    });
</script>

<script>
        $(document).ready(function () {
            $('#example47').DataTable({
                "order": [[0, "asc"]],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print', 'colvis'
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
				window.location = 'mpdf/gojob_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
				}
					},
                    { extend: 'print', text: 'สั่งพิมพ์ข้อมูลในตาราง',exportOptions: { columns: ':visible'} },
                    { extend: 'colvis', text: 'เลือกคอลัมน์' },
                ]
            });
        });
    </script>
    