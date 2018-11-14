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
public function emp_name_id($eid){

	$this->db->select('e_id,e_f_name,e_emplouee_id');
$this->db->where('e_id',$eid);
	$query=$this->db->get('empployee');

	return $query->row();


}
public function get_days($eid,$month,$year){



	$this->db->select('DAY(l_date) lday');
	$this->db->where('month(l_date)',$month);
	$this->db->where('year(l_date)',$year);
	$this->db->where('e_id',$eid);
	$this->db->group_by('DAY(l_date)');
	$query=$this->db->get('login_details');
return $query->result_array();

}
public function update_emp_shift($eid,$data){

	$this->db->where('e_id',$eid);
	return $this->db->update("empployee",$data);
    



}

}