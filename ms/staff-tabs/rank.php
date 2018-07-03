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
                            <h2>เครื่องราชอิสริยาภรณ์</h2>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="rank" class="tab-pane  ">
                                        <h1>เครื่องราชอิสริาภรณ์</h1><br><br>
                                        <div class="row">

                                            <form role="form" method="post">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">วันที่เริ่มต้น</label>
                                                    <div class="col-lg-2">
                                                        <input type="date" class="form-control" id="ffni7" name="start7" minlength="13" maxlength="13">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">วันที่สิ้นสุด</label>
                                                    <div class="col-lg-2">
                                                        <input type="date" class="form-control" id="ffin7" name="end7" minlength="13" maxlength="13">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                                            </form>
                                            <div class="col-lg-offset-2 col-lg-3 pull-right">
                                                <a href="#rankadd" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                                    เพิ่ม
                                                </a>

                                            </div>
                                        </div>
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ปีที่รับพระราชทาน</th>
                                                <th>ขั้นเครื่อราชอิสริยาภรณ์ที่ได้รับ</th>
                                                <th>ราชกิจจานุเบกษา เล่มที่</th>
                                                <th>ตอนที่</th>
                                                <th>หน้าที่</th>
                                                <th>ลำดับที่</th>
                                                <th>ลงวันที่</th>

                                                <th>เมนู</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i=0;
                                            $id=$_GET['IDedit'];
                                            if(isset($_POST['start7'])){
                                                $start7 = $_POST['start7'];
                                                $end7 = $_POST['end7'];
                                                if(!empty($end7)){
                                                    $sql = "SELECT * FROM `rank` WHERE `rank_date` >= '$start7' AND `staff_ID` = '$id' AND `rank_date` <= '$end7' ";
                                                }else{
                                                    $sql = "SELECT * FROM `rank` WHERE `rank_date` >= '$start7' AND `staff_ID` = '$id'";

                                                }
                                            } else {
                                                $sql = "SELECT * FROM rank where staff_ID='$id'";

                                            }

                                            $result = $db_connection->query($sql);
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php $i++; echo $i; ?></td>
                                                <td><?php echo $row["rank_year"]; ?></td>
                                                <td><?php echo $row["rank_lv"]; ?></td>
                                                <td><?php echo $row["rank_sub"]; ?></td>
                                                <td><?php echo $row["rank_part"]; ?></td>
                                                <td><?php echo $row["rank_page"]; ?></td>
                                                <td><?php echo $row["rank_no"]; ?></td>
                                                <td><?php echo $row["rank_date"]; ?></td>
                                                <?php if(isset($_SESSION['staff_user'])&&($_SESSION['staff_lv'])>=2){
                                                    ?>
                                                    <th>
                                                        <div class="btn-group">
                                                            <!--ปุ่มแก้ไข-->
                                                            <a  class="btn btn-success rankedit"
                                                                data-idrank="<?php echo $row["rank_ID"]; ?>"
                                                                data-rankyear="<?php echo $row["rank_year"]; ?>"
                                                                data-ranklv="<?php echo $row["rank_lv"]; ?>"
                                                                data-ranksub="<?php echo $row["rank_sub"]; ?>"
                                                                data-rankpart="<?php echo $row["rank_part"]; ?>"
                                                                data-rankpage="<?php echo $row["rank_page"]; ?>"
                                                                data-rankno="<?php echo $row["rank_no"]; ?>"
                                                                data-rankdate="<?php echo $row["rank_date"]; ?>"
                                                                data-toggle="modal"><i class="icon_pencil-edit_alt"></i></a>
                                                            <!--end btn edit-->
                                                            <!--ปุ่มลบ-->
                                                            <a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='action.php?Delrank=<?php echo $row["rank_ID"]; ?>';}"><i class="icon_close_alt2"></i></a>
                                                        </div>
                                                    </th>
                                                <?php } ?>

                                                <?php  }  ?>

                                                <?php } ?>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- profile -->

                                    <!-- edit-profile -->

                                    <!--โมเดลเพิ่ม-->
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="rankadd" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                    <h4 class="modal-title">เพิ่มข้อมูลเครื่องราชอิสริยาภรณ์</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <form role="form" method="post" action="action.php" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="rankyear">ปีที่ได้รับพระราชทาน</label>
                                                            <input type="number" min="1900" max="2099" step="1" value="2018" class="form-control" id="addrankyear" name="addrankyear" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ranklv">ขั้นเครื่อราชอิสริยาภรณ์ที่ได้รับ</label>
                                                            <select class="form-control m-bot15" id="addranklv" name="addranklv">
                                                                <option value="เครื่องราชอิสริยาภรณ์อันเป็นมงคลยิ่งราชมิตราภรณ์(ร.ม.ภ.)">เครื่องราชอิสริยาภรณ์อันเป็นมงคลยิ่งราชมิตราภรณ์(ร.ม.ภ.)</option>
                                                                <option value="เครื่องขัตติยราชอิสริยาภรณ์อันมีเกียรติคุณรุ่งเรืองยิ่งมหาจักรีบรมราชวงศ์(ม.จ.ก.)">เครื่องขัตติยราชอิสริยาภรณ์อันมีเกียรติคุณรุ่งเรืองยิ่งมหาจักรีบรมราชวงศ์(ม.จ.ก.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์อันเป็นโบราณมงคลนพรัตนราชวราภรณ์(น.ร.)">เครื่องราชอิสริยาภรณ์อันเป็นโบราณมงคลนพรัตนราชวราภรณ์(น.ร.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์จุลจอมเกล้า ชั้นปฐมจุลจอมเกล้าวิเศษ(ป.จ.ว.)">เครื่องราชอิสริยาภรณ์จุลจอมเกล้า ชั้นปฐมจุลจอมเกล้าวิเศษ(ป.จ.ว.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์รัตนวราภรณ์(ร.ว.)">เครื่องราชอิสริยาภรณ์รัตนวราภรณ์(ร.ว.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์จุลจอมเกล้า ชั้นปฐมจุลจอมเกล้า(ป.จ.)">เครื่องราชอิสริยาภรณ์จุลจอมเกล้า ชั้นปฐมจุลจอมเกล้า(ป.จ.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์อันมีศักดิ์รามาธิบดี ชั้นที่ 1 (เสนางคะบดี)(ส.ร.)">เครื่องราชอิสริยาภรณ์อันมีศักดิ์รามาธิบดี ชั้นที่ 1 (เสนางคะบดี)(ส.ร.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์อันเป็นที่เชิดชูยิ่งช้างเผือก ชั้นมหาปรมาภรณ์ช้างเผือก(ม.ป.ช.)">เครื่องราชอิสริยาภรณ์อันเป็นที่เชิดชูยิ่งช้างเผือก ชั้นมหาปรมาภรณ์ช้างเผือก(	ม.ป.ช.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์อันมีเกียรติยศยิ่งมงกุฎไทย ชั้นมหาวชิรมงกุฎ(ม.ว.ม.)">เครื่องราชอิสริยาภรณ์อันมีเกียรติยศยิ่งมงกุฎไทย ชั้นมหาวชิรมงกุฎ(ม.ว.ม.)</option>
                                                                <option value="เครื่องราชอิสริยาภรณ์อันเป็นที่เชิดชูยิ่งช้างเผือก ชั้นประถมาภรณ์ช้างเผือก(ป.ช.)">เครื่องราชอิสริยาภรณ์อันเป็นที่เชิดชูยิ่งช้างเผือก ชั้นประถมาภรณ์ช้างเผือก(ป.ช.)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ranksub">ราชกิจจานุเบกษา</label>
                                                            <input type="text" class="form-control" id="addranksub" name="addranksub">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankpart">ตอนที่</label>
                                                            <input type="text" class="form-control" id="addrankpart" name="addrankpart">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankpage">หน้าที่</label>
                                                            <input type="text" class="form-control" id="addrankpage" name="addrankpage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankno">ลำดับ</label>
                                                            <input type="text" class="form-control" id="addrankno" name="addrankno">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankdate">ลงวันที่</label>
                                                            <input type="date" class="form-control" id="addrankdate" name="addrankdate">
                                                        </div>

                                                        <input type="hidden" name="rankMethod" id="rankMethod" value="1">
                                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--โมเดลแก้ไข-->
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="rankedit" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                    <h4 class="modal-title">แก้ไขข้อมูลเครื่องราชอิสริยาภรณ์</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="post" action="action.php" enctype="multipart/form-data">
                                                        <input type="hidden" name="idrank" id="idrank" value="">
                                                        <div class="form-group">
                                                            <label for="rankyear">ปีที่ได้รับพระราชทาน</label>
                                                            <input type="number" min="1900" max="2099" step="1" value="2018" class="form-control" id="rankyear" name="rankyear" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ranklv">ขั้นเครื่อราชอิสริยาภรณ์ที่ได้รับ</label>
                                                            <input type="text" class="form-control" id="ranklv" name="ranklv">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ranksub">ราชกิจจานุเบกษา</label>
                                                            <input type="text" class="form-control" id="ranksub" name="ranksub">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankpart">ตอนที่</label>
                                                            <input type="text" class="form-control" id="rankpart" name="rankpart">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankpage">หน้าที่</label>
                                                            <input type="text" class="form-control" id="rankpage" name="rankpage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankno">ลำดับ</label>
                                                            <input type="text" class="form-control" id="rankno" name="rankno">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rankdate">ลงวันที่</label>
                                                            <input type="date" class="form-control" id="rankdate" name="rankdate">
                                                        </div>


                                                        <input type="hidden" name="rankMethod2" id="rankMethod2" value="2">


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

    $('.rankedit').click(function(){
        var idrank = $(this).attr('data-idrank');
        var rankyear = $(this).attr('data-rankyear');
        var ranklv = $(this).attr('data-ranklv');
        var ranksub = $(this).attr('data-ranksub');
        var rankpart = $(this).attr('data-rankpart');
        var rankpage = $(this).attr('data-rankpage');
        var rankno = $(this).attr('data-rankno');
        var rankdate = $(this).attr('data-rankdate');

        $('#idrank').val(idrank);
        $('#rankyear').val(rankyear);
        $('#ranklv').val(ranklv);
        $('#ranksub').val(ranksub);
        $('#rankpart').val(rankpart);
        $('#rankpage').val(rankpage);
        $('#rankno').val(rankno);
        $('#rankdate').val(rankdate);
        $('#rankedit').modal('show');

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


