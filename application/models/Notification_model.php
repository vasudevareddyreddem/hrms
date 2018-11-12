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
	public  function get_notification_unread_count($e_id){
		$this->db->select('int_id,s_id,comment,create_at')->from('announcements');
		$this->db->where('s_id',$u_id);
		$this->db->where('status',1);
		$this->db->where('readcount',0);
		return $this->db->get()->result_array();
		}
	public  function get_resource_leaves_type($l_id){
			$this->db->select('schools_announcements.*')->from('schools_announcements');
			$this->db->where('l_id',$l_id);
			return $this->db->get()->row_array();
		}
	
	
	
	
	
	
	
  }