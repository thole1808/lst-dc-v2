<?php
class Ganti_password_model extends CI_Model 
{
	public function update($username,$data,$table)
    {
        $this->db->where('full_name',$username);
        $this->db->update($table,$data);
    }
}