
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620"> 
                  <div id="education" class="tab-pane">
                  <h1>ประวัติการศึกษา</h1><br><br>
                      <div class="row">
                  
                          <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#addeducation" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                                 
                          
                        </div>
                      </div>
                  <table class="table table-bordered" id="example3">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ระดับการศึกษา</th>
                      <th>สาขา/วิชา</th>
                      <th>ชื่อสถาบัน</th>
                      <th>ปีที่จบการศึกษา</th>
                      <th>เอกสาร</th>
                      
                      <th>เมนู</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_GET['IDedit'];
                  $sql = "SELECT * FROM education where staff_ID='$id'";
                          $result = $db_connection->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>
                    <tr>
                      <td><?php $i++; echo $i; ?></td>
                      <td><?php echo $row["edu_lv"]; ?></td>
                      <td><?php echo $row["edu_faculty"]; ?></td>
                      <td><?php echo $row["edu_name"]; ?></td>
                      <td><?php echo $row["edu_year"]; ?></td>
                      <td><button class="btn" onclick="window.location.href='uploads/<?php echo $row["edu_doc"];?>'"><i class="icon_documents_alt"></i></button></button></td>
                      <?php if(isset($_SESSION['staff_user'])&&($_SESSION['staff_lv'])>=2){
                    ?>
                     <th>
                     <div class="btn-group">
                    <!--ปุ่มแก้ไข-->
                     <a  class="btn btn-success education_edit"
                     data-idedu="<?php echo $row["edu_ID"]; ?>"
                     data-lv="<?php echo $row["edu_lv"]; ?>"
                     data-faculty="<?php echo $row["edu_faculty"]; ?>"
                     data-name="<?php echo $row["edu_name"]; ?>"
                     data-year2="<?php echo $row["edu_year"]; ?>"
                     data-fileToUpload2="<?php echo $row["edu_doc"]; ?>"
                     data-toggle="modal"><i class="icon_pencil-edit_alt"></i></a>
                     <!--end btn edit-->
                     <!--ปุ่มลบ-->
                     <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2.php?Deledu=<?php echo $row["edu_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
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
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addeducation" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการศึกษา</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                          <div class="form-group">
                          <label for="lv">ระดับการศึกษา</label>
                          <select class="form-control m-bot15" id="addlv" name="addlv">
                                            <option value="ประถมศึกษา">ประถมศึกษา</option>
                                            <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                                            <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                                            <option value="ประกาศนียบัตรวิชาชีพ">ประกาศนียบัตรวิชาชีพ</option>
                                            <option value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                                            <option value="ปริญญาโท">ปริญญาโท</option>
                                            <option value="ปริญญาเอก">ปริญญาเอก</option>
                                        </select>
                          </div>
                          <div class="form-group">
                            <label for="faculty">สาขา/วิชา</label>
                            <input type="text" class="form-control" id="addfaculty" name="addfaculty" >
                          </div>
                          <div class="form-group">
                            <label for="name">ชื่อสถาบัน</label>
                            <input type="text" class="form-control" id="addname" name="addname" >
                          </div>
                          <div class="form-group">
                            <label for="year">ปีที่จบ</label>
                            <input type="number" min="1900" max="2099" step="1" value="2018" class="form-control" id="addyear_edu" name="addyear_edu" >
                          </div>
                          <div class="form-group">
                            <label for="fileToUploadadd">File input</label>
                            <input type="file" name="fileToUploadadd" id="fileToUploadadd">
                            
                          </div>
                          <input type="hidden" name="eduMethod" id="eduMethod" value="1">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
    <!--โมเดลแก้ไข-->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="education_edit" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">แก้ไขข้อมูลประวัติการศึกษา</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                        <input type="hidden" name="idedu" id="idedu" value="">
                        <div class="form-group">
                          <label for="lv">ระดับการศึกษา</label>
                          <select class="form-control m-bot15" id="lv" name="lv">
                                            <option value="ประถมศึกษา">ประถมศึกษา</option>
                                            <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                                            <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                                            <option value="ประกาศนียบัตรวิชาชีพ">ประกาศนียบัตรวิชาชีพ</option>
                                            <option value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                                            <option value="ปริญญาโท">ปริญญาโท</option>
                                            <option value="ปริญญาเอก">ปริญญาเอก</option>
                                        </select>
                          </div>
                          <div class="form-group">
                            <label for="faculty">สาขา/วิชา</label>
                            <input type="text" class="form-control" id="faculty" name="faculty">
                          </div>
                          <div class="form-group">
                            <label for="name">ชื่อสถาบัน</label>
                            <input type="text" class="form-control" id="name" name="name">
                          </div>
                          <div class="form-group">
                            <label for="year2">ปีที่จบ</label>
                            <input type="number" min="1900" max="2099" step="1" value="2018" class="form-control" id="year2" name="year2">
                          </div>
                          <div class="form-group">
                            <label for="fileToUpload2">File input</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                           
                            <input type="text" class="fileToUpload2" id="fileToUpload2" name="fileToUpload2">
                          
                          </div>
                          
                        <input type="hidden" name="eduMethod2" id="eduMethod2" value="2">

                         
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

    $('.education_edit').click(function(){
        var idedu = $(this).attr('data-idedu');
        var lv = $(this).attr('data-lv');
        var faculty = $(this).attr('data-faculty');
        var name = $(this).attr('data-name');
        var year2 = $(this).attr('data-year2');
        var fileToUpload2 = $(this).attr('data-fileToUpload2');
      
        $('#idedu').val(idedu);
        $('#lv').val(lv);
        $('#faculty').val(faculty);
        $('#name').val(name);
        $('#year2').val(year2);
        $('#fileToUpload2').val(fileToUpload2);
        
        $('#education_edit').modal('show');

    });
</script>
 
 <script>
        $(document).ready(function () {
            $('#example3').DataTable({
                "order": [[0, "asc"]],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
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
                    { extend: 'print', text: 'สั่งพิมพ์ข้อมูลในตาราง' },
                ]
            });
        });
    </script>
    