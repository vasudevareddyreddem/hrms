
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
					<form id="salform" method="post" class="m-b-30" action="<?php echo base_url('payroll/updatesal');?>">
					
								<div class="row"> 
									<div class="col-md-4"> 
										<div class="form-group">
											
											<input type='hidden' name='uid' value='<?php echo $row->e_id?>'>
											<label>employee name </label>
											
											<input class="form-control netsal" type="text" value='<?php echo $row->e_f_name?>'  readonly>
										</div>
									</div>
									<div class="col-md-4"> 
										<label>Net Salary</label>
										<input class="form-control" type="text" name='netsal' id='nsal'value='<?php echo $row->e_net_salary?>' >
									</div>
									<div class="col-md-4"> 
										<label>salarytype</label>
										<select id='' class="select" name='saltype'>

                                       <?php foreach($salary_type as $sal): ?>
										<option value='<?php echo $sal->sal_id; ?>'
										 '<?php if($sal->sal_id==$row->salary_type){echo ' selected="selected"';}?>'> <?php echo $sal->sal_type ?></option>
                                   <?php endforeach?>											
											<?php echo $sal->sal_type ?>
											</select>
									</div>
								</div>
								<div class="row"> 
									<div class="col-md-6"> 
										<h4 class="text-primary ">Earnings</h4>
										<div class="form-group">
											<label>Basic</label>
											<input class="form-control netsal" type="text" id='bsal' name='bsal' value='<?php echo $row->e_basic?>'>
										</div>
										<div class="form-group">
											<label>DA(40%)</label>
											<input class="form-control netsal" type="text"  name='da'id='da' value='<?php echo $row->e_da?>'>
										</div>
										<div class="form-group">
											<label>HRA(15%)</label>
											<input class="form-control netsal" type="text"  id='hra' name="hra" value='<?php echo $row->e_hra?>'>
										</div>
										<div class="form-group">
											<label>Conveyance</label>
											<input class="form-control netsal" type="text"id='conv' name='conv' value='<?php echo $row->e_conveyance?>'>
										</div>
										<div class="form-group">
											<label>Allowance</label>
											<input class="form-control netsal" type="text" name='allw' id='allw' value='<?php echo $row->e_allowance?>'>
										</div>
										<div class="form-group">
											<label>Medical  Allowance</label>
											<input class="form-control netsal" type="text" name='mallw' id='mallw'value='<?php echo $row->e_medical_allowance?>'>
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control netsal" type="text" name='eothers' id='eothers'value='<?php echo $row->e_others?>'>
										</div>  
									</div>
									<div class="col-md-6">  
										<h4 class="text-primary">Deductions</h4>
										<div class="form-group" >
											<label>TDS</label>
											<input class="form-control " type="text" name='tds' value='<?php echo $row->e_d_tds?>'>
										</div> 
										<div class="form-group">
											<label>ESI</label>
											<input class="form-control " type="text" name='esi' value='<?php echo $row->e_d_esi?>'>
										</div>
										<div class="form-group">
											<label>PF</label>
											<input class="form-control " type="text" name='pf' value='<?php echo $row->e_d_pf?>'>
										</div>
										<!-- <div class="form-group">
											<label>Leave</label>
											<input class="form-control " type="text" name=''>
										</div> -->
										<div class="form-group">
											<label>Prof. Tax</label>
											<input class="form-control " type="text" name='ptax' value='<?php echo $row->e_d_Prof_tax?>'>
										</div>
										<div class="form-group">
											<label>Labour Welfare</label>
											<input class="form-control" type="text" name='lwel' value='<?php echo $row->e_d_labour_welfare?>'>
										</div>
										<div class="form-group">
											<label>Fund</label>
											<input class="form-control" type="text" name='fund' value='<?php echo $row->e_d_fund?>'>
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control" type="text" name='dothers' value='<?php echo $row->e_d_others?>'>
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




