

<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave policy List</h4>
						</div>
					
					</div>
					
					<div class="row">
						<div class="col-md-12">
						<?php if(isset($leaves) && count($leaves)>0){ ?>
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Casual Leaves</th>
											<th>Pay Leaves</th>
											<th>Medical Leaves</th>
											<th>Monthly Limit</th>
											<th>Total Leaves</th>
											<th class="text-center">Status</th>
											
										</tr>
									</thead>
									<tbody>
									<?php foreach($leaves as $list){ ?>
										<tr>
										
											
											<td>xxx</td>
											<td>xxx</td>
											<td>xxxx</td>
											<td>xxx</td>
											<td>xxxx</td>
											<td class="text-center">
											<?php if($list['status']==1){  ?>
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-success"></i> Approved</i>
													</a>
									
												</div>
												<?php }else{ ?>
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> Reject</i>
													</a>
													
												</div>
												
												
												<?php }?>
											</td>
											
										</tr>
                                         
										
									<?php }?>
									</tbody>
								</table>
							</div>
							<?php }else{ ?>
                               <div> No data available</div>
                                    <?php }?>
							
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
