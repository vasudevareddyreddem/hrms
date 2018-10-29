<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hrmsmanagement_model');
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
 public function forgot(){
	 if(!$this->session->userdata('hrmsdetails'))
		{	 
		 
	     $this->load->view('html/forget-password');   
	} 
		
}
public function forgotpost(){
		$post=$this->input->post();
		$check_email=$this->Admin_model->check_email_exits($post['email']);
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
