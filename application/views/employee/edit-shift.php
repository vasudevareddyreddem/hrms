
            
			
			
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Edit Shift</h4>
						</div>
						<form id="defaultForm" method="post" action="">
							<div class="modal-body card-box">
								<p>Are you sure want to Edit Shift?</p>
									<div class="">
											<div class="form-group">
											<label class="control-label">Select Shift</label>
											<select class="select" name="shift">
													<option value="">Select Shift</option>
													<option value="">A</option>
													<option value="">B</option>
													<option value="">C</option>
													
											</select>
										</div>
									</div>
								<div class="m-t-20"> <a href="<?php echo base_url('employee/shiftmangement');?>" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-success">Change Shift</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			

<script>
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





