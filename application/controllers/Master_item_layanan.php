<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_item_layanan extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_item_layanan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_item_layanan/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_item_layanan_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_item_layanan/create_action'),
            'id_item_layanan' => set_value('id_item_layanan'),
            'nama_item_layanan' => set_value('nama_item_layanan'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_item_layanan/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_item_layanan', 'Nama Item Layanan','trim|required|is_unique[master_item_layanan.nama_item_layanan]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_item_layanan' => kode_unik_master_item_layanan('id_item_layanan', TRUE),
                'nama_item_layanan' => $this->input->post('nama_item_layanan', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_item_layanan_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Item Layanan");
            redirect(site_url('master_item_layanan'));
        }
    }

    public function update($id) {
        $row = $this->Master_item_layanan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_item_layanan/update_action'),
                'id_item_layanan' => set_value('id_item_layanan', $row->id_item_layanan),
                'nama_item_layanan' => set_value('nama_item_layanan', $row->nama_item_layanan),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_item_layanan/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_item_layanan'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_item_layanan', 'Nama Item Layanan','trim|required|is_unique[master_item_layanan.nama_item_layanan]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_item_layanan', TRUE));
        }else{
            $data = array(
                'nama_item_layanan' => $this->input->post('nama_item_layanan', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_item_layanan_model->update($this->input->post('id_item_layanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Item Layanan");
            redirect(site_url('master_item_layanan'));
        }
    }

    public function delete($id){
        $row = $this->Master_item_layanan_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_item_layanan_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Item Layanan");
            redirect(site_url('master_item_layanan'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_item_layanan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_item_layanan', 'id_item_layanan', 'trim');
    }

}