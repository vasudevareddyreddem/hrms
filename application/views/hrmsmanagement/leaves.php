<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave Request</h4>
						</div>
						<div class="col-xs-4 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Employee</th>
											<th>Leave Type</th>
											<th>From</th>
											<th>To</th>
											<th>No of Days</th>
											<th>Reason</th>
											
											<th  class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<a class="avatar">R</a>
												<h2><a href="#">Richard Miles <span>Web Developer</span></a></h2>
											</td>
											<td>Casual Leave</td>
											<td>8 Aug 2017</td>
											<td>8 Aug 2017</td>
											<td>2 days</td>
											<td>Going to Hospital</td>
											<td  class="text-center">
												<button class="btn btn-sm btn-success">Accept</button>
												<button class="btn btn-sm btn-danger">Reject</button>
												
											</td>
										</tr>
<tr>
											<td>
												<a class="avatar">R</a>
												<h2><a href="#">Richard Miles <span>Web Developer</span></a></h2>
											</td>
											<td>Casual Leave</td>
											<td>8 Aug 2017</td>
											<td>8 Aug 2017</td>
											<td>2 days</td>
											<td>Going to Hospital</td>
											<td  class="text-center">
												<button class="btn btn-sm btn-success">Accept</button>
												<button class="btn btn-sm btn-danger">Reject</button>
												
											</td>
										</tr>
<tr>
											<td>
												<a class="avatar">R</a>
												<h2><a href="#">Richard Miles <span>Web Developer</span></a></h2>
											</td>
											<td>Casual Leave</td>
											<td>8 Aug 2017</td>
											<td>8 Aug 2017</td>
											<td>2 days</td>
											<td>Going to Hospital</td>
											<td  class="text-center">
												<button class="btn btn-sm btn-success">Accept</button>
												<button class="btn btn-sm btn-danger">Reject</button>
												
											</td>
										</tr>
<tr>
											<td>
												<a class="avatar">R</a>
												<h2><a href="#">Richard Miles <span>Web Developer</span></a></h2>
											</td>
											<td>Casual Leave</td>
											<td>8 Aug 2017</td>
											<td>8 Aug 2017</td>
											<td>2 days</td>
											<td>Going to Hospital</td>
											<td  class="text-center">
												<button class="btn btn-sm btn-success">Accept</button>
												<button class="btn btn-sm btn-danger">Reject</button>
												
											</td>
										</tr>
<tr>
											<td>
												<a class="avatar">R</a>
												<h2><a href="#">Richard Miles <span>Web Developer</span></a></h2>
											</td>
											<td>Casual Leave</td>
											<td>8 Aug 2017</td>
											<td>8 Aug 2017</td>
											<td>2 days</td>
											<td>Going to Hospital</td>
											<td  class="text-center">
												<button class="btn btn-sm btn-success">Accept</button>
												<button class="btn btn-sm btn-danger">Reject</button>
												
											</td>
										</tr>
										
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<div id="add_leave" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog bg-white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Add Leave Request</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select class="select">
										<option value="">Select Leave Type</option>
										<option value="">Casual Leave 12 Days</option>
										<option value="">Medical Leave</option>
										<option value="">Loss of Pay</option>
									</select>
								</div>
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
								</div>
								<div class="form-group">
									<label>Number of days <span class="text-danger">*</span></label>
									<input class="form-control" readonly="" type="text">
								</div>
								<div class="form-group">
									<label>Remaining Leaves <span class="text-danger">*</span></label>
									<input class="form-control" readonly="" value="12" type="text">
								</div>
								<div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control"></textarea>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Send Leave Request</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_leave" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Edit Leave</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select class="select">
										<option value="">Select Leave Type</option>
										<option value="">Casual Leave 12 Days</option>
									</select>
								</div>
								<div class="form-group">
									<label>From <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2017" type="text"></div>
								</div>
								<div class="form-group">
									<label>To <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2017" type="text"></div>
								</div>
								<div class="form-group">
									<label>Number of days <span class="text-danger">*</span></label>
									<input class="form-control" readonly="" type="text" value="2">
								</div>
								<div class="form-group">
									<label>Remaining Leaves <span class="text-danger">*</span></label>
									<input class="form-control" readonly="" value="12" type="text">
								</div>
								<div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control">Going to hospital</textarea>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
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
