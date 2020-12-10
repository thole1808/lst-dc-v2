<div class="content-wrapper">
<section class="content">
<form action="<?php echo $action; ?>" method="POST" id="validasi" enctype="multipart/form-data">
    <!-- Panel Body -->
    <div class="panel-body"> 
      <!-- Row -->
      <div class="row">
        <!-- Layanan & Sub Layanan -->
        <div class="col-sm-6">
           <div class="box-body">
                <div class="box box-primary box-solid">
                <div class="box-header">
                    <center><h3 class="box-title">Layanan</b></h3></center>
                </div> 
                    <!-- Box Body -->
                    <div class="box-body">
                        <div class='col-md-12 form-group'>
                            <label>Layanan</label> <label for="id_layanan" class="error" style="color: red;"></label>
                            <select name="id_layanan" class="form-control select2" id="id_layanan">

                            </select>
                            <script type="text/javascript">
                               document.getElementById('id_layanan').value = "<?php echo $_POST['id_layanan'];?>";
                            </script> 
                        </div>
                        <div class='col-md-12 form-group'>
                            <label>Sub Layanan</label> <label for="id_item_layanan" class="error" style="color: red;"></label>
                            <select name="id_item_layanan" class="form-control select2" id="id_item_layanan">
                                 <?php 
                                   $jumlah = $this->db->query("SELECT * FROM tbl_sub_layanan WHERE id_layanan='".$id_layanan."';
                                    "); $fetch = $jumlah->result_array();
                                    foreach ($fetch as $c): 
                                    $selected = $c->id_item_layanan == $c->id_layanan ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $c['id_item_layanan'];?>" <?php echo $selected; ?>> <?php echo 
                                    $c['nama_item_layanan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <script type="text/javascript">
                                document.getElementById('id_item_layanan').value = "<?php echo $_POST['id_item_layanan'];?>";
                            </script>  
                        </div> 
                    </div>
                    <!-- Box Body -->
                </div>
           </div>
        </div>
        <!-- Layanan & Sub Layanan -->

        <!-- Klien & Admin -->
        <div class="col-sm-6">
           <div class="box-body">
                <div class="box box-primary box-solid">
                <div class="box-header">
                    <center><h3 class="box-title">Klien</b></h3></center>
                </div> 
                    <!-- Box Body -->
                    <div class="box-body">
                        <div class='col-md-12 form-group'>
                            <label>Klien</label> <label for="id_klien" class="error" style="color: red;"></label>
                            <select name="id_klien" class="form-control select2" id="id_klien">
                              
                            </select> 
                            <script type="text/javascript">
                                document.getElementById('id_klien').value = "<?php echo $_POST['id_klien'];?>";
                            </script> 
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Admin</label> <label for="id_admin" class="error" style="color: red;"></label>
                            <select name="id_admin" class="form-control" id="id_admin">
                                <?php 
                                   $jumlah = $this->db->query("SELECT * FROM tbl_sub_admin_klien WHERE id_klien='".$id_kabupaten."';
                                    "); $fetch = $jumlah->result_array();
                                    foreach ($fetch as $c): 
                                        $selected = $c->id_admin == $c->id_admin ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $c['id_admin'];?>" <?php echo $selected; ?>> <?php echo 
                                    $c['nama_admin']; ?>
                                <?php endforeach; ?>
                            </select>
                            <script type="text/javascript">
                                document.getElementById('id_admin').value = "<?php echo $_POST['id_admin'];?>";
                            </script>
                        </div>
                        
                        <style type="text/css">
                            select {
                              -moz-appearance: none;
                              -webkit-appearance: none;
                            }
                            select::-ms-expand {
                              display: none;
                              border:none;
                            }
                        </style>
                       <!--  <div class="col-md-12 form-group">
                            <label>Email</label> <label for="email_admin" class="error" style="color: red;"></label>
                            <select name="email_admin" class="form-control select" id="email_admin">
                            </select>
                            <script type="text/javascript">
                                document.getElementById('email_admin').value = "<?php echo $_POST['email_admin'];?>";
                            </script>
                        </div> -->
                    </div>
                    <!-- Box Body -->
                </div>
           </div>
        </div>
        <!-- Klien & Admin -->

        <!-- Jenis Tiket -->
        <div class="col-sm-6">
           <div class="box-body">
                <div class="box box-primary box-solid">
                <div class="box-header">
                    <center><h3 class="box-title">Tiket</b></h3></center>
                </div> 
                    <!-- Box Body -->
                    <div class="box-body">
                        <div class='col-md-12 form-group'>
                            <label>Jenis Tiket</label> <label for="id_jenis_tiket" class="error" style="color: red;"></label>
                            <select name="id_jenis_tiket" class="form-control select2" 
                            id="id_jenis_tiket" onchange="set_to(this.value);">
                               <?php foreach($jenis_tiket as $data){
                                echo '<option value="'.$data->id_jenis_tiket.'">'.$data->nama_jenis_tiket.'</option>';
                               } ?>
                            </select> 
                            <input type="hidden" id="idesc" name="idesc"/> 
                            <script type="text/javascript">
                                document.getElementById('id_jenis_tiket').value = "<?php echo $_POST['id_jenis_tiket'];?>";
                                function set_to(id){
                                    $('#idesc').val(id);
                                }
                                $(function(){    
                                    $('#show_dampak').hide();
                                    $('#show_urgency').hide(); 
                                    $('#show_prioritas').hide(); 
                                    $('#show_deskripsi').hide(); 
                                    $('#id_jenis_tiket').change(function(){
                                        // Insiden
                                        if($("#id_jenis_tiket").val() == 'JTK-011020-0001') {
                                            $('#show_dampak').show(); 
                                            $('#show_urgency').show(); 
                                            $('#show_prioritas').show(); 
                                            $('#show_deskripsi').show(); 

                                        // Insiden Keamanan Informasi 
                                        } else if ($("#id_jenis_tiket").val() == 'JTK-041020-0001') {
                                            $('#show_dampak').show(); 
                                            $('#show_urgency').show(); 
                                            $('#show_prioritas').show(); 
                                            $('#show_deskripsi').show(); 
                                        // Service Request
                                        } else if ($("#id_jenis_tiket").val() == 'JTK-041020-0002') {
                                            $('#show_dampak').show(); 
                                            $('#show_urgency').show(); 
                                            $('#show_prioritas').hide(); 
                                            $('#show_deskripsi').hide(); 
                                        }
                                    });
                                });
                            </script>
                        </div>

                        <!-- TIKET LEVEL -->
                        <div id="show_dampak" class='col-md-12 form-group'>
                            <label>Dampak</label> <label for="id_dampak" class="error" style="color: red;"></label>
                            <style type="text/css">
                                .select2 {
                                    width:100%!important;
                                }
                            </style>
                            <select name="id_dampak" class="form-control select2" id="id_dampak">
                            </select>
                            <script type="text/javascript">
                                document.getElementById('id_dampak').value = "<?php echo $_POST['id_dampak'];?>";
                            </script>
                        </div>
                        <div id="show_urgency" class="col-md-12 form-group">
                            <label>Urgency</label> <label for="id_urgency" class="error" style="color: red;"></label>
                            <select name="id_urgency" class="form-control select2" id="id_urgency">
                            </select>
                            <script type="text/javascript">
                                document.getElementById('id_urgency').value = "<?php echo $_POST['id_urgency'];?>";
                            </script>
                        </div>
                        <style type="text/css">
                            select {
                              -moz-appearance: none;
                              -webkit-appearance: none;
                            }
                            select::-ms-expand {
                              display: none;
                              border:none;
                            }
                        </style>
                        <div id="show_prioritas" class="col-md-12 form-group">
                            <label>Prioritas</label>
                            <select name="id_prioritas" class="form-control" id="id_prioritas" readonly>
                            </select>
                            <script type="text/javascript">
                                document.getElementById('id_prioritas').value = "<?php echo $_POST['id_prioritas'];?>";
                            </script>
                        </div>
                        <div id="show_deskripsi" class="col-md-12 form-group">
                            <label>Deskripsi</label>
                            <style type="text/css">
                                select.list1 option.option2{
                                    background-color: #007700;
                                }
                            </style>
                            <select name="deskripsi" class="form-control option2" id="deskripsi" readonly>
                            </select>
                            <script type="text/javascript">
                                document.getElementById('deskripsi').value = "<?php echo $_POST['deskripsi'];?>";
                            </script>
                        </div>
                        <!-- TIKET LEVEL -->
                    </div>
                    <!-- Box Body -->
                </div>
           </div>
        </div>
        <!-- Jenis Tiket -->

        <!-- Detail Deskripsi Impact & Urgency  -->
        <style type="text/css">
            details{
                border: 1px solid #aaa;
                border-radius: 4px;
                padding: .5em .5em 0;
            }
            summary{
                font-weight: bold;
                margin: -.5em -.5em 0;
                padding: .5em;
            }
            details[open]{
                padding: .5em;
            }
            details[open] summary{
                border-bottom: 1px solid #aaa;
                margin-bottom: .5em;
            }
        </style>
        <div class="col-sm-6">
            <div class="box-body">
                <div class="box box-primary box-solid">
                    <div class="panel-body">
                        <label>
                            <u>Penjelasan Insiden</u>
                        </label>
                        <details>
                            <summary>
                                <i class="fa fa-arrow-right " aria-hidden="true"></i>
                                1. Kriteria Incident Impact adalah sebagai berikut:
                            </summary>
                            <label style="font-size: 14px; color: grey;">
                                - Kriteria Incident Impact adalah sebagai berikut:
                                <br>
                                - High Impact yaitu incident dengan akibat atau cakupan luas, diantaranya:
                                <br>
                                - Terganggunya layanan di lebih dari 5 customer pada saat bersamaan
                                <br>
                                - Terganggunya layanan di lebih dari 10 Cloud/VPS/Collocation/Dedicated  pada saat bersamaan
                                <br>
                                - Terganggunya pelayanan kepada Customer utama seperti Kabupaten, Rumah Sakit, dll.
                                <br>
                                - Terganggunya pekerjaan sejenis lebih dari 100 orang pada saat bersamaan.
                            </label>
                        </details>
                           <br>
                        <details>
                            <summary>
                                <i class="fa fa-arrow-right " aria-hidden="true"></i>
                                    2. Medium Impact yaitu incident dengan akibat atau cakupan sedang, diantaranya:
                            </summary>
                            <label style="font-size: 14px; color: grey;">
                                - Terganggunya layanan di 1-4 customer pada saat bersamaan
                                <br>
                                - Terganggunya layanan di lebih dari 5-9 Cloud/VPS/Collocation/Dedicated pada saat bersamaan
                                <br>
                                - Terganggunya pelayanan kepada Eksekutif Customer utama, seperti Bupati, Direktur Rumah Sakit, dll.
                                <br>
                                - Terganggunya pekerjaan sejenis 50-100 orang pada saat bersamaan.
                            </label>
                        </details>
                           <br>
                        <details>
                            <summary>
                                <i class="fa fa-arrow-right " aria-hidden="true"></i>
                                    3. Low Impact yaitu incident dengan akibat atau cakupan rendah, diantaranya:
                            </summary>
                            <label style="font-size: 14px; color: grey;">
                                - Terganggunya layanan di lebih dari 1-4 Cloud/VPS/Collocation/Dedicated pada saat bersamaan.
                                <br>
                                - Terganggunya pekerjaan sejenis kurang dari 50 orang pada saat bersamaan
                            </label>
                        </details>
                           <br>        
                        <details>
                            <summary>
                                <i class="fa fa-arrow-right " aria-hidden="true"></i>
                                    4. Kriteria Incident Urgency adalah sebagai berikut:
                            </summary>
                            <label style="font-size: 14px; color: grey;">
                               - High Urgency, dengan kriteria :
                               <br>
                               a.   Incident belum pernah terjadi sebelumnya
                               <br>
                               b.  Layanan tidak tersedia (unavailable)
                               <br>
                               c.  Terhentinya pekerjaan atau pelayanan
                               <br>
                               d.  Incident pernah terjadi sebelumnya dan telah diketahui solusi permanennya.

                               <br>

                               - Medium Urgency, dengan kriteria:
                               <br>
                               a. Terganggunya kecepatan melaksanakan pekerjaan atau pelayanan
                               <br>
                               b. Incident pernah terjadi sebelumnya namun hanya diketahui solusi sementaranya
                               <br>

                               - Low Urgency, dengan kriteria berkurangnya kenyamanan dalam melaksanakan pekerjaan.
                            </label>
                        </details>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail Deskripsi Impact & Urgency -->

        <!-- Keluhan / Request-->
        <div class="col-sm-12">
           <div class="box-body">
                <div class="box box-primary box-solid">
                <div class="box-header">
                    <center style="text-align: left;"><h3 class="box-title">Keluhan / Request</b></h3></center>
                </div> 
                    <!-- Box Body -->
                    <div class="box-body">
                        <div class='col-md-12 form-group'>
                            <label>Keluhan / Request</label> <label for="keluhan" class="error" style="color: red;"></label>
                            <textarea class="form-control" rows="5" name="keluhan" id="keluhan" placeholder="Keluhan / Request"><?php echo $keluhan; ?></textarea>  
                            <script type="text/javascript">
                                document.getElementById('keluhan').value = "<?php echo $_POST['keluhan'];?>";
                            </script>
                        </div>
                    </div>
                    <!-- Box Body -->
                </div>
           </div>
        </div>
        <!-- Keluhan / Request-->

        <!-- Shift & Lampiran -->
        <div class="col-sm-12">
           <div class="box-body">
                <div class="box box-primary box-solid">
                <div class="box-header">
                    <center style="text-align: left;"><h3 class="box-title">Shift & Lampiran</b></h3></center>
                </div> 
                    <!-- Box Body -->
                    <div class="box-body">
                        <div class='col-md-12 form-group'>
                            <label>Shift</label> <label for="id_shift" class="error" style="color: red;"></label>
                            <select name="id_shift" class="form-control select2" id="id_shift">
                               <?php foreach($shift as $data){
                                echo '<option value="'.$data->id_shift.'">'.$data->nama_shift.'</option>';
                               } ?>
                            </select>
                            <script type="text/javascript">
                                document.getElementById('id_shift').value = "<?php echo $_POST['id_shift'];?>";
                            </script>
                        </div>
                        <div class='col-md-12 form-group'>
                            <label>Lampiran</label> <label for="lampiran_tiket_keluhan_masuk" class="error" style="color: red;"></label>
                            <table class="table table-bordered" id="item-table">
                                  <thead>
                                    <tr>
                                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"> Tambah Lampiran</i></button></th>
                                    </tr>
                                  </thead>
                                   <tbody>
                                     <tr>
                                        <td style="width: 50%;" colspan="1">
                                            <input class="form-control" rows="3" name="lampiran_tiket_keluhan_masuk[]" 
                                            id="lampiran_tiket_keluhan_masuk" type="file"></input> 
                                            <label style="color: red;"><u>lampiran format: .jpeg|.jpg|.png</u></label>
                                        </td>
                                     </tr>
                                   </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Box Body -->
                </div>
           </div>
        </div>
        <!-- Shift & Lampiran -->

        <!-- Button -->
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <input type="hidden" id="dibuat_oleh" name="dibuat_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" /> 
                <input type="hidden" name="id_trans_tiket" value="<?php echo $id_trans_tiket; ?>" />
                <input type="hidden" name="no_tiket" value="<?php echo $no_tiket; ?>" />
                <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?>
                </button> 
                <a href="<?php echo site_url('beranda') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali
                </a>
            </div>
        </div>
        <!-- Button -->

      </div>
      <!-- Row -->
    </div>
    <!-- Panel Body -->
</form>
</section>
</div>

<script src="<?php echo base_url('assets/validate_js/jquery.validate.js') ?>"></script>  
<script>
    $(function (){
        // Validasi
        $(document).ready(function(){
            $('#validasi').validate({
                rules: {
                    id_layanan: {
                        required : true,
                    },
                    id_item_layanan:{
                        required :true,
                    },
                    id_klien:{
                        required :true,
                    },
                    id_admin:{
                        required :true,
                    },
                    // email_admin:{
                    //     required :true,
                    // },
                    id_jenis_tiket:{
                        required :true,
                    },
                    id_dampak:{
                        required :true,
                    },
                    id_urgency:{
                        required :true,
                    },
                    keluhan:{
                        required :true,
                    },
                    id_shift: {
                        required : true,
                    },
                    lampiran_tiket_keluhan_masuk:{
                        required :true,
                    }
                },
                messages: {
                    id_layanan: {
                        required : "Wajib di isi",
                    },
                    id_item_layanan: {
                        required : "Wajib di isi",
                    },
                    id_klien: {
                        required : "Wajib di isi",
                    },
                    id_admin: {
                        required : "Wajib di isi",
                    },
                    // email_admin: {
                    //     required : "Wajib di isi silahkan pilih Nama Admin Dahulus",
                    // },
                    id_jenis_tiket: {
                        required : "Wajib di isi",
                    },
                    id_dampak: {
                        required : "Wajib di isi",
                    },
                    id_urgency: {
                        required : "Wajib di isi",
                    },
                    keluhan: {
                        required : "Wajib di isi",
                    },
                    id_shift: {
                        required : "Wajib di isi",
                    },
                    lampiran_tiket_keluhan_masuk:{
                        required: "Wajib di isi",
                    }
                }
            });
        });

        // SELECT 2
            $('.select2').select2();
            $("select[name='id_shift']").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                    return "data tidak tersedia.";
                    },
                    searching: function() {
                        return "Mencari...";
                    }
                },
                ajax: { 
                   url: '<?= base_url() ?>index.php/Buat_tiket/cari_shift',
                   type: "post",
                   dataType: 'json',
                   delay: 250,
                   data: function (params) {
                      return {
                        searchTerm: params.term // search term
                      };
                   },
                   processResults:function (response) {
                      return {
                         results: response
                      };
                   },
                   cache: true
                }
            });

            $("#id_jenis_tiket").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                      return "data tidak tersedia.";
                    }
                }
            });
            $("#id_urgency").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                      return "data tidak tersedia.";
                    }
                }
            });
            $("#id_dampak").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                      return "data tidak tersedia.";
                    }
                }
            });           
            $("select[name='id_layanan']").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                    return "data tidak tersedia.";
                    },
                    searching: function() {
                        return "Mencari...";
                    }
                },
                ajax: { 
                   url: '<?= base_url() ?>index.php/Buat_tiket/cari_layanan',
                   type: "post",
                   dataType: 'json',
                   delay: 250,
                   data: function (params) {
                      return {
                        searchTerm: params.term // search term
                      };
                   },
                   processResults:function (response) {
                      return {
                         results: response
                      };
                   },
                   cache: true
                }
            });
            $("#id_item_layanan").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                      return "data tidak tersedia.";
                    }
                }
            });
            $("select[name='id_klien']").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                    return "data tidak tersedia.";
                    },
                    searching: function() {
                        return "Mencari...";
                    }
                },
                ajax: { 
                   url: '<?= base_url() ?>index.php/Buat_tiket/cari_klien',
                   type: "post",
                   dataType: 'json',
                   delay:250,
                   data: function (params) {
                      return {
                        searchTerm: params.term // search term
                      };
                   },
                   processResults:function (response) {
                      return {
                         results: response
                      };
                   },
                   cache: true
                }
            });
            $("#id_admin").select2({
                placeholder: "-- silahkan pilih --",
                language: {
                    noResults: function (params) {
                      return "data tidak tersedia.";
                    }
                }
            });
        // SELECT 2
        
        // MENCARI JENIS TIKET LEVEL SESUAI JENIS TIKET //
        
            /* Layanan & Sub Layanan  Item */
             $("select[name='id_layanan']").change(function (){
                var url = "<?php echo site_url('Buat_tiket/pilih_layanan');?>/"+$(this).val();
                $("#id_item_layanan").load(url);
                return false;
            })
            /* Layanan & Sub Layanan Item*/

            /* Klien & Sub Admin Klien  & Email Admin*/
            $("select[name='id_klien']").change(function (){
                var url = "<?php echo site_url('Buat_tiket/pilih_id_klien');?>/"+$(this).val();
                $("#id_admin").load(url);
                return false;
            })
            /* Klien & Sub Admin Klien */
            
            /* Email Admin Sesuai Nama Admin Dan Klien Bersangkutan*/
            $("select[name='id_admin']").change(function (){
                var url = "<?php echo site_url('Buat_tiket/pilih_admin');?>/"+$(this).val();
                $("#email_admin").load(url);
                return false;
            })
            /* Email Admin Sesuai Nama Admin Dan Klien Bersangkutan*/


        // MENCARI JENIS TIKET LEVEL SESUAI JENIS TIKET //

            // /*Jenis Tiket & Dampak */
            $('select[name="id_jenis_tiket"]').change(function (){
                var url = "<?php echo site_url('Buat_tiket/pilih_jenis_tiket');?>/"+$(this).val();
                $('select[name="id_dampak"]').load(url);
                $('select[name="id_urgency"]').empty().css('background-color', 'transparent');
              
                $('select[name="id_prioritas"]').empty().css('background-color', 'transparent');
                $('select[name="deskripsi"]').empty().css('background-color', 'transparent');
                
                return false;
            })
            // /* Jenis Tiket & Dampak */

            /*Jenis Dampak & Urgency*/
            $('select[name="id_dampak"]').change(function (){
                var url = "<?php echo site_url('Buat_tiket/pilih_dampak_jenis_tiket');?>/"+$(this).val();
                $('select[name="id_urgency"]').load(url);
                $('select[name="id_prioritas"]').empty().css('background-color', 'transparent');
                $('select[name="deskripsi"]').empty().css('background-color', 'transparent');
                return false;
            })
            /*Jenis Dampak & Urgency*/

            // Jenis Urgency & Prio & Deskripsi
            $("select[name='id_urgency']").on('change',function(){
                var id=$(this).val();
                var id2= $("select[id='id_dampak']").val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/Buat_tiket/get_jenis_tiket_level_urgency",
                    method : "POST",
                    data : {id: id,id2: id2},
                    dataType : 'json',
                    success: function(data){
                        var html1 = '';
                        var html2 = '';
                        var html3 = '';
                        var i;
                        
                        for(i=0; i<data.length; i++){
                            html2 += '<option value="'+data[i].id_prioritas+'">'+data[i].nama_prioritas+'</option>';
                            html3 += '<option value="'+data[i].deskripsi+'">'+data[i].deskripsi+'</option>';
                        }

                        // Prioritas
                        if (data['0'].nama_prioritas =='Prioritas 1'){
                            $('select[name="id_prioritas"]').html(html2).css('background-color', 'red');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 2'){
                            $('select[name="id_prioritas"]').html(html2).css('background-color', 'yellow');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 3'){
                            $('select[name="id_prioritas"]').html(html2).css('background-color', 'transparent');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 4'){
                           $('select[name="id_prioritas"]').html(html2).css('background-color', 'transparent');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 5'){
                            $('select[name="id_prioritas"]').html(html2).css('background-color', 'transparent');
                        }
                        // Prioritas

                        // Deskripsi
                        if (data['0'].deskripsi =='maksimal penyelesaian incident 4 jam')
                            $('select[name="deskripsi"]').html(html3).css('background-color', 'red');
                        else if (data['0'].deskripsi =='maksimal penyelesaian incident 24 jam')
                        {
                            $('select[name="deskripsi"]').html(html3).css('background-color', 'yellow');
                        }else{
                            $('select[name="deskripsi"]').html(html3).css('background-color', 'transparent');
                        }
                        // Deskripsi
                    }
                });
            }); 
            // /*Jenis Urgency & Prioritas & Deskripsi*/
           
        // MENCARI JENIS TIKET LEVEL SESUAI JENIS TIKET //

       
        // UPLOAD LAMPIRAN TIKET MASUK
        $(document).ready(function(){   
           $('#add_row').click(function(){ 
               var i=1; 
               i++;  
               var html ='';
               html +='<tr id="row'+i+'"><td colspan="1">';
               html +='<tr><td><input class="form-control" rows="3" name="lampiran_tiket_keluhan_masuk[]" id="lampiran_tiket_keluhan_masuk[]" type="file"><?php echo $lampiran_tiket_keluhan_masuk; ?></input><label style="color: red;"><u>lampiran format: .jpeg|.jpg|.png</u></label></td>';
               $('#item-table').append(html);
            }); 
            $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
            }); 
        });

    });
</script>