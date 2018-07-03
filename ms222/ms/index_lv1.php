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
include("header.php");
?>
<!--main content start-->
<section id="main-content">
      <section class="wrapper">
      <?php 
                        
                        $id=$_SESSION["staff_ID"];
                        $sql = "SELECT * FROM staff where staff_ID='$id'";
                          $result = $db_connection->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>

<div id="profile" class="tab-pane active">
<form class="form-horizontal" role="form" method="post" action="app1.php" enctype="multipart/form-data">
<div class="container">
<div class="col-lg-3 pull-right" align="center">
  <img src="uploads/<?php echo $row['staff_img']; ?>" alt="Avatar" class="image" width="180" height="220">
  <input type="hidden" id="img" name="img" value="<?php echo $row['staff_img']; ?>">
</div>

                    <section class="panel">
                      <div class="">
                        <h1> ประวัติส่วนตัว</h1><br><br><br>
                       
                        <form class="form-horizontal" role="form">
                        <div class="form-group">
                        <div class="col-lg-8">
                        <div class="alert alert-success fade in">
                        <strong>ข้อมูลส่วนตัว</strong>
                        </div>
                        </div>
                        </div>
                       <input type="hidden" name="idstaff" id="idstaff" value="<?php echo $row['staff_ID']; ?>">

                         
                          <div class="form-group">
                            <label class="col-lg-2 control-label">เลขบัตรประชาน</label>
                            <div class="col-lg-6">
                              <input type="text" disabled="disabled" class="form-control" id="no" name="no" value="<?php echo $row['staff_no']; ?>">
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ชื่อ-นามสกุล</label>
                            <div class="col-lg-6">
                              <input type="text" disabled="disabled" class="form-control" id="name_staff" name="name_staff" value="<?php echo $row['staff_name']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">วัน/เดือน/ปีเกิด</label>
                            <div class="col-lg-3">
                            <!--<textarea name="" id="" class="form-control" cols="50" rows="5"></textarea>-->
                            <input type="date" disabled="disabled"  class="form-control" id="birth" name="birth" value="<?php echo $row['staff_birth']; ?>">
                            </div>
                            <label class="col-lg-1 control-label">เพศ</label>
                            <div class="col-lg-2">
                            <select disabled="disabled" class="form-control m-bot15" id="sex" name="sex" value="<?php echo $row['staff_sex']; ?>">
                                            <option value="หญิง">หญิง</option>
                                            <option value="ชาย">ชาย</option>
                                        </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">สัญชาติ</label>
                            <div class="col-lg-3">
                              <input type="text" disabled="disabled" class="form-control" id="nationality" name="nationality" value="<?php echo $row['staff_nationality']; ?>">
                            </div>
                            <label class="col-lg-1 control-label">เชื้อชาติ</label>
                            <div class="col-lg-2">
                              <input type="text" disabled="disabled" class="form-control" id="race" name="race" value="<?php echo $row['staff_race']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ศาสนา</label>
                            <div class="col-lg-3">
                              <input type="text" disabled="disabled" class="form-control" id="religion" name="religion" value="<?php echo $row['staff_religion']; ?>">
                            </div>
                            <label class="col-lg-1 control-label">สถานะภาพสมรส</label>
                            <div class="col-lg-2">
                              <input type="text" disabled="disabled" class="form-control" id="statuslove" name="statuslove" value="<?php echo $row['staff_statuslove']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">เบอร์ติดต่อ</label>
                            <div class="col-lg-3">
                              <input type="text" disabled="disabled" class="form-control" id="phone" name="phone" value="<?php echo $row['staff_phone']; ?>">
                            </div>
                            <label class="col-lg-1 control-label">Email</label>
                            <div class="col-lg-2">
                              <input type="text" disabled="disabled" class="form-control" id="email" name="email" value="<?php echo $row['staff_email']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-8">
                            <div class="alert alert-info fade in">
                            <strong>ข้อมูลการปฏิบัติงาน</strong>
                            </div>
                            </div>
                            </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ตำแหน่งปฏิบัติงาน</label>
                            <div class="col-lg-6">
                              <input type="text" disabled="disabled" class="form-control" id="position_staff" name="position_staff" value="<?php echo $row['staff_position']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ตำแหน่งรักษาการ</label>
                            <div class="col-lg-6">
                              <input type="text" disabled="disabled" class="form-control" id="actfor" name="actfor" value="<?php echo $row['staff_actfor']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ตำแหน่งช่วยรักษาการ</label>
                            <div class="col-lg-6">
                              <input type="text" disabled="disabled" class="form-control" id="help" name="help" value="<?php echo $row['staff_help']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ส่วน/ฝ่าย</label>
                            <div class="col-lg-6">
                              <input type="text" disabled="disabled" class="form-control" id="group" name="group" value="<?php echo $row['staff_group']; ?>" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">หน่วยงานและองค์กร</label>
                            <div class="col-lg-6">
                              <input type="text" disabled="disabled" class="form-control" id="department2" name="department2" value="<?php echo $row['staff_department']; ?>" >
                            </div>
                          </div>
                          <div class="form-group">
                          <label class="col-lg-2 control-label">ประเภทการจ้างงาน</label>
                            <div class="col-lg-3">
                            <select disabled="disabled" class="form-control m-bot15" id="emtype" name="emtype">
                            <option value="<?php echo $row['staff_emtype']; ?>"><?php echo $row['staff_emtype']; ?></option>
                                            <option value="พนักงานจ้างทั่วไป">พนักงานจ้างทั่วไป</option>
                                            <option value="พนักงานจ้างตามภารกิจ">พนักงานจ้างตามภารกิจ</option>
                                            <option value="พนักงานจ้างผู้เชี่ยวชาญพิเศษ">พนักงานจ้างผู้เชี่ยวชาญพิเศษ</option>
                                        </select>
                            </div>
                            <label class="col-lg-1 control-label">สถานะการทำงาน</label>
                            <div class="col-lg-2">
                              <input type="text" disabled="disabled" class="form-control" id="mobile" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-8">
                            <div class="alert alert-danger fade in">
                            <strong>ข้อมูลผู้ใช้</strong>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-lg-2 control-label">ชื่อผู้ใช้</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" id="user" name="user" disabled="disabled" value="<?php echo $row['staff_user']; ?>" >
                            </div>
                            <label class="col-lg-1 control-label">รหัสผ่าน</label>
                            <div class="col-lg-2">
                              <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $row['staff_pass']; ?>" >
                            </div>
                          </div>
                          <?php }} ?>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="staffMethod" id="staffMethod" value="2">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div></div></form>
 
  
      </section>
      </section>
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
        $(document).ready(function () {
            $('#example').DataTable({
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
    <?php if(@$_GET['removed']==1){
  echo "<script>
  swal({
    title: 'ลบเสร็จสิ้น',
    text: 'You clicked the button!',
    icon: 'success',
    button: 'ตกลง',
  });
  </script>";
  
}else{
  if(@$_GET['removed']==2)
  {
    echo "<script>
    swal({
      title: 'เพิ่มเสร็จสิ้น',
      text: 'You clicked the button!',
      icon: 'success',
      button: 'ตกลง',
    });
    </script>";
    
  }
}?>
</body>

</html>
