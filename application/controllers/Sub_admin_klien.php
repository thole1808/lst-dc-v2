<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_admin_klien extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Sub_admin_klien_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    // Cari Klien
    public function cari_klien(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_admin_klien_model->cari_klien($searchTerm);
      echo json_encode($response);
    }

    // Cari Admin Klien
    public function cari_admin_klien(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_admin_klien_model->cari_admin_klien($searchTerm);
      echo json_encode($response);
    }

    public function index() {
        $data['tampilkan'] = $this->Sub_admin_klien_model->tampil();
        $this->template->load('template', 'sub_admin_klien/list',$data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Sub_admin_klien_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_admin_klien/create_action'),
            'id_sub_admin_klien' => set_value('id_sub_admin_klien'),
            'id_admin' => set_value('id_admin'),
            'id_klien' => set_value('id_klien'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'sub_admin_klien/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('id_admin', 'Admin Klien','trim|required');
        $this->form_validation->set_rules('id_klien', 'Klien','trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_sub_admin_klien' => kode_unik_sub_admin_klien('id_sub_admin_klien', TRUE),
                'id_admin' => $this->input->post('id_admin', TRUE),
                'id_klien' => $this->input->post('id_klien', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Sub_admin_klien_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Sub Admin Klien");
            redirect(site_url('sub_admin_klien'));
        }
    }

    public function update($id) {
        $row = $this->Sub_admin_klien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_admin_klien/update_action'),
                'id_sub_admin_klien' => set_value('id_sub_admin_klien', $row->id_sub_admin_klien),
                'id_admin' => set_value('id_admin', $row->id_admin),
                'id_klien' => set_value('id_klien', $row->id_klien),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'sub_admin_klien/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_admin_klien'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('id_admin', 'Admin Klien','trim|required');
        $this->form_validation->set_rules('id_klien', 'Klien','trim|required');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sub_admin_klien', TRUE));
        }else{
            $data = array(
                'id_admin' => $this->input->post('id_admin', TRUE),
                'id_klien' => $this->input->post('id_klien', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Sub_admin_klien_model->update($this->input->post('id_sub_admin_klien', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Sub Admin Klien");
            redirect(site_url('sub_admin_klien'));
        }
    }

    public function delete($id){
        $row = $this->Sub_admin_klien_model->get_by_id($id);
        if ($row) {
            $this->Sub_admin_klien_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Sub Admin Klien");
            redirect(site_url('sub_admin_klien'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_admin_klien'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_sub_admin_klien', 'id_sub_admin_klien', 'trim');
    }

}