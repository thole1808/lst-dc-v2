<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_klasifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_klasifikasi_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_klasifikasi/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_klasifikasi_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_klasifikasi/create_action'),
            'id_klasifikasi' => set_value('id_klasifikasi'),
            'nama_klasifikasi' => set_value('nama_klasifikasi'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_klasifikasi/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi','trim|required|is_unique[master_klasifikasi.nama_klasifikasi]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_klasifikasi' => kode_unik_master_klasifikasi('id_klasifikasi', TRUE),
                'nama_klasifikasi' => $this->input->post('nama_klasifikasi', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_klasifikasi_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Klasifikasi");
            redirect(site_url('master_klasifikasi'));
        }
    }

    public function update($id) {
        $row = $this->Master_klasifikasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_klasifikasi/update_action'),
                'id_klasifikasi' => set_value('id_klasifikasi', $row->id_klasifikasi),
                'nama_klasifikasi' => set_value('nama_klasifikasi', $row->nama_klasifikasi),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_klasifikasi/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_klasifikasi'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi','trim|required|is_unique[master_klasifikasi.nama_klasifikasi]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_klasifikasi', TRUE));
        }else{
            $data = array(
                'nama_klasifikasi' => $this->input->post('nama_klasifikasi', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_klasifikasi_model->update($this->input->post('id_klasifikasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Klasifikasi");
            redirect(site_url('master_klasifikasi'));
        }
    }

    public function delete($id){
        $row = $this->Master_klasifikasi_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_klasifikasi_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Klasifikasi");
            redirect(site_url('master_klasifikasi'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_klasifikasi'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_klasifikasi', 'id_klasifikasi', 'trim');
    }

}