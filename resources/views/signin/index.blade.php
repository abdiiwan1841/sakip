<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{url('asset_admin/vendor/bootstrap/css/bootstrap.css')}}" />

		<link rel="stylesheet" href="{{url('asset_admin/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{url('asset_admin/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{url('asset_admin/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{url('asset_admin/stylesheets/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{url('asset_admin/stylesheets/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{url('asset_admin/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{url('asset_admin/vendor/modernizr/modernizr.js')}}"></script>

		<style type="text/css">
			.body-login{
				background: url('/asset_admin/images/bg.jpg');
			    /* Set a specific height */
			    min-height: 500px; 

			    /* Create the parallax scrolling effect */
			    background-attachment: fixed;
			    background-position: center;
			    background-repeat: no-repeat;
			    background-size: cover;
			}
			.img-logo{
				width: 90px;

			}

		</style>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-login">
	    <section class="title-page">
	    	<center><img class="img-logo" src="{{url('asset_admin/images/logo.png')}}">
	    	<p style="color: #333; font-family: arial;font-size: 24px; padding-top: 20px;">SISTEM AKUNTABILITAS KINERJA INSTANSI PEMERINTAH</p>
	    	<p><b style="font-size: 30px; color: #333;"> PUSHIDROSAL  </b></p>
	    	</center>
	    </section>
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
				{{-- 	<img src="assets/images/logo.png" height="54" alt="Porto Admin" /> --}}
				</a>

				<div class="panel panel-sign">
					{{-- <div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2>
					</div> --}}
					<div class="panel-body">
						{{ Form::open(array('url' => '/login','method' => 'POST','class' => 'form-login')) }}
                                {{ csrf_field() }}
							<div class="form-group mb-lg">
								<label>Email</label>
								<div class="input-group input-group-icon">
									<input name="email" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-envelope"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="pages-recover-password.html" class="pull-right">Lupa Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Ingat Saya</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Masuk</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Masuk</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							

							<p class="text-center">Belum Punya Akun? <a href="{{url('/register')}}">Buat Akun!</a>

						{{ Form::close()}}
					</div>
				</div>

				<p class="text-center mt-md mb-md" style="color: #333;">&copy; Copyright 2017. All Rights Reserved.</p>
			</div>
		</section>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{url('asset_admin/vendor/jquery/jquery.js')}}"></script>
		<script src="{{url('asset_admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{url('asset_admin/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{url('asset_admin/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{url('asset_admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{url('asset_admin/vendor/magnific-popup/magnific-popup.js')}}"></script>
		<script src="{{url('asset_admin/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{url('asset_admin/javascripts/theme.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{url('asset_admin/javascripts/theme.custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{url('asset_admin/javascripts/theme.init.js')}}"></script>

	</body>
</html>