<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_admin_klien extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_admin_klien_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_admin_klien/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_admin_klien_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_admin_klien/create_action'),
            'id_admin' => set_value('id_admin'),
            'nama_admin' => set_value('nama_admin'),
            'no_telepon_admin' => set_value('no_telepon_admin'),
            'alamat_admin' => set_value('alamat_admin'),
            'email_admin' => set_value('email_admin'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_admin_klien/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_admin', 'Nama Admin','trim|required|is_unique[master_admin_klien.nama_admin]');
        $this->form_validation->set_rules('no_telepon_admin', 'No. Telepon','trim|required');
        $this->form_validation->set_rules('alamat_admin', 'Alamat','trim|required');
        $this->form_validation->set_rules('email_admin', 'Email','trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_admin' => kode_unik_master_adm_klien('id_admin', TRUE),
                'nama_admin' => $this->input->post('nama_admin', TRUE),
                'no_telepon_admin' => $this->input->post('no_telepon_admin', TRUE),
                'alamat_admin' => $this->input->post('alamat_admin', TRUE),
                'email_admin' => $this->input->post('email_admin', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_admin_klien_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Master Admin Klien");
            redirect(site_url('master_admin_klien'));
        }
    }

    public function update($id) {
        $row = $this->Master_admin_klien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_admin_klien/update_action'),
                'id_admin' => set_value('id_admin', $row->id_admin),
                'nama_admin' => set_value('nama_admin', $row->nama_admin),
                'no_telepon_admin' => set_value('no_telepon_admin', $row->no_telepon_admin),
                'alamat_admin' => set_value('alamat_admin', $row->alamat_admin),
                'email_admin' => set_value('email_admin', $row->email_admin),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_admin_klien/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_admin_klien'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_admin', 'Nama Admin','trim|required|is_unique[master_admin_klien.nama_admin]');
        $this->form_validation->set_rules('no_telepon_admin', 'No. Telepon','trim|required');
        $this->form_validation->set_rules('alamat_admin', 'Alamat','trim|required');
        $this->form_validation->set_rules('email_admin', 'Email','trim|required');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_admin', TRUE));
        }else{
            $data = array(
                'nama_admin' => $this->input->post('nama_admin', TRUE),
                'no_telepon_admin' => $this->input->post('no_telepon_admin', TRUE),
                'alamat_admin' => $this->input->post('alamat_admin', TRUE),
                'email_admin' => $this->input->post('email_admin', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_admin_klien_model->update($this->input->post('id_admin', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Master Admin Klien");
            redirect(site_url('master_admin_klien'));
        }
    }

    public function delete($id){
        $row = $this->Master_admin_klien_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_admin_klien_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Master Admin Klien");
            redirect(site_url('master_admin_klien'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_admin_klien'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_admin', 'id_admin', 'trim');
    }

}