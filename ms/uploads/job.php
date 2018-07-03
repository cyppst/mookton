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
      <div id="recent-activity" class="tab-pane">
                  <h1>ประวัติการทำงาน</h1><br><br>
                    
                  <form role="form" method="post">
                      <div class="form-group">
                      <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                        <div class="col-lg-2">
                        <input type="date" class="form-control" id="ffni" name="start1" minlength="13" maxlength="13">
                      </div>
                      </div>
                        <div class="form-group">
                        <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                        <div class="col-lg-2">
                          <input type="date" class="form-control" id="ffin" name="end1" minlength="13" maxlength="13">
                      </div>
                      </div>
                      <button type="submit" class="btn btn-primary">ค้นหา</button>
                      </form>
                      <br><br>
                  <table class="table table-bordered" id="example11">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ตำแหน่ง</th>
                      <th>สังกัดหน่วยงาน</th>
                      <th>ระยะเวลา</th>
                      
                     
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_SESSION["staff_ID"];
                  if(isset($_POST['start1'])){
                    $start1 = $_POST['start1'];
                    $end1 = $_POST['end1'];                    
                    if(isset($end1)){          
                      $sql = "SELECT * FROM `job` WHERE `job_year` >= '$start1' AND `staff_ID` = '$id'";
                      }else{
                        $sql = "SELECT * FROM `job` WHERE `job_year` >= '$start1' AND `staff_ID` = '$id' AND `job_year2` <= '$end1' ";
                      }
                  } else {
                    $sql = "SELECT * FROM job where staff_ID='$id'";

                  }
                 
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
                     
                     <?php } ?>

                      <?php  } ?>
                       
                      <?php } ?>
                    </tr>
                  </tbody>
                </table>
                    
                  </div>
  
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
    <script type="text/javascript" language="javascript" src="js/buttons.colVis.min.js"></script>
<!-- datatableeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>

 
  <script>
        $(document).ready(function () {
            $('#example11').DataTable({
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
