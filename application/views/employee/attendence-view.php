
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title"> Attendance Details</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							&nbsp;
						
						</div>
					</div>
					<form>
					
					<div class="row">
				
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
							<table  class="table table-bordered  col-md-6">
								<thead>
									<tr>
										<th>Name</th>
										<th>Employee ID</th>
										<th>Month</th>	
										<th>No of Working</th>
										<th>No of Leaves</th>
										<th>Total Working Days</th>
										
									</tr>
									<tbody>
									<tr>
										<td><?php echo $emp->e_f_name;?></td>
										<td><?php echo $emp->e_emplouee_id;?></td>
										<td><?php echo $month;?></td>
										<td><?php echo $logindays;?></td>
										<td><?php echo $leaves;?></td>
										<td><?php echo $wdays;?></td>
									</tr>
									</tbody>
								</thead>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
							<div class="table-responsive">
									<table  class="table table-bordered table-striped">
									
									<thead>
										<tr>
											<th>Month</th>
										<?php for($i=1;$i<=$mdays;$i++){?>
											<th><?php echo $i;?></th>
										<?php }?>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $month;?></td>
											<?php for($i=1;$i<count($attendance);$i++){
												if($attendance[$i]=='yes'){?>
													<td><i class="fa fa-check text-success"></i></td> <?php }else{?>
														<td><i class="fa fa-close text-danger"></i> </td>

											<?php } ?>
										<?php }?>
											
											
											<!-- <td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><div class="half-day"><span class="first-off"><i class="fa fa-check text-success"></i></span> <span class="first-off"><i class="fa fa-close text-danger"></i></span></div></td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><div class="half-day"><span class="first-off"><i class="fa fa-close text-danger"></i></span> <span class="first-off"><i class="fa fa-check text-success"></i></span></div></td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td> -->
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


