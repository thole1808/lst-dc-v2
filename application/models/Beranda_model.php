<?php

class Beranda_model extends CI_Model {

    //  // Menampilkan Detail Total Aktivitas Pengguna 
    // function tampil_aktivitas_pengguna(){
    //     $query = $this->db->query("
    //         SELECT
    //         * 
    //         FROM tbl_log
    //     ");
    //     return $query->result();
    // }

    // Menampilkan Detail Total Tiket Insiden  Masuk Status Open Hari Ini 
    function tampil_detail_insiden_open_hari_ini(){
    	$query = $this->db->query("
			SELECT
                id_trans_tiket,
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
                tgl_diubah,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket 
            WHERE id_jenis_tiket ='JTK-011020-0001' 
			AND id_status_tiket='STK-091020-0001' 
			AND DATE(tgl_dibuat) = CURDATE()
    	");
    	return $query->result();
    }

    // Menampilkan Detail Total Tiket Insiden Masuk Status Closed Hari Ini 
    function tampil_detail_insiden_closed_hari_ini(){
    	$query = $this->db->query("	
		SELECT
			id_trans_tiket,
			no_tiket,
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
            tgl_dibuat,
            tgl_diubah,
			dibuat_oleh,
			diubah_oleh
		FROM tbl_tiket
		WHERE id_jenis_tiket ='JTK-011020-0001' 
		AND 
		(id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
		AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008') 	
		AND DATE(tgl_diubah) = CURDATE()
          
    	");
    	return $query->result();
    }

    // Menampilkan Detail Total Tiket Insiden Keamanan Masuk Status Open Hari Ini 
    function tampil_detail_insiden_keamanan_open_hari_ini(){
    	$query = $this->db->query("
			SELECT
                id_trans_tiket,
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
                tgl_diubah,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket 
            WHERE id_jenis_tiket ='JTK-041020-0001' 
			AND id_status_tiket='STK-091020-0001' 
			AND DATE(tgl_dibuat) = CURDATE()
    	");
    	return $query->result();
    }

    // Menampilkan Detail Total Tiket Insiden Keamanan Masuk Status Closed Hari Ini 
    function tampil_detail_insiden_keamanan_closed_hari_ini(){
    	$query = $this->db->query("
			SELECT
				id_trans_tiket,
				no_tiket,
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
				tgl_dibuat,
                tgl_diubah,
                dibuat_oleh,
                diubah_oleh
			FROM tbl_tiket
			WHERE id_jenis_tiket ='JTK-041020-0001' 
			AND 
			(id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
			AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008') 	
			AND DATE(tgl_diubah) = CURDATE()
    	");
    	return $query->result();
    }

    // Menampilkan Detail Total Tiket Service Request Masuk Status Open Hari Ini 
    function tampil_detail_service_request_open_hari_ini(){
    	$query = $this->db->query("
			SELECT
                id_trans_tiket,
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
                tgl_diubah,
                dibuat_oleh,
                diubah_oleh
            FROM tbl_tiket 
            WHERE id_jenis_tiket ='JTK-041020-0002'  
			AND id_status_tiket='STK-091020-0001' 
			AND DATE(tgl_dibuat) = CURDATE()
    	");
    	return $query->result();
    }

    // Menampilkan Detail Total Tiket Service Request Masuk Status Closed Hari Ini 
    function tampil_detail_service_request_closed_hari_ini(){
    	$query = $this->db->query("
			SELECT
				id_trans_tiket,
				no_tiket,
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
				tgl_dibuat,
                tgl_diubah,
                dibuat_oleh,
                diubah_oleh
			FROM tbl_tiket
			WHERE id_jenis_tiket ='JTK-041020-0002' 
			AND 
			(id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
			AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008') 	
			AND DATE(tgl_diubah) = CURDATE()
    	");
    	return $query->result();
    }
}