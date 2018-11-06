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

    $this->Chat_model->get_messages($eid);





}


}
?>