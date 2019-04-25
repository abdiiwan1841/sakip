@include('header')

<section class="bilboard"> 
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active ">
                                    <img src="{{url('assets/images/bg.jpg')}}" alt="Chania" style="width: 110%">
                                    <div class="carousel-caption">
                                        <h3>INVESTASI</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{url('assets/images/bg1.jpg')}}" alt="Chicago" style="width: 110%">
                                    <div class="carousel-caption">
                                        <h3>PENGEMBANGAN USAHA</h3>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{url('assets/images/bg2.jpg')}}" alt="New York" style="width: 110%">
                                    <div class="carousel-caption">
                                        <h3>PERMODALAN </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="top: 163px">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next" style="top: 163px">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="batch-login">
                            <div class="label-login"></div>


                            @if(isset(Auth::user()->name))

                                <div class="col-md-12">
                                    <br>
                                    <br>

                                    <b>{{ Auth::user()->name }}</b><br>
                                    <a href="{{url('/dashboard')}}">Dashboard</a><br>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>

                            @else

                                {{ Form::open(array('url' => '/login','method' => 'POST','class' => 'form-login')) }}
                                {{ csrf_field() }}
                               <br>
                                <center>
                                    @if($errors->has('email'))
                                        <span class="help-block" style="color: red">
											 Email dan Password Salah Atau Belum Melakukan Konfirmasi Email
										</span>
                                    @endif
                                </center>
                                <div class="col-md-12 xcv">Email</div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-2"></div>

                                <div class="col-md-12 xcv" style="margin-top: 5px;">Password</div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-12 xcv" style="margin-top: 5px;">

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">

                                        <button class="btn-login" type="submit">LOGIN</button>
                                        <br>

                                        <p class="forgot"><a href="">Lupa Password ?</a></p>


                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <p class="forgot">Belum mempunyai Akun ? <a href="{{url('signup')}}"> <i> Sign
                                                    Up </i> </a></p>
                                    </div>
                                </div>
                                {{Form::close()}}

                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="promotion">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12 promo">
                    <h4>LAYANAN KAMI</h4>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="promotion">

    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="margin-top: 15px;">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">INVESTASI</div>
                            <div class="panel-body">
                                  <img src="{{url('assets/images/bg.jpg')}}" alt="Chania" style="width: 100%; margin-bottom: 10px;">
                                 <br>
                                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.  </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px;">

                    <div class="panel panel-primary">
                        <div class="panel-heading">PENGEMBANGAN USAHA</div>
                        <div class="panel-body">
                            <img src="{{url('assets/images/bg1.jpg')}}" alt="Chicago" style="width: 100%; height:153px;  margin-bottom: 10px">
                            <br>
                            <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco ullamco laboris nisi ut .</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-4" style="margin-top: 15px;">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">PERMODALAN</div>
                            <div class="panel-body">
                                <img src="{{url('assets/images/bg2.jpg')}}" alt="New York" style="width: 100%; height: 153px; margin-bottom: 10px;">
                                <br>
                                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@include('footer')
