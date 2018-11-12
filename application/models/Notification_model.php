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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
	
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
	
	public function get_notifications_view_list(){
	$this->db->select('leaves.*')->from('leaves');
	return $this->db->get()->result_array();
<<<<<<< HEAD
		}
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
	
<<<<<<< HEAD
<<<<<<< HEAD
	public function get_all_notifications_leaves_list_details(){
	$this->db->select('leaves.*,empployee.e_login_name,role.role,leave_type.leave_type_name')->from('leaves');
	$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
	$this->db->join('leave_type', 'leave_type.l_t_id = leaves.leave_type', 'left');
=======
=======
	public function get_notifications_view_list(){
	$this->db->select('leaves.*')->from('leaves');
	return $this->db->get()->result_array();
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
	public function get_notifications_view_list(){
	$this->db->select('leaves.*')->from('leaves');
	return $this->db->get()->result_array();
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
}
	
<<<<<<< HEAD
=======
	public function get_notifications_view_list(){
	$this->db->select('leaves.*')->from('leaves');
	return $this->db->get()->result_array();
}
	
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
	public function get_all_notifications_leaves_list_details(){
	$this->db->select('leaves.*,empployee.e_login_name,role.role')->from('leaves');
	$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
=======
>>>>>>> parent of a4efb4f... Merge branch 'master' of https://github.com/vasudevareddyreddem/hrms
	$this->db->where('leaves.status',0);
	return $this->db->get()->result_array();	
	}
	
	
	public function delete_notifications_details($l_id){
	$this->db->where('l_id',$l_id);
	return $this->db->delete('leaves');
	}
	
	
  }