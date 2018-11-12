<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class employeeprofile extends In_frontend
{

 	  public function __construct() 
  {
    parent::__construct();  
    $this->load->model('User_model');

    
    }
 public function profile(){

if($this->session->userdata('hrmsdetails'))
		{	
			$id=base64_decode($this->uri->segment(3));
         	
		$data['userdetails']=$this->User_model->get_all_admin_details($id);
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/employee-profile',$data);
	     $this->load->view('html/footer');
	     
  }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('');
		} 

 }


}