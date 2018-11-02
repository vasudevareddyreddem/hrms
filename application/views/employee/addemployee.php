
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="<?php echo base_url('employee/all'); ?>" class="btn btn-primary pull-right rounded"> Employees Lists</a>
						
						</div>
					</div>
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('employee/addpost');?>" enctype="multipart/form-data">
							<h2 class="text-primary">Basic Details</h2>
							<hr>
								<div class="row">
								
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
										<div class="col-sm-2">
										<div class="form-group">
										<label class=" control-label">Designation</label>
										<div class="">
										<select onchange="get_type(this.value);" id="e_designation" name="e_designation"  class="form-control" >
										<option value="">Select</option>
										<?php foreach ($roles_list as $list){ ?>
										<option value="<?php echo $list['r_id']; ?>"><?php echo $list['role']; ?></option>
										<?php }?>
										</select>
										</div>
									    </div>
									</div>
									
										<div class="col-sm-2" id="retur_type_div">
										<div class="form-group">
											<label class="control-label">Supervisor</label>
											<select class="select" name="e_supervisor" >
													<option value="">Select Supervisor</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													
											</select>
										</div>
									</div>	
									
									<div class="col-sm-2">
										<div class="form-group">
										<label class=" control-label">Department</label>
										<div class="">
										<select id="e_department" name="e_department" onchange="get_department_list(this.value)" class="form-control" >
										<option value="">Select</option>
										<?php foreach ($deparment_data as $list){ ?>
										<option value="<?php echo $list['d_id']; ?>"><?php echo $list['department']; ?></option>
										<?php }?>
										</select>
										</div>
									    </div>
								 </div>
									
									
									<div class="col-sm-2">
									<div class="form-group">
								<label class=" control-label">Sub Department</label>
								<div class="">
									<select id="e_sub_department" name="e_sub_department"  class="form-control" >
									<option value="">Select</option>
									</select>
								</div>
							</div>
										
									</div>
									<div class="col-sm-2">
									<div class="form-group">
										<label class=" control-label">Shift</label>
										<div class="">
										<select id="e_shift" name="e_shift"  class="form-control" >
										<option value="">Select</option>
										<?php foreach ($shift_data as $list){ ?>
										<option value="<?php echo $list['s_id']; ?>"><?php echo $list['shift']; ?></option>
										<?php }?>
										</select>
										</div>
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
											<textarea class="form-control" id="e_c_adress" name="e_c_adress" placeholder="Enter Address1"></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">City </label>
											<input class="form-control"id="e_c_city" name="e_c_city" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">District </label>
											<input class="form-control" id="e_c_district" name="e_c_district" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">State </label>
												<select class="select form-control floating" id="e_c_state" name="e_c_state">
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
										
										
										<div class="checkbox">
                                    <label>
                                    <input type="checkbox" value="" name="filltoo" id="filltoo" onclick="filladd()" />Click here if Currrent Address is Same as Permanent

                                    </label>
                                </div>
								</div>
								<span id="same_as_above">
								
								
									<div class="col-sm-6 ">
										<div class="form-group">
											<label class="control-label">Address 1 </label>
											<textarea class="form-control" id="e_p_address" name="e_p_address" placeholder="Enter Address1"></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">City </label>
											<input class="form-control" id="e_p_city" name="e_p_city" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">District </label>
											<input class="form-control" id="e_p_district" name="e_p_district" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">State </label>
												<select class="form-control" id="e_p_state" name="e_p_state">
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
									
								</div>
								</span>
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
 
  <script type="text/javascript">
  
  function get_type(val){
	  
	  if(val=='8'){
		  $('#retur_type_div').hide(); 
		  $('#e_supervisor').val(''); 
	  }else{
		$('#retur_type_div').show(); 

	  }
	  
  }

function get_department_list(e_department){
	if(e_department !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('employee/department_wise_list');?>",
   			data: {
				e_department: e_department,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#e_sub_department').empty();
							$('#e_sub_department').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#e_sub_department').append("<option value="+parsedData.list[i].s_d_id+">"+parsedData.list[i].sub_department+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>
<script>
function filladd()
{
	 if(filltoo.checked == true) 
     {
             var e_p_address =document.getElementById("e_c_adress").value;
			 var e_p_city =document.getElementById("e_c_city").value;
			 var e_p_district =document.getElementById("e_c_district").value;
			 var e_p_state =document.getElementById("e_c_state").value;
          

           
            var e_c_adress =e_p_address ;
            var e_c_city =e_p_city ;
            var e_c_district =e_p_district ;
            var e_c_state =e_p_state ;

            
            document.getElementById("e_p_address").value = e_c_adress;
            document.getElementById("e_p_city").value = e_c_city;
            document.getElementById("e_p_district").value = e_c_district;
            document.getElementById("e_p_state").value = e_c_state;
	 }
	 else if(filltoo.checked == false)
	 {
		 document.getElementById("e_p_address").value='';
		 document.getElementById("e_p_city").value='';
		 document.getElementById("e_p_district").value='';
		 document.getElementById("e_p_state").value='';
	 }
}


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




