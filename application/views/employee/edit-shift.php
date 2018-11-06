
            
			
			
				<div class="modal-dialog" style='margin-top: 80px'>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Edit Shift</h4>
						</div>
						<form id="defaultForm" method="post" action="<?php echo base_url('empmanagment/shiftchange') ?>">
							<div class="modal-body card-box">
								<p>Are you sure want to Edit Shift?</p>
									<div class="">
											<div class="form-group">
												<input type='hidden' value='<?php echo $shift_edit['e_id']?>'  name='eid'>
											<label class="control-label">Select Shift</label>
											<select class="select" name="shift">


													<option value="">Select Shift</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>

												<?php foreach($shiftlist as $shift):?>
												<option value='<?php echo $shift['s_id'];?>' <?php if ($shift['s_id']== $shift_edit['e_shift']) echo ' selected';?> ><?php echo $shift['shift'];?> </option>
												<?php endforeach?>	


												<?php foreach($shiftlist as $shift):?>
												<option value='<?php echo $shift['s_id'];?>' <?php if ($shift['s_id']== $shift_edit['e_shift']) echo ' selected';?> ><?php echo $shift['shift'];?> </option>
												<?php endforeach?>	

													
											</select>
										</div>
									</div>
								<div class="m-t-20"><!-- <button type='button' class="btn btn-success" data-dismiss='modal'>Close</button> -->
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





