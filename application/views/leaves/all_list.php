

<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">All Employees Leave List</h4>
						</div>
					
					</div>
					
					<div class="row">
						<div class="col-md-12">
						<?php if(isset($leave_list) && count($leave_list)>0){ ?>
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Employee Name</th>
											<th>Leave Type</th>
											<th>From</th>
											<th>To</th>
											<th>No of Days</th>
											<th>Reason</th>
											<th>Created Date & Time</th>
											<th class="text-center">Status</th>
											<th class="text-center">Accepted BY</th>
											
										</tr>
									</thead>
									<tbody>
									 <?php foreach($leave_list as $list){ ?>
										<tr>
											<td><?php echo $list['e_login_name'];?></td>
											<td><?php echo $list['l_type'];?></td>
											<td><?php echo $list['from_date'];?></td>
											<td><?php echo $list['to_date'];?></td>
											<td><?php echo $list['number_of_days'];?></td>
											<td><?php echo $list['leaves_reason'];?></td>
											<td><?php echo $list['created_at'];?></td>
											<td><?php  if($list['status']==0){ echo "Pending";}else if($list['status']==1){ echo "Accepted";}else if($list['status']==2){  echo "Rejected"; } ?></td>
											<td><?php echo $list['accepted_name'];?></td>
										</tr>
                                      <?php } ?>
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
