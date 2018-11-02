
             <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">Edit Profile</h4>
						</div>
					</div>
					<form id="defaultForm" method="post" class="" action="<?php echo base_url('profile/editpost'); ?>" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="e_id" id="e_id" value="<?php echo isset($userdetails['e_id'])?$userdetails['e_id']:''; ?>"  />

						<div class="card-box">
							<h3 class="card-title">Basic Informations</h3>
							<div class="row">
								<div class="col-md-12">
								
									<div class="profile-img-wrap">
									<?php if($userdetails['e_profile_pic']!=''){ ?>
										<img class="inline-block" src="<?php echo base_url('assets/adminprofilepic/'.$userdetails['e_profile_pic']); ?>" alt="user">
										<?php }else{ ?>
								         <img src="<?php echo base_url();?>assets/vendor/img/user-06.jpg" class="img-circle" alt="User Image" />
									      <?php } ?>
										
									</div>
									
									<div class="profile-basic">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">First Name</label>
												<input type="text" class="form-control floating" name="e_f_name" id="e_f_name" value="<?php echo isset($userdetails['e_f_name'])?$userdetails['e_f_name']:''; ?>"  />

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">Last Name</label>
												<input type="text" class="form-control floating" name="e_l_name" id="e_l_name" value="<?php echo isset($userdetails['e_l_name'])?$userdetails['e_l_name']:''; ?>"  />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">Email</label>
													<input class="form-control floating " type="text" name="e_email_work" id="e_email_work" value="<?php echo isset($userdetails['e_email_work'])?$userdetails['e_email_work']:''; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">Login Name</label>
													<input class="form-control floating " type="text" name="e_login_name" id="e_login_name" value="<?php echo isset($userdetails['e_login_name'])?$userdetails['e_login_name']:''; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">Mobile Personal</label>
													<input class="form-control floating " type="text" name="e_mobile_personal" id="e_mobile_personal" value="<?php echo isset($userdetails['e_mobile_personal'])?$userdetails['e_mobile_personal']:''; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">Profile Pic</label>
												   <input type="file" id="e_profile_pic" name="e_profile_pic"   class="form-control"  >
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Current Address</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group form-focus">
										<label class="control-label">Address</label>
												<input type="text" class="form-control floating" name="e_c_adress" id="e_c_adress" value="<?php echo isset($userdetails['e_c_adress'])?$userdetails['e_c_adress']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">State</label>
										             <select class="select form-control floating">
														<option value="">Select State</option>
														<option value="Andhra Pradesh">Andhra Pradesh</option>
														<option value="Arunachal Pradesh">Arunachal Pradesh</option>
														<option value="Assam">Assam</option>
														<option value="Bihar">Bihar</option>
														<option value="Chhattisgarh">Chhattisgarh</option>
														<option value="Goa">Goa</option>
														<option value="Gujarat">Gujarat</option>
														<option value="Haryana">Haryana</option>
														<option value="Himachal Pradesh">HHimachal Pradesh</option>
														<option value="Jammu & Kashmir">Jammu & Kashmir</option>
														<option value="Jharkhand">Jharkhand</option>
														<option value="Karnataka">Karnataka</option>
														<option value="Kerala">Kerala</option>
														<option value="Madhya Pradesh">Madhya Pradesh</option>
														<option value="Maharashtra">Maharashtra</option>
														<option value="Manipur">Manipur</option>
														<option value="Mizoram">Mizoram</option>
														<option value="Nagaland">Nagaland</option>
														<option value="Odisha">Odisha</option>
														<option value="Punjab">Punjab</option>
														<option value="Rajasthan">Rajasthan</option>
														<option value="Sikkim">Sikkim</option>
														<option value="Tamil Nadu">Tamil Nadu</option>
														<option value="Telangana">Telangana</option>
														<option value="Uttarakhand">Uttarakhand</option>
														<option value="Delhi">Delhi</option>
														<option value="Puducherry">Puducherry</option>
													</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">City</label>
												<input type="text" class="form-control floating" name="e_c_city" id="e_c_city" value="<?php echo isset($userdetails['e_c_city'])?$userdetails['e_c_city']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">District</label>
												<input type="text" class="form-control floating" name="e_c_district" id="e_c_district" value="<?php echo isset($userdetails['e_c_district'])?$userdetails['e_c_district']:''; ?>"  />
									</div>
								</div>
								
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Bank Details</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Bank Name</label>
												<input type="text" class="form-control floating" name="e_bank_name" id="e_bank_name" value="<?php echo isset($userdetails['e_bank_name'])?$userdetails['e_bank_name']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Account Number</label>
												<input type="text" class="form-control floating" name="e_account_number" id="e_account_number" value="<?php echo isset($userdetails['e_account_number'])?$userdetails['e_account_number']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Account Holder Name</label>
												<input type="text" class="form-control floating" name="e_bank_h_name" id="e_bank_h_name" value="<?php echo isset($userdetails['e_bank_h_name'])?$userdetails['e_bank_h_name']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">IFSC Code</label>
												<input type="text" class="form-control floating" name="e_bank_ifcs_code" id="e_bank_ifcs_code" value="<?php echo isset($userdetails['e_bank_ifcs_code'])?$userdetails['e_bank_ifcs_code']:''; ?>"  />
									</div>
								</div>
								
								
							</div>
						
						</div>
						<div class="card-box">
							<h3 class="card-title">Contact Person Details</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Name</label>
												<input type="text" class="form-control floating" name="e_c_p_name" id="e_c_p_name" value="<?php echo isset($userdetails['e_c_p_name'])?$userdetails['e_c_p_name']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Mobile Number</label>
												<input type="text" class="form-control floating" name="e_c_p_mobile" id="e_c_p_mobile" value="<?php echo isset($userdetails['e_c_p_mobile'])?$userdetails['e_c_p_mobile']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Email</label>
												<input type="text" class="form-control floating" name="e_c_p_email" id="e_c_p_email" value="<?php echo isset($userdetails['e_c_p_email'])?$userdetails['e_c_p_email']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Address</label>
												<input type="text" class="form-control floating" name="e_c_p_address" id="e_c_p_address" value="<?php echo isset($userdetails['e_c_p_address'])?$userdetails['e_c_p_address']:''; ?>"  />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Relationship</label>
												<input type="text" class="form-control floating" name="e_c_p_relationship" id="e_c_p_relationship" value="<?php echo isset($userdetails['e_c_p_relationship'])?$userdetails['e_c_p_relationship']:''; ?>"  />
									</div>
								</div>
							</div>
							
						</div>
						<div class="text-center m-t-20">
							<button type="submit" class="btn btn-primary btn-lg" name="signup" value="Sign up">Save &amp; update</button>

						</div>
					</form>
				</div>
				<div class="notification-box">
					<div class="msg-sidebar notifications msg-noti">
						<div class="topnav-dropdown-header">
							<span>Messages</span>
						</div>
						<div class="drop-scroll msg-list-scroll">
							<ul class="list-box">
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">R</span>
											</div>
											<div class="list-body">
												<span class="message-author">Richard Miles </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item new-message">
											<div class="list-left">
												<span class="avatar">J</span>
											</div>
											<div class="list-body">
												<span class="message-author">John Doe</span>
												<span class="message-time">1 Aug</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">T</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Tarah Shropshire </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">M</span>
											</div>
											<div class="list-body">
												<span class="message-author">Mike Litorus</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">C</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Catherine Manseau </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">D</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Domenic Houston </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">B</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Buster Wigton </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">R</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Rolland Webber </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">C</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Claire Mapes </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">M</span>
											</div>
											<div class="list-body">
												<span class="message-author">Melita Faucher</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">J</span>
											</div>
											<div class="list-body">
												<span class="message-author">Jeffery Lalor</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">L</span>
											</div>
											<div class="list-body">
												<span class="message-author">Loren Gatlin</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">T</span>
											</div>
											<div class="list-body">
												<span class="message-author">Tarah Shropshire</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="chat.html">See all messages</a>
						</div>
					</div>
				</div>
			</div>
<script>
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			
            e_emplouee_id: {
                validators: {
					notEmpty: {
						message: 'Employee ID is required'
					}
					
				}
            },
			e_join_date: {
                validators: {
					notEmpty: {
						message: 'Joining Date is required'
					},
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			e_f_name:{
			validators: {
					notEmpty: {
						message: 'First Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'First Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			e_l_name:{
			validators: {
					notEmpty: {
						message: 'Last Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Last Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			e_login_name:{
				validators: {
					notEmpty: {
						message: 'Login Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Login Name can only consist of alphanumeric, space and dot'
					}
				}
            },
            e_email_personal: {
                validators: {
					notEmpty: {
						message: 'Email Personal is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			e_email_work:{
			validators: {
					notEmpty: {
						message: 'Email Work is required'
					}
				}
            },
			e_password: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
           
           e_org_password: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'e_password',
						message: 'password and Confirm Password do not match'
					}
					}
				},
			e_mobile_personal: {
                 validators: {
					notEmpty: {
						message: 'Phone Personal is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Phone Personal must be 10 digits'
					}
				
				}
            },
			e_mobile_work: {
                validators: {
					notEmpty: {
						message: 'Phone Work is required'
					}
				}
            },
			e_designation: {
                validators: {
					notEmpty: {
						message: 'Select Designation  is required'
					}
				}
            },
			e_supervisor: {
                validators: {
					notEmpty: {
						message: 'Select Supervisor  is required'
					}
				}
            },
			e_department: {
                validators: {
					notEmpty: {
						message: 'Select Department  is required'
					}
				}
            },
			e_sub_department:{
			validators: {
					notEmpty: {
						message: 'Select Sub Department  is required'
					}
				}
            },
			e_shift:{
			validators: {
					notEmpty: {
						message: 'Select Shift  is required'
					}
				}
            },
			
			e_c_adress: {
                 validators: {
					  notEmpty: {
						message: 'Address is required'
					},
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Address wont allow <>[]'
					}
                }
            },
			e_c_city: {
                 validators: {
					  notEmpty: {
						message: 'City is required'
					},
                    regexp: {
					regexp: /^[a-zA-Z]+$/,
					message:'City can only consist of alphabets',
					}
                }
            },
			e_c_district: {
                validators: {
					notEmpty: {
						message: 'District is required'
					}
				}
            },
			e_c_state: {
                validators: {
					notEmpty: {
						message: 'State is required'
					}
				}
            },
			e_c_country: {
                validators: {
					notEmpty: {
						message: 'Country is required'
					}
				}
            },
			
			
			e_p_address: {
                 validators: {
					  notEmpty: {
						message: 'Address is required'
					},
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Address wont allow <>[]'
					}
                }
            },
			e_p_city: {
                 validators: {
					  notEmpty: {
						message: 'City is required'
					},
                    regexp: {
					regexp: /^[a-zA-Z]+$/,
					message:'City can only consist of alphabets',
					}
                }
            },
			e_p_district: {
                validators: {
					notEmpty: {
						message: 'District is required'
					}
				}
            },
			
			e_p_state: {
                validators: {
					notEmpty: {
						message: 'State is required'
					}
				}
            },
			e_p_country: {
                validators: {
					notEmpty: {
						message: 'Country is required'
					}
				}
            },
			e_profile_pic: {
                validators: {
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            },
			e_document: {
                   validators: {
					regexp: {
					regexp: /\.(docx|doc|pdf|xlsx|xls)$/i,
					message: 'Uploaded file is not a valid. Only docx,doc,xlsx,pdf files are allowed'
					}
				}
            },
			
			e_bank_name:{
			validators: {
					notEmpty: {
						message: ' Bank Name  is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:' Bank Name wont allow <> [] = % '
					}
				
				}
            },
			e_account_number:{
			    validators: 
				     	{
					    notEmpty: {
						message: 'Account Number is required'
					},
						regexp: 
						{
					     regexp:  /^[0-9]{9,16}$/,
					     message:'Bank Account  must be 9 to 16 digits'
					    }
				}
            },
			e_bank_h_name:{
			validators: {
					notEmpty: {
						message: 'Account Holder Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z ]+$/,
					message: 'Account Holder Name can only consist of alphabets and space'
					}
				}
            },
			e_bank_ifcs_code:{
			validators: {
					notEmpty: {
						message: 'IFSC Code is required'
					},
					regexp: {
					 regexp: /^[A-Za-z0-9]{4}\d{7}$/,
					message: 'IFSC Code must be alphanumeric'
					}
				}
            },
			e_c_p_name:{
			validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			e_c_p_mobile: {
                 validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
				
				}
            },
			e_c_p_email: {
                validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			e_c_p_relationship:{
				 validators: {
					notEmpty: {
						message: 'Relationship is required'
					}
				}
            },
			
			e_c_p_address: {
                 validators: {
					notEmpty: {
						message: 'Address is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address wont allow <> [] = % '
					}
				
				}
            }
			
			
        }
    });
    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
	
});


</script>




