

<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Employee resignation List</h4>
						</div>
					
					</div>
					
					<div class="row">
						<div class="col-md-12">
						<?php if(isset($resignations_list) && count($resignations_list)>0){ ?>
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Employee Name</th>
											<th>Reason</th>
											<th>Created Date & Time</th>
											<th>Status</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tbody>
									<?php foreach($resignations_list as $list){ ?>
										<tr>
										
											<td><?php echo $list['e_login_name'];?></td>
											<td><?php echo $list['content'];?></td>
											<td><?php echo $list['created_at'];?></td>
											<td><?php if($list['accept_status']==0){ echo "Initiated ";}else if($list['accept_status']==1){ echo "Accepted"; }else if($list['accept_status']==2){ echo "Rejected"; } ?></td>
											
											 <td>
												<a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['e_r_id'])).'/'.base64_encode(htmlentities(1));?>');adminstatus(0)" data-toggle="modal" data-target="#myModal" title="Edit" class="btn btn-primary">Accepte</a>
												<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['e_r_id'])).'/'.base64_encode(htmlentities(2));?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete" class="btn btn-success">Rejected</a>
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
 function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('employee/resignationaccept'); ?>"+"/"+id);
} 
function adminstatus(id){
	
			$('#content1').html('Are you sure you want to accept?');

}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('employee/resignationaccept'); ?>"+"/"+id);
}
function admindedeletemsg(id){
	$('#content1').html('Are you sure you want to accept reject?');
	
}
  $(function () {
      $('#example1').DataTable( {
        "order": [[2, "desc" ]]
    } );
    
  });
</script>
