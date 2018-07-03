
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      
        <!-- notificatoin dropdown start-->
        <h4 class="text-center">ระบบจัดการบุคลากร องค์การบริหารส่วนตำบลพลายวาส</h4>
     
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
      
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
         <!--logo start-->
       <div>
       <a href="index.php"><img alt="avatar" style="width: 100%"   src="./img/logo.png"></a>
       </div>
      <!--logo end-->
      
          <li class="active">
            <a class="" href="index_lv3.php">
                          <i class="icon_group"></i>
                          <span>จัดการข้อมูลบุคลากร</span>
                          </a>
          </li>
          
          <li class="sub-menu">
          <a href="JavaScript:window.location='edit_staff.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';" class="">
                         <i class="icon_profile"></i>
                          <span>จัดการข้อมูลส่วนตัว</span>
                          
                      </a>
          </li>
          <li class="sub-menu">
            <a class="" href="logout.php">
                          <i class="fa fa-sign-out"></i>
                          <span>ออกจากระบบ</span>
                          </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->