<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Payroll extends In_frontend
{
// ajax call for employe ids

  public function __construct() 
  {
    parent::__construct();  
    $this->load->model('payroll_model');
$this->load->library('numbertowords');
    
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
      if($this->session->userdata('hrmsdetails'))
    { 
        $this->load->model('Employees_model');
         $data['name']=$this->Employees_model->all_emp();
         $this->load->model('payroll_model');
$data['mon']=$this->payroll_model->get_month();
$data['year']=$this->payroll_model->get_year();
        

         $this->load->view('employee/gen-payslip',$data);
         $this->load->view('html/footer');  

        
    }
  }

   
   
	// payslip page
    public function payslippage(){
      if($this->session->userdata('hrmsdetails'))
    { 
                  
            $userdet=$this->session->userdata('hrmsdetails');
            $userid=$userdet['e_id'];
        $this->load->library('form_validation');
    $this->form_validation->set_rules('eid', 'employee id', 'required');

 if ($this->form_validation->run() == FALSE)
                {
                  $this->session->set_flashdata('error','employee id is required');

                    redirect('payroll/genpayslip');

                }

     $eid=$this->input->post('eid');
        $year=$this->input->post('year');
        $month=$this->input->post('month');
      $curyear = date('Y'); 
      $curmonth= date('m'); 
      //echo $curmonth; exit;
      if($year>$curyear){
         $this->session->set_flashdata('error', 'year must  enter past or present year');
         redirect($_SERVER['HTTP_REFERER']);
      }
         if($year==$curyear){
          if($month>=$curmonth){
            $this->session->set_flashdata('error', 'year must  enter past month');
            redirect($_SERVER['HTTP_REFERER']);
                            }

}

        $res=$this->payroll_model->emp_payslip_det($month,$year);
        if(count($res)>0){

          $data['pslip_det']=$res;
          //echo '<pre>';print_r($data);exit;
           
      

        }else{

//echo "vasu";exit;

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
$cnt_hol=count($hdays);// number of holidays

$logdays=$this->payroll_model->get_login_days($year,$month,$eid);
$cnt_log=count($logdays);// number of working days
if($cnt_log==0){

     $this->session->set_flashdata('error','Employee having no login details in this month');
  redirect('employee/salarylist');
}
// start payleave cal
$pay_lv=$this->payroll_model->pay_leaves($year,$month,$eid);
$pleaves=0;

foreach($pay_lv as $row){
  $getdate=$pleaves+$row->from_date;//date format
  $monthdays=date('t',strtotime($getdate));//how many days in month
  $pday= date("d", strtotime($getdate));//day of the month
$ldays=$row->number_of_days;
$i=1;
while($i<=$ldays){
  $x=$pday+$i;
  if($x<=$monthdays){

    $pleaves=$pleaves+1;
  }
$i++;

}

 }
$cnt_pay=$pleaves; // no  pay leaves
//end of pay leaves
//start of general leaves
$gen_lv=$this->payroll_model->general_leaves($year,$month,$eid);
$gleaves=0;
foreach($gen_lv as $row){

$getdate=$row->from_date;//date format
  $monthdays=date('t',strtotime($getdate));//how many days in month
  $pday= date("d", strtotime($getdate));//day of the month
$ldays=$row->number_of_days;
$i=1;
while($i<=$ldays){
  $x=$pday+$i;
  if($x<=$monthdays){

    $gleaves=$gleaves+1;
  }
$i++;

}

}
$cnt_gen=$gleaves; // no general leaves

//end of general leaves

//  start sick leaves

$med_lv=$this->payroll_model->medical_leaves($year,$month,$eid);
$mleaves=0;
foreach($med_lv as $row){

$getdate=$row->from_date;//date format
  $monthdays=date('t',strtotime($getdate));//how many days in month
  $pday= date("d", strtotime($getdate));//day of the month
$ldays=$row->number_of_days;
$i=1;
while($i<=$ldays){
  $x=$pday+$i;
  if($x<=$monthdays){

    $mleaves=$mleaves+1;
  }
$i++;

}

}
$cnt_med=$mleaves;
//end of sick leaves

$this->load->library('numbertowords');
$saldata=$this->payroll_model->emp_sal_det($eid);
$data['sal_det']=$saldata;



// checking user worked or not in that month

$wdays=$last_day-$cnt_sun-$cnt_hol; //total working days
//$pay_leave_days=$wdays-$cnt_log-$cnt_gen-$cnt_med;
//$data['payleaves']=$pay_leave_days;
$sal=$this->payroll_model->emp_sal($eid);
if($sal->salary_type==1){

  $day_sal=$sal->e_basic/$last_day;
}
if($sal->salary_type==2){

  $day_sal=$sal->e_basic/7;
}
if($sal->salary_type==3){

  $day_sal=$sal->e_basic;
}

//$day_sal=$sal/$last_day;
$leaves_ded=(int)$day_sal*$pleaves;// leave deductions
//$mon_sal=$sal-((int)$day_sal*$cnt_pay);
$data['total_ded']=$data['sal_det']->e_gross_salary-$data['sal_det']->e_net_salary+((int)$day_sal*$cnt_pay); // total deductions
      
$file_name =time().'payslip.pdf';  
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
'e_salary_month'=>$month,
'e_salary_deduction'=>$data['total_ded'],
'e_salary_year'=>$year,
'e_leaves_deduction'=>$leaves_ded,
'payslip_pdf'=>$file_name,
'payleave_days'=>$pleaves,
'genleave_days'=>$gleaves,
'medleave_days'=>$mleaves,
'created_by'=>$userid

);
$this->load->model('payroll_model');
$this->payroll_model->save_payslip($payslip_det);


$data['pslip_det']=$this->payroll_model->emp_payslip_det($month,$year);
//start
$path = rtrim(FCPATH,"/");
    $file_name=$data['pslip_det']->payslip_pdf;
                        
          $data['page_title'] = 'title'; // pass data to the view
          $pdfFilePath = $path."/assets/payslips/".$file_name;
          ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
          $link1=base_url().'assets/vendor/img/favicon.png';
          //echo $link1;exit;
          $link2=base_url().'assets/vendor/css/font-awesome.min.css';
          $link3=base_url().'assets/vendor/css/font-awesome.min.css';
          $link4=base_url().'assets/vendor/css/dataTables.bootstrap.min.css';
          $link5=base_url().'assets/vendor/css/select2.min.css';
          $link6=base_url().'assets/vendor/css/bootstrap-datetimepicker.min.css';
          $link7= base_url().'assets/vendor/plugins/morris/morris.css';
          $link8=base_url().'assets/vendor/css/style.css';
          $link9=base_url().'assets/vendor/js/jquery-3.2.1.min.js';
          $stylesheet='';
          $stylesheet.=file_get_contents($link1); 
           $stylesheet.=file_get_contents($link2);
            $stylesheet.=file_get_contents($link3);
             $stylesheet.=file_get_contents($link4);
              $stylesheet.=file_get_contents($link5);
               $stylesheet.=file_get_contents($link6);
                $stylesheet.=file_get_contents($link7);
                 $stylesheet.=file_get_contents($link8);
                  $stylesheet.=file_get_contents($link9);
                  
          $html = $this->load->view('employee/payslip-pdf',$data,true); // render the view into HTML
          //echo '<pre>';print_r($html);exit;
          $this->load->library('pdf');
          $pdf = $this->pdf->load();
          $pdf->allow_charset_conversion = true;
$pdf->charset_in = 'iso-8859-4';
          $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
          $pdf->SetDisplayMode('fullpage');
          $pdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
         
          $pdf->WriteHTML($stylesheet,1);
          $pdf->WriteHTML($html,2); // write the HTML into the PDF
          $pdf->Output($pdfFilePath, 'F');
//end


        
        }
 

         $this->load->view('employee/payslip-view',$data);
         $this->load->view('html/footer');



}
}
    
   // retreving the employee salary deatails
    public function editsal(){
      if($this->session->userdata('hrmsdetails'))
    { 
      $id=base64_decode($this->uri->segment(3));
        $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$this->db->where('employee_salary.e_id',$id);
$query = $this->db->get();

$data['row'] = $query->row();

$this->load->view('employee/edit-salary',$data);
         $this->load->view('html/footer');

}

    }

//update the employee salaray
    public function updatesal() {
      if($this->session->userdata('hrmsdetails'))
    { 
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
      $this->session->set_flashdata('error', ' you did not updated anything');

        redirect('Payroll/editsal/'.base64_encode($id));



}





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
  if($this->session->userdata('hrmsdetails'))
    { 
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
    $this->form_validation->set_rules('saltype', 'salary type ', 'required');

     if ($this->form_validation->run() == FALSE)
                {
                	// $this->session->set_flashdata('saladded','salary  details are successfully added');	
                	//echo validation_errors();
              // echo     $this->session->flashdata('saladded'); exit;
                    $this->session->set_flashdata('error', validation_errors());
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
'e_gross_salary'=>$gross_salary,
'salary_type'=>$this->input->post('saltype')


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
$this->session->set_flashdata('error','salary  details are not added'); 

	redirect("employee/addsalary");
//exit;


}



}
}

// delete emp salary
public function sal_delete(){
  if($this->session->userdata('hrmsdetails'))
    { 
      $eid=base64_decode($this->uri->segment(3));

   $this->load->model('payroll_model');
   $this->payroll_model->emp_sal_delete($eid);
   $this->session->set_flashdata('error','salary deleted'); 


   redirect('employee/salarylist');
}
      
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
          $link1=base_url().'assets/vendor/img/favicon.png';
          //echo $link1;exit;
          $link2=base_url().'assets/vendor/css/font-awesome.min.css';
          $link3=base_url().'assets/vendor/css/font-awesome.min.css';
          $link4=base_url().'assets/vendor/css/dataTables.bootstrap.min.css';
          $link5=base_url().'assets/vendor/css/select2.min.css';
          $link6=base_url().'assets/vendor/css/bootstrap-datetimepicker.min.css';
          $link7= base_url().'assets/vendor/plugins/morris/morris.css';
          $link8=base_url().'assets/vendor/css/style.css';
          $link9=base_url().'assets/vendor/js/jquery-3.2.1.min.js';
          $stylesheet='';
          $stylesheet.= file_get_contents($link1); 
           $stylesheet.= file_get_contents($link2);
            $stylesheet.= file_get_contents($link3);
             $stylesheet.= file_get_contents($link4);
              $stylesheet.= file_get_contents($link5);
               $stylesheet.= file_get_contents($link6);
                $stylesheet.= file_get_contents($link7);
                 $stylesheet.= file_get_contents($link8);
                  $stylesheet.= file_get_contents($link9);
                  
					$html = $this->load->view('employee/testpdf','',true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
          $pdf->allow_charset_conversion = true;
$pdf->charset_in = 'iso-8859-4';
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
          
                            $pdf->WriteHTML($stylesheet,1);
					$pdf->WriteHTML($html,2); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');





  }
  

	}
	?>
