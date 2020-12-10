<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_urgency_insiden_model extends CI_Model {

    public $table = 'tbl_sub_urgency_insiden';
    public $id = 'id_sub_urgency_insiden';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
        is_login();
    }

    // Cari Dampak
    function cari_dampak($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_dampak like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_dampak');
         $master_dampak = $fetched_records->result_array();
         $data = array();
         foreach($master_dampak as $dampak){
            $data[] = array("id"=>$dampak['id_dampak'], "text"=>$dampak['nama_dampak']);
         }
         return $data;
    }

    // Cari Urgency
    function cari_urgency($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_urgency like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_urgency');
         $master_urgency = $fetched_records->result_array();
         $data = array();
         foreach($master_urgency as $urgency){
            $data[] = array("id"=>$urgency['id_urgency'], "text"=>$urgency['nama_urgency']);
         }
         return $data;
    }

    // Cari Prioritas
    function cari_prioritas($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_prioritas like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_prioritas');
         $master_prioritas = $fetched_records->result_array();
         $data = array();
         foreach($master_prioritas as $urgency){
            $data[] = array("id"=>$urgency['id_prioritas'], "text"=>$urgency['nama_prioritas']);
         }
         return $data;
    }

    // datatables
    function json() {
        $this->datatables->select('
            tbl_sub_urgency_insiden.id_sub_urgency_insiden,
            master_dampak.nama_dampak,
            master_urgency.nama_urgency,
            master_prioritas.nama_prioritas,
            tbl_sub_urgency_insiden.dibuat_oleh,
            tbl_sub_urgency_insiden.diubah_oleh,
            tbl_sub_urgency_insiden.tgl_terakhir_dibuat,
            tbl_sub_urgency_insiden.tgl_terakhir_diubah'
        );
        $this->datatables->from('tbl_sub_urgency_insiden');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->join('master_dampak', 'tbl_sub_urgency_insiden.id_dampak = master_dampak.id_dampak');
        $this->datatables->join('master_urgency', 'tbl_sub_urgency_insiden.id_urgency = master_urgency.id_urgency');

        $this->datatables->join('master_prioritas', 'tbl_sub_urgency_insiden.id_prioritas= master_prioritas.id_prioritas','left');

        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('sub_urgency_insiden/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('sub_urgency_insiden/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_sub_urgency_insiden');
        return $this->datatables->generate();        
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id){
        $this->datatables->join('master_dampak', 'tbl_sub_urgency_insiden.id_dampak = master_dampak.id_dampak');
        $this->datatables->join('master_urgency', 'tbl_sub_urgency_insiden.id_urgency = master_urgency.id_urgency');

        $this->datatables->join('master_prioritas', 'tbl_sub_urgency_insiden.id_prioritas= master_prioritas.id_prioritas','left');
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