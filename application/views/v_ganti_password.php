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

    <div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Ganti Kata Sandi</h3>
    </div>

    <form action="<?= base_url('ganti_password/ubah_password'); ?>" method="POST">
        <div class="box-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Kata Sandi Baru</label>
                    <input type="password" id="password" name="pw_baru" class="form-control" data-toggle="password" placeholder="Masukan Kata Sandi Baru">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ulangi Kata Sandi Baru</label>
                    <input type="password" id="password" name="cpw_baru" class="form-control" data-toggle="password" placeholder="Ulangi Kata Sandi Baru">
                </div>
            </div>
        </div>
       <button type="submit" name="submit" class="btn btn-primary" value="Ganti Password">Ubah</button>
    </form>
    </section>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script type="text/javascript">
    $("#pw_baru").password('toggle');
    $("#cpw_baru").password('toggle');
</script>