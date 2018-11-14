<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Export extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Export_model');
		$this->load->model('emp_manage_model');
		$this->load->model('payroll_model');
		
		
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
	
	public  function attendance(){
		if($this->session->userdata('hrmsdetails'))
		{
			$eid=$this->uri->segment(3);
			$month=$this->uri->segment(4);
			  
			  $year=date("Y");

    	$mdays=cal_days_in_month(CAL_GREGORIAN,$month,$year);//no of days
    	 $dateObj   = DateTime::createFromFormat('!m', $month);
      $data['month'] = $dateObj->format('F');// month in words
      $result=$this->emp_manage_model->emp_name_id($eid);
      // '<pre>';print_r($result);exit;
      $date = "$year-$month-01";
    $first_day = date('N',strtotime($date));
    $first_day = 7 - $first_day + 1;
    $last_day =  date('t',strtotime($date));
    $days = array();
    for($i=$first_day; $i<=$last_day; $i=$i+7 ){
        $days[] = $i;
    }
$cnt_sun=count($days);// number of sundays
$pay_lv=$this->payroll_model->pay_leaves($year,$month,$eid);
$gen_lv=$this->payroll_model->general_leaves($year,$month,$eid);
$hdays=$this->payroll_model->get_holidays($year,$month);
$tot_leaves=count($pay_lv)+count($gen_lv);
$data['leaves']=$tot_leaves;// total number of leaves
$wor_days=$mdays-count($hdays)-$cnt_sun;
$data['wdays']=$wor_days;// total number of working days in month


      $data['emp']=$result;
      $data['mdays']=$mdays;
      $login_data=$this->emp_manage_model->get_days($eid,$month,$year);
     // echo '<pre>';print_r($login_data);exit;
      $attendance=array('0');
      $cnt_logindays=count($login_data);
      $data['logindays']=$cnt_logindays;
      if(count($login_data)>0){
      $array_days=array_map (function($value){
                return $value['lday'];
            } , $login_data);

      for($i=1;$i<=$mdays;$i++){
	if( in_array($i,$array_days)){

      array_push($attendance,'yes');

	} else{
		array_push($attendance,'no');

	}


}
$data['attendance']=$attendance;
//echo '<pre>';print_r($attendance);exit;

  }
  else{

  	$array_days=array();
  	for($i=1;$i<=$mdays;$i++){
	if( in_array($i,$attendance)){

      array_push($attendance,'yes');

	} else{
		array_push($attendance,'no');

	}


}
 //echo '<pre>';print_r($attendance);exit;
  }
  //echo '<pre>';print_r($attendance);exit;
//$attendance=array();
  $data['attendance']=$attendance;

echo '<pre>';print_r($attendance);exit;
  
			  
			  
			  
		 }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	
	
		
	

	
	
}	
	
?>	
	



