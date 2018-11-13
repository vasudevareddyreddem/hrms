

<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave List</h4>
						</div>
					
					</div>
					
					<div class="row">
						<div class="col-md-12">
						<?php if(isset($leaves) && count($leaves)>0){ ?>
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Leave Type</th>
											<th>Hr Considered</th>
											<th>From</th>
											<th>To</th>
											<th>No of Days</th>
											<th>Reason</th>
											<th>Created Date & Time</th>
											<th class="text-center">Status</th>
											
										</tr>
									</thead>
									<tbody>
									<?php foreach($leaves as $list){ ?>
										<tr>
										
											<td><?php echo $list['l_type'];?></td>
											<td><?php if($list['consider_as']==0){ echo "As you applied";}else{ echo "LOP"; } ?></td>
											<td><?php echo $list['from_date'];?></td>
											<td><?php echo $list['to_date'];?></td>
											<td><?php echo $list['number_of_days'];?></td>
											<td><?php echo $list['leaves_reason'];?></td>
											<td><?php echo $list['created_at'];?></td>
											<td class="text-center">
											<?php if($list['status']==1){  ?>
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-success"></i> Approved</i>
													</a>
									
												</div>
												<?php }else if($list['status']==0){ ?>
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> Pending</i>
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
      $('#example1').DataTable( {
        "order": [[6, "desc" ]]
    } );
    
  });
</script>
