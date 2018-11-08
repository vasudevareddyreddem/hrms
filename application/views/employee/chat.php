
<div class="page-wrapper">
				<div class="chat-main-row">
					<div class="chat-main-wrapper">
						<div class="col-xs-9 message-view task-view">
							<div class="chat-window">
								<div class="chat-header">
									<div class="navbar">
										<!-- <div class="user-details">
											<div class="pull-left user-img m-r-10">
												<a href="profile.html" title="Mike Litorus"><img src="assets/img/user.jpg" alt="" class="w-40 img-circle"><span class="status online"></span></a>
											</div>
											<div class="user-info pull-left">
												<a href="profile.html" title="Mike Litorus"><span class="font-bold">Mike Litorus</span> <i class="typing-text">Typing...</i></a>
												<span class="last-seen">Last seen today at 7:50 AM</span>
											</div>
										</div> -->
										<ul class="nav navbar-nav pull-right chat-menu">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
												<ul class="dropdown-menu">
													<li><a href="javascript:void(0)">Delete Conversations</a></li>
													<li><a href="javascript:void(0)">Settings</a></li>
												</ul>
											</li>
										</ul>
										<a href="#task_window" class="task-chat profile-rightbar pull-right"><i class="fa fa-user" aria-hidden="true"></i></a>
										<div class="message-search pull-right">
											<div class="input-group input-group-sm">
												<input type="text" class="form-control" placeholder="Search" required="">
												<span class="input-group-btn">
													<button class="btn" type="button"><i class="fa fa-search"></i></button>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div class="chats">
													
													<?php if($status=='yes'){foreach($chatdata as $chat):
													 ?>
													 <div class='msgdiv'>
												<!-- <div class="chat-line">
														<span class="chat-date">October 8th, 2015</span>
													</div> -->
													<div class="chat <?php if($chat->sender_id==$sender){
														echo 'chat-right';}else{echo 'chat-left';

														}
													 ?>">
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<p ><?php echo $chat->message?></p>
																	<span class="chat-time"><?php echo $chat->sent_time?></span>
																</div>
																<div class="chat-action-btns">
																	<ul>
																		<li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li>
																		<li><a href="#" class="edit-msg" title="Edit"><i class="fa fa-pencil"></i></a></li>
																		<li><button data-messageid='<?php echo $chat->message_id?>'  class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></button></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
													<?php  endforeach; }?>

												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="chat-footer">
									<div class="message-bar">
										<div class="message-inner">

											<a class="link attach-icon" href="#" data-toggle="modal" data-target="#drag_files"><img src="assets/img/attachment.png" alt=""></a>
											<div class="message-area">
												<form id='message' aciton='#' method='post'>
												<input type='hidden' id='rid' value='<?php echo $rec_det->recevier_id?>' name='rid'>
												<div class="input-group">
												<textarea  id='msg' class="form-control" placeholder="Type message..." name='message'></textarea>
												<span class="input-group-btn">
													<button class="btn btn-primary dynmsg" type="submit"><i class="fa fa-send"></i></button>
												</span>
												</div>
											</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-3 profile-right fixed-sidebar-right chat-profile-view" id="task_window">
							<div class="display-table profile-right-inner">
								<div class="table-row">
									<div class="table-body">
										<div class="table-content">
											<div class="chat-profile-img">
												<div class="edit-profile-img">
													<img class="avatar" src="assets/img/user.jpg" alt="">
													<span class="change-img">Change Image</span>
												</div>
												<?php if($status=='yes'){?>
												<h3 class="user-name m-t-10 m-b-0"><?php echo $rec_det->e_f_name?></h3>
												<small class="text-muted"><?php echo $rec_det->role?></small>
												<a href="edit-profile.html" class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a><?php }?>
											</div>
											<div class="chat-profile-info">
												<?php if($status=='yes'){?>
												<ul class="user-det-list">
													<li>
														<span>Username:</span>
														<?php if($status=='yes'){?>
														<span class="pull-right text-muted"><?php echo $rec_det->e_f_name?></span>
													<?php }?>
													</li>
													<!-- <li>
														<span>DOB:</span>
														<span class="pull-right text-muted">24 July</span>
													</li> -->
													<li>
														<span>Email:</span>
														<?php if($status=='yes'){?>
														<span class="pull-right text-muted"><?php echo $rec_det->e_email_work?></span><?php }?>
													</li>
													<li>
														<span>Phone:</span>
														<?php if($status=='yes'){?>
														<span class="pull-right text-muted"><?php echo $rec_det->e_mobile_work?></span>
														<?php }?>
													</li>
												</ul>
												<?php }?>
											</div>
											<div class="tabbable">
												<ul class="nav nav-tabs nav-tabs-solid nav-justified m-b-0">
													<li class="active"><a href="#all_files" data-toggle="tab">All Files</a></li>
													<li><a href="#my_files" data-toggle="tab">My Files</a></li>
												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="all_files">
														<ul class="files-list">
															<li>
																<div class="files-cont">
																	<div class="file-type">
																		<span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
																	</div>
																	<div class="files-info">
																		<span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
																		<span class="file-author"><a href="#">Loren Gatlin</a></span> <span class="file-date">May 31st at 6:53 PM</span>
																	</div>
																	<ul class="files-action">
																		<li class="dropdown">
																			<a href="#" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
																			<ul class="dropdown-menu">
																				<li><a href="javascript:void(0)">Download</a></li>
																				<li><a href="#" data-toggle="modal" data-target="#share_files">Share</a></li>
																			</ul>
																		</li>
																	</ul>
																</div>
															</li>
														</ul>
													</div>
													<div class="tab-pane" id="my_files">
														<ul class="files-list">
															<li>
																<div class="files-cont">
																	<div class="file-type">
																		<span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
																	</div>
																	<div class="files-info">
																		<span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
																		<span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 31st at 6:53 PM</span>
																	</div>
																	<ul class="files-action">
																		<li class="dropdown">
																			<a href="#" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
																			<ul class="dropdown-menu">
																				<li><a href="javascript:void(0)">Download</a></li>
																				<li><a href="#" data-toggle="modal" data-target="#share_files">Share</a></li>
																			</ul>
																		</li>
																	</ul>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				
		</div>
		<script type="text/javascript">		 
			function recv_data()
{
	$.ajax({
                    type: "GET",    //GET or POST or PUT or DELETE verb
                    url: 'http://localhost/hrms/Chat/getmessages',     // Location of the service
                    data: '',     //Data sent to server
                    dataType: "json",   //Expected data format from server
                    
                    success: function (result) {
                    	console.log(result.lists);
                    	//alert('kkk');
                    	if(result.status=='yes'){
                    	
                    }
  }
                    ,
                    error: function() { 
                    	
                    } 
                });

};
			

		</script>

<script type="text/javascript">
	$(document).ready(function() {
		 function recv_data()
{
	$.ajax({
                    type: "GET",    //GET or POST or PUT or DELETE verb
                    url: 'http://localhost/hrms/Chat/getmessages',     // Location of the service
                    data: '',     //Data sent to server
                    dataType: "json",   //Expected data format from server
                    
                    success: function (result) {
                    	console.log(result.upmsg);
                    	
                    	//this code for login users 
                    	// if(result.ustatus=1){

                    	// 	$("#myUL").empty();
                    	// 	val='';
                    	// $.each(result.logusers, function(i, item) {

                     //        if(item.login_status==1){
                     //           val=val+'<li><button id="'+item.e_id+'" class="users btn-block">'+item.e_f_name+'<span class="pull-right">2</span><span class="status online pull-right"></span></button></li>';
                     //        }
                     //        else{
                     //        	val=val+'<li><button id="'+item.e_id+'" class="users btn-block">'+item.e_f_name+'</button></li>';
                     //        }


                    	// });
                    	// $("#myUL").html(val);

                    	// }
                    	if(result.mstatus==1){
                    		alert('ok working');
                    			$("#myUL").empty();
                    		val='';
                    	$.each(result.upmsg, function(i, item) {

                            if(item.login_status==1){
                            	if(item.cnt==null){
                               val=val+'<li><button id="'+item.e_id+'" class="users btn-block">'+item.e_f_name+'<span class="pull-right"></span><span class="status online pull-right"></span></button></li>';
                           }
                           else{
                           	val=val+'<li><button id="'+item.e_id+'" class="users btn-block">'+item.e_f_name+'<span class="pull-right">'+item.cnt+'</span><span class="status online pull-right"></span></button></li>';

                           }


                            }
                            else{
                            	val=val+'<li><button id="'+item.e_id+'" class="users btn-block">'+item.e_f_name+'</button></li>';
                            }


                    	});
                    	$("#myUL").html(val);



                    	}
                    	if(result.status=='yes'){
                    	$.each(result.lists, function(i, item) {
                    		//console.log(item.message);
                    		divchat='<div></div>';
                    		var el = $('<div> </div>');

      //newdiv=$('.chats').append(divchat);
   newdiv=el.html('<div class="chat chat-left"><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p></p><span class="chat-time"></span></div><div class="chat-action-btns"><ul><li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li><li><a href="#" class="edit-msg" title="Edit"><i class="fa fa-pencil"></i></a></li><li><a href="#" class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></a></li></ul></div></div></div></div>');
      //var parent = lastObj.parent();
      $('.chats').append(newdiv);
      $("p:last").append(item.message);
      //var prev=$('#message').closest(":has(p)").find('p');
                    		
                    		

});
                    }
  }
                    ,
                    error: function() { 
                    	//alert('error from server side');

                    } 
                });

};
		setInterval(recv_data, 3000);


$(document).on('click','.dynmsg',function(e){

	e.preventDefault();                   

	
       if($('#msg').val().length>0){
       	
       	val=$('#msg').val();
       data='<p>'+val+'</p>'+'<span >8:30 am</span>';
  
   divchat='<div></div>';
                    		var el = $('<div></div>');

     newdiv= el.html('</div><div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p></p><span class="chat-time"></span></div><div class="chat-action-btns"><ul><li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li><li><a href="#" class="edit-msg" title="Edit"><i class="fa fa-pencil"></i></a></li><li><a href="#" class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></a></li></ul></div></div></div></div>');
      $('.chats').append(newdiv);
      //var parent = lastObj.parent();
      //var prev=$('#message').closest("p");
       //alert('kdkd');
       
      message_val=$('#msg').val();
     $("p:last").append(message_val);

      //alert(message_val);

      //prev.append(message_val);


     //alert(prev.val());
      //message_val=$('#msg').val();
      rec_val=$('#rid').val();
      //formdata=$('#msg').serialize();
      //console.log(formdata);
      //return false;

      $.ajax({
                    type: "POST",    //GET or POST or PUT or DELETE verb
                    url: 'http://localhost/hrms/Chat/sendmessage',     // Location of the service
                    data: {message: message_val,rid: rec_val},     //Data sent to server
                    dataType: "json",   //Expected data format from server
                    
                    success: function (result) {
                    $('#msg').val('');
                         
                                           }
                    ,
                    error: function() { 
                    	//alert('error from server side');

                    } 
                });
   								
																											
			 }				


      });
//change the user
 
$(document).on('click','.users',function(){
    	// var lastObj = $(this);
       val=$(this).attr("id");
       $(this).children(".pull-right").empty();
     //    alert('kdkd');
        $.ajax({
                    type: "GET",    //GET or POST or PUT or DELETE verb
                    url: 'http://localhost/hrms/Chat/userchat/'+val,     // Location of the service
                    data:'' ,     //Data sent to server
                    dataType: "html",   //Expected data format from server
                    
                    success: function (result) {
                    $('.page-wrapper').html(result);
                         
                                           }
                    ,
                    error: function() { 
                    	//alert('error from server side');

                    } 
                });

    });
// delete the messag
$('.del-msg').on('click',function(e){
 //e.preventDefault();
val=$(this).attr("data-messageid");

$(this).closest('.msgdiv').remove();
//alert(val);
	
});







});

</script>
