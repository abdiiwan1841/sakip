<?php
function buatrp($angka)
{
 $jadi = "Rp ".number_format($angka,2,',','.');
 return $jadi;
}
?>
<style type="text/css">
  table {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      font-size: 11pt;
  }
  table td, th{
     border: 1px solid #333;
     padding: 6px;
 }
</style>

<section role="main" class="content-body">
    <header class="page-header">
	<div class="right-wrapper pull-right" style="width: 50%">
        <h5>
			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
			PUSAT HIDROGRAFI DAN OSEANOGRAFI 
			<hr></center>
		</h5>
	</div>

        <!--<div class="right-wrapper pull-right">
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
        </div>-->
    </header>

    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

				<center><h4 class="panel-title">Pelaporan Rencana Kegiatan APBN</h4></center>
				<label>Program	:
								<?php
                                $getfoto = DB:: select("select * from sakip.master_program where id_program = '" . $pnbp->id_program . "' ");
                                foreach($getfoto as $list1){?>
                                <label class="form-label">{{$list1->nama_program}}</label>

                                <?php }?>
				</label><br>
				<label>Kegiatan	:
								<?php
                                $getkegiatan = DB:: select("select * from sakip.master_kegiatan where id_kegiatan = '" . $pnbp->id_kegiatan . "' ");
                                foreach($getkegiatan as $list2){?>
                                <label class="form-label">{{$list2->nama_kegiatan}}</label>

                                <?php }?>
				</label><br>
				<label>Detail Kegiatan	:
								{{$pnbp->detail_kegiatan}}
				</label><br>
				<label>Keluaran	:
								{{$pnbp->keluaran}}
				</label><br>
				<label>Akun	:
								{{$pnbp->akun}}
				</label><br>
				<label>Alokasi Anggaran Fisik	:
								{{buatrp($pnbp->alokasi_anggaran_fisik)}}
				</label><br>
				<label>Alokasi Anggaran Administrasi	:
								{{buatrp($pnbp->alokasi_anggaran_biaya_administrasi)}}
				</label>
        </header>
        <div class="panel-body">

			<br>
            <fieldset class="row">
			
                <div class="container">
                    <div class="panel-group col-lg-10" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                        Surat Pengantar Kalakgiat
                                <hr width="40%"></center>
                            </div>


                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Program : belum dapet isinya</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Dasar : belum dapet isinya</label>
                                    </div>
								
                                    <div class="form-group">
                                        <br><label for="nama_kegiatan" class="col-md-3 control-label"><u><b>Struktur Anggaran </b></u></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan : belum dapet isinya</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran/Output : belum dapet isinya</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan : belum dapet isinya</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Belanja : belum dapet isinya</label>
                                    </div>
									
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Akun : belum dapet isinya</label>
                                    </div>

                                    <div class="form-group">
                                        <br><label for="nama_kegiatan" class="col-md-3 control-label"><u><b>Anggaran </b></u></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi : belum dapet isinya</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Biaya Fisik : belum dapet isinya</label>
                                    </div>
									
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Biaya Administrasi : belum dapet isinya</label>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
								<br><center>
                                        Kerangka Acuan Kegiatan (KAK)/ TOR
                                <hr width="40%"></center>
                            </div>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga : {{$pnbp->kementrian_negara_lembaga}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit
                                            Organisasi/Satker : Pushidrosal</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Program : <?php
                                            {?>
                                            <label class="form-label">{{$list1->nama_program}}</label>
                                            <?php }?></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Hasil
                                            (Outcome) : {{$pnbp->hasil}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan : <?php
                                            {?>
                                            <label class="form-label">{{$list2->nama_kegiatan}}</label>
                                            <?php }?></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Indikator Kinerja
                                            Kegiatan : {{$pnbp->indikator_kinerja_kegiatan}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Keluaran : {{$pnbp->jenis_keluaran}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume
                                            Keluaran : {{$pnbp->volume_keluaran}}</label>
                                    </div>

                                    <div class="form-group">
                                        <br><label for="nama_kegiatan" class="col-md-3 control-label"><u><b>Latar Belakang </b></u></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Dasar Hukum : {{$pnbp->dasar_hukum}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambaran Umum : {{$pnbp->gambaran_umum}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Penerimaan
                                            Manfaat : {{$pnbp->penerimaan_manfaat}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Metode
                                            Pelaksanaan : {{$pnbp->metode_pelaksanaan}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Tahapan Dan Waktu
                                            Pelaksanaan : {{$pnbp->waktu_pelaksanaan}}</label>
                                    </div>

									<br>
                                    <table class="table table-bordered table-responsive" id="dynamic"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: black">
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
                                            Keluaran : {{$pnbp->waktu_pencapaian_keluaran}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Biaya Yang DI
                                            perlukan : {{buatrp($pnbp->biaya_yang_diperlukan)}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
								<br><center>
                                        Uraian Kegiatan dan Rincian Biaya
                                <hr width="40%"></center>
                            </div>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga : {{$pnbp->kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya}}</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Eselon I/II/
                                            Satker : {{$pnbp->unit_organisasi_satker}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Program : {{$pnbp->program_uraian_kegiatan_rincian_biaya}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan : {{$pnbp->kegiatan_uraian_kegiatan_rincian_biaya}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran
                                            (output) : {{$pnbp->keluaran_uraian_kegiatan_rincian_biaya}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan : {{$pnbp->detil_kegiatan}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume : {{$pnbp->volume}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur : {{$pnbp->satuan_ukur}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana : {{buatrp($pnbp->alokasi_dana)}}</label>
                                    </div>
								
									<br>
                                    <table class="table table-bordered table-responsive" id="dynamic2"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: black">
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
										<br><label for="Rekapitulasi" class="col-md-3 control-label"><u><b>Rekapitulasi </b></u></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Fisik : {{buatrp($pnbp->total_biaya_fisik)}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Administrasi : {{buatrp($pnbp->alokasi_anggaran_biaya_administrasi)}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Total : {{buatrp($pnbp->Total_keseluruhan)}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
								<br><center>
                                        Uraian dan Perincian Biaya Administrasi
                                <hr width="40%"></center>
                            </div>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit
                                            Organisasi : {{$pnbp->Unit_organisasi_satker}}</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana : {{buatrp($pnbp->alokasi_dana_uraian_biaya_administrasi)}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan : {{$pnbp->kegiatan_uraian_biaya_administrasi}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Waktu
                                            Pelaksanaan : {{$pnbp->waktu_pelaksanaan}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis
                                            Pengadaan : {{$pnbp->jenis_pengadaan}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur {{$pnbp->satuan_ukur_uraian_biaya_administrasi}}</label>
                                    </div>

                                    <br><table class="table table-bordered table-responsive" id="dynamic"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: black">
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
                                        <br><label for="" class="col-md-3 control-label">Kebutuhan biaya pengadaan : {{buatrp($pnbp->kebutuhan_biaya_pengadaan)}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Pagu anggaran : {{buatrp($pnbp->pagu_anggaran)}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Administrasi : {{buatrp($pnbp->biaya_administrasi)}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">Biaya Fisik : {{buatrp($pnbp->biaya_fisik)}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<br><center>
											Syarat - Syarat teknis Pelaksanaan
									<hr width="40%"></center>
								</div>
								<div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga : {{$pnbp->kementrian_negara}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Organisasi/
                                            Satker : {{$pnbp->unit_organisasi_satker_syarat_teknis_spesifikasi}}</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan : {{$pnbp->kegiatan_syarat_teknis_spesifikasi}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan : {{$pnbp->datil_kegiatan}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran : {{$pnbp->keluaran_syarat_teknis_spesifikasi}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume : {{$pnbp->volume_syarat_teknis_spesifikasi}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur : {{$pnbp->satuan_ukur_syarat_teknis_spesifikasi}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana : {{buatrp($pnbp->alokasi_dana_syarat_teknis_spesifikasi)}}</label>
                                    </div>


                                    <br><table class="table table-bordered table-responsive" id="dynamic"
                                           style="margin-left: 15px; width: 97%">
                                        <thead style="background-color: #286090;color: black">
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
								<br><br><center>
											Gambar/Denah
									<hr width="40%"></center>
								</div>
							<div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian
                                            Negara/Lembaga : {{$pnbp->kementrian_negara_gambar_denah}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit Organisasi/
                                            Satker : {{$pnbp->unit_organisasi_satker_gambar_denah}}</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan : {{$pnbp->kegiatan_gambar_denah}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran : {{$pnbp->keluaran_gambar_denah}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan : {{$pnbp->detail_kegiatan_gambar_denah}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume : {{$pnbp->volume_gambar_denah}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur : {{$pnbp->satuan_ukur_gambar_denah}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana : {{buatrp($pnbp->alokasi_dana_gambar_denah)}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">File Lampiran Gambar : {{$pnbp->upload_gambar_gambar_denah}}</label>
										<br><center><img src="{{asset('uploads/form_gambar/'.$pnbp->upload_gambar_gambar_denah.'')}}" width="200" height="200"></center>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<br><br><center>
											Bagan Organisasi Kegiatan
									<hr width="40%"></center>
							</div>
							<div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambar Lampiran Bagan
                                            Organisasi : {{$pnbp->upload_bagan_organisasi_gambar_denah}}</label>
										<br><center><img src="{{asset('uploads/form_gambar/'.$pnbp->upload_bagan_organisasi_gambar_denah.'')}}" width="200" height="200"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<br><br><center>
											Surat Pernyataaan Penanggung Jawab Mutlak
									<hr width="40%"></center>
                            </div>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Nama : {{$pnbp->yang_bertanggung_jawab_surat_pernyataan_mutlak}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jabatan : {{$pnbp->jabatan_surat_pernyataan_mutlak}}</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Upload Surat
                                            Pernyataan : {{$pnbp->upload_surat_pernyataan_surat_pernyataan_mutlak}}</label>
											<br><center><img src="{{asset('uploads/form_gambar/'.$pnbp->upload_surat_pernyataan_surat_pernyataan_mutlak.'')}}" width="200" height="200"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </fieldset>


        </div>
    </section>



</section>

<script type="text/javascript">
    window.onload = function () {
        window.print();
    }
</script>
