
<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title"> <?php echo isset($emp_details['e_login_name'])?$emp_details['e_login_name']:''; ?> Leaves Details</h4>
						</div>
						<div class="col-xs-2"><a href="<?php echo base_url('employee/leaverequests'); ?>" class="btn btn-success btn-block">Back</a></div>
						
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
											<th>Current Month  Lop Leaves</th>
											
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
				
			
			
			
			
            </div>


