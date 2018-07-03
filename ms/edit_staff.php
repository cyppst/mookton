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
       
    <!-- container section start -->
  <section id="container" class="">

    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2 pull-right">
                <?php 
                        $i=0;
                        $id=$_GET['IDedit'];
                        $sql = "SELECT * FROM staff where staff_ID='$id'";
                          $result = $db_connection->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>

                  <h4><?php echo $row['staff_name']; ?></h4>
                  <div class="follow-ava">
                    <img src="uploads/<?php echo $row['staff_img']; ?>" alt="">
                  </div>
                         
                  <h6><?php if($row['staff_lv']==1){
                            echo "Administrator";
                  }else{
                    if($row['staff_lv']==2){
                            echo "Authorities";
                    }else{
                            echo "Personnel";
                    }
                  }
                         ?></h6>
                </div> <?php }}?>
                <!--<div class="col-lg-4 col-sm-4 follow-info">
                  <p>Hello I’m Jenifer Smith, a leading expert in interactive and creative design.</p>
                  <p>@jenifersmith</p>
                  <p><i class="fa fa-twitter">jenifertweet</i></p>
                  <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span>
                                    <span><i class="icon_pin_alt"></i>NY</span>
                                </h6>
                </div>-->
         
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs" id="stafftab">
                <li class="active">
                    <a data-toggle="tab" href="#profile">
                                          
                                          ประวัติส่วนตัว
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#job">
                                          
                                          ประวัติการทำงาน
                                      </a>
                  </li>
                  <li>
				  
                    <a data-toggle="tab" href="#salary">
                                         
                                          ประวัติการเลื่อนขั้นเงินเดือน
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#education">
                                         
                                          ประวัติการศึกษา
                                      </a>
                  </li>				 				 
				   <li>
                    <a data-toggle="tab" href="#rank">
                                         
                                          เครื่องราชอิสริยาภรณ์
                                      </a>
                  </li>
                  <li>
                    
					<a data-toggle="tab" href="#gojob">
			      การไปราชการ
                
                                      </a>
                  </li>
                  	
					<li>
                    <a target ="_blank" href="#leave">
                                         
                                          การลา
                                      </a>
                  </li>
				  
                 <li>
                    
                     <a  data-toggle="tab" href="#train">  
				การฝึกอบรม						   
                                      
                                      </a>
                  </li>	
				     
				   			 				                  				  
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                      <?php include('profile_edit.php');?>
                      <?php include('job_edit.php');?>
					  <?php include('salary_edit.php');?>
                      <?php include('education_edit.php');?>					  
					    <?php include('rank_edit.php');?>
						 
					   <?php include_once('gojob_edit.php');?> 
                       <?php include('leave_edit.php');?>
					  	<?php include_once('train_edit.php');?> 	
						                    
					  		
					                     
                     
					 

</div></div>
                    
                 
                
               
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
    <!--main content end-->
    
  <script src="js/bootstrap.min.js"></script>
  <script>
   $('#stafftab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
    var id = $(e.target).attr("href").substr(1);
    window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#stafftab a[href="' + hash + '"]').tab('show');
</script>


  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>
   <!-- modal sec-->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

   <?php
    if(!empty($_SESSION['message'])){    
 echo "<script>
    swal({
      title: '".$_SESSION['message']."',
      text: 'คลิกเพื่อปิด',
      icon: '".@$_SESSION['message2']."',
      button: 'ตกลง',
    });
    </script>";
}
unset($_SESSION['message2']);
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
    <script type="text/javascript" language="javascript" src="js/buttons.colVis.min.js"></script>
<!-- datatableeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->

  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>
  <script>
  </script>
  
 

