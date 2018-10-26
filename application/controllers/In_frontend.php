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
		$this->load->model('Hrmsmanagement_model');
		$this->load->model('Employees_model');
		
	
			if($this->session->userdata('userdetails'))
			{
				$details=$this->session->userdata('userdetails');
				
				$data['userdetails']=$this->Home_model->get_all_admin_details($details['u_id']);
				
				$this->load->view('html/header');
			    $this->load->view('html/sidebar');
				
			}
	}
	
	
}
