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
    <!-- Informasi Succes & gagal -->

   <!--  <div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Ubah Profile</h3>
    </div> -->

    <form action="<?= base_url('ganti_profile/ubah_profile'); ?>" method="POST" enctype="multipart/form-data">
        
    <div class="box-body">
        
        <div class="row">
        <div class="col-md-4">
         <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>" class="profile-user-img img-responsive img-circle"
                     style="vertical-align: middle; width: 190px; height: 170px; border-radius: 500%;">
                <br>

                <center>
                    <p style="font-family:serif;"><?php echo $this->session->userdata('full_name'); ?></p>
                </center>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <div class="form-group">
                            <label>Ganti Foto Profil</label>
                            <div class="input-group">
                                <input class="form-control" type="file" name="images" id="images" placeholder="File"><?php echo $images; ?></input>
                                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                              </div>
                        </div>
                    </li>

                    <!-- <li class="list-group-item">
                        <div class="form-group">
                            <label>Ganti Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap">
                              </div>
                        </div>
                    </li> -->
                </ul>

                <center>
                  <button type="submit" class="btn btn-block btn-primary btn-sm">Ubah</button>
                </center>

            </div>
          </div>
         

        </div>
        </div>
    </div>
    </form>
    </section>
</div>