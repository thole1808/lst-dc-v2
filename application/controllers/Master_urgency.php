<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_urgency extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_urgency_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_urgency/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_urgency_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_urgency/create_action'),
            'id_urgency' => set_value('id_urgency'),
            'nama_urgency' => set_value('nama_urgency'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_urgency/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_urgency', 'Nama Urgency','trim|required|is_unique[master_urgency.nama_urgency]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_urgency' => kode_unik_master_urgency('id_urgency', TRUE),
                'nama_urgency' => $this->input->post('nama_urgency', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_urgency_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Urgency");
            redirect(site_url('master_urgency'));
        }
    }

    public function update($id) {
        $row = $this->Master_urgency_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_urgency/update_action'),
                'id_urgency' => set_value('id_urgency', $row->id_urgency),
                'nama_urgency' => set_value('nama_urgency', $row->nama_urgency),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_urgency/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_urgency'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_urgency', 'Nama Urgency','trim|required|is_unique[master_urgency.nama_urgency]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_urgency', TRUE));
        }else{
            $data = array(
                'nama_urgency' => $this->input->post('nama_urgency', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_urgency_model->update($this->input->post('id_urgency', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Urgency");
            redirect(site_url('master_urgency'));
        }
    }

    public function delete($id){
        $row = $this->Master_urgency_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_urgency_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
            helper_log("hapus", "menghapus Data Master Urgency");
            redirect(site_url('master_urgency'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_urgency'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_urgency', 'id_urgency', 'trim');
    }

}