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

$sql = "SELECT * FROM holidays_tab WHERE year(date)=$year AND month(date)=$month ";
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
public function emp_sal($eid){

$query = $this->db->get_where('employee_salary', array('e_id' => $eid));
$data=$query->row();

return $data->e_net_salary;
}
public function emp_sal_det($eid){

$query = $this->db->get_where('employee_salary', array('e_id' => $eid));
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

$sql = " select * from empployee where e_id not in (select e_id from employee_salary) ";

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
// check employe working in month or not




}