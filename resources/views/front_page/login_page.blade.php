@include('v_header_front')
<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="{{ url('front_page') }}">Home</a></li>
									<li class="active">Pages</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h1>Login</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-12">

							<div class="featured-boxes">
								<div class="row">
									<div class="col-sm-6">
										<div class="featured-box featured-box-primary align-left mt-xlg">
											<div class="box-content">
												<h4 class="heading-primary text-uppercase mb-md">Sign In</h4>
												<form action="/" id="frmSignIn" method="post">
													<div class="row">
														<div class="form-group">
															<div class="col-md-12">
																<label>Usernames</label>
																<input type="text" value="" class="form-control input-lg" placeholder="Username">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-md-12">
																<a class="pull-right" href="#">(Lupa Password?)</a>
																<label>Password</label>
																<input type="password" value="" class="form-control input-lg" placeholder="Password">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<span class="remember-box checkbox">
																<label for="rememberme">
																	<input type="checkbox" id="rememberme" name="rememberme">Ingat Saya
																</label>
															</span>
														</div>
														<div class="col-md-6">
															<input type="submit" value="Login" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="featured-box featured-box-primary align-left mt-xlg">
											<div class="box-content">
												<h4 class="heading-primary text-uppercase mb-md">Register Akun</h4>
												<form action="/" id="frmSignUp" method="post">
													<div class="row">
														<div class="form-group">
															<div class="col-md-12">
																<label>Username</label>
																<input type="text" value="" class="form-control input-lg" placeholder="Username">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-md-6">
																<label>Password</label>
																<input type="password" value="" class="form-control input-lg">
															</div>
															<div class="col-md-6">
																<label>Re-enter Password</label>
																<input type="password" value="" class="form-control input-lg">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<input type="submit" value="Register" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

			</div>
@include('v_footer_front')