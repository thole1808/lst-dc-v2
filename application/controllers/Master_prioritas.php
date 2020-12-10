<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_prioritas extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_prioritas_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_prioritas/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_prioritas_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_prioritas/create_action'),
            'id_prioritas' => set_value('id_prioritas'),
            'nama_prioritas' => set_value('nama_prioritas'),
            'deskripsi' => set_value('deskripsi'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_prioritas/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_prioritas', 'Nama Prioritas','trim|required|is_unique[master_prioritas.nama_prioritas]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi','trim|required');
        $this->form_validation->set_rules('durasi_waktu', 'Durasi Waktu','trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_prioritas' => kode_unik_master_prioritas('id_prioritas', TRUE),
                'nama_prioritas' => $this->input->post('nama_prioritas', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'durasi_waktu' => $this->input->post('durasi_waktu',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_prioritas_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Prioritas");
            redirect(site_url('master_prioritas'));
        }
    }

    public function update($id) {
        $row = $this->Master_prioritas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_prioritas/update_action'),
                'id_prioritas' => set_value('id_prioritas', $row->id_prioritas),
                'nama_prioritas' => set_value('nama_prioritas', $row->nama_prioritas),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'durasi_waktu' => set_value('durasi_waktu', $row->durasi_waktu),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_prioritas/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_prioritas'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_prioritas', 'Nama Prioritas','trim|required|is_unique[master_prioritas.nama_prioritas]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi','trim|required');
        $this->form_validation->set_rules('durasi_waktu', 'Durasi Waktu','trim|required');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prioritas', TRUE));
        }else{
            $data = array(
                'nama_prioritas' => $this->input->post('nama_prioritas', TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'durasi_waktu' => $this->input->post('durasi_waktu',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_prioritas_model->update($this->input->post('id_prioritas', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Prioritas");
            redirect(site_url('master_prioritas'));
        }
    }

    public function delete($id){
        $row = $this->Master_prioritas_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_prioritas_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Prioritas");
            redirect(site_url('master_prioritas'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_prioritas'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_prioritas', 'id_klien', 'trim');
    }

}