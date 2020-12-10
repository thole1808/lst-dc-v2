<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_tiket_ongoing extends CI_Controller{
    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('List_tiket_ongoing_model');
        $this->load->library('form_validation');   
        $this->load->library('encryption');  
        $this->load->helper('tgl_indo_helper');   
    }

    // Tiket Ongoing All sesuai Group User Level
    public function index(){
        // List Tiket Default All Ongoing Untuk All Group Helpdesk
        if($this->session->userdata('id_user_level') =='6'){
            $data['list_tiket_ongoing'] = $this->List_tiket_ongoing_model->tampilkan_all_ongoing_helpdesk();
            $this->template->load('template','list_tiket/ongoing/list_all_ongoing_helpdesk',$data);

        // List Tiket Default All Ongoing Untuk All user Group Programmer
        }elseif($this->session->userdata('id_user_level') =='5'){
            $data['list_tiket_ongoing'] = $this->List_tiket_ongoing_model->tampilkan_all_ongoing_sys_prog();
            $this->template->load('template','list_tiket/ongoing/list_all_ongoing_sys_prog',$data);

        // List Tiket Default All Ongoing Untuk All user Group Sysadmin
        }elseif($this->session->userdata('id_user_level') =='4'){
            $data['list_tiket_ongoing'] = $this->List_tiket_ongoing_model->tampilkan_all_ongoing_sys_prog();
            $this->template->load('template','list_tiket/ongoing/list_all_ongoing_sys_prog',$data);

        // List Tiket Default All Ongoing Untuk  Developer LST-DC
        }elseif($this->session->userdata('id_user_level') =='1'){
            $data['list_tiket_ongoing'] = $this->List_tiket_ongoing_model->tampilkan_all_ongoing_developer();
            $this->template->load('template','list_tiket/ongoing/list_all_ongoing_sys_prog',$data);
        
        }else{
            // User Tidak bisa Akses
            redirect(site_url('security/akses'));
        }

    }

    // Pencarian Tiket Ongoing All,Breach & No Breach sesuai Group User Level
    public function cari(){
        $this->load->model('List_tiket_ongoing_model');
        // Akses Pencarian Tiket Ongoing User All Group Helpdesk
        if($this->session->userdata('id_user_level') =='6'){
            // Tampilkan Filter All Ongoing Untuk All user Group Helpdesk
            if($_POST['pilihan'] == 'All'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_all_ongoing_helpdesk();
                helper_log("baca", "mencari All List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_all_ongoing_helpdesk',$data);
            // Tampilkan Filter Breach Ongoing Untuk All user Group Helpdesk
            }elseif($_POST['pilihan'] == 'Breach'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_breach_helpdesk();
                helper_log("baca", "mencari Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_breach_ongoing_helpdesk',$data); 
            // Tampilkan Filter No Breach Ongoing Untuk All user Group Helpdesk
            }elseif ($_POST['pilihan'] == 'No Breach') {
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_no_breach_helpdesk(); 
                helper_log("baca", "mencari No Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_no_breach_ongoing_helpdesk',$data);
            //Jika Pencarian Tidak Ditemukan / Tidak Tersedia
            }else{
                $this->session->set_flashdata('gagal',"Pencarian Tidak Tersedia");
                redirect(site_url('list_tiket_ongoing'));
            }

        // Akses Pencarian Tiket Ongoing User All Group Programmer
        }elseif($this->session->userdata('id_user_level') =='5'){
            // Tampilkan Filter All Ongoing Untuk All user Group Programmer
            if($_POST['pilihan'] == 'All'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_all_ongoing_sys_prog();
                helper_log("baca", "mencari All List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_all_ongoing_sys_prog',$data);
            // Tampilkan Filter Breach Ongoing Untuk All user Group Programmer
            }elseif($_POST['pilihan'] == 'Breach'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_breach_ongoing_sys_prog();
                helper_log("baca", "mencari Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_breach_ongoing_sys_prog',$data); 
            // Tampilkan Filter No Breach Ongoing Untuk All user Group Programmer
            }elseif ($_POST['pilihan'] == 'No Breach') {
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->
                tampilkan_no_breach_sys_prog(); 
                helper_log("baca", "mencari No Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_no_breach_ongoing_sys_prog',$data);
            // //Jika Pencarian Tidak Ditemukan / Tidak Tersedia
            }else{
                $this->session->set_flashdata('gagal',"Pencarian Tidak Tersedia");
                redirect(site_url('list_tiket_ongoing'));
            }

        // Akses Pencarian Tiket Ongoing User All Group Sysadmin
        }elseif($this->session->userdata('id_user_level') =='4'){
            // Tampilkan Filter All Ongoing Untuk All user Group Sysadmin  & Prog
            if($_POST['pilihan'] == 'All'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_all_ongoing_sys_prog();
                helper_log("baca", "mencari All List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_all_ongoing_sys_prog',$data);
            // Tampilkan Filter Breach Ongoing Untuk All user Group Sysadmin & Prog
            }elseif($_POST['pilihan'] == 'Breach'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_breach_ongoing_sys_prog();
                helper_log("baca", "mencari Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_breach_ongoing_sys_prog',$data); 
            // Tampilkan Filter No Breach Ongoing Untuk All user Group Sysadmin & Prog
            }elseif ($_POST['pilihan'] == 'No Breach') {
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->
                tampilkan_no_breach_sys_prog(); 
                helper_log("baca", "mencari No Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_no_breach_ongoing_sys_prog',$data);
            // //Jika Pencarian Tidak Ditemukan / Tidak Tersedia
            }else{
                $this->session->set_flashdata('gagal',"Pencarian Tidak Tersedia");
                redirect(site_url('list_tiket_ongoing'));
            }

        // Akses Pencarian Tiket Ongoing User Developer LST-DC
        }elseif($this->session->userdata('id_user_level') =='1'){
            // Tampilkan Filter All Ongoing Untuk User Developer LST-DC
            if($_POST['pilihan'] == 'All'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_all_ongoing_developer();
                helper_log("baca", "mencari All List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_all_ongoing_developer',$data);
            // Tampilkan Filter Breach Ongoing Untuk User Developer LST-DC
            }elseif($_POST['pilihan'] == 'Breach'){ 
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_breach_ongoing_developer();
                helper_log("baca", "mencari Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_breach_ongoing_developer',$data); 
            // Tampilkan Filter No Breach Ongoing Untuk User Developer LST-DC
            }elseif ($_POST['pilihan'] == 'No Breach') {
                $data['list_tiket_ongoing']=$this->List_tiket_ongoing_model->tampilkan_no_breach_developer(); 
                helper_log("baca", "mencari No Breach List Tiket Ongoing");
                $this->template->load('template','list_tiket/ongoing/list_no_breach_ongoing_developer',$data);
            // //Jika Pencarian Tidak Ditemukan / Tidak Tersedia
            }else{
                $this->session->set_flashdata('gagal',"Pencarian Tidak Tersedia");
                redirect(site_url('list_tiket_ongoing'));
            }
        }else{
            redirect(site_url('security/akses'));
        }
    }

    // Mencari Level untuk pengiriman Tiket Ke Sysadmin / Programmer 
    function get_level() {
        $id = $this->input->post('id');
        $data = $this->List_tiket_ongoing_model->get_level($id);
        echo json_encode($data);
    }

    // Cari User Handle
    public function cari_user_handle(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->List_tiket_ongoing_model->cari_user_handle($searchTerm);
      echo json_encode($response);
    }

    // // Cari Klasifikasi
    // public function cari_klasifikasi(){
    //   $searchTerm = $this->input->post('searchTerm');
    //   $idprod = $this->input->post('idprod');
    //   $response = $this->List_tiket_ongoing_model->cari_klasifikasi($searchTerm,$idprod);
    //   echo json_encode($response);
    // }

    // Cari Item Klasifikasi
    public function cari_item_klasifikasi(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->List_tiket_ongoing_model->cari_item_klasifikasi($searchTerm);
      echo json_encode($response);
    }

    // Cari Penyebab Insiden
    public function cari_penyebab_insiden(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->List_tiket_ongoing_model->cari_penyebab_insiden($searchTerm);
      echo json_encode($response);
    }

    // Detail Tiket Ongoing
    public function detail_tiket($id){
        $id = decrypt_url($id);
        $row = $this->List_tiket_ongoing_model->detail($id);
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
            $data['lampiran_tiket_masuk'] = $this->List_tiket_ongoing_model->lampiran_tiket_masuk($row->no_tiket);
            $data['lampiran_tiket_update'] = $this->List_tiket_ongoing_model->lampiran_tiket_update($row->no_tiket);
            $data['tampil_riwayat_tiket'] = $this->List_tiket_ongoing_model->riwayat_tiket($row->no_tiket);
            helper_log("baca", "melihat detail List Tiket Ongoing");
            $this->template->load('template', 'list_tiket/ongoing/v_detail_tiket_ongoing', $data);
        }else{
            $this->session->set_flashdata('gagal',"Data Tidak Ada");
            redirect(site_url('list_tiket_ongoing'));
        }
    }

    // Kirim Tiket Untuk Helpdesk
    public function kirim_tiket($id){
        $id = decrypt_url($id);
        $row = $this->List_tiket_ongoing_model->get_by_id($id);
        // Mengirim Tiket Untuk Helpdesk
        if($this->session->userdata('id_user_level') =='6'){
            if ($row){
                // Jika Tidak Ada Pengiriman Bisa Mengirim Tiket
                if(empty($row->id_user_level)){
                    $data = array(
                        'kirim' => 'Kirim Tiket',
                        'action' => site_url('list_tiket_ongoing/kirim_tiket_action'),
                        'id_trans_tiket' => set_value('id_trans_tiket', $row->id_trans_tiket),
                        'no_tiket' => set_value('no_tiket', $row->no_tiket),
                        'id_user_level' => set_value('id_user_level', $row->id_user_level),
                        'penerima_tiket' => set_value('penerima_tiket', $row->penerima_tiket),
                    );
                    $this->template->load('template','list_tiket/v_kirim_tiket',$data);

                // Tiket balik Ke NOC / Helpdesk. Jika ada salah pengiriman Tiket yang di lempar oleh yg handle ke NOC / Helpdesk
                }elseif($row->id_user_level=='6'){
                    $data = array(
                        'kirim' => 'Kirim Tiket',
                        'action' => site_url('list_tiket_ongoing/kirim_tiket_action'),
                        'id_trans_tiket' => set_value('id_trans_tiket', $row->id_trans_tiket),
                        'no_tiket' => set_value('no_tiket', $row->no_tiket),
                        'id_user_level' => set_value('id_user_level', $row->id_user_level),
                        'penerima_tiket' => set_value('penerima_tiket', $row->penerima_tiket),
                    );
                    $this->template->load('template','list_tiket/v_kirim_tiket',$data);
                }else{
                  $this->session->set_flashdata('gagal',"Tidak Bisa Mengirim Tiket");
                  redirect(site_url('list_tiket_ongoing')); 
                }
            }else{
                $this->session->set_flashdata('gagal',"Data Tidak Sesuai");
                redirect(site_url('list_tiket_ongoing')); 
            }
        }else{
            redirect(site_url('security/akses')); 
        }
    }
    // Kirim Tiket Untuk Helpdesk

    // Kirim Tiket Action Untuk Helpdesk
    public function kirim_tiket_action(){
        $this->form_validation->set_rules('id_user_level', 'Kirim Tiket Ke', 'trim|required');
        $this->form_validation->set_rules('penerima_tiket', 'Penerima Tiket', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->kirim_tiket($this->input->post('id_trans_tiket', TRUE));
        }else{
            $data = array(
              'id_trans_tiket' => $this->input->post('id_trans_tiket',TRUE),
              'id_user_level' => $this->input->post('id_user_level',TRUE),
              'penerima_tiket' => $this->input->post('penerima_tiket',TRUE),
            );

            // Kirim Tiket Riwayat
            $id_user_level_pengubah = $_SESSION['id_user_level']; //Session Id Level Pembuat Tiket
            $user_pengubah = $_SESSION['full_name']; //Session User Pembuat Tiket
            $status_tiket='STK-091020-0001'; // Status Tiket Open
            $aksi = 'Kirim Tiket';
            $data2 = array(
                // 'id_riwayat_tiket' => kode_unik_riwayat_tiket('id_riwayat_tiket',TRUE),
                'no_tiket' => $this->input->post('no_tiket',TRUE),
                'id_user_level_pengubah' => $id_user_level_pengubah,
                'diubah_oleh' => $user_pengubah,
                'id_status_tiket' => $status_tiket,
                'tgl_diubah' => date('Y-m-d H:i:s'),
                'id_user_level' => $this->input->post('id_user_level',TRUE),
                'penerima_tiket' => $this->input->post('penerima_tiket',TRUE),
                'aksi' => $aksi,
            );
            // Kirim Tiket Riwayat

            // Reset Auto Increment
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_riwayat_tiket AUTO_INCREMENT =1');
            // Reset Auto Increment

            // Insert Data Kirim Tiket Riwayat
            $this->List_tiket_ongoing_model->insert_riwayat_tiket($data2); 

            helper_log("edit", "mengirim List Tiket Ongoing");
            $this->List_tiket_ongoing_model->update($this->input->post('id_trans_tiket', TRUE), $data);
            $this->session->set_flashdata('sukses',"Tiket Berhasil Di Kirim");
            redirect(site_url('list_tiket_ongoing'));
        }
    }
    // Kirim Tiket Action Untuk Helpdesk

    // Tangani Tiket
    public function tangani_tiket($id){
        // Tangani Tiket Helpdesk
        if($this->session->userdata('id_user_level') =='6'){
            $id = decrypt_url($id);
            $row = $this->List_tiket_ongoing_model->get_by_id($id);
                // echo "<pre>";
                //     print_r($row);
                //     exit();
                // echo "</pre>";
            // if($row->id_user_level!='') {
            //     $this->session->set_flashdata('gagal',"Tidak bisa Tangani Tiket");
            //     redirect(site_url('list_tiket_ongoing'));
            // Jika ada yang handle dari Status tiket In Progress tidak diizinkan 
            if($row->nama_status =='In Progress'){
                $this->session->set_flashdata('gagal',"Tiket Sudah In Progress");
                redirect(site_url('list_tiket_ongoing'));
            }else{
                if ($row){
                    $data = array(
                        'kirim' => 'Tangani Tiket',
                        'action' => site_url('list_tiket_ongoing/tangani_tiket_action'),
                        'id_trans_tiket' => set_value('id_trans_tiket', $row->id_trans_tiket),
                        'no_tiket' => set_value('no_tiket', $row->no_tiket),
                        'id_jenis_tiket' => set_value('id_jenis_tiket', $row->id_jenis_tiket),
                        
                        // Klasifikasi  
                        'id_klasifikasi' => set_value('id_klasifikasi', $row->id_klasifikasi),
                        'id_item_klasifikasi' => set_value('id_item_klasifikasi', $row->id_item_klasifikasi),
                        'id_penyebab' => set_value('id_penyebab', $row->id_penyebab),
                        'id_status_tiket' => set_value('id_status_tiket', $row->id_status_tiket),
                        'catatan' => set_value('catatan', $row->catatan),

                        // Keperluan kirim email
                        'id_admin' => set_value('id_admin', $row->id_admin),
                        'email_admin' => set_value('email_admin', $row->email_admin),
                    );
                    $this->template->load('template','list_tiket/v_tangani_tiket',$data);

                }else{
                    $this->session->set_flashdata('gagal',"Data Tidak Ada");
                    redirect(site_url('list_tiket_ongoing'));
                }
            }

        // Tangani Tiket Programmer
        }elseif($this->session->userdata('id_user_level') =='5'){  
            $id = decrypt_url($id);
            $row = $this->List_tiket_ongoing_model->get_by_id($id);
            if ($row) {
                $data = array(
                    'kirim' => 'Tangani Tiket',
                    'action' => site_url('list_tiket_ongoing/tangani_tiket_action'),
                    'id_trans_tiket' => set_value('id_trans_tiket', $row->id_trans_tiket),
                    'no_tiket' => set_value('no_tiket', $row->no_tiket),
                    'id_jenis_tiket' => set_value('id_jenis_tiket', $row->id_jenis_tiket),
                    'id_klasifikasi' => set_value('id_klasifikasi', $row->id_klasifikasi),
                    'id_item_klasifikasi' => set_value('id_item_klasifikasi', $row->id_item_klasifikasi),
                    'id_status_tiket' => set_value('id_status_tiket', $row->id_status_tiket),
                    'id_penyebab' => set_value('id_penyebab', $row->id_penyebab),
                    'catatan' => set_value('catatan', $row->catatan),
                    // Keperluan kirim email
                    'id_admin' => set_value('id_admin', $row->id_admin),
                    'email_admin' => set_value('email_admin', $row->email_admin),
                );
                $this->template->load('template','list_tiket/v_tangani_tiket',$data);
            }else{
                $this->session->set_flashdata('gagal',"Data Tidak Ada");
                redirect(site_url('list_tiket_ongoing'));
            }

        // Tangani Tiket Sysadmin
        }elseif($this->session->userdata('id_user_level') =='4'){
            $id = decrypt_url($id);
            $row = $this->List_tiket_ongoing_model->get_by_id($id);
            if ($row) {
                $data = array(
                    'kirim' => 'Tangani Tiket',
                    'action' => site_url('list_tiket_ongoing/tangani_tiket_action'),
                    'id_trans_tiket' => set_value('id_trans_tiket', $row->id_trans_tiket),
                    'no_tiket' => set_value('no_tiket', $row->no_tiket),
                    'id_jenis_tiket' => set_value('id_jenis_tiket', $row->id_jenis_tiket),
                    'id_klasifikasi' => set_value('id_klasifikasi', $row->id_klasifikasi),
                    'id_item_klasifikasi' => set_value('id_item_klasifikasi', $row->id_item_klasifikasi),
                    'id_status_tiket' => set_value('id_status_tiket', $row->id_status_tiket),
                    'id_penyebab' => set_value('id_penyebab', $row->id_penyebab),
                    'catatan' => set_value('catatan', $row->catatan),
                    // Keperluan kirim email
                    'id_admin' => set_value('id_admin', $row->id_admin),
                    'email_admin' => set_value('email_admin', $row->email_admin),
                );
                $this->template->load('template','list_tiket/v_tangani_tiket',$data);
            }else{
                $this->session->set_flashdata('gagal',"Data Tidak Ada");
                redirect(site_url('list_tiket_ongoing'));
            }

        }else{
            redirect(site_url('security/akses')); 
        }
    }
    // Tangani Tiket

    // Tangani Tiket Action
    public function tangani_tiket_action(){
        $this->form_validation->set_rules('id_trans_tiket', 'ID Transaksi Tiket', 'trim');
        $this->form_validation->set_rules('id_klasifikasi', 'Klasifikasi', 'trim|required');
        $this->form_validation->set_rules('id_item_klasifikasi', 'Item Klasifikasi', 'trim|required');
        // $this->form_validation->set_rules('id_penyebab', 'Penyabab / Root Cause', 'trim|required');
        $this->form_validation->set_rules('id_status_tiket', 'Status Tiket', 'trim|required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->tangani_tiket($this->input->post('id_trans_tiket', TRUE));
        }else{
            
            $id_user_level_pengubah = $_SESSION['id_user_level']; //Session Id Level Pengubah Tiket
            $user_update = $this->session->userdata('full_name','diubah_oleh');
            $data = array(
              'id_trans_tiket' => $this->input->post('id_trans_tiket',TRUE),
              'id_klasifikasi' => $this->input->post('id_klasifikasi',TRUE),
              'id_item_klasifikasi' => $this->input->post('id_item_klasifikasi',TRUE),
              'id_penyebab' => $this->input->post('id_penyebab',TRUE),
              'id_status_tiket' => $this->input->post('id_status_tiket',TRUE),
              'catatan' => $this->input->post('catatan',TRUE),
              'id_user_level_pengubah' => $id_user_level_pengubah,
              'diubah_oleh' => $user_update,
              'tgl_diubah' => date('Y-m-d H:i:s'),
              // Keprluan kirim email
              'id_admin' => $this->input->post('id_admin',TRUE),
            );

            // Konfigurasi email dengan Webmail Lawangsewu
            $from_email = "agus@lawangsewu.com"; 
            // $email_tujuan = $this->input->post('email_admin'); // email tujuan belum di izinkan 
            $email_tujuan = "agus@lawangsewu.com"; // email tujuan belum di izinkan 
            // $isi = $this->load->view('list_tiket/v_tiket_kirim_email',$data,TRUE);
            $config = Array( 
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE,
                'priority' => '1',
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'mail.lawangsewu.com',
                'smtp_user' =>  $from_email,  // Email 
                'smtp_pass'   => 'thole1808',  // Password 
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            );

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from($from_email, 'Helpdesk PT. Lawang Sewu Teknologi');
            
            // Email penerima
            $this->email->to($email_tujuan); // Ganti dengan email tujuan
            
            // Lampiran email, isi dengan url/path file
            // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
            // Subject email
            $this->email->subject('Tiket LST-DC || PT. Lawang Sewu Teknologi');
            
            $data2 = array(
              'id_status_tiket' => $this->input->post('id_status_tiket',TRUE),
              'no_tiket' => $this->input->post('no_tiket',TRUE),
              // Keprluan kirim email
              'id_admin' => $this->input->post('id_admin',TRUE),
              'tgl_dibuat' => date('Y-m-d H:i:s'),
            );

            $message = $this->load->view('list_tiket/v_tiket_kirim_email', $data2, true);
            $this->email->message($message);
            $this->email->send();
            // KIRIM EMAIL

            // UPLOAD LAMPIRAN UPDATE PENANGANAN
            // Hitung Jumlah File/Gambar yang dipilih
            $no_tiket = $this->input->post('no_tiket',TRUE);
            $jumlahData = count($_FILES['lampiran_update_tiket_penanganan']['name']);
            // echo $jumlahData;
            // exit();

            // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
            for ($i=0; $i < $jumlahData ; $i++):

                // Inisialisasi Nama,Tipe,Dll.
                $_FILES['file']['name']     = $_FILES['lampiran_update_tiket_penanganan']['name'][$i];
                $_FILES['file']['type']     = $_FILES['lampiran_update_tiket_penanganan']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['lampiran_update_tiket_penanganan']['tmp_name'][$i];
                $_FILES['file']['size']     = $_FILES['lampiran_update_tiket_penanganan']['size'][$i];

                // Konfigurasi Upload
                $config['upload_path']          = './assets/lampiran_update_tiket_penanagan/';
                $config['max_size']             = 50000;
                // $config['max_width']            = 2048;
                // $config['max_height']           = 2000;
                $config['encrypt_name']         = true;
                // $config['overwrite']            = TRUE;
                $config['allowed_types']        = 'jpeg|jpg|png';

                // Memanggil Library Upload dan Setting Konfigurasi
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){ // Jika Berhasil Upload
                    $fileData = $this->upload->data(); // Lakukan Upload Data
                    // Membuat Variable untuk dimasukkan ke Database
                    $uploadData[$i]['no_tiket'] = $no_tiket; 
                    $uploadData[$i]['lampiran_update_tiket_penanganan'] = $fileData['file_name']; 
                }

            endfor; // Penutup For
            if($uploadData !== null){ // Jika Berhasil Upload
               
                // Reset Auto Increment
                $this->load->database();    
                $this->db->query('ALTER TABLE tbl_lampiran_update_tiket_penanganan AUTO_INCREMENT =1');
                // Reset Auto Increment

                // Insert ke Database 
                $insert = $this->db->insert_batch('tbl_lampiran_update_tiket_penanganan',$uploadData);
            }
            // UPLOAD LAMPIRAN UPDATE PENANGANAN

            $this->List_tiket_ongoing_model->update($this->input->post('id_trans_tiket', TRUE), $data);
           
            // Tangani Tiket Riwayat
            $id_user_level_pengubah = $_SESSION['id_user_level']; //Session Id Level Pengubah Tiket
            $user_pengubah = $_SESSION['full_name']; //Session User Pembuat Tiket
            // $status_tiket='STK-091020-0001'; // Status Tiket Open
            $aksi = 'Tangani Tiket';
            $data2 = array(
                // 'id_riwayat_tiket' => kode_unik_riwayat_tiket('id_riwayat_tiket',TRUE),
                'no_tiket' => $this->input->post('no_tiket',TRUE),
                'id_user_level_pengubah' => $id_user_level_pengubah,
                'diubah_oleh' => $user_pengubah,
                'id_status_tiket' => $this->input->post('id_status_tiket',TRUE),
                'tgl_diubah' => date('Y-m-d H:i:s'),
                'aksi' => $aksi,
            );
            // Tangani Tiket Riwayat

            // Reset Auto Increment
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_riwayat_tiket AUTO_INCREMENT =1');
            // Reset Auto Increment

            // Insert Data Kirim Tiket Riwayat
            $this->List_tiket_ongoing_model->insert_riwayat_tiket($data2); 

            helper_log("edit", "menangani Tiket List Ongoing");
            $this->session->set_flashdata('sukses',"Tiket Berhasil Di Tangani");
            redirect(site_url('list_tiket_ongoing'));
        }
    }
    // Tangani Tiket Action


    // Salah Kirim Tiket Untuk Yang Handle Tiket Sysadmin / Programmer
    function salah_tiket($id){
        $id = decrypt_url($id);
        $row = $this->List_tiket_ongoing_model->get_by_id($id);

        $id_trans_tiket = $row->id_trans_tiket; // Id Trans Tiket
        $id_user_level_noc ='6'; // Id User Level NOC
        $status_tiket ='STK-091020-0001'; // Id Status Tiket
        $penerima_tiket = $row->dibuat_oleh;
        $data =array(
            'id_status_tiket' => $this->input->post('id_status_tiket',TRUE),
            'id_status_tiket'=> $status_tiket,
            'id_user_level'=> $id_user_level_noc,
            'penerima_tiket' => $penerima_tiket
        );
        
        helper_log("edit", "mengirim salah Tiket List Ongoing");
        // Update Data Tbl Tiket
        $this->List_tiket_ongoing_model->update($id,$data);
        // Update Data Tbl Tiket

        // Salah Kirim Tiket Riwayat
        $no_tiket = $row->no_tiket;
        $id_user_level_pengubah = $_SESSION['id_user_level']; //Session Id Level Pembuat Tiket
        $user_pengubah = $_SESSION['full_name']; //Session User Pembuat Tiket
        $status_tiket='STK-091020-0001'; // Status Tiket Open
        $aksi = 'Salah Kirim Tiket';
        $id_user_level_noc ='6'; // Id User Level NOC
        $data2 = array(
            // 'id_riwayat_tiket' => kode_unik_riwayat_tiket('id_riwayat_tiket',TRUE),
            'no_tiket' => $no_tiket,
            'id_user_level_pengubah' => $id_user_level_pengubah,
            'diubah_oleh' => $user_pengubah,
            'id_status_tiket' => $status_tiket,
            'tgl_diubah' => date('Y-m-d H:i:s'),
            'id_user_level' => $id_user_level_noc,
            'penerima_tiket' => $this->input->post('penerima_tiket',TRUE),
            'aksi' => $aksi,
        );
        // Salah Kirim Tiket Riwayat

        // Reset Auto Increment
        $this->load->database();    
        $this->db->query('ALTER TABLE tbl_riwayat_tiket AUTO_INCREMENT =1');
        // Reset Auto Increment

        // Insert Data Kirim Tiket Riwayat
        $this->List_tiket_ongoing_model->insert_riwayat_tiket($data2); 
        // Salah Kirim Tiket Riwayat

        $this->session->set_flashdata('sukses',"Tiket Salah Berhasil Di Kirim");
        redirect(site_url('list_tiket_ongoing'));
    }
    // Salah Kirim Tiket Untuk Yang Handle Tiket Sysadmin / Programmer

    // Memilih Klasifikasi Tangani Tiket
    function pilih_klasifikasi() {
        $id = $this->input->post('id');
        $data = $this->List_tiket_ongoing_model->pilih_klasifikasi($id);
        echo json_encode($data);
    }

    // Pilih Penyebab
    // function pilih_penyebab(){
    //     // $id = $this->input->post('id');
    //     $data = $this->List_tiket_ongoing_model->pilih_penyebab();
    //     echo json_encode($data);
    // }

    // Menambahkan data Master Penyebab / Root Cause
    function simpan_data_penyebab(){
        $user_create = $this->session->userdata('full_name','dibuat_oleh');
        $data = array(
            'id_penyebab' => kode_unik_master_penyebab_utama('id_penyebab',TRUE),
            'nama_penyebab' => $this->input->post('nama_penyebab',TRUE),
            'dibuat_oleh' => $user_create,
            'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
        );
        helper_log("add", "menambahkan Master Penyebab Utama / Root Cause");
        $this->List_tiket_ongoing_model->simpan_data($data);
        echo json_encode($data);
    }

    // Untuk Mengahapus Data Tbl Tiket Serta Lampiran Masuk & Update & Riwayat Tiket
    public function delete($id){ 
        // if($this->session->userdata('id_user_level') =='1'){  
        // }else{
        //     // Jika User tidak bisa Hapus
        //     redirect(site_url('security/akses'));
        // }
        $this->load->helper('file');
        $id = decrypt_url($id);
        $row = $this->List_tiket_ongoing_model->get_by_id($id);

        if ($row) {
            // helper_log("hapus", "hapus List Tiket Ongoing".$row->id_trans_tiket);
            helper_log("hapus", "hapus List Tiket Ongoing");
    
            // Reset Auto Increment Tbl Riwayat
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_riwayat_tiket AUTO_INCREMENT =1');
            // Reset Auto Increment Tbl Riwayat

            // Reset Auto Increment Lampiran Masuk
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_lampiran_tiket_masuk AUTO_INCREMENT =1');
            // Reset Auto Increment Lampiran Masuk

            // Reset Auto Increment Lampiran Update
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_lampiran_update_tiket_penanganan AUTO_INCREMENT =1');
            // Reset Auto Increment Lampiran Update

            // Hapus Lampiran Masuk Serta File nya dan Name File Di Database
            $id_lampiran_masuk = $row->no_tiket;
            $lampiran_masuk = $this->List_tiket_ongoing_model->view_row_delete_lampiran_tiket_masuk($row->no_tiket);
            $path1 = './assets/lampiran_tiket_keluhan_masuk/'.$lampiran_masuk->lampiran_tiket_keluhan_masuk;
            @unlink($path1);
            $this->List_tiket_ongoing_model->delete_lampiran_masuk($id_lampiran_masuk,$lampiran_masuk);
            // Hapus Lampiran Masuk Serta File nya dan Name File Di Database

            // Hapus Lampiran Update Penanganganan Serta File nya dan Name File Di Database
            $id_lampiran_update = $row->no_tiket;
            $lampiran_update_penanganan = $this->List_tiket_ongoing_model->view_row_delete_lampiran_tiket_update($row->no_tiket);
            $path2 = './assets/lampiran_update_tiket_penanagan/'.$lampiran_update_penanganan->lampiran_update_tiket_penanganan;
            @unlink($path2);
            $this->List_tiket_ongoing_model->delete_lampiran_update($id_lampiran_update,$lampiran_update_penanganan);
            // Hapus Lampiran Update Penanganganan Serta File nya dan Name File Di Database
            
            // Hapus Transaksi Riwayat dengan berdasarkan No Tiket
            $riwayat = $this->List_tiket_ongoing_model->view_row_delete_riwayat_tiket($row->no_tiket);
            $id_riwayat_tiket = $row->no_tiket;
            $this->List_tiket_ongoing_model->delete_riwayat($id_riwayat_tiket,$riwayat);
            // Hapus Transaksi Riwayat dengan berdasarkan No Tiket

            // Hapus Data Tabel Tiket
            $this->List_tiket_ongoing_model->delete($id, $row);
            // Hapus Data Tabel Tiket

            $this->session->set_flashdata('sukses', 'Data berhasil di hapus.');
            redirect(site_url('list_tiket_ongoing'));
        }else{
            $this->session->set_flashdata('gagal', 'Data Tidak Ada');
            redirect(site_url('list_tiket_ongoing'));
        }
    }   

    // Get Penyebab
    public function get_penyebab(){
      // Search term
      $searchTerm = $this->input->get('searchTerm');
      // Get Penyebab
      $response = $this->List_tiket_ongoing_model->getPenyebab($searchTerm);
      echo json_encode($response);
    }

}
