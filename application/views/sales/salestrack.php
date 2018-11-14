
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Salesmans</h4>
						</div>
						<form action="<?php echo base_url('export/salesreport'); ?>" method="post">
							<div class="col-md-8">
							  <div class="col-md-4">
									<select class="form-control" name="type" id="type" required>
									<option value="">Select</option>
									<option value="Daily">Daily</option>
									<option value="Weekly">Weekly</option>
									<option value="Monthly">Monthly</option>
									</select>
								 </div>
								 <div class="col-md-4">
										<button type="submit" class="btn btn-primary">Export</button>
								 </div>
					
							</div>
						</form>
					
					</div>
					<form>
					
					<div class="row">
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
							<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:30%;">Name</th>
											<th>Employee ID</th>
											
											<th>Mobile</th>
											<th>Join Date</th>
											<th>Role</th>
											<th>Alloted Area</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php  foreach($sales_list as $list) {?>
									
										<tr>
											<td>
												<a href="#" class="avatar"><?php echo substr($list['e_login_name'],0,1);?></a>
												<h2><a href="#"><?php echo $list['e_login_name']; ?></a></h2>
											</td>
											<td><?php echo $list['e_emplouee_id']; ?></td>
											
											<td><?php echo $list['mobile_number']; ?></td>
											<td><?php echo $list['work_date']; ?></td>
											<td><?php echo $list['role']; ?></td>
											<td><?php echo $list['area']; ?></td>
											<td class="text-right">
												<a href="<?php echo base_url('sales/trackdetails/'.base64_encode($list['sales_emp_id'])); ?>" class="btn btn-warning btn-sm" ><i class="fa fa-thumb-tack m-r-5"></i> Track</a>
											</td>
										</tr>
									<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				
			</div>

<script>
  $(function () {
    $("#example1").DataTable();
    
  });
</script>


