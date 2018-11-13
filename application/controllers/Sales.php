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
		 //echo'<pre>';print_r($data);exit;
		 $data['prevoius_date']=$this->Sales_model->get_employee_previous_date_location_details($emp_id,date('Y-m-d', strtotime(' -1 day')));
		 $data['current_date']=$this->Sales_model->get_employee_current_date_location_details($emp_id,date('Y-m-d'));
	     $this->load->view('sales/track-details',$data);
	     $this->load->view('html/footer');   
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }

  }
		
	public function date_wise_area(){
if($this->session->userdata('hrmsdetails'))
		{
         $admindetails=$this->session->userdata('hrmsdetails');	
					$post=$this->input->post();
					$area_location_list=$this->Sales_model->area_location_wise_list($post['work_date']);
					//echo'<pre>';print_r($area_location_list);exit;
					if(count($area_location_list)>0){
						$data['msg']=1;
						$data['list']=$area_location_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
				
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('');
		}
	}
		

	
	
}	
	
?>	
	



