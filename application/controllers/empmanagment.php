<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class empmanagment extends In_frontend
{
public function __construct() 
  {
    parent::__construct();  
    $this->load->model('emp_manage_model');
    $this->load->model('payroll_model');
    

    
    }

    public function viewattendance($eid,$month){
    	if($this->session->userdata('hrmsdetails'))
		{
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
//$attendance=array();
  $data['attendance']=$attendance;
         $this->load->view('employee/attendence-view',$data);
         $this->load->view('html/footer');

  


    }
}

// employee shift changing
public function shiftchange(){
if($this->session->userdata('hrmsdetails'))
		{
	$shift=$this->input->post('shift');
	$eid=$this->input->post('eid');
	//echo $eid; exit;
	$data=array('e_shift'=>$shift);
	$status=$this->emp_manage_model->update_emp_shift($eid,$data);
	if($status==true){

            $this->session->set_flashdata('success',"shift  details changed");
           redirect('employee/shiftmangement');

	}

	else{
		 $this->session->set_flashdata('success',"you didn't change anything in shift details");
           redirect('employee/shiftmangement');



	}







}
}

}