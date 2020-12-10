<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Ganti_profile extends CI_Controller {
	

    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('Ganti_profile_model');
        $this->load->library('form_validation');        
	    $this->load->library('session');
    }

    public function index(){   
        $this->template->load('template','v_ganti_profile');
    } 
    
    // Upload Foto Profile
    public function upload_profile(){
        $config = array();
        $config['upload_path'] = './assets/foto_profil/';
        $config['allowed_types'] = 'png|jpg|jpeg|';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '10048';
        $config['remove_spaces'] = TRUE;
        // $config['file_name']         = round(microtime(true)*1000); JIKA INGIN MENGGANTI NAMA FILENAME
        $this->load->library('upload', $config, 'unggah_foto'); // Create custom object for cover upload
        $this->unggah_foto->initialize($config);
        $upload_pass_photo = $this->unggah_foto->do_upload('images'); //untuk upload data
        return $this->unggah_foto->data();
    }
    

    public function ubah_profile(){
        
        // $username = $this->session->userdata['full_name'];
        $username = $this->session->userdata('full_name');
        $this->form_validation->set_rules('images','Gambar','trim');
        // $this->form_validation->set_rules('cpw_baru','Ulangi Kata Sandi Baru','required|matches[pw_baru]');

        if( $this->form_validation->run() == FALSE ){
            $this->template->load('template','v_ganti_profile');
        }else{
            $file_update = $this->upload_profile();
            if ($file_update['file_name'] == '') {
                redirect('ganti_profile');
                // $data = array(
                //     // 'judul' => $this->input->post('judul',TRUE),
                //     // 'updated_by' => $this->input->post('updated_by',TRUE)
                // );
            }else{
                $data = array(
                    // 'judul' => $this->input->post('judul',TRUE),
                    'images' => $file_update['file_name'],
                    // 'updated_by' => $this->input->post('updated_by',TRUE)
                );
            }
            // $file_update = $this->upload_profile();

            //     $data = array('images' => $file_update['file_name'] , 

            // );
                
            // print_r($data);
            // exit();
        
            helper_log("edit", "mengubah Profile");
            $this->Ganti_profile_model->update($username,$data,'tbl_user');
            redirect('auth');

            // print_r($data);
            // exit();
        }

         
    }

}?>