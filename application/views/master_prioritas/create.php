<div class="content-wrapper">
    <section class="content">
    	<div class="box-body">
    		<?php if($this->session->flashdata('success')): ?>
	            <div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	                    <?php echo $this->session->flashdata('success');?>
	            </div>
	        <?php endif; ?>
	        <?php echo validation_errors('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>'); ?>  
    		<div class="box box-primary box-solid">
		      	<div class="box-header with-border">
		          <h3 class="box-title">Input Data Prioritas</h3>
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
		                <label>Nama Prioritas</label>
		                <input type="text" class="form-control" name="nama_prioritas" id="nama_prioritas" 
		                placeholder="Masukan Nama Prioritas" value="<?php echo $nama_prioritas; ?>" /> 
		                <script type="text/javascript">
		                    document.getElementById('nama_prioritas').value = "<?php echo $_POST['nama_prioritas'];?>";
		                </script>
		            </div>
		            <div class='col-md-12 form-group'>
		                <label>Deksripsi</label>
		                <input type="text" class="form-control" name="deskripsi" id="deskripsi" 
		                placeholder="Masukan Nama deskripsi" value="<?php echo $deskripsi; ?>" /> 
		                <script type="text/javascript">
		                    document.getElementById('deskripsi').value = "<?php echo $_POST['deskripsi'];?>";
		                </script> 
		            </div>
		            <div class='col-md-12 form-group'>
		                <label>Durasi Waktu</label>
		                <input type="text" class="form-control" name="durasi_waktu" id="durasi_waktu" 
		                placeholder="Masukan Durasi Waktu" value="<?php echo $durasi_waktu; ?>" /> 
		                <script type="text/javascript">
		                    document.getElementById('durasi_waktu').value = "<?php echo $_POST['durasi_waktu'];?>";
		                </script> 
		            </div>
		          </div>
		          <!-- button -->
		          <div class="col-sm-6 form-group">
		              <input type="hidden" id="dibuat_oleh" name="dibuat_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" /> 
		              <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
		              <a href="<?php echo site_url('master_prioritas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
		             <input type="hidden" name="id_prioritas" value="<?php echo $id_prioritas; ?>" />
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
        $(document).ready(function(){
        // include the validation for the form function comes with this plugin
            $('#validasi').validate({
            // set validation rules for input fields
                rules: {
                    nama_prioritas: {
                        required : true,
                        // minlength: 5
                    },
                    deskripsi: {
                        required : true,
                        // minlength: 5
                    }
                },

            // set validation messages for the rules are set previously
                messages: {
                    nama_prioritas: {
                        required : "Nama Prioritas Wajib di isi",
                        // minlength: "Nama Klien minimal harus terdiri dari 5 karakter"
                    },
                    deskripsi: {
                        required : "Deskripsi Wajib di isi",
                        // minlength: "Nama Klien minimal harus terdiri dari 5 karakter"
                    }
                }
            });
        });
</script>