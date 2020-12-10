<div class="content-wrapper">
<section class="content"> 

<div class="row">
<!-- Jumlah Tiket Insiden Harini Ini Status Open & Closed -->
<div class="col-md-4">
  <div class="box box-info">
    <div class="box-header with-border">
        <i class="fa fa-ticket"></i>
        <h3 class="box-title"><small style="font-size: 14px;">Tiket Insiden Hari InI</small></h3>              
    </div>
    <div class="panel-body">
      <!-- Open -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <?php 
          $jumlah = $this->db->query("
            SELECT 
              COUNT(id_jenis_tiket) AS jumlah_insiden_open_hari_ini
            FROM tbl_tiket
            WHERE id_jenis_tiket ='JTK-011020-0001' AND 
            id_status_tiket='STK-091020-0001' AND
            DATE(tgl_dibuat) = CURDATE();
          "); $fetch = $jumlah->result_array();
          $total=0;
          foreach ($fetch as $data) {
            $total += $data['jumlah_insiden_open_hari_ini'];
          ?>
          <?php }?>
          <h3><?php echo $data['jumlah_insiden_open_hari_ini']; ?></h3>
          <p><small>Open</small></p>
        </div>
        <div class="icon">
          <i class="fa fa-ticket"></i>
        </div>
        <a href="#" data-id="<?php echo $data['jumlah_insiden_open_hari_ini']; ?>" class="small-box-footer tampil_detail_insiden_open_hari_ini" data-toggle="modal" data-target="#modal-view">Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <!-- Open -->

      <!-- Closed-->
      <div class="small-box bg-yellow">
        <div class="inner">
          <?php 
          $jumlah = $this->db->query("
            SELECT 
              COUNT(id_jenis_tiket) AS jumlah_insiden_closed_hari_ini
            FROM tbl_tiket
            WHERE id_jenis_tiket ='JTK-011020-0001' AND DATE(tgl_diubah) = CURDATE()
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')
          "); $fetch = $jumlah->result_array();
          $total=0;
          foreach ($fetch as $data) {
            $total += $data['jumlah_insiden_closed_hari_ini'];
          ?>
          <?php }?>
          <h3><?php echo $data['jumlah_insiden_closed_hari_ini']; ?></h3>
          <p><small>Closed</small></p>
        </div>
        <div class="icon">
          <i class="fa fa-ticket"></i>
        </div>
        <a href="#" data-id="<?php echo $data['jumlah_insiden_closed_hari_ini']; ?>" class="small-box-footer tampil_detail_insiden_closed_hari_ini" data-toggle="modal" data-target="#modal-view">Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <!-- CLosed -->

    </div>
  </div>
</div>
<!-- Jumlah Tiket Insiden Harini Ini Status Open & Closed -->

<!-- Jumlah Tiket Insiden Keamanan Informasi Harini Ini Status Open & Closed -->
<div class="col-md-4">
  <div class="box box-info">
    <div class="box-header with-border">
        <i class="fa fa-ticket"></i>
        <h3 class="box-title"><small style="font-size: 14px;">Tiket Insiden Keamanan Informasi Hari InI</small></h3>              
    </div>
    <div class="panel-body">
      <!-- Open -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <?php 
          $jumlah = $this->db->query("
            SELECT 
              COUNT(id_jenis_tiket) AS jumlah_insiden_keamanan_open_hari_ini
            FROM tbl_tiket
            WHERE id_jenis_tiket ='JTK-041020-0001' AND 
            id_status_tiket='STK-091020-0001' AND
            DATE(tgl_dibuat) = CURDATE();
          "); $fetch = $jumlah->result_array();
          $total=0;
          foreach ($fetch as $data) {
            $total += $data['jumlah_insiden_keamanan_open_hari_ini'];
          ?>
          <?php }?>
          <h3><?php echo $data['jumlah_insiden_keamanan_open_hari_ini']; ?></h3>
          <p><small>Open</small></p>
        </div>
        <div class="icon">
          <i class="fa fa-ticket"></i>
        </div>
        <a href="#" data-id="<?php echo $data['jumlah_insiden_keamanan_open_hari_ini']; ?>" class="small-box-footer tampil_detail_insiden_keamanan_open_hari_ini" data-toggle="modal" data-target="#modal-view">Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <!-- Open -->

      <!-- Closed-->
      <div class="small-box bg-yellow">
        <div class="inner">
          <?php 
          $jumlah = $this->db->query("
            SELECT 
              COUNT(id_jenis_tiket) AS jumlah_insiden_keamanan_closed_hari_ini
            FROM tbl_tiket
            WHERE id_jenis_tiket ='JTK-041020-0001' AND DATE(tgl_diubah) = CURDATE()
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')
          "); $fetch = $jumlah->result_array();
          $total=0;
          foreach ($fetch as $data) {
            $total += $data['jumlah_insiden_keamanan_closed_hari_ini'];
          ?>
          <?php }?>
          <h3><?php echo $data['jumlah_insiden_keamanan_closed_hari_ini']; ?></h3>
          <p><small>Closed</small></p>
        </div>
        <div class="icon">
          <i class="fa fa-ticket"></i>
        </div>
        <a href="#" data-id="<?php echo $data['jumlah_insiden_keamanan_closed_hari_ini']; ?>" class="small-box-footer tampil_detail_insiden_keamanan_closed_hari_ini" data-toggle="modal" data-target="#modal-view">Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <!-- CLosed -->

    </div>
  </div>
</div>
<!-- Jumlah Tiket Insiden Keamanan Informasi Harini Ini Status Open & Closed -->

<!-- Jumlah Tiket Service Request Ini Status Open & Closed -->
<div class="col-md-4">
  <div class="box box-info">
    <div class="box-header with-border">
        <i class="fa fa-ticket"></i>
        <h3 class="box-title"><small style="font-size: 14px;">Tiket Service Request Hari InI</small></h3>              
    </div>
    <div class="panel-body">
      <!-- Open -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <?php 
          $jumlah = $this->db->query("
            SELECT 
              COUNT(id_jenis_tiket) AS jumlah_service_request_open_hari_ini
            FROM tbl_tiket
            WHERE id_jenis_tiket ='JTK-041020-0002' AND 
            id_status_tiket='STK-091020-0001' AND
            DATE(tgl_dibuat) = CURDATE();
          "); $fetch = $jumlah->result_array();
          $total=0;
          foreach ($fetch as $data) {
            $total += $data['jumlah_service_request_open_hari_ini'];
          ?>
          <?php }?>
          <h3><?php echo $data['jumlah_service_request_open_hari_ini']; ?></h3>
          <p><small>Open</small></p>
        </div>
        <div class="icon">
          <i class="fa fa-ticket"></i>
        </div>
        <a href="#" data-id="<?php echo $data['jumlah_service_request_open_hari_ini']; ?>" class="small-box-footer tampil_detail_service_request_open_hari_ini" data-toggle="modal" data-target="#modal-view">Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <!-- Open -->

      <!-- Closed-->
      <div class="small-box bg-yellow">
        <div class="inner">
          <?php 
          $jumlah = $this->db->query("
            SELECT 
              COUNT(id_jenis_tiket) AS jumlah_service_request_closed_hari_ini
            FROM tbl_tiket
            WHERE id_jenis_tiket ='JTK-041020-0002' AND DATE(tgl_diubah) = CURDATE()
            AND 
            (id_status_tiket NOT LIKE 'STK-091020-0001' AND id_status_tiket NOT LIKE  'STK-091020-0009' 
            AND id_status_tiket NOT LIKE 'STK-091020-0006' AND id_status_tiket NOT LIKE 'STK-091020-0008')
          "); $fetch = $jumlah->result_array();
          $total=0;
          foreach ($fetch as $data) {
            $total += $data['jumlah_service_request_closed_hari_ini'];
          ?>
          <?php }?>
          <h3><?php echo $data['jumlah_service_request_closed_hari_ini']; ?></h3>
          <p><small>Closed</small></p>
        </div>
        <div class="icon">
          <i class="fa fa-ticket"></i>
        </div>
        <a href="#" data-id="<?php echo $data['jumlah_service_request_closed_hari_ini']; ?>" class="small-box-footer tampil_detail_service_request_closed_hari_ini" data-toggle="modal" data-target="#modal-view">Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <!-- CLosed -->

    </div>
  </div>
</div>
<!-- Jumlah Tiket Service Request Harini Ini Status Open & Closed -->

<!-- Riwayat Aktivitas Pengguna-->
<!-- <div class="row"> -->
 <!--  <div class="col-md-3">
    <div class="box box-info">
      <div class="box-header with-border">
          <i class="fa fa-history"></i>
          <h3 class="box-title"><small>Aktivitas Pengguna</small></h3>              
      </div>
      <div class="panel-body"> -->
        <!-- Open -->
        <!-- <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $jumlah = $this->db->query("
              SELECT 
               COUNT(*) AS total_aktivitas
              FROM tbl_log
            "); $fetch = $jumlah->result_array();
            $total=0;
            foreach ($fetch as $data) {
              $total += $data['total_aktivitas'];
            ?>
            <?php }?>
            <h3><?php echo $data['total_aktivitas']; ?></h3>
            <p><small>Total Aktivitas Pengguna</small></p>
          </div>
          <div class="icon">
            <i class="fa fa-history"></i>
          </div>
          <a href="#" data-id="<?php echo $data['total_aktivitas']; ?>" 
            class="small-box-footer tampil_detail_aktivitas_pengguna" data-toggle="modal" data-target="#modal-view">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div> -->
        <!-- Open -->
      <!-- </div>
    </div>
  </div> -->
<!-- </div> -->
<!-- Riwayat Aktivitas Pengguna -->

<!-- Style Modal -->
<style type="text/css">
.modal-header {
  background-color: #337AB7;
  color:#FFF;
  border-bottom:2px dashed #337AB7;
}
</style>
<!-- Style Modal -->

<!--modal -->
<div class="modal fade" id="modal-view" 
role="dialog" aria-labelledby="" aria-hidden="true"  tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="">Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="la la-remove"></span>
              </button>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right">
              <div class="modal-body">
                <label>Data Tidak Ada</label>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-brand m-btn" data-dismiss="modal">Tutup</button>
              </div>
          </form>
      </div>
  </div>
</div>
<!--modal -->

<!-- JavaScripts -->
<script>
 $(document).ready(function(){
    $('body').on("click", ".tampil_detail_insiden_open_hari_ini",function (e){
      var myId = $(this).attr('data-id');
      $.ajax({
          type: 'GET',
          url: '<?php echo site_url('beranda/detail_insiden_open_hari_ini') ?>',
          data: {id : myId},
          dataType: 'html',
          success: function (response) {
              $('.modal-body').html(response);
              // alert(response);
          }
      });
    });
    $('body').on("click", ".tampil_detail_insiden_closed_hari_ini",function (e){
      var myId = $(this).attr('data-id');
      $.ajax({
          type: 'GET',
          url: '<?php echo site_url('beranda/detail_insiden_closed_hari_ini') ?>',
          data: {id : myId},
          dataType: 'html',
          success: function (response) {
              $('.modal-body').html(response);
              // alert(response);
          }
      });
    });

    $('body').on("click", ".tampil_detail_insiden_keamanan_open_hari_ini",function (e){
      var myId = $(this).attr('data-id');
      $.ajax({
          type: 'GET',
          url: '<?php echo site_url('beranda/detail_insiden_keamanan_open_hari_ini') ?>',
          data: {id : myId},
          dataType: 'html',
          success: function (response) {
              $('.modal-body').html(response);
              // alert(response);
          }
      });
    });
    $('body').on("click", ".tampil_detail_insiden_keamanan_closed_hari_ini",function (e){
      var myId = $(this).attr('data-id');
      $.ajax({
          type: 'GET',
          url: '<?php echo site_url('beranda/detail_insiden_keamanan_closed_hari_ini') ?>',
          data: {id : myId},
          dataType: 'html',
          success: function (response) {
              $('.modal-body').html(response);
              // alert(response);
          }
      });
    });

    $('body').on("click", ".tampil_detail_service_request_open_hari_ini",function (e){
      var myId = $(this).attr('data-id');
      $.ajax({
          type: 'GET',
          url: '<?php echo site_url('beranda/detail_service_request_open_hari_ini') ?>',
          data: {id : myId},
          dataType: 'html',
          success: function (response) {
              $('.modal-body').html(response);
              // alert(response);
          }
      });
    });
    $('body').on("click", ".tampil_detail_service_request_closed_hari_ini",function (e){
      var myId = $(this).attr('data-id');
      $.ajax({
          type: 'GET',
          url: '<?php echo site_url('beranda/detail_service_request_closed_hari_ini') ?>',
          data: {id : myId},
          dataType: 'html',
          success: function (response) {
              $('.modal-body').html(response);
              // alert(response);
          }
      });
    });

    $('body').on("click", ".tampil_detail_aktivitas_pengguna",function (e){
      var myId = $(this).attr('data-id');
      $.ajax({
          type: 'GET',
          url: '<?php echo site_url('beranda/aktivitas_pengguna') ?>',
          data: {id : myId},
          dataType: 'html',
          success: function (response) {
              $('.modal-body').html(response);
              // alert('testert');
          }
      });
    });

  });
</script>
<!-- JavaScripts -->

<!-- Insdiden -->
<div class="col-md-6">
    <!--Insiden  -->
    <?php 
         $jumlah = $this->db->query("
          SELECT 
            nama_jenis_tiket,
            nama_item_layanan,
            MAX(jumlah) AS tertinggi
          FROM
          (
            SELECT 
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                COUNT(id_jenis_tiket) AS jumlah
            FROM tbl_tiket
            WHERE id_jenis_tiket = 'JTK-011020-0001' 
            AND
            ( DATE(tgl_dibuat) = CURDATE() OR DATE(tgl_diubah) = CURDATE() ) 
            GROUP BY nama_item_layanan
          ) AS counts
          GROUP BY nama_item_layanan
          ORDER BY tertinggi DESC
          LIMIT 5
      "); 
      $fetch = $jumlah->result_array();  
      foreach ($fetch as $data){
        $sub_layanan_insiden[] = $data['nama_item_layanan']; // item layanan
        $total1[] = (float) $data['tertinggi']; // total tertinggi
      ?>
    <?php } ?>
    <!--Insiden  -->
      <div class="box box-info">
        <div class="box-header with-border">
            <i class="fa fa-bar-chart"></i>
            <h3 class="box-title"><small style="font-size: 14px;">Top 5 <b>Insiden</b> Berdasarkan Sub Layanan Hari InI</small></h3>              
        </div>
         <div id="top_5_insiden"></div>
      </div>
      <script src="<?php echo base_url();?>assets/highcharts/highcharts-3d.js"></script>
      <script type="text/javascript">
      $(function () {
        $('#top_5_insiden').highcharts({
            chart: {
              type: 'column',
              margin: [100,100,100,100],
              options3d: {
                 enabled: true,
                 alpha:0,
                 beta: 10,
                 depth: 50,
                 viewDistance: 25
              }
            },
            tooltip: {
                backgroundColor: '#FCFFC5',
                shadow: true,
            },
            title: {
              text: '',
              style: {
                fontSize: '18px',
                fontFamily: 'Verdana, sans-serif'
              }
            },
            subtitle: {
             text: '',
             style: {
                fontSize: '15px',
                fontFamily: 'Verdana, sans-serif'
              }
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 0
              }
            },
            credits: {
                enabled: false
            },
            xAxis: {
              categories:<?php echo json_encode($sub_layanan_insiden) ?>,
            },
            exporting: { 
              enabled: false
            },
            yAxis: {
              allowDecimals: false,
              min:0,
              title: {
                text: ''
              },
              labels: {
               format: '{value}',
               style: {
                  color: '#0a0a0a',
               }
              },
            },
            tooltip: {
               formatter: function() {
                  return 'Total <b>' + this.x +'<b> Hari InI';
               }
            },
            series: 
              [
                {
                  showInLegend: true,
                  name: 'Insiden',
                  data: <?php echo json_encode($total1);?>,
                  color : '#FFD700',
                  pointPadding: 0.0,
                  tooltip: {
                    valueSuffix: 'Megabyte'
                  },
                  shadow : true,
                  dataLabels: {
                      enabled: true,
                      color: '#FFD700',
                      align: 'center',
                      formatter: function() {
                        return Highcharts.numberFormat(this.y, 0);
                      }, 
                      y: 0,
                      style: {
                          fontSize: '20px',
                          fontFamily: 'Verdana, sans-serif'
                      }
                  },     
                }
              ]
          });
      });
      </script>
      <!-- Isi Chart Insiden -->
</div>
<!-- Insdiden -->

<!-- Insdiden Keamanan Informasi -->
<div class="col-md-6">
    <!-- Insdiden Keamanan Informasi -->
    <?php 
         $jumlah2 = $this->db->query("
          SELECT 
            nama_jenis_tiket,
            nama_item_layanan,
            MAX(jumlah) AS tertinggi
          FROM
          (
            SELECT 
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                COUNT(id_jenis_tiket) AS jumlah
            FROM tbl_tiket
            WHERE id_jenis_tiket = 'JTK-041020-0001' 
            AND 
            ( DATE(tgl_dibuat) = CURDATE() OR DATE(tgl_diubah) = CURDATE() )
            GROUP BY nama_item_layanan
          ) AS counts
          GROUP BY nama_item_layanan
          ORDER BY tertinggi DESC
          LIMIT 5
      "); 
      $fetch = $jumlah2->result_array();  
      foreach ($fetch as $data){
        $sub_layanan_insiden_keamanan[] = $data['nama_item_layanan']; // item layanan
        $total2[] = (float) $data['tertinggi']; // total tertinggi
      ?>
    <?php } ?>
    <!-- Insdiden Keamanan Informasi -->
      <div class="box box-info">
        <div class="box-header with-border">
            <i class="fa fa-bar-chart"></i>
            <h3 class="box-title"><small style="font-size: 14px;">Top 5 <b>Insiden Keamanan Informasi</b> Berdasarkan Sub Layanan Hari InI</small></h3>              
        </div>
         <div id="top_5_insiden_keamanan"></div>
      </div>
      <script src="<?php echo base_url();?>assets/highcharts/highcharts-3d.js"></script>
      <script type="text/javascript">
      $(function () {
        $('#top_5_insiden_keamanan').highcharts({
            chart: {
              type: 'column',
              margin: [100,100,100,100],
              options3d: {
                 enabled: true,
                 alpha:0,
                 beta: 10,
                 depth: 50,
                 viewDistance: 25
              }
            },
            tooltip: {
                backgroundColor: '#FCFFC5',
                shadow: true,
            },
            title: {
              text: '',
              style: {
                fontSize: '18px',
                fontFamily: 'Verdana, sans-serif'
              }
            },
            subtitle: {
             text: '',
             style: {
                fontSize: '15px',
                fontFamily: 'Verdana, sans-serif'
              }
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 0
              }
            },
            credits: {
                enabled: false
            },
            xAxis: {
              categories:<?php echo json_encode($sub_layanan_insiden_keamanan) ?>,
            },
            exporting: { 
              enabled: false
            },
            yAxis: {
              allowDecimals: false,
              min:0,
              title: {
                text: ''
              },
              labels: {
               format: '{value}',
               style: {
                  color: '#0a0a0a',
               }
              },
            },
            tooltip: {
               formatter: function() {
                  return 'Total <b>' + this.x +'<b> Hari InI';
               }
            },
            series: 
              [
                {
                  showInLegend: true,
                  name: 'Insiden Keamanan Informasi',
                  data: <?php echo json_encode($total2);?>,
                  color : '#1E90FF',
                  pointPadding: 0.0,
                  tooltip: {
                    valueSuffix: 'Megabyte'
                  },
                  shadow : true,
                  dataLabels: {
                      enabled: true,
                      color: '#1E90FF',
                      align: 'center',
                      formatter: function() {
                        return Highcharts.numberFormat(this.y, 0);
                      }, 
                      y: 0,
                      style: {
                          fontSize: '20px',
                          fontFamily: 'Verdana, sans-serif'
                      }
                  },     
                }
              ]
          });
      });
      </script>
      <!-- Insdiden Keamanan Informasi -->
</div>
<!-- Insdiden Keamanan Informasi -->


<!-- Service Request -->
<div class="col-md-6">
    <!-- Service Request -->
    <?php 
         $jumlah2 = $this->db->query("
          SELECT 
            nama_jenis_tiket,
            nama_item_layanan,
            MAX(jumlah) AS tertinggi
          FROM
          (
            SELECT 
                (select nama_jenis_tiket FROM master_jenis_tiket WHERE id_jenis_tiket = tbl_tiket.id_jenis_tiket)
                AS nama_jenis_tiket,
                (select nama_layanan FROM master_layanan WHERE id_layanan = tbl_tiket.id_layanan)
                AS nama_layanan,
                (select nama_item_layanan FROM master_item_layanan WHERE id_item_layanan = tbl_tiket.id_item_layanan)
                AS nama_item_layanan,
                COUNT(id_jenis_tiket) AS jumlah
            FROM tbl_tiket
            WHERE id_jenis_tiket = 'JTK-041020-0002' 
            AND 
            (DATE(tgl_dibuat) = CURDATE() OR DATE(tgl_diubah) = CURDATE() )
            GROUP BY nama_item_layanan
          ) AS counts
          GROUP BY nama_item_layanan
          ORDER BY tertinggi DESC
          LIMIT 5
      "); 
      $fetch = $jumlah2->result_array();  
      foreach ($fetch as $data){
        $sub_layanan_service_request[] = $data['nama_item_layanan']; // item layanan
        $total3[] = (float) $data['tertinggi']; // total tertinggi
      ?>
    <?php } ?>
    <!-- Service Request -->
    <div class="box box-info">
        <div class="box-header with-border">
            <i class="fa fa-bar-chart"></i>
            <h3 class="box-title"><small style="font-size: 14px;">Top 5 <b>Insiden Service Request</b> Berdasarkan Sub Layanan Hari InI</small></h3>              
        </div>
        <div id="top_5_service_request"></div>
      </div>
      <script src="<?php echo base_url();?>assets/highcharts/highcharts-3d.js"></script>
      <script type="text/javascript">
      $(function () {
        $('#top_5_service_request').highcharts({
            chart: {
              type: 'column',
              margin: [100,100,100,100],
              options3d: {
                 enabled: true,
                 alpha:0,
                 beta: 10,
                 depth: 50,
                 viewDistance: 25
              }
            },
            tooltip: {
                backgroundColor: '#FCFFC5',
                shadow: true,
            },
            title: {
              text: '',
              style: {
                fontSize: '18px',
                fontFamily: 'Verdana, sans-serif'
              }
            },
            subtitle: {
             text: '',
             style: {
                fontSize: '15px',
                fontFamily: 'Verdana, sans-serif'
              }
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 0
              }
            },
            credits: {
                enabled: false
            },
            xAxis: {
              categories:<?php echo json_encode($sub_layanan_service_request) ?>,
            },
            exporting: { 
              enabled: false
            },
            yAxis: {
              allowDecimals: false,
              min:0,
              title: {
                text: ''
              },
              labels: {
               format: '{value}',
               style: {
                  color: '#0a0a0a',
               }
              },
            },
            tooltip: {
               formatter: function() {
                  return 'Total <b>' + this.x +'<b> Hari InI';
               }
            },
            series: 
              [
                {
                  showInLegend: true,
                  name: 'Permintaan Layanan / Service Request',
                  data: <?php echo json_encode($total3);?>,
                  color : '#0ead19',
                  pointPadding: 0.0,
                  tooltip: {
                    valueSuffix: 'Megabyte'
                  },
                  shadow : true,
                  dataLabels: {
                      enabled: true,
                      color: '#0ead19',
                      align: 'center',
                      formatter: function() {
                        return Highcharts.numberFormat(this.y, 0);
                      }, 
                      y: 0,
                      style: {
                          fontSize: '20px',
                          fontFamily: 'Verdana, sans-serif'
                      }
                  },     
                }
              ]
          });
      });
      </script>
      <!-- Service Request -->
</div>
<!-- Service Request -->

</div>
</section>
</div>