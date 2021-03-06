
<?php //echo'<pre>';print_r($employee_leaves_list);exit;?>
<?php //echo'<pre>';print_r($userdetails);exit;?>
<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/vendor/img/favicon.png">
        <title>HRMS</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/bootstrapValidator.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/bootstrap-datetimepicker.min.css">
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/plugins/morris/morris.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/style.css">
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/bootstrapValidator.js"></script>
		
		
		
		             
		
    </head>
    <body>
        <div class="main-wrapper">
            <div class="header">
                <div class="header-left">
                    <a href="<?php echo base_url('dashboard'); ?>" class="logo">
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/vendor/img/logo.png" alt="">
					</a>
                </div>
                <div class="page-title-box pull-left">
					<h3>Sri Raja Bags</h3>
                </div>
				<a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
				<ul class="nav navbar-nav navbar-right user-menu pull-right">
					<li class="dropdown hidden-xs">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-purple pull-right" id="notification_count"><?php if(isset($unread_count) && $unread_count['cnt']>0){   echo $unread_count['cnt']; } ?></span></a>
						<?php if(isset($leaves_notification) && count($leaves_notification)>0){ ?>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span>You have <?php echo count($leaves_notification); ?> notifications</span>
							</div>
							<div class="drop-scroll">
								<ul class="media-list">
								<?php $cnt=1;foreach($leaves_notification as $lis){ ?>
					              <?php if($cnt<=5){ ?>
								<li class="media notification-message">
									<a onclick="opennotification(<?php echo $lis['l_id']; ?>);" data-toggle="modal" data-target="#exampleModalLong">
											
												<div class="media-left">
												<span class="avatar"><?php echo $lis['e_login_name']; ?></span>
											</div>
										
											
											 <div class="media-body">

												<p class="m-0 noti-details"><span class="noti-title"><?php echo $lis['e_login_name'];?> &nbsp;Applied For&nbsp;<?php echo $lis['leave_type_name']; ?></span></p>

												<p class="m-0"><span class="notification-time"><?php echo $lis['created_at']; ?></span></p>
											</div>
										</a>
							
						 </li> 
						  
					  <?php } ?>
					<?php $cnt++;} ?>
							
									
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="<?php echo base_url('notifications/viewall'); ?>">View all Notifications</a>
							</div>
						</div>
						<?php } ?>
						
					</li>
					
					
					
					
						
					<li class="dropdown">
						<a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
							<span class="user-img">
							<?php if($userdetails['e_profile_pic']==''){ ?>
							<img class="img-circle" src="<?php echo base_url();?>assets/vendor/img/user.jpg" width="40" alt="User Pic">
							<?php }else{ ?>
							<img class="img-circle" src="<?php echo base_url('assets/adminprofilepic/'.$userdetails['e_profile_pic']);?>" width="40" alt="<?php echo isset($userdetails['e_profile_pic'])?$userdetails['e_profile_pic']:''; ?>">
							<?php } ?>
							<span class="status online"></span></span>
							<span><?php echo isset($userdetails['e_emplouee_id'])?$userdetails['e_emplouee_id']:''; ?></span>
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('profile');?>">My Profile</a></li>
							<li><a href="<?php echo base_url('profile/edit');?>">Edit Profile</a></li>
						    <li><a href="<?php echo base_url('dashboard/changepassword');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('dashboard/logout'); ?>">Logout</a></li>
						</ul>
					</li>
				</ul>
				
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
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>
  <!--notification -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notifications at <span class="" id="notification_time"></span ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="notification_msg"> </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
				
				
            </div>
			 </div>
			<?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>


<script>
   function opennotification(id){
	   if(id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('notifications/get_notification_msg');?>",
   			data: {
				notification_id: id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
					
					$('#notification_unread_count').empty();
   					$('#notification_count').empty();
   					$('#notification_msg').empty();
   					$('#notification_time').empty();
   					var parsedData = JSON.parse(data);
   					$('#notification_unread_count').append(parsedData.unread_counts);
   					$('#notification_msg').append(parsedData.names_list);
   					$('#notification_time').append(parsedData.time);
   					$('#notification_count').append(parsedData.unread_counts);
   					}
           });
	   }
	}
	
	
   </script>