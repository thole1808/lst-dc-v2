<?php

Class Auth extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
    }
    function index() {
        $this->session->sess_destroy();
        $this->load->view('auth/login');
    }
    
    function ceklogin(){
        $email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $validasi1 = $this->Auth_model->cek_login_aktif($email,$password);
        $validasi2 = $this->Auth_model->cek_login($email,$password);

        if($validasi1->num_rows() > 0){
             $data=$validasi1->row_array();
             $this->session->set_userdata($validasi1->row_array());
             $this->session->set_flashdata('sukses','Berhasil Login');
             helper_log("login", "masuk aplikasi");
             redirect(base_url("beranda"));
        }elseif($validasi2->num_rows() > 0 ){
            $this->session->set_flashdata('not_active_user', 'Akun pengguna Anda tidak aktif,harap hubungi administrator Anda.');
            redirect(base_url("auth"));
        }else{
           $this->session->set_flashdata('failed', 'Pastikan email & kata sandi Anda benar !!!');
           redirect(base_url("auth"));
        }
    }
    
    function logout() {
        $session = array(
            'email'  =>'',
            'password' => '',
        );
        $this->session->unset_userdata($session);
        $this->session->sess_destroy();
        helper_log("logout", "keluar aplikasi");
        redirect(base_url("auth"));
    }

}
