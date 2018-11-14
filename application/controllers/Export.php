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
			 if($post['type']=='Daily'){
				$usersData=$this->Export_model->get_sales_man_daily_work_report(date('Y-m-d'));
			 }else if($post['type']=='Weekly'){
				 $usersData=$this->Export_model->get_sales_man_week_work_report(date('Y-m-d'));
			 }else if($post['type']=='Monthly'){
				 $usersData=$this->Export_model->get_sales_man_month_work_report(date('m'));
			 }
			 
			 //echo '<pre>';print_r($usersData);exit;
			 
			 $work_details=array();
			 foreach($usersData as $list){
				 
				 
				  if(isset($list['work']) && count($list['work'])>0){
					 $work_details='';
					 foreach($list['work'] as $work_list){
						 $data_work[]='Date:'.$work_list['work_date'].''.$work_list['time'].'Area:'.$work_list['area_name'].'_'.$work_list['area_location'].', ';
					 }
					  $work_details=implode("",$data_work);
					}else{
						$work_details='';
					}
					$data[$list['e_id']]['date']=$list['date'];
					$data[$list['e_id']]['e_emplouee_id']=$list['e_emplouee_id'];
					$data[$list['e_id']]['work_details']=$work_details;
				 //echo '<pre>';print_r($data);exit;
			}
			//echo '<pre>';print_r($usersData);exit;
			 $filename = 'employee_work_schedule'.date('d').'.csv'; 
			   header("Content-Description: File Transfer"); 
			   header("Content-Disposition: attachment; filename=$filename"); 
			   header("Content-Type: application/csv; ");
			   // get data 
			   // file creation 
			   $file = fopen('php://output', 'w');
				$header = array("Date","Employee Id","Work"); 
			   fputcsv($file, $header);
			   foreach ($data as $key=>$line){ 
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
	



