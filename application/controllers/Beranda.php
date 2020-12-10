<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        is_login(); 
        $this->load->model('Beranda_model');
    }

    public function index(){
       $this->template->load('template', 'beranda');
    }


    // // Menampilkan Total Aktivitas Pengguna
    // public function aktivitas_pengguna(){
    //     if (!empty($this->input->get('id'))) {
    //         $data['cek_aktivitas_pengguna'] = $this->Beranda_model->tampil_aktivitas_pengguna($this->input->get('id'));
    //         helper_log("baca", "melihat Aktivitas Pengguna");
    //         $this->load->view('v_aktivitas_pengguna/v_aktivitas',$data);
    //     }else{
    //         helper_log("baca", "melihat Aktivitas Pengguna");
    //         echo "<center><label style='font-size:20px;'>Data Tidak Tersedia Bosku</label></center>";
    //     }
    // }

    // DATATABLES  Aktivitas Pengguna
    function json(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('tbl_log');
        return print_r($this->datatables->generate());
    }
     
    // Menampilkan Detail Tiket Insiden Masuk Status Open Hari Ini
    public function detail_insiden_open_hari_ini(){
        if (!empty($this->input->get('id'))) {
            $data['cek_tiket_insiden_open'] = $this->Beranda_model->tampil_detail_insiden_open_hari_ini($this->input->get('id'));
            helper_log("baca", "melihat detail Insiden Open Hari InI");
            $this->load->view('v_detail_tiket_insiden_hari_ini/v_detail_open',$data);
        }else{
            helper_log("baca", "melihat detail Insiden Open Hari InI");
            echo "<center><label style='font-size:20px;'>Data Tidak Tersedia</label></center>";
        }
    }

    // Menampilkan Detail Tiket Insiden Masuk Status Closed Hari Ini
    public function detail_insiden_closed_hari_ini(){
        if (!empty($this->input->get('id'))) {
            $data['cek_tiket_insiden_closed'] = $this->Beranda_model->tampil_detail_insiden_closed_hari_ini($this->input->get('id'));
            helper_log("baca", "melihat detail Insiden Closed Hari InI");
            $this->load->view('v_detail_tiket_insiden_hari_ini/v_detail_closed',$data);
        }else{
            helper_log("baca", "melihat detail Insiden Closed Hari InI");
        	echo "<center><label style='font-size:20px;'>Data Tidak Tersedia</label></center>";
        }
    }

    // Menampilkan Detail Tiket Insiden Keamanan Informasi Masuk Status Open Hari Ini
    public function detail_insiden_keamanan_open_hari_ini(){
        if (!empty($this->input->get('id'))) {
            $data['cek_tiket_insiden_keamanan_open'] = $this->Beranda_model->tampil_detail_insiden_keamanan_open_hari_ini($this->input->get('id'));
            helper_log("baca", "melihat detail Insiden Keamanan Informasi Open Hari InI");
            $this->load->view('v_detail_tiket_insiden_keamanan_hari_ini/v_detail_open',$data);
        }else{
            helper_log("baca", "melihat detail Insiden Keamanan Informasi Open Hari InI");
        	echo "<center><label style='font-size:20px;'>Data Tidak Tersedia</label></center>";
        }
    }

    // Menampilkan Detail Tiket Insiden Keamanan Informasi Masuk Status Closed Hari Ini
    public function detail_insiden_keamanan_closed_hari_ini(){
        if (!empty($this->input->get('id'))) {
            $data['cek_tiket_insiden_keamanan_closed'] = $this->Beranda_model->tampil_detail_insiden_keamanan_closed_hari_ini($this->input->get('id'));
            helper_log("baca", "melihat detail Insiden Keamanan Informasi Closed Hari InI");
            $this->load->view('v_detail_tiket_insiden_keamanan_hari_ini/v_detail_closed',$data);
        }else{
            helper_log("baca", "melihat detail Insiden Keamanan Informasi Closed Hari InI");
        	echo "<center><label style='font-size:20px;'>Data Tidak Tersedia</label></center>";
        }
    }

    // Menampilkan Detail Tiket Service Request  Masuk Status Open Hari Ini
    public function detail_service_request_open_hari_ini(){
        if (!empty($this->input->get('id'))) {
            $data['cek_tiket_service_request_open'] = $this->Beranda_model->tampil_detail_service_request_open_hari_ini($this->input->get('id'));
            helper_log("baca", "melihat detail Service Request Open Hari InI");
            $this->load->view('v_detail_tiket_service_request_hari_ini/v_detail_open',$data);
        }else{
            helper_log("baca", "melihat detail Service Request Open Hari InI");
        	echo "<center><label style='font-size:20px;'>Data Tidak Tersedia</label></center>";
        }
    }

    // Menampilkan Detail Tiket Service Request Masuk Status Closed Hari Ini
    public function detail_service_request_closed_hari_ini(){
        if (!empty($this->input->get('id'))) {
            $data['cek_tiket_service_request_closed'] = $this->Beranda_model->tampil_detail_service_request_closed_hari_ini($this->input->get('id'));
            helper_log("baca", "melihat detail Service Request Closed Hari InI");
            $this->load->view('v_detail_tiket_service_request_hari_ini/v_detail_closed',$data);
        }else{
            helper_log("baca", "melihat detail Service Request Closed Hari InI");
            echo "<center><label style='font-size:20px;'>Data Tidak Tersedia</label></center>";
        }
    }

}
