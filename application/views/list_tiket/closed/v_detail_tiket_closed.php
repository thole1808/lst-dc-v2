<div class="content-wrapper">
<section class="content">
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 style="position: right;" class="box-title">No. Tiket : <u><?php echo $no_tiket; ?></u></h3>
    </div> 
    <div class="panel-body">
      <!-- Row 1 -->
      <div class="row">
        <!-- Riwayat Tiket -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-history"></i>
                <h3 class="box-title">Riwayat Tiket</h3>              
            </div>
            <div class="box-body">
              <?php
                  foreach ($tampil_riwayat_tiket as $row){
                ?> 
                <ul class="timeline" style="border: 2px;">
                  <li class="time-label">
                      <span class="bg-red">
                          <i class="fa fa-user">
                            <label><?php echo $row->dibuat_oleh;?></label> 
                            <label><?php echo $row->diubah_oleh;?></label>
                          </i>
                      </span>
                  </li>
                  <!-- timeline item -->
                  <li> 
                    <i class="fa fa-arrow-right"></i>
                    <div class="timeline-item">
                      <!-- jika riwayat Tanggal di ubah kosong tampilkan tgl_dibuat -->
                      <?php if ($row->tgl_diubah==''){ ?>
                        <span style="font-size: 14px;" class="time"><i class="fa fa-calendar"></i> 
                             <?php if($row->tgl_dibuat=='0000-00-00 00:00:00'){?>
                             <?php }else{?>
                                 <label style="font-weight:bold;"><?php echo $row->tgl_dibuat;?></label>
                             <?php }?>
                        </span>

                      <!-- jika riwayat Tanggal di buat kosong tampilkan tgl_diubah -->
                      <?php }elseif($tgl_dibuat==''){ ?>
                          <span style="font-size: 14px;" class="time"><i class="fa fa-calendar"></i> 
                             <?php if($row->tgl_diubah=='0000-00-00 00:00:00'){?>
                             <?php }else{?>
                                 <label style="font-style: bold;"><?php echo $row->tgl_diubah;?></label>
                             <?php }?>
                          </span>
                      <?php }else{ ?>
                        <label>Kosong</label>
                      <?php } ?>
                      
                      <!-- Aksi -->
                      <h3 class="timeline-header">
                        <label style="color:black;"><?php echo $row->aksi;?></label>
                        <?php if ($row->nama_level==''){ ?>
                          
                        <?php }else{ ?>
                          <i class="fa fa-arrow-right"></i>
                          <!-- Penerima Tiket -->
                          <label><u><?php echo $row->nama_level;?></u></label>
                          <!-- Penerima Tiket -->
                        <?php } ?>
                      </h3>
                      <!-- Aksi -->

                      <h3 class="timeline-header">
                        <input type="hidden" name="id_status_tiket" value="<?php echo $row->id_status_tiket; ?>" />
                        <?php 
                            $jumlah = $this->db->query("
                                SELECT nama_status FROM master_status_tiket WHERE id_status_tiket='".$row->id_status_tiket."';
                            "); 
                            $fetch = $jumlah->result_array();
                            foreach ($fetch as $data) {
                               $data['nama_status'];
                            ?>
                        <?php }?>
                        <b><?php echo $data['nama_status']; ?></b>
                        <label class="label biru-laut"><?php echo $row->nama_status;?></label>
                      </h3>
                    </div>  
                  </li>
                </ul>
              <?php }  ?>
            </div>
          </div>
        </div>  
        <!-- Riwayat Tiket -->
      </div>
      <!-- Row 1 -->

      <!-- Row 2 -->
      <div class="row">
        <!-- Layanan & Sub Layanan -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Layanan</h3>              
            </div>
            <div class="box-body">
              <div class="col-md-12 form-group">
                <label><u>Layanan</u></label> <label for="id_layanan" class="error" style="color: red;">
                </label>
                <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="<?php echo $nama_layanan; ?>" readonly="">
              </div>
              <div class="col-md-12 form-group">
                <label><u>Sub Layanan</u></label> <label for="id_item_layanan" class="error" style="color: red;">
                </label>
                <input type="text" class="form-control" id="nama_item_layanan" name="nama_item_layanan" value="<?php echo $nama_item_layanan; ?>" readonly="">
              </div>
            </div>
          </div>
        </div>  
        <!-- Layanan & Sub Layanan -->

        <!-- Klien -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Klien</h3>              
            </div>
            <div class="box-body">
              <div class="col-md-12 form-group">
                <label><u>Klien</u></label> <label for="id_klien" class="error" style="color: red;">
                </label>
                <input type="text" class="form-control" id="nama_klien" name="nama_klien" value="<?php echo $nama_klien; ?>" readonly="">
              </div>
              <div class="col-md-12 form-group">
                <label><u>Admin</u></label> <label for="id_admin" class="error" style="color: red;">
                </label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?php echo $nama_admin; ?>" readonly="">
              </div>
              <div class="col-md-12 form-group">
                <label><u>Email</u></label> <label for="email_admin" class="error" style="color: red;">
                </label>
                <input type="text" class="form-control" id="email_admin" name="email_admin" value="<?php echo $email_admin; ?>" readonly="">
              </div>
            </div>
          </div>
        </div>  
        <!-- Klien -->

      </div>
      <!-- Row 2 -->

      <!-- Row 3 -->
      <div class="row">
        <!-- Keluhan / Request & Lampiran-->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Keluhan / Request & Lampiran</h3>              
            </div>
            <!-- Box Body -->
            <div class="box-body">
                <!-- Lampiran Tiket Keluhan Masuk -->
                <?php 
                  foreach ($lampiran_tiket_masuk as $row){
                ?>
                <div class='col-md-4'>
                <label><u>Lampiran</u></label>
                    <br>
                    <style>
                    img.modal-img {
                      cursor: pointer;
                      transition: 0.3s;
                    }
                    img.modal-img:hover {
                      opacity: 0.7;
                    }
                    .img-modal {
                      display: none;
                      position: fixed;
                      z-index: 99999;
                      padding-top: 100px;
                      left: 0;
                      top: 0;
                      width: 100%;
                      height: 100%;
                      overflow: auto;
                      background-color: rgba(0,0,0,0.9);
                    }
                    .img-modal img {
                      margin: auto;
                      display: block;
                      width: 80%;
                      max-width: 700%;
                    }
                    .img-modal div {
                      margin: auto;
                      display: block;
                      width: 80%;
                      max-width: 700px;
                      text-align: center;
                      color: #ccc;
                      padding: 10px 0;
                      height: 150px;
                    }
                    .img-modal img, .img-modal div {
                      animation: zoom 0.6s;
                    }
                    .img-modal span {
                      position: absolute;
                      top: 15px;
                      right: 35px;
                      color: #f1f1f1;
                      font-size: 40px;
                      font-weight: bold;
                      transition: 0.3s;
                      cursor: pointer;
                    }
                    @media only screen and (max-width: 700px) {
                      .img-modal img {
                        width: 100%;
                      }
                    }
                    @keyframes zoom {
                      0% {
                        transform: scale(0);
                      }
                      100% {
                        transform: scale(1);
                      }
                    }
                    </style>
                    <img class="modal-img" src="<?php echo base_url();?>/assets/lampiran_tiket_keluhan_masuk/<?php echo $row->lampiran_tiket_keluhan_masuk;?>" style="width:200%;max-width:200px">
                </div>
                <?php } ?>
                <!-- Lampiran Tiket Keluhan Masuk -->
                <div class="col-md-12 form-group">
                  <label><u>Keluhan / Request</u></label> <label for="keluhan" class="error" style="color: red;">
                  </label>
                  <textarea class="form-control" rows="5" name="keluhan" id="keluhan" placeholder="Keluhan / Request" readonly=""><?php echo $keluhan; ?></textarea>  
                </div>
            </div>
            <!-- Box Body -->
          </div>
        </div>  
        <!-- Keluhan / Request & Lampiran-->

        <!-- Jenis Tiket -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Jenis Tiket</h3>              
            </div>
            <!-- Box Body -->
            <?php if ($nama_jenis_tiket=='Insiden'){?>
            <!-- Box Body -->
            <div class="box-body">
                <div class="col-md-12 form-group">
                  <label><u>Jenis Tiket</u></label> <label for="id_jenis_tiket" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_jenis_tiket" name="nama_jenis_tiket" value="<?php echo $nama_jenis_tiket; ?>" readonly="">
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Dampak</u></label> <label for="id_dampak" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_dampak" name="nama_dampak" value="<?php echo $nama_dampak; ?>" readonly="">
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Urgency</u></label> <label for="id_urgency" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_urgency" name="nama_urgency" value="<?php echo $nama_urgency; ?>" readonly="">
                </div>
                <?php if ($nama_prioritas== 'Prioritas 1'){ ?>
                    <div class="col-md-12 form-group">
                      <label><u>Prioritas</u></label> <label for="id_prioritas" class="error" style="color: red;">
                      </label>
                      <input style="background-color: red; color: white;" type="text" 
                      class="form-control" id="nama_prioritas" name="nama_prioritas" value="<?php echo $nama_prioritas; ?>" readonly="">
                    </div>
                    <div class="col-md-12 form-group">
                      <label><u>Deskripsi</u></label> <label for="deskripsi" class="error" style="color: red;">
                      </label>
                      <input style="background-color: red; color: white;" type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" readonly="">
                    </div>
                <?php }elseif($nama_prioritas=='Prioritas 2') {?>
                    <div class="col-md-12 form-group">
                      <label><u>Prioritas</u></label> <label for="id_prioritas" class="error" style="color: red;">
                      </label>
                      <input style="background-color: yellow; color: black;" type="text" 
                      class="form-control" id="nama_prioritas" name="nama_prioritas" value="<?php echo $nama_prioritas; ?>" readonly="">
                    </div>
                    <div class="col-md-12 form-group">
                      <label><u>Deskripsi</u></label> <label for="deskripsi" class="error" style="color: red;">
                      </label>
                      <input style="background-color: yellow; color: black;" type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" readonly="">
                    </div>
                <?php }else{?>
                    <div class="col-md-12 form-group">
                      <label><u>Prioritas</u></label> <label for="id_prioritas" class="error" style="color: red;">
                      </label>
                      <input type="text" class="form-control" id="nama_prioritas" name="nama_prioritas" value="<?php echo $nama_prioritas; ?>" readonly="">
                    </div>
                    <div class="col-md-12 form-group">
                      <label><u>Deskripsi</u></label> <label for="deskripsi" class="error" style="color: red;">
                      </label>
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" readonly="">
                    </div>
                <?php } ?>
            </div>
            <!-- Box Body -->
            <?php }elseif($nama_jenis_tiket == 'Insiden Keamanan Informasi'){ ?>
            <!-- Box Body -->
            <div class="box-body">
                <div class="col-md-12 form-group">
                  <label><u>Jenis Tiket</u></label> <label for="id_jenis_tiket" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_jenis_tiket" name="nama_jenis_tiket" value="<?php echo $nama_jenis_tiket; ?>" readonly="">
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Dampak</u></label> <label for="id_dampak" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_dampak" name="nama_dampak" value="<?php echo $nama_dampak; ?>" readonly="">
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Urgency</u></label> <label for="id_urgency" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_urgency" name="nama_urgency" value="<?php echo $nama_urgency; ?>" readonly="">
                </div>
                <?php if ($nama_prioritas== 'Prioritas 1'){ ?>
                    <div class="col-md-12 form-group">
                      <label><u>Prioritas</u></label> <label for="id_prioritas" class="error" style="color: red;">
                      </label>
                      <input style="background-color: red; color: white;" type="text" 
                      class="form-control" id="nama_prioritas" name="nama_prioritas" value="<?php echo $nama_prioritas; ?>" readonly="">
                    </div>
                    <div class="col-md-12 form-group">
                      <label><u>Deskripsi</u></label> <label for="deskripsi" class="error" style="color: red;">
                      </label>
                      <input style="background-color: red; color: white;" type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" readonly="">
                    </div>
                <?php }elseif($nama_prioritas=='Prioritas 2') {?>
                    <div class="col-md-12 form-group">
                      <label><u>Prioritas</u></label> <label for="id_prioritas" class="error" style="color: red;">
                      </label>
                      <input style="background-color: yellow; color: black;" type="text" 
                      class="form-control" id="nama_prioritas" name="nama_prioritas" value="<?php echo $nama_prioritas; ?>" readonly="">
                    </div>
                    <div class="col-md-12 form-group">
                      <label><u>Deskripsi</u></label> <label for="deskripsi" class="error" style="color: red;">
                      </label>
                      <input style="background-color: yellow; color: black;" type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" readonly="">
                    </div>
                <?php }else{?>
                    <div class="col-md-12 form-group">
                      <label><u>Prioritas</u></label> <label for="id_prioritas" class="error" style="color: red;">
                      </label>
                      <input type="text" class="form-control" id="nama_prioritas" name="nama_prioritas" value="<?php echo $nama_prioritas; ?>" readonly="">
                    </div>
                    <div class="col-md-12 form-group">
                      <label><u>Deskripsi</u></label> <label for="deskripsi" class="error" style="color: red;">
                      </label>
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" readonly="">
                    </div>
                <?php } ?>
            </div>
            <!-- Box Body -->
            <?php }elseif($nama_jenis_tiket == 'Permintaan Layanan' ) {?>
            <!-- Box Body -->
            <div class="box-body">
                <div class="col-md-12 form-group">
                  <label><u>Jenis Tiket</u></label> <label for="id_jenis_tiket" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_jenis_tiket" name="nama_jenis_tiket" value="<?php echo $nama_jenis_tiket; ?>" readonly="">
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Dampak</u></label> <label for="id_dampak" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_dampak" name="nama_dampak" value="<?php echo $nama_dampak; ?>" readonly="">
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Urgency</u></label> <label for="id_urgency" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_urgency" name="nama_urgency" value="<?php echo $nama_urgency; ?>" readonly="">
                </div>
            </div>
            <!-- Box Body -->
            <?php }else{ ?>
            <label>Tidak Ada Jenis Tiket</label>
        <?php } ?>
            <!-- Box Body -->
          </div>
        </div>  
        <!-- Jenis Tiket -->
      </div>
      <!-- Row 3 -->

      <!-- Row 4 -->
      <div class="row">
        
        <!-- Shift & Status Tiket-->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Shift & Status Tiket</h3>              
            </div>
            <div class="box-body">
              <div class="col-md-12 form-group">
                <label><u>Shift</u></label> <label for="id_shift" class="error" style="color: red;">
                </label>
                <input type="text" class="form-control" id="nama_shift" name="nama_shift" value="<?php echo $nama_shift; ?>" readonly="">
              </div>
              <div class="col-md-12 form-group">
                <label><u>Status</u></label> <label for="id_status_tiket" class="error" style="color: red;">
                </label>
                <input type="text" class="form-control" id="nama_status" name="nama_status" value="<?php echo $nama_status; ?>" readonly="">
              </div>
            </div>
          </div>
        </div>  
        <!-- Shift & Status Tiket-->

        <!-- Klasifikasi & Lampiran Tiket Penanganan -->
        <div class="col-md-6">
          <div class="box box-primary">
           <!--  <div class="box-header with-border">
                <i class="fa fa-history"></i>
                <h3 class="box-title">Shift & Status Tiket</h3>              
            </div> -->
            <div class="box-body">
              <!-- Jenis Tiket Service Request tidak di tampilkan Penyebab Insiden / Root Cause -->
              <?php if ($id_jenis_tiket=='JTK-041020-0002'){?>
                <div class="col-md-12 form-group">
                  <label><u>Klasifikasi Insiden / Service Request</u></label> <label for="id_klasifikasi" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_klasifikasi" name="nama_klasifikasi" value="<?php echo $nama_klasifikasi; ?>" readonly=""> 
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Sub Klasifikasi Insiden / Service Request</u></label> <label for="id_item_klasifikasi" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_item_klasifikasi" name="nama_item_klasifikasi" value="<?php echo $nama_item_klasifikasi; ?>" readonly=""> 
                </div>
              <!-- Jenis Tiket di luar Service Request tampilkan Penyebab Insiden / Root Cause -->
              <?php }else{?>
                <div class="col-md-12 form-group">
                  <label><u>Klasifikasi Insiden / Service Request</u></label> <label for="id_klasifikasi" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_klasifikasi" name="nama_klasifikasi" value="<?php echo $nama_klasifikasi; ?>" readonly=""> 
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Sub Klasifikasi Insiden / Service Request</u></label> <label for="id_item_klasifikasi" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_item_klasifikasi" name="nama_item_klasifikasi" value="<?php echo $nama_item_klasifikasi; ?>" readonly=""> 
                </div>
                <div class="col-md-12 form-group">
                  <label><u>Penyebab Insiden / Root Cause</u></label> <label for="id_penyebab" class="error" style="color: red;">
                  </label>
                  <input type="text" class="form-control" id="nama_penyebab" name="nama_penyebab" value="<?php echo $nama_penyebab; ?>" readonly=""> 
                </div>
              <?php } ?>
              
              <!-- Lampiran Tiket Keluhan Masuk -->
                <?php 
                  foreach ($lampiran_tiket_update as $row){
                ?>
                <div class='col-md-4'>
                <label><u>Lampiran</u></label>
                    <br>
                    <style>
                    img.modal-img {
                      cursor: pointer;
                      transition: 0.3s;
                    }
                    img.modal-img:hover {
                      opacity: 0.7;
                    }
                    .img-modal {
                      display: none;
                      position: fixed;
                      z-index: 99999;
                      padding-top: 100px;
                      left: 0;
                      top: 0;
                      width: 100%;
                      height: 100%;
                      overflow: auto;
                      background-color: rgba(0,0,0,0.9);
                    }
                    .img-modal img {
                      margin: auto;
                      display: block;
                      width: 80%;
                      max-width: 700%;
                    }
                    .img-modal div {
                      margin: auto;
                      display: block;
                      width: 80%;
                      max-width: 700px;
                      text-align: center;
                      color: #ccc;
                      padding: 10px 0;
                      height: 150px;
                    }
                    .img-modal img, .img-modal div {
                      animation: zoom 0.6s;
                    }
                    .img-modal span {
                      position: absolute;
                      top: 15px;
                      right: 35px;
                      color: #f1f1f1;
                      font-size: 40px;
                      font-weight: bold;
                      transition: 0.3s;
                      cursor: pointer;
                    }
                    @media only screen and (max-width: 700px) {
                      .img-modal img {
                        width: 100%;
                      }
                    }
                    @keyframes zoom {
                      0% {
                        transform: scale(0);
                      }
                      100% {
                        transform: scale(1);
                      }
                    }
                    </style>
                    <img class="modal-img" src="<?php echo base_url();?>/assets/lampiran_update_tiket_penanagan/<?php echo $row->lampiran_update_tiket_penanganan;?>" style="width:200%;max-width:200px">
                </div>
                <?php } ?>
              <!-- Lampiran Tiket Update-->

            </div>
          </div>
        </div>  
        <!-- Klasifikasi & Lampiran Tiket Penanganan -->

        <!-- Button -->
        <div class="col-md-12">
          <a href="<?php echo site_url('list_tiket_closed') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali
          </a>
        </div>
        <!-- Button -->

      </div>
      <!-- Row 4 -->
    </div>

  </section>


  </div>
</section>
</div>

<script type="text/javascript">
   $('img.modal-img').each(function() {
    var modal = $('<div class="img-modal"><span>&times;</span><img /><div></div></div>');
    modal.find('img').attr('src', $(this).attr('src'));
    if($(this).attr('alt'))
      modal.find('div').text($(this).attr('alt'));
    $(this).after(modal);
    modal = $(this).next();
    $(this).click(function(event) {
      modal.show(300);
      modal.find('span').show(0.3);
    });
    modal.find('span').click(function(event) {
      modal.hide(300);
    });
  });
  $(document).keyup(function(event) {
    if(event.which==27)
      $('.img-modal>span').click();
  });
</script>
