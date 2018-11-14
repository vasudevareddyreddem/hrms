<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
    public function get_all_employee_details_with_role_wise(){
		 $this->db->select('role.role,empployee.e_emplouee_id,empployee.e_login_name,empployee.e_join_date,empployee.e_email_personal,empployee.e_email_work,empployee.e_mobile_personal,empployee.e_mobile_work')->from('empployee');
		 $this->db->join('role', 'role.r_id = empployee.role_id ', 'left');
		 $this->db->order_by('empployee.role_id','asc');

		 return $this->db->get()->result_array();
	}
	
	public function get_all_employeeschedule_details(){
		$this->db->select('role.role,assign_work.date,empployee.e_emplouee_id,empployee.e_login_name,assign_work.mobile_number,area.area,assign_work.work,work_status.name as work_status')->from('assign_work');
		 $this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id ', 'left');
		 $this->db->join('area', 'area.a_id = assign_work.allocated_area ', 'left');
		 $this->db->join('role', 'role.r_id = empployee.role_id ', 'left');
		 $this->db->join('work_status', 'work_status.s_id = assign_work.work_status ', 'left');
		 $this->db->order_by('assign_work.date','desc');

		 return $this->db->get()->result_array();
	}
	/* sales  man daliy work report*/
	public  function get_sales_man_daily_work_report($date){
		 $this->db->select('empployee.e_id,empployee.e_emplouee_id,assign_work.w_d_id,assign_work.date')->from('assign_work');
		 $this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id ', 'left');
		 $this->db->order_by('empployee.role_id',8);
		 $this->db->where('empployee.status',1);
		  $this->db->where('assign_work.date',$date);
		 $return=$this->db->get()->result_array();
		  $work_details=$data_work='';
		 foreach($return as $list){
			 $emp_work=$this->get_employee_work_dailay_details($list['date'],$list['e_id'],$list['w_d_id']);
			 $data[$list['e_id']]=$list;
			 $data[$list['e_id']]['work']=isset($emp_work)?$emp_work:'';
			 
		 }
		 if(!empty($data)){
			 return $data;
		 }
	}
	public  function get_employee_work_dailay_details($date,$e_id,$w_d_id){
		 $this->db->select('work_date,time,area_name,area_location')->from('sales_track_details');
		 $this->db->where('sales_track_details.sales_emp_id',$e_id);
		 $this->db->where('sales_track_details.work_date',$date);
		 return $this->db->get()->result_array();
	}
	public  function get_sales_man_month_work_report($month){
		 $this->db->select('empployee.e_id,empployee.e_emplouee_id,assign_work.w_d_id,assign_work.date')->from('assign_work');
		 $this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id ', 'left');
		 $this->db->order_by('empployee.role_id',8);
		 $this->db->where('empployee.status',1);
		 $this->db->where('month(assign_work.date)',$month);
		 $return=$this->db->get()->result_array();
		  $work_details=$data_work='';
		 foreach($return as $list){
			 $emp_work=$this->get_employee_work_month_details($month,$list['e_id'],$list['w_d_id']);
			 $data[$list['e_id']]=$list;
			 $data[$list['e_id']]['work']=isset($emp_work)?$emp_work:'';
			 
		 }
		 if(!empty($data)){
			 return $data;
		 }
	}
	public  function get_employee_work_month_details($month,$e_id,$w_d_id){
		 $this->db->select('work_date,time,area_name,area_location')->from('sales_track_details');
		 $this->db->where('sales_track_details.sales_emp_id',$e_id);
		 $this->db->where('month(sales_track_details.work_date)',$month);
		 return $this->db->get()->result_array();
	}
	public  function get_sales_man_week_work_report($WEEK){
		 $this->db->select('empployee.e_id,empployee.e_emplouee_id,assign_work.w_d_id,assign_work.date')->from('assign_work');
		 $this->db->join('empployee', 'empployee.e_id = assign_work.work_employee_id ', 'left');
		 $this->db->order_by('empployee.role_id',8);
		 $this->db->where('empployee.status',1);
		 //$this->db->where('WEEK(assign_work.date)',$WEEK);
		 $return=$this->db->get()->result_array();
		  $work_details=$data_work='';
		 foreach($return as $list){
			 $emp_work=$this->get_employee_work_week_details($WEEK,$list['e_id'],$list['w_d_id']);
			 $data[$list['e_id']]=$list;
			 $data[$list['e_id']]['work']=isset($emp_work)?$emp_work:'';
			 
		 }
		 if(!empty($data)){
			 return $data;
		 }
	}
	
	public  function get_employee_work_week_details($WEEK,$e_id,$w_d_id){
		$max='"'.$WEEK.'"';
		$min=date('Y-m-d',strtotime("-7days"));
		$amtwhere='work_date BETWEEN '.'"'.$min.'"'.' AND '.$max;
		 $this->db->select('work_date,time,area_name,area_location')->from('sales_track_details');
		 $this->db->where('sales_track_details.sales_emp_id',$e_id);
		 $this->db->where($amtwhere);
		 return $this->db->get()->result_array();
	}
    
	
  }
	
	
	
