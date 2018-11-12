
<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave Request</h4>
						</div>
						
					</div>
					
					
                </div>
						<table id="" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Casual Leaves</th>
											<th>Pay Leaves</th>
											<th>Medical Leaves</th>
											<th>Total Leaves</th>
											<th>Month Limit</th>
											<th>Remaining Casual Leaves</th>
											<th>Remaining Pay Leaves</th>
											<th>Remaining Medical Leaves</th>
											<th>Current Month Leaves</th>
											<th>Current Month  LOP Leaves</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
										<td><?php echo isset($leave_polices_list['casual_leaves'])?$leave_polices_list['casual_leaves']:''; ?></td>	
										<td><?php echo isset($leave_polices_list['pay_leaves'])?$leave_polices_list['pay_leaves']:''; ?></td>
										<td><?php echo isset($leave_polices_list['medical_leaves'])?$leave_polices_list['medical_leaves']:''; ?></td>
										<td><?php echo isset($leave_polices_list['total_leaves'])?$leave_polices_list['total_leaves']:''; ?></td>
										<td><?php echo isset($leave_polices_list['monthly_limit'])?$leave_polices_list['monthly_limit']:''; ?></td>
										<td><?php echo isset($remaining_Casual_leaves)?$remaining_Casual_leaves:''; ?></td>
										<td><?php echo isset($remaining_lop_leaves)?$remaining_lop_leaves:''; ?></td>
										<td><?php echo isset($remaining_mdical_leaves)?$remaining_mdical_leaves:''; ?></td>	
										<td><?php echo isset($current_month_leave)?$current_month_leave:''; ?></td>
										<td><?php echo isset($current_month_lop_leave)?$current_month_lop_leave:''; ?></td>
											
											
										</tr>
                                         
										
									
									</tbody>
								</table>
				<div class="modal-dialog bg-white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Add Leave Request</h4>
						</div>
						<div class="modal-body">
							<form autocomplete="off" id="" method="post" action="<?php echo base_url('employee/leavespost'); ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>

									<select class="select form-control" id="l_type" name="l_type" required>
										<option value="">Select Leave Type</option>
										<?php if(isset($leaves_types) && count($leaves_types)>0){ ?>
											<?php foreach($leaves_types as $list){ ?>
												<option value="<?php echo isset($list['l_t_id'])?$list['l_t_id']:''; ?>"><?php echo isset($list['leave_type_name'])?$list['leave_type_name']:''; ?></option>
											<?php } ?>
										<?php } ?>
										</select>
										
										</div>
										<div class="form-group">
									<label>From <span class="text-danger">*</span></label>

									<div class="cal-icon"><input class="form-control datepicker" type="text" name="f_date" id="f_date" required></div>
									
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>

									<div class="cal-icon"><input class="form-control datepicker" type="text" name="t_date" id="t_date" required></div>
									
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
