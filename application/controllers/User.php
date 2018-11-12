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
	     }else{
			$this->session->set_flashdata('loginerror',"Invalid Email Address or Password!");
			redirect('');
		}
	}

	public function loginpost(){
		
			
		$post=$this->input->post();
		$logindetails = $this->User_model->login_details($post['e_email_work'],md5($post['e_password']));
		//echo'<pre>';print_r($logindetails);
		if(count($logindetails)>0){
			$update_data=array('login_status'=>1);
			$upadte=$this->User_model->update_sataus_details_log($logindetails['e_id'],$update_data);
			$checklogin= $this->User_model->check_today_login($logindetails['e_id'],date('Y-m-d'));
			//echo'<pre>';print_r($checklogin);
				$login_data=array(
				'e_id'=>$logindetails['e_id'],
				'e_login_time'=>date("Y-m-d H:i:s"),
				'l_date'=>date('Y-m-d'),
				);
			//echo'<pre>';print_r($login_data);exit;
			$this->session->set_userdata('hrmsdetails',$logindetails);

			if(count($checklogin)==0){
					$this->User_model->save_login_time_status($login_data);
					redirect('dashboard');
				
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
	      }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
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
