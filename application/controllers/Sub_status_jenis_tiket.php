<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_status_jenis_tiket extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Sub_status_jenis_tiket_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    // Cari Jenis Tiket
    public function cari_jenis_tiket(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_status_jenis_tiket_model->cari_jenis_tiket($searchTerm);
      echo json_encode($response);
    }

    // Cari Status Tiket
    public function cari_status_tiket(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_status_jenis_tiket_model->cari_status_tiket($searchTerm);
      echo json_encode($response);
    }

    public function index() {
        $data['tampilkan'] = $this->Sub_status_jenis_tiket_model->tampil();

        // echo "<pre>";
        //     print_r($data);
        //     exit();
        // echo "</pre>";
        $this->template->load('template', 'sub_status_jenis_tiket/list',$data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Sub_status_jenis_tiket_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_status_jenis_tiket/create_action'),
            'id_sub_status_jenis_tiket' => set_value('id_sub_status_jenis_tiket'),
            'id_jenis_tiket' => set_value('id_jenis_tiket'),
            'id_status_tiket' => set_value('id_status_tiket'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'sub_status_jenis_tiket/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('id_jenis_tiket', 'Jenis Tiket','trim|required');
        $this->form_validation->set_rules('id_status_tiket', 'Status','trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_sub_status_jenis_tiket' => kode_unik_sub_status_jenis_tiket('id_sub_status_jenis_tiket', TRUE),
                'id_jenis_tiket' => $this->input->post('id_jenis_tiket', TRUE),
                'id_status_tiket' => $this->input->post('id_status_tiket', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Sub_status_jenis_tiket_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Sub Status Jenis Tiket");
            redirect(site_url('sub_status_jenis_tiket'));
        }
    }

    public function update($id) {
        $row = $this->Sub_status_jenis_tiket_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_status_jenis_tiket/update_action'),
                'id_sub_status_jenis_tiket' => set_value('id_sub_status_jenis_tiket', $row->id_sub_status_jenis_tiket),
                'id_jenis_tiket' => set_value('id_jenis_tiket', $row->id_jenis_tiket),
                'id_status_tiket' => set_value('id_status_tiket', $row->id_status_tiket),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'sub_status_jenis_tiket/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_status_jenis_tiket'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('id_jenis_tiket', 'Jenis Tiket','trim|required');
        $this->form_validation->set_rules('id_status_tiket', 'Status','trim|required');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sub_status_jenis_tiket', TRUE));
        }else{
            $data = array(
                'id_jenis_tiket' => $this->input->post('id_jenis_tiket', TRUE),
                'id_status_tiket' => $this->input->post('id_status_tiket', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Sub_status_jenis_tiket_model->update($this->input->post('id_sub_status_jenis_tiket', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Sub Status Jenis Tiket");
            redirect(site_url('sub_status_jenis_tiket'));
        }
    }

    public function delete($id){
        $row = $this->Sub_status_jenis_tiket_model->get_by_id($id);
        if ($row) {
            $this->Sub_status_jenis_tiket_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Sub Status Jenis Tiket");
            redirect(site_url('sub_status_jenis_tiket'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_status_jenis_tiket'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_sub_status_jenis_tiket', 'id_sub_status_jenis_tiket', 'trim');
    }

}