@include('header')

<section>
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="batch-patners" style="margin-top: 0px">
                    <div class="label-patners">
                        Registrasi User
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="{{url('regis')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Username:</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" id="usename" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" required class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-8">
                                <input type="password" required class="form-control" id="pwd" name="password" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                                <button type="button" onclick="window.history.back()" class="btn btn-danger">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')