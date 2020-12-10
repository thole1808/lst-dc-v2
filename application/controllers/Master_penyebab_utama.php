<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_penyebab_utama extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_penyebab_utama_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_penyebab_utama/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_penyebab_utama_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_penyebab_utama/create_action'),
            'id_penyebab' => set_value('id_penyebab'),
            'nama_penyebab' => set_value('nama_penyebab'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_penyebab_utama/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_penyebab', 'Nama Penyebab Utama','trim|required|is_unique[master_penyebab_utama.nama_penyebab]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_penyebab' => kode_unik_master_penyebab_utama('id_penyebab', TRUE),
                'nama_penyebab' => $this->input->post('nama_penyebab', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_penyebab_utama_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Penyebab Utama");
            redirect(site_url('master_penyebab_utama'));
        }
    }

    public function update($id) {
        $row = $this->Master_penyebab_utama_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_penyebab_utama/update_action'),
                'id_penyebab' => set_value('id_penyebab', $row->id_penyebab),
                'nama_penyebab' => set_value('nama_penyebab', $row->nama_penyebab),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_penyebab_utama/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_penyebab_utama'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_penyebab', 'Nama Penyebab Utama','trim|required|is_unique[master_penyebab_utama.nama_penyebab]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penyebab', TRUE));
        }else{
            $data = array(
                'nama_penyebab' => $this->input->post('nama_penyebab', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            // echo "<pre>";
            //     print_r($data);
            //     exit();
            // echo "</pre>";
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_penyebab_utama_model->update($this->input->post('id_penyebab', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Penyebab Utama");
            redirect(site_url('master_penyebab_utama'));
        }
    }

    public function delete($id){
        $row = $this->Master_penyebab_utama_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_penyebab_utama_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Penyebab Utama");
            redirect(site_url('master_penyebab_utama'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_penyebab_utama'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_penyebab', 'id_penyebab', 'trim');
    }

}