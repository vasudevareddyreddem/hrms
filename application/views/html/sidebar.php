<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
			<?php if($userdetails['role_id']==2){ ?>
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
                    <a href="#"><span> Payroll Management</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/salarylist');?>"> Employee Salary </a></li>
                        <li><a href="<?php echo base_url('employee/addsalary');?>"> Add Salary </a></li>
                        <li><a href="<?php echo base_url('payroll/genpayslip');?>"> Genarate Payslip </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span>Employee Management</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/attendance'); ?>">Employee attendance </a></li>
                        <li><a href="<?php echo base_url('employee/shiftmangement');?>">Shift Mangement </a></li>
                        <li><a href="<?php echo base_url('employee/leaverequests');?>"><span>Leave Requests</span> <span class="badge bg-primary pull-right" id="notification_unread_count"><?php if(isset($notification_count['cnt']) && $notification_count['cnt']>0){  echo $notification_count['cnt']; } ?></span></a></li>
                        <li><a href="<?php echo base_url('employee/leaveslist');?>">Leaves List </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span>Employee communication </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/chat');?>">Chat </a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span>Department</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/department');?>">Add Department</a></li>
                        <li><a href="<?php echo base_url('employee/departmentlist');?>">Department List</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span>Sub Department</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/subdepartment');?>">Add Sub Department</a></li>
                        <li><a href="<?php echo base_url('employee/subdepartmentlist');?>">Sub Department List</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span>Shift</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/shift');?>">Add shift</a></li>
                        <li><a href="<?php echo base_url('employee/shiftlist');?>">shift List</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="<?php echo base_url('sales'); ?>"><span>Salesman Man Track </span> </a>
                </li>
				
				 <li class="submenu">
                    <a href="#"><span>Area</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/area');?>">Add Area</a></li>
                        <li><a href="<?php echo base_url('employee/arealist');?>">Area List</a></li>
                    </ul>
                </li>
				
				<!--<li class="submenu">
                    <a href="#"><span>Leave Type</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/leavetype');?>">Add Leave Type</a></li>
                        <li><a href="<?php echo base_url('employee/leavetypelist');?>">Leave Type List</a></li>
                    </ul>
                </li>-->
				
				
				
                <li class="submenu">
                    <a href="#"><span>Work Distribution</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li>
                            <a href="<?php echo base_url('employee/assignwork'); ?>"><span>Add Work</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('employee/workdistributionlist'); ?>"><span>Work List</span> </a>
                        </li>
                    </ul>
                </li>
				
				
				<li class="submenu">
                    <a href="#"><span>Leave Policy</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li>
                            <a href="<?php echo base_url('employee/leavepolicy'); ?>"><span>Add Leave Policy</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('employee/leavepolicylist'); ?>"><span>Leave Policy List</span> </a>
                        </li>
                    </ul>
                </li>
				
				
             
				<li class="nav-item  ">
                    <a href="<?php echo base_url('dashboard/logout'); ?>" class="nav-link "> <i class="material-icons"></i>
                        <span class="title">Logout</span> <span class="arrow"></span>
                    </a>
                </li>
				
			<?php } else if($userdetails['role_id']==1){?>
			  <li class="active">
                    <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                </li>

			 <li class="submenu">
                    <a href="#"><span>Employee communication </span> <span class="menu-arrow"></span></a>
					
					
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/chat');?>">Chat </a></li>

                    </ul>
					<li class="nav-item  ">
                    <a href="<?php echo base_url('dashboard/logout'); ?>" class="nav-link "> <i class="material-icons"></i>
                        <span class="title">Logout</span> <span class="arrow"></span>
                    </a>
                </li>
					
					
                </li>
			<?php  } else{ ?>
			  <li class="active">
                    <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                </li>

			 <li class="submenu">
                    <a href="#"><span>Employee Management</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        
                        <li><a href="<?php echo base_url('employee/leaves');?>"><span>Leave Requests</span> <span class="badge bg-primary pull-right"><?php if(isset($notification_count['cnt']) && $notification_count['cnt']>0){  echo $notification_count['cnt']; } ?></span></a></li>
						<li><a href="<?php echo base_url('employee/leaveslist');?>"><span>Leave Lists</span> <span class="badge bg-primary pull-right"></a></li>
                    </ul>
                </li>
				<li class="submenu">
                    <a href="#"><span>Employee communication </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="<?php echo base_url('employee/chat');?>">Chat </a></li>

                    </ul>
                </li>
				<li class="">
                    <a href="<?php echo base_url('employee/resignation '); ?>"><span>Employee Resignation </span> <span class=""></span></a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo base_url('dashboard/logout'); ?>" class="nav-link "> <i class="material-icons"></i>
                        <span class="title">Logout</span> <span class="arrow"></span>
                    </a>
                </li>
			<?php } ?>
			
            </ul>
        </div>
    </div>
</div>