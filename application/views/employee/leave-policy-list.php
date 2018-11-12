
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Leave policy List</h4>
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
											
											<th>Casual Leaves</th>
											<th>Pay Leaves</th>
											<th>Medical Leaves</th>
											<th>Monthly Limit</th>
											<th>Total Leaves</th>
											<th class="text-center">Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($leave_policy_list as $list){ ?>
										<tr>
											<td><?php echo $list['casual_leaves'] ;?></td>
											<td><?php echo $list['pay_leaves'] ;?></td>
											<td><?php echo $list['medical_leaves'] ;?></td>
											<td><?php echo $list['monthly_limit'] ;?></td>
											<td><?php echo $list['total_leaves'] ;?></td>
											<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
											<td class="text-right">
											<a href="<?php echo base_url('employee/editleavepolicy/'.base64_encode($list['l_p_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
											<a href="<?php echo base_url('employee/statusleavepolicy/'.base64_encode($list['l_p_id']).'/'.base64_encode($list['status'])); ?>" data-toggle="tooltip" title="status"><i class="fa fa-info-circle btn btn-warning"></i></a>
                                             <a href="<?php echo base_url('employee/deletleavepolicy/'.base64_encode($list['l_p_id']));?>" data-toggle="tooltip"  title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
											</td>
										</tr>
									<?php } ?>
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


