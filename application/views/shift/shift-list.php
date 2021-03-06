
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Shift List</h4>
						</div>
						
					</div>
					<form>
					
					<div class="row">
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
						<?php if(isset($shift_list) && count($shift_list)>0){ ?>
							<div class="table-responsive">
							
									<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											
											<th>Shift</th>
											<th>Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($shift_list as $list){ ?>
										<tr>
											<td><?php echo $list['shift'];?></td>
											<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
											<td class="text-right">
											<a href="<?php echo base_url('employee/editshift/'.base64_encode($list['s_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
											<a href="<?php echo base_url('employee/statusshift/'.base64_encode($list['s_id']).'/'.base64_encode($list['status'])); ?>" data-toggle="tooltip" title="status"><i class="fa fa-info-circle btn btn-warning"></i></a>
                                             <a href="<?php echo base_url('employee/deleteshift/'.base64_encode($list['s_id']));?>" data-toggle="tooltip"  title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
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


