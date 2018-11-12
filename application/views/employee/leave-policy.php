
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						
						
					</div>
					<div class="modal-body">
					<form id="defaultForm" method="post" class="m-b-20" action="<?php echo base_url('employee/addleavepolicy');?>" enctype="multipart/form-data">
							
							<h4 class="modal-title">Leave policy</h4>
						             <br>
									<div class="form-group">
									<label>Casual Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="casual_leaves" id="casual_leaves"  >
								</div>
									<div class="form-group">
									<label>Pay Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="pay_leaves" id="pay_leaves" >
								</div>
								
								<div class="form-group">
									<label>Medical Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="medical_leaves" id="medical_leaves" >
								</div>
								
								<div class="form-group">
									<label>Monthly Limit<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="monthly_limit" id="monthly_limit" >
								</div>
								
								<div class="form-group">
									<label>Total Leaves<span class="text-danger">*</span></label>
									<input class="form-control total"  type="text" name="total_leaves" id="total_leaves" >
								</div>
								
								
								
								
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Leave policy</button>

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
					

				val=parseInt($('#casual_leaves').val())+parseInt($('#pay_leaves').val())+parseInt($('#medical_leaves').val())+parseInt($('#monthly_limit').val());
				$('#total_leaves').val(val);
				}
				
				} );
				


                
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms





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
					
					regexp: {
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




<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
                <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
                </p>
                
                <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
                </p>
            </div>
        </div>
    </div>
    
</div>
<<<<<<< HEAD
=======
>>>>>>> 12ee8586015622eb8440b17388a3d165c355832b
>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
