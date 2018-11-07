<?php foreach($chatdata as $chat):
													 ?>
													 <div class='msgdiv'>
												<div class="chat-line">
														<span class="chat-date">October 8th, 2015</span>
													</div>
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
													<?php  endforeach ?>