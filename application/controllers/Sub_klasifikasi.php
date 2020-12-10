<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_klasifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Sub_klasifikasi_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    // Cari Jenis Tiket
    public function cari_jenis_tiket(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_klasifikasi_model->cari_jenis_tiket($searchTerm);
      echo json_encode($response);
    }

    // Cari Klasifikasi
    public function cari_klasifikasi(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_klasifikasi_model->cari_klasifikasi($searchTerm);
      echo json_encode($response);
    }

    // Cari Item Klasifikasi
    public function cari_item_klasifikasi(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_klasifikasi_model->cari_item_klasifikasi($searchTerm);
      echo json_encode($response);
    }

    public function index() {
        $data['tampilkan'] = $this->Sub_klasifikasi_model->tampil();
        $this->template->load('template', 'sub_klasifikasi/list',$data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Sub_klasifikasi_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_klasifikasi/create_action'),
            'id_sub_klasifikasi' => set_value('id_sub_klasifikasi'),
            'id_jenis_tiket' => set_value('id_jenis_tiket'),
            'id_klasifikasi' => set_value('id_klasifikasi'),
            'id_item_klasifikasi' => set_value('id_item_klasifikasi'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'sub_klasifikasi/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('id_jenis_tiket', 'Tiket Insiden','trim');
        $this->form_validation->set_rules('id_klasifikasi_isiden', 'Klasifikasi Insiden','trim');
        $this->form_validation->set_rules('id_item_klasifikasi', 'Item Klasifikasi','trim');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_sub_klasifikasi' => kode_unik_sub_klasifikasi('id_sub_klasifikasi', TRUE),
                'id_jenis_tiket' => $this->input->post('id_jenis_tiket', TRUE),
                'id_klasifikasi' => $this->input->post('id_klasifikasi', TRUE),
                'id_item_klasifikasi' => $this->input->post('id_item_klasifikasi', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Sub_klasifikasi_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Sub Klasifikasi");
            redirect(site_url('sub_klasifikasi'));
        }
    }

    public function update($id) {
        $row = $this->Sub_klasifikasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_klasifikasi/update_action'),
                'id_sub_klasifikasi' => set_value('id_sub_klasifikasi', $row->id_sub_klasifikasi),
                'id_jenis_tiket' => set_value('id_jenis_tiket', $row->id_jenis_tiket),
                'id_klasifikasi' => set_value('id_klasifikasi', $row->id_klasifikasi),
                'id_item_klasifikasi' => set_value('id_item_klasifikasi', $row->id_item_klasifikasi),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'sub_klasifikasi/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_klasifikasi'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('id_jenis_tiket', 'Tiket Insiden','trim');
        $this->form_validation->set_rules('id_klasifikasi_isiden', 'Klasifikasi Insiden','trim');
        $this->form_validation->set_rules('id_item_klasifikasi', 'Item Klasifikasi','trim');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sub_klasifikasi', TRUE));
        }else{
            $data = array(
                'id_jenis_tiket' => $this->input->post('id_jenis_tiket', TRUE),
                'id_klasifikasi' => $this->input->post('id_klasifikasi', TRUE),
                'id_item_klasifikasi' => $this->input->post('id_item_klasifikasi', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Sub_klasifikasi_model->update($this->input->post('id_sub_klasifikasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Sub Klasifikasi");
            redirect(site_url('sub_klasifikasi'));
        }
    }

    public function delete($id){
        $row = $this->Sub_klasifikasi_model->get_by_id($id);
        if ($row) {
            $this->Sub_klasifikasi_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Sub Klasifikasi");
            redirect(site_url('sub_klasifikasi'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_klasifikasi'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_sub_klasifikasi', 'id_sub_klasifikasi', 'trim');
    }

}