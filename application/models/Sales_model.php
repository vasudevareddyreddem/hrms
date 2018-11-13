<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
    public function get_sales_details_list(){
	$this->db->select('area.area,sales_track_details.*,role.role,assign_work.allocated_area,mobile_number,empployee.e_emplouee_id,e_login_name,e_designation,e_join_date')->from('sales_track_details');
	$this->db->join('empployee', 'empployee.role_id = sales_track_details.sales_emp_id', 'left');
	$this->db->join('role', 'role.r_id = sales_track_details.sales_emp_id', 'left');
	$this->db->join('assign_work', 'assign_work.work_employee_id = sales_track_details.sales_emp_id', 'left');
	 $this->db->join('area', 'area.a_id = assign_work.allocated_area ', 'left');
	$this->db->group_by('sales_track_details.sales_emp_id');
	return $this->db->get()->result_array();
	}
	
	public function get_sales_man_details(){
	$this->db->select('area.area,sales_track_details.*,empployee.*,assign_work.allocated_area')->from('sales_track_details');	
	$this->db->join('empployee', 'empployee.role_id = sales_track_details.sales_emp_id', 'left');
	$this->db->join('assign_work', 'assign_work.work_employee_id = sales_track_details.sales_emp_id', 'left');
	 $this->db->join('area', 'area.a_id = assign_work.allocated_area ', 'left');
	return $this->db->get()->row_array();	
	
   }

	 public function get_sales_detais_date_wise(){
	   $this->db->select('sales_track_details.*')->from('sales_track_details');
	    $this->db->group_by('sales_track_details.work_date');
		 return $this->db->get()->result_array();
	}
	   
	 
    
	
  }
	
	
	
