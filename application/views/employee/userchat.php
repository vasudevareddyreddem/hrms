

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
													<?php foreach($userchat as $chat):
													 ?>
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
																		<!-- <li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li>
																		<li><a href="#" class="edit-msg" title="Edit"><i class="fa fa-pencil"></i></a></li> -->
																		<li><a href="#" class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
													<?php  endforeach ?>
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
												<input type='hidden' id='rid' value='' name='rid'>
												<div class="input-group">
												<textarea  id='msg' class="form-control" placeholder="Type message..." name='message'></textarea>
												<span class="input-group-btn">
													<button class="btn btn-primary  dynmsg" type="submit"><i class="fa fa-send"></i></button>
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
													<?php if($user->e_profile_pic!=''){ ?>
													<img class="avatar" src="<?php echo base_url('assets/adminprofilepic/'.$user->e_profile_pic ); ?>" alt="">
												<?php } else{?>
													<img src="<?php echo base_url();?>assets/vendor/img/user-06.jpg" class="img-circle" alt="User Image" />
									<?php } ?>
												</div>
												<h3 class="user-name m-t-10 m-b-0">
													<?php echo $user->e_f_name?></h3>
												<small class="text-muted"><?php echo $user->role?></small>
												<a href="edit-profile.html" class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
											</div>
									
											
											<div class="chat-profile-info">
												<ul class="user-det-list">
													<li>
														<span>Username:</span>
														<span class="pull-right text-muted"><?php echo $user->e_f_name?></span>
													</li>
													<!-- <li>
														<span>DOB:</span>
														<span class="pull-right text-muted">24 July</span>
													</li> -->
													<li>
														<span>Email:</span>
														<span class="pull-right text-muted"><?php echo $user->e_email_work?></span>
													</li>
													<li>
														<span>Phone:</span>
														<span class="pull-right text-muted"><?php echo $user->e_mobile_work?></span>
													</li>
												</ul>
											</div>
								
											<!-- <div class="tabbable">
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
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
          