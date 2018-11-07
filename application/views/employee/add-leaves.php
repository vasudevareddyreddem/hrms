
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
							<form id="defaultForm" method="post" action="<?php echo base_url('employee/addleave');?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select class="select" id="leave_type" name="leave_type">
										<option value="">Select Leave Type</option>
										<option value="Casual Leave 12 Days">Casual Leave 12 Days</option>
										<option value="Medical Leave">Medical Leave</option>
										<option value="Loss of Pay">Loss of Pay</option>
									</select>
								</div>
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="from_date"></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="to_date"></div>
								</div>
								<div class="form-group">
									<label>Number of days <span class="text-danger">*</span></label>
									<input class="form-control"  type="text" name="number_of_days">
								</div>
								<div class="form-group">
									<label>Remaining Leaves <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="remaining_leaves">
								</div>
								<div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control" name="leaves_reason"></textarea>
								</div>
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Send Leave Request</button>

								</div>
							</form>
						</div>
					</div>
				</div>
			
			
			
			
            </div>

<script>
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			leave_type:{
			validators: {
					notEmpty: {
						message: 'Leave Type   is required'
					}
				}
            },
			from_date: {
               validators: {
					notEmpty: {
						message: 'From Date is required'
					},
					date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			to_date: {
               validators: {
					notEmpty: {
						message: 'To  Date is required'
					},
					date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			number_of_days:{
           validators: {
					notEmpty: {
						message: 'Number of days is required'
					}
				}
            },
			remaining_leaves:{
           validators: {
					notEmpty: {
						message: 'Remaining Leaves is required'
					}
				}
            },
			leaves_reason:{
			validators: {
					notEmpty: {
						message: 'Leave Reason   is required'
					}
				}
            }
			
			
			
        }
    });
    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
	
});


  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>