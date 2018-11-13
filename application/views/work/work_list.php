<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Work Distribution List</h4>
            </div>

        </div>
        <form>
            <div class="row">
                <div class="col-md-12 bg-white">
                    <div class="clearfix">&nbsp;</div>
					<?php if(isset($work_list) && count($work_list)>0){ ?>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Mobile</th>
                                    <th>Work</th>
                                    <th>Alloted Area</th>
                                    <th>Date</th>
									<th>Status</th>
									<th>Work Status</th>
									<th>Created Date & Time</th>
									<th>Ticket Rise</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php foreach($work_list as $list){?>
                                <tr>
                                    <td><?php echo $list['e_emplouee_id']; ?></td>
                                    <td><?php echo $list['mobile_number']; ?></td>
                                    <td><?php echo $list['work']; ?></td>
                                    <td><?php echo $list['area']; ?></td>
                                    <td><?php echo $list['date']; ?></td>
									<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
									<td><?php if($list['work_status']==0){ echo "rejected";}else if($list['work_status']==1){ echo "Inprgoress"; }else if($list['work_status']==2){ echo "completed"; }else if($list['work_status']==3){ echo "Pending"; }else{ echo "Initiate";} ?></td>
									<td><?php echo $list['created_at']; ?></td>
									 <td><a target="_blank" href="<?php echo base_url('work/ticketrise/'.base64_encode($list['w_d_id'])); ?>">View</a></td>

                                    <td>
                                    <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['w_d_id'])).'/'.base64_encode(htmlentities(0));?>');adminstatus(0)" data-toggle="modal" data-target="#myModal" title="reject" class="btn btn-primary">Reject</a>
                                    <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['w_d_id'])).'/'.base64_encode(htmlentities(1));?>');adminstatus(1)" data-toggle="modal" data-target="#myModal" title="In progress" class="btn btn-warning">In progress</a>
                                    <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['w_d_id'])).'/'.base64_encode(htmlentities(2));?>');adminstatus(2)" data-toggle="modal" data-target="#myModal" title="Done" class="btn btn-success">Done</a>
                                    <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['w_d_id'])).'/'.base64_encode(htmlentities(3));?>');adminstatus(3)" data-toggle="modal" data-target="#myModal" title="Pending" class="btn btn-danger">Pending</a>
                                      
                                    </td>
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
        </form>
    </div>

<script>
 function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('work/status'); ?>"+"/"+id);
} 
function adminstatus(id){
	
			if(id==0){
				$('#content1').html('Are you sure you want to reject?');
			}if(id==1){
				$('#content1').html('Are you sure you want to inprogress?');
			}if(id==2){
				$('#content1').html('Are you sure you want to complete?');
			}if(id==3){
				$('#content1').html('Are you sure you want to pending?');
			}

}
    $(function () {
      $('#example1').DataTable( {
        "order": [[7, "desc" ]]
    } );
    
  });
</script>