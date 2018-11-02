
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
					  <ol class="breadcrumb page-breadcrumb pull-right">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               
            </ol>	
						
					</div>
					<div class="modal-body">
					<form id="changepassword" name="changepassword" action="<?php echo base_url('dashboard/changepasswordpost'); ?>" method="post" enctype="multipart/form-data">
								<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
									'hash' => $this->security->get_csrf_hash()
										); ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
							<h4 class="modal-title"><strong>Change Password</strong></h4>
						             <br>
										 <div class="form-group ">
										  <label >Old Password</label>
										  <input type="password" id="oldpassword" name="oldpassword"  class="form-control"  placeholder="Enter Your Old Password" >
										   </div>
												<div class="form-group ">
												  <label >New Password</label>
												  <input type="password" id="password" name="password"  class="form-control"  placeholder="Enter Your New Password" >
												</div>
												<div class="form-group ">
												  <label >Confirm Password</label>
												  <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"  placeholder="Enter Your Confirm Password" >
												</div>
												
												<div class="m-t-20 text-center">
								                  <button type="submit" class="btn btn-warning" >Change Password</button>
									
								                   </div>
											</form>	
								</div>
									
								
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>

<script>
 
	 $(document).ready(function() {
    $('#changepassword').bootstrapValidator({
        
        fields: {
            oldpassword: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Old Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Old Password wont allow <>[]'
					}
				}
            }, password: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
           
            confirmpassword: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and confirm Password do not match'
					}
					}
				}
            }
        })
     
});

</script>
