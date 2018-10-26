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
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/employees-list');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}
public function addemployee(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/addemployee');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}




public function add(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/addemployee');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	
public function lists(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/employees-list');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	

   public function holidays(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/holidays');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
       /* payroll management */

public function salary(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/salarylist');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}
public function addsalary(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/addsalery');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	
public function salarylist(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/salarylist');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');
	    
   }
}	

   public function payslip(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/payslip');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
     /* employee management  */
public function shiftmangement(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/shift-management');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
public function attendance()
	   {	
		if(!$this->session->userdata('hrmsdetails'))
		{
		$admindetails=$this->session->userdata('hrmsdetails');	 
		 $this->load->view('html/header');
	     $this->load->view('employee/attendence');
	     $this->load->view('html/sidebar');
		 $this->load->view('html/footer');  
	} 
	  
   }
   public function viewattendance()
	   {	
		if(!$this->session->userdata('hrmsdetails'))
		{
		$admindetails=$this->session->userdata('hrmsdetails');	 
		 $this->load->view('html/header');
	     $this->load->view('employee/attendence-view');
	     $this->load->view('html/sidebar');
		 $this->load->view('html/footer');  
	} 
	  
   }
   
public function leaverequests(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/leaves');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}		
public function leaveslist(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/leaves-list');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}	
 /* employee comunication  */
public function chat(){
    if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/chat');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');  
   }
}	

public function salemantrack(){
	   
	  if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/salestrack');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');   
   }

  }
public function trackdetails(){
	   
	  if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('employee/track-details');
	     $this->load->view('html/sidebar');
	     $this->load->view('html/footer');   
   }

  }

  
  
  
  
  
public function profile(){
	
	if(!$this->session->userdata('hrmsdetails'))
		{	
         $admindetails=$this->session->userdata('hrmsdetails');	
		 $this->load->view('html/header');
	     $this->load->view('html/employee-details');
	     $this->load->view('html/sidebar');
	     
	    
   }
	
	
}
public function editprofile(){
	
	if(!$this->session->userdata('hrmsdetails'))
		{	 
	    $admindetails=$this->session->userdata('hrmsdetails');
		 $this->load->view('html/header');
	     $this->load->view('html/edit-profile');
	     $this->load->view('html/sidebar');  
   }
	
}
	

	
	
	
}	
	
?>	
	




