<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Employee extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();	
		
		}
		
	
		
	/*  employees  */
	public function all(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
          $data['employee_list']=$this->Employees_model->employee_data_list();     
           //echo'<pre>';print_r($data);exit;
		 
		 $this->load->view('html/header',$data);
	     $this->load->view('employee/employees-list',$data);
	     $this->load->view('html/sidebar',$data);
	     $this->load->view('html/footer',$data);
	    
   }
}
public function addemployee(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/addemployee');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}




public function add(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/addemployee');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	
public function addpost(){
	 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
		//echo'<pre>';print_r($post);exit;
		
		    $details=$this->Employees_model->employee_data_list();
		$check_email_exit=$this->Employees_model->check_email_already($post['e_email_work']);
				//echo'<pre>';print_r($check_book_exit);exit;
				if(count($check_email_exit)>0){
					$this->session->set_flashdata('error',"Email already exit");
					redirect('employee/add');
				}	
				
				if($_FILES['e_document']['name']!=''){
					$catimg=$_FILES['e_document']['name'];
					move_uploaded_file($_FILES['e_document']['tmp_name'], "assets/bank_documents/" . $_FILES['e_document']['name']);

					}else{
					$catimg='';
					}
			    if($_FILES['e_profile_pic']['name']!=''){
					$cat=$_FILES['e_profile_pic']['name'];
					move_uploaded_file($_FILES['e_profile_pic']['tmp_name'], "assets/adminprofilepic/" . $_FILES['e_profile_pic']['name']);

					}else{
					$cat='';
					}
				
	          $save_data=array(
				'role_id'=>isset($post['role_id'])?$post['role_id']:'',
				'e_emplouee_id'=>isset($post['e_emplouee_id'])?$post['e_emplouee_id']:'',
				'e_join_date'=>isset($post['e_join_date'])?$post['e_join_date']:'',
				'e_f_name'=>isset($post['e_f_name'])?$post['e_f_name']:'',
				'e_l_name'=>isset($post['e_l_name'])?$post['e_l_name']:'',
				'e_login_name'=>isset($post['e_login_name'])?$post['e_login_name']:'',
				'e_email_personal'=>isset($post['e_email_personal'])?$post['e_email_personal']:'',
				'e_email_work'=>isset($post['e_email_work'])?$post['e_email_work']:'',
				'e_password'=>isset($post['e_org_password'])?md5($post['e_org_password']):'',
				'e_org_password'=>isset($post['e_org_password'])?$post['e_org_password']:'',
				'e_mobile_personal'=>isset($post['e_mobile_personal'])?$post['e_mobile_personal']:'',
				'e_mobile_work'=>isset($post['e_mobile_work'])?$post['e_mobile_work']:'',
				'e_designation'=>isset($post['e_designation'])?$post['e_designation']:'',
				'e_supervisor'=>isset($post['e_supervisor'])?$post['e_supervisor']:'',
				'e_department'=>isset($post['e_department'])?$post['e_department']:'',
				'e_sub_department'=>isset($post['e_sub_department'])?$post['e_sub_department']:'',
				'e_c_adress'=>isset($post['e_c_adress'])?$post['e_c_adress']:'',
				'e_c_city'=>isset($post['e_c_city'])?$post['e_c_city']:'',
				'e_c_district'=>isset($post['e_c_district'])?$post['e_c_district']:'',
				'e_c_state'=>isset($post['e_c_state'])?$post['e_c_state']:'',
				'e_c_country'=>isset($post['e_c_country'])?$post['e_c_country']:'',
				'e_p_address'=>isset($post['e_p_address'])?$post['e_p_address']:'',
				'e_p_city'=>isset($post['e_p_city'])?$post['e_p_city']:'',
				'e_p_district'=>isset($post['e_p_district'])?$post['e_p_district']:'',
				'e_p_state'=>isset($post['e_p_state'])?$post['e_p_state']:'',
				'e_p_country'=>isset($post['e_p_country'])?$post['e_p_country']:'',
				'e_profile_pic'=>isset($post['e_profile_pic'])?$post['e_profile_pic']:'',
				'e_document'=>isset($post['e_document'])?$post['e_document']:'',
				'e_bank_name'=>isset($post['e_bank_name'])?$post['e_bank_name']:'',
				'e_account_number'=>isset($post['e_account_number'])?$post['e_account_number']:'',
				'e_bank_h_name'=>isset($post['e_bank_h_name'])?$post['e_bank_h_name']:'',
				'e_bank_ifcs_code'=>isset($post['e_bank_ifcs_code'])?$post['e_bank_ifcs_code']:'',
				'e_c_p_name'=>isset($post['e_c_p_name'])?$post['e_c_p_name']:'',
				'e_c_p_mobile'=>isset($post['e_c_p_mobile'])?$post['e_c_p_mobile']:'',
				'e_c_p_email'=>isset($post['e_c_p_email'])?$post['e_c_p_email']:'',
				'e_c_p_relationship'=>isset($post['e_c_p_relationship'])?$post['e_c_p_relationship']:'',
				'e_c_p_address'=>isset($post['e_c_p_address'])?$post['e_c_p_address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				 );
			//echo'<pre>';print_r($save_data);exit;
		    $save=$this->Employees_model->save_employee_details($save_data);	
			//echo'<pre>';print_r($save);exit;    
		      if(count($save)>0){
					$this->session->set_flashdata('success',"Employee details are successfully added");	
					redirect('employee/add/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/add');
					}
		      }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}

}	
	
	
	
public function lists(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/employees-list');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	

   public function holidays(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/holidays');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
       /* payroll management */

public function salary(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
         $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$query = $this->db->get();
$data['data']=$query->result();
	

		 $this->load->view('html/header');
	     $this->load->view('employee/salarylist',$data);
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}
public function addsalary(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
         $this->load->library('session');
         $this->load->model('payroll_model');

      
 //$query = $this->db->get('empployee');
$data['data']=$this->payroll_model->no_sal_emp();

// print_r($data);
// exit();
            // echo $this->session->flashdata('saladded');exit;
// if($this->session->flashdata('saladded')){
 //echo $this->session->userdata('errors').'kk'; exit;

		 $this->load->view('html/header');
	     $this->load->view('employee/addsalery', $data);
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	
public function salarylist(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
$this->load->model('payroll_model');
$data['data']=$this->payroll_model->emp_det_with_salary();
	
		 $this->load->view('html/header');
	     $this->load->view('employee/salarylist',$data);
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	

   public function payslip($id){
    if(!$this->session->userdata('hrmsdetails'))
		{	

			$query = $this->db->get_where('empployee', array('e_id' => $id));
			$data['data']=$query->row();
			//echo '<pre>'; print_r($data);
			$this->load->model('payroll_model');
$data['mon']=$this->payroll_model->get_month();
$data['year']=$this->payroll_model->get_year();



//echo '<pre>'; print_r($mon);exit;
// foreach($mon['mon'] as $key=>$value){

// 	echo $value['month'];
// }
// exit;
// // 			// $query = $this->db->query('SELECT distinct(month)  FROM calendar_tab');
			// //print_r($data); exit;
			// $mon['month']=$query->result();
			
			// $query = $this->db->query('SELECT distinct(year)  FROM calendar_tab');
			// $year['year']=$query->result();
			
			//echo '<pre>';print_r($mon); exit;
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/payslip',$data);
	    $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
     /* employee management  */
public function shiftmangement(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/shift-management');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
public function attendance()
	   {	
		if($this->session->userdata('hrmsdetails'))
		{
		$admindetails=$this->session->userdata('hrmsdetails');	 
		 $this->load->view('html/header');
	     $this->load->view('employee/attendence');
	     $this->load->view('html/sidebar');
		 $this->load->view('html/footer');  
	} 
	  
   }
   public function viewattendance()
	   {	
		if($this->session->userdata('hrmsdetails'))
		{
		$admindetails=$this->session->userdata('hrmsdetails');	 
		 $this->load->view('html/header');
	     $this->load->view('employee/attendence-view');
	     $this->load->view('html/sidebar');
		 $this->load->view('html/footer');  
	} 
	  
   }
   
public function leaverequests(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/leaves');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
public function leaveslist(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/leaves-list');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}	
 /* employee comunication  */
public function chat(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/chat');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}	

public function salemantrack(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/salestrack');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');   
   }

  }
public function trackdetails(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/track-details');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');   
   }

  }

  
  
  
  
  
public function profile(){
	
	if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('html/employee-details');
	     $this->load->view('html/sidebar');
	     
	    
   }
	
	
}
public function editprofile(){
	
	if(!$this->session->userdata('hrmsdetails'))
		{	 
	    $admindetails=$this->session->userdata('hrmsdetails');
		 $this->load->view('html/header');
	     $this->load->view('html/edit-profile');
	     $this->load->view('html/sidebar');  
   }
	
}
	// employee delete

	public function emp_delete($eid){

   $this->load->model('Employees_model');
   $this->Employees_model->emp_delete($eid);

   redirect('employee/salarylist');

    	
    }
    

	
	
	
}	
	
?>	
	




