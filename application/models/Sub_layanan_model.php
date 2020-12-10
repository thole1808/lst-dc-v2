<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_layanan_model extends CI_Model {

    public $table = 'tbl_sub_layanan';
    public $id = 'id_sub_layanan';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
        is_login();
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

    // Cari Item Layanan
    function cari_item_layanan($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_item_layanan like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_item_layanan');
         $master_layanan = $fetched_records->result_array();
         $data = array();
         foreach($master_layanan as $lay){
            $data[] = array("id"=>$lay['id_item_layanan'], "text"=>$lay['nama_item_layanan']);
         }
         return $data;
    }
    
    // datatables
    function json() {
        $this->datatables->select('
            tbl_sub_layanan.id_sub_layanan,
            master_layanan.nama_layanan,
            master_item_layanan.nama_item_layanan,
            tbl_sub_layanan.dibuat_oleh,
            tbl_sub_layanan.diubah_oleh,
            tbl_sub_layanan.tgl_terakhir_dibuat,
            tbl_sub_layanan.tgl_terakhir_diubah'
        );
        $this->datatables->from('tbl_sub_layanan');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->join('master_layanan', 'tbl_sub_layanan.id_layanan = master_layanan.id_layanan');
        $this->datatables->join('master_item_layanan', 'tbl_sub_layanan.id_item_layanan = master_item_layanan.id_item_layanan');

        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('sub_layanan/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('sub_layanan/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_sub_layanan');
        return $this->datatables->generate();        
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // menampilkan Semua Data Sub Layanan
    function tampil(){
        $query = $this->db->query("
            SELECT
                id_layanan,
                (SELECT nama_layanan FROM master_layanan WHERE id_layanan = tbl_sub_layanan.id_layanan) 
                AS nama_layanan,
                (SELECT nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_sub_layanan.id_item_layanan) 
                AS nama_item_layanan,
                dibuat_oleh,
                diubah_oleh,
                tgl_terakhir_dibuat,
                tgl_terakhir_diubah
            FROM tbl_sub_layanan
            GROUP BY nama_layanan
            ORDER BY nama_layanan ASC
        ");
        return $query->result();
    }

    // get data by id
    function get_by_id($id){
         $this->datatables->join('master_layanan', 'tbl_sub_layanan.id_layanan = master_layanan.id_layanan');
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