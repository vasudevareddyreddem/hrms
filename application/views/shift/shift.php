
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Shift</h4>
						</div>
						
					</div>
					 
			
			       <div class="tab-content">
           
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/addshift'); ?>" enctype="multipart/form-data">
							
								<div class="row">
								
									<div class="col-sm-4">  
										<div class="form-group">
											<label class="control-label">Shift</label>
											<input  type="text" class="form-control" name="shift" >
										</div>
									</div>
										
									</div>
									
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add Shift</button>
									
								</div>
							</form>
							</div>
							
							
						</div>
						</div>
					</div>
				</div>
			</div>

<script>

$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			
            shift: {
                validators: {
					notEmpty: {
						message: 'Shift is required'
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




