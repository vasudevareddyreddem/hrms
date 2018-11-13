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
					<?php if(isset($assign_work_list) && count($assign_work_list)>0){ ?>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php foreach($assign_work_list as $list){?>
                                <tr>
                                    <td><?php echo $list['e_emplouee_id']; ?></td>
                                    <td><?php echo $list['mobile_number']; ?></td>
                                    <td><?php echo $list['work']; ?></td>
                                    <td><?php echo $list['area']; ?></td>
                                    <td><?php echo $list['date']; ?></td>
									<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
											<td><?php if($list['work_status']==0){ echo "rejected";}else if($list['work_status']==1){ echo "Inprgoress"; }else if($list['work_status']==2){ echo "completed"; }else if($list['work_status']==3){ echo "Pending"; }else{ echo "Initiate";} ?></td>
                                    <td>
                                     
                                    <a href="<?php echo base_url('employee/editwork/'.base64_encode($list['w_d_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									<a href="<?php echo base_url('employee/statuswork/'.base64_encode($list['w_d_id']).'/'.base64_encode($list['status'])); ?>" data-toggle="tooltip" title="status"><i class="fa fa-info-circle btn btn-warning"></i></a>
                                     <a href="<?php echo base_url('employee/deletework/'.base64_encode($list['w_d_id']));?>" data-toggle="tooltip"  title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
                                            
                                      
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
    $(function() {
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