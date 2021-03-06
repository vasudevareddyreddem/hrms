<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 

{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_roles_wise_details($e_id){
		$this->db->select('empployee.e_id,empployee.role_id,empployee.e_emplouee_id,empployee.e_profile_pic,role.role')->from('empployee');
		$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
		$this->db->where('e_id',$e_id);
		return $this->db->get()->row_array();	
	}
	
	
	public function employee_list_data(){
		$this->db->select('empployee.*')->from('empployee');
		$this->db->where('empployee.status !=',2);
        return $this->db->get()->result_array();
	}	
		
	
	public function get_hrms_details($e_id){
		$this->db->select('empployee.e_id,empployee.e_email_work')->from('empployee');		
		$this->db->where('e_id', $e_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	
	}
	
	public function get_all_hrms_resource_details($e_id){
		$this->db->select('empployee.*,role.role')->from('empployee');		
		$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
		$this->db->where('empployee.e_id', $e_id);
		$this->db->where('empployee.status', 1);
        return $this->db->get()->row_array();	
	}
	
	public  function check_email_exits($email){
		$this->db->select('empployee.e_id,empployee.e_email_work')->from('empployee');		
		$this->db->where('e_email_work', $email);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();
	}
	
	public function login_details($e_email_work,$e_password){
		$sql = "SELECT e_id,role_id,e_email_work,e_login_name FROM empployee WHERE (e_email_work ='".$e_email_work."' AND e_password='".$e_password."'  AND status='1') OR (e_email_work ='".$e_email_work."' AND e_password='".$e_password."' AND status='1')";
		return $this->db->query($sql)->row_array();	
	}
	
	public function check_today_login($e_id,$l_date){
		$this->db->select('*')->from('login_details');
		$this->db->where('e_id', $e_id);	
		$this->db->where('l_date', $l_date);	
        return $this->db->get()->row_array();
	}
	
public function save_login_time_status($data){
		$this->db->insert('login_details', $data);
		return $insert_id = $this->db->insert_id();
	}
	
	public function update_logout_time_status($l_id,$e_id,$date){
		$sql1="UPDATE login_details SET e_logout_time ='".$date."' WHERE l_id = '".$l_id."' AND e_id = '".$e_id."'";
       	return $this->db->query($sql1);
	}
	
	public function get_all_admin_details($e_id){
		$this->db->select('empployee.*,role.role')->from('empployee');
		$this->db->join('role', 'role.r_id = empployee.e_designation', 'left');
		$this->db->where('e_id',$e_id);
		return $this->db->get()->row_array();	
	}
	public  function update_profile_details($e_id,$data){
		$this->db->where('e_id',$e_id);
    	return $this->db->update("empployee",$data);
	}
	
	public  function check_profile_email_exits($e_email_work){
		$this->db->select('empployee.e_id,empployee.e_email_work')->from('empployee');
		$this->db->where('e_email_work',$e_email_work);
		$this->db->where('status !=',2);
		return $this->db->get()->row_array();
	}
	/*change password*/
	public function get_adminpassword_details($e_id){
		$this->db->select('empployee.e_id,empployee.e_password')->from('empployee');
		$this->db->where('e_id', $e_id);
		$this->db->where('status', 1);
		return $this->db->get()->row_array();	
	}
	public function update_admin_details($e_id,$data){
		$this->db->where('e_id',$e_id);
    	return $this->db->update("empployee",$data);
	}
	
	public function update_login_sataus_details($e_id,$login_status){
	$sql1="UPDATE empployee SET login_status =0 WHERE  e_id = '".$e_id."'";
       	return $this->db->query($sql1);
	}
	
	
	public function update_sataus_details_log($e_id,$data){
	$this->db->where('e_id',$e_id);
    	return $this->db->update("empployee",$data);
	}
	
	public function check_login($e_id){
	$this->db->select('*')->from('empployee');
		$this->db->where('e_id', $e_id);	
        return $this->db->get()->row_array();
	}
	
	
	public function get_all_user_details($e_id){
	$this->db->select('empployee.*,role.role')->from('empployee');
		$this->db->join('role', 'role.r_id = empployee.e_designation', 'left');
		$this->db->where('empployee.e_id',$e_id);
		$this->db->where('empployee.role_id',3);
		return $this->db->get()->row_array();	
	}
	
	/*notification data*/
	public function get_all_employee_leaves_list_details($e_id){
	$this->db->select('leaves.*,empployee.e_login_name,role.role,leave_type.leave_type_name')->from('leaves');
	$this->db->join('empployee', 'empployee.e_id = leaves.emp_id', 'left');
	$this->db->join('role', 'role.r_id = empployee.role_id', 'left');
	$this->db->join('leave_type', 'leave_type.l_t_id = leaves.leave_type', 'left');
	if(isset($e_id) && $e_id!=''){
		$this->db->where('leaves.emp_id',$e_id);
	}
	$this->db->where('leaves.status',0);
	return $this->db->get()->result_array();	
	}
	
	public  function get_leave_notification_count($e_id){
		$this->db->select('COUNT(leaves.l_id) as cnt')->from('leaves');
		if(isset($e_id) && $e_id!=''){
			$this->db->where('leaves.emp_id',$e_id);
		}
		$this->db->where('leaves.read_count',1);
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
	/*notification data*/
	
	
	
	
	
	
  }