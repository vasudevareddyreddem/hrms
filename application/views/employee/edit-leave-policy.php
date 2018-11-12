
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						
						
					</div>
					<div class="modal-body">
					<form id="defaultForm" method="post" class="m-b-20" action="<?php echo base_url('employee/editleavepolicypost');?>" enctype="multipart/form-data">
					<input type="hidden" id="l_p_id" name="l_p_id" value="<?php echo $edit_leave_policy['l_p_id'] ?>">
		
							<h4 class="modal-title">Edit Leave policy</h4>
						             <br>
									<div class="form-group">
									<label>Casual Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="casual_leaves" id="casual_leaves" value="<?php echo isset($edit_leave_policy['casual_leaves'])?$edit_leave_policy['casual_leaves']:''; ?>" >
								</div>
									<div class="form-group">
									<label>Pay Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="pay_leaves" id="pay_leaves" value="<?php echo isset($edit_leave_policy['pay_leaves'])?$edit_leave_policy['pay_leaves']:''; ?>" >
								</div>
								
								<div class="form-group">
									<label>Medical Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="medical_leaves" id="medical_leaves" value="<?php echo isset($edit_leave_policy['medical_leaves'])?$edit_leave_policy['medical_leaves']:''; ?>" >
								</div>
								
								<div class="form-group">
									<label>Monthly Limit<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="monthly_limit" id="monthly_limit" value="<?php echo isset($edit_leave_policy['monthly_limit'])?$edit_leave_policy['monthly_limit']:''; ?>" >
								</div>
								
								<div class="form-group">
									<label>Total Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="total_leaves"  id="total_leaves" value="<?php echo isset($edit_leave_policy['total_leaves'])?$edit_leave_policy['total_leaves']:''; ?>" >
								</div>
								
								
								
								
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Edit Leave policy</button>

								</div>
									
								
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
<script >
			$(document).ready(function() {

	//alert('ok');
				//  total leaves
			$(".total").keyup(function() { 
			
			
			
				if($('#casual_leaves').val().length>0 && $('#pay_leaves').val().length>0 && $('#medical_leaves').val().length>0 && $('#monthly_limit').val().length>0 ){
					

				val=parseInt($('#casual_leaves').val())+parseInt($('#pay_leaves').val())+parseInt($('#medical_leaves').val());
				$('#total_leaves').val(val);
				}
				
				} );
				


                





			});
			 
	</script>	
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
			casual_leaves:{
			validators: {
					notEmpty: {
						message: 'Casual Leaves is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Casual Leaves must be digits'
   					}
				}
            },			
			
			pay_leaves:{
			validators: {
					notEmpty: {
						message: 'Pay Leaves is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Pay Leaves must be digits'
   					}
				}
            },				
			
			medical_leaves:{
			validators: {
					notEmpty: {
						message: 'Medical Leaves is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Medical Leaves must be digits'
   					}
				}
            },			
			monthly_limit:{
			validators: {
					notEmpty: {
						message: 'Monthly Limit is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Monthly Limit must be digits'
   					}
				}
            },		
			total_leaves:{
			validators: {
					notEmpty: {
						message: 'Total Leaves is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Total Leaves must be digits'
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




