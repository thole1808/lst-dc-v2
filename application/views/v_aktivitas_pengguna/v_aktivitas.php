<!-- List Aktivitas User -->
    <div class="box box-primary">
    <div class="box-header with-border">
        <i class="fa fa-history"></i>
        <h3 class="box-title">Aktivitas Pengguna</h3>              
    </div>
    <!-- Style-->
    <style type="text/css">
        #tabel {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          /*width: 100%;*/
          table-layout: fixed;
        }

        #tabel td, #tabel th {
          border: 1px solid #ddd;
          padding: 8px;
          text-align: center;
        }

        #tabel tr:nth-child(even){background-color: #f2f2f2;}

        #tabel tr:hover {background-color: #ddd;}

        #tabel th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: center;
          background-color:#4682B4;
          color: white;
        }

    </style>
    <!-- Style -->
    
    <div class="box-body">
    <div style="padding-bottom: 10px;">
    <!-- Panel Body Tabel -->
    <div id="tabel" class="table-responsive">
        <table id="aktivitas" class="table table-bordered table-striped" width="100%" height="100%">
             <thead>
                <tr>    
                    <th width="5px">No.</th>
                    <th width="150px">Waktu</th>
                    <th width="200px">Pengguna</th>
                    <th width="150px">Riwayat</th>
                    <th width="150px">Alamat IP</th>
                    <th width="150px">Informasi Browser</th>
                    <!-- <th width="150px">Akses</th> -->
                </tr>
            </thead>
            <!-- <tbody id="show_data"> -->
                <!--  <?php
                    if( ! empty($hasil_log)){
                        $no = 1;
                        foreach($hasil_log as $data){
                            echo "<td>".$no."</td>";
                            echo "<td>".$data->log_time."</td>";
                            echo "<td>"."<span align='left'>"."<i class='fa fa-user'> ".$data->log_user."</span>"."</i>"."</td>";
                            echo "<td>".$data->log_desc."</td>"; 
                            echo "<td>".$data->ip_address."</td>"; 
                            echo "<td>".$data->info_browser."</td>";      
                            echo "</tr>";
                            $no++;
                        }
                    }
                    ?> -->
            <!-- </tbody> -->
        </table>
    </div>
    </div>
    </div>
    </div>
    <!-- List Aktivitas User -->

<script type="text/javascript">
  $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#aktivitas").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },

            "iDisplayLength": 10,
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "deferRender": true,

            "language": {
                "emptyTable":     "Tidak ada data yang tersedia.",
                "info":           "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 entri.",
                "infoFiltered":   "(filtered from _MAX_ total entries)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Tampil _MENU_ entri.",
                "loadingRecords": "Mohon Tunggu...",
                "processing":     "Proses...",
                "search":         "Pencarian:",
                "zeroRecords":    "Data yang di cari tidak ada.",
                "paginate": {
                    "first":      "Pertama",
                    "last":       "Terakhir",
                    "next":       "Berikutnya",
                    "previous":   "Sebelumnya"
                },
            },
            ajax: {"url": "beranda/json", "type": "POST"},
            columns: [
                {
                    "data": "log_id",
                    "orderable": false
                },
                {"data": "log_time"},
                {
                    "data": "log_user",
                    "render":function(data,type,row,full,meta) {

                    if (data == '') {
                        return '<label class="label label-info">User Kosong</label>';
                        }else {
                            return '<span align="left"><i class="fa fa-user">    '+data+'</span></i>';
                        }
                    }
                },
                {"data": "log_desc"},
                {"data": "ip_address"},
                {"data": "info_browser"},
                // {"data": "aksi"},

                // {
                //     "data": "aksi",
                //     "render":function(data,type,row,full,meta) {
                       
                //     if (data == '') {
                //         return '<center><label class="label label-primary">Data Kosong</label></center>';
                //         }
                //       else {
                //         return '<label><center><a target="_blank" href="<?php echo base_url();?>'+data+'">' + data + '</a></center></label>';
                //         }
                //     }
                // },
                // {
                //     "data" : "action",
                //     "orderable": false,
                //     "className" : "text-center"
                // }
            ],
            order: [[0, 'desc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });


  // JANGAN DI HAPUS BOSKU
  // $(document).ready(function() {
  //     table = $('#aktivitas').DataTable({ 
  //           "iDisplayLength": 10,
  //           "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
  //           "deferRender": true,

  //          "language": {
  //           "emptyTable":     "Tidak ada data yang tersedia.",
  //           "info":           "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
  //           "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 entri.",
  //           "infoFiltered":   "(filtered from _MAX_ total entries)",
  //           "infoPostFix":    "",
  //           "thousands":      ",",
  //           "lengthMenu":     "Tampil _MENU_ entri.",
  //           "loadingRecords": "Loading...",
  //           "processing":     "Processing...",
  //           "search":         "Pencarian:",
  //           "zeroRecords":    "Data yang di cari tidak ada.",
  //           "paginate": {
  //               "first":      "Pertama",
  //               "last":       "Terakhir",
  //               "next":       "Berikutnya",
  //               "previous":   "Sebelumnya"
  //           },
  //         },
  //         "order": [], 
  //         "ajax": {
  //             "url": '<?php echo site_url('welcome/json'); ?>',
  //             "type": "POST"
  //         },

  //         "columns": [
  //             {"data": "log_id",width:50},
  //             {"data": "log_time",width:170},
  //             {"data": "log_user",width:170},
  //             {"data": "log_desc",width:170},
  //             {"data": "ip_address",width:170},
  //             {"data": "info_browser",width:170}
  //         ],

  //     });

  // });


  // YANG LAMA 
  // $(document).ready( function(){
  //   $('#aktivitas').dataTable( {
  //       "iDisplayLength": 10,
  //       "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
  //       "deferRender": true,


  //        "language": {
  //           "emptyTable":     "Tidak ada data yang tersedia.",
  //           "info":           "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
  //           "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 entri.",
  //           "infoFiltered":   "(filtered from _MAX_ total entries)",
  //           "infoPostFix":    "",
  //           "thousands":      ",",
  //           "lengthMenu":     "Tampil _MENU_ entri.",
  //           "loadingRecords": "Loading...",
  //           "processing":     "Processing...",
  //           "search":         "Pencarian:",
  //           "zeroRecords":    "Data yang di cari tidak ada.",
  //           "paginate": {
  //               "first":      "Pertama",
  //               "last":       "Terakhir",
  //               "next":       "Berikutnya",
  //               "previous":   "Sebelumnya"
  //           },
  //       },
        
  //   });
  // });
</script>