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
			$this->load->view('html/footer');


			}
	}


	public function index()
	{	
		
		if(!$this->session->userdata('hrmsdetails'))
		{	 
		
	     $this->load->view('html/login'); 
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
