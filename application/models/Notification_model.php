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
	
	public  function get_notitifation_unread_count($e_id){
		$this->db->select('COUNT(leaves.l_id) as cnt')->from('leaves');
		if(isset($e_id) && $e_id!=''){
			$this->db->where('leaves.emp_id',$e_id);
		}
		$this->db->where('leaves.read_count',1);
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




	
	public function get_all_notifications_leaves_list_details(){
	$this->db->select('leaves.*,empployee.e_login_name,role.role')->from('leaves');
	$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');


	$this->db->where('leaves.status',0);
	return $this->db->get()->result_array();	
	}
	
	
	public function delete_notifications_details($l_id){
	$this->db->where('l_id',$l_id);
	return $this->db->delete('leaves');
	}
	
	
  }