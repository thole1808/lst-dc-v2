<div class="content-wrapper">
<section class="content">
    <!-- Informasi Succes & Gagal  -->
    <?php if (validation_errors()) : ?>
    <div class="alert alert-danger">
      <!-- /<font style="color:white"> -->
      <a href="#" class="close" data-dismiss="alert">x</a>

        <?php echo validation_errors(); ?>
      <!-- </font> -->
    </div>
    <?php endif; ?>


    <?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success">
      <!-- <font style="color:white"> -->
        <a href="#" class="close" data-dismiss="alert">x</a>
        <?php echo $this->session->flashdata('message'); ?>
      <!-- </font> -->
    </div>
    <?php endif; ?> 
    <!--  -->
<div class="box box-primary box-solid">
<div class="box-header with-border">
    <h3 class="box-title">INPUT TIKET</h3>
</div>
   
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <div class="panel-body">
        <div class="box-body">
            <div class="row">
                
            </div>
        </div>

        <!--  -->
        <div class="box-body">
            <div class="row">
                
                <!-- Jenis Tiket dll -->
                <div class="col-md-4">
                    <div class="box box-primary box-solid">
                        <div class="panel-body">
                           <div class="row">
                                
                                <div class='col-md-12 form-group'>
                                    <label>Jenis Tiket</label>
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
                                            $('#id_jenis_tiket').change(function(){
                                                $('.form').hide();
                                                $('#' + $(this).val()).show();
                                            });

                                        });

                                    </script>
                                </div>

                               <!-- NANTI DISINI SHOWNYA -->
                               
                               <!-- SHOW INSIDEN -->
                               <div id="JTK-011020-0001" class="form" style="display:none;">
                                    
                                    <div class='col-md-12 form-group'>
                                        <label>Dampak</label>
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

                                    <div class="col-md-12 form-group">
                                        <label>Urgency</label>
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

                                    <div class="col-md-12 form-group">
                                        <label>Prioritas</label>
                                        <select name="prioritas" class="form-control" id="prioritas" disabled="">
                                        </select>
                                        <script type="text/javascript">
                                            document.getElementById('prioritas').value = "<?php echo $_POST['prioritas'];?>";
                                        </script>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Penangan Prioritas</label>
                                        <style type="text/css">
                                            select.list1 option.option2
                                            {
                                                background-color: #007700;
                                            }
                                        </style>
                                        <select name="penanganan_prioritas" class="form-control option2" id="penanganan_prioritas" disabled="">
                                        </select>
                                        <script type="text/javascript">
                                            document.getElementById('penanganan_prioritas').value = "<?php echo $_POST['penanganan_prioritas'];?>";
                                        </script>
                                    </div>

                                </div>
                                <!-- SHOW INSIDEN -->

                                <!-- SHOW INSIDEN KEAMANAN INFORMASI-->
                                <div id="JTK-041020-0001" class="form" style="display:none;">
                                    
                                    <div class='col-md-12 form-group'>
                                        <label>Dampak</label>
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

                                    <div class="col-md-12 form-group">
                                        <label>Urgency</label>
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
                                        }
                                    </style>

                                    <div class="col-md-12 form-group">
                                        <label>Prioritas</label>
                                        <select name="prioritas" class="form-control" id="prioritas" disabled="">
            
                                        </select>
                                        <script type="text/javascript">
                                            document.getElementById('prioritas').value = "<?php echo $_POST['prioritas'];?>";
                                        </script>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Penangan Prioritas</label>
                                        <style type="text/css">
                                            select.list1 option.option2
                                            {
                                                background-color: #007700;
                                            }
                                        </style>
                                        <select name="penanganan_prioritas" class="form-control option2" id="penanganan_prioritas" disabled="">
                                        </select>
                                        <script type="text/javascript">
                                            document.getElementById('penanganan_prioritas').value = "<?php echo $_POST['penanganan_prioritas'];?>";
                                        </script>
                                    </div>

                                </div>
                                <!-- SHOW INSIDEN KEAMANAN INFORMASI-->

                                <!-- SHOW PERMINTAAN LAYANAN-->
                                <div id="JTK-041020-0002" class="form" style="display:none;">
                                    
                                    <div class='col-md-12 form-group'>
                                        <label>Dampak</label>
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

                                    <div class="col-md-12 form-group">
                                        <label>Urgency</label>
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
                                        }
                                    </style>

                                </div>
                                <!-- SHOW PERMINTAAN LAYANAN-->


                               <!-- NANTI DISINI SHOWNYA -->
                           </div>
                        </div>
                    </div>
                </div>
                <!-- Jenis Tiket dll -->
            </div>
        </div>
        <!--  -->
    </div>
</form>
</div>
</div>
</div>

<script>
    $(function (){

        // SELECT 2
        $('.select2').select2();
        
        $("#id_jadwal_shift").select2({
            placeholder: "-- silahkan pilih --",
            language: {
                noResults: function (params) {
                  return "data tidak tersedia.";
                }
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
        
        $("#id_status_tiket").select2({
            placeholder: "-- silahkan pilih --",
            language: {
                noResults: function (params) {
                  return "data tidak tersedia.";
                }
            }
        });

        $("#id_layanan").select2({
            placeholder: "-- silahkan pilih --",
            language: {
                noResults: function (params) {
                  return "data tidak tersedia.";
                }
            }
        });

        $("#id_daftar_aplikasi").select2({
            placeholder: "-- silahkan pilih --",
            language: {
                noResults: function (params) {
                  return "data tidak tersedia.";
                }
            }
        });

        $("#id_kabupaten").select2({
            placeholder: "-- silahkan pilih --",
            language: {
                noResults: function (params) {
                  return "data tidak tersedia.";
                }
            }
        });

        $("#id_admin_kab").select2({
            placeholder: "-- silahkan pilih --",
            language: {
                noResults: function (params) {
                  return "data tidak tersedia.";
                }
            }
        });
       // SELECT 2


        // MENCARI JENIS TIKET LEVEL SESUAI JENIS TIKET //
            // /*Jenis Tiket*/
            $("select[name='id_jenis_tiket']").on('change',function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/Percobaan_dulu/get_jenis_tiket_level",
                    method : "POST",
                    data : {id: id},
                    dataType : 'json',
                    success: function(data){
                        // alert(data['0'].nama_dampak);
                        var html1 = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html1 += '<option value="'+data[i].id_dampak+'">'+data[i].nama_dampak+'</option>';
                        }
                        $('select[name="id_dampak"]').html(html1);
                    }
                });
            }); 
            // /*Jenis Tiket*/

            // /*Jenis Dampak*/
            $("select[name='id_dampak']").on('change',function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/Percobaan_dulu/get_jenis_tiket_level_dampak",
                    method : "POST",
                    data : {id: id},
                    dataType : 'json',
                    success: function(data){
                        var html1 = '';
                        var html2 = '';
                        var html3 = '';
                        var i;
                        for(i=0; i<data.length; i++){

                            html1 += '<option value="'+data[i].id_urgency+'">'+data[i].nama_urgency+'</option>';
                            html2 += '<option value="'+data[i].id_prioritas+'">'+data[i].nama_prioritas+'</option>';
                            html3 += '<option value="'+data[i].deskripsi+'">'+data[i].deskripsi+'</option>';
                        }
                        $('select[name="id_urgency"]').html(html1);
                       
                        // Prioritas
                        if (data['0'].nama_prioritas =='Prioritas 1'){
                            $('select[name="prioritas"]').html(html2).css('background-color', 'red');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 2'){
                            $('select[name="prioritas"]').html(html2).css('background-color', 'yellow');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 3'){
                            $('select[name="prioritas"]').html(html2).css('background-color', 'transparent');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 4'){
                           $('select[name="prioritas"]').html(html2).css('background-color', 'transparent');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 5'){
                            $('select[name="prioritas"]').html(html2).css('background-color', 'transparent');
                        }
                        // Prioritas
                        
                        // Deskripsi
                        if (data['0'].deskripsi =='maksimal penyelesaian incident 4 jam')
                            $('select[name="penanganan_prioritas"]').html(html3).css('background-color', 'red');
                        else if (data['0'].deskripsi =='maksimal penyelesaian incident 24 jam')
                        {
                            $('select[name="penanganan_prioritas"]').html(html3).css('background-color', 'yellow');
                        }else{
                            $('select[name="penanganan_prioritas"]').html(html3).css('background-color', 'transparent');
                        }
                        // Deskripsi
                    }
                });
            }); 
            // /*Jenis Dampak*/


            // /*Jenis Urgency*/
            $("select[name='id_urgency']").on('change',function(){
                var id=$(this).val();
                var id2= $("#id_dampak").val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/Percobaan_dulu/get_jenis_tiket_level_urgency",
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
                            $('select[name="prioritas"]').html(html2).css('background-color', 'red');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 2'){
                            $('select[name="prioritas"]').html(html2).css('background-color', 'yellow');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 3'){
                            $('select[name="prioritas"]').html(html2).css('background-color', 'transparent');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 4'){
                           $('select[name="prioritas"]').html(html2).css('background-color', 'transparent');
                        }

                        if (data['0'].nama_prioritas =='Prioritas 5'){
                            $('select[name="prioritas"]').html(html2).css('background-color', 'transparent');
                        }
                        // Prioritas

                        // Deskripsi
                        if (data['0'].deskripsi =='maksimal penyelesaian incident 4 jam')
                            $('select[name="penanganan_prioritas"]').html(html3).css('background-color', 'red');
                        else if (data['0'].deskripsi =='maksimal penyelesaian incident 24 jam')
                        {
                            $('select[name="penanganan_prioritas"]').html(html3).css('background-color', 'yellow');
                        }else{
                            $('select[name="penanganan_prioritas"]').html(html3).css('background-color', 'transparent');
                        }
                        // Deskripsi

                    }
                });
            }); 
            /*Jenis Urgency*/

        // MENCARI JENIS TIKET LEVEL SESUAI JENIS TIKET //




        // // SUDAH DAPET POLANYA DENGAN CARA INI TINGGAL SELECT PENGGABUNGAN DARI DAMPAK
        // // // Pilih Jenis Tiket
        // $("#id_jenis_tiket").change(function (){
        //     var url = "<?php echo site_url('Percobaan_dulu/pilih_jenis_tiket');?>/"+$(this).val();
        //     $('#id_dampak').load(url);
        //     return false;
        // })
        
        // // Pilih Dampak
        // $("#id_dampak").change(function (){
        //     var url = "<?php echo site_url('Percobaan_dulu/pilih_dampak');?>/"+$(this).val();
        //     $('#id_urgency').load(url);
        //     return false;
        // })

        // // Pilih Urgency
        // $("#id_urgency").change(function (){
        //     var url = "<?php echo site_url('Percobaan_dulu/pilih_urgency');?>/"+$(this).val();
        //     $('#prioritas').load(url);
        //     return false;
        // })
        // // SUDAH DAPET POLANYA DENGAN CARA INI TINGGAL SELECT PENGGABUNGAN DARI DAMPAK


    });
</script>


