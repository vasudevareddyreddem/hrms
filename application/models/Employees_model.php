<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_adminbasic_details($e_id){
		$this->db->select('e_id,e_login_name,e_email_work,status,role_id,e_profile_pic')->from('empployee');		
		$this->db->where('e_id', $e_id);
        return $this->db->get()->row_array();	
	}
	public function save_employee_details($data){
	$this->db->insert('empployee',$data);
	return $this->db->insert_id();
		
	}	
	public function department_name_list(){
	$this->db->select('department.d_id,department.department')->from('department');
	$this->db->where('department.status',1);
	return $this->db->get()->result_array();
	}
	public function sub_department_name_list(){
	$this->db->select('department.d_id,department.sub_department')->from('department');
	$this->db->where('department.status',1);
	return $this->db->get()->result_array();
	}
	public function shift_name_list(){
	$this->db->select('department.d_id,department.shift')->from('department');
	$this->db->where('department.status',1);
	return $this->db->get()->result_array();
	}
	public function roles_list(){
	$this->db->select('role.r_id,role.role')->from('role');
	$this->db->where('role.status',1);
	return $this->db->get()->result_array();
	}
	public function employee_data_list(){
		$this->db->select('empployee.*,role.role,department.shift')->from('empployee');
		$this->db->join('role', 'role.r_id = empployee.e_designation', 'left');
		$this->db->join('department', 'department.d_id = empployee.e_shift', 'left');
		 $this->db->where('empployee.status !=', 2);
		return $this->db->get()->result_array();
		
	}
	public  function check_email_already($e_email_work){
		$this->db->select('*')->from('empployee');
		$this->db->where('empployee.e_email_work',$e_email_work);
		return $this->db->get()->row_array();
	}	
	public function update_employee_details($e_id,$data){
			$this->db->where('e_id',$e_id);
    	return $this->db->update("empployee",$data);
	}
	public function edit_employee_details($e_id){
		$this->db->select('*')->from('empployee');
		$this->db->where('e_id',$e_id);
		return $this->db->get()->row_array();	
	}	
	public function saver_user_details($e_email_work){
		$this->db->select('*')->from('empployee');
		$this->db->where('empployee.e_email_work',$e_email_work);
		return $this->db->get()->row_array();
	 }
	public function delete_employee_details($e_id){
	    $this->db->where('e_id',$e_id);
		return $this->db->delete('empployee');
	}
	public function save_holidays_details($data){
	$this->db->insert('holidays',$data);
	return $this->db->insert_id();
		
	}		
	public function holidays_days_list(){
	$this->db->select('*')->from('holidays');
	$this->db->where('status !=', 2);
	return $this->db->get()->result_array();
		
	}	
	public function edit_holidays_details($h_id){
	$this->db->select('*')->from('holidays');
	$this->db->where('h_id',$h_id);
	return $this->db->get()->row_array();	
	}		
	public function update_holidays_details($h_id,$data){
	$this->db->where('h_id',$h_id);
    return $this->db->update("holidays",$data);		
	}		
	public function delete_holidays_details($h_id){
	$this->db->where('h_id',$h_id);
	return $this->db->delete('holidays');
	}	
	public function view_holidays_details($h_id){
	$this->db->select('*')->from('holidays');
	$this->db->where('h_id',$h_id);
	return $this->db->get()->row_array();	
	}		
	/* department   */
  public function save_department_details($data){
	$this->db->insert('department',$data);
	return $this->db->insert_id();
  }
public function department_list(){
$this->db->select('*')->from('department');
	$this->db->where('status !=', 2);
	return $this->db->get()->result_array();	
	}	
  public function edit_department_details($d_id){
	$this->db->select('*')->from('department');
	$this->db->where('d_id',$d_id);
	return $this->db->get()->row_array();	
	}
  public function update_department_details($d_id,$data){
 $this->db->where('d_id',$d_id);
    return $this->db->update("department",$data);		
	}
	public function delete_department_details($d_id){
	$this->db->where('d_id',$d_id);
	return $this->db->delete('department');
	}
	public  function check_department_already($department){
		$this->db->select('department.d_id')->from('department');
		$this->db->where('department.department',$department);
		$this->db->where('department.status ',1);
		return $this->db->get()->row_array();
	}
	
	public  function get_department_details_list($d_id){
			$this->db->select('*')->from('department');
			$this->db->where('department.d_id',$d_id);
			return $this->db->get()->row_array();
		}
	public  function check_department_data_exsists($department,$sub_department,$shift){
			$this->db->select('department.d_id')->from('department');
			$this->db->where('department.department',$department);
			$this->db->where('department.sub_department',$sub_department);
			$this->db->where('department.shift',$shift);
			$this->db->where('department.status ',1);
			return $this->db->get()->result_array();
		}
	
	
	}		
	
	
	
	
	
	
