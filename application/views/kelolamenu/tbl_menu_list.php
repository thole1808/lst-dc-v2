<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">SETTING TAMPILAN MENU</h3>
                    </div>

                    <div class="box-body">
                        <?php echo form_open('kelolamenu/simpan_setting') ?>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td width="300">Tampilkan Menu Berdasarkan Level User</td>
                                <td>
                                    <?php
                                    echo form_dropdown('tampil_menu', array('ya' => 'YA', 'tidak' => 'TIDAK'), $setting['value'], array('class' => 'form-control'));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-danger btn-sm">Simpan Perubahan</button>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">

                    <div class="box-header">
                        <h3 class="box-title">LIST DATA MENU</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <?php echo anchor(site_url('kelolamenu/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Menu', 'class="btn btn-danger btn-sm"'); ?>
                            <br>
                            <br>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Main Menu</th>
                                    <th>Status</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
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
            initComplete: function () {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function (e) {
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
            ajax: {"url": "kelolamenu/json", "type": "POST"},
            columns: [
                {
                    "data": "id_menu",
                    "orderable": false
                }, 

                    {"data": "title"}, 
                    {"data": "url"}, 
                    {"data": "icon"}, 
                    {"data": "is_main_menu"}, 

                    {
                        "data": "is_aktif",
                        "render":function(data,type,row,full,meta){
                            if (data == 'Aktif') {
                                return '<label class="label label-success">Aktif</label>';   
                            }else if (data == 'Tidak Aktif') {
                                return '<label class="label label-danger">Tidak Aktif</label>';
                           
                            }else {
                                return '<label class="label label-info">Kosong</label>';
                            }
                        }
                    },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [[0, 'desc']],
            rowCallback: function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>