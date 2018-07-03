<?php include "head.php"; ?>
<section id="main-content">
    <?php include "menu.php"; ?>
    <?php
    $i = 0;
    $id = $_GET['IDedit'];
    $sql = "SELECT * FROM staff where staff_ID='$id'";
    $result = $db_connection->query($sql);
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc())
    {
    $_SESSION["IDedit"] = $_GET['IDedit'];
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-body">
                <div class="col">
                    <div class="container">
                        <h2>ประวัติ</h2>
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <form class="form-horizontal" role="form" method="post" action="action.php"
                                      enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="col-lg-3 pull-right" align="center">
                                            <img src="../uploads/<?php echo $row['staff_img']; ?>" alt="Avatar"
                                                 class="image" width="180" height="220">
                                            <input type="file" class="form-control" id="file" name="file">
                                            <input type="hidden" id="img" name="img"
                                                   value="<?php echo $row['staff_img']; ?>">
                                              </div>

                                        <section class="panel">
                                            <div class="">
                                                <h1> ประวัติส่วนตัว</h1><br><br><br>

                                                <div class="form-group">
                                                    <div class="col-lg-8">
                                                        <div class="alert alert-success fade in">
                                                            <strong>ข้อมูลส่วนตัว</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="idstaff" id="idstaff"
                                                       value="<?php echo $row['staff_ID']; ?>">


                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">เลขบัตรประชาน</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="no"
                                                               name="no"
                                                               value="<?php echo $row['staff_no']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">ชื่อ-นามสกุล</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="name_staff"
                                                               name="name_staff"
                                                               value="<?php echo $row['staff_name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">วัน/เดือน/ปีเกิด</label>
                                                    <div class="col-lg-3">
                                                        <!--<textarea name="" id="" class="form-control" cols="50" rows="5"></textarea>-->
                                                        <input type="date" class="form-control" id="birth"
                                                               name="birth"
                                                               value="<?php echo $row['staff_birth']; ?>">
                                                    </div>
                                                    <label class="col-lg-1 control-label">เพศ</label>
                                                    <div class="col-lg-2">
                                                        <select class="form-control m-bot15" id="sex" name="sex"
                                                                value="<?php echo $row['staff_sex']; ?>">
                                                            <option value="หญิง">หญิง</option>
                                                            <option value="ชาย">ชาย</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">สัญชาติ</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="nationality"
                                                               name="nationality"
                                                               value="<?php echo $row['staff_nationality']; ?>">
                                                    </div>
                                                    <label class="col-lg-1 control-label">เชื้อชาติ</label>
                                                    <div class="col-lg-2">
                                                        <input type="text" class="form-control" id="race"
                                                               name="race"
                                                               value="<?php echo $row['staff_race']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">ศาสนา</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="religion"
                                                               name="religion"
                                                               value="<?php echo $row['staff_religion']; ?>">
                                                    </div>
                                                    <label class="col-lg-1 control-label">สถานะภาพสมรส</label>
                                                    <div class="col-lg-2">
                                                        <input type="text" class="form-control" id="statuslove"
                                                               name="statuslove"
                                                               value="<?php echo $row['staff_statuslove']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">เบอร์ติดต่อ</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="phone"
                                                               name="phone"
                                                               value="<?php echo $row['staff_phone']; ?>">
                                                    </div>
                                                    <label class="col-lg-1 control-label">Email</label>
                                                    <div class="col-lg-2">
                                                        <input type="text" class="form-control" id="email"
                                                               name="email"
                                                               value="<?php echo $row['staff_email']; ?>">
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
                                                        <input type="text" class="form-control"
                                                               id="position_staff" name="position_staff"
                                                               value="<?php echo $row['staff_position']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">ตำแหน่งรักษาการ</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="actfor"
                                                               name="actfor"
                                                               value="<?php echo $row['staff_actfor']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">ตำแหน่งช่วยรักษาการ</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="help"
                                                               name="help"
                                                               value="<?php echo $row['staff_help']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">ส่วน/ฝ่าย</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="group"
                                                               name="group"
                                                               value="<?php echo $row['staff_group']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">หน่วยงานและองค์กร</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="department2"
                                                               name="department2"
                                                               value="<?php echo $row['staff_department']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">ประเภทการจ้างงาน</label>
                                                    <div class="col-lg-3">
                                                        <select class="form-control m-bot15" id="emtype"
                                                                name="emtype">
                                                            <option value="<?php echo $row['staff_emtype']; ?>"><?php echo $row['staff_emtype']; ?></option>
                                                            <option value="พนักงานจ้างทั่วไป">
                                                                พนักงานจ้างทั่วไป
                                                            </option>
                                                            <option value="พนักงานจ้างตามภารกิจ">
                                                                พนักงานจ้างตามภารกิจ
                                                            </option>
                                                            <option value="พนักงานจ้างผู้เชี่ยวชาญพิเศษ">
                                                                พนักงานจ้างผู้เชี่ยวชาญพิเศษ
                                                            </option>
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
                                                        <input type="text" class="form-control" id="user"
                                                               name="user"
                                                               value="<?php echo $row['staff_user']; ?>">
                                                    </div>
                                                    <label class="col-lg-1 control-label">รหัสผ่าน</label>
                                                    <div class="col-lg-2">
                                                        <input type="password" class="form-control" id="pass"
                                                               name="pass"
                                                               value="<?php echo $row['staff_pass']; ?>">
                                                    </div>
                                                    <label class="col-lg-1 control-label">รหัสลายนิ้วมือ</label>
                                                    <div class="col-lg-2">
                                                        <input type="number" class="form-control" id="USERID"
                                                               name="USERID"
                                                               value="<?php echo $row['USERID']; ?>">
                                                    </div>
                                                </div>
                                                <?php }
                                                } ?>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <input type="hidden" name="staffMethod_edit"
                                                               id="staffMethod_edit" value="2">
                                                        <button type="submit" class="btn btn-primary">Save
                                                        </button>
                                                        <button type="button" class="btn btn-danger">Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                            </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php include 'src.php'; ?>



  
 

