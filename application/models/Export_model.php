<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
    public function get_all_employee_details_with_role_wise(){
		 $this->db->select('role.role,empployee.e_emplouee_id,empployee.e_login_name,empployee.e_join_date,empployee.e_email_personal,empployee.e_email_work,empployee.e_mobile_personal,empployee.e_mobile_work')->from('empployee');
		 $this->db->join('role', 'role.r_id = empployee.role_id ', 'left');
		 $this->db->order_by('empployee.role_id','asc');

		 return $this->db->get()->result_array();
	}
	
	public function get_all_employeeschedule_details(){
		$this->db->select('role.role,assign_work.date,empployee.e_emplouee_id,empployee.e_login_name,assign_work.mobile_number,area.area,assign_work.work,work_status.name as work_status')->from('assign_work');
		 $this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id ', 'left');
		 $this->db->join('area', 'area.a_id = assign_work.allocated_area ', 'left');
		 $this->db->join('role', 'role.r_id = empployee.role_id ', 'left');
		 $this->db->join('work_status', 'work_status.s_id = assign_work.work_status ', 'left');
		 $this->db->order_by('empployee.role_id','asc');

		 return $this->db->get()->result_array();
	}
    
	
  }
	
	
	
