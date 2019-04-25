@include('header_admin');
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Formulir Berita</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <!-- <li><span>APBN</span></li>
                <li><span>Rencana Kegiatan</span></li> -->
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

            <h2 class="panel-title">Formulir Berita</h2>
        </header>
        <div class="panel-body">
            <div class="wizard-tabs" style="float: left !important;">
                <ul class="nav wizard-steps">

                </ul>
            </div>
            <br>
            <br>

            <table class="table table-bordered" id="table1">
                <thead>
                <tr>
                    <th>No</th>
                    <th width="15%">Tanggal</th>
                    <th>Nama Program</th>
                    <th>Kegiatan</th>
                    <th>Satker</th>
                    <th width="15%">
                        <center>Aksi</center>
                    </th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $val)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$val->tanggal}}</td>
                    <td>{{$val->nama_program}}</td>
                    <td>{{$val->nama_kegiatan}}</td>
                    <td>{{$val->nama_jenis_satker}}</td>
                    <td>
                      <a class="btn btn-warning" href="{{url('formulir_berita/upload/'.$val->id_programkerja)}}"> Detail</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>

        </div>
    </section>
</section>

<script type="text/javascript">
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('getApbn') }}",
            columns: [
                {data: 'row', name: 'row'},
                {data: 'tanggal_rencanaz', name: 'tanggal_rencana', orderable: false, searchable: true},
                {data: 'id_program', name: 'id_program'},
                {data: 'id_program', name: 'program'},
                {data: 'keluaran', name: 'keluaran'},
                {data: 'detail_kegiatan', name: 'detail_kegiatan'},
                {data: 'row', name: 'row'},
                {
                    data: 'action', name: 'action', orderable: false, searchable: false
                }]
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#table1').DataTable();
    });
</script>
@include('footer_admin')
