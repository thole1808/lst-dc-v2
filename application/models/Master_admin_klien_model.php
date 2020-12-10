<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_admin_klien_model extends CI_Model {

    public $table = 'master_admin_klien';
    public $id = 'id_admin';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
        is_login();
    }
    // datatables
    function json() {
        $this->datatables->select('
            id_admin,
            nama_admin,
            no_telepon_admin,
            alamat_admin,
            email_admin,
            dibuat_oleh,
            diubah_oleh,
            tgl_terakhir_dibuat,
            tgl_terakhir_diubah'
        );
        $this->datatables->from('master_admin_klien');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('master_admin_klien/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('master_admin_klien/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_admin');
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