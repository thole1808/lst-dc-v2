<?php
class Ganti_profile_model extends CI_Model {

	// public $table = 'tbl_user';

	public function update($username,$data,$table)
    {
        $this->db->where('full_name',$username);
        $this->db->update($table,$data);
    }
}


?>