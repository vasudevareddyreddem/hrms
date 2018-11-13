<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function get_employee_daily_work($e_id){
		$this->db->select('assign_work.*,empployee.e_login_name,empployee.e_emplouee_id,assinged.e_login_name as workassign_name,area.area')->from('assign_work');
		$this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id', 'left');
		$this->db->join('empployee as assinged', 'assinged.e_id = assign_work.created_by', 'left');
		$this->db->join('area', 'area.a_id = assign_work.allocated_area', 'left');
		$this->db->where('assign_work.work_employee_id',$e_id);
		$this->db->where('assign_work.status !=',2);
	    return $this->db->get()->result_array();	
	}
	
	public  function update_work_status_details($w_d_id,$data){
		$this->db->where('w_d_id',$w_d_id);
        return $this->db->update("assign_work",$data);
	}
	
	public  function get_ticket_details($w_d_id){
		$this->db->select('assign_work.*,empployee.e_login_name,empployee.e_emplouee_id,assinged.e_login_name as workassign_name,area.area')->from('assign_work');
		$this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id', 'left');
		$this->db->join('empployee as assinged', 'assinged.e_id = assign_work.created_by', 'left');
		$this->db->join('area', 'area.a_id = assign_work.allocated_area', 'left');
		$this->db->where('assign_work.w_d_id',$w_d_id);
	    return $this->db->get()->row_array();
	}
	public  function save_work_ticket_rise($data){
		$this->db->insert('work_tickest_list',$data);
		return $this->db->insert_id();
	}
	public  function get_ticket_rise_details_list($w_d_id){
		$this->db->select('*')->from('work_tickest_list');
		$this->db->where('work_tickest_list.w_d_id',$w_d_id);
	    return $this->db->get()->result_array();	
	}
	

	
 		

}

	
	

	
	
	
