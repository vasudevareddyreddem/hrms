
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
									<select class="select form-control" id="l_type" name="l_type" required>
										<option value="">Select Leave Type</option>
										<option value="Casual Leave">Casual Leave</option>
										<option value="Medical Leave">Medical Leave</option>
										<option value="Loss of Pay">Loss of Pay</option>
									</select>
								</div>
						
								
								
								 <div id="reserve_form">
								
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datepicker" type="text" name="f_date" id="fdatepicker" required></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datepicker" type="text" name="t_date"  id="tdatepicker1" required></div>
								</div>
								
									
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

	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>		

<script>

$('.datepicker').datepicker({

 minDate:new Date(),
  dateFormat: 'yy-mm-dd'
});
		


</script>
