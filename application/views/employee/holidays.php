
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title"><?php echo date('Y'); ?> Holidays List</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="<?php echo base_url('employee/addholiday'); ?>" class="btn btn-primary rounded"  data-target="#add_holiday"><i class="fa fa-plus"></i> Add New Holiday</a>
						</div>
					</div>
				
					
					<div class="row">
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
						<?php if(isset($holiday_list) && count($holiday_list)>0){ ?>
							<div class="table-responsive">
							
									<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Festival Name </th>
											<th>Holiday Date</th>
											<th>Day</th>
											<th>Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										
									<?php foreach($holiday_list as $list){?>
										
										<tr>
											<td><?php echo $list['holiday_name'] ?></td>
											<td><?php echo $list['holiday_date'] ?></td>
											<td><?php echo $list['holiday_day'] ?></td>
											<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
											<td class="text-right">
													  <a href="<?php echo base_url('employee/viewholidays/'.base64_encode($list['h_id'])); ?>"  data-toggle="tooltip" title="View"><i class="fa fa-eye m-r-5"></i></a>
														<a href="<?php echo base_url('employee/editholidays/'.base64_encode($list['h_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
														<a href="<?php echo base_url('employee/statusholidays/'.base64_encode($list['h_id']).'/'.base64_encode($list['status'])); ?>" data-toggle="tooltip" title="status"><i class="fa fa-info-circle btn btn-warning"></i></a>
                                                       <a href="<?php echo base_url('employee/deleteholidays/'.base64_encode($list['h_id']));?>" data-toggle="tooltip"  title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
												
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
        "order": [[ 3, "desc" ]]
    } );
    
  });
</script>


