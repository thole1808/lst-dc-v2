<div class="content-wrapper">
<section class="content">
<div class="row">
<div class="col-xs-12">
    <div class="box box-primary box-solid">
        <div class="box-header">
            <h3 class="box-title">List Sub Admin Klien</h3>
        </div>
        <div class="box-body">
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('sub_admin_klien/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Sub Admin Klien', 'class="btn btn-danger btn-sm"'); ?>       
            </div>
            
            <br>
            <!-- Style-->
            <style type="text/css">
                #table-insiden {
                  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                  table-layout: fixed;
                  .white-space:nowrap;
                }
                #table-insiden td, #table-insiden th {
                  border: 1px solid #ddd;
                  padding: 8px;
                }
                #table-insiden tr:nth-child(even){background-color: #f2f2f2;}
                #table-insiden tr:hover {background-color: #ddd;}
                #table-insiden th {
                  background-color:#4682B4;
                  color: white;
                }
            </style>
            <!-- Style -->
            <div id="table-insiden" class="table-responsive freeze-table">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th rowspan="2" style="width: 1%; text-align: center;">No.</th>
                            <th colspan="5" style="font-size: 14px;text-align: center;">Klien</th>
                            <th rowspan="2" style="width: 5%;font-size: 12px;text-align: center;">Aksi</th>
                        </tr>
                        <tr>
                            <th style="font-size: 12px;">Admin Klien</th>
                            <th style="font-size: 12px;">Di Buat Oleh</th>
                            <th style="font-size: 12px;">Di Ubah Oleh</th>
                            <th style="font-size: 12px;">Di Buat Tanggal</th>
                            <th style="font-size: 12px;">Di Ubah Tanggal</th>
                        </tr>
                    </thead>
                <tbody>
                <?php
                  if(!empty($tampilkan)){ 
                    $no = 1;
                    foreach ($tampilkan as $data){
                    ?>
                    <tr>
                        <tr>
                            <td style="text-align:center; width:0%;font-size: 16px;background-color: white;">
                              <?php echo $no++; ?>   
                            </td>
                            <td  style="font-size:16px; text-align: left; background-color: green; color: white;">
                              <?php echo $data->nama_klien; ?>
                            </td>
                            <td style="background-color: white; border: none;">
                                <?php 
                                   $jumlah = $this->db->query("
                                    SELECT
                                        id_klien,
                                        id_sub_admin_klien,
                                        (SELECT nama_klien FROM master_klien WHERE id_klien = tbl_sub_admin_klien.id_klien) 
                                        AS nama_klien,
                                        (SELECT nama_admin FROM master_admin_klien WHERE id_admin = tbl_sub_admin_klien.id_admin) 
                                        AS nama_admin,
                                        dibuat_oleh,
                                        diubah_oleh,
                                        tgl_terakhir_dibuat,
                                        tgl_terakhir_diubah
                                    FROM tbl_sub_admin_klien
                                    WHERE id_klien ='".$data->id_klien."'
                                    ORDER BY nama_klien ASC
                                "); 

                                $fetch = $jumlah->result_array();    
                                foreach ($fetch as $data) {
                                ?>
                                <tr style="background-color: white;">
                                    <td style="border: none;"></td>
                                    <td style=" font-style:italic; text-align:center; font-weight: bold; width:7%;">
                                    <u><?php echo $data['nama_admin']; ?></u>
                                    </td>
                                    <td style="width:5%;">
                                    <?php echo $data['dibuat_oleh']; ?>
                                    </td>
                                    <td style="width:5%;">
                                    <?php echo $data['diubah_oleh']; ?>
                                    </td>
                                    <td style="width:5%;">
                                    <?php echo $data['tgl_terakhir_dibuat']; ?>
                                    </td>
                                    <td style="width:5%;">
                                    <?php echo $data['tgl_terakhir_diubah']; ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="<?php echo site_url('sub_admin_klien/update/'.$data['id_sub_admin_klien']) ?>"
                                         class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                        <a href="<?php echo site_url('sub_admin_klien/delete/'.$data['id_sub_admin_klien']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                              <?php }?>   
                            </td>
                        </tr>
                    </tr>
                <?php }} ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</section>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url() ?>assets/jquery-freeze-table/dist/js/freeze-table.js"></script>
<script type="text/javascript">
   $(function () {
        $(".freeze-table").freezeTable({
            'columnNum': 2
        });
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        };
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

<!-- Sweet Alert Gagal -->
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
<!-- Sweet Alert Gagal -->