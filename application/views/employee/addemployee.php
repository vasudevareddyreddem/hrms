
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="<?php echo base_url('employee/lists'); ?>" class="btn btn-primary pull-right rounded"> Employees Lists</a>
						
						</div>
					</div>
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/addpost');?>" enctype="multipart/form-data">
							<h2 class="text-primary">Basic Details</h2>
							<hr>
								<div class="row">
								<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Role</label>
											<select class="select" name="role_id">
													<option value="">Role</option>
													<option value="1">Admin</option>
													<option value="2">Hr</option>
													<option value="3">sales</option>
													
											</select>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Employee ID </label>
											<input  type="text" class="form-control" name="e_emplouee_id" placeholder="SSB12XX">
										</div>
									</div>
										<div class="col-sm-6">  
											<div class="form-group">
												<label class="control-label">Joining Date </label>
												<input  type="text" class="form-control" name="e_join_date" placeholder="10-10-2018">
											</div>
										</div>
									</div>
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="e_f_name">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input class="form-control" type="text"  name="e_l_name">
										</div>
									</div>
									</div>
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Login Name </label>
											<input class="form-control" type="text"  name="e_login_name">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Email Personal </label>
											<input class="form-control" type="email" name="e_email_personal">
										</div>
									</div>	
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Email Work</label>
											<input class="form-control" type="email" name="e_email_work">
										</div>
									</div>
									</div>
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input class="form-control" type="password" name="e_password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Confirm Password</label>
											<input class="form-control" type="password" name="e_org_password">
										</div>
									</div>
									</div>
									
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone Personal </label>
											<input class="form-control" type="text" name="e_mobile_personal">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone Work </label>
											<input class="form-control" type="text" name="e_mobile_work">
										</div>
									</div>
								
									
									</div>	
									<div class="row">
										<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Designation</label>
											<select class="select" name="e_designation">
													<option value="">Select Designation</option>
													<option value="General Manager">General Manager</option>
													<option value="Assistant General Manager">Assistant General Manager</option>
													<option value="Production Manager">Production Manager</option>
													<option value="Assistant Production Manager">Assistant Production Manager</option>
													<option value="Shift Incharge">Shift Incharge</option>
													<option value="Senior Trainee">Senior Trainee</option>
													<option value="Junior  Trainee">Junior  Trainee</option>
											</select>
										</div>
									</div>
										<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Supervisor</label>
											<select class="select" name="e_supervisor">
													<option value="">Select Supervisor</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													
											</select>
										</div>
									</div>	
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Department</label>
											<select class="select" name="e_department">
													<option value="">Select Department</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Sub Department</label>
											<select class="select" name="e_sub_department">
													<option value="">Select Sub Department</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													
											</select>
										</div>
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<div class="row">
								<h4 class="col-md-6 text-primary">Current Address</h4>
								<h4 class="col-md-6 text-primary">Permanent Address</h4>
								</div>
								<div class="row">
								
									<div class="col-sm-6 ">
										<div class="form-group">
											<label class="control-label">Address 1 </label>
											<textarea class="form-control" name="e_c_adress" placeholder="Enter Address1"></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">City </label>
											<input class="form-control" name="e_c_city" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">District </label>
											<input class="form-control" name="e_c_district" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">State </label>
												<select class="form-control" id="state" name="e_c_state">
												<option value="">N/A</option>
												<option value="AK">Alaska</option>
												<option value="AL">Alabama</option>
												<option value="AR">Arkansas</option>
												<option value="AZ">Arizona</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DC">District of Columbia</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="IA">Iowa</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="MA">Massachusetts</option>
												<option value="MD">Maryland</option>
												<option value="ME">Maine</option>
												<option value="MI">Michigan</option>
												<option value="MN">Minnesota</option>
												<option value="MO">Missouri</option>
												<option value="MS">Mississippi</option>
												<option value="MT">Montana</option>
												<option value="NC">North Carolina</option>
												<option value="ND">North Dakota</option>
												<option value="NE">Nebraska</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NM">New Mexico</option>
												<option value="NV">Nevada</option>
												<option value="NY">New York</option>
												<option value="OH">Ohio</option>
												<option value="OK">Oklahoma</option>
												<option value="OR">Oregon</option>
												<option value="PA">Pennsylvania</option>
												<option value="PR">Puerto Rico</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="SD">South Dakota</option>
												<option value="TN">Tennessee</option>
												<option value="TX">Texas</option>
												<option value="UT">Utah</option>
												<option value="VA">Virginia</option>
												<option value="VT">Vermont</option>
												<option value="WA">Washington</option>
												<option value="WI">Wisconsin</option>
												<option value="WV">West Virginia</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="checkbox">
										  <label><input type="checkbox"  name="address_same" id="address_same" value="">Click here if Currrent Address is Same as Permanent</label>
										</div>
									</div>
									<div class="col-sm-6 ">
										<div class="form-group">
											<label class="control-label">Address 1 </label>
											<textarea class="form-control" name="e_p_address" placeholder="Enter Address1"></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">City </label>
											<input class="form-control" name="e_p_city" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">District </label>
											<input class="form-control" name="e_p_district" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">State </label>
												<select class="form-control" id="e_p_state" name="e_p_state">
												<option value="">N/A</option>
												<option value="AK">Alaska</option>
												<option value="AL">Alabama</option>
												<option value="AR">Arkansas</option>
												<option value="AZ">Arizona</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DC">District of Columbia</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="IA">Iowa</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="MA">Massachusetts</option>
												<option value="MD">Maryland</option>
												<option value="ME">Maine</option>
												<option value="MI">Michigan</option>
												<option value="MN">Minnesota</option>
												<option value="MO">Missouri</option>
												<option value="MS">Mississippi</option>
												<option value="MT">Montana</option>
												<option value="NC">North Carolina</option>
												<option value="ND">North Dakota</option>
												<option value="NE">Nebraska</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NM">New Mexico</option>
												<option value="NV">Nevada</option>
												<option value="NY">New York</option>
												<option value="OH">Ohio</option>
												<option value="OK">Oklahoma</option>
												<option value="OR">Oregon</option>
												<option value="PA">Pennsylvania</option>
												<option value="PR">Puerto Rico</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="SD">South Dakota</option>
												<option value="TN">Tennessee</option>
												<option value="TX">Texas</option>
												<option value="UT">Utah</option>
												<option value="VA">Virginia</option>
												<option value="VT">Vermont</option>
												<option value="WA">Washington</option>
												<option value="WI">Wisconsin</option>
												<option value="WV">West Virginia</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Upload Employee Photo </label>
											<input class="form-control" name="e_profile_pic" type="file">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Upload Documents</label>
											<input class="form-control" name="e_document" type="file" multiple>
										</div>
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<h2 class="text-primary">Bank Account Details</h2>
							<hr>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Bank Name </label>
											<input class="form-control" name="e_bank_name" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Account Number </label>
											<input class="form-control" name="e_account_number" type="text">
										</div>
									</div>
								</div>	
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Account Holder Name </label>
											<input class="form-control" name="e_bank_h_name" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">IFSC Code</label>
											<input class="form-control" name="e_bank_ifcs_code" type="text">
										</div>
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<h2 class="text-primary">Contact Person Details</h2>
							<hr>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label"> Name </label>
											<input class="form-control" name="e_c_p_name" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Mobile Number </label>
											<input class="form-control" name="e_c_p_mobile" type="text">
										</div>
									</div>
								</div>	
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Email </label>
											<input class="form-control" name="e_c_p_email" type="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Relationship</label>
											<input class="form-control" name="e_c_p_relationship" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
											<div class="form-group">
											<label class="control-label">Address 1 </label>
											<textarea class="form-control" name="e_c_p_address" placeholder="Enter Address1"></textarea>
										</div>
									</div>
									
								</div>
							
								
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Create Employee</button>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<script>
$(function(){
    $('#address_same').click(function() {
        if($(this).is(':checked'))
			$('#same_as_above').hide();
        else
          $('#same_as_above').show();
    });
});
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			role_id: {
                validators: {
					notEmpty: {
						message: 'Role is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Role can only consist of alphanumeric, space and dot'
					}
				}
            },
			
            e_emplouee_id: {
                validators: {
					notEmpty: {
						message: 'Employee ID is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Employee ID can only consist of alphanumeric, space and dot'
					}
				}
            },
			e_join_date: {
                validators: {
					notEmpty: {
						message: 'Joining Date is required'
					},
					date: {
                        format: 'DD-MM-YYYY',
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




