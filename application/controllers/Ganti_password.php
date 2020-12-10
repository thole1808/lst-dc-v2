<?php 
class Ganti_password extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ganti_password_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
	    $this->load->library('session');
    }

    public function index(){   
        $this->template->load('template','v_ganti_password');
    } 

    public function ubah_password()
    {
        $username = $this->session->userdata['full_name'];
        $this->form_validation->set_rules('pw_baru','Kata Sandi Baru','required');
        $this->form_validation->set_rules('cpw_baru','Ulangi Kata Sandi Baru','required|matches[pw_baru]');

        if( $this->form_validation->run() == FALSE ){
            $this->template->load('template','v_ganti_password');
        } else {

            $post = $this->input->post();
            $data = array(
                'password' => md5($post['pw_baru']),
                'password' => md5($post['cpw_baru']),
            );
            helper_log("edit", "mengubah Kata Sandi");
            $this->Ganti_password_model->update( $username, $data, 'tbl_user');
            redirect('auth');
        }
    }
      

}?>