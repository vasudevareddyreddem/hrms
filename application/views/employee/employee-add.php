
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
							<form id="defaultForm" method="post" action="<?php echo base_url('employee/employeeaddpost'); ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select class="select" id="l_type" name="l_type">
										<option value="">Select Employee</option>
										<?php if(isset($leaves_data) && count($leaves_data)>0){ ?>
									<?php foreach($leaves_data as $list){ ?>
										<option value="<?php echo $list['l_t_id']; ?>"><?php echo $list['leave_type_name']; ?></option>
										
									<?php } ?>
								<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="f_date" id="f_date"></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="t_date" id="t_date"></div>
								</div>
								<div class="form-group">
									<label>Number of days <span class="text-danger">*</span></label>
									<input class="form-control"  type="text" name="no_days" id="no_days">
								</div>
								
								<div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control" name="l_reason"></textarea>
								</div>
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Send Leave Request</button>

								</div>
							</form>
						</div>
					</div>
				</div>
			
			
			
			
            </div>
			
			
		 <script type="text/javascript" src="date.js"></script>
        <script type="text/javascript">
		$( document ).ready(function() {
           // var minutes = 1000*60;
            //var hours = minutes*60;
           // var days = hours*24;
			
			from_date=$('#f_date').val();
			  //var foo_date1 = getDateFromFormat(from_date, "d/m/y");
			  $(document).on('focusout','#f_date',function(){
			 
			//alert($('#f_date').val());
			  });
			 to_date=$('#t_date').val(); 
			$(document).on('focusout','#t_date',function(){
			 
			alert($('#t_date').val());
			  });

            var diff_date = Math.round((to_date - from_date)/days);
           alert("Diff date is: " + diff_date );
		   
		   
		   
		});
        </script>
			
			
<script>
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			l_type:{
			validators: {
					notEmpty: {
						message: 'Leave Type   is required'
					}
				}
            },
			f_date: {
               validators: {
					notEmpty: {
						message: 'From Date is required'
					},
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			t_date: {
               validators: {
					notEmpty: {
						message: 'To  Date is required'
					},
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			no_days:{
           validators: {
					notEmpty: {
						message: 'Number of days is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Number of days must be digits'
   					}
				}
            },
			r_leaves:{
           validators: {
					notEmpty: {
						message: 'Remaining Leaves is required'
					}
				}
            },
			l_reason:{
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
