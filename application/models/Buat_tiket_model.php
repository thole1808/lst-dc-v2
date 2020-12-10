<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buat_tiket_model extends CI_Model{
    public $table = 'tbl_tiket';
    public $tbl_riwayat = 'tbl_riwayat_tiket';
    public $id = 'id_trans_tiket';
    public $order = 'DESC';

    function __construct(){
        parent::__construct();
    }

    // Cari Layanan
    function cari_layanan($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_layanan like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_layanan');
         $master_layanan = $fetched_records->result_array();
         $data = array();
         foreach($master_layanan as $lay){
            $data[] = array("id"=>$lay['id_layanan'], "text"=>$lay['nama_layanan']);
         }
         return $data;
    }

    // Cari Klien
    function cari_klien($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_klien like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_klien');
         $master_klien = $fetched_records->result_array();
         $data = array();
         foreach($master_klien as $klien){
            $data[] = array("id"=>$klien['id_klien'], "text"=>$klien['nama_klien']);
         }
         return $data;
    }

    // Cari Shift
    function cari_shift($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_shift like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_shift');
         $master_shift = $fetched_records->result_array();
         $data = array();
         foreach($master_shift as $klien){
            $data[] = array("id"=>$klien['id_shift'], "text"=>$klien['nama_shift']);
         }
         return $data;
    }

    // Mencari Data Tiket Saja
    function get_jenis_tiket_combo() {
        $hasil = $this->db->query("SELECT * FROM master_jenis_tiket ");
        return $hasil->result();
    }

    // Mencari Data Shift Saja
    function get_shift_combo() {
        $hasil = $this->db->query("SELECT * FROM master_shift");
        return $hasil->result();
    }

    // Mencari data Layanan
    function get_layanan_combo() {
        $hasil = $this->db->query("SELECT * FROM master_layanan");
        return $hasil->result();
    }

    // Mencari data Klien
    function get_klien_combo() {
        $hasil = $this->db->query("SELECT * FROM master_klien");
        return $hasil->result();
    }  

    // Mencari Level Jenis Tiket Berdasarkan Dampak 
    function get_jenis_tiket_level($id){
        $hasil = $this->db->query("
            SELECT 
                -- tbl_sub_dampak_insiden.id_jenis_tiket,
                tbl_sub_dampak_insiden.id_dampak,
                master_dampak.nama_dampak
            FROM tbl_sub_dampak_insiden
            INNER JOIN master_dampak
            ON master_dampak.id_dampak = tbl_sub_dampak_insiden.id_dampak
            WHERE id_jenis_tiket='".$id."'
            GROUP BY master_dampak.id_dampak
        ");
        return $hasil->result();
    } 

    // Mencari Level Jenis Tiket Berdasarkan Level Dampak
    function get_jenis_tiket_level_dampak($id){
        $hasil = $this->db->query("
            SELECT 
                 tbl_sub_urgency_insiden.id_dampak,
                 tbl_sub_urgency_insiden.id_urgency,
            --   tbl_sub_urgency_insiden.id_prioritas,
            --   master_dampak.nama_dampak,
                 master_urgency.nama_urgency
            --   master_prioritas.nama_prioritas,
            --   master_prioritas.deskripsi
            FROM tbl_sub_urgency_insiden
                INNER JOIN master_dampak
                ON master_dampak.id_dampak = tbl_sub_urgency_insiden.id_dampak
                INNER JOIN master_urgency
                ON master_urgency.id_urgency = tbl_sub_urgency_insiden.id_urgency
                -- INNER JOIN master_prioritas
                -- ON master_prioritas.id_prioritas = tbl_sub_urgency_insiden.id_prioritas
            WHERE tbl_sub_urgency_insiden.id_dampak='".$id."'
            GROUP BY master_urgency.id_urgency
        ");
        return $hasil->result();
    }

    // Mencari Level Jenis Tiket Berdasarkan Urgency serta Prioritas dari Urgency
    function get_jenis_tiket_level_urgency($id,$id2){
        $hasil = $this->db->query("
            SELECT * FROM tbl_sub_urgency_insiden
                INNER JOIN master_dampak
                ON master_dampak.id_dampak = tbl_sub_urgency_insiden.id_dampak
                INNER JOIN master_urgency
                ON master_urgency.id_urgency = tbl_sub_urgency_insiden.id_urgency
                INNER JOIN master_prioritas
              ON master_prioritas.id_prioritas = tbl_sub_urgency_insiden.id_prioritas
            WHERE tbl_sub_urgency_insiden.id_urgency='".$id."' 
            AND tbl_sub_urgency_insiden.id_dampak='".$id2."'
            GROUP BY master_urgency.id_urgency
        ");
        return $hasil->result();
    }
    
    // // INSERT DATA TRANSAKSI TIKET
    // function insert($data){
    //     $this->db->insert($this->table, $data);
    // }

    // INSERT DATA TRANSAKSI TIKET INSIDEN
    function insert_insiden($data_insiden){
        $this->db->insert($this->table, $data_insiden);
    }

    // INSERT DATA TRANSAKSI TIKET Sercive Request
    function insert_service_request($data_service_request){
        $this->db->insert($this->table, $data_service_request);
    }

    // INSERT DATA Tabel Riwayat Tiket
    function insert_riwayat_tiket($riwayat_tiket){
        $this->db->insert($this->tbl_riwayat, $riwayat_tiket);
    }
}