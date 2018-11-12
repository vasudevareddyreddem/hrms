
<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave Request</h4>
						</div>
						
					</div>
					
					
                </div>
				
				<div class="modal-dialog bg-white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Add Leave Request</h4>
						</div>
						<div class="modal-body">
							<form autocomplete="off" id="defaultForm" method="post" action="<?php echo base_url('employee/leavespost'); ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
<<<<<<< HEAD
									<select class="select form-control" id="l_type" name="l_type" required>
										<option value="">Select Leave Type</option>
										<option value="Casual Leave">Casual Leave</option>
										<option value="Medical Leave">Medical Leave</option>
										<option value="Loss of Pay">Loss of Pay</option>
=======
									<select class="select" id="l_type" name="l_type">
										<option value="">Select Employee</option>
										<?php if(isset($leaves_data) && count($leaves_data)>0){ ?>
									<?php foreach($leaves_data as $list){ ?>
										<option value="<?php echo $list['l_t_id']; ?>"><?php echo $list['leave_type_name']; ?></option>
										
									<?php } ?>
								<?php } ?>
>>>>>>> 82d3ad61c42d03a4cd2462e25ce935e7450ae866
									</select>
								</div>
						
								
								
								 <div id="reserve_form">
								
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
<<<<<<< HEAD
									<div class="cal-icon"><input class="form-control datepicker" type="text" name="f_date" id="fdatepicker" required></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datepicker" type="text" name="t_date"  id="tdatepicker1" required></div>
								</div>
								
									
=======
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
									<div id="pickup_date"><p><input type="text" class="textbox" name="f_date" id="pick_date" onchange="cal()"</p></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div id="dropoff_date"><p><input type="date" class="textbox" name="t_date" id="drop_date" onchange="cal()"/></p></div>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="f_date"></div>
=======
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="f_date" id="f_date" ></div>
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
=======
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="f_date" id="f_date" ></div>
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
=======
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="f_date" id="f_date" ></div>
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="t_date" id="t_date" ></div>
								</div>
								
								<div class="form-group">
									<label>Number of days <span class="text-danger">*</span></label>
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
									 <div id="numdays"><input  type="text" class="textbox" id="numdays2"    name="no_days" /></div>
								</div>
									<input class="form-control"  type="text" name="no_days">
=======
									<input class="form-control"  onClick="CalculateDiff();" type="text" name="no_days" id="no_days">
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
=======
									<input class="form-control"  onClick="CalculateDiff();" type="text" name="no_days" id="no_days">
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
=======
									<input class="form-control"  onClick="CalculateDiff();" type="text" name="no_days" id="no_days">
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
>>>>>>> 82d3ad61c42d03a4cd2462e25ce935e7450ae866
								</div>
								
								<div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control" name="l_reason" required></textarea>
								</div>
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Send Leave Request</button>

								</div>
							</form>
						</div>
					</div>
				</div>
			
			
			
			
            </div>
<<<<<<< HEAD
=======
			
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
<<<<<<< HEAD:application/views/employee/emp_leave_add.php
		<script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("drop_date").value);
                var pickdt = new Date(document.getElementById("pick_date").value);
                return parseInt(1+(dropdt - pickdt) / (24 * 3600 * 1000));
        }
>>>>>>> 82d3ad61c42d03a4cd2462e25ce935e7450ae866

	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>		

=======
				
			
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
=======
				
			
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
=======
				
			
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms:application/views/employee/employee-add.php
<script>

$('.datepicker').datepicker({

 minDate:new Date(),
  dateFormat: 'yy-mm-dd'
});
		


</script>
