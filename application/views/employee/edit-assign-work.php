<div class="page-wrapper">
    <div class="content container-fluid bg-white">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Edit Assign Work</h4>
            </div>
        </div>
		<form id="defaultForm" method="post" class="m-b-30" action="<?php  echo base_url('employee/editassignwork');?>" enctype="multipart/form-data">
		<input type="hidden" id="w_d_id" name="w_d_id" value="<?php echo $edit_work['w_d_id'] ?>">

            <div class="row">
                <div class="col-md-6">
				<div class="form-group">
									<label class=" control-label">Select Employee</label>
									<div class="">
										<select id="work_emplouee_id" name="work_emplouee_id"  class="form-control" >
										<option value="">Select</option>
										<?php if(isset($employee_id) && count($employee_id)>0){ ?>
											<?php foreach($employee_id as $list){ ?>
											
													<?php if($edit_work['work_emplouee_id']==$list['e_id']){ ?>
															<option selected value="<?php echo $list['e_id']; ?>"><?php echo $list['e_emplouee_id']; ?></option>
													<?php }else{ ?>
															<option value="<?php echo $list['e_id']; ?>"><?php echo $list['e_emplouee_id']; ?></option>
													<?php } ?>
											<?php } ?>
										<?php } ?>
										</select>
									</div>
								</div>
				
<<<<<<< HEAD

=======
				
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
			  
          </div>
                <div class="col-md-6">
                    <div class="form-group">
				      <label>Allocated Area</label>
				        <div class="">
				        <select id="allocated_area" name="allocated_area" value="<?php echo isset($edit_work['area'])?$edit_work['area']:''; ?>"  class="form-control" >
				         <option value="">Select</option>
				       <?php if(isset($area_list) && count($area_list)>0){ ?>
<<<<<<< HEAD
						<?php foreach($area_list as $list){ ?>
						
								<?php if($edit_work['allocated_area']==$list['a_id']){ ?>
										<option selected value="<?php echo $list['a_id']; ?>"><?php echo $list['area']; ?></option>
								<?php }else{ ?>
										<option value="<?php echo $list['a_id']; ?>"><?php echo $list['area']; ?></option>
								<?php } ?>
						<?php } ?>
					<?php } ?>
					</select>
=======
											<?php foreach($area_list as $list){ ?>
											
													<?php if($edit_work['allocated_area']==$list['a_id']){ ?>
															<option selected value="<?php echo $list['a_id']; ?>"><?php echo $list['area']; ?></option>
													<?php }else{ ?>
															<option value="<?php echo $list['a_id']; ?>"><?php echo $list['area']; ?></option>
													<?php } ?>
											<?php } ?>
										<?php } ?>
										</select>
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
				  </div>
			      </div>
                 </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input class="form-control" type="text" name="mobile_number" id="mobile_number" value="<?php echo isset($edit_work['mobile_number'])?$edit_work['mobile_number']:''; ?>">
                    </div>
                </div>
              
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Work</label>
                        <textarea class="form-control" type="text" name='work' id='work'  rows="3" value=""  placeholder="Enter here...."><?php echo isset($edit_work['work'])?$edit_work['work']:''; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="m-t-20 text-center">
			<button type="submit" class="btn btn-primary" name="signup" value="Sign up"> Edit Assign Work</button>

            </div>
        </form>

    </div>
</div>




<script>

$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			
            work_emplouee_id: {
                    validators: {
                        notEmpty: {
                            message: 'Select Employee is required'
                        }
                    }
                },
			
			allocated_area: {
                    validators: {
                        notEmpty: {
                            message: 'Allocated Area is required'
                        }
                    }
                },
			
			mobile_number: {
                   validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
				
				}
            },
			
			
			work: {
                    validators: {
                        notEmpty: {
                            message: ' Work is required'
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










