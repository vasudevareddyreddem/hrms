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
	$this->db->select('recevier_id');
	$this->db->from('chat_tab');
	$this->db->join('empployee','empployee.e_id=chat_tab_sender_id');
  $this->db->where ('sent_time=(select max(sent_time)');
  $this->db->where ('empployee.e_id', $eid);
  $query=$this->db->get();
  return $query->row();

}
// getting last chat 
public function last_chat($sid,$rid){
	$this->db->select('*');
	$this->db->from('chat_tab');
	        ->group_start();
         ->where('sender_id',$sid);
         ->where ('recevier_id', $rid);
         
     ->group_end();
  ->group_start()
         ->where('sender_id',$rid);
         ->where ('recevier_id', $sid);
         
     ->group_end();
  $this->db->order_by('sent_time', 'ASC');
  $query=$this->db->get();
  return $query->result();

}


}