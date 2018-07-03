          		  <link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>
		  <div id="train" class="tab-pane">
                  <h1>ประวัติการฝึกอบรม ดูงาน</h1><br><br>
                      <div class="row">
                  
                          <div class="col-lg-offset-2 col-lg-3 pull-right">
                          <a href="#trainadd" data-toggle="modal" class="btn btn-primary icon_plus_alt2">
                                  เพิ่ม
                                  </a>
                          
                        </div>
                      </div>
			
     <script type="text/javascript">

$(function(){

	var startDateTextBox = $('#dateStart');
	var endDateTextBox = $('#dateEnd');

	startDateTextBox.datepicker({ 
		dateFormat: 'dd-M-yy',
		onClose: function(dateText, inst) {
			if (endDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					endDateTextBox.datetimepicker('setDate', testStartDate);
			}
			else {
				endDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
		}
	});
	endDateTextBox.datepicker({ 
		dateFormat: 'dd-M-yy',
		onClose: function(dateText, inst) {
			if (startDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					startDateTextBox.datetimepicker('setDate', testEndDate);
			}
			else {
				startDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
		}
	});

});

</script>
Start Date : <input type="text" name="dateStart" id="dateStart" value="" /> 
End Date : <input type="text" name="dateEnd" id="dateEnd" value="" /> 
<table class="table" id="#dateEnd">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>03-Jun-2018</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>04-Jun-2018</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>05-Jun-2018</td>
    </tr>
  </tbody>
</table>
          
                  </div>
				  
                  <!-- profile -->
                  
                  <!-- edit-profile -->
                
 <!--โมเดลเพิ่ม-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="trainadd" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">เพิ่มข้อมูลประวัติการฝึกอบรม</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="sub">หลักสูตร</label>
                            <input type="text" class="form-control" id="addsub" name="addsub" >
                          </div>
                          <div class="form-group">
                            <label for="departmenttrain">หน่วยงานผู้จัด</label>
                            <input type="text" class="form-control" id="adddepartmenttrain" name="adddepartmenttrain" >
                          </div>
                          <div class="form-group">
                            <label for="location">สถานที่</label>
                            <input type="text" class="form-control" id="addlocation" name="addlocation" >
                          </div>
                          <div class="form-group">
                            <label for="yeartrain">ระยะเวลา</label>
                            <input type="date" class="form-control" id="addyeartrain" name="addyeartrain" placeholder="ระยะเวลา">
                          </div>
                          <input type="hidden" name="trainMethod" id="trainMethod" value="1">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
    <!--โมเดลแก้ไข-->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="trainedit" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">แก้ไขข้อมูลประวัติการฝึกอบรม</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="app2.php" enctype="multipart/form-data">
                        <input type="hidden" name="idtrain" id="idtrain" value="">
                        <div class="form-group">
                        <label for="sub">หลักสูตร</label>
                        <input type="text" class="form-control" id="sub" name="sub" >
                      </div>
                      <div class="form-group">
                        <label for="departmenttrain">หน่วยงานผู้จัด</label>
                        <input type="text" class="form-control" id="departmenttrain" name="departmenttrain" >
                      </div>
                      <div class="form-group">
                        <label for="location">สถานที่</label>
                        <input type="text" class="form-control" id="location" name="location" >
                      </div>
                      <div class="form-group">
                        <label for="yeartrain">ระยะเวลา</label>
                        <input type="date" class="form-control" id="yeartrain" name="yeartrain" placeholder="ระยะเวลา">
                      </div>
                        <input type="hidden" name="trainMethod2" id="trainMethod2" value="2">

                         
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                      </div>
                    </div>
                  </div>
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
  


<
    