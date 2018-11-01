<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Dashboard extends In_frontend {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		
	}
	public function index()
	{


		if($this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
			$data['details']=$this->Employees_model->get_adminbasic_details($admindetails['e_id']);
              //echo'<pre>';print_r($data);exit;
				$this->load->view('employee/dashboard',$data);
	            $this->load->view('html/footer',$data);
		}else{
			redirect('user');
		}
	}
	
	
	
	
	public function logout(){
		if($this->session->userdata('hrmsdetails'))
		{
			$hrmsdetails=$this->session->userdata('hrmsdetails');
			$checklogin= $this->User_model->check_today_login($hrmsdetails['e_id'],date('Y-m-d'));
			$this->User_model->update_logout_time_status($checklogin['l_id'],$checklogin['e_id'],date('Y-m-d H:i:s'));
			$this->session->unset_userdata($hrmsdetails);
			$this->session->unset_userdata('hrmsdetails');
			$this->session->sess_destroy('hrmsdetails');
			$this->session->unset_userdata('hrmsdetails');
			redirect('');
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('');
		} 
	}
	
	


	
	
}
