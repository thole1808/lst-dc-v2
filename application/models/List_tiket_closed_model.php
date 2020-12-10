<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_tiket_closed_model extends CI_Model{
    public $table = 'tbl_tiket';
    public $id = 'id_trans_tiket';
    public $order = 'DESC';

    function __construct(){
        parent::__construct();
    }

    // Menampilkan Detail Tiket
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
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
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

    // Tampilkan Filter All  User  Group All Helpdesk
    function tampilkan_all_closed_helpdesk($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where 
            
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }  

    // Tampilkan Filter Breach Dari User All Group Helpdesk
    function tampilkan_breach_closed_helpdesk($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                id_prioritas,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where

            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter No Breach Dari User All Group Helpdesk
    function tampilkan_no_breach_closed_helpdesk($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where 
            
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }


    // Tampilkan Filter All Dari User All Group  Sysadmin & Programmer
    function tampilkan_all_closed_sys_prog($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                id_prioritas,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where AND
            id_user_level_pengubah ='".$this->session->userdata('id_user_level')."'
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter Breach Dari User All Group Sysadmin & Programmer
    function tampilkan_breach_closed_sys_prog($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                id_prioritas,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where AND
            id_user_level_pengubah ='".$this->session->userdata('id_user_level')."'
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter No Breach Dari User All Group Sysadmin & Programmer
    function tampilkan_no_breach_closed_sys_prog($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                id_prioritas,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where AND
            id_user_level_pengubah ='".$this->session->userdata('id_user_level')."'
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter All  Untuk User Developer LST-DC
    function tampilkan_all_closed_developer($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                id_prioritas,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where AND
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

     // Tampilkan Filter Breach Dari User Developer
    function tampilkan_breach_closed_developer($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                id_prioritas,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where AND
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }

    // Tampilkan Filter No Breach Untuk User Developer LST-DC
    function tampilkan_no_breach_closed_developer($tgl_awal,$tgl_akhir){
        $where = '';
        if(!empty($tgl_awal) && !empty($tgl_akhir)){
            $where .= " AND date(tgl_dibuat) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ";
        }
        $query = $this->db->query("
            SELECT
                id_trans_tiket,
                id_prioritas,
                no_tiket,
                tgl_dibuat,
                tgl_diubah,
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
                TIMEDIFF(tgl_diubah,tgl_dibuat) AS waktu_selesai,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket
            WHERE 1=1 $where AND
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')  
            ORDER BY tgl_dibuat DESC
        ");
        return $query->result();
    }
    
}