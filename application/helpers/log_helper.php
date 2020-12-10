<?php 

function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "logout"){
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
    }
    elseif(strtolower($tipe) == "hapus"){
        $log_tipe  = 4;
    }
    elseif(strtolower($tipe) == "baca"){
        $log_tipe  = 5;
    }
    else{
        $log_tipe  = 6;
    }
    
    // $url_segment = uri_string(); 
    $url_segment = base_url(uri_string()); 
    // paramter
    $param['log_user']      = $CI->session->userdata('full_name');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;
    $param['ip_address']      = $CI->input->ip_address();
    $param['info_browser']      = $CI->input->user_agent();
    $param['aksi']    = $url_segment;
 
    //load model log
    $CI->load->model('m_log');
 
    //save to database
    $CI->m_log->save_log($param);
 
}

?>