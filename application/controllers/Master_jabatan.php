<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_jabatan extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_jabatan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_jabatan/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_jabatan_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_jabatan/create_action'),
            'id_jabatan' => set_value('id_jabatan'),
            'nama_jabatan' => set_value('nama_jabatan'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_jabatan/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan','trim|required|is_unique[master_jabatan.nama_jabatan]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_jabatan' => kode_unik_master_jabatan('id_jabatan', TRUE),
                'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_jabatan_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Jabatan");
            redirect(site_url('master_jabatan'));
        }
    }

    public function update($id) {
        $row = $this->Master_jabatan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_jabatan/update_action'),
                'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
                'nama_jabatan' => set_value('nama_jabatan', $row->nama_jabatan),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_jabatan/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_jabatan'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan','trim|required|is_unique[master_jabatan.nama_jabatan]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jabatan', TRUE));
        }else{
            $data = array(
                'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_jabatan_model->update($this->input->post('id_jabatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Layanan");
            redirect(site_url('master_jabatan'));
        }
    }

    public function delete($id){
        $row = $this->Master_jabatan_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_jabatan_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Layanan");
            redirect(site_url('master_jabatan'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_jabatan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim');
    }

}