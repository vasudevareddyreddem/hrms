<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
   public function get_total_employee_count(){
	$this->db->select('Count(empployee.e_id) as employee_count')->from('empployee');
	$this->db->where('empployee.status ',1);
   $this->db->where('empployee.role_id !=',1);	
	return $this->db->get()->row_array();
	}
	
	
  }
	
	
	
