<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll_model extends CI_Model 

{
   public function all_sal()
        {

                $query = $this->db->get('employee_salary');
                return $query->result();
        }

        public function save_salary_det($data){
  $this->db->insert('employee_salary',$data);
return  ($this->db->affected_rows() == 1) ? true: false;
  
  }
   public function salary_update($data,$emp_id){
  $this->db->update('employee_salary',$data,array('e_id'=>$emp_id));
return  ($this->db->affected_rows() == 1) ? true: false;
  
  }

 public function get_month(){


$query = $this->db->get('month_tab');
//$query->result();
   //$query = $this->db->query('SELECT distinct(month)  FROM calendar_tab');
   return $query->result();

  }
  public function get_year(){

$query = $this->db->get('year_tab');
//$query->result();
   //$query = $this->db->query('SELECT distinct(month)  FROM calendar_tab');
   return $query->result();

  }
  public function get_holidays($year,$month){

$sql = "SELECT * FROM holidays WHERE year(holiday_date)=$year AND month(holiday_date)=$month ";
 $query=$this->db->query($sql);

return $query->result();
  }

public function get_login_days($year,$month,$eid){
  $sql = "SELECT * FROM login_details  WHERE year(l_date)=$year AND month(l_date)=$month AND
   e_id=$eid ";
 $query=$this->db->query($sql);
return $query->result();


}
public function general_leaves($year,$month,$eid){
  $sql = "SELECT * FROM emp_leaves_tab  WHERE year(l_date)=$year AND month(l_date)=$month AND
   e_id=$eid And leave_type='general' ";
 $query=$this->db->query($sql);
return $query->result();



}


public function pay_leaves($year,$month,$eid){
   $sql = "SELECT * FROM emp_leaves_tab  WHERE year(l_date)=$year AND month(l_date)=$month AND
   e_id=$eid And leave_type='pay' ";
 $query=$this->db->query($sql);
return $query->result();



}
public function medical_leaves($year,$month,$eid){
   $sql = "SELECT * FROM leaves  WHERE year(from_date)=$year AND month(from_date)=$month AND
   emp_id=$eid And leave_type='3' ";

 $query=$this->db->query($sql);
return $query->result();



}
public function emp_sal($eid){

$query = $this->db->get_where('employee_salary', array('e_id' => $eid));


return $query->row();;
}
public function emp_sal_det($eid){
  $this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary','empployee.e_id=employee_salary.e_id');
$this->db->where('empployee.e_id',$eid);
$query=$this->db->get();

//$query = $this->db->get_where('employee_salary', array('e_id' => $eid));
$data=$query->row();

return $data;
}
// getting empids based on name
public function emp_ids($name){

$query = $this->db->get_where('empployee', array('e_f_name' => $name));

return $query->result();
}

//getting employeess who are not in  emp_salry_tab

public function no_sal_emp(){

$sql = " select distinct e_f_name from empployee where e_id not in (select e_id from employee_salary) ";

$query=$this->db->query($sql);
return $query->result();
}

// get the  records from both empploy and employee_salary table
public function emp_det_with_salary(){

$this->db->select('*');
$this->db->from('empployee');
$this->db->join('employee_salary', 'empployee.e_id = employee_salary.e_id');
$this->db->join('role', 'role.r_id = empployee.role_id','left');
$this->db->where('empployee.role_id !=',1);
$query = $this->db->get();
return $query->result();

}
// employee salary delete
public function emp_sal_delete($eid){
  $this->db->where('e_id', $eid);
$this->db->delete('employee_salary');
return 'yes';


    }


// insert pay slips
  public function save_payslip($data){
  $this->db->insert('employee_salary_payslips',$data);
return  ($this->db->affected_rows() == 1) ? true: false;
  
  }
  public function emp_payslip_det($month,$year,$eid){
    
   $this->db->select('*');
   $this->db->from('empployee');
   $this->db->join('employee_salary_payslips', 'employee_salary_payslips.e_id=empployee.e_id');
   $this->db->join('role', 'role.r_id=empployee.role_id');
   $this->db->where('e_salary_month',$month);
   $this->db->where('e_salary_year',$year);
     $this->db->where('empployee.e_id',$eid);
 $query=$this->db->get();

 return $query->row();




  }
  // get salary type 

  public function salary_type(){

      $this->db->select('*')->from('salary_type_tab');
      $query=$this->db->get();

      return $query->result();

  }
  // check the date for daily wage in  payslips tab
  public function checkdate($eid,$date)
  {

    $this->db->select('l_date')->from('login_details')->where('e_id',$eid)->where('l_date=',$date)->group_by('l_date');
$query=$this->db->get();
    return $query->row();
  }
  // get empployee  salary type

  public function emp_sal_type(){
  $this->db->select('e_id,sal_id,sal_type')->from('employee_salary')->join('salary_type_tab','salary_type_tab.sal_id=employee_salary.salary_type ');

$query=$this->db->get();
return $query->row();
}
// 
public function emp_payslip_daily($eid,$present)
{

  $this->db->select('*');
   $this->db->from('empployee');
   $this->db->join('employee_salary_payslips', 'employee_salary_payslips.e_id=empployee.e_id');
   $this->db->join('role', 'role.r_id=empployee.role_id');
   $this->db->where('daily_date',$present);
     $this->db->where('empployee.e_id',$eid);
 $query=$this->db->get();

 return $query->row();


}
// checking loging in a week
public function checkweeklogin($eid,$str_date,$end_date){
  $this->db->select('l_date');
  $this->db->from('login_details');
   $this->db->where('e_id',$eid);
   $this->db->where('l_date >=', $str_date);
   $this->db->where('l_date <=', $end_date);
    $this->db->group_by('l_date');
$query=$this->db->get();
    return $query->result();




}

//
 public function genreral_leaves_week($eid,$str_date,$end_date){

$this->db->select('*');
  $this->db->from('leaves');
   $this->db->where('leave_type',1);
   $this->db->where('from_date>=', $str_date);
   $this->db->where('from_date<=', $end_date);
   $this->db->where('emp_id',$eid);

   
$query=$this->db->get();
    return $query->result();
}
public function medical_leaves_week($eid,$str_date,$end_date){

$this->db->select('*');
  $this->db->from('leaves');
   $this->db->where('leave_type',3);
   $this->db->where('from_date>=', $str_date);
   $this->db->where('from_date<=', $end_date);
   $this->db->where('emp_id',$eid);

   
$query=$this->db->get();
    return $query->result();

}

public function casual_leaves_week($eid,$str_date,$end_date){

  $this->db->select('*');
  $this->db->from('leaves');
   $this->db->where('leave_type',2);
   $this->db->where('from_date>=', $str_date);
   $this->db->where('from_date<=', $end_date);
   $this->db->where('emp_id',$eid);

   
$query=$this->db->get();
    return $query->result();
}

public function getbagscommission($eid,$month,$year){
  $this->db->select('orders.bags_type,bags_type.sales_commision,orders.bags_count tbag_cnt,bags_type.bages_cnt comm_cnt');
  $this->db->from('orders');
   $this->db->join('bags_type', 'bags_type.b_id=orders.bags_type');
   $this->db->where('sales_emp_id',$eid);
    $this->db->where('year(orders.created_at)',$year);
     $this->db->where('month(orders.created_at)',$month);
   $query=$this->db->get();
    return $query->result();




}
public function getshopscommission($eid,$month,$year){
  $this->db->select('sum(comm) scomm');
  $this->db->from('shops_tab');
  $this->db->where('year(shop_assign_date)',$year);
     $this->db->where('month(shop_assign_date)',$month);
   $this->db->where('salesman_id',$eid);
   $query=$this->db->get();
    return $query->row();

}
public function paymentscommission($eid,$month,$year){
  $this->db->select('sum(collect_money*1.5/100) comm,sum(adv_money*3/100) advcomm');
  $this->db->from('salesman_collection_tab');
  $this->db->where('year(payment_date)',$year);
     $this->db->where('month(payment_date)',$month);
   $this->db->where('salesman_id',$eid);
   $query=$this->db->get();
    return $query->row();

}
public function salessuper_salary($eid,$month,$year){
  $this->db->select('e_id');
  $this->db->from('empployee');
   $this->db->where('role_id',$eid);
   $subquery = $this->db->get_compiled_select();


   $this->db->select('orders.bags_type,bags_type.sales_commision,orders.bags_count  tbag_cnt,bags_type.bages_cnt comm_cnt');
  $this->db->from('orders');
   $this->db->join('bags_type', 'bags_type.b_id=orders.bags_type');
   $this->db->where("`sales_emp_id` IN ($subquery)");
    $this->db->where('year(orders.created_at)',$year);
     $this->db->where('month(orders.created_at)',$month);
   $query=$this->db->get();
   $query=$query->result();
 $mon_com_amt=0;// commis for orders
foreach($query as $bag){
  $numbags=$bag->tbag_cnt;
  $commbags=$bag->comm_cnt;
  $commision_amt=$bag->sales_commission;
  $comm_tot_amt=($commision_amt/$commbags)*$numbags;
$mon_com_amt=$mon_com_amt+$comm_tot_amt;//total bags commission

}
 $this->db->select('sum(comm) scomm');
  $this->db->from('shops_tab');
  $this->db->where('year(shop_assign_date)',$year);
     $this->db->where('month(shop_assign_date)',$month);
   $this->db->where("`salesman_id` IN ($subquery)");
   $query=$this->db->get();
  $query=$query->row();
   $shopcomm=0;
  if(count($query)>0){
  $shopcomm=$query->scomm;
}
$this->db->select('sum(collect_money*1.5/100) comm,sum(adv_money*3/100) advcomm');
  $this->db->from('salesman_collection_tab');
  $this->db->where('year(payment_date)',$year);
     $this->db->where('month(payment_date)',$month);
   $this->db->where("`salesman_id` IN ($subquery)");
   $query=$this->db->get();
  $query=$query->row();
   $paycomm=0;
  if(count($query)>0){
  $paycomm=$query->comm+$query->advcomm;
}
$sup_sal=$mon_com_amt+$paycomm+$shopcomm;
return $sup_sal;


 
}
public function tylor_salary($eid,$month,$year){

$this->db->select('no_bags_stiched,comm_per_bag');
  $this->db->from('tylor_bags');
   $this->db->join('stiching_type', 'tylor_bags.stiching_type=stiching_type.stiching_id');
   $this->db->where('year(stiched_date)',$year);
     $this->db->where('month(stiched_date)',$month);
   $this->db->where('tylor_id',$eid);
$query=$this->db->get();
  $query=$query->result();
  $tylor_sal=0;
  foreach($query as $row){
  $bags_cnt=$row->no_bags_stiched;
  $price=$row->comm_per_bag;
  $tylor_sal=$tylor_sal+$bags*(float)$price;

  }
  return $tylor_sal;

}


}