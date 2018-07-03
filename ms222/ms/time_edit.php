 <div id="time" class="tab-pane">
                  <h1>ตารางเวลาการทำงาน</h1><br><br>
                   
                  <table class="table table-bordered" id="example13">
                  <thead>
                    <tr>
                      <th>วันที่</th>
                      <th>ลงเวลาเข้า</th>
                      <th>ลงเวลาออก</th>                 
                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  $id=$_SESSION["staff_ID"];
                  $sql = "SELECT * FROM rank where staff_ID='$id'";
                          $result = $db_connection->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          ?>
                    <tr>
                      <td><?php $i++; echo $i; ?></td>
                      <td><?php echo $row["rank_year"]; ?></td>
                      <td><?php echo $row["rank_lv"]; ?></td>
                                        
                      <?php  } }else{ ?>
                        <div class="alert alert-danger">
                        <strong>อุปส์ ว่างเปล่า !</strong> กรุณาเพิ่มข้อมูล
                      </div>
                      <?php } ?>
                    </tr>
                  </tbody>
                </table>
                    
                  </div>
                         
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
   <!-- modal sec-->
  <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script> 

  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  
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
            $('#example13').DataTable({
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
    