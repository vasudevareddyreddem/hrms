
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="<?php echo base_url('employee/salarylist');?>" class="btn btn-primary pull-right rounded"> Salary Lists</a>
						
						</div>
					</div>
					<form id="salform" method="post" class="m-b-30" action="<?php echo base_url('payroll/addsal');?>">
					
								<div class="row"> 
									<div class="col-md-6"> 
										<div class="form-group">
											<label>Select Staff</label>
											<select class="select" name='uid'> 
												<?php foreach($data as $row):?>
													<option value='<?php echo $row->e_id?>' ><?php echo $row->e_f_name?></option>
												<?php endforeach?>
												<!-- <option>John Doe</option> 
												<option>Richard Miles</option> -->
											</select>
										</div>
									</div>
									<div class="col-md-6"> 
										<label>Net Salary</label>
										<input class="form-control" type="text" name='netsal' id='nsal'>
									</div>
								</div>
								<div class="row"> 
									<div class="col-md-6"> 
										<h4 class="text-primary ">Earnings</h4>
										<div class="form-group">
											<label>Basic</label>
											<input class="form-control netsal" type="text" id='bsal' name='bsal'>
										</div>
										<div class="form-group">
											<label>DA(40%)</label>
											<input class="form-control netsal" type="text"  name='da'id='da'>
										</div>
										<div class="form-group">
											<label>HRA(15%)</label>
											<input class="form-control netsal" type="text"  id='hra' name="hra">
										</div>
										<div class="form-group">
											<label>Conveyance</label>
											<input class="form-control netsal" type="text"id='conv' name='conv'>
										</div>
										<div class="form-group">
											<label>Allowance</label>
											<input class="form-control netsal" type="text" name='allw' id='allw'>
										</div>
										<div class="form-group">
											<label>Medical  Allowance</label>
											<input class="form-control netsal" type="text" name='mallw' id='mallw'>
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control netsal" type="text" name='eothers' id='eothers'>
										</div>  
									</div>
									<div class="col-md-6">  
										<h4 class="text-primary">Deductions</h4>
										<div class="form-group" >
											<label>TDS</label>
											<input class="form-control " type="text" name='tds'>
										</div> 
										<div class="form-group">
											<label>ESI</label>
											<input class="form-control " type="text" name='esi'>
										</div>
										<div class="form-group">
											<label>PF</label>
											<input class="form-control " type="text" name='pf'>
										</div>
										<!-- <div class="form-group">
											<label>Leave</label>
											<input class="form-control " type="text" name=''>
										</div> -->
										<div class="form-group">
											<label>Prof. Tax</label>
											<input class="form-control " type="text" name='ptax'>
										</div>
										<div class="form-group">
											<label>Labour Welfare</label>
											<input class="form-control" type="text" name='lwel'>
										</div>
										<div class="form-group">
											<label>Fund</label>
											<input class="form-control" type="text" name='fund'>
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control" type="text" name='dothers'>
										</div>
									</div>
								</div>
								<div class="m-t-20 text-center">
									<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Create Salary</button>
																	</div>
							</form>
						
						</div>
					</div>
				</div>
			</div>
			
<!-- modal -->
  
<div class="modal fade" id="m12" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p id='para'>
                	<?php if($this->session->flashdata('errors')){

                		  echo validation_errors();
                	} ?>
                </p>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
			
<script >
			$(document).ready(function() {


				// net salary
			$(".netsal").keyup(function() { 
				//alert('ok');
				if($('#bsal').val().length>0 && $('#hra').val().length>0 && $('#da').val().length>0 && $('#conv').val().length>0 && $('#allw').val().length>0 && $('#mallw').val().length>0 && $('#eothers').val().length>0 ){

				 val=parseInt($('#bsal').val())+parseInt($('#hra').val())+parseInt($('#da').val())+parseInt($('#conv').val())+parseInt($('#allw').val())+parseInt($('#mallw').val())+parseInt($('#eothers').val());
				


                $('#nsal').val(val);

                   }




			 });

				<?php if($this->session->userdata('errors')){?>
					
                   alert('errors in page');
                   //$('#m12').modal('show');

			<?php	} ?>


 
   $('#salform').bootstrapValidator({
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
		},hra: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},da: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},conv: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},allw: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},mallw: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},eothers: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},tds: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},pf: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},esi: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},fund: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},lwel: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},dothers: {validators: {
					notEmpty: {
						message: 'basic salary is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'you can enter only numeric data'
					}
				}
		},ptax: {validators: {
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
    $('#salform').on('submit',function(){
    
	    	$('#salform').bootstrapValidator('validate');}
	    	);

//$('#salform').bootstrapValidator('validate');

    });
   


</script>




