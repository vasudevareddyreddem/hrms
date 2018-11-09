<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model 

{
	public function __construct() 
	{
		parent::__construct();
		$this->load->database("default");

	}
	public function senddata($data){

		$this->db->insert('chat_tab',$data);
		return  ($this->db->affected_rows() == 1) ? true: false;

}
public function emp_det($eid){
	$this->db->select('e_id,e_f_name,login_status');
$this->db->where('e_id !=',$eid);







$query=$this->db->get('empployee');
return $query->result();

}
// getting last recevier id
public function last_chat_rec_id($eid){
  $this->db->select('max(sent_time)');
  $this->db->from('chat_tab');
   $this->db->where('sender_id',$eid);
   $this->db->or_where('recevier_id',$eid);
   $subquery = $this->db->get_compiled_select();


	$this->db->select('recevier_id,e_f_name,e_email_work ,e_mobile_work,role');
	$this->db->from('empployee');
	$this->db->join('chat_tab','empployee.e_id=chat_tab.sender_id');
  $this->db->join('role','role.r_id=empployee.role_id');
  $this->db->where("`sent_time`=($subquery)");
  $this->db->where ('empployee.e_id', $eid);
  $query=$this->db->get();
  return $query->row();

}
// getting last chat 
public function last_chat($eid,$rid){
  // $this->db->select('max(sent_time)');
  // $this->db->from('chat_tab');
  // $this->db->where('sender_id',$eid);
  //  $subquery = $this->db->get_compiled_select();

  // $this->db->select('recevier_id');
  // $this->db->from('chat_tab');
  //  $this->db->where("`sent_time` in ($subquery)");
  //  $subquery1 = $this->db->get_compiled_select();



	$this->db->select('*')->from('chat_tab')->where('sender_id',$eid)->where ('recevier_id', $rid)
->or_group_start()
         ->where('sender_id',$rid)
         ->where ('recevier_id', $eid)
         
      ->group_end();
  // ->group_start()
  //        ->where('sender_id',$rid)
  //        ->where ('recevier_id', $sid)
         
  //    ->group_end();
  // //$this->db->order_by('sent_time', 'ASC');
  $query=$this->db->get();
  return $query->result();

}
// receving message from other side
public function get_messages($eid,$rid){

  $this->db->select('*');
  $this->db->from('chat_tab');
  $this->db->where('recevier_id',$eid);
  $this->db->where('sender_id',$rid);
   $this->db->where('read_status','unread');
  $query=$this->db->get();
  return $query->result();


           

}
// get the chat between two users
public function getchat($sid,$rid){

   $this->db->select('*')->
  from('chat_tab')
->group_start()
         ->where('sender_id',$sid)
         ->where ('recevier_id', $rid)
         
      ->group_end()
      ->or_group_start()
         ->where('sender_id',$rid)
         ->where ('recevier_id', $sid)
         
      ->group_end()->order_by('sent_time','ASC');
      $query=$this->db->get();
      return $query->result();
}
//get individula users
public function employee_info($rid){
  $this->db->select('e_f_name,e_id,e_email_work,e_mobile_work,role')->
  from('empployee')->join('role','empployee.role_id=role.r_id','left')->
  where('empployee.e_id',$rid);
  $query=$this->db->get();
  return $query->row();


}
//update the messages unread to read
public function read_status_change($sid,$rid){

  $this->db->update('chat_tab', array('read_status'=>'read','notified_msg'=>1),
  array('sender_id' => $rid,'recevier_id' => $sid));
  return 'success';
}
//get lastrecord

public function getlastrecord($eid){

  $this->db->select('max(sent_time)');
  $this->db->from('chat_tab');
   $this->db->where('sender_id',$eid);
   $this->db->or_where('recevier_id',$eid);
   $subquery = $this->db->get_compiled_select();
   $this->db->select('*')->from('chat_tab')->where("`sent_time`=($subquery)")
  ->group_start()->where ('sender_id', $eid)->
  or_where('recevier_id',$eid)->group_end();

$query=$this->db->get();
return $query->row();
}
//receiver details
public function recv_details($rid){

  $this->db->select('*')->from('empployee')->join('role','empployee.role_id=role.r_id')
->where('e_id',$rid);
  $query=$this->db->get();
  return $query->row();

}
//who are loggedin 
public function update_login_users(){

   $this->db->select('e_id,e_f_name,login_status')->from('empployee')->where('login_status',1);
   $query=$this->db->get();
   return $query->result();


}
public function updates_for_users($sid,$rid){

// $this->db->select('receiver_id,count(*) cnt')->from('chat_tab')->where('recevier_id !=',$rid)
// ->where('sender_id',$sid)->where('read_status','unread')->group_by('recevier_id');
//    $subquery=$this->db->get_compiled_select();
//    $this->db->select('e_id, e_f_name,login_status,cnt')->from($subquery)->
//    join('empployee',)
//    return $query->result();
  $sql='select e_id,e_f_name,cnt,login_status from (select sender_id,recevier_id,count(*) cnt from chat_tab where recevier_id ='.$sid.' and sender_id !='.$rid .' and read_status="unread" and notified_msg=0 group by sender_id,recevier_id) chat right join empployee on (empployee.e_id=chat.sender_id)  where e_id !='.$sid;
 $query = $this->db->query($sql);

// $this->db->select('e_id,e_f_name, cnt,login_status');
//  $sub= $this->subquery->start_subquery('from');
// $sub->select('receiver_id,count(*) cnt');
// $sub->from('chat_tab');
// $sub->where('recevier_id !=',$rid);
// $sub->where('sender_id',$sid);
// $sub->where('read_status','unread');
// $sub->group_by('recevier_id');
// $this->subquery->end_subquery('chat');
// $this->db->join('empployee', 'empployee.e_id=chat.recevier_id');
// $query=$this->db->get();
return $query->result();

}
public function update_msg_count($sid,$rid){


  $sql='select sender_id,recevier_id,count(*) cnt from chat_tab where recevier_id ='.$sid.' and sender_id !='.$rid .' and read_status="unread" and notified_msg=0 group by sender_id,recevier_id ';
 $query = $this->db->query($sql);


return $query->result();

}


public function notified_change($sid)
{
  $this->db->set('notified_msg', 1);
$this->db->where('recevier_id=', $sid);
$this->db->update('chat_tab'); 

return 'success';

}
//gettin the employee count
public function empcount(){

$this->db->select('count(*) cnt')->from('empployee')->where('login_status',1);
$query=$this->db->get();
return $query->row();
}

// getting all users
public function allusers(){


$this->db->select('*')->from('empployee');
$query=$this->db->get();
return $query->result();



}

}