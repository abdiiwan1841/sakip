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
        <title>Buat Akun</title>

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
                {{--    <img src="assets/images/logo.png" height="54" alt="Porto Admin" /> --}}
                </a>

                <div class="panel panel-sign">
                    {{-- <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2>
                    </div> --}}
                    <div class="panel-body">
                        {{ Form::open(array('url' => '/regis','method' => 'POST','id' => 'form-register')) }}
                                {{ csrf_field() }}
                            <div class="form-group mb-lg">
                                <label>Nama Lengkap</label>
                                <input name="username" id="username" type="text" class="form-control input-lg" />
                            </div>

                            <div class="form-group mb-lg">
                                <label>E-mail </label>
                                <input name="email" id="email" type="email" class="form-control input-lg" />
                            </div>

                            <div class="form-group mb-none">
                                <div class="row">
                                    <div class="col-sm-6 mb-lg">
                                        <label>Password</label>
                                        <input id="password" name="password" type="password" class="form-control input-lg" />
                                    </div>
                                    <div class="col-sm-6 mb-lg">
                                        <label>Konfirmasi Password</label>
                                        <input id="password_confirm"  name="password_confirm" type="password" class="form-control input-lg" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input  id="AgreeTerms" name="agreeterms" type="checkbox"/>
                                        <label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Daftar</button>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Daftar</button>
                                </div>
                            </div>

                            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                <span>atau</span>
                            </span>

                          

                            <p class="text-center">Sudah Memiliki Akun? <a href="{{url('/login')}}">Login!</a>

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
        <script type="text/javascript">
            $('#form-register').submit(function () {
               var user = $('#username').val();
               var email = $('#email').val();
               var pass = $('#password').val();
               var pass_con = $("#password_confirm").val();


               if(pass != pass_con){
                  $('#password_confirm').css('border','1px solid red');
                  return false;
               }

               if(user.length < 4){
                 $('#username').css('border','1px solid red');
                 return false;
               }else if(email.length == 0){
                 $('#email').css('border','1px solid red');
                 return false;
               }else if(pass.length <= 5){
                 $('#password').css('border','1px solid red');
                 return false;
               }else if(pass_con.length == 0){
                 $('#password_confirm').css('border','1px solid red');
                 return false;
               }



               
               
            });


             $('#username').keyup(function () {
               $(this).css('border','1px solid #40C4FF')
             })

             $('#email').keyup(function () {
                $(this).css('border','1px solid #40C4FF')
             })

              $('#password').keyup(function () {
                $(this).css('border','1px solid #40C4FF')
             })

             $('#password_confirm').keyup(function () {
                $(this).css('border','1px solid #40C4FF')
             })
        </script>
    </body>
</html>