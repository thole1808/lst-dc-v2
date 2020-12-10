<?php


// AutoNumber UNIK Riwayat Tiket
// function kode_unik_riwayat_tiket(){
//     $ci = get_instance();
//     $query = "SELECT max(RIGHT(id_riwayat_tiket,4)) as maxKode FROM tbl_riwayat_tiket
//     WHERE DATE(tgl_dibuat)=CURDATE()";
//     $data = $ci->db->query($query)->row_array();
//     $kode = $data['maxKode'];
//     $char = "RWY";
//     $noUrut = (int) substr($kode,3, 9);
//     $noUrut= $kode+1;
//     $kodeBaru = sprintf("%04s", $noUrut);
//     return $char."-".date('dmy')."-".$kodeBaru;
// }

// AutoNumber UNIK Sub Status Jenis Tiket
function kode_unik_sub_status_jenis_tiket(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_sub_status_jenis_tiket,4)) as maxKode FROM tbl_sub_status_jenis_tiket
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "SSJ";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Item Klasifikasi 
function kode_unik_item_klasifikasi(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_item_klasifikasi,4)) as maxKode FROM master_item_klasifikasi
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "ITK";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Transaksi Buat Tiket
function kode_unik_trans_tiket(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_trans_tiket,4)) as maxKode FROM tbl_tiket
    WHERE DATE(tgl_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "TKT";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Nomor Tiket
function kode_unik_no_tiket(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(no_tiket,4)) as maxKode FROM tbl_tiket
    WHERE DATE(tgl_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "NTK";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Sub Klasifikasi 
function kode_unik_sub_klasifikasi(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_sub_klasifikasi,4)) as maxKode FROM tbl_sub_klasifikasi
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "SKL";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Sub Urgency Insiden
function kode_unik_sub_urgency_insiden(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_sub_urgency_insiden,4)) as maxKode FROM tbl_sub_urgency_insiden
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "SUI";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Sub Dampak Insiden
function kode_unik_sub_dampak_insiden(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_sub_dampak_insiden,4)) as maxKode FROM tbl_sub_dampak_insiden
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "SDI";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Sub Admin Klien
function kode_unik_sub_admin_klien(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_sub_admin_klien,4)) as maxKode FROM tbl_sub_admin_klien
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "SAK";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Layanan
function kode_unik_sub_layanan(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_sub_layanan,4)) as maxKode FROM tbl_sub_layanan
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "SLY";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}


// AutoNumber UNIK Master Shift 
function kode_unik_master_shift(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_shift,4)) as maxKode FROM master_shift
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "SHF";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}


// AutoNumber UNIK Master Penyebab Utama / Root Cause
function kode_unik_master_penyebab_utama(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_penyebab,4)) as maxKode FROM master_penyebab_utama
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "PYB";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Prioritas
function kode_unik_master_prioritas(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_prioritas,4)) as maxKode FROM master_prioritas
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "PRI";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Urgency
function kode_unik_master_urgency(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_urgency,4)) as maxKode FROM master_urgency
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "URG";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Dampak
function kode_unik_master_dampak(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_dampak,4)) as maxKode FROM master_dampak
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "DMP";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Klasifikasi
function kode_unik_master_klasifikasi(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_klasifikasi,4)) as maxKode FROM master_klasifikasi
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "KLS";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Jenis Tiket
function kode_unik_master_jenis_tiket(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_jenis_tiket,4)) as maxKode FROM master_jenis_tiket
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "JTK";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Admin Klien
function kode_unik_master_adm_klien(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_admin,4)) as maxKode FROM master_admin_klien
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "ADM";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Status Tiket
function kode_unik_master_status_tiket(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_status_tiket,4)) as maxKode FROM master_status_tiket
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "STK";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Cabang
function kode_unik_master_cabang(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_cabang,4)) as maxKode FROM master_cabang
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "CAB";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Jabatan
function kode_unik_master_jabatan(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_jabatan,4)) as maxKode FROM master_jabatan
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "JBT";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Item Layanan
function kode_unik_master_item_layanan(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_item_layanan,4)) as maxKode FROM master_item_layanan
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "ILY";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Layanan
function kode_unik_master_layanan(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_layanan,4)) as maxKode FROM master_layanan
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "LYN";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Klien
function kode_unik_master_klien(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_klien,4)) as maxKode FROM master_klien
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "KLI";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// AutoNumber UNIK Master Produk
function kode_unik_master_produk(){
    $ci = get_instance();
    $query = "SELECT max(RIGHT(id_produk,4)) as maxKode FROM master_produk
    WHERE DATE(tgl_terakhir_dibuat)=CURDATE()";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $char = "PRD";
    $noUrut = (int) substr($kode,3, 9);
    $noUrut= $kode+1;
    $kodeBaru = sprintf("%04s", $noUrut);
    return $char."-".date('dmy')."-".$kodeBaru;
}

// Dropdown Dinamis 
function cmb_dinamis($name,$table,$field,$pk,$selected=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control select2' data-placeholder='-- silahkan pilih --'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

// Cek Is login User
function is_login(){
    $ci = get_instance();
    if(empty($ci->session->userdata('id_users'))){
        redirect('auth');
    }else{
        $modul = $ci->uri->segment(1);
        $id_user_level = $ci->session->userdata('id_user_level');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('tbl_menu',array('url'=>$modul))->row_array();
        $id_menu = $menu['id_menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('tbl_hak_akses',array('id_menu'=>$id_menu,'id_user_level'=>$id_user_level));
        // cek user apakah sudah di kasih akses ke modul ini ?
        if($hak_akses->num_rows()< 1){
            // Jika 
            if($id_user_level = $ci->session->userdata('id_users')){
                // redirect('auth');
                echo "<script>
     
                alert('tidak dizinkan mengakses halaman ini , Silahkan login kembali demi keamanan Bersama.');
                window.location.href='auth/logout';
                </script>";
            }
        }
    }
}

// Alert 
function alert($class,$title,$description){
    return '<div class="alert '.$class.' alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
        '.$description.'
      </div>';
}

// untuk chek akses level pada modul peberian akses menu 
function checked_akses($id_user_level,$id_menu){
    $ci = get_instance();
    // $ci->db->where('url',$url);
    $ci->db->where('id_user_level',$id_user_level);
    $ci->db->where('id_menu',$id_menu);
    $result = $ci->db->get('tbl_hak_akses');
    if($result->num_rows()>0){
        return "checked='checked'";
    }
}

