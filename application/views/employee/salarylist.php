
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee Salary List</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="<?php echo base_url('employee/addsalary');?>" class="btn btn-primary rounded pull-right">  Add Salary</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
						
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th style="width:30%;">Employee</th>
											<th>Employee ID</th>
											<th>Email</th>
											<th>Joining Date</th>
											<!-- <th>Role</th> -->
											<th>Salary</th>
											<th>Payslip</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>

										<?php
										$count=0;
										if($flag==1){
										foreach ($data as $row):?>	

									<tr>
											<td>
												<a href="<?php echo base_url('employeeprofile/profile/').base64_encode($row->e_id);?>" class="avatar">

													<?php
													$count++;
                                                  
													echo substr($row->e_f_name,0,1)?></a>
												<h2><a href="#"><?php echo $row->e_f_name?> <span><?php echo $row->e_designation?></span></a></h2>
											</td>
											<td><?php echo $row->e_id?></td>
											<td><?php echo $row->e_email_work?></td>
											<td><?php echo $row->e_join_date?></td>
											
											<td><?php echo $row->e_net_salary?></td>
											<td><a class="btn btn-xs btn-primary" href="<?php echo base_url('employee/payslip/'.$row->e_id); ?>">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href='<?php echo base_url('payroll/editsal/'.base64_encode($row->e_id)); ?>'    title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<?php if(!($row->status==2)){?>
														<li><a href="<?php echo base_url('payroll/sal_delete/'.base64_encode($row->e_id)); ?>"   title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
														<?php } ?>
													</ul>
												</div>
											</td>
										</tr>
										<?php endforeach;}
										else {?>
											<tr  > 
												<td class='text-center'>no data found</td></tr>
										<?php }?>

										 
										<!-- <tr>
											<td>
												<a href="profile.html" class="avatar">J</a>
												<h2><a href="profile.html">John Doe <span>Web Designer</span></a></h2>
											</td>
											<td>FT-0001</td>
											<td>johndoe@example.com</td>
											<td>1 Jan 2013</td>
											<td>Shift Incharge</td>
											<td>₹59698</td>
											<td><a class="btn btn-xs btn-primary" href="<?php echo base_url('employee/payslip'); ?>">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" data-toggle="modal" data-target="#edit_salary" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" data-toggle="modal" data-target="#delete_salary" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr> -->
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
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
			
			<div id="edit_salary" class="modal custom-modal fade " role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Staff Salary</h4>
						</div>
						<div class="modal-body">
							<form id='update-form' action='<?php echo base_url('payroll/updatesal');?>' method='post'>
								<div class="row"> 
									<div class="col-md-6"> 
										<div class="form-group">
											<label>Select Staff</label>
											<!-- <select class="select"> 
												<option>John Doe</option>
												<option>Richard Miles</option>
											</select> -->
											<input id='ename' class="form-control" type="text" value="" name='ename'>
											<input id='eid' type='hidden' class="form-control"  value=""  name='uid'>
										</div>
									</div>
									<div class="col-md-6"> 
										<label>Net Salary</label>
										<input  id='editnetsal' class="form-control" type="text" value="$4000" name=''>
									</div>
								</div>
								<div class="row"> 
									<div class="col-md-6"> 
										<h4 class="text-primary">Earnings</h4>
										<div class="form-group">
											<label>Basic</label>
											<input id='editbsal' class="form-control" type="text" value="$6500" name='bsal'>
										</div>
										<div class="form-group">
											<label>DA(40%)</label>
											<input  id='editda'class="form-control" type="text" value="$2000" name='da'>
										</div>
										<div class="form-group">
											<label>HRA(15%)</label>
											<input id='edithra'class="form-control" type="text" value="$700" name='hra'>
										</div>
										<div class="form-group">
											<label>Conveyance</label>
											<input id='editconv'class="form-control" type="text" value="$70" name='conv'>
										</div>
										<div class="form-group">
											<label>Allowance</label>
											<input id='editallw'class="form-control" type="text" value="$30" name='allw'>
										</div>
										<div class="form-group">
											<label>Medical  Allowance</label>
											<input id='editmallw'class="form-control" type="text" value="$20" name='mallw'>
										</div>
										<div class="form-group">
											<label>Others</label>
											<input id='editeothers'class="form-control" type="text" name='eothers'>
										</div>  
									</div>
									<div class="col-md-6">  
										<h4 class="text-primary">Deductions</h4>
										<div class="form-group">
											<label>TDS</label>
											<input id='edittds'class="form-control" type="text" value="$300" name='tds'>
										</div> 
										<div class="form-group">
											<label>ESI</label>
											<input id='editesi'class="form-control" type="text" value="$20" name='esi'>
										</div>
										<div class="form-group">
											<label>PF</label>
											<input id='editpf' class="form-control" type="text" value="$20" name='pf'>
										</div>
										<!-- <div class="form-group">
											<label>Leave</label>
											<input class="form-control" type="text" value="$250" name=''>
										</div> -->
										<div class="form-group">
											<label>Prof. Tax</label>
											<input id='editptax'class="form-control" type="text" value="$110" name='ptax'>
										</div>
										<div class="form-group">
											<label>Labour Welfare</label>
											<input id='editlwel'class="form-control" type="text" value="$10"  name='lwel'>
										</div>
										<div class="form-group">
											<label>Fund</label>
											<input id='editfund' class="form-control" type="text" value="$40" name='fund'>
										</div>
										<div class="form-group">
											<label>Others</label>
											<input id='editdothers' class="form-control" type="text" value="$15" name='dothers'>
										</div>
									</div>
								</div>
								<div class="m-t-20 text-center">
									<button type='submit' class="btn btn-primary">Save & Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_salary" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Salary</h4>
						</div>
						<form>
							<div class="modal-body card-box">
								<p>Are you sure want to delete this?</p>
								<div class="m-t-20 text-left">
									<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-danger">Delete</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
        </div>


<script>
  $(function () {
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
<script type="text/javascript">
	
	$(document).ready(function() {

		<?php if($this->session->userdata('update')){?>
					
                   alert('salary updated');
                   //$('#m12').modal('show');

			<?php	} ?>

		//validations
		$('#update-form').bootstrapValidator({
//       
        fields: {
			bsal: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		da: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		hra: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		allw: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		mallw: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		conv: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		eothers: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		pf: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		esi: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		tds: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		ptax: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		lwel: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		fund: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},
		dothers: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		}
	}
            
    });
		// Validate the form manually
    $('#update-form').on('submit',function(){
    
	    	$('#update-form').bootstrapValidator('validate');}
	    	);

		<?php if(isset($_SESSION['update'])){?>
			alert( 'updated succefully');
<?php } ?>
		$('.salid').on('click',function(){
			val=$(this).data('id');
			alert(val);
			//return false;
			
			      $.ajax({
                    type: "GET",    //GET or POST or PUT or DELETE verb
                    url: 'http://localhost/hrms/payroll/empsal/'+val,     // Location of the service
                    data: "",     //Data sent to server
                   
                    dataType: "json",   //Expected data format from server
                    
                    success: function (result) {
                    	console.log(result);
                    	//alert(result.emp_id);
                          //alert(result['empid']);
                          $('#editbsal').val(result.e_basic);
                           $('#edithra').val(result.e_hra);
                            $('#editda').val(result.e_da);
                            $('#editconv').val(result.e_conveyance);
                           $('#editallw').val(result.e_allowance);
                            $('#editmallw').val(result.e_medical_allowance);
                            $('#editeothers').val(result.e_others);
                           $('#edittds').val(result.e_d_tds);
                            $('#editesi').val(result.e_d_esi);
                            $('#editpf').val(result.e_d_pf);
                           $('#editptax').val(result.e_d_Prof_tax);
                            $('#editlwel').val(result.e_d_labour_welfare);
                               $('#editfund').val(result.e_d_fund);
                            $('#editdothers').val(result.e_d_others);
                           $('#editnetsal').val(result.e_net_salary);
                           // $('#editlwel').val(result.labour_welfare);
                         $('#eid').val(result.e_id);
                          $('#ename').val(result.e_f_name);
                         
                         
                         
                         
                                           }
                    ,
                    error: function() { 
                    	alert('error from server side');

                    } 
                });



		})



	});
</script>