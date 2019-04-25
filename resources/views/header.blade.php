<!DOCTYPE html>
<html lang="en">
<head>

    <!-- head -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./../favicon.ico">

    <title></title>
    <!-- Stylesheets -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic' rel='stylesheet' type='text/css'>

  
    <link href="{{ url('assets/dist/css/bootstrap.css') }}" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    <link href="{{url('assets/assets/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <link href="{{url('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
 


    <!-- Owl Stylesheets -->
  
    <link rel="stylesheet" href="{{url('assets/owl/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/owl/owlcarousel/assets/owl.theme.default.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{url('assets/dist/css/style.css')}}" rel="stylesheet">

    <link href="{{ url('assets/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">

   



    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   
    <script src="{{url('assets/js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  

    <!-- Yeah i know js should not be in header. Its required for demos.-->

    <!-- javascript -->
   
    <script src="{{url('assets/owl/vendors/jquery.min.js')}}"></script>
    <script src="{{url('assets//owl/owlcarousel/owl.carousel.js')}}"></script>

    <script src="{{url('assets//dist/js/bootstrap.min.js')}}"></script>
   
    <script type="text/javascript" src="{{url('assets/datatables/media/js/jquery.dataTables.js')}}"></script>

     <script type="text/javascript" src="{{url('assets/datatables/media/js/dataTables.bootstrap.js')}}"></script>


</head>
<body>
<header>
    <div class="col-md-12">
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-6">
                            <img style="height:110px;width: 100%;margin-bottom: 20px;margin-left: -17px;" src="{{url('assets/dist/img/headerstop.png')}}">
                          
                        </div>
                         <div class="col-md-3"></div>
                         <div class="col-md-3">
                         <div class="row">
                                <br>
                               <div class="input-group pull-right">
                                <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="bg_search">Search</span>
                              </div>

                               <br>
                               <br>
                                <b><span class="date-view pull-right" id="main-date"></span></b>
                           </div>
                         </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-inverse" >
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div id="navbar" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav" class="menu" style="font-size: 12px;">
                               <li><a href="{{url('/')}}">BERANDA</a></li>
                               <li><a href="{{url('tentang_kami')}}">TENTANG KAMI</a></li>
                               <li><a href="{{url('layanan')}}">LAYANAN</a></li>
                               <li><a href="{{url('informasi')}}">INFORMASI</a></li>
                               <li><a href="{{url('faq')}}">FAQ</a></li>

                            </ul>

                            
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      window.onload = function(){
      var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum&#39;at','Sabtu'];
      var bulan =['Januari','Februari','Maret','April','Mei','juni','Juli','Agustus','September','Oktober','November','Desember'];

      var tanggal = new Date().getDate();
      var _hari = new Date().getDay();
      var _bulan = new Date().getMonth();
      var _tahun = new Date().getYear();

      var hari = hari[_hari];
      var bulan = bulan[_bulan];

      var tahun = (_tahun + 1000) ? _tahun + 1900:_tahun;

       document.getElementById("main-date").innerHTML = hari +', ' +tanggal +' '+ bulan +' '+ tahun;

    </script>
</header>