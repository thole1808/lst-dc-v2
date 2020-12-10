<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php echo alert('alert-info', 'Perhatian', 'Silahkan Cheklist Pada Menu Yang Akan Diberikan Akses') ?>
                <div class="box box-primary box-solid">

                    <div class="box-header">
                        <h3 class="box-title">BERIKAN HAK AKSES MENU UNTUK LEVEL :  <b><?php echo $level['nama_level'] ?></b></h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="10%;" style="text-align: center;">Kode Menu</th>
                                        <th width="60px">Nama Menu</th>
                                        <th width="70px" style="text-align: center;">Beri Akses</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($menu as $m) {?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $m->id_menu; ?></td>
                                            <td><?php echo $m->title; ?></td>
                                            <td align="center">
                                                <input type="checkbox" <?php echo checked_akses($this->uri->segment(3), $m->id_menu)?>
                                                onclick="kasi_akses(<?php echo $m->id_menu ?>)"/>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script type="text/javascript">
    function kasi_akses(id_menu) {
        var id_menu = id_menu;
        var level = '<?php echo $this->uri->segment(3); ?>';
        $.ajax({
            url: "<?php echo base_url() ?>index.php/userlevel/kasi_akses_ajax",
            data: "id_menu=" + id_menu + "&level=" + level,
            success: function(html){
                
            }
        });
    }
</script>

