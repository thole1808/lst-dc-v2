<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userlevel extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $this->load->model('User_level_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index() {
        $this->template->load('template', 'userlevel/tbl_user_level_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->User_level_model->json();
    }

    public function read($id) {
        $row = $this->User_level_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_user_level' => $row->id_user_level,
                'nama_level' => $row->nama_level,
            );
            $this->template->load('template', 'userlevel/tbl_user_level_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userlevel'));
        }
    }

    function akses() {
        $data['level'] = $this->db->get_where('tbl_user_level', array('id_user_level' => $this->uri->segment(3)))->row_array();
        $data['menu'] = $this->db->get('tbl_menu')->result();
        // echo "<pre>";
        //     print_r($data);
        //     exit();
        // echo "</pre>";
        $this->template->load('template', 'userlevel/akses', $data);
    }

    function kasi_akses_ajax() {
        $id_menu = $_GET['id_menu'];
        $id_user_level = $_GET['level'];
        // $url = $_GET['url'];
        // chek data
        $params = array('id_menu' => $id_menu, 'id_user_level' => $id_user_level);
        // $params = array('id_menu' => $id_menu, 'id_user_level' => $id_user_level);
        $akses = $this->db->get_where('tbl_hak_akses', $params);
        if ($akses->num_rows() < 1) {
            // insert data baru
           
            // Reset Auto Increment Tabel Hak Akses
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_hak_akses AUTO_INCREMENT =1');
            // Reset Auto Increment Tabel Hak Akses

            $this->db->insert('tbl_hak_akses', $params);
            $this->session->set_flashdata('message', 'Berhasil Menambahkan');

        }else{
            
            // Reset Auto Increment Tabel Hak Akses
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_hak_akses AUTO_INCREMENT =1');
            // Reset Auto Increment Tabel Hak Akses

            // Reset Auto Increment Tabel Menu
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_menu AUTO_INCREMENT =1');
            // Reset Auto Increment Tabel Menu

            // Reset Auto Increment Tabel User Level
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_user_level AUTO_INCREMENT =1');
            // Reset Auto Increment Tabel User Level


            $this->db->where('id_menu', $id_menu);
            // $this->db->where('url', $url);
            $this->db->where('id_user_level', $id_user_level);
            $this->db->delete('tbl_hak_akses');
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('userlevel/create_action'),
            'id_user_level' => set_value('id_user_level'),
            'nama_level' => set_value('nama_level'),
        );
        $this->template->load('template', 'userlevel/tbl_user_level_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_level' => $this->input->post('nama_level', TRUE),
            );

            // Reset Auto Increment Tabel User Level
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_user_level AUTO_INCREMENT =1');
            // Reset Auto Increment Tabel User Level

            $this->User_level_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('userlevel'));
        }
    }

    public function update($id) {
        $row = $this->User_level_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('userlevel/update_action'),
                'id_user_level' => set_value('id_user_level', $row->id_user_level),
                'nama_level' => set_value('nama_level', $row->nama_level),
            );
            $this->template->load('template', 'userlevel/tbl_user_level_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userlevel'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user_level', TRUE));
        } else {
            $data = array(
                'nama_level' => $this->input->post('nama_level', TRUE),
            );

            $this->User_level_model->update($this->input->post('id_user_level', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('userlevel'));
        }
    }

    public function delete($id) {
        $row = $this->User_level_model->get_by_id($id);
        if ($row) {

            // Reset Auto Increment Tabel User Level
            $this->load->database();    
            $this->db->query('ALTER TABLE tbl_user_level AUTO_INCREMENT =1');
            // Reset Auto Increment Tabel User Level

            $this->User_level_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('userlevel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userlevel'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nama_level', 'nama level', 'trim|required');
        $this->form_validation->set_rules('id_user_level', 'id_user_level', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

/* End of file Userlevel.php */
/* Location: ./application/controllers/Userlevel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 06:29:37 */
    /* http://harviacode.com */