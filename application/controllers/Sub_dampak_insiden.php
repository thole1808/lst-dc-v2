<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_dampak_insiden extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Sub_dampak_insiden_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    // Cari Jenis Tiket
    public function cari_jenis_tiket(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_dampak_insiden_model->cari_jenis_tiket($searchTerm);
      echo json_encode($response);
    }

    // Cari Dampak
    public function cari_dampak(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_dampak_insiden_model->cari_dampak($searchTerm);
      echo json_encode($response);
    }

    public function index() {
        $this->template->load('template', 'sub_dampak_insiden/list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Sub_dampak_insiden_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_dampak_insiden/create_action'),
            'id_sub_dampak_insiden' => set_value('id_sub_dampak_insiden'),
            'id_jenis_tiket' => set_value('id_jenis_tiket'),
            'id_dampak' => set_value('id_dampak'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'sub_dampak_insiden/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('id_jenis_tiket', 'Tiket Insiden','trim|required');
        $this->form_validation->set_rules('id_dampak', 'Dampak','trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_sub_dampak_insiden' => kode_unik_sub_dampak_insiden('id_sub_dampak_insiden', TRUE),
                'id_jenis_tiket' => $this->input->post('id_jenis_tiket', TRUE),
                'id_dampak' => $this->input->post('id_dampak', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Sub_dampak_insiden_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Sub Dampak Tiket Insiden");
            redirect(site_url('sub_dampak_insiden'));
        }
    }

    public function update($id) {
        $row = $this->Sub_dampak_insiden_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_dampak_insiden/update_action'),
                'id_sub_dampak_insiden' => set_value('id_sub_dampak_insiden', $row->id_sub_dampak_insiden),
                'id_jenis_tiket' => set_value('id_jenis_tiket', $row->id_jenis_tiket),
                'id_dampak' => set_value('id_dampak', $row->id_dampak),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'sub_dampak_insiden/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_dampak_insiden'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('id_jenis_tiket', 'Tiket Insiden','trim|required');
        $this->form_validation->set_rules('id_dampak', 'Dampak','trim|required');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sub_dampak_insiden', TRUE));
        }else{
            $data = array(
                'id_jenis_tiket' => $this->input->post('id_jenis_tiket', TRUE),
                'id_dampak' => $this->input->post('id_dampak', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Sub_dampak_insiden_model->update($this->input->post('id_sub_dampak_insiden', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Sub Dampak Tiket Insiden");
            redirect(site_url('sub_dampak_insiden'));
        }
    }

    public function delete($id){
        $row = $this->Sub_dampak_insiden_model->get_by_id($id);
        if ($row) {
            $this->Sub_dampak_insiden_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Sub Dampak Tiket Insiden");
            redirect(site_url('sub_dampak_insiden'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_dampak_insiden'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_sub_dampak_insiden', 'id_sub_dampak_insiden', 'trim');
    }

}