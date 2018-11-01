
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-6">
							<h4 class="page-title">Edit Sub Department</h4>
						</div>
						
					</div>
					 
			
			       <div class="tab-content">
           
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/editsubdepartmentpost');?>" enctype="multipart/form-data">
					<input type="hidden" id="s_d_id" name="s_d_id" value="<?php echo $edit_subdepartment['s_d_id'] ?>">

								<div class="row">
									<div class="col-sm-6">  
									<div class="form-group">
									<label class=" control-label">Department</label>
									<div class="">
										<select id="department" name="department"  class="form-control" >
										<option value="">Select</option>
										<?php if(isset($department_data) && count($department_data)>0){ ?>
											<?php foreach($department_data as $list){ ?>
											
													<?php if($edit_subdepartment['department']==$list['d_id']){ ?>
															<option selected value="<?php echo $list['d_id']; ?>"><?php echo $list['department']; ?></option>
													<?php }else{ ?>
															<option value="<?php echo $list['d_id']; ?>"><?php echo $list['department']; ?></option>
													<?php } ?>
											<?php } ?>
										<?php } ?>
										</select>
									</div>
								</div>
									
									</div>
										
										<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Sub Department</label>
											<input  type="text" class="form-control" name="sub_department" value="<?php echo isset($edit_subdepartment['sub_department'])?$edit_subdepartment['sub_department']:''; ?>" >
										</div>
									</div>
										
										
									</div>
									
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Edit Sub Department</button>
									
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
			
            department: {
                validators: {
					notEmpty: {
						message: 'department is required'
					}
				}
            },
			sub_department: {
                validators: {
					notEmpty: {
						message: 'sub department is required'
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





            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Sub Department</h4>
						</div>
						
					</div>
					 
			
			       <div class="tab-content">
           
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/addsubdepartment');?>" enctype="multipart/form-data">
							
								<div class="row">
									<div class="col-sm-4">  
									<div class="form-group">
								<label class=" control-label">Department</label>
								<div class="">
								<select id="department" name="department"  class="form-control" >
								<option value="">Select</option>
								<?php foreach ($department_data as $list){ ?>
								<option value="<?php echo $list['d_id']; ?>"><?php echo $list['department']; ?></option>
								<?php }?>
								</select>
								</div>
							</div>
									</div>
										
										<div class="col-sm-4">  
										<div class="form-group">
											<label class="control-label">Sub Department</label>
											<input  type="text" class="form-control" name="sub_department" >
										</div>
									</div>
										
										
									</div>
									
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add Sub Department</button>
									
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
			
            department: {
                validators: {
					notEmpty: {
						message: 'department is required'
					}
				}
            },
			sub_department: {
                validators: {
					notEmpty: {
						message: 'sub department is required'
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





            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title"> Edit Shift</h4>
						</div>
						
					</div>
					 <div class="nav-tabs-custom">
			
			
			       <div class="tab-content">
             
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/editshiftpost');?>" enctype="multipart/form-data">
					<input type="hidden" id="s_id" name="s_id" value="<?php echo $edit_shift['s_id'] ?>">

								<div class="row">
								
									<div class="col-sm-4">  
										<div class="form-group">
											<label class="control-label">Shift </label>
											<input  type="text" class="form-control" name="shift" value="<?php echo isset($edit_shift['shift'])?$edit_shift['shift']:''; ?>" >
										</div>
									</div>
										
										
										
										
									</div>
									
								    
							
								
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Edit Shift</button>
									
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




