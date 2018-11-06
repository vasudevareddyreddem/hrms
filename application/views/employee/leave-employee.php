
<div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Leave Request</h4>
						</div>
						<div class="col-xs-4 text-right m-b-30">
							<a href="<?php echo base_url('employee/leave');?>" class="btn btn-primary rounded pull-right" ><i class="fa fa-plus"></i> Add Leave</a>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Employee</th>
											<th>Leave Type</th>
											<th>From</th>
											<th>To</th>
											<th>No of Days</th>
											 <th>Remaining Leaves</th>  
											<th>Reason</th>
											<th>Status</th>
											<th  class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php if(isset($leaves_list) && count($leaves_list)>0){ ?>
									<?php foreach($leaves_list as $list){?>
										<tr>
										
										  <td>
											<a href="#" class="avatar"><?php echo substr($userdetails['e_login_name'],0,1);?></a>
											<h2><a href="#"><?php echo $userdetails['e_login_name'];?><span><?php echo $userdetails['role'];?></span></a></h2>
											</td>
											<td><?php echo $list['leave_type'];?></td>
											<td><?php echo $list['from_date'];?></td>
											<td><?php echo $list['to_date'];?></td>
											<td><?php echo $list['number_of_days'];?></td>
											<td><?php echo $list['remaining_leaves'];?></td>
											<td><?php echo $list['leaves_reason'];?></td>
											<td><?php  if($list['status']==1){  echo "accept";}else if($list['status']==2){  echo "reject";}else{  echo "Pending"; } ?></td>

												<td>
											<a class="btn btn-success btn-block" href="javascript;void(0);" onclick="admindeactive1('<?php echo base64_encode(htmlentities($list['l_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus1('<?php echo $list['status'];?>')" href="javascript:void(0)" data-toggle="modal" data-target="#myModal2">

                                                                Accept</a>
                                                <a class= "btn btn-danger btn-block" href="javascript;void(0);" onclick="admindeactive2('<?php echo base64_encode(htmlentities($list['l_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                                Reject</a>
    
                                                   </td>             
												
                                          
										</tr>
	
									<?php }?>
										
									</tbody>
									<?php } else{ ?>
								<div>No data available</div>
								<?php } ?>
								</table>
							</div>
						</div>
					</div>
					
				<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div style="padding:10px">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="defaultForm" method="post" action="">
                            <div id="content3" class="col-lg-12 form-group">
                                Are you sure ?
                            </div>

                             <div class="col-lg-12">
							<input type="hidden" name="b_id" id="b_id" class="popid" value="">
                                <a href="?id=value" class="btn blueBtn popid"><span aria-hidden="true">Ok</span></a>
                                <button type="button" aria-label="Close" data-dismiss="modal" class="btn blueBtn float-right">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div style="padding:10px">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="defaultForm" method="post" action="">
                            <div id="content2" class="col-lg-12 form-group">
                                Are you sure ?
                            </div>

                             <div class="col-lg-12">
							<input type="hidden" name="l_id" id="l_id" class="popid" value="">
                                <a href="?id=value" class="btn blueBtn popid"><span aria-hidden="true">Ok</span></a>
                                <button type="button" aria-label="Close" data-dismiss="modal" class="btn blueBtn float-right">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
	


				
					
                </div>
				
			
			
			
			
			
            </div>

<script>

function admindeactive1(id){
	$(".popid").attr("href","<?php echo base_url('employee/leavesstatus/'); ?>"+"/"+id);
	$("#l_id").val(id);
}
function adminstatus1(id){
	
	$('#content2').html('Are you sure you want to Accept');
	
}

function admindeactive2(id){
	$(".popid").attr("href","<?php echo base_url('employee/lstatus/'); ?>"+"/"+id);
	$("#l_id").val(id);
}
function adminstatus(id){
	
	$('#content3').html('Are you sure you want to Reject');
	
}





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
