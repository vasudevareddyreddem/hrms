<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Work extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Work_model');
		
		
	}
	
	public function lists(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	  
			$admindetails=$this->session->userdata('hrmsdetails');	
			$data['work_list']=$this->Work_model->get_employee_daily_work($admindetails['e_id']);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('work/work_list',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	public function status(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
			$w_d_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			if($w_d_id!=''){
				$stusdetails=array(
					'work_status'=>$status,
					'updated_at'=>date('Y-m-d H:i:s'),
					//'accepted_by'=>$admindetails['e_id']
					);
					//echo'<pre>';print_r($stusdetails);exit;
					$statusdata=$this->Work_model->update_work_status_details($w_d_id,$stusdetails);
					//echo'<pre>';print_r($statusdata);exit;
					//echo $this->db->last_query();exit;	
					if(count($statusdata)>0){
							$this->session->set_flashdata('success',"Work status successfully updated");
						
							redirect('work/lists');
					}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('work/lists');
					}
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('dashboard');
			}
		                 
     	}else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
	}
	public function ticketrise(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	  
			$admindetails=$this->session->userdata('hrmsdetails');
			$work_id=base64_decode($this->uri->segment(3));
			$data['ticket_details']=$this->Work_model->get_ticket_details($work_id);
			$data['ticket_rise_details']=$this->Work_model->get_ticket_rise_details_list($work_id);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('work/ticket_rise',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	public function ticketpost(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
			$admindetails=$this->session->userdata('hrmsdetails');
			$post=$this->input->post();
			$add=array(
			'w_d_id'=>isset($post['w_d_id'])?$post['w_d_id']:'',
			'message'=>isset($post['message'])?$post['message']:'',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$admindetails['e_id']
			);
			$save=$this->Work_model->save_work_ticket_rise($add);
			if(count($save)>0){
				$ticket_details=$this->Work_model->get_ticket_details($post['w_d_id']);
				/*notification*/
					$notify=array(
						'sender_id'=>isset($admindetails['e_id'])?$admindetails['e_id']:'',
						'reciver_id'=>isset($ticket_details['created_by'])?$ticket_details['created_by']:'',
						'message'=>isset($post['message'])?$post['message']:'',
						'created_by'=>$admindetails['e_id']
						);
					$this->Notification_model->save_notification($notify);
				/*notification*/
				$this->session->set_flashdata('success',"Work ticket successfully updated");
				redirect('work/ticketrise/'.base64_encode($post['w_d_id']));
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('work/ticketrise/'.base64_encode($post['w_d_id']));
			}
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	public function index(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	  
			$data['leave_list']=$this->Leaves_model->get_all_employees_current_month_leaves_list(date('m'));
			//echo '<pre>';print_r($data);exit;
			$this->load->view('leaves/all_list',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	
	
	

  }
	
	
?>	
	



