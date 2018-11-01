<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Dashboard extends In_frontend {

	public function __construct() 
	{
		parent::__construct();	
		
	}
	public function index()
	{
		if($this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
			$data['details']=$this->Employees_model->get_adminbasic_details($admindetails['e_id']);
              //echo'<pre>';print_r($data);exit;
			    $this->load->view('html/header',$data);
				$this->load->view('employee/dashboard',$data);
	            $this->load->view('html/sidebar',$data);
	            $this->load->view('html/footer',$data);
		}
	}
	
	
	
	
	
	
	
   public function logout()
	{
		$userinfo = $this->session->userdata('hrmsdetails');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('hrmsdetails');
		$this->session->unset_userdata('hrmsdetails');
        redirect('');
	}	
	
	
}
