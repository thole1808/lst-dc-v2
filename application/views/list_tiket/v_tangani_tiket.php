<div class="content-wrapper">
  <section class="content">
    <div class="box-body">
      <div class="box box-primary box-solid">
          <div class="box-header">
              <h3 class="box-title">Tangani Tiket</h3>
          </div>
          <!-- From -->
            <form action="<?php echo $action; ?>" method="POST" id="validasi" enctype="multipart/form-data">
            <div class="box-body">
              <div class="row">
                <!-- Tampilkan Root Cause / Penyebab Insiden jika tiket Insiden -->
                <?php if ($id_jenis_tiket == 'JTK-011020-0001'){?>
                  <div class='col-md-12 form-group'>
                    <label>Klasifikasi Insiden / Service Request</label> <label for="id_klasifikasi" class="error" style="color: red;"></label>
                    <select name="id_klasifikasi" class="form-control select2" id="id_klasifikasi">
                      <?php 
                        $query= $this->db->query("
                          SELECT 
                            (SELECT nama_klasifikasi FROM master_klasifikasi WHERE id_klasifikasi = tbl_sub_klasifikasi.id_klasifikasi) 
                            AS nama_klasifikasi,
                            id_klasifikasi
                          FROM tbl_sub_klasifikasi 
                          WHERE id_jenis_tiket='".$id_jenis_tiket."'
                          GROUP BY nama_klasifikasi
                        "); 
                        $query->result();
                        $data = "<option value=''>- Pilih Klasifikasi -</option>";
                        foreach ($query->result() as $value) {
                            $data .= "<option value='".$value->id_klasifikasi."'>".$value->nama_klasifikasi."</option>";
                        }
                        echo $data;
                      ?>
                    </select>
                      <script type="text/javascript">
                        document.getElementById('id_klasifikasi').value = "<?php echo $_POST['id_klasifikasi'];?>";
                      </script>
                  </div>
                  <div class='col-md-12 form-group'>
                      <label>Sub Klasifikasi Insiden / Service Request</label> <label for="id_item_klasifikasi" class="error" style="color: red;"></label>
                      <select name="id_item_klasifikasi" class="form-control select2" id="id_item_klasifikasi">
                      </select> 
                      <script type="text/javascript">
                              document.getElementById('id_item_klasifikasi').value = "<?php echo $_POST['id_item_klasifikasi'];?>";
                          </script>    
                  </div>
                  <div class='col-md-12 form-group'>
                    <label>Penyebab Insiden / Root Cause</label> <label for="id_penyebab" class="error" style="color: red;"><button id="tester" type="button">Lainnya</button></label>
                    <select class="form-control" name="id_penyebab" id="id_penyebab" onchange="changeFunc();">

                    </select>
                    <script type="text/javascript">
                         document.getElementById('id_penyebab').value = "<?php echo $_POST['id_penyebab'];?>";
                      </script>  
                    <script type="text/javascript">
                        function changeFunc() {
                            var selectBox = document.getElementById("id_penyebab");
                            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                            if (selectedValue=="lainnya"){
                              $('#nama_penyebab').show();
                              $('#btn-save').show();
                            }else{
                              $('#nama_penyebab').hide();
                              $('#btn-save').hide();
                              // $('#tester').hide();
                            }
                        }
                        $("button[id='tester']").click(function() {
                            $("#nama_penyebab").show();
                            $('#btn-save').show();
                        });
                    </script>
                  </div>
                  <div class="col-md-8 form-group">
                      <div class="row">
                          <div class="col-md-6">
                              <input name="nama_penyebab" placeholder="Masukkan Nama Penyebab" class="form-control" type="text" 
                              style="display: none" id="nama_penyebab">
                              <span class="text-danger" id="err_penyebab"></span>
                          </div>
                          <div class="col-md-2">
                              <button style="display: none" class="btn btn-info" id="btn-save"><i class="fa fa-plus" aria-hidden="true"> Tambah</i></button>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Status Tiket</label> <label for="id_status_tiket" class="error" style="color: red;"></label>
                    <select name="id_status_tiket" class="form-control select2" id="id_status_tiket">
                        <?php 
                             $jumlah = $this->db->query("
                               SELECT 
                            (SELECT nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_sub_status_jenis_tiket.id_status_tiket) 
                            AS nama_status,
                            id_status_tiket,
                            id_jenis_tiket
                          FROM tbl_sub_status_jenis_tiket 
                          WHERE id_jenis_tiket='".$id_jenis_tiket."'
                          GROUP BY nama_status
                              "); $fetch = $jumlah->result_array();
                              foreach ($fetch as $c): 
                                $selected = $c->id_status_tiket == $c->id_status_tiket ? 'selected' : '';
                                ?>
                              <option value="<?php echo $c['id_status_tiket'];?>" <?php echo $selected; ?>> 
                                <?php echo 
                              $c['nama_status']; ?>
                              </option>
                          <?php endforeach; ?>
                    </select>
                      <script type="text/javascript">
                        document.getElementById('id_status_tiket').value = "<?php echo $_POST['id_status_tiket'];?>";
                      </script>  
                  </div>
                  <div class="col-md-12 form-group">
                      <label>Catatan</label> <label for="catatan" class="error" style="color: red;"></label>
                      <textarea class="form-control" id="catatan" name="catatan" rows="9" placeholder="Catatan"></textarea>
                  </div>
                  <div class='col-md-12 form-group'>
                      <label>Lampiran</label> <label for="lampiran_update_tiket_penanganan" class="error" style="color: red;"></label>
                      <table class="table table-bordered" id="item-table">
                        <thead>
                          <tr>
                            <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"> Tambah Lampiran</i></button></th>
                          </tr>
                        </thead>
                         <tbody>
                           <tr>
                              <td style="width: 50%;" colspan="1">
                                  <input class="form-control" rows="3" 
                                  name="lampiran_update_tiket_penanganan[]" 
                                  id="lampiran_update_tiket_penanganan" type="file"></input> 
                                  <label style="color: red;"><u>lampiran format: .jpeg|.jpg|.png</u></label>
                              </td>
                           </tr>
                         </tbody>
                      </table>
                  </div>
                  <!-- Button -->
                  <div class="col-sm-12">
                      <div class="col-sm-6 form-group">
                        <input type="hidden" id="diubah_oleh" name="diubah_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" />                    
                          <input type="hidden" name="id_trans_tiket" value="<?php echo $id_trans_tiket; ?>" />

                          <!-- Untuk Kirim Ke Email Klien -->
                          <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" />
                          <input type="hidden" name="email_admin" value="<?php echo $email_admin; ?>" />
                          <!-- Untuk Kirim Ke Email Klien -->
                          
                          <!-- Insert NO Tiket Ke Riwayat -->
                          <input type="hidden" name="no_tiket" value="<?php echo $no_tiket; ?>" />
                          <!-- Insert NO Tiket Ke Riwayat -->

                          <button type="submit" class="btn btn-danger"><i class="fa fa-edit"></i> <?php echo $kirim ?>
                          </button> 
                          <a href="<?php echo site_url('List_tiket_ongoing') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali
                          </a>
                      </div>
                  </div>
                  <!-- Button -->

                <!-- Tampilkan Root Cause / Penyebab Insiden jika tiket Insiden Keamanan Informasi -->
                <?php }elseif ($id_jenis_tiket == 'JTK-041020-0001'){?>
                  <div class='col-md-12 form-group'>
                    <label>Klasifikasi Insiden / Service Request</label> <label for="id_klasifikasi" class="error" style="color: red;"></label>
                    <select name="id_klasifikasi" class="form-control select2" id="id_klasifikasi">
                      <?php 
                        $query= $this->db->query("
                          SELECT 
                            (SELECT nama_klasifikasi FROM master_klasifikasi WHERE id_klasifikasi = tbl_sub_klasifikasi.id_klasifikasi) 
                            AS nama_klasifikasi,
                            id_klasifikasi
                          FROM tbl_sub_klasifikasi 
                          WHERE id_jenis_tiket='".$id_jenis_tiket."'
                          GROUP BY nama_klasifikasi
                        "); 
                        $query->result();
                        $data = "<option value=''>- Pilih Klasifikasi -</option>";
                        foreach ($query->result() as $value) {
                            $data .= "<option value='".$value->id_klasifikasi."'>".$value->nama_klasifikasi."</option>";
                        }
                        echo $data;
                      ?>
                    </select>
                      <script type="text/javascript">
                        document.getElementById('id_klasifikasi').value = "<?php echo $_POST['id_klasifikasi'];?>";
                      </script>
                  </div>
                  <div class='col-md-12 form-group'>
                      <label>Sub Klasifikasi Insiden / Service Request</label> <label for="id_item_klasifikasi" class="error" style="color: red;"></label>
                      <select name="id_item_klasifikasi" class="form-control select2" id="id_item_klasifikasi">
                      </select> 
                      <script type="text/javascript">
                              document.getElementById('id_item_klasifikasi').value = "<?php echo $_POST['id_item_klasifikasi'];?>";
                          </script>    
                  </div>
                  <div class='col-md-12 form-group'>
                    <label>Penyebab Insiden / Root Cause</label> <label for="id_penyebab" class="error" style="color: red;"><button id="tester" type="button">Lainnya</button></label>
                    <select class="form-control" name="id_penyebab" id="id_penyebab" onchange="changeFunc();">

                    </select>
                    <script type="text/javascript">
                         document.getElementById('id_penyebab').value = "<?php echo $_POST['id_penyebab'];?>";
                      </script>  
                    <script type="text/javascript">
                        function changeFunc() {
                            var selectBox = document.getElementById("id_penyebab");
                            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                            if (selectedValue=="lainnya"){
                              $('#nama_penyebab').show();
                              $('#btn-save').show();
                            }else{
                              $('#nama_penyebab').hide();
                              $('#btn-save').hide();
                              // $('#tester').hide();
                            }
                        }
                        $("button[id='tester']").click(function() {
                            $("#nama_penyebab").show();
                            $('#btn-save').show();
                        });
                    </script>
                  </div>
                  <div class="col-md-8 form-group">
                      <div class="row">
                          <div class="col-md-6">
                              <input name="nama_penyebab" placeholder="Masukkan Nama Penyebab" class="form-control" type="text" 
                              style="display: none" id="nama_penyebab">
                              <span class="text-danger" id="err_penyebab"></span>
                          </div>
                          <div class="col-md-2">
                              <button style="display: none" class="btn btn-info" id="btn-save"><i class="fa fa-plus" aria-hidden="true"> Tambah</i></button>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Status Tiket</label> <label for="id_status_tiket" class="error" style="color: red;"></label>
                    <select name="id_status_tiket" class="form-control select2" id="id_status_tiket">
                        <?php 
                             $jumlah = $this->db->query("
                               SELECT 
                            (SELECT nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_sub_status_jenis_tiket.id_status_tiket) 
                            AS nama_status,
                            id_status_tiket,
                            id_jenis_tiket
                          FROM tbl_sub_status_jenis_tiket 
                          WHERE id_jenis_tiket='".$id_jenis_tiket."'
                          GROUP BY nama_status
                              "); $fetch = $jumlah->result_array();
                              foreach ($fetch as $c): 
                                $selected = $c->id_status_tiket == $c->id_status_tiket ? 'selected' : '';
                                ?>
                              <option value="<?php echo $c['id_status_tiket'];?>" <?php echo $selected; ?>> 
                                <?php echo 
                              $c['nama_status']; ?>
                              </option>
                          <?php endforeach; ?>
                    </select>
                      <script type="text/javascript">
                        document.getElementById('id_status_tiket').value = "<?php echo $_POST['id_status_tiket'];?>";
                      </script>  
                  </div>
                  <div class="col-md-12 form-group">
                      <label>Catatan</label> <label for="catatan" class="error" style="color: red;"></label>
                      <textarea class="form-control" id="catatan" name="catatan" rows="9" placeholder="Catatan"></textarea>
                  </div>
                  <div class='col-md-12 form-group'>
                      <label>Lampiran</label> <label for="lampiran_update_tiket_penanganan" class="error" style="color: red;"></label>
                      <table class="table table-bordered" id="item-table">
                        <thead>
                          <tr>
                            <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"> Tambah Lampiran</i></button></th>
                          </tr>
                        </thead>
                         <tbody>
                           <tr>
                              <td style="width: 50%;" colspan="1">
                                  <input class="form-control" rows="3" 
                                  name="lampiran_update_tiket_penanganan[]" 
                                  id="lampiran_update_tiket_penanganan" type="file"></input> 
                                  <label style="color: red;"><u>lampiran format: .jpeg|.jpg|.png</u></label>
                              </td>
                           </tr>
                         </tbody>
                      </table>
                  </div>
                  <!-- Button -->
                  <div class="col-sm-12">
                      <div class="col-sm-6 form-group">
                        <input type="hidden" id="diubah_oleh" name="diubah_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" />                    
                          <input type="hidden" name="id_trans_tiket" value="<?php echo $id_trans_tiket; ?>" />

                          <!-- Untuk Kirim Ke Email Klien -->
                          <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" />
                          <input type="hidden" name="email_admin" value="<?php echo $email_admin; ?>" />
                          <!-- Untuk Kirim Ke Email Klien -->
                          
                          <!-- Insert NO Tiket Ke Riwayat -->
                          <input type="hidden" name="no_tiket" value="<?php echo $no_tiket; ?>" />
                          <!-- Insert NO Tiket Ke Riwayat -->

                          <button type="submit" class="btn btn-danger"><i class="fa fa-edit"></i> <?php echo $kirim ?>
                          </button> 
                          <a href="<?php echo site_url('List_tiket_ongoing') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali
                          </a>
                      </div>
                  </div>
                  <!-- Button -->
                <!-- Jangan Tampilkan Root Cause / Penyebab Insiden jika tiket Service Request -->
                <?php }elseif($id_jenis_tiket=='JTK-041020-0002') {?>
                   <div class='col-md-12 form-group'>
                    <label>Klasifikasi Insiden / Service Request</label> <label for="id_klasifikasi" class="error" style="color: red;"></label>
                    <select name="id_klasifikasi" class="form-control select2" id="id_klasifikasi">
                      <?php 
                        $query= $this->db->query("
                          SELECT 
                            (SELECT nama_klasifikasi FROM master_klasifikasi WHERE id_klasifikasi = tbl_sub_klasifikasi.id_klasifikasi) 
                            AS nama_klasifikasi,
                            id_klasifikasi
                          FROM tbl_sub_klasifikasi 
                          WHERE id_jenis_tiket='".$id_jenis_tiket."'
                          GROUP BY nama_klasifikasi
                        "); 
                        $query->result();
                        $data = "<option value=''>- Pilih Klasifikasi -</option>";
                        foreach ($query->result() as $value) {
                            $data .= "<option value='".$value->id_klasifikasi."'>".$value->nama_klasifikasi."</option>";
                        }
                        echo $data;
                      ?>
                    </select>
                      <script type="text/javascript">
                        document.getElementById('id_klasifikasi').value = "<?php echo $_POST['id_klasifikasi'];?>";
                      </script>
                  </div>
                  <div class='col-md-12 form-group'>
                      <label>Sub Klasifikasi Insiden / Service Request</label> <label for="id_item_klasifikasi" class="error" style="color: red;"></label>
                      <select name="id_item_klasifikasi" class="form-control select2" id="id_item_klasifikasi">
                      </select> 
                      <script type="text/javascript">
                              document.getElementById('id_item_klasifikasi').value = "<?php echo $_POST['id_item_klasifikasi'];?>";
                          </script>    
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Status Tiket</label> <label for="id_status_tiket" class="error" style="color: red;"></label>
                    <select name="id_status_tiket" class="form-control select2" id="id_status_tiket">
                        <?php 
                             $jumlah = $this->db->query("
                               SELECT 
                            (SELECT nama_status FROM master_status_tiket WHERE id_status_tiket = tbl_sub_status_jenis_tiket.id_status_tiket) 
                            AS nama_status,
                            id_status_tiket,
                            id_jenis_tiket
                          FROM tbl_sub_status_jenis_tiket 
                          WHERE id_jenis_tiket='".$id_jenis_tiket."'
                          GROUP BY nama_status
                              "); $fetch = $jumlah->result_array();
                              foreach ($fetch as $c): 
                                $selected = $c->id_status_tiket == $c->id_status_tiket ? 'selected' : '';
                                ?>
                              <option value="<?php echo $c['id_status_tiket'];?>" <?php echo $selected; ?>> 
                                <?php echo 
                              $c['nama_status']; ?>
                              </option>
                          <?php endforeach; ?>
                    </select>
                      <script type="text/javascript">
                        document.getElementById('id_status_tiket').value = "<?php echo $_POST['id_status_tiket'];?>";
                      </script>  
                  </div>
                  <div class="col-md-12 form-group">
                      <label>Catatan</label> <label for="catatan" class="error" style="color: red;"></label>
                      <textarea class="form-control" id="catatan" name="catatan" rows="9" placeholder="Catatan"></textarea>
                  </div>
                  <div class='col-md-12 form-group'>
                      <label>Lampiran</label> <label for="lampiran_update_tiket_penanganan" class="error" style="color: red;"></label>
                      <table class="table table-bordered" id="item-table">
                        <thead>
                          <tr>
                            <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"> Tambah Lampiran</i></button></th>
                          </tr>
                        </thead>
                         <tbody>
                           <tr>
                              <td style="width: 50%;" colspan="1">
                                  <input class="form-control" rows="3" 
                                  name="lampiran_update_tiket_penanganan[]" 
                                  id="lampiran_update_tiket_penanganan" type="file"></input> 
                                  <label style="color: red;"><u>lampiran format: .jpeg|.jpg|.png</u></label>
                              </td>
                           </tr>
                         </tbody>
                      </table>
                  </div>
                  <!-- Button -->
                  <div class="col-sm-12">
                      <div class="col-sm-6 form-group">
                        <input type="hidden" id="diubah_oleh" name="diubah_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" />                    
                          <input type="hidden" name="id_trans_tiket" value="<?php echo $id_trans_tiket; ?>" />

                          <!-- Untuk Kirim Ke Email Klien -->
                          <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" />
                          <input type="hidden" name="email_admin" value="<?php echo $email_admin; ?>" />
                          <!-- Untuk Kirim Ke Email Klien -->
                          
                          <!-- Insert NO Tiket Ke Riwayat -->
                          <input type="hidden" name="no_tiket" value="<?php echo $no_tiket; ?>" />
                          <!-- Insert NO Tiket Ke Riwayat -->

                          <button type="submit" class="btn btn-danger"><i class="fa fa-edit"></i> <?php echo $kirim ?>
                          </button> 
                          <a href="<?php echo site_url('List_tiket_ongoing') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali
                          </a>
                      </div>
                  </div>
                  <!-- Button -->
                <?php }else{ ?>
                   <?php echo "Tidak ada penganganan tiket" ?>
                <?php } ?>
              </div>
            </div>
            </form>
          <!-- Form -->
         </div>
    </div>
  </section>
</div>
<script src="<?php echo base_url('assets/validate_js/jquery.validate.js') ?>"></script>
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
<script type="text/javascript">
  $(document).ready(function(){  
      $("select[name='id_status_tiket']").select2({
            placeholder: "-- silahkan pilih --",
            language: {
                noResults: function (params) {
                  return "data tidak tersedia.";
                }
            }
      });
      $("select[name='id_klasifikasi']").select2({
          placeholder: "-- silahkan pilih --",
          language: {
              noResults: function (params) {
                return "data tidak tersedia.";
              }
          }
      });
      // $("select[name='id_klasifikasi']").select2({
      //     placeholder: "-- silahkan pilih --",
      //     language: {
      //         noResults: function (params) {
      //         return "data tidak tersedia.";
      //         },
      //         searching: function() {
      //             return "Mencari...";
      //         }
      //     },
      //     ajax: { 
      //        url: '<?php echo  base_url() ?>index.php/List_tiket_ongoing/cari_klasifikasi',
      //        type: "post",
      //        dataType: 'json',
      //        delay: 1000,
      //        data: function (params){
      //           return {
      //             searchTerm: params.term, // search term
      //           };
      //        },
      //        processResults: function (response) {
      //           return {
      //              results: response
      //           };
      //        },
      //        cache: true
      //      }
      // });
      $("select[name='id_penyebab']").select2({
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
             url: '<?php echo  base_url() ?>index.php/List_tiket_ongoing/cari_penyebab_insiden',
             type: "post",
             dataType: 'json',
             delay: 1000,
             data: function (params) {
                return {
                  searchTerm: params.term // search term
                };
             },
             processResults: function (response) {
                return {
                   results: response
                };
             },
             cache: true
           }
      });
      $("select[name='id_item_klasifikasi']").select2({
          placeholder: "-- silahkan pilih --",
          language: {
              noResults: function (params) {
                return "data tidak tersedia.";
              }
          }
      });
  });

  $(document).ready(function(){  
      // Select Dropdown User Level Penerima Tiket
      $("select[name='id_klasifikasi']").on('change',function(){
          var id=$(this).val();
          $.ajax({
              url : "<?php echo base_url();?>index.php/List_tiket_ongoing/pilih_klasifikasi",
              method : "POST",
              data : {id: id},
              async :false,
              dataType : 'json',
              success: function(data){
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value="'+data[i].id_item_klasifikasi+'">'+data[i].nama_item_klasifikasi+'</option>';
                  }
                  $("select[name='id_item_klasifikasi']").html(html);
              }
          });
      });
      // // Triger Klasifikasi & Item Klasifikasi
        if($("select[name='id_klasifikasi']").val() != '0') {
            $("select[name='id_klasifikasi']").trigger('change');
             // alert($("select[name='id_agency']").val());
        }
  });

  $(document).ready(function(){ 
    $('#btn-save').on('click',function(){
            var nama_penyebab=$('#nama_penyebab').val();
            if (nama_penyebab == "") {
                document.getElementById("err_penyebab").innerHTML = "Nama Penyebab wajib diisi.";
            } else {
                document.getElementById("err_penyebab").innerHTML = "";
            }
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/List_tiket_ongoing/simpan_data_penyebab')?>",
                dataType : "JSON",
                data : {nama_penyebab:nama_penyebab},
                success: function(XHR, status, response){
                     alert('Berhasil Menambahkan Penyebab Insiden / Root Cause');
                      $('#nama_penyebab').hide();
                      $('#btn-save').hide();
                },
                error: function (XHR, status, response) {
                    alert('Gagal Menambahkan');
                    // window.location.reload();
                }
            });
            return false;
        });
  });
  // Validasi Jquery
  $(document).ready(function(){
      $('#validasi').validate({
          rules: {
              id_status_tiket: {
                  required : true,
              },
              id_klasifikasi: {
                  required : true,
              },
              id_item_klasifikasi: {
                  required : true,
              },
              id_penyebab: {
                  required : true,
              },
              catatan: {
                  required : true,
              }
          },
          messages: {
              id_status_tiket: {
                 required : "Wajib di isi",
              },
              id_klasifikasi: {
                  required : "Wajib di isi",
              },
              id_item_klasifikasi: {
                  required : "Wajib di isi",
              },
              id_penyebab: {
                  required : "Wajib di isi",
              },
              catatan: {
                  required : "Wajib di isi",
              }
          }
      });
  });
  // UPLOAD LAMPIRAN UPDATE TIKET PENANGANAN
  $(document).ready(function(){   
     $('#add_row').click(function(){ 
         var i=1; 
         i++;  
         var html ='';
         html +='<tr id="row'+i+'"><td colspan="1">';
         html +='<tr><td><input class="form-control" rows="3" name="lampiran_update_tiket_penanganan[]" id="lampiran_update_tiket_penanganan" type="file"><?php echo $lampiran_update_tiket_penanganan; ?></input><label style="color: red;"><u>lampiran format: .jpeg|.jpg|.png</u></label></td>';
         $('#item-table').append(html);
      }); 
      $(document).on('click', '.btn_remove', function(){  
         var button_id = $(this).attr("id");   
         $('#row'+button_id+'').remove();  
      }); 
  });
</script>