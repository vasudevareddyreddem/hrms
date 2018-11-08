<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Notifications extends In_frontend {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Notification_model');
		$this->load->view('html/header');
		$this->load->view('html/sidebar');

	}
	
    public function get_notification_msg()
	{
		if($this->session->userdata('hrmsdetails'))
		{
				$admindetails=$this->session->userdata('hrmsdetails');
				$employee_leaves_list=$this->Employees_model->get_all_employee_leaves_list_details(); 
                      //echo'<pre>';print_r($employee_leaves_list);exit;
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
				$details=$this->Notification_model->get_notifications_leaves($post['notification_id']);
				//echo'<pre>';print_r($details);exit;
				$this->Notification_model->get_notifications_leaves_read($post['notification_id']);
				$school_details=$this->Notification_model->get_all_admin_details($admindetails['e_id']);
					//echo'<pre>';print_r($school_details);exit;
				
				$data['names_list']=$details['leave_type'];
				$data['time']=$details['created_at'];
				
				echo json_encode($data);exit;	
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
      public  function viewall(){
		if($this->session->userdata('hrmsdetails'))
				{
					$details=$this->session->userdata('hrmsdetails');
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('notifications/notifications_viewall');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('home');
				}
	}
	

	
	
	
}
