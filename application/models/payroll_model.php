<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payroll_model extends CI_Model 

{
	 public function all_sal()
        {

                $query = $this->db->get('salary_tab');
                return $query->result();
        }
	
  }