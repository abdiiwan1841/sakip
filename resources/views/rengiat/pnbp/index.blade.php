@include('header_admin');
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>


<?php
function buatrp($angka)
{
 $jadi = "Rp ".number_format($angka,2,',','.');
 return $jadi;
}
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Rencana Kegiatan PNBP</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>PNBP</span></li>
                <li><span>Rencana Kegiatan</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <section class="panel">
    <br>
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Tambah</a></li>
            <li><a data-toggle="tab" href="#menu1">PNBP</a></li>
        </ul>    
		
		<div class="tab-content">
            <div id="home" class="tab-pane fade in active">
				<header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>
                    <h2 class="panel-title">Tambah Rencana Kegiatan PNBP bedasarkan Renbut</h2>
                </header>
                <div class="panel-body">

                    <br>
                    <table class="table table-bordered" id="users-table2">
                        <thead>
                        <tr>
							<th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Renbut</th>
                            <th>Tahun Perencanaan</th>
                            <th>Detail Kegiatan</th>
							<th>Volume</th>
							<th>Anggaran</th>
							<th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
						<tbody>
						@foreach($pnbp as $value2)
							<tr>
								<td>{{$noa++}}</td>
								<td>{{$value2->tanggal}}</td>
								<td>{{$value2->kode_rencana_kebutuhan}}</td>
								<td>{{$value2->tahun_anggaran}}</td>
								<td>{{$value2->detail_kegiatan}}</td>
								<td>{{$value2->volume}}</td>
								<td>{{buatrp($value2->anggaran)}}</td>
								<td>{{$value2->keterangan}}</td>
								<td><center>
									<a href="{{ url('/pnbp_add',$value2->id_jawaban)}}" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span></a>
									</center>
								</td>
							</tr>
						@endforeach
						</tbody>
                    </table>
                </div>
			</div>
			<div id="menu1" class="tab-pane fade">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
					</div>

					<h2 class="panel-title">Rencana Kegiatan PNBP</h2>
				</header>
				<div class="panel-body">
					<div class="wizard-tabs" style="float: left !important;">
						<ul class="nav wizard-steps">

							<li class="nav-item" style="width:230px; ">
								<a href="{{ url('pnbp_add') }}" class="nav-link text-center"
								   style="background-color:#007bff !important; color: #fff;">
									<i class="fa fa-plus-circle"></i> Tambah Rengiat baru
								</a>
							</li>
						</ul>
					</div>

					<br><br>
					<table class="table table-bordered" id="users-table">
						<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Kode Program</th>
							<th>Rencana Kegiatan</th>
							<th>Keluar</th>
							<th>Detil Kegiatan</th>
							<th>Akun</th>
							<th>
								<center>Aksi</center>
							</th>
						</tr>
						</thead>
					</table>

				</div>
    
			</div>
		</div>
			
		
	</section>
	
</section>
<script type="text/javascript">
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('getPnbp') }}",
            columns: [
                {data: 'row', name: 'row'},
                {data: 'tanggal_rencanaz', name: 'tanggal_rencana', orderable: false, searchable: true},
                {data: 'row', name: 'row'},
                {data: 'id_program', name: 'program'},
                {data: 'keluaran', name: 'keluaran'},
                {data: 'detail_kegiatan', name: 'detail_kegiatan'},
                {data: 'row', name: 'row'},
                {
                    data: 'action', name: 'action', orderable: false, searchable: false
                }
            ]
        });


    });
    //  $('#example1').DataTable();
</script>
<script type="text/javascript">
    $(function () {
        $('#users-table2').DataTable();
    });
</script>

@include('footer_admin');