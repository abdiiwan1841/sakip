@include('header_admin');
<?php
function buatrp($angka)
{
 $jadi = "Rp ".number_format($angka,2,',','.');
 return $jadi;
}
?>

<style>
    .container {
        background-color: transparent;
    }

    .panel-transparent {
        background: rgba(255, 255, 255, 0.2) !important
    }

    .panel-default {
        border-color: white;
    }

    .btn-lg.btn-arrow-right:before, .btn-lg.btn-arrow-left:before, .btn-group-lg > .btn-arrow-left:before, .btn-group-lg > .btn-arrow-right:before {
        /*display: none;*/
    }

    .panel-heading .accordion-toggle:after {
        /* symbol for "opening" panels */
        font-family: 'Glyphicons Halflings'; /* essential for enabling glyphicon */
        content: "\e114"; /* adjust as needed, taken from bootstrap.css */
        float: right; /* adjust as needed */
        color: grey; /* adjust as needed */
    }

    .panel-heading .accordion-toggle.collapsed:after {
        /* symbol for "collapsed" panels */
        content: "\e080"; /* adjust as needed, taken from bootstrap.css */
    }

    .borderless td, .borderless th {
        border: none !important;
    }

    .panel-title {
        font-size: 14px !important;
    }
</style>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>APBN</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('/')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pelaporan Rengiat</span></li>
                <li><span>View Laporan Rengiat</span></li>
                <li><span>APBN</span></li>
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

            <h2 class="panel-title">View Pelaporan Rengiat APBN</h2>
        </header>
        <div class="panel-body">


            <fieldset class="row">
				<div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Update At</label>
                            <div class="col-sm-5">
                                <?php
                                $get = DB:: select("select * from sakip.rencana_kegiatan where id_perencanaan_kegiatan = '" . $id . "' ");
                                foreach($get as $asd){?>
                                <label class="form-label"><font color="red">{{$asd->update_at}}</font></label>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Program</label>
                            <div class="col-sm-5">
                                <?php
                                $getfoto = DB:: select("select * from sakip.master_program where id_program = '" . $apbn->id_program . "' ");
                                foreach($getfoto as $list1){?>
                                <label class="form-label">{{$list1->nama_program}}</label>

                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Kegiatan</label>
                            <div class="col-sm-5">
                                <?php
                                $getkegiatan = DB:: select("select * from sakip.master_kegiatan where id_kegiatan = '" . $apbn->id_kegiatan . "' ");
                                foreach($getkegiatan as $list2){?>
                                <label class="form-label">{{$list2->nama_kegiatan}}</label>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Detail
                                Kegiatan</label>
                            <div class="col-sm-5">
                                <label class="form-label">{{$apbn->detail_kegiatan}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Keluaran</label>
                            <div class="col-sm-5">
                                <label class="form-label">{{$apbn->keluaran}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Akun</label>
                            <div class="col-sm-5">
                                <label class="form-label">{{$apbn->akun}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alokasi Anggaran
                                Fisik</label>
                            <div class="col-sm-5">
                                <label class="form-label">{{buatrp($apbn->alokasi_anggaran_fisik)}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alokasi Anggaran
                                Administrasi</label>
                            <div class="col-sm-5">
                                <label class="form-label">{{buatrp($apbn->alokasi_anggaran_biaya_administrasi)}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="panel-group col-lg-10" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseOne" style="text-decoration: none;">
                                        Surat Pengantar Kalakgiat
                                    </a>
                                </h4>
                            </div>


                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
								@if(!empty($kalakgiat))
								@foreach($kalakgiat as $list)
                                    <div class="form-group">
                                        <label for="nomor" class="col-md-3 control-label">Nomor</label>
                                        <div class="col-md-7">
                                           {{$list->nomor_kalakgiat}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Klasifikasi</label>
                                        <div class="col-md-7">
                                            {{$list->klasifikasi}}
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Lampiran</label>
                                        <div class="col-md-7">
                                            {{$list->lampiran}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Perihal</label>
                                        <div class="col-md-7">
                                             
                                            {{$list->perihal}}
                                            
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Kepada</label>
                                        <div class="col-md-7">
                                             
                                            {{$list->kepada}}
                                            
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Isi</label>
                                        <div class="col-md-7">
                                             
                                            {{$list->isi}}
                                            
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="" class="col-md-3 control-label"><b>Tembusan</b></label>
										<div class="col-md-7">
										</div>
									</div>

									<div class="form-group">
										<label for="" class="col-md-3 control-label">Tembusan Kepada</label>
										<div class="col-md-7">
											@foreach($tembusan as $valuet)
												- {{$valuet->kepada}} <br>
											@endforeach
										</div>
									</div>
								@endforeach
								@endif
                                </div>
                            </div>


                        </div>
						
						<div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse20" style="text-decoration: none;">
                                        File Rencana Kegiatan
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse20" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">File Rencana Kegiatan</label>
                                        <div class="col-md-7">
										@if(!empty($id_file_rencana_kegiatan))
										@foreach($id_file_rencana_kegiatan as $asd)
                                            <a href="{{asset('uploads/form_gambar/'.$asd->file.'')}}"
                                               style="cursor: pointer" >{{$asd->file}}</a><br>
											   <a class="btn btn-warning" href="{{asset('uploads/form_gambar/'.$asd->file.'')}}" download> Download</a>
										@endforeach
										@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree" style="text-decoration: none;">
                                        Kerangka Acuan Kegiatan (KAK)/ TOR
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->kementrian_negara_lembaga}}</label>
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
                                            <?php
                                            {?>
                                            <label class="form-label">{{$list1->nama_program}}</label>
                                            <?php }?>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Hasil
                                            (Outcome)</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->hasil}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">
                                            <?php
                                            {?>
                                            <label class="form-label">{{$list2->nama_kegiatan}}</label>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Indikator Kinerja
                                            Kegiatan</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->indikator_kinerja_kegiatan}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Keluaran</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->jenis_keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume
                                            Keluaran</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->volume_keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label"><b>Latar Belakang</b></label>
                                        <div class="col-md-7"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Dasar Hukum</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->dasar_hukum}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambaran Umum</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->gambaran_umum}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Penerimaan
                                            Manfaat</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->penerimaan_manfaat}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Metode
                                            Pelaksanaan</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->metode_pelaksanaan}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Tahapan Dan Waktu
                                            Pelaksanaan</label>
                                        <div class="col-md-7">
                                            <label class="form-label">{{$apbn->waktu_pelaksanaan}}</label>
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
                                        <?php
                                        $no = 1;
                                        foreach($waktu_pelaksanaan as $waktu_pelaksanaan_val){ ?>
                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $waktu_pelaksanaan_val->uraian_kegiatan?></td>
                                            <td><?php echo $waktu_pelaksanaan_val->jadwal_waktu?></td>
                                        </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>

                                    <br><br>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Waktu Pencapaian
                                            Keluaran</label>
                                        <div class="col-md-7">
                                            <label>{{$apbn->waktu_pencapaian_keluaran}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Biaya Yang DI
                                            perlukan</label>
                                        <div class="col-md-7">
                                            <label>{{buatrp($apbn->biaya_yang_diperlukan)}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" style="text-decoration: none;">
                                        Uraian Kegiatan dan Rincian Biaya
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Eselon I/II/
                                            Satker</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->unit_organisasi_satker}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Program</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->program_uraian_kegiatan_rincian_biaya}}</label>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->kegiatan_uraian_kegiatan_rincian_biaya}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran
                                            (output)</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->keluaran_uraian_kegiatan_rincian_biaya}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->detil_kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->volume}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->satuan_ukur}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>{{buatrp($apbn->alokasi_dana)}}</label>

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
                                        <?php
                                        $no = 1;
                                        foreach ($rincian_anggaran_biaya as $rincian_anggaran_biaya_val){ ?>

                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $rincian_anggaran_biaya_val->uraian_pekerjaan?></td>
                                            <td><?php echo $rincian_anggaran_biaya_val->jumlah?></td>
                                            <td><?php echo $rincian_anggaran_biaya_val->satuan?></td>
                                            <td><?php echo buatrp($rincian_anggaran_biaya_val->harga_satuan)?></td>
                                            <td><?php echo buatrp($rincian_anggaran_biaya_val->harga_jasa)?></td>
                                            <td><?php echo buatrp($rincian_anggaran_biaya_val->harga_material)?></td>
                                            <td><?php echo buatrp($rincian_anggaran_biaya_val->harga_jumlah)?></td>


                                        </tr>
                                        <?php }?>
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
                                            <label>{{buatrp($apbn->total_biaya_fisik)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Administrasi</label>
                                        <div class="col-md-7">
                                            <label>{{buatrp($apbn->alokasi_anggaran_biaya_administrasi)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Total</label>
                                        <div class="col-md-7">
                                            <label>{{buatrp($apbn->Total_keseluruhan)}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse4" style="text-decoration: none;">
                                        Uraian dan Perincian Biaya Administrasi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit
                                            Organisasi</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->Unit_organisasi_satker}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>{{buatrp($apbn->alokasi_dana_uraian_biaya_administrasi)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->kegiatan_uraian_biaya_administrasi}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Waktu
                                            Pelaksanaan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->waktu_pelaksanaan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis
                                            Pengadaan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->jenis_pengadaan}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->satuan_ukur_uraian_biaya_administrasi}}</label>

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
                                        <?php
                                        $no = 1;
                                        foreach ($uraian_lengkap_biaya_administrasi as $uraian_lengkap_biaya_administrasi_val){?>

                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $uraian_lengkap_biaya_administrasi_val->uraian_pekerjaan?></td>
                                            <td><?php echo $uraian_lengkap_biaya_administrasi_val->jumlah_satuan?></td>
                                            <td><?php echo buatrp($uraian_lengkap_biaya_administrasi_val->harga_satuan)?></td>
                                            <td><?php echo $uraian_lengkap_biaya_administrasi_val->satuan?></td>
                                            <td><?php echo buatrp($uraian_lengkap_biaya_administrasi_val->jumlah)?></td>
                                        </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>


                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Kebutuhan biaya pengadaan</label>
                                        <div class="col-md-7">
                                            <label>{{buatrp($apbn->kebutuhan_biaya_pengadaan)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Pagu anggaran</label>
                                        <div class="col-md-7">
                                            <label>{{buatrp($apbn->pagu_anggaran)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Administrasi</label>
                                        <div class="col-md-7">
                                            <label>{{buatrp($apbn->biaya_administrasi)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Fisik</label>
                                        <div class="col-md-7">

                                            <label>{{buatrp($apbn->biaya_fisik)}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse5" style="text-decoration: none;">
                                        Syarat - Syarat teknis Pelaksanaan
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->kementrian_negara}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Organisasi/
                                            Satker</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->unit_organisasi_satker_syarat_teknis_spesifikasi}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">
                                            <label>{{$apbn->kegiatan_syarat_teknis_spesifikasi}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->datil_kegiatan}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->keluaran_syarat_teknis_spesifikasi}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->volume_syarat_teknis_spesifikasi}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->satuan_ukur_syarat_teknis_spesifikasi}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>{{buatrp($apbn->alokasi_dana_syarat_teknis_spesifikasi)}}</label>

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
                                        <?php
                                        $no = 1;
                                        foreach ($tabel_spesifikasi as $tabel_spesifikasi_val){?>

                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $tabel_spesifikasi_val->uraian_pekerjaan?></td>
                                            <td><?php echo $tabel_spesifikasi_val->spesifikasi?></td>
                                        </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse6" style="text-decoration: none;">
                                        Gambar/Denah
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->kementrian_negara_gambar_denah}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Organisasi/
                                            Satker</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->unit_organisasi_satker_gambar_denah}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->kegiatan_gambar_denah}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->keluaran_gambar_denah}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->detail_kegiatan_gambar_denah}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->volume_gambar_denah}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->satuan_ukur_gambar_denah}}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                                        <div class="col-md-7">

                                            <label>{{buatrp($apbn->alokasi_dana_gambar_denah)}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">File Gambar</label>
                                        <div class="col-md-7">
                                            <a href="{{asset('uploads/form_gambar/'.$apbn->upload_gambar_gambar_denah.'')}}"
                                               style="cursor: pointer">{{$apbn->upload_gambar_gambar_denah}}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse7" style="text-decoration: none;">
                                        Bagan Organisasi Kegiatan
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambar Bagan
                                            Organisasi</label>
                                        <div class="col-md-7">

                                            <a href="{{asset('uploads/form_gambar/'.$apbn->upload_bagan_organisasi_gambar_denah.'')}}"
                                               style="cursor: pointer">{{$apbn->upload_bagan_organisasi_gambar_denah}}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse8" style="text-decoration: none;">
                                        Surat Pernyataaan Tanggung Jawab Mutlak
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Nama</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->yang_bertanggung_jawab_surat_pernyataan_mutlak}}</label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jabatan</label>
                                        <div class="col-md-7">

                                            <label>{{$apbn->jabatan_surat_pernyataan_mutlak}}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Upload Surat
                                            Pernyataan</label>
                                        <div class="col-md-7">
                                            <a href="{{asset('uploads/form_gambar/'.$apbn->upload_surat_pernyataan_surat_pernyataan_mutlak.'')}}"
                                               style="cursor: pointer">{{$apbn->upload_surat_pernyataan_surat_pernyataan_mutlak}}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </fieldset>


        </div>
    </section>

    <section class="panel">
    <div class="row">
        <a href="{{ url('view_pelaporan_rengiat_apbn_cetak/'.$id) }}" class="btn btn-danger"><span class="fa fa-print"></span>&nbspCetak</a>
    </div>
    </section>

</section>

<script type="text/javascript">
    $('#example').DataTable();
</script>


@include('footer_admin')