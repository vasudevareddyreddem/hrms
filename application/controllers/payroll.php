<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class payroll extends In_frontend
{
// ajax call for employe ids

  public function __construct() 
  {
    parent::__construct();  

    
    }

    public function empids($name){
      if($this->session->userdata('hrmsdetails'))
    { 
        $this->load->model('payroll_model');
        //print_r($this->payroll_model->emp_ids($name));exit;
    //     $post=$this->input->post();
    // //echo '<pre>';print_r($post);
     $id_list=$this->payroll_model->emp_ids($name);
    if(count($id_list) > 0)
    {
    $data['msg']=1;
    $data['list']=$id_list;
    echo json_encode($data);exit; 
    }else{
     $data['msg']=2;
     echo json_encode($data);exit;
    }
}
        



    }


    // payslip page for all employees
    public function genpayslip(){
        $this->load->model('Employees_model');
         $data['name']=$this->Employees_model->all_emp();
         $this->load->model('payroll_model');
$data['mon']=$this->payroll_model->get_month();
$data['year']=$this->payroll_model->get_year();
        

         $this->load->view('employee/gen-payslip',$data);
         $this->load->view('html/footer');  

        
    }

    public function test(){

//     $this->load->library('numbertowords');
// $number=9999;
// echo $this->numbertowords->convert_number($number);
$date = DateTime::createFromFormat('m/d/Y', '06/16/2010'); // \DateTime object
echo $date->format('Y-m-d');// 2010-06-16
    }
   
	// payslip page
    public function payslippage(){
        $this->load->library('form_validation');
    $this->form_validation->set_rules('eid', 'employee id', 'required');

 if ($this->form_validation->run() == FALSE)
                {

                    redirect('employee/salarylist');

                }
    


        $eid=$this->input->post('eid');
        $year=$this->input->post('year');
        $month=$this->input->post('month');
        $data['year']=$year;
        $dateObj   = DateTime::createFromFormat('!m', $month);
      $data['month'] = $dateObj->format('F');// month in words

    $date = "$year-$month-01";
    $first_day = date('N',strtotime($date));
    $first_day = 7 - $first_day + 1;
    $last_day =  date('t',strtotime($date));
    $days = array();
    for($i=$first_day; $i<=$last_day; $i=$i+7 ){
        $days[] = $i;
    }
$cnt_sun=count($days);// number of sundays
//echo $cnt;
$this->load->model('payroll_model');
$hdays=$this->payroll_model->get_holidays($year,$month);
$logdays=$this->payroll_model->get_login_days($year,$month,$eid);
$pay_lv=$this->payroll_model->pay_leaves($year,$month,$eid);
$gen_lv=$this->payroll_model->general_leaves($year,$month,$eid);
$sal=$this->payroll_model->emp_sal($eid);
$this->load->library('numbertowords');
$saldata=$this->payroll_model->emp_sal_det($eid);
$data['sal_det']=$saldata;
$cnt_pay=count($pay_lv); // no  pay leaves
$cnt_gen=count($gen_lv); // no general leaves
$cnt_hol=count($hdays);// number of holidays
$cnt_log=count($logdays);// number of working days
// checking user worked or not in that month
if($cnt_log==0){

     $this->session->set_flashdata('error','Employee having no login details in this month');
	redirect('employee/salarylist');
}
$wdays=$last_day-$cnt_sun-$cnt_hol; //total working days
$pay_leave_days=$wdays-$cnt_log-$cnt_gen;


$day_sal=$sal/$last_day;
$data['leave_ded']=(int)$day_sal*$pay_leave_days;// leave deductions
//$mon_sal=$sal-((int)$day_sal*$cnt_pay);
$data['total_ded']=$data['sal_det']->e_gross_salary-$data['sal_det']->e_net_salary+((int)$day_sal*$cnt_pay); // total deductions

$this->session->set_userdata($data);
$payslip_det=array(
  'e_id'=> $saldata->e_id,
'e_basic' => $saldata->e_basic,
'e_hra'=>$saldata->e_hra,
'e_da' => $saldata->e_da,
'e_allowance'=> $saldata->e_allowance,
'e_medical_allowance' => $saldata->e_medical_allowance,
'e_conveyance'=> $saldata->e_conveyance,
'e_others' => $saldata->e_others,
'e_d_tds'=> $saldata->e_d_tds,
'e_d_pf'=>$saldata->e_d_pf,
'e_d_esi' => $saldata->e_d_esi,
'e_d_Prof_tax' => $saldata->e_d_Prof_tax,
'e_d_labour_welfare'=> $saldata->e_d_labour_welfare,
'e_d_fund' => $saldata->e_d_fund,
'e_d_others'=> $saldata->e_d_others,
'e_net_salary' => $saldata->e_net_salary,
'e_gross_salary'=>$saldata->e_gross_salary,
'e_salary_month'=>$data['month'],
'e_salary_deduction'=>$data['total_ded']

);
$this->load->model('payroll_model');
$this->payroll_model->save_payslip($payslip_det);
//generate payslip
// $path = rtrim(FCPATH,"/");
//           $file_name = 'payslip.pdf';                
//           $data['page_title'] = 'title'; // pass data to the view
//           $pdfFilePath = $path."/assets/payslips/".$file_name;
//           ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
//           $this->load->library()
//           $html = $this->load->view('employee/payslip-view', $data, true); // render the view into HTML
//           //echo '<pre>';print_r($html);exit;
//           $this->load->library('pdf');
//           $pdf = $this->pdf->load();
//           $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
//           $pdf->SetDisplayMode('fullpage');
//           $pdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
//           $pdf->WriteHTML($html); // write the HTML into the PDF
//           $pdf->Output($pdfFilePath, 'F');

//print_r($data);exit;


//echo $mon_sal;
         $this->load->view('employee/payslip-view',$data);
         $this->load->view('html/footer');




    }
   // retreving the employee salary deatails
    public function editsal($id){
//$query = $this->db->get_where('salary_tab', array('emp_id' => $id));
        $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$this->db->where('employee_salary.e_id',$id);
$query = $this->db->get();

$data['row'] = $query->row();
//echo '<pre>';print_r($row); exit;
 //echo json_encode($row);
$this->load->view('employee/edit-salary',$data);
         $this->load->view('html/footer');



    }

//update the employee salaray
    public function updatesal() {
            $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('uid', 'Userid', 'required');
    $this->form_validation->set_rules('bsal', 'basic sal', 'required|numeric');
    $this->form_validation->set_rules('hra', 'hra', 'required|numeric');
    $this->form_validation->set_rules('da', 'da', 'required|numeric');
    $this->form_validation->set_rules('allw', 'allownce', 'required|numeric');
    $this->form_validation->set_rules('mallw', 'medical allownce', 'required|numeric');
    $this->form_validation->set_rules('conv', 'convinynce', 'required|numeric');
    $this->form_validation->set_rules('eothers', 'other ', 'numeric');
    
   $this->form_validation->set_rules('tds', 'tds', 'required|numeric');
    $this->form_validation->set_rules('pf', 'pf', 'required|numeric');
    $this->form_validation->set_rules('esi', 'esi', 'required|numeric');
    $this->form_validation->set_rules('ptax', 'ptax', 'required|numeric');
    $this->form_validation->set_rules('lwel', 'labour welfare', 'required|numeric');
    $this->form_validation->set_rules('fund', 'fund', 'required|numeric');
    $this->form_validation->set_rules('dothers', 'deduction others', 'numeric');

     if ($this->form_validation->run() == FALSE)
                {
                  
                    $this->session->set_userdata('errors', 'some_value');
                    
                      redirect("employee/addsalary");
                }


$basicsal=empty($_POST['bsal'] )?   0:$_POST['bsal'];
$hra=empty($_POST['hra']) ? 0 : $_POST['hra'];

$da=empty($_POST['da'] )?  0:$_POST['da'] ;
$allw=empty($_POST['allw']) ?  0:$_POST['allw'] ;
$mallw=empty($_POST['mallw'] )? 0:$_POST['mallw'] ;
$conv=empty($_POST['conv']) ?   0:$_POST['conv'];
$eothers=empty($_POST['eothers'] )?  0:$_POST['eothers'] ;
$tds=empty($_POST['tds']) ? 0:$_POST['tds'] ;
$pf=empty($_POST['pf']) ?  0:$_POST['pf'] ;
$esi=empty($_POST['esi'] )?  0:$_POST['esi'] ;
$ptax=empty($_POST['ptax'] )? 0:$_POST['ptax'] ;
$lwel=empty($_POST['lwel']) ? 0:$_POST['lwel'] ;
$fund=empty($_POST['fund']) ?  0:$_POST['fund'] ;
$dothers=empty($_POST['dothers']) ? 0:$_POST['dothers'] ;
// $test=array($basicsal,$hra,$da,$allw,$mallw,$conv,$eothers);
// echo'<pre>';print_r($test);exit;

$net_salary=(float)$basicsal+(float)$hra+(float)$da+(float)$allw+(float)$mallw+(float)$conv+(float)$eothers;
$gross_salary=(float)$net_salary+(float)$tds+(float)$pf+(float)$esi+(float)$ptax+(float)$lwel+(float)$fund+(float)$dothers;


//echo $net_salary;exit;
$data=array(
'e_id'=> $this->input->post('uid'),
'e_basic' => $this->input->post('bsal'),
'e_hra'=>$this->input->post('hra'),
'e_da' => $this->input->post('da'),
'e_allowance'=> $this->input->post('allw'),
'e_medical_allowance' => $this->input->post('mallw'),
'e_conveyance'=> $this->input->post('conv'),
'e_others' => $this->input->post('eothers'),
'e_d_tds'=> $this->input->post('tds'),
'e_d_pf'=>$this->input->post('pf'),
'e_d_esi' => $this->input->post('esi'),
'e_d_Prof_tax' => $this->input->post('ptax'),
'e_d_labour_welfare'=> $this->input->post('lwel'),
'e_d_fund' => $this->input->post('fund'),
'e_d_others'=> $this->input->post('dothers'),
'e_net_salary' => $net_salary,
'e_gross_salary'=>$gross_salary


);
//echo'<pre>';print_r($data);exit;
$id=$this->input->post('uid');
//echo'<pre>';print_r($data);exit;
$this->load->model('payroll_model');
$result=$this->payroll_model->salary_update($data,$id);

if($result==true){
    $this->session->set_flashdata('success', ' salary updated successfully');
redirect("employee/salarylist");
}
else
    { 
          $this->session->set_flashdata('success', ' you are updated nothing');
        redirect("employee/salarylist");
exit;


}








    }

// public function salarylist(){

// // //$query = $this->db->get('salary_tab');
//     $this->load->library('session');
// $this->db->select('*');
// $this->db->from('empployee');
// $this->db->join('salary_tab', 'empployee.e_id = salary_tab.emp_id');
// $query = $this->db->get();
// $data['data']=$query->result();
	





//                 $this->load->view('html/header');
//                 $this->load->view('employee/salarylist',$data);
// 			    $this->load->view('html/sidebar');
// 	            $this->load->view('html/footer');





// }

public function addsal(){
	$this->load->helper(array('form', 'url'));
    $this->load->library('session');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('uid', 'Userid', 'required');
    $this->form_validation->set_rules('bsal', 'basic sal', 'required|numeric');
    $this->form_validation->set_rules('hra', 'hra', 'required|numeric');
    $this->form_validation->set_rules('da', 'da', 'required|numeric');
    $this->form_validation->set_rules('allw', 'allownce', 'required|numeric');
    $this->form_validation->set_rules('mallw', 'medical allownce', 'required|numeric');
    $this->form_validation->set_rules('conv', 'convinynce', 'required|numeric');
    $this->form_validation->set_rules('eothers', 'other ', 'numeric');
    
   $this->form_validation->set_rules('tds', 'tds', 'required|numeric');
    $this->form_validation->set_rules('pf', 'pf', 'required|numeric');
    $this->form_validation->set_rules('esi', 'esi', 'required|numeric');
    $this->form_validation->set_rules('ptax', 'ptax', 'required|numeric');
    $this->form_validation->set_rules('lwel', 'labour welfare', 'required|numeric');
    $this->form_validation->set_rules('fund', 'fund', 'required|numeric');
    $this->form_validation->set_rules('dothers', 'deduction others', 'numeric');

     if ($this->form_validation->run() == FALSE)
                {
                	// $this->session->set_flashdata('saladded','salary  details are successfully added');	
                	//echo validation_errors();
              // echo     $this->session->flashdata('saladded'); exit;
                    $this->session->set_userdata('errors', 'some_value');
                	//echo $this->session->userdata('errors');exit;
                      redirect("employee/addsalary");
                }
// $this->form_validation->set_rules('da', 'Password Confirmation', 'required');
// $this->form_validation->set_rules('hra', 'Email', 'required');

$basicsal=empty($_POST['bsal'] )?   0:$_POST['bsal'];
$hra=empty($_POST['hra']) ? 0 : $_POST['hra'];

$da=empty($_POST['da'] )?  0:$_POST['da'] ;
$allw=empty($_POST['allw']) ?  0:$_POST['allw'] ;
$mallw=empty($_POST['mallw'] )? 0:$_POST['mallw'] ;
$conv=empty($_POST['conv']) ?   0:$_POST['conv'];
$eothers=empty($_POST['eothers'] )?  0:$_POST['eothers'] ;
$tds=empty($_POST['tds']) ? 0:$_POST['tds'] ;
$pf=empty($_POST['pf']) ?  0:$_POST['pf'] ;
$esi=empty($_POST['esi'] )?  0:$_POST['esi'] ;
$ptax=empty($_POST['ptax'] )? 0:$_POST['ptax'] ;
$lwel=empty($_POST['lwel']) ? 0:$_POST['lwel'] ;
$fund=empty($_POST['fund']) ?  0:$_POST['fund'] ;
$dothers=empty($_POST['dothers']) ? 0:$_POST['dothers'] ;
// $test=array($basicsal,$hra,$da,$allw,$mallw,$conv,$eothers);
// echo'<pre>';print_r($test);exit;

$net_salary=(float)$basicsal+(float)$hra+(float)$da+(float)$allw+(float)$mallw+(float)$conv+(float)$eothers;
$gross_salary=(float)$net_salary+(float)$tds+(float)$pf+(float)$esi+(float)$ptax+(float)$lwel+(float)$fund+(float)$dothers;

$data=array(
'e_id'=> $this->input->post('uid'),
'e_basic' => $this->input->post('bsal'),
'e_hra'=>$this->input->post('hra'),
'e_da' => $this->input->post('da'),
'e_allowance'=> $this->input->post('allw'),
'e_medical_allowance' => $this->input->post('mallw'),
'e_conveyance'=> $this->input->post('conv'),
'e_others' => $this->input->post('eothers'),
'e_d_tds'=> $this->input->post('tds'),
'e_d_pf'=>$this->input->post('pf'),
'e_d_esi' => $this->input->post('esi'),
'e_d_Prof_tax' => $this->input->post('ptax'),
'e_d_labour_welfare'=> $this->input->post('lwel'),
'e_d_fund' => $this->input->post('fund'),
'e_d_others'=> $this->input->post('dothers'),
'e_net_salary' => $net_salary,
'e_gross_salary'=>$gross_salary


);


// $data=array(
// 'emp_id'=> $this->input->post('uid'),
// 'basic' => $this->input->post('bsal'),
// 'hra'=>$this->input->post('hra'),
// 'da' => $this->input->post('da'),
// 'allowances'=> $this->input->post('allw'),
// 'med_allowances' => $this->input->post('mallw'),
// 'conveyance'=> $this->input->post('conv'),
// 'earn_others' => $this->input->post('eothers'),
// 'tds'=> $this->input->post('tds'),
// 'pf'=>$this->input->post('pf'),
// 'esi' => $this->input->post('esi'),
// 'prof_tax' => $this->input->post('ptax'),
// 'labour_welfare'=> $this->input->post('lwel'),
// 'fund' => $this->input->post('fund'),
// 'ded_others'=> $this->input->post('dothers'),
// 'net_salary' => $net_salary,
// 'gross_salary'=>$gross_salary,

// );
//echo'<pre>';print_r($data);exit;
$this->load->model('payroll_model');
$result=$this->payroll_model->save_salary_det($data);

if($result==true){
  $this->session->set_flashdata('success','salary  details are successfully added'); 

redirect("employee/salarylist");
}
else
	{ 

		echo 'not';
exit;


}



}

// delete emp salare
public function sal_delete($eid){

   $this->load->model('payroll_model');
   $this->payroll_model->emp_sal_delete($eid);
   $this->session->set_flashdata('success','salary deleted'); 


   redirect('');

      
    }

  public function gen_pdf(){
    ///load mPDF library
   // $data=$this->session->userdata();
    //$this->session->unset_userdata();
   // echo '<pre>';print_r($data);exit;

				$path = rtrim(FCPATH,"/");
					$file_name = 'payslip.pdf';                
					$data['page_title'] = 'title'; // pass data to the view
					$pdfFilePath = $path."/assets/payslips/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('employee/payslip-view', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');





  }


	}
	?>
