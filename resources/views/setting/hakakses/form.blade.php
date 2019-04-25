@include('header_admin');
 
        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Form Hak Akses</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Setting</span></li>
                                <li><span>Form Hak Akses</span></li>
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
                        
                                <h2 class="panel-title">Grup Users</h2>
                            </header>
                            <div class="panel-body">
                           <div class="wizard-tabs" style="float: left !important;">
                                    <ul class="nav wizard-steps">
                                        
                                         <li class="nav-item" style="width:230px; ">
                                          
                                        </li>
                                    </ul>
                                </div>

                            <br><br>
                        {!! Form::open(['url' => '/hakakses_insert', 'class' => 'form-horizontal', 'files' => true]) !!}

                        <input type="hidden" name="id_jenis_user" value="{{$iduser}}">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><center>No</center></th>
                                    <th><center>Nama Menu</center></th>
                                    <th><center>Url</center></th>
                                    <th><center>Ururtan</center></th>
                                    <th><center>Icon</center></th>
                                    <th width="15%"><center>Read</center></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($menu as $res)
                                @if($res->parent == 0 )


                                <?php 

                                $chek = DB::table('p_hakakses')->where('id_menu',$res->id_menu)->where('id_jenis_user',$iduser)->first();
                                ?>

                                    <tr>
                                        <td><center>{{ $no++ }}</center></td>
                                        <td><b>{{ $res->nama_menu }}</b>
                                       
                                        </td>
                                        <td>{{ $res->url }}</td>
                                        <td><center>{{ $res->urutan}}</center></td>
                                        <td>{{ $res->icon }}</td>
                                        <td><center>
                                            <input type="checkbox" name="id_menu[]" value="{{ $res->id_menu }}" @isset($chek->id_menu) @if($res->id_menu == $chek->id_menu) checked="checked"  @endif @endisset>
                                            </center>
                                        </td>
                                    </tr>
                                @endif
                               

                                @foreach($menu as $restwo)
                                @if($res->id_menu == $restwo->parent && $restwo->level == NULL )

                                <?php 

                                $chek = DB::table('p_hakakses')->where('id_menu',$restwo->id_menu)->where('id_jenis_user',$iduser)->first();
                                ?>
                                <tr>
                                    <td></td>
                                    <td>{{ $restwo->nama_menu }}


                                    </td>
                                    <td>{{ $restwo->url }}</td>
                                    <td><center>{{ $restwo->urutan }} </center></td>
                                    <td>{{ $restwo->ket }}</td>
                                    <td><center>
                                    <input type="checkbox" name="id_menu[]" value="{{ $restwo->id_menu }}" @isset($chek->id_menu) @if($restwo->id_menu == $chek->id_menu) checked="checked"  @endif @endisset>
                                    </center></td>
                                </tr>

                                     @foreach($menu as $restree)
                                         @if($restwo->id_menu == $restree->parent && $restree->level == 1)
                                        <tr>
                                            <td></td>
                                            <td style="padding-left: 45px;"> {{$restree->nama_menu}}</td>
                                             <td>{{ $restree->url }}</td>
                                             <td><center>{{ $restree->urutan }} </center></td>
                                             <td>{{ $restree->ket }}</td>
                                            <td>
                                                <center>
                                                <input type="checkbox" name="id_menu[]" value="{{ $restree->id_menu }}" @isset($chek->id_menu) @if($restree->id_menu == $chek->id_menu) checked="checked"  @endif @endisset>
                                                </center>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach 

                                 @endif
                                @endforeach 
                                
                                @endforeach                           
                            </tbody>
                        </table>

                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>

                         <br>
                          <br>
                        {!! Form::close() !!}
                            </div>
                       </section>
    </section>
    <script type="text/javascript">
        $('#example1').DataTable();
    </script>

@include('footer_admin');