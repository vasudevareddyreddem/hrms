<div class="page-wrapper">
    <div class="content container-fluid bg-white">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Assign Work</h4>
            </div>
        </div>
		<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/addwork'); ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
				<div class="form-group">
				<label>Select Employee</label>
				<div class="">
				<select id="work_emplouee_id" name="work_emplouee_id"  class="form-control" >
				<option value="">Select</option>
					<?php if(isset($employee_list) && count($employee_list)>0){ ?>
						<?php foreach ($employee_list as $list){ ?>
						<option value="<?php echo $list['e_id']; ?>"><?php echo $list['e_emplouee_id']; ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				</div>
			  </div>
          </div>
                <div class="col-md-6">
                    <div class="form-group">
				      <label>Allocated Area</label>
				        <div class="">
				        <select id="allocated_area" name="allocated_area"  class="form-control" >
				         <option value="">Select</option>
				        <?php foreach ($area_list as $list){ ?>
				       <option value="<?php echo $list['a_id']; ?>"><?php echo $list['area']; ?></option>
				      <?php }?>
				   </select>
				  </div>
			      </div>
                 </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input class="form-control" type="text" name="mobile_number" id="mobile_number">
                    </div>
                </div>
              
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Work</label>
                        <textarea class="form-control" type="text" name='work' id='work' rows="3" placeholder="Enter here...."></textarea>
                    </div>
                </div>
            </div>
            <div class="m-t-20 text-center">
			<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Assign Work</button>

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










