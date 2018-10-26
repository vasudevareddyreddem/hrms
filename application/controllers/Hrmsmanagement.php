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
			
			$this->load->view('html/header');
			$this->load->view('html/sidebar');

			}
	}


	public function index()
	{	
		
		if(!$this->session->userdata('hrmsdetails'))
		{	 
		
	     $this->load->view('html/login');
	    
	}
  
}
public function dashboard(){
	   
	  if(!$this->session->userdata('hrmsdetails'))
		{	 
		 $this->load->view('html/header');
	     $this->load->view('hrmsmanagement/index');
	     $this->load->view('html/sidebar');
	} 
	   
	   
	   
   }

 public function attendance(){
	   
	  if(!$this->session->userdata('hrmsdetails'))
		{	 
		 $this->load->view('html/header');
	     $this->load->view('hrmsmanagement/attendence');
	     $this->load->view('html/sidebar');
	} 
	   
	   
	   
   }

   public function saleman_track(){
	   
	  if(!$this->session->userdata('hrmsdetails'))
		{	 
		 $this->load->view('html/header');
	     $this->load->view('hrmsmanagement/salestrack');
	     $this->load->view('html/sidebar');
	} 
	   
	   
	   
   }







}
?>
