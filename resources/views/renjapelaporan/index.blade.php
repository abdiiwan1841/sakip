@include('header_admin');


<?php
function buatrp($angka)
{
 $jadi = "Rp ".number_format($angka,2,',','.');
 return $jadi;
}
?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pelaporan Rencana Kerja</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pelaporan Rencana Kerja</span></li>
            </ol>
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>

        </div>


    </header>

    <section class="panel">

        <br>
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">APBN</a></li>
            <li><a data-toggle="tab" href="#menu1">PNBP</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>
                    <h2 class="panel-title">Pelaporan Rencana Kerja APBN</h2>
                </header>
                <div class="panel-body">

                    <br>
                    <table class="table table-bordered" id="users-table">
                        <thead>
                        <tr>
							<th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Renja</th>
                            <th>Tahun Perencanaan</th>
                            <th>Jumlah Anggaran</th>
                            <th>
                                <center>Aksi</center>
                            </th>
                        </tr>
                        </thead>
						<tbody>
						@foreach($apbn as $value2)
							<tr>
								<td>{{$noa++}}</td>
								<td>{{$value2->tanggal}}</td>
								<td>{{$value2->kode_rencana_kebutuhan}}</td>
								<td>{{$value2->tahun_anggaran}}</td>
								<td>{{buatrp($value2->jumlah_anggaran)}}</td>
								<td>
								<center>
								@if(empty($value2->status))
									<a href="{{ url('/pelaporanedit',$value2->id_renbin)}}" class="btn btn-sm btn-primary"><span class="fa fa-pencil"></span></a>
								@elseif(!empty($value2->status))
									@if($value2->status == 2)
										<!--bedain url aja, function semua sama-->
									<a href="{{ url('/viewpelaporanedit',$value2->id_renbin)}}" class="btn btn-sm btn-purple"><span class="fa fa-search"></span></a>
										<a href="{{ url('/pelaporanedit2',$value2->id_renbin)}}" class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
									@elseif($value2->status == 4)
										<!--bedain url aja, function semua sama-->
										<a href="{{ url('/viewpelaporanedit',$value2->id_renbin)}}" class="btn btn-sm btn-purple"><span class="fa fa-search"></span></a>
										<a href="{{ url('/pelaporanedit3',$value2->id_renbin)}}" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
									@elseif($value2->status == 5 || $value2->status == 6)
										<!--bedain url aja, function semua sama-->
										<a href="{{ url('/viewpelaporanedit',$value2->id_renbin)}}" class="btn btn-sm btn-primary"><span class="fa fa-search"></span></a>
									@else
										<a href="{{ url('/viewpelaporanedit',$value2->id_renbin)}}" class="btn btn-sm btn-purple"><span class="fa fa-search"></span></a>
									@endif
								@endif
									<!--<a href="{{ url('/hapusrenja',$value2->id_renbin)}}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>-->
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
                    <h2 class="panel-title">Pelaporan Rencana Kerja PNBP</h2>
                </header>
                <div class="panel-body">
                    <br>
                    <table class="table table-bordered" id="users-table2">
                        <thead>
                        <tr>
							<th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Renja</th>
                            <th>Tahun Perencanaan</th>
                            <th>Jumlah Anggaran</th>
                            <th>
                                <center>Aksi</center>
                            </th>
                        </tr>
                        </thead>
						<tbody>
						@foreach($pnbp as $value)
							<tr>
								<td>{{$nob++}}</td>
								<td>{{$value->tanggal}}</td>
								<td>{{$value->kode_rencana_kebutuhan}}</td>
								<td>{{$value->tahun_anggaran}}</td>
								<td>{{buatrp($value->jumlah_anggaran)}}</td>
								<td>
								<center>
								@if(empty($value->status))
									<a href="{{ url('/pelaporanedit',$value->id_renbin)}}" class="btn btn-sm btn-primary"><span class="fa fa-pencil"></span></a>
								@elseif(!empty($value->status))
									@if($value->status == 2)
										<!--bedain url aja, function semua sama-->
										<a href="{{ url('/viewpelaporanedit',$value->id_renbin)}}" class="btn btn-sm btn-purple"><span class="fa fa-search"></span></a>
										<a href="{{ url('/pelaporanedit2',$value->id_renbin)}}" class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
									@elseif($value->status == 4)
										<!--bedain url aja, function semua sama-->
										<a href="{{ url('/viewpelaporanedit',$value->id_renbin)}}" class="btn btn-sm btn-purple"><span class="fa fa-search"></span></a>
										<a href="{{ url('/pelaporanedit3',$value->id_renbin)}}" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
									@elseif($value->status == 5 || $value->status == 6)
										<!--bedain url aja, function semua sama-->
										<a href="{{ url('/viewpelaporanedit',$value->id_renbin)}}" class="btn btn-sm btn-primary"><span class="fa fa-search"></span></a>
									@else
										<a href="{{ url('/viewpelaporanedit',$value->id_renbin)}}" class="btn btn-sm btn-purple"><span class="fa fa-search"></span></a>
									@endif
								@endif
								<!--<a href="" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>-->
								</center>
								</td>
							</tr>
						@endforeach
						</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</section>

<script type="text/javascript">
    $(function () {
        $('#users-table').DataTable();
        $('#users-table2').DataTable();
    });
</script>

@include('footer_admin')