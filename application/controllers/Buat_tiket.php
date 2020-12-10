<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buat_tiket extends CI_Controller{
    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('Buat_tiket_model');
        $this->load->library('form_validation');      
    }

    // Memilih Data Layanan
    function pilih_layanan($id_layanan){
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sub_layanan');
        $query = $this->db->join('master_item_layanan', 'master_item_layanan.id_item_layanan = tbl_sub_layanan.id_item_layanan');
        $query = $this->db->group_by('master_item_layanan.id_item_layanan');
        $query = $this->db->get_where('tbl_sub_layanan e',array('tbl_sub_layanan.id_layanan'=>$id_layanan));
        $data = "<option value=''>-- silahkan pilih --</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_item_layanan."'>".$value->nama_item_layanan."</option>";
        }
        echo $data;
    }

    // Mencari Data Klien & Sub Admin Klien
    function pilih_id_klien($id_klien){
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sub_admin_klien');
        $query = $this->db->join('master_admin_klien', 'master_admin_klien.id_admin = tbl_sub_admin_klien.id_admin');
        $query = $this->db->group_by('master_admin_klien.id_admin');
        $query = $this->db->get_where('tbl_sub_admin_klien e',array('tbl_sub_admin_klien.id_klien'=>$id_klien));
        $data = "<option value=''>-- silahkan pilih --</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_admin."'>".$value->nama_admin."</option>";
        }
        echo $data;
    } 

    // Mencari Data Admin  & Email Admin Klien untuk keperluan kirim ke email
    function pilih_admin($id_admin){
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sub_admin_klien');
        $query = $this->db->join('master_admin_klien', 'master_admin_klien.id_admin = tbl_sub_admin_klien.id_admin');
        $query = $this->db->group_by('master_admin_klien.id_admin');
        $query = $this->db->get_where('tbl_sub_admin_klien e',array('tbl_sub_admin_klien.id_admin'=>$id_admin));
        // $data = "<option value=''> - Pilih - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->email_admin."'>".$value->email_admin."</option>";
        }
        echo $data;
    }  

    // Mencari Jenis Tiket Berdasarkan Dampak 
    function pilih_jenis_tiket($id_jenis_tiket){
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sub_dampak_insiden');
        $query = $this->db->join('master_dampak', 'master_dampak.id_dampak = tbl_sub_dampak_insiden.id_dampak');
        $query = $this->db->group_by('master_dampak.id_dampak');
        $query = $this->db->get_where('tbl_sub_dampak_insiden e',array('tbl_sub_dampak_insiden.id_jenis_tiket'=>$id_jenis_tiket));
        $data = "<option value=''>-- silahkan pilih --</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_dampak."'>".$value->nama_dampak."</option>";
        }
        echo $data;
    }  

    // Mencari Level Jenis Tiket Berdasarkan Level Dampak 
    function pilih_dampak_jenis_tiket($id_dampak){
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_sub_urgency_insiden');
        $query = $this->db->join('master_dampak', 'master_dampak.id_dampak = tbl_sub_urgency_insiden.id_dampak');
        $query = $this->db->join('master_urgency', 'master_urgency.id_urgency = tbl_sub_urgency_insiden.id_urgency');
        $query = $this->db->group_by('master_dampak.id_dampak');
        $query = $this->db->group_by('master_urgency.id_urgency');
        $query = $this->db->get_where('tbl_sub_urgency_insiden e',array('tbl_sub_urgency_insiden.id_dampak'=>$id_dampak));
        $data = "<option value=''>-- silahkan pilih --</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_urgency."'>".$value->nama_urgency."</option>";
        }
        echo $data;
    }  

    // Mencari Level Jenis Tiket Berdasarkan Urgency serta Prioritas dari Urgency
    function get_jenis_tiket_level_urgency() {
        $id = $this->input->post('id');
        $id2 = $this->input->post('id2');
        $data = $this->Buat_tiket_model->get_jenis_tiket_level_urgency($id,$id2);
        echo json_encode($data);
    }

    // Cari Layanan
    public function cari_layanan(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Buat_tiket_model->cari_layanan($searchTerm);
      echo json_encode($response);
    }

    // Cari Shift
    public function cari_shift(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Buat_tiket_model->cari_shift($searchTerm);
      echo json_encode($response);
    }

    // Cari Klien
    public function cari_klien(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Buat_tiket_model->cari_klien($searchTerm);
      echo json_encode($response);
    }

    // Tampil View Form Tiket
    public function index(){
        if($this->session->userdata('id_user_level') =='1'){
            $data = array(
                'button' => 'Buat',
                'action' => site_url('buat_tiket/index_action'),
            );
            // $data['shift'] = $this->Buat_tiket_model->get_shift_combo();
            $data['jenis_tiket'] = $this->Buat_tiket_model->get_jenis_tiket_combo();
            // $data['layanan'] = $this->Buat_tiket_model->get_layanan_combo();
            // $data['klien'] = $this->Buat_tiket_model->get_klien_combo();
            $this->template->load('template','buat_tiket/create',$data);
        }elseif($this->session->userdata('id_user_level') =='6'){
            $data = array(
                'button' => 'Buat',
                'action' => site_url('buat_tiket/index_action'),
            );
            // $data['shift'] = $this->Buat_tiket_model->get_shift_combo();
            $data['jenis_tiket'] = $this->Buat_tiket_model->get_jenis_tiket_combo();
            // $data['layanan'] = $this->Buat_tiket_model->get_layanan_combo();
            // $data['klien'] = $this->Buat_tiket_model->get_klien_combo();
            $this->template->load('template','buat_tiket/create',$data);
        }else{
            redirect(site_url('security/akses'));
        }
    }

    // Aksi Simpan Tiket
    function index_action(){
        $this->form_validation->set_rules('id_trans_tiket', 'ID Transaksi Tiket', 'trim');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data gagal tersimpan.');
        }else{
            // UPLOAD LAMPIRAN
            // Hitung Jumlah File/Gambar yang dipilih
            $no_tiket = kode_unik_no_tiket('no_tiket',TRUE);
            $jumlahData = count($_FILES['lampiran_tiket_keluhan_masuk']['name']);
            // echo $jumlahData;
            // exit();
            
            // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
            for ($i=0; $i < $jumlahData ; $i++):
               
                // Inisialisasi Nama,Tipe,Dll.
                $_FILES['file']['name']     = $_FILES['lampiran_tiket_keluhan_masuk']['name'][$i];
                $_FILES['file']['type']     = $_FILES['lampiran_tiket_keluhan_masuk']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['lampiran_tiket_keluhan_masuk']['tmp_name'][$i];
                $_FILES['file']['size']     = $_FILES['lampiran_tiket_keluhan_masuk']['size'][$i];

                // Konfigurasi Upload
                $config['upload_path']          = './assets/lampiran_tiket_keluhan_masuk/';
                $config['max_size']             = 50000;
                $config['max_width']            = 2048;
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
                    $uploadData[$i]['lampiran_tiket_keluhan_masuk'] = $fileData['file_name']; 
                }

            endfor; // Penutup For
           
            if($uploadData !== null){ // Jika Berhasil Upload
                // Reset Auto Increment
                $this->load->database();    
                $this->db->query('ALTER TABLE tbl_lampiran_tiket_masuk AUTO_INCREMENT =1');
                // Reset Auto Increment
                
                // Insert ke Database 
                $insert = $this->db->insert_batch('tbl_lampiran_tiket_masuk',$uploadData);
            }
            // UPLOAD LAMPIRAN
            
            // Insert Data Ke Table Tiket
                $id_user_level_pembuat = $_SESSION['id_user_level']; //Session Id Level Pembuat Tiket
                $status_tiket='STK-091020-0001';// Status Tiket Open
                // Data Array Insiden
                $data_insiden = array(
                    'id_trans_tiket' => kode_unik_trans_tiket('id_trans_tiket',TRUE),
                    'no_tiket' => kode_unik_no_tiket('no_tiket',TRUE),
                    'tgl_dibuat' => date('Y-m-d H:i:s'),
                    'id_admin' => $this->input->post('id_admin',TRUE),
                    'id_klien' => $this->input->post('id_klien',TRUE),
                    'id_item_layanan' => $this->input->post('id_item_layanan',TRUE),
                    'keluhan' => $this->input->post('keluhan',TRUE),
                    'id_status_tiket' => $status_tiket,
                    'id_shift' => $this->input->post('id_shift',TRUE),
                    'id_layanan' => $this->input->post('id_layanan',TRUE),
                    'id_dampak' => $this->input->post('id_dampak',TRUE),
                    'id_urgency' => $this->input->post('id_urgency',TRUE),
                    'id_prioritas' => $this->input->post('id_prioritas',TRUE),
                    'id_jenis_tiket' => $this->input->post('id_jenis_tiket',TRUE),
                    'id_user_level_pembuat' => $id_user_level_pembuat,
                    'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                );
                // Data Array Insiden
                
                // Data Array Service Request
                $data_service_request = array(
                    'id_trans_tiket' => kode_unik_trans_tiket('id_trans_tiket',TRUE),
                    'no_tiket' => kode_unik_no_tiket('no_tiket',TRUE),
                    'tgl_dibuat' => date('Y-m-d H:i:s'),
                    'id_admin' => $this->input->post('id_admin',TRUE),
                    'id_klien' => $this->input->post('id_klien',TRUE),
                    'id_item_layanan' => $this->input->post('id_item_layanan',TRUE),
                    'keluhan' => $this->input->post('keluhan',TRUE),
                    'id_status_tiket' => $status_tiket,
                    'id_shift' => $this->input->post('id_shift',TRUE),
                    'id_layanan' => $this->input->post('id_layanan',TRUE),
                    'id_dampak' => $this->input->post('id_dampak',TRUE),
                    'id_urgency' => $this->input->post('id_urgency',TRUE),
                    'id_prioritas' => null,
                    'id_jenis_tiket' => $this->input->post('id_jenis_tiket',TRUE),
                    'id_user_level_pembuat' => $id_user_level_pembuat,
                    'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                );
                // Data Array Service Request

            // Insert Data Ke Table Tiket

            // Insert Data Ke Table Tiket Riwayat
            $id_user_level_pembuat = $_SESSION['id_user_level']; //Session Id Level Pembuat Tiket
            $user_pembuat = $_SESSION['full_name']; //Session User Pembuat Tiket
            $status_tiket='STK-091020-0001'; // Status Tiket Open
            $aksi = 'Buat Tiket';
            $riwayat_tiket = array(
                // 'id_riwayat_tiket' => kode_unik_riwayat_tiket('id_riwayat_tiket',TRUE),
                'no_tiket' => kode_unik_no_tiket('no_tiket',TRUE),
                'id_user_level_pembuat' => $id_user_level_pembuat,
                'dibuat_oleh' => $user_pembuat,
                'id_status_tiket' => $status_tiket,
                'tgl_dibuat' => date('Y-m-d H:i:s'),
                'aksi' => $aksi,
            );

            // Reset Auto Increment
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_riwayat_tiket AUTO_INCREMENT =1');
            // Reset Auto Increment

            $this->Buat_tiket_model->insert_riwayat_tiket($riwayat_tiket); 
            // Insert Data Ke Table Tiket Riwayat

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

            $id_insiden = "JTK-011020-0001";
            $id_insiden_keamanan_informasi = "JTK-041020-0001";
            $id_service_request = "JTK-041020-0002";
          
            if ($_POST['id_jenis_tiket']== $id_insiden) {
                
                $message = $this->load->view('list_tiket/v_tiket_kirim_email', $data_insiden, true);
                $this->email->message($message);

                // Tampilkan pesan sukses atau error
                if($this->email->send()) {
                    echo 'Sukses! email berhasil dikirim.';
                }else{
                    echo 'Error! email tidak dapat dikirim.';
                }


            }elseif( $_POST['id_jenis_tiket']==$id_insiden_keamanan_informasi){
                
                $message = $this->load->view('list_tiket/v_tiket_kirim_email', $data_insiden, true);
                $this->email->message($message);

                // Tampilkan pesan sukses atau error
                if($this->email->send()) {
                    echo 'Sukses! email berhasil dikirim.';
                }else{
                    echo 'Error! email tidak dapat dikirim.';
                }

            }elseif($_POST['id_jenis_tiket']== $id_service_request){
               
                $message = $this->load->view('list_tiket/v_tiket_kirim_email', $data_service_request, true);
                $this->email->message($message);

                // Tampilkan pesan sukses atau error
                if($this->email->send()) {
                    echo 'Sukses! email berhasil dikirim.';
                }else{
                    echo 'Error! email tidak dapat dikirim.';
                }
            }else{
                echo "Gagal";
            }


            $id_insiden = "JTK-011020-0001";
            $id_insiden_keamanan_informasi = "JTK-041020-0001";
            $id_service_request = "JTK-041020-0002";
            if ($_POST['id_jenis_tiket']== $id_insiden) {
                $this->Buat_tiket_model->insert_insiden($data_insiden);
            }elseif( $_POST['id_jenis_tiket']==$id_insiden_keamanan_informasi){
                 $this->Buat_tiket_model->insert_insiden($data_insiden);
            }elseif($_POST['id_jenis_tiket']== $id_service_request){
                $this->Buat_tiket_model->insert_service_request($data_service_request);
            }else{
                echo "Gagal";
            }
            
            helper_log("add", "membuat Tiket");
            $this->session->userdata('full_name','dibuat_oleh');
            $this->session->set_flashdata('sukses', 'Data berhasil tersimpan.');
            redirect(site_url('list_tiket_ongoing'));
            
        }
    }

}
