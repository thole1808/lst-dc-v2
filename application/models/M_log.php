<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_log extends CI_Model {

	 public $id = 'log_id';
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tbl_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function tampil_semua_log(){
    	$this->db->select('*');
        $this->db->from('tbl_log');
        $this->db->order_by('log_id', 'DESC');
        return $this->db->get()->result();
    }

}