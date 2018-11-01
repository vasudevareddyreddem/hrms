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
		
	public function login_details($data){
		$sql = "SELECT * FROM empployee WHERE (e_email_work ='".$data['e_email_work']."' AND e_password='".$data['e_password']."' AND status=1)";
		return $this->db->query($sql)->row_array();	
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
	
	
  }