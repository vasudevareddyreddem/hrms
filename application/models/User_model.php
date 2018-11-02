<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 

{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
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
		$sql = "SELECT * FROM empployee WHERE (e_email_work ='".$e_email_work."' AND e_password='".$e_password."'  AND status='1') OR (e_email_work ='".$e_email_work."' AND e_password='".$e_password."' AND status='1')";
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
	
	
	
  }