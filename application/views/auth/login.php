<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | LST-DC</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="assets/login/images/logo_lst.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<style type="text/css">
    .bg_image_login{
        background-attachment: fixed;
        background-size: cover;
        background-position:center;
        background-repeat:no-repeat;
        background-position: center center;
        background-image:url(assets/login/images/bg_login.jpg);
        color:red;
        font-family:Arial, Helvetica, sans-serif;
        width: 100%;
        height:100%;
        
        },
        .container-login100{

          width: 100%;
          height: auto;
      }
  </style>


  <body>
    <!-- Show Error Validate -->
    <?php echo validation_errors('<div style="color:#fc0f03;font-size: 16px;"><p>','</p></div>'); ?>
    <!-- Show Error Validate -->
    <div class="limiter">
        <div class="container-login100 bg_image_login responsive">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="validasi" 
                action="<?php echo base_url().'index.php/auth/ceklogin'?>" method="POST">
                    <span class="login100-form-title p-b-20">
                        Silahkan LogIn
                    </span>
                    <br>
                    <div class="wrap-input100 validate-input" data-validate="Email harus valid">
                        <input class="input100 input-lg" type="text" id="email" name="email">
                        <span class="focus-input100" data-placeholder="Masukkan Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100 input-lg" id="password" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Masukkan Password"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <?php echo $this->session->flashdata('not_active_user');?>
                        <?php echo $this->session->flashdata('failed');?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/validate_js/jquery.validate.js') ?>"></script>
    <script type="text/javascript">
        // wait untill the page is loaded completely
            $(document).ready(function(){
            // include the validation for the form function comes with this plugin
                $('#validasi').validate({
                // set validation rules for input fields
                    rules: {
                        email: {
                            required : true,
                        },
                        password: {
                            required : true,
                        }
                    },
                // set validation messages for the rules are set previously
                    messages: {
                        email: {
                            required : "Email Wajib di isi",
                            email: 'Email harus valid'
                        },
                        password: {
                            required : "Password Wajib di isi",
                        }
                    }

                });
            });
    </script>

</body>
</html>