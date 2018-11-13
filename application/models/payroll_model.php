<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payroll_model extends CI_Model 

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
  public function checkdate($date,$eid)
  {

    $this->db->select('*')->from('employee_salary_payslips')->where('e_id',$eid)->where('daily_date', $date);
$query=$this->db->get();
    return $query->row();
  }
  // get empployee  salary type

  public function emp_sal_type(){
  $this->db->select('e_id,sal_id,sal_type')->from('employee_salary')->join('salary_type_tab','salary_type_tab.sal_id=employee_salary.salary_type ');

$query=$this->db->get();
return $query->row();
}
// get 
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



}