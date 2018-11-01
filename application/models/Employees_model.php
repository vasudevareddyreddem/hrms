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
		 $this->db->where('status',1);
		return $this->db->get()->result_array();
		
	}
	public  function check_email_already($e_email_work){
		$this->db->select('*')->from('empployee');
		$this->db->where('empployee.e_email_work',$e_email_work);
		return $this->db->get()->row_array();
	}	
		
		public function emp_delete($eid){

$this->db->set('status', '2');
$this->db->where('e_id', $eid);
$this->db->update('empployee');

return 'sucesss';
		}

		// get all the employee names
		public function all_emp(){
			 $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$query = $this->db->get();
			return $query->result();

}
		
		
		
	}		
	
	
	
	
	
	
