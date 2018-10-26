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
		if(!$this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
			
			    $this->load->view('html/header');
				$this->load->view('employee/dashboard');
	            $this->load->view('html/sidebar');
	            $this->load->view('html/footer');
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
