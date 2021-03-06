<head>
<style>
.col-md-6{
	width:50%;
}
.pull-right{
	float:right;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
</head>
<div class="row">
			<div style="width:100%">
				<div class="card-box">
					<h4 class="payslip-title">Payslip for the month of 
									
						<?php echo $pslip_det->e_salary_month.' '.$pslip_det->e_salary_year?>
					</h4>
					<div class="row">
						<div class="col-md-6 m-b-20">
							<img src="assets/img/logo2.png" class="m-b-20" alt="" style="width: 100px;">
								<ul class="list-unstyled m-b-0">
									<li>Focus Technologies</li>
									<li>3864 Quiet Valley Lane,</li>
									<li>Sherman Oaks, CA, 91403</li>
								</ul>
							</div>
							<div class="col-md-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">Payslip 
										<?php echo $pslip_det->e_s_p_id  ?>
									</h3>
									<ul class="list-unstyled">
										<li>Salary Month: 
											<span>
												<?php echo $pslip_det->e_salary_month.','.$pslip_det->e_salary_year?>
											</h4>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 m-b-20">
							<ul class="list-unstyled">
								<li>
									<h5 class="m-b-0">
										<strong>
											<?php echo $pslip_det->e_f_name ?>
										</strong>
									</h5>
								</li>
								<li>
									<span>
										<?php echo $pslip_det->e_designation ?>
									</span>
								</li>
								<li>Employee ID: 
									<?php echo $pslip_det->e_emplouee_id ?>
								</li>
								<li>Joining Date: 
									<?php $day=explode("-",$pslip_det->e_join_date);
											echo $day[2]?$day[2]:'';
                                         $date = date('F, Y', strtotime($pslip_det->e_join_date));

											echo $date;  ?>
								</li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div>
								<h4 class="m-b-10">
									<strong>Earnings</strong>
								</h4>
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td>
												<strong>Basic Salary</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_basic ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>DA</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_da ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>House Rent Allowance (H.R.A.)</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_hra ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Conveyance</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_conveyance ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong> Allowance</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_allowance ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong> Medical Allowance</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_medical_allowance ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Other Allowance</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_others ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Total Earnings</strong>
												<span class="pull-right">
													<strong>
														<?php echo $pslip_det->e_net_salary ?>
													</strong>
												</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<h4 class="m-b-10">
									<strong>Deductions</strong>
								</h4>
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td>
												<strong>Tax Deducted at Source (T.D.S.)</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_d_tds ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Provident Fund</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_d_pf ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>ESI</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_d_esi ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Professional Tax</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_d_Prof_tax ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Fund</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_d_fund ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Leaves</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_leaves_deduction ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Labour Welfare Fund</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_d_labour_welfare ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Others</strong>
												<span class="pull-right">
													<?php echo $pslip_det->e_d_others ?>
												</span>
											</td>
										</tr>
										<tr>
											<td>
												<strong>Total Deductions</strong>
												<span class="pull-right">
													<strong>
														<?php echo $pslip_det->e_salary_deduction ?>
													</strong>
												</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12">
							<p>
								<strong>Net Salary: 
									<?php echo $pslip_det->e_net_salary ?>
								</strong>
								<?php echo $this->numbertowords->convert_number($pslip_det->e_net_salary).'Rupees'; ?>
							</p>
						</div>
						<div class="col-md-12">
							<p>
								<?php echo'payleavedays'.$pslip_det->payleave_days  ?>
							</p>
							<p>
								<?php echo'generalleavedays'.$pslip_det->genleave_days  ?>
							</p>
							<p>
								<?php echo'medicalleavedays'.$pslip_det->medleave_days  ?>
							</p>
						</div>
					</div>
				</div>
			</div>
</div>

            



