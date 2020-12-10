<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_produk extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_produk_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_produk/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_produk_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_produk/create_action'),
            'id_produk' => set_value('id_produk'),
            'nama_produk' => set_value('nama_produk'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_produk/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_produk', 'Nama Produk','trim|required|is_unique[master_produk.nama_produk]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_produk' => kode_unik_master_produk('id_produk', TRUE),
                'nama_produk' => $this->input->post('nama_produk', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_produk_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Produk");
            redirect(site_url('master_produk'));
        }
    }

    public function update($id) {
        $row = $this->Master_produk_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_produk/update_action'),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'nama_produk' => set_value('nama_produk', $row->nama_produk),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_produk/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_produk'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk','trim|required|is_unique[master_produk.nama_produk]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        }else{
            $data = array(
                'nama_produk' => $this->input->post('nama_produk', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_produk_model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Produk");
            redirect(site_url('master_produk'));
        }
    }

    public function delete($id){
        $row = $this->Master_produk_model->get_by_id($id);
        if ($row) {
            $this->Master_produk_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Produk");
            redirect(site_url('master_produk'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_produk'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
    }

}