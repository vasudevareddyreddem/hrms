<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class emp_manage_model extends CI_Model 

{
	public function __construct() 
	{
		parent::__construct();
		$this->load->database("default");

	}


	public function get_login_details(){
		$this->db->select('empployee.e_id, e_f_name,e_designation,e_mobile_work,e_emplouee_id');

$this->db->from('empployee');
$this->db->join('login_details','empployee.e_id=login_details.e_id');
$this->db->where('empployee.status !=',2);
$this->db->group_by('e_id, e_f_name,e_designation,e_mobile_work,e_emplouee_id');

$query=$this->db->get();
return $query->result();

	}


}