<div class="box box-primary">
<div class="box-header with-border">
    <i class="fa fa-ticket"></i>
    <h3 class="box-title"> Tiket Insiden Open Hari InI</h3>              
</div>

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
<div id="table" class="table-responsive">
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
            <th>Jam Berjalan</th>
          </tr>
      </thead>
      <tbody>
          <!-- Menghitung Waktu Berjalan -->
          <?php 
            function waktu_lalu($timestamp){
                $selisih = time() - strtotime($timestamp) ;
                $detik = $selisih ;
                $menit = round($selisih / 60 );
                $jam = round($selisih / 3600 );
                if ($detik <= 60) {
                    $waktu = $detik.' detik';
                } else if ($menit <= 60) {
                    $waktu = $menit.' menit';
                } else if ($jam <= 24) {
                    $waktu = $jam.' jam';
                }elseif ($jam >= 24) {
                    $waktu = $jam.' jam';
                }else{
                  $waktu ='waktu sudah tak terhitung';
                }
                return $waktu;
            }
          ?>
          <!-- Menghitung Waktu Berjalan -->
          <?php
            if(!empty($cek_tiket_insiden_open)){ 
              $no = 1;
              foreach ($cek_tiket_insiden_open as $data){
              ?>
              <!-- Prioritas 1 Red -->
              <?php if ($data->nama_prioritas=='Prioritas 1'){ ?>
                    <tr id="prio_1">
                      <style type="text/css">
                          #prio_1 td, th {
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
                       
                      <?php if ($data->dibuat_oleh==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->dibuat_oleh ?></td>
                      <?php } ?>

                      <?php if ($data->diubah_oleh==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->diubah_oleh ?></td>
                      <?php } ?>
                     
                      <?php if ($data->waktu_penanganan==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }elseif($data->waktu_penanganan=='00'){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->waktu_penanganan ?> jam</td>
                      <?php } ?>

                      <?php if ($data->tgl_dibuat=='waktu sudah tak terhitung'){?>
                        <td style="text-align: center; background: red;">waktu sudah tak terhitung</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo waktu_lalu($data->tgl_dibuat) ?></td>
                      <?php } ?>
                    </tr>
              <!-- Prioritas 2 Yellow -->
              <?php }elseif($data->nama_prioritas=='Prioritas 2'){?>
                    <tr id="prio_2">
                      <style type="text/css">
                          #prio_2 td, th {
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
                       
                      <?php if ($data->dibuat_oleh==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->dibuat_oleh ?></td>
                      <?php } ?>

                      <?php if ($data->diubah_oleh==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->diubah_oleh ?></td>
                      <?php } ?>
                     
                      <?php if ($data->waktu_penanganan==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }elseif($data->waktu_penanganan=='00'){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->waktu_penanganan ?> jam</td>
                      <?php } ?>

                      <?php if ($data->tgl_dibuat=='waktu sudah tak terhitung'){?>
                        <td style="text-align: center; background: red;">waktu sudah tak terhitung</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo waktu_lalu($data->tgl_dibuat) ?></td>
                      <?php } ?>
                    </tr>

              <!-- Diluar dari Prio 1 & Prio 2 -->
              <?php }else{ ?>
                    <style type="text/css">
                        #no_prio_1_2 td, th {
                          border: 1px solid #ddd;
                          padding: 8px;
                          background:transparent;
                          color: black;
                        }
                    </style>
                    <tr id="no_prio_1_2">
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
                       
                      <?php if ($data->dibuat_oleh==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->dibuat_oleh ?></td>
                      <?php } ?>

                      <?php if ($data->diubah_oleh==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->diubah_oleh ?></td>
                      <?php } ?>
                     
                      <?php if ($data->waktu_penanganan==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }elseif($data->waktu_penanganan=='00'){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{?>
                        <td style="text-align: center;"><?php echo $data->waktu_penanganan ?> jam</td>
                      <?php } ?>

                      <!-- jika Prio & Waktu Penanganan Kosong maka Waktu Berjalan Tidak ada -->
                      <?php if ($data->nama_prioritas==''){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }elseif($data->waktu_penanganan=='00'){?>
                        <td style="text-align: center;">Tidak Ada</td>
                      <?php }else{ ?>
                        <td style="text-align: center;"><?php echo waktu_lalu($data->tgl_dibuat) ?></td>
                      <?php } ?>
                    </tr>
              <?php } ?>

          <?php }} ?>
      </tbody>
  </table>
</div>
</div>
<script type="text/javascript">
$(document).ready( function (){
  $('#mytable').dataTable( {
      "iDisplayLength": 10,
      "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
       "language": {
          "emptyTable":     "Tidak ada data yang tersedia.",
          "info":           "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
          "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 entri.",
          "infoFiltered":   "(filtered from _MAX_ total entries)",
          "infoPostFix":    "",
          "thousands":      ",",
          // "lengthMenu":     "Tampil _MENU_ entri.",
          "lengthMenu":     "",
          "loadingRecords": "Loading...",
          "processing":     "Processing...",
          "search":         "Pencarian:",
          "zeroRecords":    "Data yang di cari tidak ada.",
          "paginate": {
              "first":      "Pertama",
              "last":       "Terakhir",
              "next":       "Berikutnya",
              "previous":   "Sebelumnya"
          },
      }, 
  });
});
</script>