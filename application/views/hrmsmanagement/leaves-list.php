<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave List</h4>
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
											<th class="text-center">Status</th>
											
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
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-success"></i> Approved</i>
													</a>
													
												</div>
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
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> Reject</i>
													</a>
													
												</div>
											</td>
											
										</tr>
										
										
									</tbody>
								</table>
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
