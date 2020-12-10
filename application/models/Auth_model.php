<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends CI_Model{   

    function __construct(){
        parent::__construct();
    }
    public function cek_login_aktif($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password', md5($password));
        $this->db->where('is_aktif="Aktif"');
        $result = $this->db->get('tbl_user',0);
        return $result;
    }

    public function cek_login($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password', md5($password));
        $result = $this->db->get('tbl_user',0);
        return $result;
    }

}
