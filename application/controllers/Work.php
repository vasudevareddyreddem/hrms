<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Work extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Work_model');
		
		
	}
	
	public function lists(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	  
			$admindetails=$this->session->userdata('hrmsdetails');	
			$data['work_list']=$this->Work_model->get_employee_daily_work($admindetails['e_id']);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('work/work_list',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	public function index(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	  
			$data['leave_list']=$this->Leaves_model->get_all_employees_current_month_leaves_list(date('m'));
			//echo '<pre>';print_r($data);exit;
			$this->load->view('leaves/all_list',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	
	
	

  }
	
	
?>	
	



