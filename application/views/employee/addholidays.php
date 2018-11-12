
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						
						
					</div>
					<div class="modal-body">
					<form id="defaultForm" method="post" class="m-b-20" action="<?php echo base_url('employee/addholidaypost'); ?>" enctype="multipart/form-data">
							
							<h4 class="modal-title">Add Holiday</h4>
						             <br>
									<div class="form-group">
									<label>Holiday Name <span class="text-danger">*</span></label>
									<input class="form-control"  type="text" name="holiday_name"  >
								</div>
										<div class="form-group">
									<label>Holiday Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="holiday_date" ></div>
								</div>
								<div class="form-group">
									<label>Holiday Week Day<span class="text-danger">*</span></label>
									<input class="form-control"  type="text" name="holiday_day"   >
								</div>
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Create Holiday</button>

								</div>
									
								
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>

<script>
$(function(){
    $('#address_same').click(function() {
        if($(this).is(':checked'))
			$('#same_as_above').hide();
        else
          $('#same_as_above').show();
    });
});
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			holiday_name:{
			validators: {
					notEmpty: {
						message: 'Holiday Name is required'
					}
				}
            },
			holiday_date: {
               validators: {
					notEmpty: {
						message: 'Joining Date is required'
					},
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			holiday_day:{
           validators: {
					notEmpty: {
						message: 'Holiday Day is required'
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


</script>




