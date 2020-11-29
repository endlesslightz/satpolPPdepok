<!DOCTYPE html>
    <html lang="en">
    <head>
    	<title>:: E-PATROL :: SATPOL PP DEPOK ::</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="<?php echo base_url('assets/login/images/logoepatrol.png'); ?>"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animate/animate.css'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animsition/css/animsition.min.css'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/select2/select2.min.css'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.cs'); ?>">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/util.css'); ?>">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main.css'); ?>">
    <!--===============================================================================================-->
    </head>
    <body style="background-color: #666666;">

    	<div class="limiter">
    		<div class="container-login100">
    			<div class="wrap-login100">
    				<form class="login100-form validate-form" method="post" action="<?php echo site_url('login/otentikasi'); ?>">
    					<span class="login100-form-title p-b-43">
                <img width="35%" src="<?php echo base_url('assets/login/images/logoepatrol.png'); ?>"><br>
    						<!-- Jurnal Sartika -->
                E-PATROL<br>
                SATUAN POLISI PAMONG PRAJA KOTA DEPOK
    					</span>


    					<div class="wrap-input100 validate-input" data-validate = "Masukkan username dengan benar">
    						<input class="input100" type="text" name="username">
    						<span class="focus-input100"></span>
    						<span class="label-input100">Username</span>
    					</div>


    					<div class="wrap-input100 validate-input" data-validate="Masukkan password dengan benar">
    						<input class="input100" type="password" name="password">
    						<span class="focus-input100"></span>
    						<span class="label-input100">Password</span>
    					</div>

    					<!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
    						<div class="contact100-form-checkbox">
    							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
    							<label class="label-checkbox100" for="ckb1">
    								Remember me
    							</label>
    						</div>

    						<div>
    							<a href="#" class="txt1">
    								Forgot Password?
    							</a>
    						</div>
    					</div> -->

              <center><span style="color:green; display: inline-block; height:18px;"><?php echo $this->session->flashdata('error'); ?></span></center>


    					<div class="container-login100-form-btn">
    						<button class="login100-form-btn">
    							Login
    						</button>
    					</div>


    				</form>

    				<div class="login100-more" style="background-image: url('<?php echo base_url('assets/login/images/pemkot-depok.jpg'); ?>');">
    				</div>
    			</div>
    		</div>
    	</div>

    <!--===============================================================================================-->
    	<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <!--===============================================================================================-->
    	<script src="<?php echo base_url('assets/login/vendor/animsition/js/animsition.min.js'); ?>"></script>
    <!--===============================================================================================-->
    	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js'); ?>"></script>
    	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!--===============================================================================================-->
    	<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js'); ?>"></script>
    <!--===============================================================================================-->
    	<script src="<?php echo base_url('assets/login/vendor/daterangepicker/moment.min.js'); ?>"></script>
    	<script src="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
    <!--===============================================================================================-->
    	<script src="<?php echo base_url('assets/login/vendor/countdowntime/countdowntime.js'); ?>"></script>
    <!--===============================================================================================-->
    	<script src="<?php echo base_url('assets/login/js/main.js'); ?>"></script>

    </body>
    </html>
