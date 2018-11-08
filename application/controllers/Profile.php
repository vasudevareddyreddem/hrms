<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Profile extends In_frontend {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		
	}
	public function index()
	{
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		$data['userdetails']=$this->User_model->get_all_admin_details($admindetails['e_id']);
		 //echo'<pre>';print_r($data);exit;
		  $employee_leaves_list=$this->Employees_model->get_all_employee_leaves_list_details(); 
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('html/employee-details',$data);
	     $this->load->view('html/footer');
	     
   }

		
 }
  	
public function edit(){
	
	if($this->session->userdata('hrmsdetails'))
		{	 
	    $admindetails=$this->session->userdata('hrmsdetails');
		$data['userdetails']=$this->User_model->get_all_admin_details($admindetails['e_id']);
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('html/edit-profile',$data);
	     $this->load->view('html/footer');  
   }
	
}	
	public function editpost(){
		if($this->session->userdata('hrmsdetails'))
		{
		$admindetails=$this->session->userdata('hrmsdetails');
		$post=$this->input->post();
		//echo'<pre>';print_r($post);exit;
		$userdetails=$this->User_model->get_all_admin_details($admindetails['e_id']);
			if($userdetails['e_email_work']!=$post['e_email_work']){
				$check_email=$this->User_model->check_profile_email_exits($post['e_email_work']);
				//echo'<pre>';print_r($check_email);exit;
				if(count($check_email)>0){
					$this->session->set_flashdata('error',"Email address already exit");
					redirect('profile/edit');
				}
			}
		     if($_FILES['e_profile_pic']['name']!=''){
					$cat=$_FILES['e_profile_pic']['name'];
					move_uploaded_file($_FILES['e_profile_pic']['tmp_name'], "assets/adminprofilepic/" . $_FILES['e_profile_pic']['name']);

					}else{
					$cat=$userdetails['e_profile_pic'];
					}
		
		
		           $updatedetails=array(
					'e_f_name'=>isset($post['e_f_name'])?$post['e_f_name']:'',
					'e_l_name'=>isset($post['e_l_name'])?$post['e_l_name']:'',
					'e_email_work'=>isset($post['e_email_work'])?$post['e_email_work']:'',
					'e_login_name'=>isset($post['e_login_name'])?$post['e_login_name']:'',
					'e_mobile_personal'=>isset($post['e_mobile_personal'])?$post['e_mobile_personal']:'',
					'e_c_adress'=>isset($post['e_c_adress'])?$post['e_c_adress']:'',
					'e_c_city'=>isset($post['e_c_city'])?$post['e_c_city']:'',
					'e_c_district'=>isset($post['e_c_district'])?$post['e_c_district']:'',
					'e_c_state'=>isset($post['e_c_state'])?$post['e_c_state']:'',
					'e_bank_name'=>isset($post['e_bank_name'])?$post['e_bank_name']:'',
					'e_account_number'=>isset($post['e_account_number'])?$post['e_account_number']:'',
					'e_bank_h_name'=>isset($post['e_bank_h_name'])?$post['e_bank_h_name']:'',
					'e_bank_ifcs_code'=>isset($post['e_bank_ifcs_code'])?$post['e_bank_ifcs_code']:'',
					'e_c_p_name'=>isset($post['e_c_p_name'])?$post['e_c_p_name']:'',
					'e_c_p_mobile'=>isset($post['e_c_p_mobile'])?$post['e_c_p_mobile']:'',
					'e_c_p_email'=>isset($post['e_c_p_email'])?$post['e_c_p_email']:'',
					'e_c_p_relationship'=>isset($post['e_c_p_relationship'])?$post['e_c_p_relationship']:'',
					'e_c_p_address'=>isset($post['e_c_p_address'])?$post['e_c_p_address']:'',
					'e_profile_pic'=>$cat,
					);
		        $profile_update=$this->User_model->update_profile_details($admindetails['e_id'],$updatedetails);
				//echo'<pre>';print_r($profile_update);exit;
			if(count($profile_update)>0){
				$this->session->set_flashdata('success','Profile details successfully updated');
				redirect('profile');
				
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('profile/edit');
			}
		       
		    }else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('');
		}
	
}	
	
	public function logout(){
		if($this->session->userdata('hrmsdetails'))
		{
			$hrmsdetails=$this->session->userdata('hrmsdetails');
			$checklogin= $this->User_model->check_today_login($hrmsdetails['e_id'],date('Y-m-d'));
			$this->User_model->update_logout_time_status($checklogin['l_id'],$checklogin['e_id'],date('Y-m-d H:i:s'));
			$this->session->unset_userdata($hrmsdetails);
			$this->session->unset_userdata('hrmsdetails');
			$this->session->sess_destroy('hrmsdetails');
			$this->session->unset_userdata('hrmsdetails');
			redirect('');
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('');
		} 
	}
	
	

	
	
}
