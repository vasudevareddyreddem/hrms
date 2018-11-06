
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
