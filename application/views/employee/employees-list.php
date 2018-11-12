
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="<?php echo base_url('employee/add');?>" class="btn btn-primary pull-right rounded" ><i class="fa fa-plus"></i> Add Employee</a>
						
						</div>
					</div>
				
					
					<div class="row">
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
						<?php if(isset($employee_list) && count($employee_list)>0){ ?>
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
											<th>Status</th>
											<th>Created Date</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										
									<?php foreach($employee_list as $list){?>
										
										<tr>
											<td>
											<a href="#" class="avatar"><?php echo substr($list['e_login_name'],0,1);?></a>
											<h2><a href="#"><?php echo $list['e_login_name'];?><span><?php echo $list['role'];?></span></a></h2>
											</td>
											<td><?php echo $list['e_emplouee_id'];?></td>
											<td><?php echo $list['e_email_work'];?></td>
											<td><?php echo $list['e_mobile_personal'];?></td>
											<td><?php echo $list['e_join_date'];?></td>
											<td><?php echo $list['role'];?></td>
											<td><?php echo $list['shift'];?></td>
                                                <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
												<td><?php echo $list['created_at'];?></td>
												<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
													  <li><a href="<?php echo base_url('employee/viewemployee/'.base64_encode($list['e_id'])); ?>"  data-toggle="tooltip" title="View"><i class="fa fa-eye m-r-5"></i></a></li>
														<li><a href="<?php echo base_url('employee/editemployee/'.base64_encode($list['e_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a></li>
														<li><a href="<?php echo base_url('employee/status/'.base64_encode($list['e_id']).'/'.base64_encode($list['status'])); ?>" data-toggle="tooltip" title="status"><i class="fa fa-info-circle btn btn-warning"></i></a></li>
                                                        <li><a href="<?php echo base_url('employee/delete/'.base64_encode($list['e_id']));?>" data-toggle="tooltip"  title="Delete"><i class="fa fa-trash btn btn-danger"></i></a></li>
														
													</ul>
												</div>
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
        "order": [[ 8, "desc" ]]
    } );
    
  });
</script>


