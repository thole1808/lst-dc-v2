<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_admin_klien_model extends CI_Model {

    public $table = 'tbl_sub_admin_klien';
    public $id = 'id_sub_admin_klien';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
        is_login();
    }

    // Cari Klien
    function cari_klien($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_klien like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_klien');
         $master_klien= $fetched_records->result_array();
         $data = array();
         foreach($master_klien as $klien){
            $data[] = array("id"=>$klien['id_klien'], "text"=>$klien['nama_klien']);
         }
         return $data;
    }

    // Cari Admin Klien
    function cari_admin_klien($searchTerm=""){
         $this->db->select('*');
         $this->db->where("nama_admin like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('master_admin_klien');
         $master_adm_klien= $fetched_records->result_array();
         $data = array();
         foreach($master_adm_klien as $adm){
            $data[] = array("id"=>$adm['id_admin'], "text"=>$adm['nama_admin']);
         }
         return $data;
    }

    // datatables
    function json() {
        $this->datatables->select('
            tbl_sub_admin_klien.id_sub_admin_klien,
            master_admin_klien.nama_admin,
            master_klien.nama_klien,
            tbl_sub_admin_klien.dibuat_oleh,
            tbl_sub_admin_klien.diubah_oleh,
            tbl_sub_admin_klien.tgl_terakhir_dibuat,
            tbl_sub_admin_klien.tgl_terakhir_diubah'
        );
        $this->datatables->from('tbl_sub_admin_klien');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kabupaten.field = table2.field');
        $this->datatables->join('master_admin_klien', 'tbl_sub_admin_klien.id_admin = master_admin_klien.id_admin'
            ,'left');
        $this->datatables->join('master_klien', 'tbl_sub_admin_klien.id_klien = master_klien.id_klien','left');

        $this->datatables->add_column('action', 
            // anchor(site_url('master_klien/read/$1'), '<i class="fa fa-eye" aria-hidden="true"> lihat</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            // " . 
            anchor(site_url('sub_admin_klien/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"> edit</i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('sub_admin_klien/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"> hapus</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')"'), 'id_sub_admin_klien');
        return $this->datatables->generate();        
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    // menampilkan Semua Data Admin Klien
    function tampil(){
        $query = $this->db->query("
            SELECT
                    id_klien,
                    (SELECT nama_klien FROM master_klien WHERE id_klien = tbl_sub_admin_klien.id_klien) 
                    AS nama_klien,
                    (SELECT nama_admin FROM master_admin_klien WHERE id_admin = tbl_sub_admin_klien.id_admin) 
                    AS nama_admin,
                    dibuat_oleh,
                    diubah_oleh,
                    tgl_terakhir_dibuat,
                    tgl_terakhir_diubah
            FROM tbl_sub_admin_klien
            GROUP BY nama_klien
            ORDER BY nama_klien ASC
        ");
        return $query->result();
    }

    // get data by id
    function get_by_id($id){
        $this->datatables->join('master_admin_klien', 'tbl_sub_admin_klien.id_admin = master_admin_klien.id_admin'
            ,'left');
        $this->datatables->join('master_klien', 'tbl_sub_admin_klien.id_klien = master_klien.id_klien','left');
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