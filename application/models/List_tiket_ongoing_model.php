<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_tiket_ongoing_model extends CI_Model{
    public $table = 'tbl_tiket';
    public $id = 'id_trans_tiket';
    public $order = 'DESC';

    function __construct(){
        parent::__construct();
    }

    // Menampilkan Detail Dari Tiket
    function detail($id){
        $hasil = $this->db->query("
            SELECT
                id_trans_tiket,
                id_jenis_tiket,
                no_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                    AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                    AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                    AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                    AS nama_admin,
                (select email_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                    AS email_admin,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                    AS nama_shift,
                keluhan,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                    AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                    AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                    AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                    AS nama_prioritas,
                (select deskripsi FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                    AS deskripsi,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                    AS nama_status,

                (select nama_klasifikasi FROM master_klasifikasi WHERE id_klasifikasi = tbl_tiket.id_klasifikasi)
                    AS nama_klasifikasi,

                (select nama_item_klasifikasi FROM master_item_klasifikasi WHERE id_item_klasifikasi = tbl_tiket.id_item_klasifikasi)
                    AS nama_item_klasifikasi,

                (select nama_penyebab FROM master_penyebab_utama WHERE id_penyebab = tbl_tiket.id_penyebab)
                    AS nama_penyebab,
                tgl_dibuat,
                tgl_diubah
            FROM tbl_tiket 
            WHERE id_trans_tiket='".$id."'
            AND (id_status_tiket='STK-091020-0001' OR id_status_tiket='STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $hasil->row();
    }

    // Detail Lampiran Tiket Masuk
    function lampiran_tiket_masuk($no_tiket){
        $hasil = $this->db->query("
            SELECT 
                no_tiket,
                lampiran_tiket_keluhan_masuk
            FROM tbl_lampiran_tiket_masuk
            WHERE no_tiket='".$no_tiket."'
        ");
        return $hasil->result();
    }

    // Detail Lampiran Tiket Update Penanganan
    function lampiran_tiket_update($no_tiket){
        $hasil = $this->db->query("
            SELECT 
                no_tiket,
                lampiran_update_tiket_penanganan
            FROM tbl_lampiran_update_tiket_penanganan
            WHERE no_tiket='".$no_tiket."'
        ");
        return $hasil->result();
    }

    // Detail Riwayat Tiket
    function riwayat_tiket($no_tiket){
        $hasil = $this->db->query("
            SELECT 
                no_tiket,
                id_user_level_pembuat,
                dibuat_oleh,
                id_user_level_pengubah,
                diubah_oleh,
                id_status_tiket,
                tgl_dibuat,
                tgl_diubah,
                aksi,
                (select nama_level FROM tbl_user_level where id_user_level = tbl_riwayat_tiket.id_user_level)
                AS nama_level
            FROM tbl_riwayat_tiket
            WHERE no_tiket='".$no_tiket."'
        ");
        return $hasil->result();
    }

    // Insert Data Kirim Tiket Riwayat
    function insert_riwayat_tiket($data2){
        $this->db->insert('tbl_riwayat_tiket', $data2);
    }

    // get data by id
    function get_by_id($id){
        $hasil = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                id_jenis_tiket,
                id_status_tiket,
                id_admin,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                    AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                    AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                    AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                    AS nama_admin,
                (select email_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                    AS email_admin,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                    AS nama_shift,
                keluhan,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                    AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                    AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                    AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                    AS nama_prioritas,
                (select deskripsi FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                    AS deskripsi,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                    AS nama_status,

                (select nama_klasifikasi FROM master_klasifikasi WHERE id_klasifikasi = tbl_tiket.id_klasifikasi)
                    AS nama_klasifikasi,

                (select nama_item_klasifikasi FROM master_item_klasifikasi WHERE id_item_klasifikasi = tbl_tiket.id_item_klasifikasi)
                    AS nama_item_klasifikasi,

                (select nama_penyebab FROM master_penyebab_utama WHERE id_penyebab = tbl_tiket.id_penyebab)
                    AS nama_penyebab,
                tgl_dibuat,
                tgl_diubah,
                id_user_level,
                penerima_tiket,
                dibuat_oleh
            FROM tbl_tiket 
            WHERE id_trans_tiket='".$id."'
        ");
        return $hasil->row();
    }

    // Mencari Level untuk pengiriman Tiket Ke Sysadmin / Programmer
    function get_level($id){
        $hasil = $this->db->query("
            SELECT 
                id_user_level,
                full_name,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_user.id_user_level)
                 AS nama_level
            FROM tbl_user WHERE 
              id_user_level ='".$id."'         
        ");
        return $hasil->result();
    }   

    // Cari User Handle
    function cari_user_handle($searchTerm=""){
         $this->db->select('*');
         $this->db->join('tbl_user_level', 'tbl_user_level.id_user_level = tbl_user.id_user_level');
         $this->db->where("tbl_user_level.id_user_level ='4'");
         $this->db->or_where("tbl_user_level.id_user_level ='5'");
         $this->db->where("nama_level like '%".$searchTerm."%' ");
         $this->db->group_by('tbl_user_level.nama_level');
         $fetched_records = $this->db->get('tbl_user');
         $master_klien = $fetched_records->result_array();
         $data = array();
         foreach($master_klien as $klien){
            $data[] = array("id"=>$klien['id_user_level'], "text"=>$klien['nama_level']);
         }
         return $data;
    }

    // // Cari Klasifikasi
    // function cari_klasifikasi($searchTerm=""){
    //      $this->db->select('*');
    //      // $this->db->join('master_klasifikasi', 'master_klasifikasi.id_klasifikasi = 
    //      //    tbl_sub_klasifikasi.id_klasifikasi');
    //      $this->db->where("nama_klasifikasi like '%".$searchTerm."%' ");
    //      // $this->db->where("tbl_sub_klasifikasi.id_jenis_tiket ='".$idprod."'");
    //      // $this->db->group_by('master_klasifikasi.nama_klasifikasi');
    //      $fetched_records = $this->db->get('master_klasifikasi');
    //      $master_klasifikasi = $fetched_records->result_array();
    //      $data = array();
    //      foreach($master_klasifikasi as $klasifik){
    //         $data[] = array("id"=>$klasifik['id_klasifikasi'], "text"=>$klasifik['nama_klasifikasi']);
    //      }
    //      return $data;
    // }


    // // Cari Klasifikasi
    // function cari_klasifikasi($searchTerm="",$idprod){
    //      $this->db->select('*');
    //      $this->db->join('master_klasifikasi', 'master_klasifikasi.id_klasifikasi = 
    //         tbl_sub_klasifikasi.id_klasifikasi');
    //      $this->db->where("nama_klasifikasi like '%".$searchTerm."%' ");
    //      $this->db->where("tbl_sub_klasifikasi.id_jenis_tiket ='".$idprod."'");
    //      $this->db->group_by('master_klasifikasi.nama_klasifikasi');
    //      $fetched_records = $this->db->get('tbl_sub_klasifikasi');
    //      $master_klasifikasi = $fetched_records->result_array();
    //      $data = array();
    //      foreach($master_klasifikasi as $klasifik){
    //         $data[] = array("id"=>$klasifik['id_klasifikasi'], "text"=>$klasifik['nama_klasifikasi']);
    //      }
    //      return $data;
    // }

    // Cari Penyebab Insiden 
    function cari_penyebab_insiden($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_penyebab like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_penyebab_utama');
         $master_penyebab_utama = $fetched_records->result_array();
         $data = array();
         foreach($master_penyebab_utama as $penyebab){
            $data[] = array("id"=>$penyebab['id_penyebab'], "text"=>$penyebab['nama_penyebab']);
         }
         return $data;
    }

    // Kirim Tiket & Menanangani Tiket
    function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // Pilih Klasifikasi
    function pilih_penyebab(){
        $hasil = $this->db->query("
            SELECT 
                *
            FROM master_penyebab_utama
        ");
        return $hasil->result();
    }

    // Fetch Penyebab
    function getPenyebab($searchTerm=""){
         // Fetch Penyebab
         $this->db->select('*');
         $this->db->where("nama_penyebab like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_penyebab_utama');
         $users = $fetched_records->result_array();
         // Initialize Array with fetched data
         $data = array();
         foreach($users as $user){
            $data[] = array("id_penyebab"=>$user['id_penyebab'], "text"=>$user['nama_penyebab']);
         }
         return $data;
    }

    // Memilih Klasifikasi Tangani Tiket
    function pilih_klasifikasi($id){
        $hasil = $this->db->query("
            SELECT 
                (SELECT nama_klasifikasi FROM master_klasifikasi WHERE id_klasifikasi = tbl_sub_klasifikasi.id_klasifikasi) 
                AS nama_klasifikasi,
                (SELECT nama_item_klasifikasi FROM master_item_klasifikasi WHERE id_item_klasifikasi = tbl_sub_klasifikasi.id_item_klasifikasi) 
                AS nama_item_klasifikasi,
                id_item_klasifikasi
            FROM tbl_sub_klasifikasi 
            WHERE id_klasifikasi='".$id."'
        
        ");
        return $hasil->result();
    }

    // Insert data master penyebab / Root Cause
    function simpan_data($data){
        $this->db->insert('master_penyebab_utama', $data);
    }

    // insert data Status Open Menjadi In Progress
    function insert_status_tiket($id,$data){   
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        // $this->db->limit(1);
    }

    // Tampilkan Filter ALL Ongoing Untuk user Developer Status Open & In Progress
    function tampilkan_all_ongoing_developer(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                durasi_waktu
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket
            WHERE (id_status_tiket='STK-091020-0001' OR id_status_tiket ='STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter Breach Ongoing Untuk user Developer Status Open & In Progress
    function tampilkan_breach_ongoing_developer(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                durasi_waktu
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket 
            WHERE 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter No Breach Ongoing Untuk  User Developer Status Open & In Progress
    function tampilkan_no_breach_developer(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                durasi_waktu
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket 
            WHERE 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }


    // Tampilkan Filter ALL Ongoing Untuk user All Group Sysadmin & Programmer Status Open & In Progress
    function tampilkan_all_ongoing_sys_prog(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                durasi_waktu
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket 
            WHERE id_user_level ='".$this->session->userdata('id_user_level')."'
            AND penerima_tiket ='".$this->session->userdata('full_name')."' 
            AND 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter Breach Ongoing Untuk user All Group Sysadmin & Programmer Status Open & In Progress
    function tampilkan_breach_ongoing_sys_prog(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                durasi_waktu
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket 
            WHERE id_user_level ='".$this->session->userdata('id_user_level')."'
            AND penerima_tiket ='".$this->session->userdata('full_name')."'
            AND 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }


    // Tampilkan Filter No Breach Ongoing Untuk  User All Group Sysadmin & Programmer Status Open & In Progress
    function tampilkan_no_breach_sys_prog(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                durasi_waktu
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket 
            WHERE id_user_level ='".$this->session->userdata('id_user_level')."'
            AND penerima_tiket ='".$this->session->userdata('full_name')."'
            AND 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }


    // Tampilkan Filter ALL Ongoing Untuk User Group ALL Helpdesk Status Open & In Progress
    function tampilkan_all_ongoing_helpdesk(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                TIME_FORMAT(SEC_TO_TIME(durasi_waktu*60*60),'%H')
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket
            WHERE id_user_level_pembuat ='".$this->session->userdata('id_user_level')."' 
            AND 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    } 

    // Tampilkan Filter Breach Ongoing Untuk User ALL Group Helpdesk Status Open & In Progress
    function tampilkan_breach_helpdesk(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                TIME_FORMAT(SEC_TO_TIME(durasi_waktu*60*60),'%H')
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket
            WHERE id_user_level_pembuat ='".$this->session->userdata('id_user_level')."' 
            AND 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter No Breach Ongoing Untuk User Group ALL Helpdesk Status Open & In Progress
    function tampilkan_no_breach_helpdesk(){
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
                id_jenis_tiket,
                id_status_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                (select nama_klien FROM master_klien WHERE id_klien = tbl_tiket.id_klien)
                AS nama_klien,
                (select nama_admin FROM master_admin_klien WHERE id_admin = tbl_tiket.id_admin)
                AS nama_admin,
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_dampak FROM master_dampak WHERE id_dampak = tbl_tiket.id_dampak)
                AS nama_dampak,
                (select nama_urgency FROM master_urgency WHERE id_urgency = tbl_tiket.id_urgency)
                AS nama_urgency,
                (select nama_prioritas FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas)
                AS nama_prioritas,
                (select nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_tiket.id_status_tiket)
                AS nama_status,
                keluhan,
                (select nama_shift FROM master_shift WHERE id_shift = tbl_tiket.id_shift)
                AS nama_shift,
                (select nama_level FROM tbl_user_level WHERE id_user_level = tbl_tiket.id_user_level)
                AS nama_level,
                (select 
                TIME_FORMAT(SEC_TO_TIME(durasi_waktu*60*60),'%H')
                FROM master_prioritas WHERE id_prioritas = tbl_tiket.id_prioritas) 
                AS waktu_penanganan,
                dibuat_oleh,
                diubah_oleh,
                id_user_level,
                penerima_tiket
            FROM tbl_tiket
            WHERE id_user_level_pembuat ='".$this->session->userdata('id_user_level')."' 
            AND 
            (id_status_tiket ='STK-091020-0001' OR id_status_tiket = 'STK-091020-0009')
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Untuk Menghapus Data Tbl Tiket 
    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // Get Row Delete  Lampiran Tiket Masuk
    function view_row_delete_lampiran_tiket_masuk($no_tiket){
        $hasil = $this->db->query("
            SELECT 
                no_tiket,
                lampiran_tiket_keluhan_masuk
            FROM tbl_lampiran_tiket_masuk
            WHERE no_tiket='".$no_tiket."'
        ");
        return $hasil->row();
    }

    // Get Row Delete Lampiran Tiket Update Penanganan
    function view_row_delete_lampiran_tiket_update($no_tiket){
        $hasil = $this->db->query("
            SELECT 
                no_tiket,
                lampiran_update_tiket_penanganan
            FROM tbl_lampiran_update_tiket_penanganan
            WHERE no_tiket='".$no_tiket."'
        ");
        return $hasil->row();
    }

    // Get Row Delete Riwayat Tiket
    function view_row_delete_riwayat_tiket($no_tiket){
        $hasil = $this->db->query("
            SELECT 
                no_tiket,
                id_user_level_pembuat,
                dibuat_oleh,
                id_user_level_pengubah,
                diubah_oleh,
                id_status_tiket,
                tgl_dibuat,
                tgl_diubah,
                aksi,
                (select nama_level FROM tbl_user_level where id_user_level = tbl_riwayat_tiket.id_user_level)
                AS nama_level
            FROM tbl_riwayat_tiket
            WHERE no_tiket='".$no_tiket."'
        ");
        return $hasil->row();
    }

    // Untuk Menghapus Data Lampiran Masuk Serta Filenya 
    function delete_lampiran_masuk($id_lampiran_masuk){
        $this->db->where('no_tiket',$id_lampiran_masuk);
        $this->db->delete('tbl_lampiran_tiket_masuk');
    }

    // Untuk Menghapus Data Lampiran Update Penanganan Serta Filenya 
    function delete_lampiran_update($id_lampiran_update){
        $this->db->where('no_tiket', $id_lampiran_update);
        $this->db->delete('tbl_lampiran_update_tiket_penanganan');
    }

    // Untuk Menghapus Data Riwayat Tiket
    function delete_riwayat($id_riwayat){
        $this->db->where('no_tiket', $id_riwayat);
        $this->db->delete('tbl_riwayat_tiket');
    }

}