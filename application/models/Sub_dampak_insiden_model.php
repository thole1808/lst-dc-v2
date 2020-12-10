<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_dampak_insiden_model extends CI_Model {

    public $table = 'tbl_sub_dampak_insiden';
    public $id = 'id_sub_dampak_insiden';
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
         $master_jenis_tiket= $fetched_records->result_array();
         $data = array();
         foreach($master_jenis_tiket as $jenis_tiket){
            $data[] = array("id"=>$jenis_tiket['id_jenis_tiket'], "text"=>$jenis_tiket['nama_jenis_tiket']);
         }
         return $data;
    }

    // Cari Dampak
    function cari_dampak($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_dampak like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_dampak');
         $master_dampak= $fetched_records->result_array();
         $data = array();
         foreach($master_dampak as $dampak){
            $data[] = array("id"=>$dampak['id_dampak'], "text"=>$dampak['nama_dampak']);
         }
         return $data;
    }

    // datatables
    function json() {
        $this->datatables->select('
            tbl_sub_dampak_insiden.id_sub_dampak_insiden,
            master_jenis_tiket.nama_jenis_tiket,
            master_dampak.nama_dampak,
            tbl_sub_dampak_insiden.dibuat_oleh,
            tbl_sub_dampak_insiden.diubah_oleh,
            tbl_sub_dampak_insiden.tgl_terakhir_dibuat,
            tbl_sub_dampak_insiden.tgl_terakhir_diubah'
        );
        $this->datatables->from('tbl_sub_dampak_insiden');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->join('master_jenis_tiket', 'tbl_sub_dampak_insiden.id_jenis_tiket = master_jenis_tiket.id_jenis_tiket');
        $this->datatables->join('master_dampak', 'tbl_sub_dampak_insiden.id_dampak = master_dampak.id_dampak');

        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('sub_dampak_insiden/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('sub_dampak_insiden/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_sub_dampak_insiden');
        return $this->datatables->generate();        
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id){
        $this->datatables->join('master_jenis_tiket', 'tbl_sub_dampak_insiden.id_jenis_tiket = master_jenis_tiket.id_jenis_tiket');
        $this->datatables->join('master_dampak', 'tbl_sub_dampak_insiden.id_dampak = master_dampak.id_dampak');
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