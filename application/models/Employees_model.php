<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_employee_details($data){
	$this->db->insert('empployee',$data);
	return $this->db->insert_id();
		
	}	
	public function employee_data_list(){
		$this->db->select('*')->from('empployee');
		 $this->db->where('status !=', 2);
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
		
		
		
		
		
		
	}		
	
	
	
	
	
	
