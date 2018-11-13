<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function get_employee_daily_work($e_id){
		$this->db->select('assign_work.*,empployee.e_login_name,assinged.e_login_name as workassign_name')->from('assign_work');
		$this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id', 'left');
		$this->db->join('empployee as assinged', 'assinged.e_id = assign_work.created_by', 'left');
		$this->db->where('assign_work.work_employee_id',$e_id);
	    return $this->db->get()->result_array();	
	}


	
 		

}

	
	

	
	
	
