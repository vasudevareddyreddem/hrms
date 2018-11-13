<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Sales extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Sales_model');
		
		
	}
	
	public function index(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
		$data['sales_list']=$this->Sales_model->get_sales_details_list();
			//echo'<pre>';print_r($data);exit;
	  
			$this->load->view('sales/salestrack',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	
	public function trackdetails(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 
		 $emp_id=base64_decode($this->uri->segment(3));
		 $data['sale_man_details']=$this->Sales_model->get_sales_man_details($emp_id);
		 
		 $data['prevoius_date']=$this->Sales_model->get_employee_previous_date_location_details($emp_id,date('Y-m-d', strtotime(' -1 day')));
		 $data['current_date']=$this->Sales_model->get_employee_current_date_location_details($emp_id,date('Y-m-d'));
		  $data['prevoius']=$this->Sales_model->get_employee_previous_date($emp_id,date('Y-m-d', strtotime(' -1 day')));
		 $data['current']=$this->Sales_model->get_employee_current_date($emp_id,date('Y-m-d'));
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('sales/track-details',$data);
	     $this->load->view('html/footer');   
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }

  }
		
    public function form(){
	 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	    $post=$this->input->post();
		 
	      $save_data=array(
		  'date'=>isset($post['date'])?$post['date']:''
	       );
	        //echo'<pre>';print_r($save_data);exit;
			
			
		    redirect('sales/trackdetails');
			
			
	     }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
     }

	
	
}	
	
?>	
	



