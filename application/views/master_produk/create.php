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
	        <!-- Show Error Validate -->
	        <?php echo validation_errors('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>'); ?>
	        <!-- Show Error Validate -->
    		<div class="box box-primary box-solid">
		      	<div class="box-header with-border">
		          <h3 class="box-title">Input Data Produk</h3>
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
		                <label>Nama Produk</label>
		                <input type="text" class="form-control" name="nama_produk" id="nama_produk" 
		                placeholder="Masukan Nama Produk" value="<?php echo $nama_produk; ?>" /> 
		                <script type="text/javascript">
		                    document.getElementById('nama_produk').value = "<?php echo $_POST['nama_produk'];?>";
		                </script>
		            </div>
		          </div>
		          <!-- button -->
		          <div class="col-sm-6 form-group">
		              <input type="hidden" id="dibuat_oleh" name="dibuat_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" /> 
		              <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
		              <a href="<?php echo site_url('master_produk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
		             <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" />
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
            nama_produk: {
                required : true,
                // minlength: 5
            }
        },
    // set validation messages for the rules are set previously
        messages: {
            nama_produk: {
                required : "Nama Produk Wajib di isi",
                // minlength: "Nama Klien minimal harus terdiri dari 5 karakter"
            }
        }
    });
});
</script>