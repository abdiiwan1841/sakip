@include('header_admin');

        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Users</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>User Edit</span></li>
                            </ol>
                    
                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                        </div>
                    </header>

                    <!-- start: page -->
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                </div>
                        
                                <h2 class="panel-title">User Edit</h2>
                            </header>
                            <div class="panel-body">
                           <div class="wizard-tabs" style="float: left !important;">
                                   
                            </div>

                            {{Form::open(array('url' => 'user_update','method' => 'post'))}}
                            {{csrf_field()}}
                                        <fieldset>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                            <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username">Name</label>
                                            <div class="col-sm-6">
                                            {{ Form::text('name',$res->name, array('class' => 'form-control', 'placeholder' => 'Name','disabled' => 'disabled')) }}

                                             {{ Form::hidden('id_user',$res->id, array('class' => 'form-control', 'placeholder' => 'Name')) }}
                                            </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="col-md-12">
                                            <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username">Email</label>
                                            <div class="col-sm-6">
                                            {{ Form::text('email',$res->email, array('class' => 'form-control', 'placeholder' => 'Email','disabled' => 'disabled')) }}
                                            </div>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <div class="col-md-12">
                                            <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username">Grup Users</label>
                                            <div class="col-sm-6">
                                            <select class="form-control" name="grup">
                                                @foreach($grup as $val)
                                                    <option @if($val->id_jenis_user == $res->id_jenis_user) selected="selected" @endif value="{{$val->id_jenis_user}}">{{$val->nama_jenis_user}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-12">
                                            <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username"></label>
                                            <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                          <br>
                                            <br>
                                      </fieldset>


                            {{Form::close()}}
                            
                            </div>
                       </section>
    </section>
    <script type="text/javascript">
        $('#example1').DataTable();
    </script>

@include('footer_admin');