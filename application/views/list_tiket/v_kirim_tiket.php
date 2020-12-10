<div class="content-wrapper">
  <section class="content">
  	<div class="box-body">
  		<div class="box box-primary box-solid">
          <div class="box-header">
              <h3 class="box-title">Kirim Tiket</h3>
          </div>
          <!-- From -->
          	<form action="<?php echo $action; ?>" method="POST" id="validasi">
            <div class="box-body">
	          	<div class="row">
	          		<div class='col-md-12 form-group'>
		                <label>Kirim Tiket Ke</label> <label for="id_user_level" class="error" style="color: red;"></label>
		                <select name="id_user_level" id="id_user_level" class="form-control select2" required="">

		                </select>
		                <script type="text/javascript">
                                document.getElementById('id_user_level').value = "<?php echo $_POST['keluhan'];?>";
                        </script>
		            </div>
		            <br>
		            <!-- Validasi Error -->
				  	<?php echo validation_errors('<div style="color:#fc0f03;font-size: 20px;"><p>','</p></div>'); ?> 
				  	<!-- Validais Error -->
		            <div class='col-md-12 form-group'>
		                <label>Pilih Penerima</label> <label for="penerima_tiket" class="error" style="color: red;"></label>
		                <select name="penerima_tiket" class="form-control select2" id="penerima_tiket" required="">
		                </select>
		                <script type="text/javascript">
                            document.getElementById('penerima_tiket').value = "<?php echo $_POST['penerima_tiket'];?>";
                        </script>
		            </div>
		            <!-- Validasi Error -->
				  	<?php echo validation_errors('<div style="color:#fc0f03;font-size: 20px;"><p>','</p></div>'); ?> 
				  	<!-- Validais Error -->
		            <!-- Button -->
				    <div class="col-sm-12">
				        <div class="col-sm-6 form-group">
				            <input type="hidden" name="id_trans_tiket" value="<?php echo $id_trans_tiket; ?>" />
				            <!-- Insert NO Tiket Ke Riwayat -->
				            <input type="hidden" name="no_tiket" value="<?php echo $no_tiket; ?>" />
				            <!-- Insert NO Tiket Ke Riwayat -->
				            <button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane"></i> <?php echo $kirim ?>
				            </button> 
				            <a href="<?php echo site_url('List_tiket_ongoing') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali
				            </a>
				        </div>
				    </div>
				    <!-- Button -->
	          	</div>
            </div>
      	    </form>
          <!-- Form -->
         </div>
  	</div>
  </section>
</div>
<script src="<?php echo base_url('assets/validate_js/jquery.validate.js') ?>"></script>  
<script type="text/javascript">
	$(document).ready(function(){  
        $("select[name='id_user_level']").select2({
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
               url: '<?= base_url() ?>index.php/List_tiket_ongoing/cari_user_handle',
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
	    $("select[name='penerima_tiket']").select2({
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
	    $("select[name='id_user_level']").on('change',function(){
	        var id=$(this).val();
	        $.ajax({
	            url : "<?php echo base_url();?>index.php/List_tiket_ongoing/get_level",
	            method : "POST",
	            data : {id: id},
	            async :false,
	            dataType : 'json',
	            success: function(data){
	                var html = '';
	                var i;
	                for(i=0; i<data.length; i++){
	                    html += '<option value="'+data[i].full_name+'">'+data[i].full_name+'</option>';
	                }
	                $("select[name='penerima_tiket']").html(html);
	            }
	        });
	    });
  	});
  	// Validasi Jquery
    $(document).ready(function(){
        $('#validasi').validate({
            rules: {
                id_user_level: {
                    required : true,
                },
                penerima_tiket: {
                    required : true,
                }
            },
            messages: {
                id_user_level: {
                   required : "Wajib di isi",
                },
                penerima_tiket: {
                   required : "Wajib di isi",
                }
            }
        });
    });
</script>