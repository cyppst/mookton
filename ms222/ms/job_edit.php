           <div id="job" class="tab-pane">
                  <h1>ประวัติการทำงาน</h1><br><br>
                      <div class="row">
                  
                          <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#myModaladd" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                          
                        </div>
                      </div>
                  <table class="table table-bordered" id="example1">
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
                     <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2.php?Deljob=<?php echo $row["job_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
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
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModaladd" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการทำงาน</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="position">ตำแหน่ง</label>
                            <input type="text" class="form-control" id="addposition" name="addposition" placeholder="ตำแหน่ง">
                          </div>
                          <div class="form-group">
                            <label for="department">สังกัดหน่วยงาน</label>
                            <input type="text" class="form-control" id="adddepartment" name="adddepartment" placeholder="สังกัดหน่วยงาน">
                          </div>
                          <div class="form-group">
                            <label for="year">ระยะเวลา</label>
                            <input type="number" min="1900" max="2099" step="1" value="2018" id="addyear"  class="form-control" name="addyear" placeholder="ระยะเวลา">
                          </div>
                          <input type="hidden" name="jobMethod" id="jobMethod" value="1">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
    <!--โมเดลแก้ไข-->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModaledit" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">แก้ไขข้อมูลประวัติการทำงาน</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="">
                          <div class="form-group">
                            <label for="position">ตำแหน่ง</label>
                            <input type="text" class="form-control" id="position" name="position" >
                          </div>
                          <div class="form-group">
                            <label for="department">สังกัดหน่วยงาน</label>
                            <input type="text" class="form-control" id="department" name="department">
                          </div>
                          <div class="form-group">
                            <label for="year">ระยะเวลา</label>
                            <input type="number" min="1900" max="2099" step="1" value="2018" class="form-control" id="year" name="year">
                          </div>
                          
                        <input type="hidden" name="jobMethod2" id="jobMethod2" value="2">

                         
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

    $('.job_edit').click(function(){
        var id = $(this).attr('data-id');
        var position = $(this).attr('data-position');
        var department = $(this).attr('data-department');
        var year = $(this).attr('data-year');

        $('#id').val(id);
        $('#position').val(position);
        $('#department').val(department);
        $('#year').val(year);
        $('#myModaledit').modal('show');

    });
</script>

<script>
        $(document).ready(function () {
            $('#example1').DataTable({
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
                    

                ],
                              
            });
        });
    </script>
    
