<?php include "head.php"; ?>
<section id="main-content">
    <div class="wrapper">
        <div class="row">
            <?php include "menu.php"; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="col">
                        <div class="container">
                            <h2>ประวัติการทำงาน</h2>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="job" class="tab-pane">
                                        <h1>ประวัติการทำงาน</h1><br><br>
                                        <div class="row">

                                            <form role="form" method="post">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                                                    <div class="col-lg-2">
                                                        <input type="date" class="form-control" id="ffni" name="start1"
                                                               minlength="13" maxlength="13">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                                                    <div class="col-lg-2">
                                                        <input type="date" class="form-control" id="ffin" name="end1"
                                                               minlength="13" maxlength="13">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                                            </form>
                                            <div class="col-lg-offset-2 col-lg-3 pull-right">
                                                <a href="#myModaladd" data-toggle="modal"
                                                   class="btn btn-primary icon_plus_alt2">
                                                    เพิ่ม
                                                </a>

                                            </div>
                                        </div>
                                        <table class="table table-bordered" id="xxaa">
                                            <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ตำแหน่ง</th>
                                                <th>สังกัดหน่วยงาน</th>
                                                <th>ระยะเวลาตั้งแต่</th>
                                                <th>ระยะเวลาถึง</th>
                                                <th>เมนู</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 0;
                                            $id = $_GET['IDedit'];
                                            if (isset($_POST['start1'])) {
                                                $start1 = $_POST['start1'];
                                                $end1 = $_POST['end1'];
                                                if (!empty($end1)) {
                                                    $sql = "SELECT * FROM `job` WHERE `job_year` >= '$start1' AND `staff_ID` = '$id' AND `job_year2` <= '$end1' ";
                                                } else {
                                                    $sql = "SELECT * FROM `job` WHERE `job_year` >= '$start1' AND `staff_ID` = '$id'";
                                                }
                                            } else {
                                                $sql = "SELECT * FROM job where staff_ID='$id'";

                                            }

                                            $result = $db_connection->query($sql);
                                            if (@$result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php $i++;
                                                    echo $i; ?></td>
                                                <td><?php echo $row["job_position"]; ?></td>
                                                <td><?php echo $row["job_department"]; ?></td>
                                                <td><?php echo $row["job_year"]; ?></td>
                                                <td><?php echo $row["job_year2"]; ?></td>
                                                <?php if (isset($_SESSION['staff_user']) && ($_SESSION['staff_lv']) >= 2) {
                                                    ?>
                                                    <th>
                                                        <div class="btn-group">
                                                            <!--ปุ่มแก้ไข-->
                                                            <a class="btn btn-success job_edit"
                                                               data-id="<?php echo $row["job_ID"]; ?>"
                                                               data-position="<?php echo $row["job_position"]; ?>"
                                                               data-department="<?php echo $row["job_department"]; ?>"
                                                               data-year="<?php echo $row["job_year"]; ?>"
                                                               data-yearend="<?php echo $row["job_year2"]; ?>"
                                                               data-toggle="modal"><i class="icon_pencil-edit_alt"></i></a>
                                                            <!--end btn edit-->
                                                            <!--ปุ่มลบ-->
                                                            <a class="btn btn-danger"
                                                               href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='action.php?Deljob=<?php echo $row["job_ID"]; ?>';}"><i
                                                                        class="icon_close_alt2"></i></a>
                                                        </div>
                                                    </th>
                                                <?php } ?>

                                                <?php } ?>

                                                <?php } ?>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- profile -->

                                    <!-- edit-profile -->

                                    <!--โมเดลเพิ่ม-->
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
                                         id="myModaladd" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close"
                                                            type="button">×
                                                    </button>
                                                    <h4 class="modal-title">เพิ่มข้อมูลประวัติการทำงาน</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <form role="form" method="post" action="action.php"
                                                          enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="position">ตำแหน่ง</label>
                                                            <input type="text" class="form-control" id="addposition"
                                                                   name="addposition" placeholder="ตำแหน่ง">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="department">สังกัดหน่วยงาน</label>
                                                            <input type="text" class="form-control" id="adddepartment"
                                                                   name="adddepartment" placeholder="สังกัดหน่วยงาน">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="year">ตั้งแต่</label>
                                                            <input type="date" id="addyear" class="form-control"
                                                                   name="addyear" placeholder="ระยะเวลา">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="yearend">ถึง</label>
                                                            <input type="date" id="addyearend" class="form-control"
                                                                   name="addyearend" placeholder="ระยะเวลา">
                                                        </div>
                                                        <input type="hidden" name="jobMethod" id="jobMethod" value="1">
                                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--โมเดลแก้ไข-->
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
                                         id="myModaledit" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close"
                                                            type="button">×
                                                    </button>
                                                    <h4 class="modal-title">แก้ไขข้อมูลประวัติการทำงาน</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="post" action="action.php"
                                                          enctype="multipart/form-data">
                                                        <input type="hidden" name="id" id="id" value="">
                                                        <div class="form-group">
                                                            <label for="position">ตำแหน่ง</label>
                                                            <input type="text" class="form-control" id="position"
                                                                   name="position">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="department">สังกัดหน่วยงาน</label>
                                                            <input type="text" class="form-control" id="department"
                                                                   name="department">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="year">ระยะเวลา</label>
                                                            <input type="date" class="form-control" id="year"
                                                                   name="year">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="yearend">ระยะเวลา</label>
                                                            <input type="date" class="form-control" id="yearend"
                                                                   name="year2">
                                                        </div>

                                                        <input type="hidden" name="jobMethod2" id="jobMethod2"
                                                               value="2">


                                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include 'src.php'; ?>

<script>

    // get data from edit btn

    $('.job_edit').click(function () {
        var id = $(this).attr('data-id');
        var position = $(this).attr('data-position');
        var department = $(this).attr('data-department');
        var year = $(this).attr('data-year');
        var yearend = $(this).attr('data-yearend');

        $('#id').val(id);
        $('#position').val(position);
        $('#department').val(department);
        $('#year').val(year);
        $('#yearend').val(yearend);
        $('#myModaledit').modal('show');

    });
</script>

<script>
    $(document).ready(function () {
        $('#xxaa').DataTable({
            "order": [[0, "asc"]],
            dom: 'lBfrtip',

            buttons: [
                'copy', 'excel', 'pdf', 'print', 'colvis'
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
                {extend: 'copy', text: 'คัดลอกเป็นข้อความ'},
                {extend: 'excel', text: 'Excel File'},
                {
                    text: 'PDF',
                    action: function (e, dt, button, config) {
                        <?php include 'pdf.php'; ?>
                    }
                },
                {extend: 'print', text: 'สั่งพิมพ์ข้อมูลในตาราง', exportOptions: {columns: ':visible'}},
                {extend: 'colvis', text: 'เลือกคอลัมน์'},


            ],

        });
    });
</script>


