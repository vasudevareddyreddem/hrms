<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Sales extends In_frontend {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Sales_model');
		
	}
	public function index()
	{


		if($this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
			$data['sales_emp_list']=$this->Sales_model->get_all_salesmans_list();
			//echo '<pre>';print_r($data);exit;			
	        $this->load->view('sales/list',$data);
	        $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	public function trackdetails(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	     $this->load->view('sales/track-details');
	     $this->load->view('html/footer');   
	  }

	}	
	

	
	
}
