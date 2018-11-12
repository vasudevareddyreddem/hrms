<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_all_salesmans_list(){
		$this->db->select('e_id,e_login_name,e_email_work,status,e_profile_pic')->from('empployee');		
		$this->db->where('role_id', 3);
        return $this->db->get()->result_array();	
	}
	
	
 }		
	
	
	
	
	
	
