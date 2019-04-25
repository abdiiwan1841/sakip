@include('header_admin');

        <section role="main" class="content-body"> 
                    <header class="page-header">
                        <h2>Menu</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Setting</span></li>
                                <li><span>Menu</span></li>
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
                        
                                <h2 class="panel-title">Menu</h2>
                            </header>
                            <div class="panel-body">
                            <div class="wizard-tabs" style="float: left !important;">
                                    <ul class="nav wizard-steps">
                                        
                                         <li class="nav-item" style="width:230px; ">
                                            <a href="{{ url('create_menu') }}"  class="nav-link text-center" style="background-color:#007bff !important; color: #fff;">
                                               <i class="fa fa-plus-circle"></i> Buat Menu Baru
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <br>
                            <br>
                            <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><center>No</center></th>
                                    <th><center>Nama Menu</center></th>
                                    <th><center>Url</center></th>
                                    <th><center>Ururtan</center></th>
                                    <th><center>Icon</center></th>
                                    <th width="20%"><center>Aksi</center></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($menu as $res)
                                @if($res->parent == 0 )
                                    <tr>
                                        <td><center>{{ $no }}</center></td>
                                        <td><b>{{ $res->nama_menu }}</b></td>
                                        <td>{{ $res->url }}</td>
                                        <td><center>{{ $res->urutan}}</center></td>
                                        <td>{{ $res->icon }}</td>
                                        <td><center>
                                            <a href="{{url('/menu_edit/'.$res->id_menu)}}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>

                                            <a href="{{url('/menu_hapus/'.$res->id_menu)}}" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>

                                            <a href="{{url('/create_submenu/'.$res->id_menu)}}" class="btn btn-primary btn-xs" title="Tambah Submenu"><i class="fa fa-plus-circle"></i> Submenu</a>
                                            </center>
                                        </td>
                                    </tr>
                                @endif
                                <?php $no++; ?>

                                @foreach($menu as $restwo)
                                @if($res->id_menu == $restwo->parent && $restwo->level == NULL)
                                <tr>
                                    <td></td>
                                    <td>{{ $restwo->nama_menu }}</td>
                                    <td>{{ $restwo->url }}</td>
                                    <td><center>{{ $restwo->urutan }} </center></td>
                                    <td>{{ $restwo->ket }}</td>
                                    <td><center>
                                        <a href="{{url('/submenu_edit/'.$restwo->id_menu)}}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>

                                        <a href="{{url('/menu_hapus/'.$restwo->id_menu)}}" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>

                                         <a href="{{url('/create_submenu/'.$restwo->id_menu)}}" class="btn btn-primary btn-xs" title="Tambah Submenu"><i class="fa fa-plus-circle"></i> Submenu</a>
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
                                                    <a href="{{url('/submenu_edit/'.$restree->id_menu)}}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>

                                                    <a href="{{url('/menu_hapus/'.$restree->id_menu)}}" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>

                                                     <a href="{{url('/create_submenu/'.$restree->id_menu)}}" class="btn btn-primary btn-xs" title="Tambah Submenu" disabled><i class="fa fa-plus-circle" ></i> Submenu</a>
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
                            </div>
                        </section>
     </section>

     <script type="text/javascript">
         // $('#example').DataTable();
     </script>

     @include('footer_admin')