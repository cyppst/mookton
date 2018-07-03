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
                  <a href="#addsalary" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                          เพิ่ม
                          </a>
                          
                        </div>
                        <table class="table table-bordered" id="example22">
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
                        $id=$_SESSION["staff_ID"];
                        $sql = "SELECT * FROM salary where staff_ID='$id'";
                                $result = $db_connection->query($sql);
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                ?>
                          <tr>
                            <td><?php $i++; echo $i; ?></td>
                            <td><?php echo $row["salary_date"]; ?></td>
                            <td><?php echo $row["salary_position"]; ?></td>
                            <td><?php echo $row["salary_lv"]; ?></td>
                            <td><?php echo $row["salary_step"]; ?></td>
                            <td><?php echo $row["salary_command"]; ?></td>
                            <td><button class="btn" onclick="window.location.href='uploads/<?php echo $row["salary_doc"];?>'"><i class="icon_documents_alt"></i></button></button></td>
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
                           <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='app2-2.php?Delsalary=<?php echo $row["salary_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
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
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addsalary" class="modal fade">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
       <h4 class="modal-title">เพิ่มข้อมูลประวัติการเลื่อนขั้นและอัตราเงินเดือน</h4>
     </div>
     <div class="modal-body">

       <form role="form" method="post" action="app2-2.php" enctype="multipart/form-data">
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
       <form role="form" method="post" action="app2-2.php" enctype="multipart/form-data">
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
            $('#example22').DataTable({
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
