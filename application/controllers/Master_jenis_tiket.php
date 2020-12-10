<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_jenis_tiket extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_jenis_tiket_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_jenis_tiket/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_jenis_tiket_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_jenis_tiket/create_action'),
            'id_jenis_tiket' => set_value('id_jenis_tiket'),
            'nama_jenis_tiket' => set_value('nama_jenis_tiket'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_jenis_tiket/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_jenis_tiket', 'Nama Jenis Tiket','trim|required|is_unique[master_jenis_tiket.nama_jenis_tiket]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_jenis_tiket' => kode_unik_master_jenis_tiket('id_jenis_tiket', TRUE),
                'nama_jenis_tiket' => $this->input->post('nama_jenis_tiket', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_jenis_tiket_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Jenis Tiket");
            redirect(site_url('master_jenis_tiket'));
        }
    }

    public function update($id) {
        $row = $this->Master_jenis_tiket_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_jenis_tiket/update_action'),
                'id_jenis_tiket' => set_value('id_jenis_tiket', $row->id_jenis_tiket),
                'nama_jenis_tiket' => set_value('nama_jenis_tiket', $row->nama_jenis_tiket),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_jenis_tiket/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_jenis_tiket'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_jenis_tiket', 'Nama Jenis Tiket','trim|required|is_unique[master_jenis_tiket.nama_jenis_tiket]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_tiket', TRUE));
        }else{
            $data = array(
                'nama_jenis_tiket' => $this->input->post('nama_jenis_tiket', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_jenis_tiket_model->update($this->input->post('id_jenis_tiket', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Jenis Tiket");
            redirect(site_url('master_jenis_tiket'));
        }
    }

    public function delete($id){
        $row = $this->Master_jenis_tiket_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_jenis_tiket_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Jenis Tiket");
            redirect(site_url('master_jenis_tiket'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_jenis_tiket'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_jenis_tiket', 'id_jenis_tiket', 'trim');
    }

}