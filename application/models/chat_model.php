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
  $this->db->join('role','role.r_id=empployee.role_id','left');
  $this->db->where("`sent_time`=($subquery)");
  $this->db->where ('empployee.e_id', $eid);
  $query=$this->db->get();
  return $query->row();

}
// getting last chat 
public function last_chat($eid){
  $this->db->select('max(sent_time)');
  $this->db->from('chat_tab');
  $this->db->where('sender_id',$eid);
   $subquery = $this->db->get_compiled_select();

  $this->db->select('recevier_id');
  $this->db->from('chat_tab');
   $this->db->where("`sent_time` in ($subquery)");
   $subquery1 = $this->db->get_compiled_select();



	$this->db->select('*')->from('chat_tab')->where("`recevier_id` in ($subquery1)")->or_where ('recevier_id', $eid)
->group_start()
         ->where('sender_id',$eid)
         ->or_where ('recevier_id', $eid)
         
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
public function get_messages($eid){

  $this->db->select('*');
  $this->db->from('chat_tab');
  $this->db->where('recevier_id',$eid);
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


}