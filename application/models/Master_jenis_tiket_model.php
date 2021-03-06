<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_jenis_tiket_model extends CI_Model {

    public $table = 'master_jenis_tiket';
    public $id = 'id_jenis_tiket';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
        is_login();
    }
    // datatables
    function json() {
        $this->datatables->select('
            id_jenis_tiket,
            nama_jenis_tiket,
            dibuat_oleh,
            diubah_oleh,
            tgl_terakhir_dibuat,
            tgl_terakhir_diubah'
        );
        $this->datatables->from('master_jenis_tiket');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('master_jenis_tiket/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('master_jenis_tiket/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_jenis_tiket');
        return $this->datatables->generate();        
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
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