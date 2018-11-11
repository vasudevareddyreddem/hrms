-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 05:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newhrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `a_id` int(11) NOT NULL,
  `area` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`a_id`, `area`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(5, 'kadapa', 1, '2018-11-09 07:04:04', '2018-11-09 07:04:04', 3),
(3, 'kurnool', 1, '2018-11-09 07:02:57', '2018-11-09 07:02:57', 3),
(8, 'hyd', 1, '2018-11-09 10:45:28', '2018-11-09 10:45:28', 7);

-- --------------------------------------------------------

--
-- Table structure for table `assign_work`
--

CREATE TABLE `assign_work` (
  `w_d_id` int(11) NOT NULL,
  `work_emplouee_id` varchar(250) DEFAULT NULL,
  `allocated_area` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) DEFAULT NULL,
  `work` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_work`
--

INSERT INTO `assign_work` (`w_d_id`, `work_emplouee_id`, `allocated_area`, `mobile_number`, `work`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(4, '1', '3', '7013319036', 'c', 1, '2018-11-09 11:25:46', '2018-11-09 11:25:46', 3),
(3, '3', '5', '7013319036', 'kasiuama', 1, '2018-11-09 11:34:42', '2018-11-09 11:34:42', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chat_tab`
--

CREATE TABLE `chat_tab` (
  `message_id` int(11) NOT NULL,
  `sender_id` varchar(200) DEFAULT NULL,
  `recevier_id` varchar(200) DEFAULT NULL,
  `sent_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(200) DEFAULT NULL,
  `message` text,
  `read_status` varchar(200) DEFAULT 'unread',
  `notified_msg` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_tab`
--

INSERT INTO `chat_tab` (`message_id`, `sender_id`, `recevier_id`, `sent_time`, `status`, `message`, `read_status`, `notified_msg`) VALUES
(33, '3', '1', '2018-11-07 20:20:26', NULL, 'mj', 'read', 1),
(32, '3', '8', '2018-11-07 16:46:18', NULL, 'hi this is kasi umamahes\n', 'read', 1),
(31, '7', '4', '2018-11-07 16:24:44', NULL, 'haiiiiiiiiiiiii', 'unread', 1),
(30, '3', '1', '2018-11-07 16:17:30', NULL, 'jjjj', 'read', 1),
(34, '3', '4', '2018-11-08 00:32:25', NULL, 'hai shiva how ru\n', 'read', 1),
(35, '3', '4', '2018-11-08 00:35:25', NULL, 'message are coming or not', 'read', 1),
(36, '4', '3', '2018-11-08 00:36:14', NULL, 'haii every one\n', 'read', 1),
(37, '3', '4', '2018-11-08 00:58:47', NULL, 'hi how r u \n', 'read', 1),
(38, '3', '7', '2018-11-08 01:05:12', NULL, 'hai kalyan\n', 'read', 1),
(39, '7', '3', '2018-11-08 01:09:47', NULL, 'hi this \n', 'read', 1),
(40, '3', '7', '2018-11-08 01:10:07', NULL, 'hi ok\n\n', 'read', 1),
(41, '3', '7', '2018-11-08 01:16:32', NULL, 'gkajkfjdgjafdjkg ', 'read', 1),
(42, '3', '7', '2018-11-08 01:21:12', NULL, 'fdgfd', 'read', 1),
(43, '3', '7', '2018-11-08 01:21:28', NULL, 'yrrr', 'read', 1),
(44, '3', '7', '2018-11-08 01:22:50', NULL, 'hrllo', 'read', 1),
(45, '3', '7', '2018-11-08 01:25:37', NULL, 'hi', 'read', 1),
(46, '3', '7', '2018-11-08 01:25:37', NULL, 'hi', 'read', 1),
(47, '7', '3', '2018-11-08 01:26:21', NULL, 'hiiiiiiiiiiiiiiiiiiiiiiiiii', 'read', 1),
(48, '3', '7', '2018-11-08 01:26:41', NULL, 'hiiiiiiiiiiiiiiiiiiiiiii', 'read', 1),
(49, '7', '3', '2018-11-08 01:29:02', NULL, 'hello guru', 'read', 1),
(50, '7', '3', '2018-11-08 01:29:03', NULL, 'hello guru', 'read', 1),
(51, '7', '3', '2018-11-08 01:31:02', NULL, 'hello suresh how ru\n', 'read', 1),
(52, '3', '4', '2018-11-08 01:32:53', NULL, 'eieieid\n', 'unread', 0),
(53, '3', '1', '2018-11-08 19:59:54', NULL, 'hi', 'read', 1),
(54, '1', '3', '2018-11-08 20:00:25', NULL, 'hi how r u\n', 'read', 1),
(55, '1', '3', '2018-11-08 20:00:42', NULL, 'fdfsdfg', 'read', 1),
(56, '5', '1', '2018-11-08 20:31:34', NULL, 'hhhhhhhhhhhhh', 'read', 1),
(57, '7', '3', '2018-11-08 21:08:56', NULL, 'hello world iam siva\n', 'read', 1),
(58, '7', '1', '2018-11-08 21:09:33', NULL, 'hello world \n', 'read', 1),
(59, '7', '1', '2018-11-08 21:09:50', NULL, 'haii wru', 'read', 1),
(60, '7', '1', '2018-11-08 21:10:05', NULL, 'ghjfgjkghjkhjkghjhkjhkljh', 'read', 1),
(61, '7', '1', '2018-11-08 21:11:42', NULL, 'ghj', 'read', 1),
(62, '7', '2', '2018-11-08 21:13:49', NULL, 'g87y9', 'unread', 0),
(63, '7', '2', '2018-11-08 21:14:06', NULL, 'hghjhgj', 'unread', 0),
(64, '7', '2', '2018-11-08 21:14:17', NULL, 'dsfdsg', 'unread', 0),
(65, '1', '2', '2018-11-08 21:27:39', NULL, 'rtfdgfdh', 'unread', 0),
(66, '1', '2', '2018-11-08 21:57:45', NULL, 'ffgfg', 'unread', 0),
(67, '1', '2', '2018-11-08 21:57:45', NULL, 'ffgfg', 'unread', 0),
(68, '1', '2', '2018-11-08 21:58:16', NULL, 'fdjshffhdifidsfhds', 'unread', 0),
(69, '1', '2', '2018-11-08 21:58:16', NULL, 'fdjshffhdifidsfhds\n', 'unread', 0),
(70, '1', '2', '2018-11-08 21:58:20', NULL, 'fhfhfhf', 'unread', 0),
(71, '7', '2', '2018-11-08 22:34:10', NULL, 'thgtfj', 'unread', 0),
(72, '7', '2', '2018-11-08 22:34:16', NULL, '\nggg', 'unread', 0),
(73, '7', '2', '2018-11-08 22:34:23', NULL, 'fvbhfvg', 'unread', 0),
(74, '7', '3', '2018-11-08 22:36:31', NULL, 'haaiii suresh\n\n\n', 'read', 1),
(75, '3', '7', '2018-11-08 22:39:03', NULL, 'ffg', 'read', 1),
(76, '3', '7', '2018-11-08 22:39:04', NULL, 'ffg\n', 'read', 1),
(77, '3', '7', '2018-11-08 22:39:22', NULL, 'hi how ru', 'read', 1),
(78, '7', '3', '2018-11-08 22:40:01', NULL, 'sagar', 'read', 1),
(79, '7', '3', '2018-11-08 22:40:12', NULL, 'sureash', 'read', 1),
(80, '7', '3', '2018-11-08 22:40:30', NULL, 're', 'read', 1),
(81, '3', '5', '2018-11-08 22:40:30', NULL, 'gfdgd', 'unread', 0),
(82, '3', '7', '2018-11-08 22:44:00', NULL, 'gggggggggg', 'read', 1),
(83, '3', '7', '2018-11-09 19:19:31', NULL, 'gig', 'unread', 0),
(84, '1', '3', '2018-11-09 19:31:14', NULL, 'hi', 'read', 1),
(85, '1', '3', '2018-11-09 20:00:28', NULL, 'fdsfdsf', 'read', 1),
(86, '1', '3', '2018-11-09 20:01:13', NULL, 'hkjhkuhku', 'read', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `department` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `department`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(21, 'sales', 1, '2018-11-02 09:26:32', '2018-11-02 09:26:32', 0),
(22, 'ggg', 1, '2018-11-02 09:26:39', '2018-11-06 14:30:59', 0),
(23, 'kkkk', 1, '2018-11-06 14:07:05', '2018-11-06 14:07:05', 8);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `e_s_id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL COMMENT 'employee id',
  `e_net_salary` varchar(250) DEFAULT NULL,
  `e_gross_salary` varchar(250) DEFAULT NULL,
  `e_basic` varchar(250) DEFAULT NULL,
  `e_da` varchar(250) DEFAULT NULL,
  `e_hra` varchar(250) DEFAULT NULL,
  `e_conveyance` varchar(250) DEFAULT NULL,
  `e_allowance` varchar(250) DEFAULT NULL,
  `e_medical_allowance` varchar(250) DEFAULT NULL,
  `e_others` varchar(250) DEFAULT NULL,
  `e_d_tds` varchar(250) DEFAULT NULL,
  `e_d_esi` varchar(250) DEFAULT NULL,
  `e_d_pf` varchar(250) DEFAULT NULL,
  `e_d_leave` varchar(250) DEFAULT NULL,
  `e_d_Prof_tax` varchar(250) DEFAULT NULL,
  `e_d_labour_welfare` varchar(250) DEFAULT NULL,
  `e_d_fund` varchar(250) DEFAULT NULL,
  `e_d_others` varchar(250) DEFAULT NULL,
  `s_status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_payslips`
--

CREATE TABLE `employee_salary_payslips` (
  `e_s_p_id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL COMMENT 'employee id',
  `e_net_salary` varchar(250) DEFAULT NULL,
  `e_salary_deduction` varchar(250) DEFAULT NULL,
  `e_basic` varchar(250) DEFAULT NULL,
  `e_da` varchar(250) DEFAULT NULL,
  `e_hra` varchar(250) DEFAULT NULL,
  `e_conveyance` varchar(250) DEFAULT NULL,
  `e_allowance` varchar(250) DEFAULT NULL,
  `e_medical_allowance` varchar(250) DEFAULT NULL,
  `e_others` varchar(250) DEFAULT NULL,
  `e_d_tds` varchar(250) DEFAULT NULL,
  `e_d_esi` varchar(250) DEFAULT NULL,
  `e_d_pf` varchar(250) DEFAULT NULL,
  `e_d_leave` varchar(250) DEFAULT NULL,
  `e_d_Prof_tax` varchar(250) DEFAULT NULL,
  `e_d_labour_welfare` varchar(250) DEFAULT NULL,
  `e_d_fund` varchar(250) DEFAULT NULL,
  `e_d_others` varchar(250) DEFAULT NULL,
  `e_salary_month` int(3) DEFAULT NULL COMMENT 'month',
  `s_status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `e_gross_salary` int(11) DEFAULT NULL,
  `e_salary_year` int(5) DEFAULT NULL,
  `e_leaves_deduction` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary_payslips`
--

INSERT INTO `employee_salary_payslips` (`e_s_p_id`, `e_id`, `e_net_salary`, `e_salary_deduction`, `e_basic`, `e_da`, `e_hra`, `e_conveyance`, `e_allowance`, `e_medical_allowance`, `e_others`, `e_d_tds`, `e_d_esi`, `e_d_pf`, `e_d_leave`, `e_d_Prof_tax`, `e_d_labour_welfare`, `e_d_fund`, `e_d_others`, `e_salary_month`, `s_status`, `created_at`, `updated_at`, `created_by`, `e_gross_salary`, `e_salary_year`, `e_leaves_deduction`) VALUES
(1, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(2, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(3, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(4, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(5, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(6, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(7, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(8, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(9, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, NULL, NULL),
(10, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, 2018, 28640),
(11, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 0, 1, NULL, NULL, NULL, 46816, 2018, 28640),
(12, 1, '42974', '3842', '10000', '20074', '1200', '1000', '10000', '500', '200', '1000', '1000', '1000', NULL, '100', '20', '522', '200', 11, 1, NULL, NULL, NULL, 46816, 2018, 28640);

-- --------------------------------------------------------

--
-- Table structure for table `empployee`
--

CREATE TABLE `empployee` (
  `e_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
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
  `e_department` varchar(250) DEFAULT NULL,
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
  `login_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empployee`
--

INSERT INTO `empployee` (`e_id`, `role_id`, `e_emplouee_id`, `e_join_date`, `e_f_name`, `e_l_name`, `e_login_name`, `e_email_personal`, `e_email_work`, `e_password`, `e_org_password`, `e_mobile_personal`, `e_mobile_work`, `e_designation`, `e_supervisor`, `e_department`, `e_sub_department`, `e_shift`, `e_c_adress`, `e_c_city`, `e_c_district`, `e_c_state`, `e_c_country`, `e_p_address`, `e_p_city`, `e_p_district`, `e_p_state`, `e_p_country`, `e_profile_pic`, `e_document`, `e_bank_name`, `e_account_number`, `e_bank_h_name`, `e_bank_ifcs_code`, `e_c_p_name`, `e_c_p_mobile`, `e_c_p_email`, `e_c_p_relationship`, `e_c_p_address`, `status`, `created_at`, `updated_at`, `created_by`, `login_status`) VALUES
(1, 1, 'sdfd', '10-10-2018', 'admin', 'vc', 'siva', 'vnvb@gmail.com', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '1122332222', 'vb', '1', 'A', '22', '8', '9', 'gthgf', 'ghg', 'bv', 'Kerala', '', 'hjh', 'vbc', 'nbm', 'Assam', '', '1529651798.jpg', '', 'mnm', '1222222222', 'TYUJHYH', 'SBIN0000830', 'dryhd', '4325353533', 'xvf@gmail.com', 'gfh', 'gf', 1, '2018-11-06 08:15:19', '2018-11-06 08:15:19', 0, 0),
(2, 3, 'Super11', '10-10-2018', 'Super11', 'Super11', 'super', 'Super11@gmail.com', 'Super11@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '8500050944', '8500050944', '8', 'A', '21', '8', '9', 'kadapa', 'mydukur', 'kadapa', 'Kerala', '', 'kadapa', 'mydukur', 'kadapa', 'Maharashtra', '', '1529651798.jpg', '', 'Sbi', '32473655713', 'vasu', 'SBIN0002671', 'vasu', '8500050944', 'vasu@gmail.com', 'me', 'kadapa', 1, '2018-11-02 13:55:37', '2018-11-02 13:55:37', 0, 0),
(3, 2, 'mjnbm', '10-12-2018', 'suresh', 'vc', 'hr', 'vasu@gmail.com', 'vasu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '7013319026', 'vb', '2', 'B', '21', '7', '9', 'dgf', 'hgg', 'ghjg', 'Andhra Pradesh', '', 'gh', 'vbc', 'nbm', 'Bihar', '', '1523883473.jpg', '', 'mnm', '1222222222', 'mn', 'SBIN0000830', 'ghng', '4325353533', 'xvf@gmail.com', 'gfh', 'ghgf', 1, '2018-11-02 13:52:41', '2018-11-02 13:52:41', 0, 0),
(4, 2, 'hrms-10', '10-12-2018', 'vasu', 'vc', 'hr', 'vnvb@gmail.com', 'kasi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '4254325325', 'hg', '3', 'A', '22', '8', '9', 'fghf', 'fgf', 'dfg', 'Andhra Pradesh', '', 'fhfg', 'fhg', 'GHJG', 'Telangana', '', '1527764168.png', '', 'mnm', '1222222222', 'HGJ', 'SBIN0000830', 'ghng', '4325353533', 'xvf@gmail.com', 'gfh', 'fghf', 1, '2018-11-02 14:45:55', '2018-11-02 14:45:55', 0, 0),
(5, 8, 'mjnbm', '10-12-2018', 'kalyan', 'vc', 'kaka', 'vnvb@gmail.com', 'bayapu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '4254325325', 'hg', '3', 'A', '21', '9', '10', 'ghj', 'fgh', 'GHJG', 'Andhra Pradesh', '', 'ghj', 'fgh', 'GHJG', 'Andhra Pradesh', '', '1523883473.jpg', '1519212661.docx', 'ghg', '1234555222', 'gjh', 'SBIN0000830', 'dryhd', '4325353533', 'xvf@gmail.com', 'gfh', 'ghjgjh', 1, '2018-11-05 14:43:13', '2018-11-05 14:43:13', 0, 0),
(6, 3, 'mjnbm', '10-12-2018', 'kamal', 'vc', 'kal', 'vnvb@gmail.com', 'kal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '4254325325', 'hg', '3', 'A', '21', '9', '9', 'rfgf', 'dfg', 'fgf', 'Arunachal Pradesh', '', 'fghf', 'fgf', 'fg', 'Manipur', '', '', '', 'fghf', '1222222222', 'fhg', 'SBIN0000830', 'ghng', '4325353533', 'xvf@gmail.com', 'gfh', 'fgbf', 1, '2018-11-06 08:20:10', '2018-11-06 08:20:10', 0, 0),
(7, 2, 'mjnbm', '10-12-2018', 'ramu', 'vc', 'hr', 'vnvb@gmail.com', 'vana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '1122332222', 'vb', '2', 'A', '21', '9', '9', 'fgf', 'fgh', 'fgh', 'Arunachal Pradesh', '', 'fgh', 'gh', 'gh', 'Andhra Pradesh', '', '1523883473.jpg', '1527924854.docx', 'mnm', '1222222222', 'mn', 'SBIN0000830', 'ghng', '4325353533', 'xvf@gmail.com', 'gfh', 'fghf', 1, '2018-11-06 08:22:02', '2018-11-06 08:22:02', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leaves_tab`
--

CREATE TABLE `emp_leaves_tab` (
  `e_l_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `l_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_apply_tab`
--

CREATE TABLE `emp_leave_apply_tab` (
  `leave_id` int(11) NOT NULL,
  `leave_type` varchar(200) NOT NULL,
  `no_of_days` int(3) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `applied_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `h_id` int(11) NOT NULL,
  `holiday_name` varchar(250) DEFAULT NULL,
  `holiday_date` varchar(250) DEFAULT NULL,
  `holiday_day` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`h_id`, `holiday_name`, `holiday_date`, `holiday_day`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(3, 'crismas', '10-12-2018', 'sunday', 1, '2018-11-02 12:52:08', '2018-11-02 12:52:08', 0),
(4, 'hbjm', '2018-11-02', 'wed', 1, '2018-11-02 09:39:46', '2018-11-02 09:39:46', 0),
(5, 'hbjm', '2018-11-06', 'sunday', 1, '2018-11-02 12:43:02', '2018-11-02 12:43:02', 0),
(6, 'hbjm', '2018-11-02', 'wed', 1, '2018-11-02 12:51:47', '2018-11-02 12:51:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `l_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `leave_type` varchar(250) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `number_of_days` varchar(250) DEFAULT NULL,
  `remaining_leaves` varchar(250) DEFAULT NULL,
  `leaves_reason` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0=pending;1=accept;2=reject',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`l_id`, `emp_id`, `leave_type`, `from_date`, `to_date`, `number_of_days`, `remaining_leaves`, `leaves_reason`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(17, 6, 'Casual Leave', '2018-11-21', '2018-11-12', '1', NULL, 'try', 0, '2018-11-10 08:21:28', '2018-11-10 08:21:28', 6);

-- --------------------------------------------------------

--
-- Table structure for table `leaves_policy`
--

CREATE TABLE `leaves_policy` (
  `l_p_id` int(11) NOT NULL,
  `casual_leaves` varchar(250) DEFAULT NULL,
  `pay_leaves` varchar(250) DEFAULT NULL,
  `medical_leaves` varchar(250) DEFAULT NULL,
  `monthly_limit` varchar(250) DEFAULT NULL,
  `total_leaves` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves_policy`
--

INSERT INTO `leaves_policy` (`l_p_id`, `casual_leaves`, `pay_leaves`, `medical_leaves`, `monthly_limit`, `total_leaves`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(15, '40', '20', '20', '20', '100', 1, '2018-11-10 12:24:11', '2018-11-10 12:24:11', 7),
(16, '45', '12', '10', '10', '77', 1, '2018-11-10 12:24:44', '2018-11-10 12:24:44', 7);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `l_id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL COMMENT 'employee id',
  `e_login_time` datetime DEFAULT NULL,
  `e_logout_time` datetime DEFAULT '0000-00-00 00:00:00',
  `l_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`l_id`, `e_id`, `e_login_time`, `e_logout_time`, `l_date`, `created_by`) VALUES
(3, 1, '2018-11-01 14:28:24', '2018-11-01 14:35:26', '2018-11-01', NULL),
(4, 1, '0000-00-00 00:00:00', '2018-11-02 14:23:22', '2018-11-02', NULL),
(5, 3, '0000-00-00 00:00:00', '2018-11-02 13:56:23', '2018-11-02', NULL),
(6, 2, '0000-00-00 00:00:00', '2018-11-02 13:40:50', '2018-11-02', NULL),
(7, 3, '0000-00-00 00:00:00', '2018-11-05 15:06:57', '2018-11-05', NULL),
(8, 4, '0000-00-00 00:00:00', '2018-11-05 06:02:28', '2018-11-05', NULL),
(9, 1, '0000-00-00 00:00:00', '2018-11-05 11:27:08', '2018-11-05', NULL),
(10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-11-06', NULL),
(11, 3, '0000-00-00 00:00:00', '2018-11-06 15:01:56', '2018-11-06', NULL),
(12, 7, '0000-00-00 00:00:00', '2018-11-06 13:07:37', '2018-11-06', NULL),
(13, 8, '0000-00-00 00:00:00', '2018-11-06 11:04:55', '2018-11-06', NULL),
(14, 5, '0000-00-00 00:00:00', '2018-11-06 12:30:22', '2018-11-06', NULL),
(15, 3, '0000-00-00 00:00:00', '2018-11-08 14:36:27', '2018-11-08', NULL),
(16, 5, '0000-00-00 00:00:00', '2018-11-08 05:48:00', '2018-11-08', NULL),
(17, 1, '0000-00-00 00:00:00', '2018-11-08 14:33:01', '2018-11-08', NULL),
(18, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-11-08', NULL),
(19, 7, '0000-00-00 00:00:00', '2018-11-08 15:04:53', '2018-11-08', NULL),
(20, 4, '0000-00-00 00:00:00', '2018-11-08 14:34:07', '2018-11-08', NULL),
(21, 3, '0000-00-00 00:00:00', '2018-11-09 13:11:49', '2018-11-09', NULL),
(22, 1, '0000-00-00 00:00:00', '2018-11-09 11:28:36', '2018-11-09', NULL),
(23, 5, '0000-00-00 00:00:00', '2018-11-09 10:01:03', '2018-11-09', NULL),
(24, 2, '0000-00-00 00:00:00', '2018-11-09 10:34:26', '2018-11-09', NULL),
(25, 6, '0000-00-00 00:00:00', '2018-11-09 13:44:15', '2018-11-09', NULL),
(26, 7, '0000-00-00 00:00:00', '2018-11-09 12:20:08', '2018-11-09', NULL),
(27, 3, '0000-00-00 00:00:00', '2018-11-10 12:22:47', '2018-11-10', NULL),
(28, 7, '0000-00-00 00:00:00', '2018-11-10 07:41:48', '2018-11-10', NULL),
(29, 6, '0000-00-00 00:00:00', '2018-11-10 08:46:54', '2018-11-10', NULL),
(30, 1, '0000-00-00 00:00:00', '2018-11-10 09:31:38', '2018-11-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `month_tab`
--

CREATE TABLE `month_tab` (
  `m_id` int(11) NOT NULL,
  `month_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_tab`
--

INSERT INTO `month_tab` (`m_id`, `month_name`) VALUES
(1, 'january'),
(2, 'february'),
(3, 'march'),
(4, 'april'),
(5, 'may'),
(6, 'june'),
(7, 'july'),
(8, 'august'),
(9, 'september'),
(10, 'october'),
(11, 'november'),
(12, 'december');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(11) NOT NULL,
  `role` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `role`, `status`, `created_at`) VALUES
(1, 'Admin', 1, '2018-10-29 10:58:13'),
(2, 'Hr', 1, '2018-10-29 10:58:30'),
(3, 'sales', 1, '2018-10-29 10:59:03'),
(8, 'super', 1, '2018-11-06 14:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `s_id` int(11) NOT NULL,
  `shift` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`s_id`, `shift`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(9, 'A', 1, '2018-11-02 09:25:32', '2018-11-02 09:25:32', 0),
(10, 'B', 1, '2018-11-02 09:25:37', '2018-11-02 09:25:37', 0),
(11, 'C', 1, '2018-11-06 13:47:28', '2018-11-06 13:47:28', 8);

-- --------------------------------------------------------

--
-- Table structure for table `subdepartment`
--

CREATE TABLE `subdepartment` (
  `s_d_id` int(11) NOT NULL,
  `department` varchar(250) DEFAULT NULL,
  `sub_department` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subdepartment`
--

INSERT INTO `subdepartment` (`s_d_id`, `department`, `sub_department`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(8, '22', 'gh', 1, '2018-11-02 14:41:50', '2018-11-02 14:41:50', 0),
(9, '21', 'ff', 1, '2018-11-02 14:41:40', '2018-11-02 14:41:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `year_tab`
--

CREATE TABLE `year_tab` (
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_tab`
--

INSERT INTO `year_tab` (`year`) VALUES
(2017),
(2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assign_work`
--
ALTER TABLE `assign_work`
  ADD PRIMARY KEY (`w_d_id`);

--
-- Indexes for table `chat_tab`
--
ALTER TABLE `chat_tab`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`e_s_id`);

--
-- Indexes for table `employee_salary_payslips`
--
ALTER TABLE `employee_salary_payslips`
  ADD PRIMARY KEY (`e_s_p_id`);

--
-- Indexes for table `empployee`
--
ALTER TABLE `empployee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `emp_leaves_tab`
--
ALTER TABLE `emp_leaves_tab`
  ADD UNIQUE KEY `r` (`e_l_id`);

--
-- Indexes for table `emp_leave_apply_tab`
--
ALTER TABLE `emp_leave_apply_tab`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `leaves_policy`
--
ALTER TABLE `leaves_policy`
  ADD PRIMARY KEY (`l_p_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `month_tab`
--
ALTER TABLE `month_tab`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subdepartment`
--
ALTER TABLE `subdepartment`
  ADD PRIMARY KEY (`s_d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_work`
--
ALTER TABLE `assign_work`
  MODIFY `w_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_tab`
--
ALTER TABLE `chat_tab`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `e_s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_payslips`
--
ALTER TABLE `employee_salary_payslips`
  MODIFY `e_s_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `empployee`
--
ALTER TABLE `empployee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_leaves_tab`
--
ALTER TABLE `emp_leaves_tab`
  MODIFY `e_l_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_leave_apply_tab`
--
ALTER TABLE `emp_leave_apply_tab`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `leaves_policy`
--
ALTER TABLE `leaves_policy`
  MODIFY `l_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subdepartment`
--
ALTER TABLE `subdepartment`
  MODIFY `s_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
