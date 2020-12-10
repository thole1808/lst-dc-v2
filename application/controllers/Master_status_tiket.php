<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_status_tiket extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_status_tiket_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_status_tiket/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_status_tiket_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_status_tiket/create_action'),
            'id_status_tiket' => set_value('id_status_tiket'),
            'nama_status' => set_value('nama_status'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_status_tiket/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_status', 'Nama Status Tiket','trim|required|is_unique[master_status_tiket.nama_status]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_status_tiket' => kode_unik_master_status_tiket('id_status_tiket', TRUE),
                'nama_status' => $this->input->post('nama_status', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_status_tiket_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Status Tiket");
            redirect(site_url('master_status_tiket'));
        }
    }

    public function update($id) {
        $row = $this->Master_status_tiket_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_status_tiket/update_action'),
                'id_status_tiket' => set_value('id_status_tiket', $row->id_status_tiket),
                'nama_status' => set_value('nama_status', $row->nama_status),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_status_tiket/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('Master_status_tiket'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_status', 'Nama Status','trim|required|is_unique[master_status_tiket.nama_status]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status_tiket', TRUE));
        }else{
            $data = array(
                'nama_status' => $this->input->post('nama_status', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_status_tiket_model->update($this->input->post('id_status_tiket', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Status Tiket");
            redirect(site_url('master_status_tiket'));
        }
    }

    public function delete($id){
        $row = $this->Master_status_tiket_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_status_tiket_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Status Tiket");
            redirect(site_url('master_status_tiket'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_status_tiket'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_status_tiket', 'id_status_tiket', 'trim');
    }

}