<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-8">
                <h4 class="page-title">Payslip</h4>
            </div>
            <div class="col-sm-4 text-right m-b-30">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-default">CSV</button>
                    <a href="<?php echo base_url('downloadfile/download/').base64_encode($pslip_det->payslip_pdf);?>" class="btn btn-default">PDF</a>
                    <button class="btn btn-default"><i class="fa fa-print fa-lg"></i> Print</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="payslip-title">
                        <?php if($sal_type==1){?>
                        Payslip for the month of

                        <?php echo $pslip_det->e_salary_month.' '.$pslip_det->e_salary_year;}?>
                        <?php if($sal_type==2){?>payslip for the week from
                        <?php echo $startdate;?> to
                        <?php echo $enddate;}?>
                        <?php if($sal_type==3){?> payslip for the day of
                        <?php echo $pslip_det->daily_date;}?>

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
                                    <?php echo $pslip_det->e_s_p_id;?>
                                </h3>
                                <ul class="list-unstyled">
                                    <?php if($sal_type==1){?>
                                    <li>Salary Month: <span>
                                            <?php echo $pslip_det->e_salary_month.','.$pslip_det->e_salary_year?>
                                            </span></li>
                                    <?php }?>
                                    <?php if($sal_type==2){?>
                                    <li>Salary Week: <span>
                                            <?php echo 'From:'.$startdate.'To'.$enddate?>
                                            </span></li>
                                    <?php }?>
                                    <?php if($sal_type==3){?>
                                    <li>Salary Day: <span>
                                            <?php echo $pslip_det->daily_date ;?>
                                            </span></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 m-b-20">
                            <ul class="list-unstyled">
                                <li>
                                    <h5 class="m-b-0"><strong>
                                            <?php echo $pslip_det->e_f_name ?></strong></h5>
                                </li>
                                <li><span>
                                        <?php echo $pslip_det->role ?></span></li>
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
                    <div class="row m-b-20">
                        <div class="col-sm-6">
                            <div>
                                 <?php if($sal_type==1 or $sal_type==2){?>
                                <h4 class="m-b-10"><strong>Leaves</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>

                                        <tr>
                                            <td><strong>Pay Leave Days</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->payleave_days ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>General Leaave Days</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->genleave_days  ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Medical Leave Days</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->medleave_days ?></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <?php }?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <h4 class="m-b-10"><strong>SALARY</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php if($sal_type==1){?>
                                        <tr>

                                            <td><strong>Monthly Salary</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_tds ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Deducted Monthly Salary</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_pf ?></span></td>
                                        </tr>
                                    <?php }?>
                                    <?php if($sal_type==2){?>
                                        <tr>
                                            <td><strong>Weekly Salary</strong> <span class="pull-right">
                                                    <?php $sal= $pslip_det->e_basic/(float)30;
                                                    echo (int)$sal*7 ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Weekly Take Home Salary</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->weekly_sal ?></span></td>
                                        </tr>
                                    <?php }?>
                                    <?php if($sal_type==3){?>
                                        <tr>
                                            <td><strong>Daily Salary</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->day_sal ?></span></td>
                                        </tr>
                                        
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Basic Salary</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_basic ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>DA</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_da ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_hra ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Conveyance</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_conveyance ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong> Allowance</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_allowance ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong> Medical Allowance</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_medical_allowance ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Other Allowance</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_others ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Earnings</strong> <span class="pull-right"><strong>
                                                        <?php echo $pslip_det->e_net_salary ?></strong></span></td>
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
                                            <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_tds ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provident Fund</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_pf ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ESI</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_esi ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Professional Tax</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_Prof_tax ?></span></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Fund</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_fund ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Leaves</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_leaves_deduction ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Labour Welfare Fund</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_labour_welfare ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Others</strong> <span class="pull-right">
                                                    <?php echo $pslip_det->e_d_others ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Deductions</strong> <span class="pull-right"><strong>
                                                        <?php echo $pslip_det->e_salary_deduction ?></strong></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p><strong>Net Salary:
                                    <?php echo $pslip_det->e_net_salary ?></strong>
                                <?php echo $this->numbertowords->convert_number($pslip_det->e_net_salary).'Rupees'; ?>
                            </p>
                        </div>
                        <!-- <div class="col-md-12">
                            <?php if($sal_type==1){?>
                            <p>
                                <?php echo'payleavedays'.$pslip_det->payleave_days  ?>
                            </p>
                            <p>
                                <?php echo'generalleavedays'.$pslip_det->genleave_days  ?>
                            </p>
                            <p>
                                <?php echo'medicalleavedays'.$pslip_det->medleave_days  ?>
                            </p>
                            <?php }?>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 	<div class="notification-box">
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
				</div> -->
</div>