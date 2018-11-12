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
		
	
			if($this->session->userdata('hrmsdetails'))
			{
				$admindetails=$this->session->userdata('hrmsdetails');
				$data['userdetails']=$this->User_model->get_roles_wise_details($admindetails['e_id']);
				//echo'<pre>';print_r($data);exit;
				$data['employee_leaves_list']=$this->Employees_model->get_all_employee_leaves_list_details(); 
				//echo'<pre>';print_r($admindetails);exit;
				$this->load->view('html/header',$data);
				$this->load->view('html/sidebar',$data);
				
			}
	}
	
	
}
