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

     if ($this->form_validation->run() == FALSE)
                {
                      redirect("employee/addsalary");
                }
// $this->form_validation->set_rules('da', 'Password Confirmation', 'required');
// $this->form_validation->set_rules('hra', 'Email', 'required');



$data=array(
'emp_id'=> $this->input->post('uid'),
'basic' => $this->input->post('bsal');
'hra'=>$this->input->post('hra'),
'da' => $this->input->post('da');
'allowances'=> $this->input->post('allw'),
'med_allowances' => $this->input->post('mallw');
'conveyance'=> $this->input->post('conv'),
'earn_others' => $this->input->post('eothers');
'tds'=> $this->input->post('tds'),
'pf'=>$this->input->post('pf'),
'esi' => $this->input->post('esi');
'prof_tax' => $this->input->post('ptax');
'labour_welfare'=> $this->input->post('lwel'),
'fund' => $this->input->post('fund');
'ded_others'=> $this->input->post('dothers'),
'net_salary' => $this->input->post('u_email');
'gross_salary'=> $this->input->post('u_name'),

);
print_r($data);
exit();




}



	}
	?>
