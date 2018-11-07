<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//@include_once( APPPATH . 'controllers/In_frontend.php');
class Chat extends CI_Controller
{
public function __construct() 
  {
 parent::__construct(); 
 $this->load->model('Chat_model');
 $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('email');
    $this->load->library('user_agent');
    $this->load->helper('directory');
    $this->load->helper('security');
    $this->load->model('User_model');
    $this->load->model('Employees_model');
    
  
      if($this->session->userdata('hrmsdetails'))
      {
        $admindetails=$this->session->userdata('hrmsdetails');
        $data['details']=$this->Employees_model->get_adminbasic_details($admindetails['e_id']);
        // $this->load->view('html/header',$data);
        // $this->load->view('html/sidebar',$data);
        
      }

  }

  public function sendmessage(){
  	$message=$this->input->post('message');
  	//$rec_id=$this->input->post('rid');
  	//echo json_encode($rec_id);exit; 

  	$userdetails=$this->session->userdata('hrmsdetails');
    $rec_id=$this->session->userdata('recv');
    if($this->session->userdata('recv')){

    $eid=$userdetails['e_id'];
    $data=array(
 	'sender_id'=>$eid,
 	'recevier_id'=>$rec_id,
 	 'message'=> $message,
);
  $status=$this->Chat_model->senddata($data);

}
 
echo json_encode($status);exit; 

}

public function getmessages(){
		$userdetails=$this->session->userdata('hrmsdetails');
    $eid=$userdetails['e_id'];
    //$data['sender']=$eid;
$sid=$eid;
$rid=$this->session->userdata('recv');
//echo $sid.$rid;exit;
    $data['lists']=$this->Chat_model->get_messages($eid,$rid);
    //echo count($data['lists']);exit;
    // echo '<pre>';print_r($data);exit;
    $this->Chat_model->read_status_change($sid,$rid);
    if(count($data['lists'])>0){

    	$data['status']='yes';
    }

else{$data['status']='no';}
echo json_encode($data);exit; 
//$this->load->view('employee/getuserchat',$data);



}

public function userchat($id){
   $this->load->library('session');
  $userdetails=$this->session->userdata('hrmsdetails');
  //echo $id;exit;
    $sid=$userdetails['e_id'];
    $data['sender']=$sid;
   $this->session->unset_userdata('recv');
   $this->session->set_userdata('recv',$id);
   $rid=$this->session->userdata('recv');
   //echo $rid; exit;
   
     $data['user']=$this->Chat_model->employee_info($rid);
    $data['userchat']=$this->Chat_model->getchat($sid,$rid);

    //echo '<pre>';print_r($data);exit;
    // if(count($data['userchat'])>0){
    //   $data['status']=1;


    // }else{$data['status']=0;}

    
    $this->load->view('employee/userchat',$data);


}


}
?>