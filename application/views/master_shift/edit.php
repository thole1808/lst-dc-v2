<div class="content-wrapper">
    <section class="content">
      <div class="box-body">
        <?php echo validation_errors('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>'); ?>  
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Shift</h3>
            </div>
            <style type="text/css">
              .error {
                  color: #a94442;
                  border-color: #a94442;
                  margin-top: 5px;
              }
            </style>
            <form action="<?php echo $action; ?>" method="post" id="validasi">
              <div class="box-body">
                <div class="row">
                  <div class='col-md-12 form-group'>
                      <label>Nama Shift</label>
                      <input type="text" class="form-control" name="nama_shift" id="nama_shift" 
                      placeholder="Masukan Nama Shift" value="<?php echo $nama_shift; ?>" /> 
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Jam Masuk</label>
                    <div class="input-group clockpicker-masuk">
                        <input type="text" class="form-control" id="jam_masuk_shift" name="jam_masuk_shift" value="<?php echo $jam_masuk_shift; ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    <!-- ClockPicker Stylesheet -->
                    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/clockpicker/dist/bootstrap-clockpicker.min.css">
                    <script type="text/javascript" src="<?php echo base_url() ?>assets/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
                    <script type="text/javascript">
                      $('.clockpicker-masuk').clockpicker({
                          placement: 'bottom',
                          align: 'left',
                          donetext: 'Selesai'
                      });
                    </script>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Jam Keluar</label>
                    <div class="input-group clockpicker-keluar">
                        <input type="text" class="form-control" id="jam_keluar_shift" name="jam_keluar_shift" value="<?php echo $jam_keluar_shift; ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    <!-- ClockPicker Stylesheet -->
                    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/clockpicker/dist/bootstrap-clockpicker.min.css">
                    <script type="text/javascript" src="<?php echo base_url() ?>assets/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
                    <script type="text/javascript">
                      $('.clockpicker-keluar').clockpicker({
                          placement: 'bottom',
                          align: 'left',
                          donetext: 'Selesai'
                      });
                    </script>
                  </div>

                </div>
                <!-- button -->
                <div class="col-sm-6 form-group">
                    <input type="hidden" id="diubah_oleh" name="diubah_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" /> 
                    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                    <a href="<?php echo site_url('master_shift') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                   <input type="hidden" name="id_shift" value="<?php echo $id_shift; ?>" />
                </div>
                <!-- button -->
              </div>
            </form>

        </div>
      </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/validate_js/jquery.validate.js') ?>"></script>
<script type="text/javascript">
  // wait untill the page is loaded completely
  $.validator.addMethod("time24", function(value, element) {
    if (!/^\d{2}:\d{2}:\d{2}$/.test(value)) return false;
    var parts = value.split(':');
    if (parts[0] > 23 || parts[1] > 59 || parts[2] > 59) return false;
    return true;
  }, "Format waktu tidak valid.");
  $(document).ready(function(){
      // include the validation for the form function comes with this plugin
      $('#validasi').validate({
        // set validation rules for input fields
          rules: {
              nama_shift: {
                  required : true,
                  // minlength: 5
              },
              jam_masuk_shift: {
                  required : true,
                  time24: true,
                  // minlength: 5
              },
              jam_keluar_shift: {
                  required : true,
                  time24: true,
                  // minlength: 5
              }
          },
        // set validation messages for the rules are set previously
          messages: {
              nama_shift: {
                  required : "Nama Shift Wajib di isi",
                  // minlength: "Nama Klien minimal harus terdiri dari 5 karakter"
              },
              jam_masuk_shift: {
                  required : "Jam Masuk Shift Wajib di isi",
                  time24: "Format waktu tidak valid."
                  // minlength: "Nama Klien minimal harus terdiri dari 5 karakter"
              },
              jam_keluar_shift: {
                  required : "Jam Keluar Shift Wajib di isi",
                  time24: "Format waktu tidak valid."
                  // minlength: "Nama Klien minimal harus terdiri dari 5 karakter"
              }
          }
      });
  });
</script>