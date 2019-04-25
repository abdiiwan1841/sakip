@include('header_admin');

        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Hak Akses</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Setting</span></li>
                                <li><span>Hak Akses</span></li>
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

                           
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><center>No</center></th>
                                    <th><center>Nama Grup User</center></th>
                                    <th><center>Keterangan</center></th>
                                    <th width="15%"><center>Aksi</center></th> 
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                            @foreach($allgrup as $res)

                                <tr>
                                    <td>{{$no }}</td>
                                    <td>{{ $res->nama_jenis_user }}</td>
                                    <td>{{ $res->keterangan }}</td>
                                    <td>
                                        <center>
                                        <a href="{{url('/create_hakakses/'.$res->id_jenis_user)}}" class="btn btn-warning" title="Hakakses"><i class="fa fa-edit"></i></a>
                                        </center>
                                    </td>
                                </tr>
                            <?php $no++; ?>
                            @endforeach
                            </tbody>
                            </table>
                            </div>
                       </section>
    </section>
    <script type="text/javascript">
        $('#example1').DataTable();
    </script>

@include('footer_admin');