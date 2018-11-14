<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Export extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Export_model');
		
		
	}
	
	public function index(){
	   
	  
	}
	public function allemployee(){
	    if($this->session->userdata('hrmsdetails'))
		{
			  $filename = 'employee_list'.date('Ymd').'.csv'; 
			   header("Content-Description: File Transfer"); 
			   header("Content-Disposition: attachment; filename=$filename"); 
			   header("Content-Type: application/csv; ");
			   // get data 
				$usersData=$this->Export_model->get_all_employee_details_with_role_wise();
			   // file creation 
			   $file = fopen('php://output', 'w');
				$header = array("Role","Employee Id","Employee Name","Join Date","Personal Email","Work Email","Personal Mobile","Work Mobile"); 
			   fputcsv($file, $header);
			   foreach ($usersData as $key=>$line){ 
				 fputcsv($file,$line); 
			   }
			   fclose($file); 
			   exit; 
  		
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	public function employeeschedule(){
	    if($this->session->userdata('hrmsdetails'))
		{
			  
			  //echo '<pre>';print_r( $usersData);exit;
			  $filename = 'employee_work_status'.date('d').'.csv'; 
			   header("Content-Description: File Transfer"); 
			   header("Content-Disposition: attachment; filename=$filename"); 
			   header("Content-Type: application/csv; ");
			   // get data 
				$usersData=$this->Export_model->get_all_employeeschedule_details();
			   // file creation 
			   $file = fopen('php://output', 'w');
				$header = array("Role","Date","Employee Id","Employee Name","Mobile Number","Area","Work","Work Status"); 
			   fputcsv($file, $header);
			   foreach ($usersData as $key=>$line){ 
				 fputcsv($file,$line); 
			   }
			   fclose($file); 
			   exit; 
  		
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	public function salesreport(){
	    if($this->session->userdata('hrmsdetails'))
		{
			 $post=$this->input->post();
			 $usersData=$this->Export_model->get_sales_man_daily_work_report();
			 echo '<pre>';print_r($usersData);exit;
  		
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	
	
		
	

	
	
}	
	
?>	
	



