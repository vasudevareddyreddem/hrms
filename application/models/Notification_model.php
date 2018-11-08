<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model 

{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_notifications_leaves($l_id){
	$this->db->select('leaves.*')->from('leaves');
	$this->db->where('l_id',$l_id);
	return $this->db->get()->row_array();
	}
	
	public  function get_notifications_leaves_read($l_id,$data){
			$this->db->where('l_id',$l_id);
			return $this->db->update('leaves',$data);
		}
		public function get_all_admin_details($e_id){
		$this->db->select('empployee.*,role.role')->from('empployee');
		$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
		$this->db->where('e_id',$e_id);
		return $this->db->get()->row_array();	
	}
	
  }