
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
						<?php if($userdetails['role_id']==1){ ?>	
							<li class="active"> 
								<a href="<?php echo base_url('dashboard');?>">Dashboard</a>
							</li>
							
							<li class="submenu">
								<a href="#" class="noti-dot"><span> Employees </span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="<?php echo base_url('employee/all');?>">All Employees</a></li>
									<li><a href="<?php echo base_url('employee/add');?>">Add Employee</a></li>
									<li><a href="<?php echo base_url('employee/holidays');?>">Holidays</a></li>
						
								</ul>
							</li>
							<li class="submenu">
								<a href="#" ><span> Payroll Management</span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="<?php echo base_url('employee/salary');?>"> Employee Salary </a></li>
									<li><a href="<?php echo base_url('employee/addsalary');?>"> Add Salary </a></li>
									<li><a href="<?php echo base_url('employee/payslip');?>"> Genarate Payslip </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#" ><span>Employee Management</span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="<?php echo base_url('employee/attendance'); ?>">Employee attendance </a></li>
									<li><a href="<?php echo base_url('employee/shiftmangement');?>">Shift Mangement </a></li>
									<li><a  href="<?php echo base_url('employee/leaverequests');?>"><span>Leave Requests</span> <span class="badge bg-primary pull-right">1</span></a></li>
									<li><a href="<?php echo base_url('employee/leaveslist');?>">Leaves List </a></li>		
								</ul>
							</li>
							<li class="submenu">
								<a href="#" ><span>Employee communication </span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="<?php echo base_url('employee/chat');?>">Chat </a></li>
										
								</ul>
							</li>
							<li class="">
								<a href="<?php echo base_url('employee/salemantrack'); ?>" ><span>Salesman Man Track </span> </a>
								
							</li>
						<?php } else if($userdetails['role_id']==2){ ?>
						<li class="active"> 
								<a href="<?php echo base_url('dashboard');?>">Dashboard</a>
							</li>
							
							<li class="submenu">
								<a href="#" class="noti-dot"><span> Employees </span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="">All Employees</a></li>
									<li><a href="">Add Employee</a></li>
									<li><a href="">Holidays</a></li>
						
								</ul>
							</li>
							
							
							
								<?php } else if($userdetails['role_id']==3){ ?>
								<li class="active"> 
								<a href="<?php echo base_url('dashboard');?>">Dashboard</a>
							</li>
							
							
							<li class="submenu">
								<a href="#" ><span> Payroll Management</span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href=""> Employee Salary </a></li>
									<li><a href=""> Add Salary </a></li>
									<li><a href=""> Genarate Payslip </a></li>
								</ul>
							</li>
							
							
							
							<?php }?>
								
							<li class="nav-item  ">
	                            <a  href="<?php echo base_url('dashboard/logout'); ?>" class="nav-link "> <i class="material-icons"> power_settings_new</i>
	                                <span class="title">Logout</span> <span class="arrow"></span>
	                            </a>
	                        </li>	
								
						</ul>
					</div>
                </div>
            </div>