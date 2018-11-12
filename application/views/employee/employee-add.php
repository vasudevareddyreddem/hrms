
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
							<form id="defaultForm" method="post" action="<?php echo base_url('employee/employeeaddpost'); ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select class="select" id="l_type" name="l_type">
										<option value="">Select Leave Type</option>
										<option value="Casual Leave">Casual Leave</option>
										<option value="Medical Leave">Medical Leave</option>
										<option value="Loss of Pay">Loss of Pay</option>
									</select>
								</div>
						
								
								
								 <div id="reserve_form">
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
<<<<<<< HEAD
									<div id="pickup_date"><p><input type="date" class="textbox" name="f_date" id="pick_date" onchange="cal()"</p></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div id="dropoff_date"><p><input type="date" class="textbox" name="t_date" id="drop_date" onchange="cal()"/></p></div>
=======
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="f_date"></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="t_date"></div>
>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
								</div>
								
								<div class="form-group">
									<label>Number of days <span class="text-danger">*</span></label>
<<<<<<< HEAD
									 <div id="numdays"><input  type="text" class="textbox" id="numdays2"    name="no_days" /></div>
								</div>
=======
									<input class="form-control"  type="text" name="no_days">
>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
								</div>
								
								<div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control" name="l_reason"></textarea>
								</div>
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Send Leave Request</button>

								</div>
							</form>
						</div>
					</div>
				</div>
			
			
			
			
            </div>
<<<<<<< HEAD
			
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
			
=======

>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
<script>
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			l_type:{
			validators: {
					notEmpty: {
						message: 'Leave Type   is required'
					}
				}
            },
			f_date: {
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
			t_date: {
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
			no_days:{
           validators: {
					notEmpty: {
						message: 'Number of days is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Number of days must be digits'
   					}
				}
            },
			r_leaves:{
           validators: {
					notEmpty: {
						message: 'Remaining Leaves is required'
					}
				}
            },
			l_reason:{
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
