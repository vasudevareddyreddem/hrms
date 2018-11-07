<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Chat extends In_frontend
{
public function __construct() 
  {
 parent::__construct(); 
 $this->load->model('Chat_model');

  }

  public function sendmessage(){
  	$message=$this->input->post('message');
  	$rec_id=$this->input->post('rid');
  	//echo json_encode($rec_id);exit; 

  	$userdetails=$this->session->userdata('hrmsdetails');
    $eid=$userdetails['e_id'];
    $data=array(
 	'sender_id'=>$eid,
 	'recevier_id'=>$rec_id,
 	 'message'=> $message,
);
  $status=$this->Chat_model->senddata($data);


 
echo json_encode($status);exit; 

}

public function getmessages(){
		$userdetails=$this->session->userdata('hrmsdetails');
    $eid=$userdetails['e_id'];

    $data['lists']=$this->Chat_model->get_messages($eid);
    if(count($data['lists']>0)){

    	$data['status']='yes';
    }

else{$data['status']='no';}
echo json_encode($data);exit; 



}

public function userchat($rid){
  $userdetails=$this->session->userdata('hrmsdetails');
    $sid=$userdetails['e_id'];
    $data['sender']=$sid;

     $data['user']=$this->Chat_model->employee_info($rid);
    $data['userchat']=$this->Chat_model->getchat($sid,$rid);
    //echo '<pre>';print_r($data);exit;
    if(count($data['userchat'])>0){


    }
    $this->load->view('employee/userchat',$data);


}


}
?>