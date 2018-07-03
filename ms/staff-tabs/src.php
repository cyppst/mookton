<script src="../js/jquery.js"></script>

<script src="../js/bootstrap.min.js"></script>
<!--custom checkbox & radio-->
<script type="text/javascript" src="../js/ga.js"></script>
<!--custom switch-->
<script src="../js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="../js/jquery.tagsinput.js"></script>
<!-- modal sec-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- jquery ui -->
<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>

<!-- นำเข้า  CSS จาก dataTables -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<!-- นำเข้า  Javascript  จาก   dataTables -->


<!-- nice scroll -->
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>

<!-- jquery ui -->
<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom checkbox & radio-->
<script type="text/javascript" src="../js/ga.js"></script>
<!--custom switch-->
<script src="../js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="../js/jquery.tagsinput.js"></script>

<!-- modal sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>


<script type="text/javascript" language="javascript"
        src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
        src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript"
        src="../js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript"
        src="../js/jszip.min.js"></script>
<script type="text/javascript" language="javascript"
        src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript"
        src="../js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="../js/buttons.colVis.min.js"></script>
<!-- datatableeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->

<!-- ck editor -->
<script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
<!-- custom form component script for this page-->
<script src="../js/form-component.js"></script>
<!-- custome script for all page -->
<script src="../js/scripts.js"></script>

<script>
    $(document).ready(function () {
        $('#example1').DataTable({
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
                {extend: 'excel', text: 'Excel File'},
                {
                    text: 'PDF',
                    action: function (e, dt, button, config) {
                        <?php
                        if ($currentPage == 'job.php') {
                        ?>
                        window.location = '/ms/mpdf/job_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
                        <?php
                        } else if ($currentPage == 'salary.php') {
                        ?>
                        window.location = '/ms/mpdf/salary_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
                        <?php
                        }else if ($currentPage == 'education.php') {
                        ?>
                        window.location = '/ms/mpdf/education_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
                        <?php
                        }else if ($currentPage == 'rank.php') {
                        ?>
                        window.location = '/ms/mpdf/rank_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
                        <?php
                        }else if ($currentPage == 'gojob.php') {
                        ?>
                        window.location = '/ms/mpdf/gojob_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
                        <?php
                        }else if ($currentPage == 'train.php') {
                        ?>
                        window.location = '/ms/mpdf/train_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
                        <?php
                        }else if ($currentPage == 'leave.php') {
                        ?>
                        window.location = '/ms/mpdf/leave_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
                        <?php
                        }
                        ?>


                    }
                },
                {extend: 'print', text: 'สั่งพิมพ์ข้อมูลในตาราง', exportOptions: {columns: ':visible'}},
                {extend: 'colvis', text: 'เลือกคอลัมน์'},
            ],
        });
    });
</script>
<?php
if (!empty($_SESSION['message'])) {
    echo "<script>
    swal({
      title: '" . $_SESSION['message'] . "',
      text: 'คลิกเพื่อปิด',
      icon: '" . @$_SESSION['message2'] . "',
      button: 'ตกลง',
    });
    </script>";
}
unset($_SESSION['message2']);
?>

