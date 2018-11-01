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
	
	
	
	
	
	
		
	
	
}
