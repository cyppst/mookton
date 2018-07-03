<?php
include("dbconfig.php");
if (isset($_SESSION['post_data'])) {
  $_POST = $_SESSION['post_data'];
  $_SERVER['REQUEST_METHOD'] = 'POST';
  unset($_SESSION['post_data']);
} 

require_once('att2000/config/database.php');
$records = $mysql_conn->table('userinfo')->findAll();
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

<?php
include("header_lv2.php");
?>
<section id="main-content">
      <section class="wrapper">
<form class="form-horizontal" role="form" method="post" action="app2.php" enctype="multipart/form-data">
<div class="container">
<div class="col-lg-3 pull-right" align="center">
  <img src="uploads/management.png" alt="Avatar" class="image" width="180" height="180">
  <input type="file" class="form-control" id="fileToUploadimg" name="fileToUploadimg">
</div>

                    <section class="panel">
                      <div class="">
                        <h1> เพิ่มข้อมูลประวัติส่วนตัว</h1><br><br><br>
                       
                        <form class="form-horizontal" role="form">
                        <div class="form-group">
                        <div class="col-lg-8">
                        <div class="alert alert-success fade in">
                        <strong>ข้อมูลส่วนตัว</strong>
                        </div>
                        </div>
                        </div>
                       <input type="hidden" name="idstaff" id="idstaff">

                         
                          <div class="form-group">
                            <label class="col-lg-2 control-label">เลขบัตรประชาน</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="no" name="no" minlength="13" maxlength="13">
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ชื่อ-นามสกุล</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="name_staff" name="name_staff" value="<?= isset($_POST['name_staff']) ? $_POST['name_staff'] : ''; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">วัน/เดือน/ปีเกิด</label>
                            <div class="col-lg-3">
                            <!--<textarea name="" id="" class="form-control" cols="50" rows="5"></textarea>-->
                            <input type="date" class="form-control" id="birth" name="birth">
                            </div>
                            <label class="col-lg-1 control-label">เพศ</label>
                            <div class="col-lg-2">
                            <select class="form-control m-bot15" id="sex" name="sex">
                                            <option value="หญิง">หญิง</option>
                                            <option value="ชาย">ชาย</option>
                                        </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">สัญชาติ</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" id="nationality" name="nationality">
                            </div>
                            <label class="col-lg-1 control-label">เชื้อชาติ</label>
                            <div class="col-lg-2">
                              <input type="text" class="form-control" id="race" name="race">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ศาสนา</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" id="religion" name="religion">
                            </div>
                            <label class="col-lg-1 control-label">สถานะภาพสมรส</label>
                            <div class="col-lg-2">
                              <input type="text" class="form-control" id="statuslove" name="statuslove">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">เบอร์ติดต่อ</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <label class="col-lg-1 control-label">Email</label>
                            <div class="col-lg-2">
                              <input type="text" class="form-control" id="email" name="email">
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
                              <input type="text" class="form-control" id="position_staff" name="position_staff">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ตำแหน่งรักษาการ</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="actfor" name="actfor">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ตำแหน่งช่วยรักษาการ</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="help" name="help">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">ส่วน/ฝ่าย</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="group" name="group">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">หน่วยงานและองค์กร</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="department2" name="department2">
                            </div>
                          </div>
                          <div class="form-group">
                          <label class="col-lg-2 control-label">ประเภทการจ้างงาน</label>
                            <div class="col-lg-3">
                            <select class="form-control m-bot15" id="emtype" name="emtype">
                                            <option value="พนักงานจ้างทั่วไป">พนักงานจ้างทั่วไป</option>
                                            <option value="พนักงานจ้างตามภารกิจ">พนักงานจ้างตามภารกิจ</option>
                                            <option value="พนักงานจ้างผู้เชี่ยวชาญพิเศษ">พนักงานจ้างผู้เชี่ยวชาญพิเศษ</option>
                                        </select>
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
                              <input type="text" class="form-control" id="user" name="user">
                            </div>
                            <label class="col-lg-1 control-label">รหัสผ่าน</label>
                            <div class="col-lg-2">
                              <input type="password" class="form-control" id="pass" name="pass">
                            </div>
                            
                            <label class="col-lg-1 control-label">รหัสลายนิ้วมือ</label>
                                <div class="col-lg-2">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <select name="USERID" class="form-control" id="">
                                        <?php foreach ($records as $record) { ?>
                                            <option value="<?= $record['USERID'] ?>"><?=  '( ' .$record['NAME'] . ' )' ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                          </div>
                          
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
                  </div></form></section></section>
 
    
  <script src="js/bootstrap.min.js"></script>
  

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
    <script type="text/javascript" language="javascript" src="js/buttons.colVis.min.js"></script>
<!-- datatableeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->

  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>
  <?php
    if(!empty($_SESSION['message'])){    
 echo "<script>
    swal({
      title: '".$_SESSION['message']."',
      text: 'คลิกเพื่อปิด',
      icon: 'error',
      button: 'ตกลง',
    });
    </script>";
}
unset($_SESSION['message']);
?>
 
  
                  </body>

</html>