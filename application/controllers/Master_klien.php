<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_klien extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_klien_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_klien/list');

    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_klien_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_klien/create_action'),
            'id_klien' => set_value('id_klien'),
            'nama_klien' => set_value('nama_klien'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_klien/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_klien', 'Nama Klien','trim|required|is_unique[master_klien.nama_klien]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_klien' => kode_unik_master_klien('id_klien', TRUE),
                'nama_klien' => $this->input->post('nama_klien', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            helper_log("add", "menambahkan Data Master Klien");
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_klien_model->insert($data);
            
            echo $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            redirect(site_url('master_klien'));
        }
    }

    public function update($id) {
        $row = $this->Master_klien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_klien/update_action'),
                'id_klien' => set_value('id_klien', $row->id_klien),
                'nama_klien' => set_value('nama_klien', $row->nama_klien),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_klien/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_klien'));
        }
    }

    public function update_action() {
        
        $this->form_validation->set_rules('nama_klien', 'Nama Klien','trim|required|is_unique[master_klien.nama_klien]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_klien', TRUE));
        }else{
            $data = array(
                'nama_klien' => $this->input->post('nama_klien', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            helper_log("edit", "mengedit Data Klien");
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_klien_model->update($this->input->post('id_klien', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            redirect(site_url('master_klien'));
        }
    }

    public function delete($id){
        $row = $this->Master_klien_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            helper_log("hapus", "menghapus Data Master Klien");
            $this->Master_klien_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
            redirect(site_url('master_klien'));
        }else{
             $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_klien'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_klien', 'id_klien', 'trim');
    }

}