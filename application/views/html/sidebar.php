
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="active"> 
								<a href="<?php echo base_url('hrmsmanagement/dashboard');?>">Dashboard</a>
							</li>
							
							<li class="submenu">
								<a href="#" class="noti-dot"><span> Employees </span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="employees-list.php">All Employees</a></li>
									<li><a href="addemployee.php">Add Employee</a></li>
									<li><a href="holidays.php">Holidays</a></li>
						
								</ul>
							</li>
							<li class="submenu">
								<a href="#" ><span> Payroll Management</span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="salarylist.php"> Employee Salary </a></li>
									<li><a href="addsalery.php"> Add Salary </a></li>
									<li><a href="payslip.php"> Genarate Payslip </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#" ><span>Employee Management</span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="<?php echo base_url('hrmsmanagement/attendance'); ?>">Employee attendance </a></li>
									<li><a href="shift-management.php">Shift Mangement </a></li>
									<li><a class="active" href="leaves.php"><span>Leave Requests</span> <span class="badge bg-primary pull-right">1</span></a></li>
									<li><a href="leaves-list.php">Leaves List </a></li>		
								</ul>
							</li>
							<li class="submenu">
								<a href="#" ><span>Employee communication </span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="chat.php">Chat </a></li>
										
								</ul>
							</li>
							<li class="">
								<a href="<?php echo base_url('hrmsmanagement/saleman_track'); ?>" ><span>Salesman Man Track </span> </a>
								
							</li>
							
						</ul>
					</div>
                </div>
            </div>