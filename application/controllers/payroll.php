<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class payroll extends CI_Controller
{
	

public function salarylist(){

// //$query = $this->db->get('salary_tab');
$this->db->select('*');
$this->db->from('employee');
$this->db->join('salary_tab', 'employee.e_id = salary_tab.emp_id');
$query = $this->db->get();
$data['data']=$query->result();
	





                $this->load->view('html/header');
                $this->load->view('employee/salarylist',$data);
			    $this->load->view('html/sidebar');
	            $this->load->view('html/footer');





}

public function addsal(){
	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('uid', 'Userid', 'required');
    $this->form_validation->set_rules('bsal', 'basic sal', 'required');
// $this->form_validation->set_rules('da', 'Password Confirmation', 'required');
// $this->form_validation->set_rules('hra', 'Email', 'required');

$data=array(
'emp_id'= $this->input->post('u_name'),
'basic' => $this->input->post('u_email');
'hra'= $this->input->post('u_name'),
'da' => $this->input->post('u_email');
'allowances'= $this->input->post('u_name'),
'med_allowances' => $this->input->post('u_email');
'conveyance'= $this->input->post('u_name'),
'earn_others' => $this->input->post('u_email');
'tds'= $this->input->post('u_name'),
'esi' => $this->input->post('u_email');
'prof_tax' => $this->input->post('u_email');
'labour_welfare'= $this->input->post('u_name'),
'fund' => $this->input->post('u_email');
'ded_others'= $this->input->post('u_name'),
'net_salary' => $this->input->post('u_email');
'gross_salary'= $this->input->post('u_name'),




)




}



	}
	?>
