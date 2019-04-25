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
        <h2>Detail Renbut</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Renbut</span></li>
                <li><span>Detail Renbut Tahap 2</span></li>
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

            <h2 class="panel-title">Detail Renbut</h2>
        </header>
		{!! Form::open(['url' => '/editrenaku2', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="panel-body">

			@foreach($renbin as $value)
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Sumber Anggaran</label>
                <div class="col-md-7">
				{{$value->sumber_anggaran}}
                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-7">
				{{$value->tanggal}}
                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kode Rencana Kebutuhan</label>
                <div class="col-md-7">
				{{$value->kode_rencana_kebutuhan}}
                </div>
            </div>
			
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Tahun Perencanaan</label>
                <div class="col-md-7">
				{{$value->tahun_anggaran}}
                </div>
            </div>
            
			<br>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><h5><b>Detail Renja</b></h5></label>
                <div class="col-md-7">
                </div>
            </div>

            <table class="table table-bordered table-responsive"
                   style="margin-left: 15px; width: 97%">
                <thead style="background-color: #cccccc;">
				<input type="hidden" name="id_renbin" value="{{$id_renbin}}">
                <tr>
					<th>
                        <center>Program / Kegiatan / Subkegiatan / Detail</center>
                    </th>
                    <th>
                        <center>Volume Kegiatan</center>
                    </th>
                    <th>
                        <center>Rencana Anggaran</center>
                    </th>
                    <th>
                        <center>Keterangan</center>
                    </th>
					<th>
                        <center>Aksi</center>
                    </th>
                </tr>
                </thead>
				@foreach($master_jawaban_renbin as $value2)
                <tbody style="background-color: #f9f9f9;">
				<?php $asd = DB::select(" SELECT * from master_jawaban_renbin where id_program = '".$value2->id_program."' and id_renbin = '".$id_renbin."' "); 
				foreach($asd as $value4){?>
						<?php $program = DB::select(" SELECT * from master_program where id_program = '".$value2->id_program."' "); 
						foreach($program as $value3){?>
								<tr>
									<td><b>{{$value3->nama_program}}</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
						
						<?php $kegiatan = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_kegiatan."' "); 
						foreach($kegiatan as $value5){?>
								<tr>
									<td><b>{{$value5->rencana}} ({{$value5->kode}})</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
						
						<?php $sub = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_sub."' "); 
						foreach($sub as $value6){?>
								<tr>
									<td><b>{{$value6->rencana}} ({{$value6->kode}})</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
								
								<tr>
									<td>{{$value4->detail_kegiatan}}</td>
									<td>{{$value4->volume}}</td>
									<td>{{buatrp($value4->anggaran)}}</td>
									<td>{{$value4->keterangan}}</td>
									@if($tahap ==1)
									<td width="100"><center>
									<input type="hidden" name="id_program[]" value="{{$value2->id_program}}">
									<input type="hidden" name="id_jawaban[]" value="{{$value4->id_jawaban}}">
									<input type="hidden" name="id_kegiatan[]" value="{{$value4->id_kegiatan}}">
									<input type="hidden" name="id_sub[]" value="{{$value4->id_sub}}">
									<input type="hidden" name="detail_kegiatan[]" value="{{$value4->detail_kegiatan}}">
									<select name="status[]" class="form-control">
										<option value="1">yes</option>
										<option value="0">no</option>
									</select></center></td>
									@elseif($tahap == 2)
										@if($value4->status == 1)
										<td><center><input type="checkbox" checked disabled></center></td>
										@elseif($value4->status == 0)
										<td><center><input type="checkbox" disabled></center></td>
										@endif
									@endif
								</tr>
				<?php } ?>
                </tbody>
				@endforeach
				<tfoot>
					<tr>
						<td colspan="2"><center><b>Total</b></center></td>
						<td><b>{{buatrp($value->jumlah_anggaran)}}</b></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
            </table>
			
			
			@if($tahap == 1)
			<br>
			<div class="form-group">
                <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                <div class="col-md-7">
					<textarea name="keterangan" class="form-control" type="text" id="keterangan"></textarea>
                </div>
            </div>
			@endif
			
			
            <br><div class="form-group">
                <label class="col-md-5"></label>
                <div class="col-md-7">
				@if($tahap == 1)
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
				@elseif($tahap == 2)
				@endif
                    <a href="{{ url('/pelaporan_renja')}}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
		@endforeach
        </div>
		{!! Form::close() !!}
    </section>
</section>


@include('footer_admin');