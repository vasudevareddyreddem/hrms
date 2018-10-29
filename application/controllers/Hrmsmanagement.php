<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hrmsmanagement extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hrmsmanagement_model');
		$this->load->library('session');
	    if($this->session->userdata('hrmsdetails'))
			{
			$admindetails=$this->session->userdata('hrmsdetails');
			$data['userdetails']=$this->Hrmsmanagement_model->get_all_hrms_resource_details($admindetails['e_id']);
			//echo'<pre>';print_r($data);exit;
			$this->load->view('html/header',$data);
			$this->load->view('html/sidebar',$data);
			$this->load->view('html/footer',$data);


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
			 $data['employee_list']=$this->Hrmsmanagement_model->employee_list_data();
			 //echo '<pre>';print_r($data);exit;
			$login_deta=array('e_email_work'=>$post['e_email_work'],'e_password'=>md5($post['e_password']));
			$check_login=$this->Hrmsmanagement_model->login_details($login_deta);
				$this->load->helper('cookie');

				if(count($check_login)>0){
				$login_details=$this->Hrmsmanagement_model->get_hrms_details($check_login['e_id']);
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

 

}
?>
