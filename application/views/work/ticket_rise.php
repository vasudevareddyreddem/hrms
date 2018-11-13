<style>
    .work_details tbody tr td{
        border-top: 0px;
        width: 50%;
    }
</style>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <a href="work_list.php" class="btn btn-success pull-left m-r-10">Back</a>
                <h4 class="page-title">Work Details</h4>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-md-6">  
                <table id="" class="table table-borderless work_details">
                    <tbody>
                        <tr>
                            <td class="text-right"><strong>Employee Id :</strong></td>
                            <td class="text-left"><?php echo isset($ticket_details['e_emplouee_id'])?$ticket_details['e_emplouee_id']:''; ?></td>
                        </tr>
						<tr>
                            <td class="text-right"><strong>Employee Name :</strong></td>
                            <td class="text-left"><?php echo isset($ticket_details['e_login_name'])?$ticket_details['e_login_name']:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Mobile Number :</strong></td>
                            <td class="text-left"><?php echo isset($ticket_details['mobile_number'])?$ticket_details['mobile_number']:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Allocated Area :</strong></td>
                            <td class="text-left"><?php echo isset($ticket_details['area'])?$ticket_details['area']:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Date :</strong></td>
                            <td class="text-left"><?php echo isset($ticket_details['date'])?$ticket_details['date']:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Status :</strong></td>
                            <td class="text-left"><?php if($ticket_details['work_status']==0){ echo "rejected";}else if($ticket_details['work_status']==1){ echo "Inprgoress"; }else if($ticket_details['work_status']==2){ echo "completed"; }else if($ticket_details['work_status']==3){ echo "Pending"; }else{ echo "Initiate";} ?></td>
								
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
            <div class="col-md-6">
                <form id="defaultForm" method="post" action="<?php echo base_url('work/ticketpost'); ?>">
                    <input  type="hidden" name="w_d_id" id="w_d_id" value="<?php echo isset($ticket_details['w_d_id'])?$ticket_details['w_d_id']:''; ?>">
					<div class="form-group m-t-10">
                        <label>Ticket details<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="message" name="message" placeholder="Enter here.." required></textarea>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                    </div>
                </form>
            </div>
            
        </div>
        
        <div class="row bg-white">
		<h4>Raised Ticket details</h4>
            <div class="col-md-12">
			<?php if(isset($ticket_rise_details) && count($ticket_rise_details)>0){ ?>
				<?php foreach($ticket_rise_details as $list){ ?>
				<p><?php echo isset($list['message'])?$list['message']:''; ?>.</p>
				<?php } ?>
			<?php } ?>
            </div>
        </div>
        
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#defaultForm').bootstrapValidator({
            fields: {
                message: {
                    validators: {
                        notEmpty: {
                            message: 'Ticket details is required'
                        }
                    }
                }
            }
        });

    });
</script>