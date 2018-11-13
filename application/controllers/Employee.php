<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Employee extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();	
		
		}
		
	
		
	/*  employees  */
public function all(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
          $data['employee_list']=$this->Employees_model->employee_data_list();     
           //echo'<pre>';print_r($data);exit;
		 
	     $this->load->view('employee/employees-list',$data);
	      $this->load->view('html/footer');
	    
         }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}
public function addemployee(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	     $this->load->view('employee/addemployee');
	     $this->load->view('html/footer');
	    
       }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}
public function editemployee(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	     $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->uri->segment(3);
		 $emp_id=base64_decode($this->uri->segment(3));
		
		 $data['edit_employee']=$this->Employees_model->edit_employee_details($emp_id);
		 
		 
		 
		 $data['deparment_data']=$this->Employees_model->department_name_list();
		 $data['sub_deparment_data']=$this->Employees_model->sub_department_name_list();
		 $data['shift_data']=$this->Employees_model->shift_name_list();
		 $data['roles_list']=$this->Employees_model->roles_list();
		 $data['spuervisors']=$this->Employees_model->get_all_spuervisors();
		 //echo'<pre>';print_r($data);exit;
		 
	     $this->load->view('employee/edit-employee',$data);
	      $this->load->view('html/footer');
	    
         }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}



public function editemployeepost(){
	if($this->session->userdata('hrmsdetails'))
		{
	    $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
			$edit_employee=$this->Employees_model->edit_employee_details($post['e_id']);
			//echo'<pre>';print_r($edit_employee);
			if($edit_employee['e_email_work']!=$post['e_email_work']){
			$check=$this->Employees_model->saver_user_details($post['e_email_work']);
			//echo'<pre>';print_r($check);exit;
			if(count($check)>0){
				     $this->session->set_flashdata('error',"Email address already exists. Please another email address.");
					 redirect('employee/all');
			      }	
			}
		
				if($_FILES['e_document']['name']!=''){
					$catimg=$_FILES['e_document']['name'];
					if($edit_employee['e_document']!=''){
						unlink('assets/bank_documents/'.$edit_employee['e_document']);
					}
					move_uploaded_file($_FILES['e_document']['tmp_name'], "assets/bank_documents/" . $_FILES['e_document']['name']);

					}else{
					$catimg=$edit_employee['e_document'];	
					
					}
			    if($_FILES['e_profile_pic']['name']!=''){
					if($edit_employee['e_profile_pic']!=''){
						unlink('assets/adminprofilepic/'.$edit_employee['e_profile_pic']);
					}
					$cat=$_FILES['e_profile_pic']['name'];
					move_uploaded_file($_FILES['e_profile_pic']['tmp_name'], "assets/adminprofilepic/" . $_FILES['e_profile_pic']['name']);

					}else{
					$cat=$edit_employee['e_profile_pic'];
					}
		if(isset($post['e_designation']) && $post['e_designation']==8){
			$e_supervisor='';
		}else{
			$e_supervisor=$post['e_supervisor'];
		}
		if(isset($post['filltoo']) && $post['filltoo']==''){
			$filltoo=1;
		}else{
			$filltoo='';
		}
		
	     $update_data=array(
		        'role_id'=>isset($post['e_designation'])?$post['e_designation']:'',
				'e_emplouee_id'=>isset($post['e_emplouee_id'])?$post['e_emplouee_id']:'',
				'e_join_date'=>isset($post['e_join_date'])?$post['e_join_date']:'',
				'e_f_name'=>isset($post['e_f_name'])?$post['e_f_name']:'',
				'e_l_name'=>isset($post['e_l_name'])?$post['e_l_name']:'',
				'e_login_name'=>isset($post['e_login_name'])?$post['e_login_name']:'',
				'e_email_personal'=>isset($post['e_email_personal'])?$post['e_email_personal']:'',
				'e_email_work'=>isset($post['e_email_work'])?$post['e_email_work']:'',
				'e_mobile_personal'=>isset($post['e_mobile_personal'])?$post['e_mobile_personal']:'',
				'e_mobile_work'=>isset($post['e_mobile_work'])?$post['e_mobile_work']:'',
				'e_designation'=>isset($post['e_designation'])?$post['e_designation']:'',
				'e_supervisor'=>isset($e_supervisor)?$e_supervisor:'',
				'e_department'=>isset($post['e_department'])?$post['e_department']:'',
				'e_sub_department'=>isset($post['e_sub_department'])?$post['e_sub_department']:'',
				'e_shift'=>isset($post['e_shift'])?$post['e_shift']:'',
				'filltoo'=>isset($filltoo)?$filltoo:'',
				'e_c_adress'=>isset($post['e_c_adress'])?$post['e_c_adress']:'',
				'e_c_city'=>isset($post['e_c_city'])?$post['e_c_city']:'',
				'e_c_district'=>isset($post['e_c_district'])?$post['e_c_district']:'',
				'e_c_state'=>isset($post['e_c_state'])?$post['e_c_state']:'',
				'e_c_country'=>isset($post['e_c_country'])?$post['e_c_country']:'',
				'e_p_address'=>isset($post['e_p_address'])?$post['e_p_address']:'',
				'e_p_city'=>isset($post['e_p_city'])?$post['e_p_city']:'',
				'e_p_district'=>isset($post['e_p_district'])?$post['e_p_district']:'',
				'e_p_state'=>isset($post['e_p_state'])?$post['e_p_state']:'',
				'e_p_country'=>isset($post['e_p_country'])?$post['e_p_country']:'',
				'e_profile_pic'=>$cat,
				'e_document'=>$catimg,
				'e_bank_name'=>isset($post['e_bank_name'])?$post['e_bank_name']:'',
				'e_account_number'=>isset($post['e_account_number'])?$post['e_account_number']:'',
				'e_bank_h_name'=>isset($post['e_bank_h_name'])?$post['e_bank_h_name']:'',
				'e_bank_ifcs_code'=>isset($post['e_bank_ifcs_code'])?$post['e_bank_ifcs_code']:'',
				'e_c_p_name'=>isset($post['e_c_p_name'])?$post['e_c_p_name']:'',
				'e_c_p_mobile'=>isset($post['e_c_p_mobile'])?$post['e_c_p_mobile']:'',
				'e_c_p_email'=>isset($post['e_c_p_email'])?$post['e_c_p_email']:'',
				'e_c_p_relationship'=>isset($post['e_c_p_relationship'])?$post['e_c_p_relationship']:'',
				'e_c_p_address'=>isset($post['e_c_p_address'])?$post['e_c_p_address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
				$update=$this->Employees_model->update_employee_details($post['e_id'],$update_data);
				if(count($update)>0){
							$this->session->set_flashdata('success','Employee details successfully updated');
							redirect('employee/all');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('employee/all');
						}
				  
		        }else{
						 $this->session->set_flashdata('error',"Please login and continue");
						redirect('');
			     	}
	
}

public function status(){
	 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $e_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($e_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_employee_details($e_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Employee details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Employee details successfully Activate.");
								}
								redirect('employee/all');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/all');
							}
						}
						else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}	
	
	
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

			
					$e_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_employee_details($e_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success',"Employee details successfully deleted.");
								
								 redirect('employee/all/');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/all/');
							}
					
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
		
	}
	public function viewemployee(){
		if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['edit_employee']=$this->Employees_model->edit_employee_details(base64_decode($this->uri->segment(3)));
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/employee-details',$data);
	     $this->load->view('html/footer');
	    
         }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}
		
		
	





public function add(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['deparment_data']=$this->Employees_model->department_name_list();
		 $data['sub_deparment_data']=$this->Employees_model->sub_department_name_list();
		 $data['shift_data']=$this->Employees_model->shift_name_list();
		 $data['roles_list']=$this->Employees_model->roles_list();
		 $data['spuervisors']=$this->Employees_model->get_all_spuervisors();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/addemployee',$data);
	     $this->load->view('html/footer');
	    
         }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	
public function department_wise_list(){
if($this->session->userdata('hrmsdetails'))
		{
         $admindetails=$this->session->userdata('hrmsdetails');	
					$post=$this->input->post();
					$subdepartment_list=$this->Employees_model->department_wise_list($post['e_department']);
					if(count($subdepartment_list)>0){
						$data['msg']=1;
						$data['list']=$subdepartment_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
				
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('');
		}
	}

public function addpost(){
	 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
		$details=$this->Employees_model->employee_data_list();
		$check_email_exit=$this->Employees_model->check_email_already($post['e_email_work']);
				//echo'<pre>';print_r($check_book_exit);exit;
				if(count($check_email_exit)>0){
					$this->session->set_flashdata('error',"Email address already exists. Please another email address.");
					redirect('employee/add');
				}	
				
				if($_FILES['e_document']['name']!=''){
					$catimg=$_FILES['e_document']['name'];
					move_uploaded_file($_FILES['e_document']['tmp_name'], "assets/bank_documents/" . $_FILES['e_document']['name']);

					}else{
					$catimg='';
					}
			    if($_FILES['e_profile_pic']['name']!=''){
					$cat=$_FILES['e_profile_pic']['name'];
					move_uploaded_file($_FILES['e_profile_pic']['tmp_name'], "assets/adminprofilepic/" . $_FILES['e_profile_pic']['name']);

					}else{
					$cat='';
					}
					if(isset($post['filltoo']) && $post['filltoo']==''){
						$filltoo=1;
					}else{
						$filltoo='';
					}
				
	          $save_data=array(
			 'role_id'=>isset($post['e_designation'])?$post['e_designation']:'',
				'e_emplouee_id'=>isset($post['e_emplouee_id'])?$post['e_emplouee_id']:'',
				'e_join_date'=>isset($post['e_join_date'])?$post['e_join_date']:'',
				'e_f_name'=>isset($post['e_f_name'])?$post['e_f_name']:'',
				'e_l_name'=>isset($post['e_l_name'])?$post['e_l_name']:'',
				'e_login_name'=>isset($post['e_login_name'])?$post['e_login_name']:'',
				'e_email_personal'=>isset($post['e_email_personal'])?$post['e_email_personal']:'',
				'e_email_work'=>isset($post['e_email_work'])?$post['e_email_work']:'',
				'e_password'=>isset($post['e_org_password'])?md5($post['e_org_password']):'',
				'e_org_password'=>isset($post['e_org_password'])?$post['e_org_password']:'',
				'e_mobile_personal'=>isset($post['e_mobile_personal'])?$post['e_mobile_personal']:'',
				'e_mobile_work'=>isset($post['e_mobile_work'])?$post['e_mobile_work']:'',
				'e_designation'=>isset($post['e_designation'])?$post['e_designation']:'',
				'e_supervisor'=>isset($post['e_supervisor'])?$post['e_supervisor']:'',
				'e_department'=>isset($post['e_department'])?$post['e_department']:'',
				'e_sub_department'=>isset($post['e_sub_department'])?$post['e_sub_department']:'',
				'e_shift'=>isset($post['e_shift'])?$post['e_shift']:'',
				'filltoo'=>isset($filltoo)?$filltoo:'',
				'e_c_adress'=>isset($post['e_c_adress'])?$post['e_c_adress']:'',
				'e_c_city'=>isset($post['e_c_city'])?$post['e_c_city']:'',
				'e_c_district'=>isset($post['e_c_district'])?$post['e_c_district']:'',
				'e_c_state'=>isset($post['e_c_state'])?$post['e_c_state']:'',
				'e_c_country'=>isset($post['e_c_country'])?$post['e_c_country']:'',
				'e_p_address'=>isset($post['e_p_address'])?$post['e_p_address']:'',
				'e_p_city'=>isset($post['e_p_city'])?$post['e_p_city']:'',
				'e_p_district'=>isset($post['e_p_district'])?$post['e_p_district']:'',
				'e_p_state'=>isset($post['e_p_state'])?$post['e_p_state']:'',
				'e_p_country'=>isset($post['e_p_country'])?$post['e_p_country']:'',
				'e_profile_pic'=>$cat,
				'e_document'=>$catimg,
				'e_bank_name'=>isset($post['e_bank_name'])?$post['e_bank_name']:'',
				'e_account_number'=>isset($post['e_account_number'])?$post['e_account_number']:'',
				'e_bank_h_name'=>isset($post['e_bank_h_name'])?$post['e_bank_h_name']:'',
				'e_bank_ifcs_code'=>isset($post['e_bank_ifcs_code'])?$post['e_bank_ifcs_code']:'',
				'e_c_p_name'=>isset($post['e_c_p_name'])?$post['e_c_p_name']:'',
				'e_c_p_mobile'=>isset($post['e_c_p_mobile'])?$post['e_c_p_mobile']:'',
				'e_c_p_email'=>isset($post['e_c_p_email'])?$post['e_c_p_email']:'',
				'e_c_p_relationship'=>isset($post['e_c_p_relationship'])?$post['e_c_p_relationship']:'',
				'e_c_p_address'=>isset($post['e_c_p_address'])?$post['e_c_p_address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
			//echo'<pre>';print_r($save_data);exit;
		    $save=$this->Employees_model->save_employee_details($save_data);	
			//echo'<pre>';print_r($save);exit;    
		      if(count($save)>0){
					$this->session->set_flashdata('success',"Employee details successfully added");	
					redirect('employee/all');	
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('employee/all');
					}
		         }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}

}	
	
	
	
public function lists(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	     $this->load->view('employee/employees-list');
	     $this->load->view('html/footer');
	     }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	
public function addholiday(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	     $this->load->view('employee/addholidays');
	     $this->load->view('html/footer');  
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}		
public function addholidaypost(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
		 $date = DateTime::createFromFormat('d/m/Y', $post['holiday_date']); // \DateTime object
		  //echo'<pre>';print_r($post['holiday_date']);exit;
           $d=$date->format('Y-m-d');
           //echo $d;exit;
 
		 $save_data=array(
				'holiday_name'=>isset($post['holiday_name'])?$post['holiday_name']:'',
				
				'holiday_date'=>$d?$d:'',
				'holiday_day'=>isset($post['holiday_day'])?$post['holiday_day']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
		       $save=$this->Employees_model->save_holidays_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Holiday added successfully");	
					redirect('employee/holidays');	
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('employee/holidays');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		 
	
}		
   public function holidays(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['holiday_list']=$this->Employees_model->holidays_days_list();	
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/holidays',$data);
	    $this->load->view('html/footer');  
       }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}		
  public function editholidays(){
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
	  $this->uri->segment(3);
		 $data['edit_holiday']=$this->Employees_model->edit_holidays_details(base64_decode($this->uri->segment(3)));
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/editholidays',$data);
	     $this->load->view('html/footer');
         }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }	
	public function editholidaypost(){
		 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $post=$this->input->post();
		 //echo'<pre>';print_r($post);exit;
		       $update_data=array(
				'holiday_name'=>isset($post['holiday_name'])?$post['holiday_name']:'',
				'holiday_date'=>isset($post['holiday_date'])?$post['holiday_date']:'',
				'holiday_day'=>isset($post['holiday_day'])?$post['holiday_day']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				);
				 $update=$this->Employees_model->update_holidays_details($post['h_id'],$update_data);	
				 //echo'<pre>';print_r($update);exit;
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Holiday edited successfully");	
					redirect('employee/holidays');	
					  }else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('employee/holidays');
					  }
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	}
public function statusholidays()
{
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $h_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($h_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_holidays_details($h_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Holiday deactivate successfully.");
								}else{
									$this->session->set_flashdata('success',"Holiday activate successfully .");
								}
								redirect('employee/holidays');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/holidays');
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
public function deleteholidays()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$h_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_holidays_details($h_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success'," Holiday deleted successfully.");
								
								 redirect('employee/holidays');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/holidays');
							}
					
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
public function viewholidays(){
		if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->uri->segment(3);
		 $data['view_holidays']=$this->Employees_model->view_holidays_details(base64_decode($this->uri->segment(3)));
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/view-holidays',$data);
	      $this->load->view('html/footer');
	    
          }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}


       /* payroll management */

public function salary(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
         $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$query = $this->db->get();
$data['data']=$query->result();
	

	     $this->load->view('employee/salarylist',$data);
	     $this->load->view('html/footer');
	    
   }
}
public function addsalary(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
         $this->load->library('session');
         $this->load->model('payroll_model');

$data['salary_type']=$this->payroll_model->salary_type();
//print_r($data);exit;

      
 //$query = $this->db->get('empployee');
$cnt=$this->payroll_model->no_sal_emp();
if(count($cnt)>0){
	$data['data']=$this->payroll_model->no_sal_emp();




$data['flag']=1;

}else{
	$data['flag']=0;
	$data['data']=$this->payroll_model->no_sal_emp();
}
// echo '<pre>';

















// echo '<pre>';


// print_r($data);
// exit();
            // echo $this->session->flashdata('saladded');exit;
// if($this->session->flashdata('saladded')){
 //echo $this->session->userdata('errors').'kk'; exit;

	     $this->load->view('employee/addsalery', $data);
	     $this->load->view('html/footer');
	    
   }
}


public function salarylist(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
$this->load->model('payroll_model');
$result=$this->payroll_model->emp_det_with_salary();
if(count($result)>0){
$data['flag']=1;
$data['data']=$result;
//echo '<pre>';print_r($data);exit;
}
else {
	$data['flag']=0;
  $data['data']=$result;

}
	//echo '<pre>';print_r($data);exit;
	     $this->load->view('employee/salarylist',$data);
	     $this->load->view('html/footer');
	    
   }
}	

   public function payslip($id){
    if($this->session->userdata('hrmsdetails'))
		{	

			$query = $this->db->get_where('empployee', array('e_id' => $id));
			$data['data']=$query->row();
			//echo '<pre>'; print_r($data);exit;
			$this->load->model('payroll_model');
$data['mon']=$this->payroll_model->get_month();
$data['year']=$this->payroll_model->get_year();



//echo '<pre>'; print_r($mon);exit;
// foreach($mon['mon'] as $key=>$value){

// 	echo $value['month'];
// }
// exit;
// // 			// $query = $this->db->query('SELECT distinct(month)  FROM calendar_tab');
			// //print_r($data); exit;
			// $mon['month']=$query->result();
			
			// $query = $this->db->query('SELECT distinct(year)  FROM calendar_tab');
			// $year['year']=$query->result();
			
			//echo '<pre>';print_r($mon); exit;
         $admindetails=$this->session->userdata('hrmsdetails');	
	     $this->load->view('employee/payslip',$data);
	     $this->load->view('html/footer');  
   }
}		
     /* employee management  */
public function shiftmangement(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['employee_list']=$this->Employees_model->employee_data_list();     
           //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/shift-management',$data);
	      $this->load->view('html/footer');  
    }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}		
public function shiftedit(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $data['shift_edit']=$this->Employees_model->edit_shift_management_details(base64_decode($this->uri->segment(3)));
		 $data['shiftlist']=$this->Employees_model->shift_list();

		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/edit-shift',$data);
	     $this->load->view('html/footer');
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}



public function attendance()
	   {	
		if($this->session->userdata('hrmsdetails'))
		{
		$admindetails=$this->session->userdata('hrmsdetails');
		$this->load->model('emp_manage_model');
		$data['emp_data']=$this->emp_manage_model->get_login_details();
		//echo'<pre>';print_r($data);exit;
		if(count($data)>0){
			$data['flag']=1;
}
else{

	$data['flag']=0;
}


			 
	     $this->load->view('employee/attendence',$data);
		 $this->load->view('html/footer');  
	} 
	  
   }
   public function viewattendance()
	   {	
		if($this->session->userdata('hrmsdetails'))
		{
		$admindetails=$this->session->userdata('hrmsdetails');	 
	     $this->load->view('employee/attendence-view');
		 $this->load->view('html/footer');  
	     }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
   }
   public function employeeleaverequests()
	{	
		if($this->session->userdata('hrmsdetails'))
		{
			$admindetails=$this->session->userdata('hrmsdetails');
             $data['employee_leaves_list']=$this->Employees_model->employee_leaves_list_details($admindetails['e_id']); 
				//echo'<pre>';print_r($data);exit;
			 
					 $this->load->view('employee/employee-leaves',$data);
	                 $this->load->view('html/footer'); 
				
		}else{
			$this->session->set_flashdata('error',"Please  login continue");
			redirect('');
		}
	}
	
	public function leaves(){
		if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
				$cau_leave=$this->Employees_model->get_employee_casual_leaves($admindetails['e_id'],1);
				//echo $this->db->last_query();
				//var_dump($cau_leave);exit;
					$lop_leave=$this->Employees_model->get_employee_lop_leaves($admindetails['e_id'],2);
					$m_leave=$this->Employees_model->get_employee_medical_leaves($admindetails['e_id'],3);
					$current_month_leave=$this->Employees_model->get_employee_current_month_leaves($admindetails['e_id'],date('m'));
					$leave_polices_list=$this->Employees_model->get_employee_policies_list();
					if($current_month_leave['cnt']>=$leave_polices_list['monthly_limit']){
						$m_lop_leaves=(($current_month_leave['cnt'])-($leave_polices_list['monthly_limit']));
					}else{
						$m_lop_leaves='';
					}
					$data['leave_polices_list']=$leave_polices_list;
					$leaves=$this->Employees_model->get_emp_leaves_list_details_data($admindetails['e_id']);
					if(isset($leaves) && count($leaves)>0){
						$r_c_leave=$r_lop_leave=$r_m_leave='';
						foreach($leaves as $li){
							if($li['leave_type']==1){
								$r_c_leave=(($leave_polices_list['casual_leaves'])-($cau_leave['cnt']));
								$data['remaining_Casual_leaves']=isset($r_c_leave)?$r_c_leave:'';
							}if($li['leave_type']==2){
								$r_lop_leave=(($leave_polices_list['pay_leaves'])-($lop_leave['cnt']));
								$data['remaining_lop_leaves']=isset($r_lop_leave)?$r_lop_leave:'';
							}if($li['leave_type']==3){
								$r_m_leave=(($leave_polices_list['medical_leaves'])-($m_leave['cnt']));
								$data['remaining_mdical_leaves']=isset($r_m_leave)?$r_m_leave:'';
							}
						}
					}
					//$data['leave_details']['c_leave']=isset($cau_leave['cnt'])?$cau_leave['cnt']:'';
					//$data['leave_details']['lop_leave']=isset($lop_leave['cnt'])?$lop_leave['cnt']:'';
					//$data['leave_details']['m_leave']=isset($m_leave['cnt'])?$m_leave['cnt']:'';
					//$data['leave_details']['tottal_leave']=$cau_leave['cnt']+$lop_leave['cnt']+$m_leave['cnt'];
					$data['current_month_leave']=isset($current_month_leave['cnt'])?$current_month_leave['cnt']:'';
					$data['current_month_lop_leave']=isset($m_lop_leaves)?$m_lop_leaves:'';
		 //$data['leaves_data']=$this->Employees_model->get_employee_leaves_list($admindetails['e_id']);
		 $data['leaves_types']=$this->Employees_model->get_leaves_type_list();
			//echo'<pre>';print_r($data);exit;
		 
	     $this->load->view('employee/emp_leave_add',$data);
	     $this->load->view('html/footer');             
		 
   }else{
  $this->session->set_flashdata('error',"Please  login continue");
	redirect('');
	   
   }
}			
  public function leavespost(){
  if($this->session->userdata('hrmsdetails'))
		{
	
	$admindetails=$this->session->userdata('hrmsdetails');
	$post=$this->input->post();	
	//echo'<pre>';print_r($post);
	
				$f_date = strtotime($post['f_date']);
				$t_date = strtotime($post['t_date']);
				$currentDate = date('Y-m-d', $f_date); 
				$newDate = date('Y-m-d',$t_date); 
				
			$date1=date_create($currentDate);
			$date2=date_create($newDate);
			$diff=date_diff($date1,$date2);
			$save_data=array(
		        'emp_id'=>isset($admindetails['e_id'])?$admindetails['e_id']:'',
				'leave_type'=>isset($post['l_type'])?$post['l_type']:'',
				'from_date'=>isset($currentDate)?$currentDate:'',
				'to_date'=>isset($newDate)?$newDate:'',
				'number_of_days'=>$diff->format("%a")+1,
				'leaves_reason'=>isset($post['l_reason'])?$post['l_reason']:'',
				'status'=>0,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
				//echo'<pre>';print_r($save_data);exit;
		       $save=$this->Employees_model->save_leaves_details($save_data);	
	         if(count($save)>0){
					$this->session->set_flashdata('success',"Leave Request successfully sent");	
					redirect('employee/leaveslist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/leaves');
					}
				   
	
          }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
 
  } 
public function leaverequests(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['employee_leaves_list']=$this->Employees_model->get_all_employee_leaves_list_details();
		 $this->load->view('employee/leaves',$data);
	     $this->load->view('html/footer');  
	   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}
public function leavedetails(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $emp_id=base64_decode($this->uri->segment(3));	 
		 $admindetails=$this->session->userdata('hrmsdetails');	
				$cau_leave=$this->Employees_model->get_employee_casual_leaves($emp_id,1);
				//echo $this->db->last_query();
				//var_dump($cau_leave);exit;
					$lop_leave=$this->Employees_model->get_employee_lop_leaves($emp_id,2);
					$m_leave=$this->Employees_model->get_employee_medical_leaves($emp_id,3);
					$current_month_leave=$this->Employees_model->get_employee_current_month_leaves($emp_id,date('m'));
					$leave_polices_list=$this->Employees_model->get_employee_policies_list();
					if($current_month_leave['cnt']>=$leave_polices_list['monthly_limit']){
						$m_lop_leaves=(($current_month_leave['cnt'])-($leave_polices_list['monthly_limit']));
					}else{
						$m_lop_leaves='';
					}
					$data['leave_polices_list']=$leave_polices_list;
					$r_c_leave=(($leave_polices_list['casual_leaves'])-($cau_leave['cnt']));
					$data['remaining_Casual_leaves']=isset($r_c_leave)?$r_c_leave:'';
					$r_lop_leave=(($leave_polices_list['pay_leaves'])-($lop_leave['cnt']));
					$data['remaining_lop_leaves']=isset($r_lop_leave)?$r_lop_leave:'';
					$r_m_leave=(($leave_polices_list['medical_leaves'])-($m_leave['cnt']));
					$data['remaining_mdical_leaves']=isset($r_m_leave)?$r_m_leave:'';
					$data['leave_details']['c_leave']=isset($cau_leave['cnt'])?$cau_leave['cnt']:'';
					$data['leave_details']['lop_leave']=isset($lop_leave['cnt'])?$lop_leave['cnt']:'';
					$data['leave_details']['m_leave']=isset($m_leave['cnt'])?$m_leave['cnt']:'';
					$data['leave_details']['tottal_leave']=$cau_leave['cnt']+$lop_leave['cnt']+$m_leave['cnt'];
					$data['current_month_leave']=isset($current_month_leave['cnt'])?$current_month_leave['cnt']:'';
					$data['current_month_lop_leave']=isset($m_lop_leaves)?$m_lop_leaves:'';
				    $data['emp_details']=$this->Employees_model->get_employee_details($emp_id);
					//echo'<pre>';print_r($data);exit;
		 
	     $this->load->view('employee/emp_leave_details',$data);
	     $this->load->view('html/footer'); 
	   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	

public function leave(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 	
		 $data['employee_data']=$this->Employees_model->employee_list_data();
		 $data['leaves_types']=$this->Employees_model->leaves_list_data();

		//echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/add-leaves',$data);
	     $this->load->view('html/footer');  
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}		
public function addleave(){
	if($this->session->userdata('hrmsdetails'))
		{
	
	$admindetails=$this->session->userdata('hrmsdetails');
	$post=$this->input->post();	
		//echo'<pre>';print_r($post);
		$f_date = strtotime($post['f_date']);
				$t_date = strtotime($post['t_date']);
				$currentDate = date('Y-m-d', $f_date); 
				$newDate = date('Y-m-d',$t_date); 
				
			$date1=date_create($currentDate);
			$date2=date_create($newDate);
			$diff=date_diff($date1,$date2);
			$save_data=array(
				'emp_id'=>isset($post['employee'])?$post['employee']:'',
				'leave_type'=>isset($post['l_type'])?$post['l_type']:'',
				'from_date'=>isset($currentDate)?$currentDate:'',
				'to_date'=>isset($newDate)?$newDate:'',
				'number_of_days'=>$diff->format("%a")+1,
				'leaves_reason'=>isset($post['l_reason'])?$post['l_reason']:'',
				'status'=>0,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
				//echo'<pre>';print_r($save_data);exit;
		       $save=$this->Employees_model->save_leaves_details($save_data);	
	         if(count($save)>0){
					$this->session->set_flashdata('success',"Leave Request successfully sent");	
					redirect('employee/leaverequests');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/leaverequests');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	
}	
public function leaveslists(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 	
		 $data['leaves']=$this->Employees_model->get_all_employees_list();

			//echo'<pre>';print_r($data);exit;
	     $this->load->view('leaves/all_leaves_list',$data);
	     $this->load->view('html/footer');  
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}
public function leaveslist(){
    if($this->session->userdata('hrmsdetails'))
		{	
			$admindetails=$this->session->userdata('hrmsdetails');	
				$cau_leave=$this->Employees_model->get_employee_casual_leaves($admindetails['e_id'],1);
				//echo $this->db->last_query();
				//var_dump($cau_leave);exit;
					$lop_leave=$this->Employees_model->get_employee_lop_leaves($admindetails['e_id'],2);
					$m_leave=$this->Employees_model->get_employee_medical_leaves($admindetails['e_id'],3);
					$current_month_leave=$this->Employees_model->get_employee_current_month_leaves($admindetails['e_id'],date('m'));
					$leave_polices_list=$this->Employees_model->get_employee_policies_list();
					if($current_month_leave['cnt']>=$leave_polices_list['monthly_limit']){
						$m_lop_leaves=(($current_month_leave['cnt'])-($leave_polices_list['monthly_limit']));
					}else{
						$m_lop_leaves='';
					}
					
					$leaves=$this->Employees_model->get_emp_leaves_list_details_data($admindetails['e_id']);
					if(isset($leaves) && count($leaves)>0){
						$r_c_leave=$r_lop_leave=$r_m_leave='';
						foreach($leaves as $li){
							$data[$li['l_id']]=$li;
							if($li['leave_type']==1){
								$r_c_leave=(($leave_polices_list['casual_leaves'])-($cau_leave['cnt']));
								$data[$li['l_id']]['remaining_leaves']=isset($r_c_leave)?$r_c_leave:'';
							}if($li['leave_type']==2){
								$r_lop_leave=(($leave_polices_list['pay_leaves'])-($lop_leave['cnt']));
								$data[$li['l_id']]['remaining_leaves']=isset($r_lop_leave)?$r_lop_leave:'';
							}if($li['leave_type']==3){
								$r_m_leave=(($leave_polices_list['medical_leaves'])-($m_leave['cnt']));
								$data[$li['l_id']]['remaining_leaves']=isset($r_m_leave)?$r_m_leave:'';
							}
						}
					}
					if(!empty($data)){
						$data['leaves']=$data;
					}
					$data['leave_details']['c_leave']=isset($cau_leave['cnt'])?$cau_leave['cnt']:'';
					$data['leave_details']['lop_leave']=isset($lop_leave['cnt'])?$lop_leave['cnt']:'';
					$data['leave_details']['m_leave']=isset($m_leave['cnt'])?$m_leave['cnt']:'';
					$data['leave_details']['tottal_leave']=$cau_leave['cnt']+$lop_leave['cnt']+$m_leave['cnt'];
					$data['leave_details']['current_month_leave']=isset($current_month_leave['cnt'])?$current_month_leave['cnt']:'';
					$data['leave_details']['current_month_lop_leave']=isset($m_lop_leaves)?$m_lop_leaves:'';
					//echo '<pre>';print_r($data);exit;
			$this->load->view('employee/leaves-list',$data);

	     $this->load->view('html/footer');  
         }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	

public function leavesstatus()
	{	
		if($this->session->userdata('hrmsdetails'))
		{
	$admindetails=$this->session->userdata('hrmsdetails');
					$l_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					$statu=1;
					if($l_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s'),
							'accepted_by'=>$admindetails['e_id']
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_leave_list_details_status($l_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
									$this->session->set_flashdata('success',"Leave approved successfully");
									redirect('employee/leaverequests');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/leaverequests');
							}
					}
		                 
     	}else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
	}

public function lstatus()
	{	
		if($this->session->userdata('hrmsdetails'))
		{
	$admindetails=$this->session->userdata('hrmsdetails');
					$l_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					$statu=2;
					
					if($l_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s'),
							'accepted_by'=>$admindetails['e_id']
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_leave_list_details_status($l_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Leave rejected successfully");
								redirect('employee/leaverequests');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/leaverequests');
							}
					}
		}else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
	}






/* departments*/
public function department(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['deparment_list']=$this->Employees_model->department_list();
		 //echo'<pre>';print_r($data);exit;
		$this->load->view('employee/department',$data);
		$this->load->view('html/footer'); 
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	
public function adddepartment(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
		 $check_department_exit=$this->Employees_model->check_department_already($post['department']);
				//echo'<pre>';print_r($check_department_exit);exit;
				if(count($check_department_exit)>0){
					$this->session->set_flashdata('error',"Department  already exit");
					redirect('employee/departmentlist');
				}	
		 $save_data=array(
				'department'=>isset($post['department'])?$post['department']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
		       $save=$this->Employees_model->save_department_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Department details successfully added");	
					redirect('employee/departmentlist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/departmentlist');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
}		
public function departmentlist(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['deparment_list']=$this->Employees_model->department_list();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/department-list',$data);
	      $this->load->view('html/footer');  
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	

public function editdepartment(){
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
	  $this->uri->segment(3);
		 $data['edit_department']=$this->Employees_model->edit_department_details(base64_decode($this->uri->segment(3)));
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/edit-department',$data);
		  $this->load->view('html/footer');
  }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }	
public function editdepartmentpost(){
		 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $post=$this->input->post();
		 //echo'<pre>';print_r($post);exit;
		
		 $department_details=$this->Employees_model->get_department_details_list($post['d_id']);
					//echo '<pre>';print_r($data['allocaterrom_details']);exit;	
		 if($department_details['department']!=$post['department']){
						$check=$this->Employees_model->check_department_data_exsists($post['department']);
						if(count($check)>0){
						$this->session->set_flashdata('error'," Department  alreay exit");
						redirect('employee/departmentlist');
						}	
					}	
					
					
		       $update_data=array(
				'department'=>isset($post['department'])?$post['department']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				);
				 $update=$this->Employees_model->update_department_details($post['d_id'],$update_data);	
				 //echo'<pre>';print_r($update);exit;
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Department details successfully updated");	
					redirect('employee/departmentlist');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/departmentlist');
					  }
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	}
public function statusdepartment()
{
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $d_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($d_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_department_details($d_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Department details successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Department details successfully  Activate.");
								}
								redirect('employee/departmentlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/departmentlist');
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
public function deletedepartment()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$d_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_department_details($d_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success'," Department details successfully  deleted.");
								
								 redirect('employee/departmentlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/departmentlist');
							}
					
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
      /* shift */
public function shift(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['shift_list']=$this->Employees_model->shift_list();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('shift/shift',$data);
		 $this->load->view('html/footer');  
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	
public function addshift(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
		
		 $check_department_exit=$this->Employees_model->check_shift_already($post['shift']);
				//echo'<pre>';print_r($check_department_exit);exit;
				if(count($check_department_exit)>0){
					$this->session->set_flashdata('error',"Shift  already exit");
					redirect('employee/shiftlist');
				}	
				
		 $save_data=array(
				'shift'=>isset($post['shift'])?$post['shift']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
		       $save=$this->Employees_model->save_shift_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Shift details successfully added");	
					redirect('employee/shiftlist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/shiftlist');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
}		
public function shiftlist(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['shift_list']=$this->Employees_model->shift_list();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('shift/shift-list',$data);
	     $this->load->view('html/footer');  
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}
public function editshift(){
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
	  $this->uri->segment(3);
		 $data['edit_shift']=$this->Employees_model->edit_shift_details(base64_decode($this->uri->segment(3)));
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('shift/edit-shift',$data);
		 $this->load->view('html/footer');
  }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }	
public function editshiftpost(){
		 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $post=$this->input->post();
		 //echo'<pre>';print_r($post);exit;
		
		 $shift_details=$this->Employees_model->get_shift_details_list($post['s_id']);
					//echo '<pre>';print_r($data['allocaterrom_details']);exit;	
		 if($shift_details['shift']!=$post['shift']){
						$check=$this->Employees_model->check_shift_data_exsists($post['shift']);
						if(count($check)>0){
						$this->session->set_flashdata('error'," Shift alreay exit");
						redirect('employee/shiftlist');
						}	
					}	
					
					
		       $update_data=array(
				'shift'=>isset($post['shift'])?$post['shift']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				);
				 $update=$this->Employees_model->update_shift_details($post['s_id'],$update_data);	
				 //echo'<pre>';print_r($update);exit;
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Shift details successfully updated");	
					redirect('employee/shiftlist');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/shiftlist');
					  }
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	}
public function statusshift()
{
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $s_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($s_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_shift_details($s_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Shift details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Shift details successfully Activate.");
								}
								redirect('employee/shiftlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/shiftlist');
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
public function deleteshift()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$s_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_shift_details($s_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success'," Shift details successfully deleted.");
								
								 redirect('employee/shiftlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/shiftlist');
							}
					
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
	
	       /*  Area   */
	public function area(){
if($this->session->userdata('hrmsdetails'))
		{	
		 $admindetails=$this->session->userdata('hrmsdetails');	
		  $data['area_list']=$this->Employees_model->area_list();
		 //echo'<pre>';print_r($data);exit;
		$this->load->view('area/area',$data);
		$this->load->view('html/footer');  
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	
public function addarea(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 //echo '<pre>';print_r($admindetails);exit;
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
			 $check_area_exit=$this->Employees_model->check_area_already($post['area']);
				//echo'<pre>';print_r($check_area_exit);exit;
				if(count($check_area_exit)>0){
					$this->session->set_flashdata('error',"Area  already exit");
					redirect('employee/arealist');
				}	
		 $save_data=array(
				'area'=>isset($post['area'])?$post['area']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
		       $save=$this->Employees_model->save_area_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Area details successfully added");	
					redirect('employee/arealist');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('employee/arealist');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
}		
public function arealist(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['area_list']=$this->Employees_model->area_list();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('area/area-list',$data);
	     $this->load->view('html/footer');  
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	
	public function editarea(){
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
	  $this->uri->segment(3);
		 $data['edit_area']=$this->Employees_model->edit_area_details(base64_decode($this->uri->segment(3)));
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('area/edit-area',$data);
		 $this->load->view('html/footer');
  }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }	
public function editareapost(){
		 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $post=$this->input->post();
		
		 $area_details=$this->Employees_model->get_area_details_list($post['a_id']);
		 if($area_details['area']!=$post['area']){
						$check=$this->Employees_model->check_area_data_exsists($post['area']);
						if(count($check)>0){
						$this->session->set_flashdata('error',"Area Name already exist. Please use another area name");
						redirect('employee/arealist');
						}	
					}	
					
					
		       $update_data=array(
				'area'=>isset($post['area'])?$post['area']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				);
				 $update=$this->Employees_model->update_area_details($post['a_id'],$update_data);	
				 //echo'<pre>';print_r($update);exit;
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Area details successfully updated");	
					redirect('employee/arealist');	
					  }else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('employee/arealist');
					  }
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	}
	public function statusarea()
{
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $a_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($a_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_area_details($a_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Area details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Area details successfully Activate.");
								}
								redirect('employee/arealist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/arealist');
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
	
	public function deletearea()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$a_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_area_details($a_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success'," Area details successfully deleted.");
								
								 redirect('employee/arealist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/arealist');
							}
					
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
	
	
	
	
	
     /* sub department */
public function subdepartment(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		$data['department_data']=$this->Employees_model->department_data_details();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('subdepartment/subdepartment',$data);
	     $this->load->view('html/footer');  
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}

public function addsubdepartment(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
	
		$check=$this->Employees_model->check_subdepartment_data_exsists($post['department'],$post['sub_department']);
						//echo '<pre>';print_r($check);exit;
						if(count($check)>0){
							$this->session->set_flashdata('error',"Sub department already exist. Please use another sub department");
							redirect('employee/subdepartmentlist');
						}
		 $save_data=array(
				'department'=>isset($post['department'])?$post['department']:'',
				'sub_department'=>isset($post['sub_department'])?$post['sub_department']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
		       $save=$this->Employees_model->save_subdepartment_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Subdepartment details successfully added");	
					redirect('employee/subdepartmentlist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/subdepartmentlist');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
}			
public function subdepartmentlist(){
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $data['subdepartment_list']=$this->Employees_model->subdepaertment_list();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('subdepartment/subdepartment-list',$data);
	     $this->load->view('html/footer'); 
   }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
}	
public function editsubdepaertment(){
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
	  $this->uri->segment(3);
		 $data['edit_subdepartment']=$this->Employees_model->edit_subdepartment_details(base64_decode($this->uri->segment(3)));
		 $data['department_data']=$this->Employees_model->department_data_details();
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('subdepartment/edit-subdepartment',$data);
	     $this->load->view('html/footer');
  }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }	
public function editsubdepartmentpost(){
		 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $post=$this->input->post();
		 //echo'<pre>';print_r($post);exit;
		$data['subdepartment_details']=$this->Employees_model->get_subdepartment_details_list($s_d_id);
		 if($subdepartment_details['department']!=$post['department'] || $subdepartment_details['sub_department']!=$post['sub_department']){
						$check=$this->Employees_model->check_subdepartment_data_exsists($post['department'],$post['sub_department']);
						if(count($check)>0){
						$this->session->set_flashdata('error'," Subdepartment  alreay exit");
						redirect('employee/subdepartmentlist');
						}	
					}	
					
		       $update_data=array(
				'department'=>isset($post['department'])?$post['department']:'',
				'sub_department'=>isset($post['sub_department'])?$post['sub_department']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				);
				 $update=$this->Employees_model->update_subdepartment_details($post['s_d_id'],$update_data);	
				 //echo'<pre>';print_r($update);exit;
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Subdepartment details successfully updated");	
					redirect('employee/subdepartmentlist');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/subdepartmentlist');
					  }
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	}	
	public function statussubdepaertment()
{
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $s_d_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($s_d_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_subdepartment_details($s_d_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Subdepartment details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Subdepartment details successfully Activate.");
								}
								redirect('employee/subdepartmentlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/subdepartmentlist');
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
	public function deletesubdepartment()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$s_d_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_subdepartment_details($s_d_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success',"Subdepartment details successfully deleted.");
								
								 redirect('employee/subdepartmentlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/subdepartmentlist');
							}
					
					
			    }else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
	
 /* employee comunication  */
public function chat(){
    if($this->session->userdata('hrmsdetails'))
		{	
         $empdet=$this->session->userdata('hrmsdetails');	
         $eid=$empdet['e_id'];
         $data['sender']=$eid;
         //echo $eid;exit;
         $this->session->unset_userdata('recv');
         $this->load->model('Chat_model');
        
          //echo'<pre>';print_r($data);exit;
         $lastdata=$this->Chat_model->getlastrecord($eid);

          //echo'<pre>';print_r($lastdata);exit;
         if(count($lastdata)>0){
         	$data['status']='yes';
         if($lastdata->sender_id==$eid){

         	$rid=$lastdata->recevier_id;
          	$this->session->set_userdata('recv',$rid);

    $data['rec_det']=$this->Chat_model->recv_details($rid);

         }
         else{
         	$rid=$lastdata->sender_id;
          	 $this->session->set_userdata('recv',$rid);
          	$data['rec_det']=$this->Chat_model->recv_details($rid);
            }

$data['chatdata']=$this->Chat_model->last_chat($eid,$rid);
$data['emplist']=$this->Chat_model->updates_for_users($eid,$rid);
$this->Chat_model->read_status_change($eid,$rid);
$data['ustatus']=1;

}


         //$data['rec_det']=$this->Chat_model->last_chat_rec_id($eid);
        
          else{
          	$data['emplist']=$this->Chat_model->allusers_ex_user($eid);
          	$data['ustatus']=0;

          	$data['status']='no';


          }
           
          
          $empcount=$this->Chat_model->empcount();
         $ecount=$empcount->cnt;
           $this->session->unset_userdata('empcount');
          $this->session->set_userdata('empcount',$ecount);
         
         
          
         
         
              //echo'<pre>';print_r($data);exit;

          
          //$this->session->set_userdata('recv',$rid);
      
          //echo'<pre>';print_r($data);exit;

 
	     $this->load->view('employee/sidebar-chat',$data);

	     $this->load->view('employee/chat');
	     $this->load->view('html/footer');  
   }
}	


  
public function assignwork(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	    $admindetails=$this->session->userdata('hrmsdetails');
	    $data['employee_list']=$this->Employees_model->get_employees_ids_details();
	     $data['area_list']=$this->Employees_model->get_area_list_data();
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/assign-work',$data);
	     $this->load->view('html/footer');   
   }

  }
  public function addwork(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
		 $save_data=array(
				'work_employee_id'=>isset($post['work_emplouee_id'])?$post['work_emplouee_id']:'',
				'allocated_area'=>isset($post['allocated_area'])?$post['allocated_area']:'',
				'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
				'date'=>isset($post['date'])?$post['date']:'',
				'work'=>isset($post['work'])?$post['work']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
				  //echo '<pre>';print_r($save_data);exit;
		       $save=$this->Employees_model->save_assign_work_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Assign Work  successfully added");	
					redirect('employee/workdistributionlist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/workdistributionlist');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
}		
  
public function workdistributionlist(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	  $data['assign_work_list']=$this->Employees_model->assign_work_list();	
		 //echo '<pre>';print_r($data);exit;
	     $this->load->view('employee/work-distribution-list',$data);
	     $this->load->view('html/footer');   
          }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }
    
	
	public function editwork(){
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
	  $this->uri->segment(3);
	   $data['employee_id']=$this->Employees_model->get_employees_ids_details();
	    $data['area_list']=$this->Employees_model->get_area_list_data();
		$data['edit_work']=$this->Employees_model->edit_work_details(base64_decode($this->uri->segment(3)));
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/edit-assign-work',$data);
		 $this->load->view('html/footer');
  }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }	
public function editassignwork(){
		 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $post=$this->input->post();
		 //echo'<pre>';print_r($post);exit;	
		       $update_data=array(
				'work_employee_id'=>isset($post['work_emplouee_id'])?$post['work_emplouee_id']:'',
				'allocated_area'=>isset($post['allocated_area'])?$post['allocated_area']:'',
				'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
				'date'=>isset($post['date'])?$post['date']:'',
				'work'=>isset($post['work'])?$post['work']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				);
				 //echo'<pre>';print_r($update_data);exit;	
				 $update=$this->Employees_model->update_assign_work_details($post['w_d_id'],$update_data);	
				 //echo'<pre>';print_r($update);exit;
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Assign Work successfully updated");	
					redirect('employee/workdistributionlist');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/workdistributionlist');
					  }
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	}
	
    public function statuswork()
{
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $w_d_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($w_d_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_assign_work_details($w_d_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Assign Work successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Assign Work successfully Activate.");
								}
								redirect('employee/workdistributionlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/workdistributionlist');
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
	public function deletework()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$w_d_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_assign_work_details($w_d_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success'," Assign Work successfully deleted.");
								
								 redirect('employee/workdistributionlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/workdistributionlist');
							}
					
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
	/*
	public function leavetype(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	    $admindetails=$this->session->userdata('hrmsdetails');
		 //echo'<pre>';print_r($data);exit;
	     $this->load->view('leave type/leavetype');
	     $this->load->view('html/footer');   
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }
public function addleavetype(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
		 $save_data=array(
				'leave_type_name'=>isset($post['leave_type_name'])?$post['leave_type_name']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );
				  //echo '<pre>';print_r($save_data);exit;
		       $save=$this->Employees_model->save_leave_type_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"leave  successfully added");	
					redirect('employee/leavetypelist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/leavetypelist');
					}
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
}		
  */	
	
	
	
	
	
	
public function leavepolicy(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	    $admindetails=$this->session->userdata('hrmsdetails');
	
	     $this->load->view('employee/leave-policy');
	     $this->load->view('html/footer');   
		 
            }else{
			$this->session->set_flashdata('error',"You have no permission to access");
			redirect('dashboard');
		}

  }
   public function addleavepolicy(){
	if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $post=$this->input->post();	
		 //echo'<pre>';print_r($post);exit;
		$check_ative=$this->Employees_model->check_leave_policy_active_ornot();
		if(count($check_ative)>0){
			$this->session->set_flashdata('error',"At time only one leave policy is active. Please try again");	
			redirect('employee/leavepolicylist');	
		}
		 $save_data=array(
				'casual_leaves'=>isset($post['casual_leaves'])?$post['casual_leaves']:'',
				'pay_leaves'=>isset($post['pay_leaves'])?$post['pay_leaves']:'',
				'medical_leaves'=>isset($post['medical_leaves'])?$post['medical_leaves']:'',
				'monthly_limit'=>isset($post['monthly_limit'])?$post['monthly_limit']:'',
				'total_leaves'=>isset($post['total_leaves'])?$post['total_leaves']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				 );

		 
				  //echo '<pre>';print_r($save_data);exit;
		       $save=$this->Employees_model->save_leave_policy_details($save_data);	
		       if(count($save)>0){

					$this->session->set_flashdata('success',"leavepolicy   successfully added");	
					redirect('employee/leavepolicylist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/leavepolicylist');
					}
		     
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
}		
  
  public function leavepolicylist(){
	   
	  if($this->session->userdata('hrmsdetails'))
		{	
	      $data['leave_policy_list']=$this->Employees_model->get_leave_policy_list();	
		 //echo '<pre>';print_r($data);exit;
	     $this->load->view('employee/leave-policy-list',$data);
	     $this->load->view('html/footer');   
       }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }
   public function editleavepolicy(){
	  if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
	  $this->uri->segment(3);
		$data['edit_leave_policy']=$this->Employees_model->edit_leave_policy_details(base64_decode($this->uri->segment(3)));
		  //echo'<pre>';print_r($data);exit;
	     $this->load->view('employee/edit-leave-policy',$data);
		 $this->load->view('html/footer');
         }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
  }	 
  
  
  public function editleavepolicypost(){
		 if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');
		 $post=$this->input->post();
		 //echo'<pre>';print_r($post);exit;	
		       $update_data=array(
				'casual_leaves'=>isset($post['casual_leaves'])?$post['casual_leaves']:'',
				'pay_leaves'=>isset($post['pay_leaves'])?$post['pay_leaves']:'',
				'medical_leaves'=>isset($post['medical_leaves'])?$post['medical_leaves']:'',
				'monthly_limit'=>isset($post['monthly_limit'])?$post['monthly_limit']:'',
				'total_leaves'=>isset($post['total_leaves'])?$post['total_leaves']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['e_id'])?$admindetails['e_id']:''
				);
				 //echo'<pre>';print_r($update_data);exit;	
				 $update=$this->Employees_model->update_leave_policy_details($post['l_p_id'],$update_data);	
				 //echo'<pre>';print_r($update);exit;
		       if(count($update)>0){
					$this->session->set_flashdata('success',"leavepolicy successfully updated");	
					redirect('employee/leavepolicylist');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('employee/leavepolicylist');
					  }
				   }else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
	}
   public function statusleavepolicy()
{
if($this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
	             $l_p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($l_p_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Employees_model->update_leave_policy_details($l_p_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"leavepolicy successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"leavepolicy successfully Activate.");
								}
								redirect('employee/leavepolicylist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/leavepolicylist');
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
  
  public function deletleavepolicy()
{
if($this->session->userdata('hrmsdetails'))
		{
		$login_details=$this->session->userdata('hrmsdetails');

			
					$l_p_id=base64_decode($this->uri->segment(3));
					
					
							$delete_data=$this->Employees_model->delete_leave_policy_details($l_p_id);
							if(count($delete_data)>0){
								$this->session->set_flashdata('success'," leavepolicy successfully deleted.");
								
								 redirect('employee/leavepolicylist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/leavepolicylist');
							}
					
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		
	}
	
  
  
  
  
  
  
  

	// employee delete




	public function emp_delete($eid){

   $this->load->model('Employees_model');
   $this->Employees_model->emp_delete($eid);

   redirect('employee/salarylist');
   
    	
    }
	
	/*employee resignation*/
	
	public  function resignation(){
		if($this->session->userdata('hrmsdetails'))
		{	
	      $login_details=$this->session->userdata('hrmsdetails');	
		  $data['resignation_details']=$this->Employees_model->check_employee_resignation_exist($login_details['e_id']);
		 
		  //echo '<pre>';print_r($login_details);exit;
		  $this->load->view('employee/resignation',$data);
	      $this->load->view('html/footer');   
       }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
	}
	public  function resignationlist(){
		if($this->session->userdata('hrmsdetails'))
		{	
	       $login_details=$this->session->userdata('hrmsdetails');	
		   $data['resignations_list']=$this->Employees_model->get_all_employee_resignation_list();
		   //echo '<pre>';print_r($data);exit;
		   $this->load->view('employee/resignation_list',$data);
	       $this->load->view('html/footer');   
       }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
	}
	public  function applyresignation(){
		if($this->session->userdata('hrmsdetails'))
		{
		 $login_details=$this->session->userdata('hrmsdetails');			
	     $post=$this->input->post();
		 $add=array(
		  'emp_id'=>$login_details['e_id'],
		  'content'=>isset($post['content'])?$post['content']:'',
		  'status'=>1,
		  'accept_status'=>0,
		  'created_by'=>$login_details['e_id'],
		 );
		 $check=$this->Employees_model->check_employee_resignation_exist($login_details['e_id']);
		 
		 
		 if(count($check)>0){
			 $save=$this->Employees_model->update_employee_resignation($login_details['e_id'],$check['e_r_id'],$add);
		 }else{
			$save=$this->Employees_model->save_employee_resignation($add);
		 }
		 if(count($save)>0){
			 $this->session->set_flashdata('success'," Your resignation sent successfully.");
			 redirect('employee/resignation');
		 }else{
			$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
			redirect('employee/resignation'); 
		 }
			//echo '<pre>';print_r($post);exit;		 
       }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
	}
	
	public  function resignationaccept(){
		if($this->session->userdata('hrmsdetails'))
		{	
				$admindetails=$this->session->userdata('hrmsdetails');	
	             $e_r_id=base64_decode($this->uri->segment(3));
	             $status=base64_decode($this->uri->segment(4));
					
					if($e_r_id!=''){
							$stusdetails=array(
							 'accept_status'=>$status,
							 'updated_at'=>date('Y-m-d H:i:s'),
							 'approved_id'=>$admindetails['a_id'],
							);
							$statusdata=$this->Employees_model->employee_resignation_status($e_r_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
									$this->session->set_flashdata('success',"Resignation successfully Accepoted.");
								}else{
									$this->session->set_flashdata('success',"Resignation successfully Rejeted.");
								}
								redirect('employee/resignationlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/resignationlist');
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
	/*employee resignation*/


	
	
}	
	
?>	
	



