<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
    public function get_sales_details_list(){
	$this->db->select('role.role,area.area,sales_track_details.*,assign_work.work_employee_id,assign_work.mobile_number,empployee.e_emplouee_id,e_login_name,e_designation,e_join_date')->from('sales_track_details');
	$this->db->join('empployee', 'empployee.e_id = sales_track_details.sales_emp_id', 'left');
	$this->db->join('assign_work', 'assign_work.w_d_id = sales_track_details.assign_work_id', 'left');
	$this->db->join('area', 'area.a_id = assign_work.allocated_area', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
	$this->db->group_by('sales_track_details.sales_emp_id');
	return $this->db->get()->result_array();
	}
	
	public function get_sales_man_details($emp_id){
	$this->db->select('area.area,sales_track_details.*,empployee.e_id,empployee.e_profile_pic,empployee.e_mobile_personal,empployee.e_email_work,empployee.role_id,empployee.e_emplouee_id,empployee.e_c_adress,empployee.e_c_city,empployee.e_c_district,empployee.e_c_state,empployee.e_c_country,empployee.e_login_name,assign_work.allocated_area')->from('sales_track_details');	
	$this->db->join('empployee', 'empployee.role_id = sales_track_details.sales_emp_id', 'left');
	$this->db->join('assign_work', 'assign_work.work_employee_id = sales_track_details.sales_emp_id', 'left');
	 $this->db->join('area', 'area.a_id = assign_work.allocated_area ', 'left');
	 $this->db->where('sales_track_details.sales_emp_id',$emp_id);
	return $this->db->get()->row_array();	
	
   }

	public function get_employee_previous_date_location_details($emp_id,$date){
		 $this->db->select('sales_track_details.*')->from('sales_track_details');
		$this->db->where('sales_track_details.sales_emp_id',$emp_id);
		$this->db->where('sales_track_details.work_date',$date);
		 return $this->db->get()->result_array();
	}
	public function get_employee_current_date_location_details($emp_id,$date){
		 $this->db->select('sales_track_details.*')->from('sales_track_details');
		$this->db->where('sales_track_details.sales_emp_id',$emp_id);
		$this->db->where('sales_track_details.work_date',$date);
		 return $this->db->get()->result_array();
	}
	 
    public function get_employee_current_date($emp_id,$date){
	$this->db->select('sales_track_details.work_date')->from('sales_track_details');
		$this->db->where('sales_track_details.sales_emp_id',$emp_id);
		$this->db->where('sales_track_details.work_date',$date);
		 return $this->db->get()->row_array();
	}
	 public function get_employee_previous_date($emp_id,$date){
	$this->db->select('sales_track_details.work_date')->from('sales_track_details');
		$this->db->where('sales_track_details.sales_emp_id',$emp_id);
		$this->db->where('sales_track_details.work_date',$date);
		 return $this->db->get()->row_array();
	}
	
	
	
  }
	
	
	
