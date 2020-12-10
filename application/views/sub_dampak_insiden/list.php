<div class="content-wrapper">
    <section class="content">
        <div class="box-body">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">List Sub Dampak Insiden</h3>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <?php echo anchor(site_url('sub_dampak_insiden/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Sub Dampak Insiden', 'class="btn btn-danger btn-sm"'); ?>       
                        </div>
                        <br>
                        <!-- Style-->
                        <style type="text/css">
                            #table {
                              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                              border-collapse: collapse;
                              width: 100%;
                              table-layout: fixed;
                              .white-space:nowrap;
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
                            }
                        </style>
                        <!-- Style -->
                        <div id="table" class="table-responsive">
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Jenis Tiket</th>
                                        <th>Dampak</th>
                                        <th>Di Buat</th>
                                        <th>Di Ubah</th>
                                        <th>Di Buat Tanggal</th>
                                        <th>Di Ubah Tanggal</th>
                                        <th width="200px">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Sweet Alert -->
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

<script src="<?php echo base_url()?>assets/sweet-alert/sweetalert.js"></script>
<script>
$(function(){ TablesDatatables.init(); });
function validate(a)
{
    var id= a.value;
    swal({
            title: "Are you sure?",
            text: "You want to delete this Menu Item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            closeOnConfirm: false }, function()
        {
            swal("Deleted!", "Menu Item has been Deleted.", "success");
            $(location).attr('href','<?php echo base_url()?>admin/del_admin_menu/'+id);
        }
    );
}
 </script>
<!-- Sweet Alert -->
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
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

    var t = $("#mytable").dataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        responsive: true,
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
        "language": {
            "emptyTable":     "Tidak ada data yang tersedia.",
            "info":           "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
            "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 entri.",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Tampil _MENU_ entri.",
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
        processing: true,
        serverSide: true,
        ajax: {"url": "sub_dampak_insiden/json", "type": "POST"},
        columns: [
            {
                "data": "id_sub_dampak_insiden",
                "orderable": false
            },
                {"data": "nama_jenis_tiket"},
                {"data": "nama_dampak"},
                {"data": "dibuat_oleh"},
                {"data": "diubah_oleh"},
                {"data": "tgl_terakhir_dibuat"},
                {"data": "tgl_terakhir_diubah"},
            {
                "data" : "action",
                "orderable": false,
                "className" : "text-center"
            }
        ],
        order: [[5, 'desc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
});
</script>