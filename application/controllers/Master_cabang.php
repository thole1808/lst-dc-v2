<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_cabang extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_cabang_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_cabang/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_cabang_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_cabang/create_action'),
            'id_cabang' => set_value('id_cabang'),
            'nama_cabang' => set_value('nama_cabang'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_cabang/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_cabang', 'Nama Cabang','trim|required|is_unique[master_cabang.nama_cabang]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_cabang' => kode_unik_master_cabang('id_cabang', TRUE),
                'nama_cabang' => $this->input->post('nama_cabang', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_cabang_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Cabang");
            redirect(site_url('master_cabang'));
        }
    }

    public function update($id) {
        $row = $this->Master_cabang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_cabang/update_action'),
                'id_cabang' => set_value('id_cabang', $row->id_cabang),
                'nama_cabang' => set_value('nama_cabang', $row->nama_cabang),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_cabang/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_cabang'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_cabang', 'Nama Cabang','trim|required|is_unique[master_cabang.nama_cabang]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cabang', TRUE));
        }else{
            $data = array(
                'nama_cabang' => $this->input->post('nama_cabang', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_cabang_model->update($this->input->post('id_cabang', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Cabang");
            redirect(site_url('master_cabang'));
        }
    }

    public function delete($id){
        $row = $this->Master_cabang_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_cabang_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Cabang");
            redirect(site_url('master_cabang'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_cabang'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_cabang', 'id_cabang', 'trim');
    }

}