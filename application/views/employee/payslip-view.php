
<div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-xs-8">
							<h4 class="page-title">Payslip</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<div class="btn-group btn-group-sm">
								<button class="btn btn-default">CSV</button>
								<a href="<?php echo base_url('payroll/gen_pdf');?>"  class="btn btn-default">PDF</a>
								<button class="btn btn-default"><i class="fa fa-print fa-lg"></i> Print</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card-box">
								<h4 class="payslip-title">Payslip for the month of 
									<?php echo $month.' '.$year?></h4>
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
											<h3 class="text-uppercase">Payslip #49029</h3>
											<ul class="list-unstyled">
												<li>Salary Month: <span><?php echo $month.','.$year?></h4></span></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 m-b-20">
										<ul class="list-unstyled">
											<li><h5 class="m-b-0"><strong><?php echo $sal_det->e_f_name ?></strong></h5></li>
											<li><span><?php echo $sal_det->e_designation ?></span></li>
											<li>Employee ID: <?php echo $sal_det->e_emplouee_id ?></li>
											<li>Joining Date: <?php $day=explode("-",$sal_det->e_join_date);
											echo $day[2]?$day[2]:'';
                                         $date = date('F, Y', strtotime($sal_det->e_join_date));

echo $date;  ?></li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div>
											<h4 class="m-b-10"><strong>Earnings</strong></h4>
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td><strong>Basic Salary</strong> <span class="pull-right"><?php echo $sal_det->e_basic ?></span></td>
													</tr>
													<tr>
														<td><strong>DA</strong> <span class="pull-right"><?php echo $sal_det->e_da ?></span></td>
													</tr>
													<tr>
														<td><strong>House Rent Allowance (H.R.A.)</strong> <span class="pull-right"><?php echo $sal_det->e_hra ?></span></td>
													</tr>
													<tr>
														<td><strong>Conveyance</strong> <span class="pull-right"><?php echo $sal_det->e_conveyance ?></span></td>
													</tr>
													<tr>
														<td><strong> Allowance</strong> <span class="pull-right"><?php echo $sal_det->e_allowance ?></span></td>
													</tr>
													<tr>
														<td><strong> Medical Allowance</strong> <span class="pull-right"><?php echo $sal_det->e_medical_allowance ?></span></td>
													</tr>
													<tr>
														<td><strong>Other Allowance</strong> <span class="pull-right"><?php echo $sal_det->e_others ?></span></td>
													</tr>
													<tr>
														<td><strong>Total Earnings</strong> <span class="pull-right"><strong><?php echo $sal_det->e_net_salary ?></strong></span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-sm-6">
										<div>
											<h4 class="m-b-10"><strong>Deductions</strong></h4>
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="pull-right"><?php echo $sal_det->e_d_tds ?></span></td>
													</tr>
													<tr>
														<td><strong>Provident Fund</strong> <span class="pull-right"><?php echo $sal_det->e_d_pf ?></span></td>
													</tr>
													<tr>
														<td><strong>ESI</strong> <span class="pull-right"><?php echo $sal_det->e_d_esi ?></span></td>
													</tr>
													<tr>
														<td><strong>Professional Tax</strong> <span class="pull-right"><?php echo $sal_det->e_d_Prof_tax ?></span></td>
													</tr>
													
													<tr>
													<td><strong>Fund</strong> <span class="pull-right"><?php echo $sal_det->e_d_fund ?></span></td>
													</tr>
													<tr>
													<td><strong>Leaves</strong> <span class="pull-right"><?php echo $leave_ded ?></span></td>
													</tr>
													<tr>
													<td><strong>Labour Welfare Fund</strong> <span class="pull-right"><?php echo $sal_det->e_d_labour_welfare ?></span></td>
													</tr>
													<tr>
													<td><strong>Others</strong> <span class="pull-right"><?php echo $sal_det->e_d_others ?></span></td>
													</tr>
													<tr>
														<td><strong>Total Deductions</strong> <span class="pull-right"><strong><?php echo $total_ded ?></strong></span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-md-12">
										<p><strong>Net Salary: <?php echo $sal_det->e_net_salary ?></strong> <?php echo $this->numbertowords->convert_number($sal_det->e_net_salary).'Rupees'; ?></p>
									</div>
								</div>
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
