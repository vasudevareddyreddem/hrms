<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Leaves extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Leaves_model');
		
		
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
	public function all(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
			$data['All Employees Leave List
']='All Employees Leave List';
			$data['leave_list']=$this->Leaves_model->get_all_employees_leaves_list();
			//echo '<pre>';print_r($data);exit;
			$this->load->view('leaves/all_list',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	public function inmonth(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	  
			$data['leave_list']=$this->Leaves_model->get_all_employees_current_month_leaves_list(date('m'));
			$data['title']='Current Month Employees Leave List';
			//echo $this->db->last_query();exit;
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
	



