
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						
						
					</div>
					<div class="modal-body">
					<form autocomplete="off" id="defaultForm" method="post" class="m-b-20" action="<?php echo base_url('employee/applyresignation');?>" enctype="multipart/form-data">
					
		
							<h4 class="modal-title">Employee resignation </h4> 
						             <br>
									 <?php if(isset($resignation_details['content']) && $resignation_details['content']!=''){ ?> 
									 <div><b>Accepted Status: <?php if($resignation_details['accept_status']==1){ echo "Accepted"; }else if($resignation_details['accept_status']==2){ echo "Rejected"; }else{ echo "Initiated";} ?></b></div>
									 <?php } ?>
								
								<div class="form-group">
									<label>Employee resignation <span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="content"  id="content" value="<?php echo isset($resignation_details['content'])?$resignation_details['content']:''; ?>" >
									</div>
									<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php if(isset($resignation_details['content']) && $resignation_details['content']!=''){ echo 'Update';}else{ echo "Apply";}  ?> </button>

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
			content:{
			  validators: {
					notEmpty: {
						message: 'Employee resignation is required'
					}
				}
            }	
		 }
    });
	
});



</script>




