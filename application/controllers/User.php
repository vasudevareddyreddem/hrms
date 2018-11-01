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

	public function loginpost(){
		$post=$this->input->post();
		$logindetails = $this->User_model->login_details($post['e_email_work'],md5($post['e_password']));
		//echo'<pre>';print_r($logindetails);exit;
		if(count($logindetails)>0){
			$checklogin= $this->User_model->check_today_login($logindetails['e_id'],date('Y-m-d'));
					//echo'<pre>';print_r($checklogin);exit;
				$this->session->set_userdata('hrmsdetails',$logindetails);
				$logintime= "Y-m-d H:i:s";
				$login_data=array(
				'e_id'=>$logindetails['e_id'],
				'e_login_time'=>$logintime,
				'l_date'=>date('Y-m-d'),
				);
			//echo'<pre>';print_r($login_data);exit;
			if(count($checklogin)==0){
				$logindatasave = $this->User_model->save_login_time_status($login_data);
				//echo'<pre>';print_r($logindatasave);exit;
				if(count($logindatasave)>0){
					redirect('dashboard');	
				}else{
					$this->session->set_flashdata('loginerror',"Technical problem will occured. Please try again.");
					redirect('');
				}
			}else{
				redirect('dashboard');
			}
					
		}else{
			$this->session->set_flashdata('loginerror',"Invalid Email Address or Password!");
			redirect('');
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
		$check_email=$this->User_model->check_email_exits($post['email_id']);
			if(count($check_email)>0){
				
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->to($check_email['e_email_work']);
				$this->email->from('admin@hrms.com', 'Hrms'); 
				$this->email->subject('Forgot Password'); 
				$body = "<b> Your Account login Password is </b> : ".$check_email['e_org_password'];
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
