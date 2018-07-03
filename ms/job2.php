<!DOCTYPE html>
<?php
include("dbconfig.php");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>ประวัติการทำงาน</title>
  <!--datatable-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>


  <!-- container section start -->

  <?php
include("header_lv2.php");
?>
<!--main content start-->
<section id="main-content">
      <section class="wrapper">
      <div id="recent-activity" class="tab-pane">
                  <h1>ประวัติการทำงาน</h1><br><br>
                  
                  <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#myModaladd" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                          
                        </div>
                    
                        <table class="table table-bordered" id="example21">
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
                        $id=$_SESSION["staff_ID"];
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
                           <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2-2.php?Deljob=<?php echo $row["job_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
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
  
      </section>
      </section>
      <!--โมเดลเพิ่ม-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModaladd" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการทำงาน</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2-2.php" enctype="multipart/form-data">
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
                        <form role="form" method="post" action="app2-2.php" enctype="multipart/form-data">
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
  <!-- container section end -->
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
  
<!-- modal sweetalert-->
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script> 

<?php
    if(!empty($_SESSION['message'])){    
 echo "<script>
    swal({
      title: '".$_SESSION['message']."',
      text: 'คลิกเพื่อปิด',
      icon: 'success',
      button: 'ตกลง',
    });
    </script>";
}
unset($_SESSION['message']);
?>


<!-- datatableeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->
		
		<!-- นำเข้า  CSS จาก dataTables -->
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
		<!-- นำเข้า  Javascript  จาก   dataTables -->
     
        <script type="text/javascript" language="javascript"
            src="js\jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/vfs_fonts.js"></script>
<!-- datatableeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>
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
            $('#example21').DataTable({
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
 
</body>

</html>
