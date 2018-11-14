<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In_frontend extends CI_Controller {

	
	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->model('User_model');
		$this->load->model('Employees_model');
		$this->load->model('Notification_model');
		$this->load->model('Dashboard_model');
	
			if($this->session->userdata('hrmsdetails'))
			{
				$admindetails=$this->session->userdata('hrmsdetails');
				$data['userdetails']=$this->User_model->get_roles_wise_details($admindetails['e_id']);
				 
				if($admindetails['role_id']==2){
					$data['notification_count']=$this->User_model->get_leave_notification_count(''); 
					$data['unread_count']=$this->User_model->get_notitifation_unread_count('');
					$data['leaves_notification']=$this->User_model->get_all_employee_leaves_list_details('');
				}else{
					$data['notification_count']=$this->User_model->get_leave_notification_count($admindetails['e_id']); 
					$data['unread_count']=$this->User_model->get_notitifation_unread_count($admindetails['e_id']); 
					$data['leaves_notification']=$this->User_model->get_all_employee_leaves_list_details($admindetails['e_id']);
				}
				//echo '<pre>';print_r($data);exit;
				$this->load->view('html/header',$data);
				$this->load->view('html/sidebar',$data);
				
			}
	}
	
	
}
