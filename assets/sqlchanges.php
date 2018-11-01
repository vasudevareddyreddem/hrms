
ALTER TABLE `hrms`.`empployee`   
  ADD COLUMN `e_shift` VARCHAR(250) NULL AFTER `e_sub_department`;
 
 
 
Create Table

CREATE TABLE `empployee` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_emplouee_id` varchar(250) DEFAULT NULL,
  `e_join_date` varchar(250) DEFAULT NULL,
  `e_f_name` varchar(250) DEFAULT NULL,
  `e_l_name` varchar(250) DEFAULT NULL,
  `e_login_name` varchar(250) DEFAULT NULL,
  `e_email_personal` varchar(250) DEFAULT NULL,
  `e_email_work` varchar(250) DEFAULT NULL,
  `e_password` varchar(250) DEFAULT NULL,
  `e_org_password` varchar(250) DEFAULT NULL,
  `e_mobile_personal` varchar(250) DEFAULT NULL,
  `e_mobile_work` varchar(250) DEFAULT NULL,
  `e_designation` varchar(250) DEFAULT NULL,
  `e_supervisor` varchar(250) DEFAULT NULL,
  `e_department` varchar(250) DEFAULT NULL,h
  `e_sub_department` varchar(250) DEFAULT NULL,
  `e_shift` varchar(250) DEFAULT NULL,
  `e_c_adress` varchar(250) DEFAULT NULL,
  `e_c_city` varchar(250) DEFAULT NULL,
  `e_c_district` varchar(250) DEFAULT NULL,
  `e_c_state` varchar(250) DEFAULT NULL,
  `e_c_country` varchar(250) DEFAULT NULL,
  `e_p_address` varchar(250) DEFAULT NULL,
  `e_p_city` varchar(250) DEFAULT NULL,
  `e_p_district` varchar(250) DEFAULT NULL,
  `e_p_state` varchar(250) DEFAULT NULL,
  `e_p_country` varchar(250) DEFAULT NULL,
  `e_profile_pic` varchar(250) DEFAULT NULL,
  `e_document` varchar(250) DEFAULT NULL,
  `e_bank_name` varchar(250) DEFAULT NULL,
  `e_account_number` varchar(250) DEFAULT NULL,
  `e_bank_h_name` varchar(250) DEFAULT NULL,
  `e_bank_ifcs_code` varchar(250) DEFAULT NULL,
  `e_c_p_name` varchar(250) DEFAULT NULL,
  `e_c_p_mobile` varchar(250) DEFAULT NULL,
  `e_c_p_email` varchar(250) DEFAULT NULL,
  `e_c_p_relationship` varchar(250) DEFAULT NULL,
  `e_c_p_address` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0=deactive;1=active;2=delete;',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1


Create Table

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1



Create Table

CREATE TABLE `subdepartment` (
  `s_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(250) DEFAULT NULL,
  `sub_department` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

CREATE TABLE `shift` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1



//inserted by kasi

CREATE TABLE `month_tab` (
 `m_id` int(11) NOT NULL AUTO_INCREMENT,
 `month_name` varchar(100) NOT NULL,
 PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1


CREATE TABLE `year_tab` (
 `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `emp_leave_apply_tab` (
 `leave_id` int(11) NOT NULL AUTO_INCREMENT,
 `leave_type` varchar(200) NOT NULL,
 `no_of_days` int(3) NOT NULL,
 `from_date` date NOT NULL,
 `to_date` date DEFAULT NULL,
 `status` varchar(200) NOT NULL DEFAULT 'pending',
 `applied_date` date NOT NULL,
 PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


CREATE TABLE `emp_leave_apply_tab` (
 `leave_id` int(11) NOT NULL AUTO_INCREMENT,
 `leave_type` varchar(200) NOT NULL,
 `no_of_days` int(3) NOT NULL,
 `from_date` date NOT NULL,
 `to_date` date DEFAULT NULL,
 `status` varchar(200) NOT NULL DEFAULT 'pending',
 `applied_date` date NOT NULL,
 PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
