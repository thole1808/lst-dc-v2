<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
        }
        html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
        @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
            *[class="table_width_100"] {
                width: 96% !important;
            }
            *[class="border-right_mob"] {
                border-right: 1px solid #dddddd;
            }
            *[class="mob_100"] {
                width: 100% !important;
            }
            *[class="mob_center"] {
                text-align: center !important;
            }
            *[class="mob_center_bl"] {
                float: none !important;
                display: block !important;
                margin: 0px auto;
            }   
            .iage_footer a {
                text-decoration: none;
                color: #929ca8;
            }
            img.mob_display_none {
                width: 0px !important;
                height: 0px !important;
                display: none !important;
            }
            img.mob_width_50 {
                width: 40% !important;
                height: auto !important;
            }
        }
        .table_width_100 {
            width: 680px;
        }
    </style>

    <style type="text/css"> 
        hr.style-four {
        padding: 0;
        border: none;
        border-top: medium double #333;
        color: #333;
        text-align: center;
        }
        hr.style-four:after {
        /*content: "www.lawangsewu.com";*/
        display: inline-block;
        position: relative;
        top: -0.7em;
        font-size: 1.5em;
        padding: 0 0.25em;
        background: white;
        }
    </style>
    
    <style type="text/css">
        #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        #customers tr:hover {background-color: #ddd;}
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #16a5f2;
          color: white;
        }
        </style>
</head>
<body>
    <div id="mailsub" class="notification" align="center">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;">
        <tr>
        <td align="center" bgcolor="#eff3f8">
        <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" 
        style="max-width: 680px; min-width: 300px;">
            <tr>
                <td></td>
            </tr>
            <!--header -->
            <tr>
                <td align="center" bgcolor="#ffffff">
                    <!-- padding -->
                    <table>
                        <tr>
                            <td align="center">
                                <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                    <img src="http://www.lawangsewu.com/images/logo%20lst%20ver_col1_png.png?crc=3910970714" width="150" alt="Metronic" border="0"  />
                                </font>
                            </td>
                        </tr>
                        <!-- gambar -->
                        <hr class="style-four">
                        <!--content 1 -->
                        <tr>
                            <td>
                                <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" style="text-align:left;">
                                                Info Status Tiket.<br>
                                                Dear 
                                                <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" />
                                                <?php 
                                                    $jumlah = $this->db->query("
                                                        SELECT nama_admin FROM master_admin_klien WHERE id_admin='".$id_admin."';
                                                    "); 

                                                    $fetch = $jumlah->result_array();
                                            
                                                    foreach ($fetch as $data) {
                                                       $data['nama_admin'];
                                                    ?>
                                               
                                                <?php }?>

                                                <b><?php echo $data['nama_admin']; ?></b>
                                            </td>
                                        </tr>
                                    </table>
                                </font>
                            </td>
                        </tr>
                        <br>
                        <!-- ISI -->
                        <table id="customers">
                              <tr>
                                <th width="auto" style="text-align:center;">No. Tiket</th>
                                <th width="auto" style="text-align:center;">Tanggal</th>
                                <th width="auto" style="text-align:center;">Status</th>
                              </tr>
                              <tr>
                                <td style="text-align:center;"><?php echo $no_tiket; ?></td>
                                <td style="text-align:center;"><?php echo $tgl_dibuat; ?></td>
                                <td style="text-align:center;">
                                    <input type="hidden" name="id_status_tiket" value="<?php echo $id_status_tiket; ?>" />
                                    <?php 
                                        $jumlah = $this->db->query("
                                            SELECT nama_status FROM master_status_tiket WHERE id_status_tiket='".$id_status_tiket."';
                                        "); 
                                        $fetch = $jumlah->result_array();
                                        foreach ($fetch as $data) {
                                           $data['nama_status'];
                                        ?>
                                    <?php }?>

                                    <b><?php echo $data['nama_status']; ?></b>
                                </td>
                              </tr>
                        </table>
                        <!--ISI-->
                        <br>
                        <!-- Footer -->
                        <tr>
                            <td class="iage_footer" align="center" bgcolor="#ffffff">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;">
                                            <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                                                    Copyright &copy;2020 PT. Lawang Sewu Teknologi Ver.2
                                                </span>
                                            </font>              
                                        </td>
                                    </tr>          
                                </table>
                            </td>
                        </tr>
                        <!--footer -->
                </td>
            </tr>
        </table>
    </div>
</body>
</html>