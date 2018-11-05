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
	$this->db->select('e_id,e_f_name');
   $this->db->where('status',1);

$query=$this->db->get('empployee');
return $query->result();

}


}