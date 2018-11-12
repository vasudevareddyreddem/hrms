<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Notifications extends In_frontend {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Notification_model');
	}
	
    public function get_notification_msg()
	{
		if($this->session->userdata('hrmsdetails'))
		{
				$admindetails=$this->session->userdata('hrmsdetails');
				$post=$this->input->post();
				$update=array('read_count'=>0);
				$details=$this->Notification_model->get_notifications_leaves($post['notification_id']);
				$this->Notification_model->get_notifications_leaves_read($post['notification_id'],$update);
				
				if($admindetails['role_id']==2){
					$unread_count=$this->Notification_model->get_notitifation_unread_count(''); 

				}else{
					$unread_count=$this->Notification_model->get_notitifation_unread_count($admindetails['e_id']); 
				}

				$data['names_list']=$details['leave_type'];
				$data['time']=$details['created_at'];
				$data['unread_counts']=$unread_count['cnt'];
				
				echo json_encode($data);exit;	
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
		}
	}
      public  function viewall(){
		if($this->session->userdata('hrmsdetails'))
				{
					$details=$this->session->userdata('hrmsdetails');
					$data['notification_view']=$this->Notification_model->get_all_notifications_leaves_list_details(); 
					$unread_list=$this->Notification_model->get_all_unread_notifications_list(); 
					if(count($unread_list)>0){
						foreach($unread_list as $list){
							$update=array('read_count'=>0);
							$this->Notification_model->get_notifications_leaves_read($list['l_id'],$update);
						}
					}
					//echo'<pre>';print_r($data);exit;
					$this->load->view('notifications/notifications_viewall',$data);
					$this->load->view('html/footer');
				 }else{
					$this->session->set_flashdata('error',"Please login and continue");
					redirect('');  
				}
		}
	
public function delete()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$l_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Notification_model->delete_notifications_details($l_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success',"notifications successfully deleted.");
								
								 redirect('notifications/viewall');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('notifications/viewall');
							}
					
					
			    }else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
	
	
	
	
}
