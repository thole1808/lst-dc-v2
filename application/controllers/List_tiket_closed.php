<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_tiket_closed extends CI_Controller{
    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('List_tiket_closed_model');
        $this->load->library('form_validation');        
    }

    // Detail Tiket
    public function detail_tiket($id){
        $id = decrypt_url($id);
        $row = $this->List_tiket_closed_model->detail($id);
        if ($row) {
            $data = array(
                'id_trans_tiket' => $row->id_trans_tiket,
                'id_jenis_tiket' => $row->id_jenis_tiket,
                'no_tiket' => $row->no_tiket,
                'nama_layanan' => $row->nama_layanan,
                'nama_item_layanan' => $row->nama_item_layanan,
                'nama_klien' => $row->nama_klien,
                'nama_admin' => $row->nama_admin,
                'email_admin' => $row->email_admin,
                'nama_shift' => $row->nama_shift,
                'keluhan' => $row->keluhan,
                // Jenis Tiket
                'nama_jenis_tiket' => $row->nama_jenis_tiket,
                'nama_dampak' => $row->nama_dampak,
                'nama_urgency' => $row->nama_urgency,
                'nama_prioritas' => $row->nama_prioritas,
                'deskripsi' => $row->deskripsi,
                'nama_status' => $row->nama_status,
                // Klasfikasi 
                'nama_klasifikasi' => $row->nama_klasifikasi,
                'nama_item_klasifikasi' => $row->nama_item_klasifikasi,
                'nama_penyebab' => $row->nama_penyebab,
            );
            $data['lampiran_tiket_masuk'] = $this->List_tiket_closed_model->lampiran_tiket_masuk($row->no_tiket);
            $data['lampiran_tiket_update'] = $this->List_tiket_closed_model->lampiran_tiket_update($row->no_tiket);
            $data['tampil_riwayat_tiket'] = $this->List_tiket_closed_model->riwayat_tiket($row->no_tiket);
            helper_log("baca", "melihat detail List Tiket Closed");
            $this->template->load('template', 'list_tiket/closed/v_detail_tiket_closed', $data);
            // echo "<pre>";
            // print_r($data);
            // exit();
            // echo "</pre>";
        }else{
            $this->session->set_flashdata('gagal',"Data Tidak Ada");
            redirect(site_url('list_tiket_closed'));
        }
    }

    // Menampilkan List Tiket Closed Dari Masing - Masing User Helpdesk & Sysadmin
    public function index(){
        // Menampilkan List Tiket Closed Dari Masing - Masing User Helpdesk 
        if($this->session->userdata('id_user_level') =='6'){
            // Kosongkan Dahulu sebelum melakukan pencarian
            if ($data['list_tiket_closed'] == null) {
               $this->template->load('template','list_tiket/closed/list_tiket_closed_helpdesk');
            }
       
        // Menampilkan List Tiket Closed Dari Masing - Masing User Sysadmin
        }elseif($this->session->userdata('id_user_level') =='4'){
            // Kosongkan Dahulu sebelum melakukan pencarian
            if ($data['list_tiket_closed'] == null) {
               $this->template->load('template','list_tiket/closed/list_tiket_closed_sys_prog');
            }
        
        // Pencarian List Tiket Closed  Sesuai User Masing - Masing Programmer
        }elseif($this->session->userdata('id_user_level') =='5'){
            // Kosongkan Dahulu sebelum melakukan pencarian
            if ($data['list_tiket_closed'] == null) {
                $this->template->load('template','list_tiket/closed/list_tiket_closed_sys_prog',$data);
            }

        // Pencarian List Tiket Closed User Developer
        }elseif($this->session->userdata('id_user_level') =='1'){
            // Kosongkan Dahulu sebelum melakukan pencarian
            if ($data['list_tiket_closed'] == null) {
                $this->template->load('template','list_tiket/closed/list_tiket_closed_developer',$data);
            }
        }else{
            // Jika User tidak bisa Akses
            redirect(site_url('security/akses'));
        }
        
    }

    // Pencarian Tiket Closed
    public function cari(){
        $this->load->model('List_tiket_closed_model');
       
        // Pencarian All => tanggal awal , tanggal_akhir & All
        if($_POST['tanggal_awal'] && $_POST['tanggal_akhir'] && $_POST['pilihan'] == 'All'){
            
            // User Masing - Masing Helpdesk
            if($this->session->userdata('id_user_level') =='6'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_all_closed_helpdesk($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari All List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_all_tiket_closed_helpdesk',$data);
            
            // User Masing - Masing Programmer
            }elseif($this->session->userdata('id_user_level') =='5'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_all_closed_sys_prog($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari All List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_all_tiket_closed_sys_prog',$data);
            
            // User Masing - Masing Sysadmin
            }elseif($this->session->userdata('id_user_level') =='4'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_all_closed_sys_prog($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari All List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_all_tiket_closed_sys_prog',$data);

            // User Developer LST-DC
            }elseif($this->session->userdata('id_user_level') =='1'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_all_closed_developer($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari All List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_all_tiket_closed_developer',$data);

            }else{
                redirect(site_url('security/akses'));   
            }
       
        // Pencarian Breach => tanggal awal , tanggal_akhir & Breach
        }elseif($_POST['tanggal_awal'] && $_POST['tanggal_akhir'] && $_POST['pilihan'] == 'Breach'){
            
            // User Masing - Masing Helpdesk
            if($this->session->userdata('id_user_level') =='6'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_breach_closed_helpdesk($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_breach_tiket_closed_helpdesk',$data); 
            // User Masing - Masing Programmer
            }elseif($this->session->userdata('id_user_level') =='5'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_breach_closed_sys_prog($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_breach_tiket_closed_sys_prog',$data);

            // User Masing - Masing Sysadmin
            }elseif($this->session->userdata('id_user_level') =='4'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_breach_closed_sys_prog($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_breach_tiket_closed_sys_prog',$data);

            // User Developer LST-DC
            }elseif($this->session->userdata('id_user_level') =='1'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_breach_closed_developer($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_breach_tiket_closed_developer',$data);

            }else{
               redirect(site_url('security/akses'));    
            }

        // Pencarian No Breach => tanggal awal , tanggal_akhir & No Breach
        }elseif($_POST['tanggal_awal'] && $_POST['tanggal_akhir'] && $_POST['pilihan'] == 'No Breach'){
            
            // User Masing - Masing Helpdesk
            if($this->session->userdata('id_user_level') =='6'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_no_breach_closed_helpdesk($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari No Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_no_breach_tiket_closed_helpdesk',$data); 

            // User Masing - Masing Programmer
            }elseif($this->session->userdata('id_user_level') =='5'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_no_breach_closed_sys_prog($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari No Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_no_breach_tiket_closed_sys_prog',$data);

            // User Masing - Masing Sysadmin
            }elseif($this->session->userdata('id_user_level') =='4'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_no_breach_closed_sys_prog($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari No Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_no_breach_tiket_closed_sys_prog',$data);

            // User Developer
            }elseif($this->session->userdata('id_user_level') =='1'){
                $tgl_awal  = $_POST['tanggal_awal'];
                $tgl_akhir  = $_POST['tanggal_akhir'];
                $data['list_tiket_closed']=$this->List_tiket_closed_model->tampilkan_no_breach_closed_developer($tgl_awal,$tgl_akhir); 
                helper_log("baca", "mencari No Breach List Tiket Closed");
                $this->template->load('template','list_tiket/closed/list_no_breach_tiket_closed_developer',$data);
            }else{
                redirect(site_url('security/akses')); 
            }

        }else{
            $this->session->set_flashdata('message_failed',"Pencarian Tidak Tersedia");
            redirect(site_url('List_tiket_closed'));
        }

    }

}
