<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="box-body">
            <div class="col-xs-12">
                <?php echo alert('alert-info', 'Perhatian', 'Silahkan Cheklist Pada Menu Yang Akan Diberikan Akses') ?>
                <div class="box box-primary box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA HAK AKSES UNTUK LEVEL :  <b><?php echo $level['nama_level'] ?></b></h3>
                    </div>

                <div class="box-body">
                <ul class="sidebar-menu" data-widget="tree">
                    <?php
                    // chek settingan tampilan menu
                    // $setting = $this->db->get_where('tbl_setting', array('id_setting' => 1))->row_array();
                    // if ($setting['value'] == 'ya') {
                    //     // cari level user
                    //     $id_user_level = $this->session->userdata('id_user_level');
                    //     $sql_menu = "SELECT * 
                    //     FROM tbl_menu 
                    //     WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y'";
                    // } else {
                        $sql_menu = "select * from tbl_menu where is_aktif='Aktif' and is_main_menu=0";
                    // }

                    $main_menu = $this->db->query($sql_menu)->result();


                    foreach ($main_menu as $menu) {
                        // chek is have sub menu
                        $this->db->where('is_main_menu', $menu->id_menu);
                        $this->db->where('is_aktif', 'Aktif');
                        $submenu = $this->db->get('tbl_menu');
                        if ($submenu->num_rows() > 0) {
                            // display sub menu
                            echo "<li class='treeview'>
                                    <a href='#' style='color:black;'>
                                        <span class='$menu->icon'></span> <span>" .$menu->title."</span>
                                        <span class='pull-right-container'>
                                            <i class='fa fa-angle-left pull-right'></i>
                                        </span>
                                    </a>
                                    <ul class='treeview-menu' style='display: none;'>";

                            foreach ($submenu->result() as $sub) {
                                if ($sub->id_menu='') {
                                     # code...
                                }else{
                                    echo "<ul>"."<a class='$sub->icon'><input type='checkbox' style='float:right' " . checked_akses($this->uri->segment(3), $menu->id_menu). " onClick='kasi_akses($menu->id_menu)'> ".$sub->title.
                                    "</a>"."</ul>";
                                } 
                               
                            // echo "<ul>"."<a class='$sub->icon'><input type='checkbox' style='float:right' " . checked_akses($this->uri->segment(3), $menu->id_menu). " onClick='kasi_akses($menu->id_menu)'> ".strtoupper($sub->title).
                            //     "</a>"."</ul>";

                                echo "<ul>";
                                    echo "create ";
                                    echo "<br>";
                                    echo "update";
                                echo "</ul>";
                            }

                            echo" </ul>
                                </li>";
                      
                        }else{
                            // display main menu
                            echo "<li>";
                            echo "<a  class='".$menu->icon."' style='color:black;'> ".$menu->title."<input type='checkbox'style='float:right' " . checked_akses($this->uri->segment(3), $menu->id_menu) . " onClick='kasi_akses($menu->id_menu)'>
                                </a>
                                ";

                                echo "<ul>";
                                    echo "create ";
                                    echo "<br>";
                                    echo "update";
                                echo "</ul>";

                            echo "</li>";

                            }
                    }?>
                </ul>
            </div>
    </div>
</div>
</div>
</div>
</section>
</div>

<script type="text/javascript">
    function kasi_akses(id_menu) {
        //alert(id_menu);
        var id_menu = id_menu;
        var level = '<?php echo $this->uri->segment(3); ?>';
        //alert(level);
        $.ajax({
            url: "<?php echo base_url() ?>index.php/userlevel/kasi_akses_ajax",
            data: "id_menu=" + id_menu + "&level=" + level,
            success: function (html)
            {
                load();
                alert('sukses');
            }
        });
    }
</script>