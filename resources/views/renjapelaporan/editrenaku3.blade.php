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
                <li><span>Detail Renbut Tahap 3</span></li>
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
		{!! Form::open(['url' => '/editrenaku3', 'class' => 'form-horizontal', 'files' => true]) !!}
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
			@foreach($master_jawaban_renbin as $value2)
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
                        <center>Kelengkapan</center>
                    </th>
                </tr>
                </thead>

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
									<td><a onclick="myFunction{{$value4->id_jawaban}}()">{{$value4->detail_kegiatan}}</a></td>
									<td>{{$value4->volume}}</td>
									<td>{{buatrp($value4->anggaran)}}</td>
									<td>{{$value4->keterangan}}</td>
									@if($tahap ==1)
									<td width="100"><center>
									<input type="hidden" name="id_program[]" value="{{$value2->id_program}}">
									<input type="hidden" name="id_kegiatan[]" value="{{$value4->id_kegiatan}}">
									<input type="hidden" name="id_jawaban[]" value="{{$value4->id_jawaban}}">
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

				<tfoot>
					<tr>
						<td colspan="2"><center><b>Total</b></center></td>
						<td><b>{{buatrp($value->jumlah_anggaran)}}</b></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
            </table>

			@foreach($asd as $value4)
			@if($tahap == 1)
			<div id="asd{{$value4->id_jawaban}}" style="display:none; width: 97%">
				<div class="container">
                    <div class="panel-group col-lg-10" id="accordion">
					<br><center>Detail Kegiatan :<font color="blue" size="3"> {{$value4->detail_kegiatan}}</font><hr width="20%"></center>
                        <div>
                            <div class="panel-heading">
                                <label>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree{{$value4->id_jawaban}}" style="text-decoration: none;">
                                        Kerangka Acuan Kegiatan (KAK)/ TOR
                                    </a>
                                </label>
                            </div>
                            <?php $mj = DB::table('kerangka_acuan_kegiatan')
                            ->join('master_program','kerangka_acuan_kegiatan.id_program','=','master_program.id_program')
                            ->join('master_kegiatan','kerangka_acuan_kegiatan.id_kegiatan','=','master_kegiatan.id_kegiatan')
                            ->where('id_kerangka_acuan_kegiatan',$value4->id_kerangka_acuan_kegiatan)
                            ->get()?>
                            @foreach($mj as $kak)
                            <div id="collapseThree{{$value4->id_jawaban}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->kementrian_negara_lembaga}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit
                                            Organisasi/Satker</label>
                                        <div class="col-md-7">
                                            Pushidrosal
                                            <!-- <textarea class="form-control" name="detail_kegiatan" type="text"  id="detail_kegiatan"></textarea> -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Program</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->nama_program}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Hasil
                                            (Outcome)</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->hasil}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">
                                            <?php
                                            {?>
                                            <label class="form-label">: {{$kak->nama_kegiatan}}</label>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Indikator Kinerja
                                            Kegiatan</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->indikator_kinerja_kegiatan}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Keluaran</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->jenis_keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume
                                            Keluaran</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->volume_keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label"><b>Latar Belakang</b></label>
                                        <div class="col-md-7"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Dasar Hukum</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->dasar_hukum}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambaran Umum</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->gambaran_umum}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Penerimaan
                                            Manfaat</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->penerimaan_manfaat}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Metode
                                            Pelaksanaan</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->metode_pelaksanaan}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Tahapan Dan Waktu
                                            Pelaksanaan</label>
                                        <div class="col-md-7">
                                            <label class="form-label">: {{$kak->waktu_pelaksanaan}}</label>
                                        </div>
                                    </div>


                                    <table class="table table-bordered table-responsive" id="dynamic"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: white">
                                        <tr>
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Uraian Kegiatan</center>
                                            </th>
                                            <th>
                                                <center>Jadwal Waktu</center>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #f9f9f9;">
                                          <?php $waktu = DB::table('waktu_pelaksanaan')->where('id_waktu_pelaksanaan',$kak->id_kerangka_acuan_kegiatan)->get();?>
                                          @foreach($waktu as $val)
                                        <tr>
                                            <td><center>{{$no++}}</center></td>
                                            <td><center>{{$val->uraian_kegiatan}}</center></td>
                                            <td><center>{{$val->jadwal_waktu}}</center></td>
                      											<td></td>
                                        </tr>
                                          @endforeach
                                        </tbody>
                                    </table>

                                    <br><br>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Waktu Pencapaian
                                            Keluaran</label>
                                        <div class="col-md-7">
                                            <label>: {{$kak->waktu_pencapaian_keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Biaya Yang DI
                                            perlukan</label>
                                        <div class="col-md-7">
                                            <label>: {{buatrp($kak->biaya_yang_diperlukan)}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div>
                            <div class="panel-heading">
                                <label>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo{{$value4->id_jawaban}}" style="text-decoration: none;">
                                        Uraian Kegiatan dan Rincian Biaya
                                    </a>
                                </label>
                                <?php
                                    $mj2 = DB::table('uraian_kegiatan_rincian_biaya')
                                    ->join('master_program','uraian_kegiatan_rincian_biaya.program','=','master_program.id_program')
                                    ->join('master_kegiatan','uraian_kegiatan_rincian_biaya.kegiatan','=','master_kegiatan.id_kegiatan')
                                    ->where('id_uraian_kegiatan_rincian_biaya',$value4->id_uraian_kegiatan_rincian_biaya)
                                    ->get();
                                ?>
                            </div>
                            @foreach($mj2 as $ukr)
                            <div id="collapseTwo{{$value4->id_jawaban}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->kementrian_negara_lembaga}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Eselon I/II/
                                            Satker</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->unit_organisasi_satker}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Program</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->nama_program}}</label>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->nama_kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran
                                            (output)</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->keluaran}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->detil_kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->volume}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>: {{$ukr->satuan_ukur}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>: {{buatrp($ukr->alokasi_dana)}}</label>

                                        </div>
                                    </div>

                                    <table class="table table-bordered table-responsive" id="dynamic2"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: white">
                                        <tr>
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Uraian</center>
                                            </th>
                                            <th>
                                                <center>Jumlah</center>
                                            </th>
                                            <th>
                                                <center>Satuan</center>
                                            </th>
                                            <th>
                                                <center>Harga Satuan</center>
                                            </th>
                                            <th>
                                                <center>Harga Jasa</center>
                                            </th>
                                            <th>
                                                <center>Harga Material</center>
                                            </th>
                                            <th>
                                                <center>Jumlah Total</center>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #f9f9f9;">
                                          <?php $no1=1;
                                            $rak = DB::table('rincian_anggaran_biaya')->where('id_rincian_anggaran_biaya',$ukr->id_uraian_kegiatan_rincian_biaya)->get();

                                          ?>
                                          @foreach($rak as $val2)
                                        <tr>
                                            <td><center>{{$no1++}}</center></td>
                                            <td><center>{{$val2->uraian_pekerjaan}}</center></td>
                      											<td><center>{{$val2->jumlah}}</center></td>
                      											<td><center>{{$val2->satuan}}</center></td>
                      											<td><center>{{buatrp($val2->harga_satuan)}}</center></td>
                      											<td><center>{{buatrp($val2->harga_jasa)}}</center></td>
                      											<td><center>{{buatrp($val2->harga_material)}}</center></td>
                      											<td><center>{{buatrp($val2->harga_jumlah)}}</center></td>
                                        </tr>
                                          @endforeach
                                        </tbody>
                                    </table>

                                    <div class="form-group">
                                        <label for="Rekapitulasi"
                                               class="col-md-3 control-label"><b>Rekapitulasi</b></label>
                                        <div class="col-md-7">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Fisik</label>
                                        <div class="col-md-7">
                                            <label>: {{buatrp($ukr->total_biaya_fisik)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Administrasi</label>
                                        <div class="col-md-7">
                                            <label>: {{buatrp($ukr->total_biaya_administrasi)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Total</label>
                                        <div class="col-md-7">
                                            <label>: {{buatrp($ukr->Total_keseluruhan)}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div>
                            <div class="panel-heading">
                                <label >
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse4{{$value4->id_jawaban}}" style="text-decoration: none;">
                                        Uraian dan Perincian Biaya Administrasi
                                    </a>
                                </label>
                            </div>
                            <?php
                              $mj3 = DB::table('uraian_biaya_administrasi')
                              ->join('master_kegiatan','uraian_biaya_administrasi.Kegiatan','=','master_kegiatan.id_kegiatan')
                              ->where('id_uraian_biaya_administrasi',$value4->id_uraian_biaya_administrasi)
                              ->get();
                            ?>
                            @foreach($mj3 as $uba)
                            <div id="collapse4{{$value4->id_jawaban}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit
                                            Organisasi</label>
                                        <div class="col-md-7">

                                            <label>: {{$uba->Unit_organisasi_satker}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>: {{buatrp($uba->alokasi_dana)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>: {{$uba->nama_kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Waktu
                                            Pelaksanaan</label>
                                        <div class="col-md-7">

                                            <label>: {{$uba->waktu_pelaksanaan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis
                                            Pengadaan</label>
                                        <div class="col-md-7">

                                            <label>: {{$uba->jenis_pengadaan}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>: {{$uba->satuan_ukur}}</label>

                                        </div>
                                    </div>

                                    <table class="table table-bordered table-responsive" id="dynamic"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: white">
                                        <tr>
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Uraian</center>
                                            </th>
                                            <th>
                                                <center>Jumlah Satuan</center>
                                            </th>
                                            <th>
                                                <center>Harga Satuan</center>
                                            </th>
                                            <th>
                                                <center>Satuan</center>
                                            </th>
                                            <th>
                                                <center>Jumlah Total</center>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #f9f9f9;">
                                          <?php $no2=1;
                                          $ulba = DB::table('uraian_lengkap_biaya_administrasi')->where('id_uraian_lengkap',$uba->id_uraian_biaya_administrasi)->get();
                                          ?>
                                          @foreach($ulba as $val3)
                                        <tr>
                                            <td><center>{{$no2++}}</center></td>
                                            <td><center>{{$val3->uraian_pekerjaan}}</center></td>
                      											<td><center>{{$val3->jumlah_satuan}}</center></td>
                      											<td><center>{{buatrp($val3->harga_satuan)}}</center></td>
                      											<td><center>{{$val3->satuan}}</center></td>
                      											<td><center>{{buatrp($val3->jumlah)}}</center></td>
                                        </tr>
                                          @endforeach
                                        </tbody>
                                    </table>


                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Kebutuhan biaya pengadaan</label>
                                        <div class="col-md-7">
                                            <label>: {{buatrp($uba->kebutuhan_biaya_pengadaan)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Pagu anggaran</label>
                                        <div class="col-md-7">
                                            <label>{{buatrp($uba->pagu_anggaran)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Administrasi</label>
                                        <div class="col-md-7">
                                            <label>: {{buatrp($uba->biaya_administrasi)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Fisik</label>
                                        <div class="col-md-7">

                                            <label>: {{buatrp($uba->biaya_fisik)}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
        						<div>
                            <div class="panel-heading">
                                <label >
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse5{{$value4->id_jawaban}}" style="text-decoration: none;">
                                        Syarat - Syarat teknis Pelaksanaan
                                    </a>
                                </label>
                            </div>
                            <div id="collapse5{{$value4->id_jawaban}}" class="panel-collapse collapse">
                              <?php
                                $mj4  = DB::table('syarat_teknis_spesifikasi')->where('id_syarat_teknis',$value4->id_syarat_teknis)->get();
                              ?>
                              @foreach($mj4 as $sts)
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">

                                            <label>: {{$sts->kementrian_negara}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Organisasi/
                                            Satker</label>
                                        <div class="col-md-7">

                                            <label>: {{$sts->unit_organisasi_satker}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">
                                            <label>: {{$sts->kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>: {{$sts->datil_kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran</label>
                                        <div class="col-md-7">

                                            <label>: {{$sts->keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
                                        <div class="col-md-7">

                                            <label>: {{$sts->volume}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>: {{$sts->satuan_ukur}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>: {{buatrp($sts->alokasi_dana)}}</label>

                                        </div>
                                    </div>


                                    <table class="table table-bordered table-responsive" id="dynamic"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: white">
                                        <tr>
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Uraian</center>
                                            </th>
                                            <th>
                                                <center>Spesifikasi</center>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #f9f9f9;">
                                          <?php $no4=1;
                                              $ts   = DB::table('table_spesifikasi')->where('id_table_spesifikasi',$sts->id_syarat_teknis)->get();
                                          ?>
                                          @foreach($ts as $val4)
                                        <tr>
                                            <td><center>{{$no4++}}</center></td>
                                            <td><center>{{$val4->uraian_pekerjaan}}</center></td>
                      											<td><center>{{$val4->spesifikasi}}</center></td>
                                        </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>

						<div>
                            <div class="panel-heading">
                                <label>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse6{{$value4->id_jawaban}}" style="text-decoration: none;">
                                        Gambar/Denah
                                    </a>
                                </label>
                            </div>
                            <div id="collapse6{{$value4->id_jawaban}}" class="panel-collapse collapse">
                              <?php
                                  $mj5  = DB::table('gambar_denah')->where('id_gambar_denah',$value4->id_gambar_denah)->get();
                              ?>
                                @foreach($mj5 as $gd)
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">

                                            <label>: {{$gd->kementrian_negara}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Organisasi/
                                            Satker</label>
                                        <div class="col-md-7">

                                            <label>: {{$gd->unit_organisasi_satker}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>: {{$gd->kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran</label>
                                        <div class="col-md-7">


                                          <label>: {{$gd->keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>: {{$gd->detil_kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
                                        <div class="col-md-7">

                                            <label>: {{$gd->volume}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>: {{$gd->satuan_ukur}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>: {{$gd->alokasi_dana}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">File Gambar</label>
                                        <div class="col-md-7">
                                            <a></a>
                                            <img width="80%"src="{{asset('/uploads/form_gambar/'.$gd->upload_gambar)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

						<div>
                            <div class="panel-heading">
                                <label>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse7{{$value4->id_jawaban}}" style="text-decoration: none;">
                                        Bagan Organisasi Kegiatan
                                    </a>
                                </label>
                            </div>
                            <div id="collapse7{{$value4->id_jawaban}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <?php
                                      $mj6   = DB::table('bagan_organisasi')->where('id_bagan_organisasi',$value4->id_bagan_organisasi)->get();
                                  ?>
                                  @foreach($mj6 as $bo)
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambar Bagan Organisasi</label>
                                        <div class="col-md-7">
                                            <a></a>
                                            <img width="80%"src="{{asset('/uploads/form_gambar/'.$bo->upload_bagan_organisasi)}}" alt="">
                                        </div>
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<br>
				<div class="form-group">
					<label for="keterangan" class="col-md-3 control-label">Keterangan</label>
					<div class="col-md-7">
						<textarea name="keterangan[]" class="form-control" type="text" id="keterangan" >
							@foreach($renbin as $ren)
							{{$ren->keterangan}}
							@endforeach
						 </textarea>
					</div>
				</div><hr>

			</div>
			<script>
				function myFunction{{$value4->id_jawaban}}() {
					var x = document.getElementById("asd{{$value4->id_jawaban}}");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
				}
			</script>
			@endif
			@endforeach
			@endforeach


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
