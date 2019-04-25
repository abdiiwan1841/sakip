@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Subkegiatan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Data Master</span></li>
                <li><span>Master Subkegiatan</span></li>
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

            <h2 class="panel-title">Master Subkegiatan</h2>
        </header>
        <div class="panel-body">
            <div class="wizard-tabs" style="float: left !important;">
                <ul class="nav wizard-steps">

                    <li class="nav-item" style="width:230px; ">
                        <a href="{{ url('sub_kegiatan_add') }}" class="nav-link text-center"
                           style="background-color:#007bff !important; color: #fff;">
                            <i class="fa fa-plus-circle"></i> Tambah Data
                        </a>
                    </li>
                </ul>
            </div>

            <br><br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Kegiatan</center>
                    </th>
                    <th>
                        <center>Nama Sub Kegiatan</center>
                    </th>
                    <th>
                        <center>Keterangan</center>
                    </th>
                    <th width="15%">
                        <center>Aksi</center>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;

                foreach($sub_kegiatan_list as $list){ ?>
                <tr>
                    <td>
                        <center>{{$no}}</center>
                    </td>
                    <td>
                        <center>{{$list->nama_kegiatan}}</center>
                    </td>
                    <td>
                        <center>{{$list->nama_sub_kegiatan}}</center>
                    </td>
                    <td>
                        <center>{{$list->keterangan }}</center>
                    </td>

                    <td>
                        <center>
                            <a title="hapus" href="{{ url('/sub_kegiatan_edit',$list->id_sub_kegiatan)}}"
                               class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/list_subkegiatan', $list->id_sub_kegiatan],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash">', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Hapus',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </center>
                    </td>
                </tr>
                <?php $no++; } ?>

                </tbody>
            </table>
        </div>
    </section>
</section>
<script type="text/javascript">
    $('#example1').DataTable();
</script>

@include('footer_admin');