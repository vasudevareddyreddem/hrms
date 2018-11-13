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
	
	
		
	

	
	
}	
	
?>	
	



