<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Shift Mangement</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							&nbsp;
						
						</div>
					</div>
					<form>
					
					<div class="row">
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
							<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:30%;">Name</th>
											<th>Employee ID</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Join Date</th>
											<th>Role</th>
											<th>Shift</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										
									
										<tr>
											<td>
												<a href="#" class="avatar">J</a>
												<h2><a href="#">Jeffrey Warden <span>Shift Incharge</span></a></h2>
											</td>
											<td>FT-0006</td>
											<td>jeffreywarden@example.com</td>
											<td>9876543210</td>
											<td>16 Jun 2013</td>
											<td>Shift Incharge</td>
											<td>A</td>
											<td class="text-right"><a href="#" data-toggle="modal" data-target="#edit_employee"><span class="btn btn-sm btn-warning"><i class="fa fa-pencil m-r-5"></i> Edit</span></a>
											</td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				
            </div>
			
			
			<div id="edit_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Edit Shift</h4>
						</div>
						<form>
							<div class="modal-body card-box">
								<p>Are you sure want to Edit Shift?</p>
									<div class="">
											<div class="form-group">
											<label class="control-label">Select Shift</label>
											<select class="select">
													<option value="">Select Shift</option>
													<option value="">A</option>
													<option value="">B</option>
													<option value="">C</option>
													
											</select>
										</div>
									</div>
								<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-success">Change Shift</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
<?php include("footer.php"); ?>
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


