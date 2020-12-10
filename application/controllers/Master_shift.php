<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Master_shift extends CI_Controller {
    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Master_shift_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'master_shift/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_shift_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_shift/create_action'),
            'id_shift' => set_value('id_shift'),
            'nama_shift' => set_value('nama_shift'),
            'jam_masuk_shift' => set_value('jam_masuk_shift'),
            'jam_keluar_shift' => set_value('jam_keluar_shift'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'master_shift/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('nama_shift', 'Nama Shift','trim|required|is_unique[master_shift.nama_shift]');
        $this->form_validation->set_rules('jam_masuk_shift', 'Jam Masuk Shift','trim|required|is_unique[master_shift.jam_masuk_shift]');
        $this->form_validation->set_rules('jam_keluar_shift', 'Jam Keluar Shift','trim|required|is_unique[master_shift.jam_keluar_shift]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_shift' => kode_unik_master_shift('id_shift', TRUE),
                'nama_shift' => $this->input->post('nama_shift', TRUE),
                'jam_masuk_shift' => $this->input->post('jam_masuk_shift', TRUE),
                'jam_keluar_shift' => $this->input->post('jam_keluar_shift', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Master_shift_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Shift");
            redirect(site_url('master_shift'));
        }
    }

    public function update($id) {
        $row = $this->Master_shift_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_shift/update_action'),
                'id_shift' => set_value('id_shift', $row->id_shift),
                'nama_shift' => set_value('nama_shift', $row->nama_shift),
                'jam_masuk_shift' => set_value('jam_masuk_shift', $row->jam_masuk_shift),
                'jam_keluar_shift' => set_value('jam_keluar_shift', $row->jam_keluar_shift),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'master_shift/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_shift'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('nama_shift', 'Nama Shift','trim|required|is_unique[master_shift.nama_shift]');
        $this->form_validation->set_rules('jam_masuk_shift', 'Jam Masuk Shift','trim|required|is_unique[master_shift.jam_masuk_shift]');
        $this->form_validation->set_rules('jam_keluar_shift', 'Jam Keluar Shift','trim|required|is_unique[master_shift.jam_keluar_shift]');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_shift', TRUE));
        }else{
            $data = array(
                'nama_shift' => $this->input->post('nama_shift', TRUE),
                'jam_masuk_shift' => $this->input->post('jam_masuk_shift', TRUE),
                'jam_keluar_shift' => $this->input->post('jam_keluar_shift', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Master_shift_model->update($this->input->post('id_shift', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Shift");
            redirect(site_url('master_shift'));
        }
    }

    public function delete($id){
        $row = $this->Master_shift_model->get_by_id($id);
        if($this->session->userdata('id_user_level') =='1'){
        }else{
           // Jika User tidak bisa Hapus
           redirect(site_url('security/akses'));
        }
        if ($row) {
            $this->Master_shift_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Shift");
            redirect(site_url('master_shift'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('master_shift'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_shift', 'id_shift', 'trim');
        // $this->form_validation->set_error_delimiters('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>');
    }

}