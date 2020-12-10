<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_layanan extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('Sub_layanan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    // Cari Layanan
    public function cari_layanan(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_layanan_model->cari_layanan($searchTerm);
      echo json_encode($response);
    }

    // Cari Item Layanan
    public function cari_item_layanan(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->Sub_layanan_model->cari_item_layanan($searchTerm);
      echo json_encode($response);
    }

    public function index() {
        $data['tampilkan'] = $this->Sub_layanan_model->tampil();
        $this->template->load('template', 'sub_layanan/list',$data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Sub_layanan_model->json();
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_layanan/create_action'),
            'id_sub_layanan' => set_value('id_sub_layanan'),
            'id_sub_layanan' => set_value('id_sub_layanan'),
            'id_layanan' => set_value('id_layanan'),
            'id_item_layanan' => set_value('id_item_layanan'),
            'dibuat_oleh' => set_value('dibuat_oleh'),
        );
        $this->template->load('template', 'sub_layanan/create', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('id_layanan', 'Layanan','trim|required');
        $this->form_validation->set_rules('id_item_layanan', 'Sub Item Layanan','trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'id_sub_layanan' => kode_unik_sub_layanan('id_sub_layanan', TRUE),
                'id_layanan' => $this->input->post('id_layanan', TRUE),
                'id_item_layanan' => $this->input->post('id_item_layanan', TRUE),
                'dibuat_oleh' => $this->input->post('dibuat_oleh',TRUE),
                'tgl_terakhir_dibuat' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','dibuat_oleh');
            $this->Sub_layanan_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil tersimpan.');
            helper_log("add", "menambahkan Data Sub Layanan");
            redirect(site_url('sub_layanan'));
        }
    }

    public function update($id) {
        $row = $this->Sub_layanan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_layanan/update_action'),
                'id_sub_layanan' => set_value('id_sub_layanan', $row->id_sub_layanan),
                'id_layanan' => set_value('id_layanan', $row->id_layanan),
                'id_item_layanan' => set_value('id_item_layanan', $row->id_item_layanan),
                'diubah_oleh' => set_value('diubah_oleh', $row->diubah_oleh),
            );
            $this->template->load('template', 'sub_layanan/edit', $data);
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_layanan'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('id_layanan', 'Layanan','trim|required');
        $this->form_validation->set_rules('id_item_layanan', 'Sub Item Layanan','trim|required');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sub_layanan', TRUE));
        }else{
            $data = array(
                'id_layanan' => $this->input->post('id_layanan', TRUE),
                'id_item_layanan' => $this->input->post('id_item_layanan', TRUE),
                'diubah_oleh' => $this->input->post('diubah_oleh',TRUE),
                'tgl_terakhir_diubah' => date('Y-m-d H:i:s'),
            );
            $this->session->userdata('full_name','diubah_oleh');
            $this->Sub_layanan_model->update($this->input->post('id_sub_layanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di ubah.');
            helper_log("edit", "mengedit Data Sub Layanan");
            redirect(site_url('sub_layanan'));
        }
    }

    public function delete($id){
        $row = $this->Sub_layanan_model->get_by_id($id);
        if ($row) {
            $this->Sub_layanan_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus.');
             helper_log("hapus", "menghapus Data Sub Layanan");
            redirect(site_url('sub_layanan'));
        } else {
            $this->session->set_flashdata('message_failed', 'Data tidak ditemukan');
            redirect(site_url('sub_layanan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_sub_layanan', 'id_sub_layanan', 'trim');
    }

}