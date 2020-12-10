<section class="sidebar" style="height: auto;">
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">

        <style type="text/css">
            img {
                image-orientation: from-image;
            }
            /* or use CSS */
            .rotate90 {
                -webkit-transform: rotate(90deg);
                -moz-transform: rotate(90deg);
                -o-transform: rotate(90deg);
                -ms-transform: rotate(90deg);
                transform: rotate(90deg);
            }
        </style>

    <li>
        <div class="panel-body">
            <div class="box-body">
                <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>" class="profile-user-img img-responsive img-circle img"
                     style="vertical-align: middle; width: 190px; height: 170px; border-radius: 500%;" rotate90>
            </div>

            <center>
                <p style="font-family:serif;"><?php echo $this->session->userdata('full_name'); ?></p>
            </center>

            <center style="background-color: transparent;">
                <!-- <a href="#" class="btn btn-block btn-primary btn-sm"><b style="color: white;">Ubah Profile</b></a> -->
                <a style="color: white;" class="btn btn-block btn-primary btn-sm" 
                href="<?=site_url('ganti_profile')?>"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: white;"></span> Ubah Profile </a>
            </center>

        </div>
    </li>


    <li class="header" style="
    outline: none;
    text-align:left;
    font-family:'Arvo', serif;
    color:white;
    font-size:10px;
    background-color: rgba(0,79,113,1);
    ">
    MENU NAVIGASI
    </li>
      
    <!--  -->   
    <?php
    // chek settingan tampilan menu
    $setting = $this->db->get_where('tbl_setting', array('id_setting' => 1))->row_array();
    if ($setting['value'] == 'ya') {
        // cari level user
        $id_user_level = $this->session->userdata('id_user_level');
        $sql_menu = "SELECT * 
        FROM tbl_menu 
        WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level='".$id_user_level."'  
        ORDER BY id_user_level ASC) and is_main_menu=0 and is_aktif='Aktif'";
    }
     else {
        $sql_menu = "select * from tbl_menu where is_aktif='Aktif' and is_main_menu=0";
    }

    $main_menu = $this->db->query($sql_menu)->result();

    foreach ($main_menu as $menu) {
        // chek is have sub menu
        $this->db->where('is_main_menu', $menu->id_menu);
        $this->db->where('is_aktif', 'Aktif');
        $submenu = $this->db->get('tbl_menu');
        if ($submenu->num_rows() > 0) {
            // display sub menu
            echo "<li class='treeview'>
                    <a href='#'>
                        <i class='$menu->icon'></i> <span>" .$menu->title. "</span>
                        <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                        </span>
                    </a>
                    <ul class='treeview-menu' style='display: none;'>";
      
            foreach ($submenu->result() as $sub) {
                echo "<li>" . anchor($sub->url, "<i class='$sub->icon'></i> " .$sub->title) . "</li>";
            }
            echo" </ul>
                </li>";
      
        } else {
            // display main menu
            echo "<li>";
            echo anchor($menu->url, "<i class='" . $menu->icon . "'></i> " .$menu->title);
            echo "</li>";
        }
    }

    ?>

    <li class="header" style="
    outline: none;
    text-align:left;
    font-family:'Arvo', serif;
    color:white;
    font-size:10px;
    background-color: rgba(0,79,113,1);
    ">
    AUTENTIKASI 
    </li>

    <li><?php echo anchor('auth/logout', "<i class='fa fa-sign-out'></i> LOGOUT"); ?></li>

</ul>

<style type="text/css">
 .active{
  background-color:#A9A9A9;
  color:#fff;
}
</style>

<script>
    //yang ini di pakai
    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
    return this.href == url;
    }).parent().addClass('active');
    // for treeview
    $('ul.treeview-menu a').filter(function() {
    return this.href == url;
    }).closest('.treeview').addClass('active');
</script>


</section>
<!-- /.sidebar -->