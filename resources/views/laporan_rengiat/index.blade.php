@include('header_admin');

<?php
function buatrp($angka)
{
 $jadi = "Rp ".number_format($angka,2,',','.');
 return $jadi;
}
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Kegiatan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pelaporan Rengiat</span></li>
                <li><span>View Laporan Rengiat</span></li>
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
            <h2 class="panel-title">View Laporan Rengiat</h2>
        </header>
        <div class="panel-body">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">APBN</a></li>
                <li><a data-toggle="tab" href="#menu1">PNBP</a></li>
            </ul>
            <br>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Satker</center>
                            </th>
                            <th>
                                <center>Rencana Kegiatan</center>
                            </th>
                            <th>
                                <center>Alokasi Anggaran</center>
                            </th>
                            <th>
                                <center>Keluaran</center>
                            </th>
                            <th>
                                <center>Akun</center>
                            </th>
                            <th width="15%">
                                <center>Aksi</center>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($apbn as $apbn_val)
						@if(empty($apbn_val->id_surat_pengantar_kalakgiat) || empty($apbn_val->id_file_rencana_kegiatan) || empty($apbn_val->id_kerangka_acuan_kegiatan) || empty($apbn_val->id_uraian_kegiatan_rincian_biaya) || empty($apbn_val->id_syarat_teknis) ||empty($apbn_val->id_uraian_biaya_administrasi) || empty($apbn_val->id_gambar_denah) ||empty($apbn_val->id_bagan_organisasi) || empty($apbn_val->id_surat_pernyataan_mutlak))
                        @else    
						<tr>
                                <td><center>{{$no++}}</center></td>
                                <td><center>{{$apbn_val->name}}</center></td>
                                <td><center>{{$apbn_val->id_kegiatan}}</center></td>
                                <td><center>{{buatrp($apbn_val->alokasi_anggaran)}}</center></td>
                                <td><center>{{$apbn_val->keluaran}}</center></td>
                                <td><center>{{$apbn_val->akun}}</center></td>
                                <td><center>
								@if($apbn_val->status_ == 3)
									<a title="view" href="{{ url('/view_pelaporan_rengiat_apbn/'.$apbn_val->id_perencanaan_kegiatan)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span></a>
								@else
									<a title="view" href="{{ url('/view_pelaporan_rengiat_apbn/'.$apbn_val->id_perencanaan_kegiatan)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-search"></span></a>
								@endif
								</center></td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Satker</center>
                            </th>
                            <th>
                                <center>Rencana Kegiatan</center>
                            </th>
                            <th>
                                <center>Alokasi Anggaran</center>
                            </th>
                            <th>
                                <center>Keluaran</center>
                            </th>
                            <th>
                                <center>Akun</center>
                            </th>
                            <th width="15%">
                                <center>Aksi</center>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($pnbp as $pnbp_val)
						@if(empty($pnbp_val->id_surat_pengantar_kalakgiat) || empty($pnbp_val->id_file_rencana_kegiatan) || empty($pnbp_val->id_kerangka_acuan_kegiatan) || empty($pnbp_val->id_uraian_kegiatan_rincian_biaya) || empty($pnbp_val->id_syarat_teknis) ||empty($pnbp_val->id_uraian_biaya_administrasi) || empty($pnbp_val->id_gambar_denah) ||empty($pnbp_val->id_bagan_organisasi) || empty($pnbp_val->id_surat_pernyataan_mutlak))
                        @else 
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$pnbp_val->name}}</td>
                                <td>{{$pnbp_val->id_kegiatan}}</td>
                                <td>{{buatrp($pnbp_val->alokasi_anggaran)}}</td>
                                <td>{{$pnbp_val->keluaran}}</td>
                                <td>{{$pnbp_val->akun}}</td>
                                <td><center>
								@if($pnbp_val->status_ == 3)
									<a title="view" href="{{ url('/view_pelaporan_rengiat_pnbp/'.$pnbp_val->id_perencanaan_kegiatan)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span></a>
								@else
									<a title="view" href="{{ url('/view_pelaporan_rengiat_pnbp/'.$pnbp_val->id_perencanaan_kegiatan)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-search"></span></a>
								@endif
								</center></td>
                            </tr>
						@endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</section>
<script type="text/javascript">
    $('#example1').DataTable();
    $('#example2').DataTable();
</script>

@include('footer_admin');