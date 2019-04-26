@include('header_admin');
<?php 
if(!empty($res->name)){
 $name = $res->name;
 $password = $res->password_real;
 $email = $res->email;
 $id_group = $res->id_jenis_user;
 $id_satker = $res->id_satker;
}else{
 $name = "";
 $password = "";
 $email = "";
 $id_group = "";
 $id_satker = "";
}
?>


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
        <li><span>User </span></li>
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

      <h2 class="panel-title">User </h2>
    </header>
    <div class="panel-body">
     <div class="box">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            {{-- <div class="box-header">
            </div> --}}
            <div class="box-divider m-0"></div>
            <div class="box-header">

              {{Form::open(['url' => $url,'method' => 'post'])}}
              <fieldset>
               <div class="form-group">
                <div class="col-md-12">
                  <br>
                  <div class="form-group row"> <?php // echo $url;die(); ?>
                    {!!Form::label('name','Name',['class' => 'col-sm-2 col-form-label '])!!}
                    <div class="col-sm-4">
                      {{ csrf_field() }}

                      {!! Form::text('name',$name, ['class' => 'form-control']) !!}

                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="form-group row">
                    {!!Form::label('email','Email',['class' => 'col-sm-2 col-form-label '])!!}
                    <div class="col-sm-4">


                      {!! Form::text('email',$email, ['class' => 'form-control']) !!}

                    </div>

                  </div>
                </div></div><div class="form-group">

                  <div class="col-md-12">
                    <div class="form-group row">
                      {!!Form::label('password','Password',['class' => 'col-sm-2 col-form-label '])!!}
                      <div class="col-sm-4">


                       <input type="password" name="password" class="form-control" value="{{$password}}">

                     </div>

                   </div>
                 </div></div><div class="form-group">


                   <div class="col-md-12">
                    <div class="form-group row">
                      {!!Form::label('password_confirm','Confirm Password',['class' => 'col-sm-2 col-form-label '])!!}
                      <div class="col-sm-4">
                        <input type="password" name="password_confirm" class="form-control" value="{{$password}}">
                      </div>

                    </div>
                  </div></div><div class="form-group">

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!!Form::label('group','Group',['class' => 'col-sm-2 col-form-label '])!!}
                        <div class="col-sm-4">

                          <select class="form-control" name="id_group">
                            @foreach($group as $res)

                            <option @if($id_group == $res->id_jenis_user) selected="selected"  @endif value="{{$res->id_jenis_user}}">{{$res->nama_jenis_user}}</option>

                            @endforeach
                          </select>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!!Form::label('satker','Satker',['class' => 'col-sm-2 col-form-label '])!!}
                        <div class="col-sm-4">

                          <select class="form-control" name="id_satker">
						  <option value="0">-- Pilih Satker --</option>
                            @foreach($satker as $res)

                            <option @if($id_satker == $res->id_jenis_satker) selected="selected"  @endif value="{{$res->id_jenis_satker}}">{{$res->nama_jenis_satker}}</option>

                            @endforeach
                          </select>
                          <br>
                          {!!Form::submit(' Simpan.',['class' => 'btn btn-dark'])!!}
                        </div>

                      </div>
                    </div>
                  </div>

                </fieldset>
                {{Form::close()}}

              </div>
              <div class="box-body">






              </div>
            </div>


            <div class="box">
              {{-- <div class="box-header">
              </div> --}}
              <div class="box-divider m-0"></div>

              <div class="box-body">

               <div class="col-md-12">
                <br>
                <div class="table-responsive">

                  <table id="datatable" class="table  table-bordered table-striped" data-plugin="dataTable">
                    <thead class="bg-success text-white">
                      <tr>
                        <th width="50">No</th>
                        <th>Group</th>
                        <th>Name</th>
						<th>Email</th>
                        <th><center>Action</center></th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($user as $no => $res)

                      <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$res->nama_jenis_user}}</td>
                        <td>{{$res->name}}</td>
						<td>{{$res->email}}</td>
                        <td><center>
                          <div class="btn-group">
                            <a href="{{url('/user_edit/'.$res->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit text-white"></i></a>

                            <a href="{{url('/user_delete/'.$res->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash text-white"></i></a>
                          </div>
                        </center></td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </section>
      </section>
      <script type="text/javascript">
        $('#example1').DataTable();
      </script>

      @include('footer_admin');