<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Sales extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Sales_model');
		
		
	}
	
	public function index(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
		$data['sales_list']=$this->Sales_model->get_sales_details_list();
			//echo'<pre>';print_r($data);exit;
	  
			$this->load->view('sales/salestrack',$data);
			$this->load->view('html/footer');  
        }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
	}
	
	public function trackdetails(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();
		 $emp_id=base64_decode($this->uri->segment(3));
		 
		
		 if(isset($post['work_date']) && $post['work_date']!=''){
				$dat=explode('/',$post['work_date']);
				$current_date=$dat[2].'-'.$dat[1].'-'.$dat[0];
				$previous_date=$dat[2].'-'.$dat[1].'-'.($dat[0]-1);
				$data['today_date']=$current_date;
				$data['prevoiu_date']=$previous_date;
				$data['prevoius_date']=$this->Sales_model->get_employee_previous_date_location_details($emp_id,$previous_date);
				$data['current_date']=$this->Sales_model->get_employee_current_date_location_details($emp_id,$current_date);
				$data['sale_man_details']=$this->Sales_model->get_sales_man_details_with_date($emp_id,$current_date);
				$current_work_location=$this->Sales_model->get_work_location_name($emp_id,$current_date);
				 $previous_work_location=$this->Sales_model->get_work_location_name($emp_id,$previous_date);
				 
				 if(isset($previous_work_location) && count($previous_work_location)>0){
					 foreach($previous_work_location as $lis){
						 $p_locations[]=$lis['area'];
					}
				  $data['previous_work_location']=implode( ',', $p_locations );
				 }else{
					 $data['previous_work_location']=''; 
				 }
				 if(isset($current_work_location) && count($current_work_location)>0){
					 foreach($current_work_location as $lis){
						 $c_locations[]=$lis['area'];
					}
				  $data['current_work_location']=implode( ',', $c_locations );
				 }else{
					 $data['current_work_location']=''; 
				 }
				 
		 }else{
				 $data['today_date']=date('Y-m-d');
				 $data['prevoiu_date']=date('Y-m-d', strtotime(' -1 day'));
				 
				 $data['prevoius_date']=$this->Sales_model->get_employee_previous_date_location_details($emp_id,date('Y-m-d', strtotime(' -1 day')));
				 $data['current_date']=$this->Sales_model->get_employee_current_date_location_details($emp_id,date('Y-m-d'));
				 $data['sale_man_details']=$this->Sales_model->get_sales_man_details_with_date($emp_id,date('Y-m-d'));
				  $current_work_location=$this->Sales_model->get_work_location_name($emp_id,date('Y-m-d'));
				 $previous_work_location=$this->Sales_model->get_work_location_name($emp_id,date('Y-m-d', strtotime(' -1 day')));
				 if(isset($previous_work_location) && count($previous_work_location)>0){
					 foreach($previous_work_location as $lis){
						 $p_locations[]=$lis['area'];
					}
				  $data['previous_work_location']=implode( ',', $p_locations );
				 }else{
					 $data['previous_work_location']=''; 
				 }
				 if(isset($current_work_location) && count($current_work_location)>0){
					 foreach($current_work_location as $lis){
						 $c_locations[]=$lis['area'];
					}
				  $data['current_work_location']=implode( ',', $c_locations );
				 }else{
					 $data['current_work_location']=''; 
				 }
				 
			}
		// echo'<pre>';print_r($data);exit;
	     $this->load->view('sales/track-details',$data);
	     $this->load->view('html/footer');   
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }

  }
		
    public function form(){
	 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	    $post=$this->input->post();
		 
	      $save_data=array(
		  'date'=>isset($post['date'])?$post['date']:''
	       );
	        //echo'<pre>';print_r($save_data);exit;
		
			
			
			
		    redirect('sales/trackdetails');
			
	     }else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');  
	   }
     }

	
	
}	
	
?>	
	



