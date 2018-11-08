<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_adminbasic_details($e_id){
		$this->db->select('e_id,e_login_name,e_email_work,status,e_profile_pic')->from('empployee');		
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
	$this->db->select('subdepartment.s_d_id,subdepartment.sub_department')->from('subdepartment');
	$this->db->where('subdepartment.status',1);
	return $this->db->get()->result_array();
	}
	public function shift_name_list(){
	$this->db->select('shift.s_id,shift.shift')->from('shift');
	$this->db->where('shift.status',1);
	return $this->db->get()->result_array();
	}
	public function roles_list(){
	$this->db->select('role.r_id,role.role')->from('role');
	$this->db->where('role.status',1);
	return $this->db->get()->result_array();
	}
	public function employee_data_list(){
		$this->db->select('empployee.*,role.role,shift.shift')->from('empployee');
		$this->db->join('role', 'role.r_id = empployee.e_designation', 'left');
		$this->db->join('shift', 'shift.s_id = empployee.e_shift', 'left');
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
		$this->db->select('empployee.*,role.role,shift.shift,department.department,subdepartment.sub_department')->from('empployee');
		$this->db->join('role', 'role.r_id = empployee.e_designation', 'left');
		$this->db->join('shift', 'shift.s_id = empployee.e_shift', 'left');
		$this->db->join('department', 'department.d_id = empployee.e_department', 'left');
		$this->db->join('subdepartment', 'subdepartment.s_d_id = empployee.e_sub_department', 'left');
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
		


		// get all the employee names
		public function all_emp(){
			 $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$query = $this->db->get();
			return $query->result();

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
		$this->db->select('department.*')->from('department');
		$this->db->where('department.department',$department);
		$this->db->where('department.status ',1);
		return $this->db->get()->row_array();
	}
	
	public  function get_department_details_list($d_id){
			$this->db->select('*')->from('department');
			$this->db->where('department.d_id',$d_id);
			return $this->db->get()->row_array();
		}
	public  function check_department_data_exsists($department){
			$this->db->select('*')->from('department');
		$this->db->where('department',$department);
		return $this->db->get()->row_array();
	}
	
	/* shift */
	 public function save_shift_details($data){
	   $this->db->insert('shift',$data);
	   return $this->db->insert_id();
  }
	
	public function shift_list(){
    $this->db->select('*')->from('shift');
	$this->db->where('status !=', 2);
	return $this->db->get()->result_array();	
	}	
	public function check_shift_already(){
	$this->db->select('shift.*')->from('shift');
		$this->db->where('shift.shift',$shift);
		$this->db->where('shift.status ',1);
		return $this->db->get()->row_array();
	}
	public function edit_shift_details($s_id){
	$this->db->select('*')->from('shift');
	$this->db->where('s_id',$s_id);
	return $this->db->get()->row_array();	
	}
	public function update_shift_details($s_id,$data){
	 $this->db->where('s_id',$s_id);
    return $this->db->update("shift",$data);		
	}
	public function get_shift_details_list($s_id){
	$this->db->select('*')->from('shift');
	$this->db->where('shift.s_id',$s_id);
	return $this->db->get()->row_array();
	}
	public function check_shift_data_exsists($shift){
	$this->db->select('*')->from('shift');
	$this->db->where('shift',$shift);
	return $this->db->get()->row_array();
	}
	public function delete_shift_details($s_id){
	$this->db->where('s_id',$s_id);
	return $this->db->delete('shift');
	}
	/* sub department */
	public function save_subdepartment_details($data){
	$this->db->insert('subdepartment',$data);
	return $this->db->insert_id();
  }
	public function department_data_details(){
	$this->db->select('department.d_id,department.department')->from('department');
	$this->db->where('department.status',1);
	return $this->db->get()->result_array();
	}
	public function check_subdepartment_data_exsists($department,$sub_department){
			$this->db->select('subdepartment.s_d_id')->from('subdepartment');
			$this->db->where('subdepartment.department',$department);
			$this->db->where('subdepartment.sub_department',$sub_department);
			$this->db->where('subdepartment.status ',1);
			return $this->db->get()->result_array();
		}
	public function get_subdepartment_details_list($s_d_id){
	$this->db->select('*')->from('subdepartment');
			$this->db->where('subdepartment.s_d_id',$s_d_id);
			return $this->db->get()->row_array();
		}
	
	
	public function subdepaertment_list(){
	$this->db->select('subdepartment.*,department.department')->from('subdepartment');
	$this->db->join('department', 'department.d_id = subdepartment.department', 'left');
	$this->db->where('subdepartment.status !=', 2);
	return $this->db->get()->result_array();	
	}
	public function edit_subdepartment_details($s_d_id){
	$this->db->select('*')->from('subdepartment');
	$this->db->where('s_d_id',$s_d_id);
	return $this->db->get()->row_array();	
	}
	public function update_subdepartment_details($s_d_id,$data){
	$this->db->where('s_d_id',$s_d_id);
    return $this->db->update("subdepartment",$data);		
	}
	public function delete_subdepartment_details($s_d_id){
	$this->db->where('s_d_id',$s_d_id);
	return $this->db->delete('subdepartment');	
	}
	
	public function department_wise_list($e_department){
	$this->db->select('subdepartment.sub_department,subdepartment.s_d_id')->from('subdepartment');
		$this->db->join('department', 'department.d_id = subdepartment.department', 'left');
		$this->db->where('subdepartment.department',$e_department);
		 $this->db->where('subdepartment.status',1);
		 return $this->db->get()->result_array();
	}
	 
	
	public function edit_shift_management_details($e_id){
	$this->db->select('e_id,shift,e_shift')->from('empployee');
	$this->db->join('shift','shift.s_id=empployee.e_shift');
	$this->db->where('e_id',$e_id);
	return $this->db->get()->row_array();	
	}
	/* leaves */
	public function save_leaves_details($data){
	$this->db->insert('leaves',$data);
	return $this->db->insert_id();		
	}
	
	
	
	public function update_leave_list_details_status($l_id,$data){
	$this->db->where('l_id',$l_id);
    return $this->db->update("leaves",$data);		
	}
	
	public function employee_list_data(){
	$this->db->select('empployee.e_id,empployee.e_login_name')->from('empployee');
	 $this->db->where('empployee.role_id !=',1);
	 $this->db->where('empployee.status',1);
	return $this->db->get()->result_array();	
	}
	/* employee leaves */
	
	
	public function employee_leaves_list_details($e_id){
	$this->db->select('leaves.*,empployee.e_login_name,role.role')->from('leaves');
	$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');

	$this->db->where('emp_id',$e_id);
	return $this->db->get()->result_array();	
	}
	public function get_all_employee_leaves_list_details(){
	$this->db->select('leaves.*,empployee.e_login_name,role.role')->from('leaves');
	$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
		$this->db->where('leaves.status',0);
	return $this->db->get()->result_array();	
	}
	
	public function leaves_list_details_data(){
	$this->db->select('leaves.*,empployee.e_login_name,role.role')->from('leaves');
	$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
		$this->db->where('leaves.status !=',0);
	return $this->db->get()->result_array();	
	}
	
	
	
 }		
	
	
	
	
	
	
