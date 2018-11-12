
             <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
					<div class="row">
					<div class=" col-md-2"> 
						<a href="<?php echo base_url('employee/all');?>" class="btn btn-primary" >Back</a>
					</div>
						<div class="col-sm-8">
							<h4 class="page-title">Employee Profile</h4>
						</div>
						
						
					</div>
					<div class="card-box">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									<div class="profile-img-wrap">
										<div class="profile-img">
										
									  <?php if($edit_employee['e_profile_pic']!=''){ ?>
									  <img src="<?php echo base_url('assets/adminprofilepic/'.$edit_employee['e_profile_pic']); ?>" height="50px" width="50px">
									  <?php }else{ ?>
								<img src="<?php echo base_url();?>assets/vendor/img/user-06.jpg" class="img-circle" alt="User Image" />
									<?php } ?>
														
										</div>
									</div>
									<div class="profile-basic">
										<div class="row">
											<div class="col-md-5">
											
												<div class="profile-info-left">
													<h3 class="user-name m-t-0 m-b-0"><?php echo $edit_employee['e_login_name'];?></h3>
													<small class="text-muted"><?php echo $edit_employee['role'];?></small>
													<div class="staff-id">Employee ID : <?php echo $edit_employee['e_emplouee_id'];?></div>
												
												</div>
											</div>
											<div class="col-md-7">
												<ul class="personal-info">
													<li>
														<span class="title">Phone:</span>
														<span class="text"><a href="#"><?php echo $edit_employee['e_mobile_personal'];?></a></span>
													</li>
													<li>
														<span class="title">Email:</span>
														<span class="text"><a href="#"><?php echo $edit_employee['e_email_work'];?></a></span>
													</li>
												
													<li>
														<span class="title">Address:</span>
														<span class="text"><?php echo $edit_employee['e_c_adress'];?> &nbsp;<?php echo $edit_employee['e_c_city'];?>&nbsp;<?php echo $edit_employee['e_c_district'];?>&nbsp;<?php echo $edit_employee['e_c_state'];?> </span>
													</li>
													
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
					
						<div class="col-md-12">
							<div class="card-box">
							
								<div class="col-md-6">
									<h3 class="card-title">Basic Information</h3>
									<div class="experience-box">
										<ul class="experience-list">
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name"> Name </a>
														<div><?php echo $edit_employee['e_login_name'];?></div>
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Joining Date</a>
														<div><?php echo $edit_employee['e_join_date'];?></div>
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Login Name</a>
														<div><?php echo $edit_employee['e_login_name'];?></div>
													</div>
												</div>
											</li>																	

											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Email Personal</a>
														<div><?php echo $edit_employee['e_email_personal'];?></div>
											      </div>
												</div>
												</li>
												<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Email Personal</a>
														<div><?php echo $edit_employee['e_email_work'];?></div>
											      </div>
												</div>
												
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Mobile</a>
														<div><?php echo $edit_employee['e_mobile_personal'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Designation </a>
														<div><?php echo $edit_employee['role'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Supervisor  </a>
														<div><?php echo $edit_employee['e_supervisor'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Department   </a>
														<div><?php echo $edit_employee['department'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Sub Department   </a>
														<div><?php echo $edit_employee['sub_department'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Shift</a>
														<div><?php echo $edit_employee['shift'];?></div>
														
													</div>
												</div>
											</li>
											
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Current Address</a>
														<div><?php echo $edit_employee['e_c_adress'];?>&nbsp;<?php echo $edit_employee['e_c_city'];?>&nbsp;<?php echo $edit_employee['e_c_district'];?>&nbsp;<?php echo $edit_employee['e_c_state'];?> </div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Permanent Address</a>
														<div><?php echo $edit_employee['e_p_address'];?>&nbsp;<?php echo $edit_employee['e_p_city'];?>&nbsp;<?php echo $edit_employee['e_p_district'];?>&nbsp;<?php echo $edit_employee['e_p_state'];?> </div>
														
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
									<h3 class="card-title">Bank  Details</h3>
									<div class="experience-box">
										<ul class="experience-list">
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Bank Name</a>
														<div><?php echo $edit_employee['e_bank_name'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Account Number</a>
														<div><?php echo $edit_employee['e_account_number'];?></div>
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Account Holder Name</a>
														<div><?php echo $edit_employee['e_bank_h_name'];?></div>
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">IFSC Code</a>
														<div><?php echo $edit_employee['e_bank_ifcs_code'];?></div>
													</div>
												</div>
											</li>
											
										</ul>
										<div class="clearfix">&nbsp;</div>
											<h3 class="card-title">Contact Person Details</h3>
										<ul class="experience-list">
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Name</a>
														<div><?php echo $edit_employee['e_c_p_name'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Mobile Number</a>
														<div><?php echo $edit_employee['e_c_p_mobile'];?></div>
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name"> Address</a>
														<div><?php echo $edit_employee['e_c_p_address'];?></div>
														
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Email</a>
														<div><?php echo $edit_employee['e_c_p_email'];?></div>
													</div>
												</div>
											</li>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="#/" class="name">Relationship</a>
														<div><?php echo $edit_employee['e_c_p_relationship'];?></div>
													</div>
												</div>
											</li>
											<?php if($edit_employee['e_document']!=''){ ?>
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content">
														<a href="<?php echo base_url('assets/bank_documents/'.$edit_employee['e_document']); ?>" class="name">Upload Documents</a>
														<div><?php echo $edit_employee['e_document'];?></div><a href="<?php echo base_url('assets/bank_documents/'.$edit_employee['e_document']); ?>" class="name">(down load)</a>
														
													</div> 
												</div>
											</li>
											<?php } ?>
											
										</ul>
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
							</div>
							
						</div>
					</div>
                </div>
				
            </div>

