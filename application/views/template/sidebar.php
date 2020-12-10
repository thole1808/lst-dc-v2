<section class="sidebar" style="height: auto;">
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree" style="background-color:white;">

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
                <div class="row">
                    <style>
                        #myImg {
                          border-radius: 5px;
                          cursor: pointer;
                          transition: 0.3s;
                        }
                        #myImg:hover {opacity: 0.9;}
                        /* The Modal (background) */
                        .modal {
                          display: none; /* Hidden by default */
                          position: fixed; /* Stay in place */
                          padding-top: 100px; /* Location of the box */
                          left: 0;
                          top: 0;
                          width: 100%; /* Full width */
                          height: 100%; /* Full height */
                          overflow: auto; /* Enable scroll if needed */
                          background-color: rgb(0,0,0); /* Fallback color */
                          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
                        }

                        /* Modal Content (image) */
                        .modal-content {
                          margin: auto;
                          display: block;
                          width: 80%;
                          max-width: 700px;
                        }
                        /* Caption of Modal Image */
                        #caption {
                          margin: auto;
                          display: block;
                          width: 80%;
                          max-width: 700px;
                          text-align: center;
                          color: #ccc;
                          padding: 10px 0;
                          height: 150px;
                        }

                        /* Add Animation */
                        .modal-content, #caption {  
                          -webkit-animation-name: zoom;
                          -webkit-animation-duration: 0.6s;
                          animation-name: zoom;
                          animation-duration: 0.6s;
                        }

                        @-webkit-keyframes zoom {
                          from {-webkit-transform:scale(0)} 
                          to {-webkit-transform:scale(1)}
                        }

                        @keyframes zoom {
                          from {transform:scale(0)} 
                          to {transform:scale(1)}
                        }

                        /* The Close Button */
                        .close {
                          position: absolute;
                          top: 100px;
                          right:100px;
                          color: white;
                          font-style: bold;
                          font-size: 40px;
                          font-weight: bold;
                          transition: 0.3s;
                        }
                        .close:hover,
                        .close:focus {
                          color: white;
                          text-decoration: none;
                          cursor: pointer;
                        }
                        </style>
                        <div id="myModal" class="modal">
                          <span class="close">&times;</span>
                          <img class="modal-content" id="img01">
                          <div id="caption"></div>
                        </div>
                        <img id="myImg" src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>" 
                         class="profile-user-img img-responsive img-circle img"
                         style="vertical-align: middle; width: 190px; height: 170px; border-radius: 500%;" rotate90>
                </div>
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

    <!-- FUNSI GET MENU --> 
     <?php
      // chek settingan tampilan menu
      $setting = $this->db->get_where('tbl_setting', array('id_setting' => 1))->row_array();
      if ($setting['value'] == 'ya') {
          // cari level user
          $id_user_level = $this->session->userdata('id_user_level');
          $sql_menu = "SELECT * 
          FROM tbl_menu 
          WHERE id_menu IN(SELECT id_menu FROM tbl_hak_akses WHERE id_user_level='".$id_user_level."'  
          ORDER BY id_user_level ASC) AND is_main_menu='0' AND is_aktif='Aktif'";
      }else{
          // $sql_menu = "SELECT * FROM tbl_menu WHERE is_aktif='Aktif' AND is_main_menu=0";
          $sql_menu ="SELECT * 
          FROM tbl_menu 
          WHERE id_menu 
          AND is_main_menu='0' AND is_aktif='Aktif'";
      }

      $main_menu = $this->db->query($sql_menu)->result();

      foreach ($main_menu as $menu) {
         
          // Cek Sub Menu
          $this->db->where('is_main_menu', $menu->id_menu);
          $this->db->where('is_aktif', 'Aktif');

          $submenu = $this->db->get('tbl_menu');
          if ($submenu->num_rows() > 0) {
              // Tampil Sub Menu
              echo "<li class='treeview'>
                      <a href='#'>
                          <i class='$menu->icon'></i> <span>" .$menu->title. "</span>
                          <span class='pull-right-container'>
                              <i class='fa fa-angle-left pull-right'></i>
                          </span>
                      </a>
              <ul class='treeview-menu'>";

              foreach ($submenu->result() as $sub) {
                  echo "<li>".anchor($sub->url,"<i class='$sub->icon'></i> ".$sub->title)."</li>";
              }
              echo"</ul></li>";    

          }else{
              // Tampil 1 Menu
              echo "<li>";
              echo anchor($menu->url, "<i class='" . $menu->icon . "'></i> " .$menu->title);
              echo "</li>";
          }
      }

      ?>     
    <!-- FUNGSI GET MENU -->
      
    <li class="header" style="
        outline: none;
        text-align:left;
        font-family:'Arvo', serif;
        color:white;
        font-size:10px;
        background-color: rgba(0,79,113,1);">
        AUTENTIKASI 
    </li>
    <li>
        <?php echo anchor('auth/logout', "<i class='fa fa-sign-out'></i> LOGOUT"); ?>        
    </li>
</ul>

    <style type="text/css">
     .active{
      background-color:#A9A9A9;
      color:black;
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

    <script type="text/javascript">
        $(function () {
            // Get the modal
            var modal = document.getElementById("myModal");
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
              modal.style.display = "none";
            }
        });
    </script>

</section>
<!-- /.sidebar -->