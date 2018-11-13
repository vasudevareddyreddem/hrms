<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leaves_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function get_all_employees_leaves_list(){
		$this->db->select('leaves.*,empployee.e_login_name,role.role,leave_type.leave_type_name as l_type,accepted_as.e_login_name as accepted_name')->from('leaves');
		$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
		$this->db->join('empployee as accepted_as', 'accepted_as.e_id = leaves.accepted_by', 'left');
		$this->db->join('leave_type', 'leave_type.l_t_id = leaves.leave_type', 'left');
		$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
		$this->db->order_by('leaves.l_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_all_employees_current_month_leaves_list($month){
		$this->db->select('leaves.*,empployee.e_login_name,role.role,leave_type.leave_type_name as l_type,accepted_as.e_login_name as accepted_name')->from('leaves');
		$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
		$this->db->join('empployee as accepted_as', 'accepted_as.e_id = leaves.accepted_by', 'left');
		$this->db->join('leave_type', 'leave_type.l_t_id = leaves.leave_type', 'left');
		$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
		$this->db->order_by('leaves.l_id','desc');
		$this->db->where('month(leaves.created_at)',$month);
		return $this->db->get()->result_array();
	}
	


	
 		

}

	
	

	
	
	
