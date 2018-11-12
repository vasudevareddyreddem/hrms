
<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave Request</h4>
						</div>
						
					</div>
					
					
                </div>
				
				<div class="modal-dialog bg-white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Add Leave Request</h4>
						</div>
						<div class="modal-body">
							<form id="defaultForm" method="post" action="<?php echo base_url('employee/addleave');?>" enctype="multipart/form-data">
<<<<<<< HEAD
							
									<div class="col-sm-13">  
									<div class="form-group">
								<label class=" control-label">Employee</label>
								<div class="">
								<select  name="employee" id="employee" class="form-control" >
								<option value="">Select</option>
								<?php if(isset($employee_data) && count($employee_data)>0){ ?>
=======
							<div class="form-group">
									<label>Employee <span class="text-danger">*</span></label>
									<select class="select" id="employee" name="employee">
										<option value="">Select Leave Type</option>
										<?php if(isset($employee_data) && count($employee_data)>0){ ?>
>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
									<?php foreach($employee_data as $list){ ?>
										<option value="<?php echo $list['e_id']; ?>"><?php echo $list['e_login_name']; ?></option>
										
									<?php } ?>
								<?php } ?>
								</select>
								</div>
<<<<<<< HEAD
							</div>
									</div>
										
										
							<div class="col-sm-13">  
									<div class="form-group">
								<label class=" control-label">Leave Type</label>
								<div class="">
								<select  name="leave_type" id="leave_type" class="form-control" >
								<option value="">Select</option>
								<?php if(isset($leaves_data) && count($leaves_data)>0){ ?>
									<?php foreach($leaves_data as $list){ ?>
										<option value="<?php echo $list['l_t_id']; ?>"><?php echo $list['leave_type_name']; ?></option>
										
									<?php } ?>
								<?php } ?>
								</select>
=======
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select class="select" id="leave_type" name="leave_type">
										<option value="">Select Leave Type</option>
										<option value="Casual Leave">Casual Leave</option>
										<option value="Medical Leave">Medical Leave</option>
										<option value="Loss of Pay">Loss of Pay</option>
									</select>
>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
								</div>
							</div>
									</div>
							
							
							
								
								 <div id="reserve_form">
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
									<div id="from_date"><p><input type="date" class="textbox" name="from_date" id="pick_date" onchange="cal()"</p></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div id="to_date"><p><input type="date" class="textbox" name="to_date" id="drop_date" onchange="cal()"/></p></div>
								</div>
								
								<div class="form-group">
									<label>Number of days <span class="text-danger">*</span></label>
									 <div id="number_of_days"><input  type="text" class="textbox" id="numdays2"    name="number_of_days" /></div>
								</div>
								</div>
								
								
								
								
								
								
								<div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control" name="leaves_reason"></textarea>
								</div>
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Send Leave Request</button>

								</div>
							</form>
						</div>
					</div>
				</div>
				
            </div>
			<script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("drop_date").value);
                var pickdt = new Date(document.getElementById("pick_date").value);
                return parseInt(1+(dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("drop_date")){
            document.getElementById("numdays2").value=GetDays();
        }  
    }

    </script>		
<script>
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			employee:{
			validators: {
					notEmpty: {
						message: 'Employee   is required'
					}
				}
            },
			
			leave_type:{
			validators: {
					notEmpty: {
						message: 'Leave Type   is required'
					}
				}
            },
			from_date: {
               validators: {
					notEmpty: {
						message: 'From Date is required'
					},
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			to_date: {
               validators: {
					notEmpty: {
						message: 'To  Date is required'
					},
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			number_of_days:{
           validators: {
					notEmpty: {
						message: 'Number of days is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Number of days must be digits'
   					}
				}
            },
			remaining_leaves:{
           validators: {
					notEmpty: {
						message: 'Remaining Leaves is required'
					}
				}
            },
			leaves_reason:{
			validators: {
					notEmpty: {
						message: 'Leave Reason   is required'
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


  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
