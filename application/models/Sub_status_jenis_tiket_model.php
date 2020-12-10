<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_status_jenis_tiket_model extends CI_Model {

    public $table = 'tbl_sub_status_jenis_tiket';
    public $id = 'id_sub_status_jenis_tiket';
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

    // Cari Status Tiket
    function cari_status_tiket($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_status like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_status_tiket');
         $master_status_tiket = $fetched_records->result_array();
         $data = array();
         foreach($master_status_tiket as $status_tiket){
            $data[] = array("id"=>$status_tiket['id_status_tiket'], "text"=>$status_tiket['nama_status']);
         }
         return $data;
    }


    // datatables
    function json() {
        $this->datatables->select('
            tbl_sub_status_jenis_tiket.id_sub_status_jenis_tiket,
            master_jenis_tiket.nama_jenis_tiket,
            master_status_tiket.nama_status,
            tbl_sub_status_jenis_tiket.dibuat_oleh,
            tbl_sub_status_jenis_tiket.diubah_oleh,
            tbl_sub_status_jenis_tiket.tgl_terakhir_dibuat,
            tbl_sub_status_jenis_tiket.tgl_terakhir_diubah'
        );
        $this->datatables->from('tbl_sub_status_jenis_tiket');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->join('master_jenis_tiket', 'tbl_sub_status_jenis_tiket.id_jenis_tiket = master_jenis_tiket.id_jenis_tiket');
        $this->datatables->join('master_status_tiket', 'tbl_sub_status_jenis_tiket.id_status_tiket = master_status_tiket.id_status_tiket');

        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('Sub_status_jenis_tiket/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('Sub_status_jenis_tiket/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_sub_status_jenis_tiket');
        return $this->datatables->generate();        
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // menampilkan Semua Data Sub Status Tiket Berdasarkan Jenis Tiket
    function tampil(){
        $query = $this->db->query("
            SELECT
                id_jenis_tiket,
                (SELECT nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_sub_status_jenis_tiket.id_jenis_tiket) 
                AS nama_jenis_tiket,
                (SELECT nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_sub_status_jenis_tiket.id_status_tiket) 
                AS nama_status,
                dibuat_oleh,
                diubah_oleh,
                tgl_terakhir_dibuat,
                tgl_terakhir_diubah
            FROM tbl_sub_status_jenis_tiket
            GROUP BY nama_jenis_tiket
            ORDER BY nama_jenis_tiket ASC
        ");
        return $query->result();
    }

    // get data by id
    function get_by_id($id){
        $this->datatables->join('master_jenis_tiket', 'tbl_sub_status_jenis_tiket.id_jenis_tiket = master_jenis_tiket.id_jenis_tiket');
        $this->datatables->join('master_status_tiket', 'tbl_sub_status_jenis_tiket.id_status_tiket = master_status_tiket.id_status_tiket');
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