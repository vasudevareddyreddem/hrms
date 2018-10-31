
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title"> Edit Department</h4>
						</div>
						
					</div>
					 <div class="nav-tabs-custom">
			
			
			       <div class="tab-content">
             
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/editdepartmentpost');?>" enctype="multipart/form-data">
					<input type="hidden" id="d_id" name="d_id" value="<?php echo $edit_department['d_id'] ?>">

								<div class="row">
								
									<div class="col-sm-4">  
										<div class="form-group">
											<label class="control-label">Department </label>
											<input  type="text" class="form-control" name="department" value="<?php echo isset($edit_department['department'])?$edit_department['department']:''; ?>" >
										</div>
									</div>
										
										
										
										
									</div>
									
								    
							
								
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Edit Department</button>
									
								</div>
							</form>
							
							
							
							
							
							
							
							
							
							
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
			
            department: {
                validators: {
					notEmpty: {
						message: 'Department is required'
					}
				}
            },
			
			
			
			
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




