
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
					<form id="defaultForm" method="post" class="m-b-30" action="<?php echo base_url('payroll/addsal');?>">
					
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
										<input class="form-control" type="text" name='netsal' >
									</div>
								</div>
								<div class="row"> 
									<div class="col-md-6"> 
										<h4 class="text-primary">Earnings</h4>
										<div class="form-group">
											<label>Basic</label>
											<input class="form-control" type="text" name="firstName" name='bsal'>
										</div>
										<div class="form-group">
											<label>DA(40%)</label>
											<input class="form-control" type="text" name='da'>
										</div>
										<div class="form-group">
											<label>HRA(15%)</label>
											<input class="form-control" type="text" name="hra">
										</div>
										<div class="form-group">
											<label>Conveyance</label>
											<input class="form-control" type="text" name='conv'>
										</div>
										<div class="form-group">
											<label>Allowance</label>
											<input class="form-control" type="text" name='allw'>
										</div>
										<div class="form-group">
											<label>Medical  Allowance</label>
											<input class="form-control" type="text" name='mallw'>
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control" type="text" name='eothers'>
										</div>  
									</div>
									<div class="col-md-6">  
										<h4 class="text-primary">Deductions</h4>
										<div class="form-group">
											<label>TDS</label>
											<input class="form-control" type="text" name='tds'>
										</div> 
										<div class="form-group">
											<label>ESI</label>
											<input class="form-control" type="text" name='esi'>
										</div>
										<div class="form-group">
											<label>PF</label>
											<input class="form-control" type="text" name='pf'>
										</div>
										<div class="form-group">
											<label>Leave</label>
											<input class="form-control" type="text" name=''>
										</div>
										<div class="form-group">
											<label>Prof. Tax</label>
											<input class="form-control" type="text" name='ptax'>
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
			




