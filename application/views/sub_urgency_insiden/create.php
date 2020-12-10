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
    		<div class="box box-primary box-solid">
		      	<div class="box-header with-border">
		          <h3 class="box-title">Input Sub Urgency Insiden</h3>
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
		                <label>Dampak</label>
		                <?php echo cmb_dinamis ('id_dampak', 'master_dampak', 'nama_dampak', 'id_dampak', $id_dampak) ?>  
		                <script type="text/javascript">
		                    document.getElementById('id_dampak').value = "<?php echo $_POST['id_dampak'];?>";
		                </script> 
		                <?php echo validation_errors('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>'); ?>  
		            </div>
		          	<div class='col-md-12 form-group'>
		                <label>Urgency</label>
		                <?php echo cmb_dinamis ('id_urgency', 'master_urgency', 'nama_urgency', 'id_urgency', 
		                $id_urgency) ?>  
		                <script type="text/javascript">
		                    document.getElementById('id_urgency').value = "<?php echo $_POST['id_urgency'];?>";
		                </script> 
		                <?php echo validation_errors('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>'); ?>  
		            </div>
		            <div class='col-md-12 form-group'>
		                <label>Prioritas</label>
		                <?php echo cmb_dinamis ('id_prioritas', 'master_prioritas', 'nama_prioritas', 'id_prioritas', 
		                $id_prioritas) ?>  
		                <script type="text/javascript">
		                    document.getElementById('id_prioritas').value = "<?php echo $_POST['id_prioritas'];?>";
		                </script> 
		                <?php echo validation_errors('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>'); ?>  
		            </div>
		          </div>
		          <!-- button -->
		          <div class="col-sm-6 form-group">
		              <input type="hidden" id="dibuat_oleh" name="dibuat_oleh" value="<?php echo $this->session->userdata('full_name'); ?>" /> 
		              <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
		              <a href="<?php echo site_url('sub_urgency_insiden') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
		             <input type="hidden" name="id_sub_urgency_insiden" value="<?php echo $id_sub_urgency_insiden; ?>" />
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
  	$(function(){
	    $("select[name='id_dampak']").select2({
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
	         url: '<?php echo  base_url() ?>index.php/Sub_urgency_insiden/cari_dampak',
	         type: "POST",
	         dataType: 'json',
	         delay: 250,
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

	    $("select[name='id_urgency']").select2({
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
	         url: '<?php echo  base_url() ?>index.php/Sub_urgency_insiden/cari_urgency',
	         type: "POST",
	         dataType: 'json',
	         delay: 250,
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

	    $("select[name='id_prioritas']").select2({
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
	         url: '<?php echo  base_url() ?>index.php/Sub_urgency_insiden/cari_prioritas',
	         type: "POST",
	         dataType: 'json',
	         delay: 250,
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

	});
</script>