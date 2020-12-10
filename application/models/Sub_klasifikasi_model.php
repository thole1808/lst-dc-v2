<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_klasifikasi_model extends CI_Model {

    public $table = 'tbl_sub_klasifikasi';
    public $id = 'id_sub_klasifikasi';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
        is_login();
    }

    // Cari Jenis Tiket
    function cari_jenis_tiket($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_jenis_tiket like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_jenis_tiket');
         $master_jenis_tiket = $fetched_records->result_array();
         $data = array();
         foreach($master_jenis_tiket as $jenis_tiket){
            $data[] = array("id"=>$jenis_tiket['id_jenis_tiket'], "text"=>$jenis_tiket['nama_jenis_tiket']);
         }
         return $data;
    }

    // Cari Klasifikasi
    function cari_klasifikasi($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_klasifikasi like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_klasifikasi');
         $master_klasifikasi = $fetched_records->result_array();
         $data = array();
         foreach($master_klasifikasi as $klasifikasi){
            $data[] = array("id"=>$klasifikasi['id_klasifikasi'], "text"=>$klasifikasi['nama_klasifikasi']);
         }
         return $data;
    }

    // Cari Item Klasifikasi
    function cari_item_klasifikasi($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_item_klasifikasi like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_item_klasifikasi');
         $master_item_klasifikasi = $fetched_records->result_array();
         $data = array();
         foreach($master_item_klasifikasi as $item_klasifikasi){
            $data[] = array("id"=>$item_klasifikasi['id_item_klasifikasi'], "text"=>$item_klasifikasi['nama_item_klasifikasi']);
         }
         return $data;
    }

    // datatables
    function json() {
        $this->datatables->select('
            tbl_sub_klasifikasi.id_sub_klasifikasi,
            master_jenis_tiket.nama_jenis_tiket,
            master_klasifikasi.nama_klasifikasi,
            master_item_klasifikasi.nama_item_klasifikasi,
            tbl_sub_klasifikasi.dibuat_oleh,
            tbl_sub_klasifikasi.diubah_oleh,
            tbl_sub_klasifikasi.tgl_terakhir_dibuat,
            tbl_sub_klasifikasi.tgl_terakhir_diubah'
        );
        $this->datatables->from('tbl_sub_klasifikasi');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->join('master_jenis_tiket', 'tbl_sub_klasifikasi.id_jenis_tiket = master_jenis_tiket.id_jenis_tiket');
        $this->datatables->join('master_klasifikasi', 'tbl_sub_klasifikasi.id_klasifikasi = master_klasifikasi.id_klasifikasi');
        $this->datatables->join('master_item_klasifikasi', 'tbl_sub_klasifikasi.id_item_klasifikasi = master_item_klasifikasi.id_item_klasifikasi');

        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('sub_klasifikasi/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('sub_klasifikasi/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_sub_klasifikasi');
        return $this->datatables->generate();        
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // menampilkan Semua Data Sub Klasifikasi
    function tampil(){
        $query = $this->db->query("
            SELECT 
                id_jenis_tiket,
                id_klasifikasi,
                id_sub_klasifikasi,
                (SELECT nama_jenis_tiket FROM master_jenis_tiket 
                WHERE id_jenis_tiket = tbl_sub_klasifikasi.id_jenis_tiket) 
                AS nama_jenis_tiket,
                (SELECT nama_klasifikasi FROM master_klasifikasi 
                WHERE id_klasifikasi = tbl_sub_klasifikasi.id_klasifikasi) 
                AS nama_klasifikasi,
                (SELECT nama_item_klasifikasi FROM master_item_klasifikasi
                WHERE id_item_klasifikasi = tbl_sub_klasifikasi.id_item_klasifikasi) 
                AS nama_item_klasifikasi,
                dibuat_oleh,
                diubah_oleh,
                tgl_terakhir_dibuat,
                tgl_terakhir_diubah
            FROM tbl_sub_klasifikasi
            GROUP BY nama_jenis_tiket
            ORDER BY nama_jenis_tiket ASC
        ");
        return $query->result();
    }

    // get data by id
    function get_by_id($id){
       $this->datatables->join('master_jenis_tiket', 'tbl_sub_klasifikasi.id_jenis_tiket = master_jenis_tiket.id_jenis_tiket');
        $this->datatables->join('master_klasifikasi', 'tbl_sub_klasifikasi.id_klasifikasi = master_klasifikasi.id_klasifikasi');
        $this->datatables->join('master_item_klasifikasi', 'tbl_sub_klasifikasi.id_item_klasifikasi = master_item_klasifikasi.id_item_klasifikasi');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}