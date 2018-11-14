<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Dashboard extends In_frontend {

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
			$data['details']=$this->Employees_model->get_adminbasic_details($admindetails['e_id']);
			$data['total_employee']=$this->Dashboard_model->get_total_employee_count(); 
			    //echo'<pre>';print_r($data);exit;
			  
			  
				$this->load->view('employee/dashboard',$data);
	            $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	public function changepassword()
	{
		if($this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
				$this->load->view('html/changepassword');
				$this->load->view('html/footer');
			
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('');
		}
	}
	public function changepasswordpost(){
	 
		if($this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
			$post=$this->input->post();
			 //echo'<pre>';print_r($post);exit;
			$admin_details = $this->User_model->get_adminpassword_details($admindetails['e_id']);
			//echo'<pre>';print_r($post);exit;
			if($admin_details['e_password']== md5($post['oldpassword'])){
				if(md5($post['password'])==md5($post['confirmpassword'])){
						$updateuserdata=array(
						'e_password'=>md5($post['confirmpassword']),
						'e_org_password'=>$post['confirmpassword'],
						'updated_at'=>date('Y-m-d H:i:s'),
						);
						//echo '<pre>';print_r($updateuserdata);exit;
						$upddateuser = $this->User_model->update_admin_details($admindetails['e_id'],$updateuserdata);
						//echo '<pre>';print_r($upddateuser);exit;
						if(count($upddateuser)>0){
							$this->session->set_flashdata('success',"password successfully updated");
							redirect('dashboard/changepassword');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('dashboard/changepassword');
						}
					
				}else{
					$this->session->set_flashdata('error',"Password & Confirm password didn't match");
					redirect('dashboard/changepassword');
				}
				
			}else{
				$this->session->set_flashdata('error',"Password & Confirm password didn't match");
				redirect('dashboard/changepassword');
			}
				
			
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		} 
	 
	}
	
	
	
	
	public function logout(){
		if($this->session->userdata('hrmsdetails'))
		{
			$hrmsdetails=$this->session->userdata('hrmsdetails');
			$checklogin= $this->User_model->check_today_login($hrmsdetails['e_id'],date('Y-m-d'));
			$this->User_model->update_logout_time_status($checklogin['l_id'],$checklogin['e_id'],date('Y-m-d H:i:s'));
			//echo'<pre>';print_r($login);exit;
			$update_data=array('login_status'=>0);
			$upadte=$this->User_model->update_sataus_details_log($hrmsdetails['e_id'],$update_data);
              //echo'<pre>';print_r($log);exit;
				
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
