<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_dampak extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_dampak_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_dampak/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_dampak_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_dampak/create_action'),
            'id_dampak' => set_value('id_dampak'),
            'nama_dampak' => set_value('nama_dampak'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_dampak/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_dampak', 'Nama Dampak','trim|required|is_unique[master_dampak.nama_dampak]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_dampak' => kode_unik_master_dampak('id_dampak', TRUE),
                'nama_dampak' => $this->input->post('nama_dampak', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_dampak_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Dampak");
            redirect(site_url('master_dampak'));
        }
    }

    public function update($id) {
        $row = $this->Master_dampak_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_dampak/update_action'),
                'id_dampak' => set_value('id_dampak', $row->id_dampak),
                'nama_dampak' => set_value('nama_dampak', $row->nama_dampak),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_dampak/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_dampak'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_dampak', 'Nama Dampak','trim|required|is_unique[master_dampak.nama_dampak]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dampak', TRUE));
        }else{
            $data = array(
                'nama_dampak' => $this->input->post('nama_dampak', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_dampak_model->update($this->input->post('id_dampak', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Dampak");
            redirect(site_url('master_dampak'));
        }
    }

    public function delete($id){
        $row = $this->Master_dampak_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_dampak_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Dampak");
            redirect(site_url('master_dampak'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_dampak'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_dampak', 'id_dampak', 'trim');
    }

}