
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title"> Edit Shift</h4>
						</div>
						
					</div>
					 <div class="nav-tabs-custom">
			
			
			       <div class="tab-content">
             
					<form id="defaultForm" method="post" class="m-b-30" action="" enctype="multipart/form-data">

								<div class="modal-body card-box">
								<p>Are you sure want to Edit Shift?</p>
									<div class="">
									<div class="form-group" >
									<label class=" control-label">Shift</label>
									<div class="">
										<select id="e_shift" name="e_shift"  class="form-control" >
										<option value="">Select</option>
										<?php if(isset($shift_data) && count($shift_data)>0){ ?>
											<?php foreach($shift_data as $list){ ?>
											
													<?php if($edit_employee['e_shift']==$list['s_id']){ ?>
															<option selected value="<?php echo $list['s_id']; ?>"><?php echo $list['shift']; ?></option>
													<?php }else{ ?>
															<option value="<?php echo $list['s_id']; ?>"><?php echo $list['shift']; ?></option>
													<?php } ?>
											<?php } ?>
										<?php } ?>
										</select>
									</div>
								</div>
									
									</div>
								<div class="m-t-20"> <a href="<?php echo base_url('employee/shiftmangement');?>" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-success">Change Shift</button>
								</div>
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
			
            shift: {
                validators: {
					notEmpty: {
						message: 'Shift is required'
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




