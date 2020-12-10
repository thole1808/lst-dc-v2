<div class="content-wrapper">
  <section class="content">
    <div class="box-body">
      <div class="col-xs-12">
      <div class="box box-primary box-solid">
          <div class="box-header">
              <h3 class="box-title">List Tiket Closed Breach</h3>
          </div>
          <div class="box-body">

          <!-- Style-->
          <style type="text/css">
              #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                table-layout: fixed;
                white-space:nowrap;
              }
              #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
                /*background: red;
                color: white;*/
              }
              #table tr:nth-child(even){background-color: #f2f2f2;}
              #table tr:hover {background-color: #ddd;}
              #table th {
                background-color:#4682B4;
                color: white;
                text-align: center;
              }
          </style>
          <!-- Style -->

          <!-- Pilihan -->
          <form action="<?php echo base_url('list_tiket_closed/cari'); ?>" method="POST">
          <div class="box-body">
            <div class="row">
                <div class="col-md-3 form-group">
                  <label for="email">Tanggal Awal</label>
                    <div class='input-group date1' id='datetimepicker6'>
                        <input type="text" name="tanggal_awal" class="form-control input-tanggal-awal" value="<?php echo $_POST['tanggal_awal']?>"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <script type="text/javascript">
                      document.getElementById('tanggal_awal').value = "<?php echo $_POST['tanggal_awal'];?>";
                    </script>
                </div>
                <div class="col-md-3 form-group">
                  <label for="email">Tanggal Awal</label>
                    <div class='input-group date2' id='datetimepicker7'>
                        <input type="text" name="tanggal_akhir" class="form-control input-tanggal-akhir" value="<?php echo $_POST['tanggal_akhir']?>"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <script type="text/javascript">
                      document.getElementById('tanggal_akhir').value = "<?php echo $_POST['tanggal_akhir'];?>";
                    </script>
                </div>
                <div class='col-md-3 form-group'>
                  <label>Pilih</label>
                  <select name="pilihan" class="form-control select2" id="pilihan">
                    <option value="All">All</option>
                    <option value="Breach">Breach</option>
                    <option value="No Breach">No Breach</option>
                  </select>
                </div>
                <script type="text/javascript">
                  document.getElementById('pilihan').value = "<?php echo $_POST['pilihan'];?>";
                </script>
            </div>
            <div class="col-md-3 form-group">
              <div class="row">
                <button class="btn btn-primary" type="submit" id="btn-search">
                    <span class="glyphicon glyphicon-search"></span> Cari
                </button> 
                <a href="<?php echo site_url('list_tiket_closed') ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i>Kembali</a>    
              </div>
            </div>
          </div>
          </form>
          <!-- Pilihan  -->

          <div id="table" class="table-responsive freeze-table">
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th>No. Tiket</th>
                      <th>Jenis Tiket</th>
                      <th>Prioritas</th>
                      <th>Layanan</th>
                      <th>Sub Layanan</th>
                      <th>Klien</th>
                      <th>Admin</th>
                      <th>Status</th>
                      <th>Keluhan</th>
                      <th>Dibuat</th>
                      <th>Diubah</th>
                      <th>Waktu Penanganan</th>
                      <th>Waktu Penyelesaian </th>
                      <th width="200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                  <?php
                    if(!empty($list_tiket_closed)){ 
                      $no = 1;
                      foreach ($list_tiket_closed as $data){                         
                      ?>
                      <?php if ($data->nama_prioritas==''){?>

                      <?php }elseif ($data->nama_prioritas=='Prioritas 5'){?>
                   
                      <?php }elseif($data->waktu_penanganan <= $data->waktu_selesai){ ?>

                      <!-- Prioritas 1 Red -->
                      <?php if ($data->nama_prioritas=='Prioritas 1'){ ?>
                        <tr id="tbl_prio_1">
                            <style type="text/css">
                              #tbl_prio_1 td, th {
                                border: 1px solid #ddd;
                                padding: 8px;
                                background:red;
                                color: white;
                              }
                            </style>
                            <td><?php echo $no++ ?></td>
                            <td>
                                <label style="font-style: bold;">
                                    <?php echo $data->no_tiket; ?> 
                                </label>
                            </td>
                            <td style="text-align: left;"><?php echo $data->nama_jenis_tiket?></td>
                            <?php if ($data->nama_prioritas==''){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }else{?>
                              <td style="text-align: center;"><?php echo $data->nama_prioritas ?></td>
                            <?php } ?>
                            <td><?php echo $data->nama_layanan ?></td>
                            <td><?php echo $data->nama_item_layanan ?></td>
                            <td style="text-align: left;"><?php echo $data->nama_klien ?></td>
                            <td><?php echo $data->nama_admin ?></td>
                            <td><?php echo $data->nama_status ?></td>
                            <td style="text-align: left;"><?php echo $data->keluhan ?></td>
                            <td><?php echo $data->dibuat_oleh ?></td>
                            <td><?php echo $data->diubah_oleh ?></td>

                            <?php if ($data->waktu_penanganan==''){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }elseif($data->waktu_penanganan=='00'){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }else{?>
                              <td style="text-align: center;"><?php echo $data->waktu_penanganan ?> jam</td>
                            <?php } ?>

                            <td style="text-align: center;"><?php echo $data->waktu_selesai ?></td>
                            <td width="13%">
                              <a style="background: white; color: black;" href="<?php echo site_url('list_tiket_closed/detail_tiket/'.encrypt_url($data->id_trans_tiket)) ?>"
                                class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail Tiket</a>
                            </td> 
                        </tr>
                      <!-- Prioritas 2 Yellow -->
                      <?php }elseif($data->nama_prioritas=='Prioritas 2'){?>
                        <tr id="tbl_prio_2">
                            <style type="text/css">
                              #tbl_prio_2 td, th {
                                border: 1px solid #ddd;
                                padding: 8px;
                                background:yellow;
                                color: black;
                              }
                            </style>
                            <td><?php echo $no++ ?></td>
                            <td>
                                <label style="font-style: bold;">
                                    <?php echo $data->no_tiket; ?> 
                                </label>
                            </td>
                            <td style="text-align: left;"><?php echo $data->nama_jenis_tiket?></td>
                            <?php if ($data->nama_prioritas==''){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }else{?>
                              <td style="text-align: center;"><?php echo $data->nama_prioritas ?></td>
                            <?php } ?>
                            <td><?php echo $data->nama_layanan ?></td>
                            <td><?php echo $data->nama_item_layanan ?></td>
                            <td style="text-align: left;"><?php echo $data->nama_klien ?></td>
                            <td><?php echo $data->nama_admin ?></td>
                            <td><?php echo $data->nama_status ?></td>
                            <td style="text-align: left;"><?php echo $data->keluhan ?></td>
                            <td><?php echo $data->dibuat_oleh ?></td>
                            <td><?php echo $data->diubah_oleh ?></td>
                            
                            <?php if ($data->waktu_penanganan==''){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }elseif($data->waktu_penanganan=='00'){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }else{?>
                              <td style="text-align: center;"><?php echo $data->waktu_penanganan ?> jam</td>
                            <?php } ?>

                            <td style="text-align: center;"><?php echo $data->waktu_selesai ?></td>
                            <td width="13%">
                              <a style="background: white; color: black;" href="<?php echo site_url('list_tiket_closed/detail_tiket/'.encrypt_url($data->id_trans_tiket)) ?>"
                                class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail Tiket</a>
                            </td> 
                        </tr>
                      <!-- Di luar dari Prio 1 & Prio 2 -->
                      <?php }else{ ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td>
                                <label style="font-style: bold;">
                                    <?php echo $data->no_tiket; ?> 
                                </label>
                            </td>
                            <td style="text-align: left;"><?php echo $data->nama_jenis_tiket?></td>
                            <?php if ($data->nama_prioritas==''){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }else{?>
                              <td style="text-align: : center;"><?php echo $data->nama_prioritas ?></td>
                            <?php } ?>
                            <td><?php echo $data->nama_layanan ?></td>
                            <td><?php echo $data->nama_item_layanan ?></td>
                            <td style="text-align: left;"><?php echo $data->nama_klien ?></td>
                            <td><?php echo $data->nama_admin ?></td>
                            <td><?php echo $data->nama_status ?></td>
                            <td style="text-align: left;"><?php echo $data->keluhan ?></td>
                            <td><?php echo $data->dibuat_oleh ?></td>
                            <td><?php echo $data->diubah_oleh ?></td>
                           
                            <?php if ($data->waktu_penanganan==''){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }elseif($data->waktu_penanganan=='00'){?>
                              <td style="text-align: center;">Tidak Ada</td>
                            <?php }else{?>
                              <td style="text-align: center;"><?php echo $data->waktu_penanganan ?> jam</td>
                            <?php } ?>

                            <td style="text-align: center;"><?php echo $data->waktu_selesai ?></td>
                            <td width="13%">
                              <a style="background: white; color: black;" href="<?php echo site_url('list_tiket_closed/detail_tiket/'.encrypt_url($data->id_trans_tiket)) ?>"
                                class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail Tiket</a>
                            </td> 
                        </tr>
                      <?php } ?>   
                    <?php } ?>
                  <?php }} ?>
                </tbody>
            </table>
            <tfoot>
              <?php 
                  if(!empty($list_tiket_closed)){
                  }else{
                    echo "<div class='alert alert-danger' role='alert' 
                    style='height:50px;width:auto; padding-bottom: 10px;'>
                    <center>
                    <p style='font-size:16px;'>data yang di cari tidak ada.</p>
                    </center>
                    </div>";
                }?>
            </tfoot>
          </div>
      </div>
  </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url() ?>assets/jquery-freeze-table/dist/js/freeze-table.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/bootstrap-datetimepicker.min.css" type="text/css"media="screen" />
<script type="text/javascript" src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datepicker/js/locales/bootstrap-datetimepicker.id.js') ?>" charset="UTF-8"></script>
<script type="text/javascript">
  $(document).ready(function(){  
    // Freze Table
    $(".freeze-table").freezeTable({
        'columnNum': 3
    });
  });
  $(document).ready(function(){  
    $('.input-tanggal-awal').datetimepicker({
        language:  'id',
        format: 'yyyy-mm-dd',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.input-tanggal-akhir').datetimepicker({
        language:  'id',
        format: 'yyyy-mm-dd',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
  });
  $(document).ready(function(){  
    $("#pilihan").select2({
          placeholder: "-- silahkan pilih --",
          language: {
              noResults: function (params) {
                return "data tidak tersedia.";
              }
          }
      });
  });
</script>

<!-- Sweet Alert Berhasil -->
<?php if ($this->session->flashdata('message')): ?>
    <script src="<?php echo base_url('assets/sweet-alert/sweetalert.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css" type="text/css" />
    <script>
        swal({
            title: "Selesai",
            text: "<?php echo $this->session->flashdata('message'); ?>",
            timer: 2000,
            showConfirmButton: false,
            type: 'success'
        });
    </script>
<?php endif; ?>
<!-- Sweet Alert Berhasil -->

<!-- Sweet Alert Data gagal -->
<?php if ($this->session->flashdata('message_failed')): ?>
    <script src="<?php echo base_url('assets/sweet-alert/sweetalert.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css" type="text/css" />
    <script>
        swal({
            title: "Gagal",
            text: "<?php echo $this->session->flashdata('message_failed'); ?>",
            timer: 2000,
            showConfirmButton: false,
            type: 'error'
        });
    </script>
<?php endif; ?>
<!-- Sweet Alert Data gagal -->