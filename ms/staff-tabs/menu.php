<?php
$IDedit = $_GET['IDedit'];
$currentPage = basename($_SERVER['PHP_SELF']);

?>
<div class="wrapper">
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
                            <img src="/ms/uploads/<?php echo $row['staff_img']; ?>" alt="">
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
    <div class="row">
        <nav class="navbar navbar-default">
            <div class="container">
                <ul class="nav navbar-nav">

                    <li <?php if($currentPage == 'profile.php') {echo 'class="active"';} ?>><a href="profile.php?IDedit=<?= $IDedit ?>">ประวัติ</a></li>
                    <li <?php if($currentPage == 'job.php') {echo 'class="active"';} ?>><a href="job.php?IDedit=<?= $IDedit ?>">ประวัติการทำงาน</a></li>
                    <li <?php if($currentPage == 'salary.php') {echo 'class="active"';} ?>><a href="salary.php?IDedit=<?= $IDedit ?>">ประวัติการเลื่อนขั้นเงินเดือน</a></li>
                    <li <?php if($currentPage == 'education.php') {echo 'class="active"';} ?>><a href="education.php?IDedit=<?= $IDedit ?>">ประวัติการศึกษา</a></li>
                    <li <?php if($currentPage == 'rank.php') {echo 'class="active"';} ?>><a href="rank.php?IDedit=<?= $IDedit ?>">เครื่องราชอิสริยาภรณ์</a></li>
                    <li <?php if($currentPage == 'gojob.php') {echo 'class="active"';} ?>><a href="gojob.php?IDedit=<?= $IDedit ?>">ไปงานราชการ</a></li>
                    <li <?php if($currentPage == 'train.php') {echo 'class="active"';} ?>><a href="train.php?IDedit=<?= $IDedit ?>">ไปงานฝึกอบรม</a></li>
                    <li <?php if($currentPage == 'leave.php') {echo 'class="active"';} ?>><a href="leave.php?IDedit=<?= $IDedit ?>">การลา</a></li>
                </ul>
            </div>
        </nav>
    </div>