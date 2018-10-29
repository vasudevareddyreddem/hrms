<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('session');
	    if($this->session->userdata('hrmsdetails'))
			{
			$admindetails=$this->session->userdata('hrmsdetails');
			
			$this->load->view('html/header');
			$this->load->view('html/sidebar');
			$this->load->view('html/footer');


			}
	}


	public function index()
	{	
		
		if(!$this->session->userdata('hrmsdetails'))
		{	 
		
	     $this->load->view('html/login'); 
	}
  
	}
	public function loginpost()
	{
		if(!$this->session->userdata('hrmsdetails'))
		{
						
			$post=$this->input->post();
				 //echo '<pre>';print_r($post);exit;
			 $data['employee_list']=$this->User_model->employee_list_data();
			 //echo '<pre>';print_r($data);exit;
			$login_deta=array('e_email_work'=>$post['e_email_work'],'e_password'=>md5($post['e_password']));
			$check_login=$this->User_model->login_details($login_deta);
				$this->load->helper('cookie');

				if(count($check_login)>0){
				$login_details=$this->User_model->get_hrms_details($check_login['e_id']);
				//echo '<pre>';print_r($login_details);exit;
				$this->session->set_userdata('hrmsdetails',$login_details);
				redirect('employee/add');
			}else{
				$this->session->set_flashdata('error',"Invalid Email Address or Password!");
				redirect('employee/add');
			}
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('employee/add');
		}
	}
 public function forgot(){
	 if(!$this->session->userdata('hrmsdetails'))
		{	 
		 
	     $this->load->view('html/forget-password');   
	} 
		
}
public function forgotpost(){
		$post=$this->input->post();
		$check_email=$this->User_model->check_email_exits($post['email']);
		echo '<pre>';print_r($check_email);exit;
			if(count($check_email)>0){
				
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->to($check_email['a_email_id']);
				$this->email->from($contactus_details['contact_email'], $logo_details['title']); 
				$this->email->subject('Forgot Password'); 
				$body = "<b> Your Account login Password is </b> : ".$check_email['org_password'];
				$this->email->message($body);
				if ($this->email->send())
				{
					$this->session->set_flashdata('success',"Password sent to your registered email address. Please Check your registered email address");
					redirect('user');
				}else{
					$this->session->set_flashdata('error'," In Localhost mail  didn't sent");
					redirect('user');
				}
				

			}else{
				$this->session->set_flashdata('error','The email you entered is not a registered email. Please try again. ');
				redirect('user');	
			}
		
	}

 

}
?>
