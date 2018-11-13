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


    public function empids(){
      if($this->session->userdata('hrmsdetails'))
    { 

      $name=base64_decode($this->uri->segment(3));
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
      else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
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
    else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
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
    $this->form_validation->set_rules('sal-type', 'salary type', 'required');
    


 if ($this->form_validation->run() == FALSE)
                {
$this->session->set_flashdata('error',validation_errors());
                    redirect('employee/salarylist');

                }

     $eid=$this->input->post('eid');
     //echo $eid; exit;
     $day=$this->input->post('day');
     $sal_type=$this->input->post('sal-type');

   

// for salarytype daily  --start 

if($sal_type=='daily')
  {
   
   $day=$this->input->post('day');
   $date=date('Y-m-d');
   //echo $date;exit;


   $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
  // echo $prev_date;exit;
   
    if($day==0){
      $present=$prev_date;
 
      }
    else{
     $present=$date;
       

    }
    // check login in that date
    $checkdate=$this->payroll_model->checkdate($eid,$present);
     //echo $this->db->last_query();exit;
    if(!(count($checkdate)>0)){


      $this->session->set_flashdata('error',"you have no logins  this day ");
      redirect('employee/salarylist');



    }
    $payslipdata=$this->payroll_model->emp_payslip_daily($eid,$present);
    //print_r($data); exit;
    $file_name =time().'payslip.pdf';  

   if(count($payslipdata)>0){
     $data['pslip_det']=$payslipdata;
   //echo' lddl ' ; exit;
    $data['sal_type']=3;

} 
     else{
      //echo 'kdkd';exit;
      $saldata=$this->payroll_model->emp_sal_det($eid);
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
'daily_date'=>$present,
'payslip_pdf'=>$file_name,
'created_by'=>$userid

);
     $this->payroll_model->save_payslip($payslip_det);
$data['pslip_det']=$this->payroll_model->emp_payslip_daily($eid,$present);
$data['sal_type']=3;

 //echo' <pre> ' ;print_r($data); exit;
}// end of else
}// end of saltype daily

// start of saltype weekly

elseif ($sal_type='weekly') {
 // echo 'weekly';exit;
  $date=date('Y-m-d');
  $date=date('Y-m-d',strtotime($date .' -1 day'));
  if($this->input->post('0')){
$prev_date = date('Y-m-d', strtotime($date .' -7 day'));
$str_date=date('Y-m-d', strtotime($date .' -13 day'));
$end_date = date('Y-m-d', strtotime($date .' -6 day'));

}
else{
$prev_date = $date;
$str_date=date('Y-m-d', strtotime($date .' -6 day'));
$end_date=$date;

}
// checking this week login or not
$checkdate=$this->payroll_model->checkweeklogin($eid,$str_date,$end_date);
//echo $this->db->last_query();exit;


if(!(count($checkdate)>0)){
  //echo count($checkdate); exit;
  $this->session->set_flashdata('error',"you have no logings  this week ");
      redirect('employee/salarylist');

}



$payslipdata=$this->payroll_model->emp_payslip_daily($eid,$prev_date);
    //print_r($data); exit;
    $file_name =time().'payslip.pdf';  

   if(count($payslipdata)>0){
     $data['pslip_det']=$payslipdata;
   //echo' lddl ' ; exit;
    $data['sal_type']=2;
    $data['startdate']=$str_date;
    $data['enddate']=$end_date;

} 
     else{
      //echo 'kdkd';exit;
      $saldata=$this->payroll_model->emp_sal_det($eid);
          $file_name =time().'payslip.pdf';  
          //leaves calculation in week

          //generlaleveg
$gen_lv=$this->payroll_model->genreral_leaves_week($eid,$str_date,$end_date);
//cal genleave start
//echo $this->db->last_query();exit;

$gleaves=0;
foreach($gen_lv as $row){

$getdate=$row->from_date;
$to_date=$row->to_date;
$ldays=$row->number_of_days;
$i=1;
$y=0;
$count=0;
while($i<=$ldays){

$count++;
  $tempdate=date('Y-m-d', strtotime($getdate .' +'.$y.' day'));
 //echo $tempdate;exit;
  if($tempdate<=$end_date){

    $gleaves=$gleaves+1;
  }


  $y++;// increment of number of days
  $i++;

}

}
$cnt_gen=$gleaves; // no general leaves
//echo $cnt_gen. 'count'.$count++;exit;

//end genleaves
//cal medleave start
//echo $this->db->last_query();exit;
$med_lv=$this->payroll_model->medical_leaves_week($eid,$str_date,$end_date);
$mleaves=0;
foreach($med_lv as $row){

$getdate=$row->from_date;
$to_date=$row->to_date;
$ldays=$row->number_of_days;
$i=1;
$y=0;
$count=0;
while($i<=$ldays){

$count++;
  $tempdate=date('Y-m-d', strtotime($getdate .' +'.$y.' day'));
 //echo $tempdate;exit;
  if($tempdate<=$end_date){

    $mleaves=$mleaves+1;
  }


  $y++;// increment of number of days
  $i++;

}

}
$cnt_med=$mleaves; // no medical leaves
//echo $cnt_gen. 'count'.$count++;exit;

//end medicalleaves
//start of casual leaves
$pay_lv=$this->payroll_model->casual_leaves_week($eid,$str_date,$end_date);
$payleaves=0;
foreach($pay_lv as $row){

$getdate=$row->from_date;
$to_date=$row->to_date;
$ldays=$row->number_of_days;
$i=1;
$y=0;
$count=0;
while($i<=$ldays){

$count++;
  $tempdate=date('Y-m-d', strtotime($getdate .' +'.$y.' day'));
 //echo $tempdate;exit;
  if($tempdate<=$end_date){

    $payleaves=$payleaves+1;
  }


  $y++;// increment of number of days
  $i++;

}

}
$cnt_pay=$payleaves; 
//edn of casula leaves
//echo 'pay'.$cnt_pay.'gen'.$cnt_gen.'med'.$cnt_med; exit;

$sal=$saldata->e_basic/7;
$sal_ded=$sal*$cnt_pay;


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
'daily_date'=>$str_date,
'payslip_pdf'=>$file_name,
'created_by'=>$userid,
'e_leaves_deduction'=>$sal_ded

);
     $this->payroll_model->save_payslip($payslip_det);
$data['pslip_det']=$this->payroll_model->emp_payslip_daily($eid,$str_date);
$data['sal_type']=2;
$data['startdate']=$str_date;
    $data['enddate']=$end_date;

 //echo' <pre> ' ;print_r($data); exit;
}// end of else

//echo' <pre> ' ;print_r($data); exit;

  # code...
}
//end of saly type weekly
// daily-- end


 //echo' <pre> ' ;print_r($data); exit;

        
         

         $this->load->view('employee/payslip-view',$data);
         $this->load->view('html/footer');

}
else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
     }  

}


    
   // retreving the employee salary deatails
    public function editsal($id){
       if($this->session->userdata('hrmsdetails'))
    { 
//$query = $this->db->get_where('salary_tab', array('emp_id' => $id));
        $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$this->db->where('employee_salary.e_id',$id);
$query = $this->db->get();

$data['row'] = $query->row();

$data['salary_type']=$this->payroll_model->salary_type();


//
 //echo json_encode($row);

$this->load->view('employee/edit-salary',$data);
         $this->load->view('html/footer');

}
else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
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
    //$this->form_validation->set_rules('saltype', 'salary type ', 'required');

     if ($this->form_validation->run() == FALSE)
                {
                  
                   $this->session->set_flashdata('error', validation_errors());
                   $val=base64_encode($this->input->post('uid'));
                  
                      redirect("payroll/editsal/".$val);
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
'e_gross_salary'=>$gross_salary,
'salary_type'=>$this->input->post('saltype')

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
else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
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

	redirect("employee/salarylist");
}

}
else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
     }

}





// delete emp salare
public function sal_delete($eid){
	 if($this->session->userdata('hrmsdetails'))
    { 

   $this->load->model('payroll_model');
   $this->payroll_model->emp_sal_delete($eid);
   $this->session->set_flashdata('success','salary deleted'); 


   redirect("employee/salarylist");

	}
	else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
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
  // payslipf for daily workers
  public function daypayslip(){
    if($this->session->userdata('hrmsdetails'))
    { 

        
            $userdet=$this->session->userdata('hrmsdetails');
            $userid=$userdet['e_id'];


        $this->load->library('form_validation');
      $this->form_validation->set_rules('eid', 'employee id', 'required');
    $this->form_validation->set_rules('sal-type', 'salary type', 'required');
   
     //echo $eid; exit;
 if ($this->form_validation->run() == FALSE)
                {
$this->session->set_flashdata('error',validation_errors());
                    redirect('employee/salarylist');

                }
  $eid=$this->input->post('eid');
     
     $day=$this->input->post('day');
     $sal_type=$this->input->post('sal-type');
    
   $date=date('Y-m-d');
   //echo $date;exit;
   $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
  // echo $prev_date;exit;
    if($day==0){
      $present=$prev_date;
 
      }
    else{
     $present=$date;
        }
    // check login in that date
    $checkdate=$this->payroll_model->checkdate($eid,$present);
     //echo $this->db->last_query();exit;
    if(!(count($checkdate)>0)){


      $this->session->set_flashdata('error',"you have no logins  this day ");
      redirect('employee/salarylist');



    }
    $payslipdata=$this->payroll_model->emp_payslip_daily($eid,$present);
    //print_r($data); exit;
    $file_name =time().'payslip.pdf';  

   if(count($payslipdata)>0){
     $data['pslip_det']=$payslipdata;
   //echo' lddl ' ; exit;
    $data['sal_type']=3;

} 
     else{
      //echo 'kdkd';exit;
      $saldata=$this->payroll_model->emp_sal_det($eid);
          $file_name =time().'payslip.pdf';  
           $last_day =  date('t',strtotime($present));// number of days in month
 $daysalary=$saldata->e_basic/$last_day;
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
'daily_date'=>$present,
'payslip_pdf'=>$file_name,
'created_by'=>$userid,
'day_sal'=>$daysalary

);
     $this->payroll_model->save_payslip($payslip_det);
$data['pslip_det']=$this->payroll_model->emp_payslip_daily($eid,$present);
$data['sal_type']=3;
//start of  pdf generation
//start
$path = rtrim(FCPATH,"/");
    $file_name=$data['pslip_det']->payslip_pdf;
                        
          $data['page_title'] = 'title'; // pass data to the view
          $pdfFilePath = $path."/assets/payslips/".$file_name;
          ini_set('memory_limit','320M'); // boost the memory limit if it's low <img 
          
                  
          $html = $this->load->view('employee/payslip-emppdf',$data,true); // render the view into HTML
          //echo '<pre>';print_r($html);exit;
          $this->load->library('pdf');
          $pdf = $this->pdf->load();
          $pdf->allow_charset_conversion = true;
        $pdf->charset_in = 'iso-8859-4';
          $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
          $pdf->SetDisplayMode('fullpage');
          $pdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
         
          
          $pdf->WriteHTML($html); // write the HTML into the PDF
          $pdf->Output($pdfFilePath, 'F');

// end of pdf generation



 //echo' <pre> ' ;print_r($data); exit;
}// end of else
// end of saltype daily

         $this->load->view('employee/payslip-view',$data);
         $this->load->view('html/footer');

    
       }// end of top if

    
else{
     $this->session->set_flashdata('error',"Please login and continue");
     redirect('');  
     }
    

 


  }
  

	}
	?>
