<?php
function buatrp($angka)
{
 $jadi = "Rp ".number_format($angka,2,',','.');
 return $jadi;
}
?>
<style type="text/css">
  table.collapse {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      font-size: 11pt;
  }
  table.none {
    border-style: none;font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
    font-size: 11pt;
  }
  table.collapse td, th{
     border: 1px solid #333;
     padding: 6px;
 }
 @media print {
    footer {page-break-after: always;}
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
                                $getfoto = DB:: select("select * from sakip.master_program where id_program = '" . $apbn->id_program . "' ");
                                foreach($getfoto as $list1){?>
                                <label class="form-label">{{$list1->nama_program}}</label>

                                <?php }?>
				</label><br>
				<label>Kegiatan	:
								<?php
                                $getkegiatan = DB:: select("select * from sakip.master_kegiatan where id_kegiatan = '" . $apbn->id_kegiatan . "' ");
                                foreach($getkegiatan as $list2){?>
                                <label class="form-label">{{$list2->nama_kegiatan}}</label>

                                <?php }?>
				</label><br>
				<label>Detail Kegiatan	:
								{{$apbn->detail_kegiatan}}
				</label><br>
				<label>Keluaran	:
								{{$apbn->keluaran}}
				</label><br>
				<label>Akun	:
								{{$apbn->akun}}
				</label><br>
				<label>Alokasi Anggaran Fisik	:
								{{buatrp($apbn->alokasi_anggaran_fisik)}}
				</label><br>
				<label>Alokasi Anggaran Administrasi	:
								{{buatrp($apbn->alokasi_anggaran_biaya_administrasi)}}
				</label>
        </header>
        <div class="panel-body">

			<br>
      <div style="page-break-after: always;">
          -
      </div>
            <fieldset class="row">

                <div class="container">
                    <div class="panel-group col-lg-10" id="accordion">
                      <section role="main" class="content-body">
                        <header class="page-header">
                        	<div class="right-wrapper pull-right" style="width: 50%">
                              <h6>
                          			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                          			PUSAT HIDROGRAFI DAN OSEANOGRAFI
                          			<hr></center>
                        		</h6>
                        	</div>

                        </header>
                      </section>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                        <b>SURAT PENGANTAR KALAKGIAT</b>
                                <hr width="40%"></center>
                            </div>

                            @foreach($kalakgiat as $val)
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                  <table class="none">
                                    <tr>
                                      <td>Nomor</td>
                                      <td>: {{$val->nomor_kalakgiat}}</td>
                                    </tr>
                                    <tr>
                                      <td>Klasifikasi</td>
                                      <td>: {{$val->klasifikasi}}</td>
                                    </tr>
                                    <tr>
                                      <td>Lampiran</td>
                                      <td>: {{$val->lampiran}}</td>
                                    </tr>
                                    <tr>
                                      <td>Prihal</td>
                                      <td>: {{$val->perihal}}</td>
                                    </tr>
                                  </table>
                                  <p>{{$val->isi}} <br>
                                  </p>

                                  <div style="margin-left:80%">
                                    <center>
                                    <label>Kepala Pushidrosal <br><br><br><br> Daryanto <br> Laksamana Muda TNI</label>
                                    </center>
                                  </div>

                                  <div>
                                    <p>Tembusan<br>
                                    <?php $tbs = DB::table('tembusan_kalakgiat')->where('id_kalakgiat',$val->id_kalakgiat)->get()

                                    ?>
                                    @foreach($tbs as $tembus)
                                    {{$no++}}. {{$tembus->kepada}}</p>
                                    @endforeach
                                  </div>
                                </div>
                            </div>
                            @endforeach
                            <div style="page-break-after: always;">
                                -
                            </div>


                        </div>


                        <div class="panel panel-default">
                          <header class="page-header">
                          	<div class="right-wrapper pull-right" style="width: 50%">
                                <h6>
                            			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                            			PUSAT HIDROGRAFI DAN OSEANOGRAFI
                            			<hr></center>
                          		</h6>
                          	</div>

                          </header>
                            <div class="panel-heading">
								<br><center>
                                      <b>KERANGKA ACUAN KEGIATAN (TERM OF REFERENCEC)</b>
                                <hr width="40%"></center>
                            </div>

                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                  <br>
                                  <br>
                                  <br>

                                  <div style="margin-left:30px;">
                                      <div class="panel-body">
                                        <table class="none">
                                            <tr>
                                              <td>Kementerian Negara/Lembaga</td>
                                              <td>: {{$apbn->kementrian_negara_lembaga}}</td>
                                            </tr>
                                            <tr>
                                              <td>Unit Organisasi/Satker</td>
                                              <td>: Mabesal / Pushidrosal.</td>
                                            </tr>
                                            <tr>
                                              <td>Program</td>
                                              <td>: {{$list1->nama_program}}</td>
                                            </tr>
                                            <tr>
                                              <td>Hasil (Outcome)</td>
                                              <td>: {{$apbn->hasil}}</td>
                                            </tr>
                                            <tr>
                                              <td>Kegiatan</td>
                                              <td>: {{$list2->nama_kegiatan}}</td>
                                            </tr>
                                            <tr>
                                              <td>Indikator Kinerja Kegiatan</td>
                                              <td>: {{$apbn->indikator_kinerja_kegiatan}}</td>
                                            </tr>
                                            <tr>
                                              <td>Jenis Keluaran</td>
                                              <td>: {{$apbn->jenis_keluaran}}</td>
                                            </tr>
                                            <tr>
                                              <td>Volume Keluaran</td>
                                              <td>: {{$apbn->volume_keluaran}}</td>
                                            </tr>

                                        </table>

                                          <div>
                                              <br><h4><b>A. Latar Belakang </b></h4>
                                          </div>

                                          <div class="form-group" style="margin-left:60px;">
                                              <p>1. Dasar Hukum <br><br>
                                                {{$apbn->dasar_hukum}} <br><br><br>
                                                2. Gambaran Hukum <br><br>
                                                {{$apbn->gambaran_umum}} <br><br><br>
                                              </p>
                                          </div>

                                          <div>
                                              <br><h4><b>B. Penerimaan Manfaat </b></h4>
                                          </div>

                                          <div class="form-group" style="margin-left:60px;">
                                              <p>{{$apbn->penerimaan_manfaat}}</p>
                                          </div>

                                          <div>
                                              <br><h4><b>C. Strategi Pencapaian Keluaran </b></h4>
                                          </div>

                                          <div class="form-group" style="margin-left:60px;">
                                              <p>1. Metode Pelaksanaan <br><br><br>
                                                {{$apbn->metode_pelaksanaan}}<br><br>
                                                2. Tahapan Dan Waktu Pelaksanaan <br><br><br>
                                                {{$apbn->waktu_pelaksanaan}}<br><br>
                                              </p>
                                          </div>

									<br>
                                    <table class="collapse" id="dynamic"
                                           style="margin-left: 15px; width: 97%">

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


                                        <?php
                                        $no = 1;
                                        foreach($waktu_pelaksanaan as $waktu_pelaksanaan_val){ ?>
                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $waktu_pelaksanaan_val->uraian_kegiatan?></td>
                                            <td><?php echo $waktu_pelaksanaan_val->jadwal_waktu?></td>
                                        </tr>
                                        <?php }?>

                                    </table>

                                    <br><br>
                                    <div>
                                        <br><h4><b>D. Waktu Pencapaian Keluaran </b></h4>
                                        <p>{{$apbn->waktu_pencapaian_keluaran}}</p>
                                    </div>
                                    <div>
                                        <br><h4><b>E. Biaya Yang Diperlukan </b></h4>
                                        <p>Total biaya yang diperlukan sesuai RAB terlampir sebesar {{buatrp($apbn->biaya_yang_diperlukan)}}</p>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div style="margin-left:65%">
                          <center>
                          <label>Kepala Pushidrosal <br>Selaku<br>Pejabat Pembuat Komitmen,<br><br><br><br><br><br> Harja Susmoro <br> Laksamana Muda TNI</label>
                          </center>
                        </div>


                        <div class="panel panel-default">
                          <div style="page-break-after: always;">
                              -
                          </div>


                      </div>


                      <div class="panel panel-default">
                        <header class="page-header">
                          <div class="right-wrapper pull-right" style="width: 50%">
                              <h5>
                                <center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                                PUSAT HIDROGRAFI DAN OSEANOGRAFI
                                <hr></center>
                            </h5>
                          </div>

                        </header>
                            <div class="panel-heading">
								<br><center>
                                        RINCIAN ANGGARAN BIAYA (RAB) <br> KELUARAN (OUTPUT) KEGIATAN
                                <hr width="40%"></center>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                            <table class="none">
                              <tr>
                                <td>Kementerian Negara/Lembaga</td>
                                <td>: {{$apbn->kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya}}</td>
                              </tr>
                              <tr>
                                <td>Unit Eselon I/II/III/Satker</td>
                                <td>: {{$apbn->unit_organisasi_satker}}</td>
                              </tr>
                              <tr>
                                <td>Program</td>
                                <td>: {{$apbn->program_uraian_kegiatan_rincian_biaya}}</td>
                              </tr>
                              <tr>
                                <td>Kegiatan</td>
                                <td>: {{$apbn->kegiatan_uraian_kegiatan_rincian_biaya}}</td>
                              </tr>
                              <tr>
                                <td>Detail Kegiatan</td>
                                <td>: {{$apbn->kegiatan_uraian_kegiatan_rincian_biaya}}</td>
                              </tr>
                              <tr>
                                <td>Volume Keluaran</td>
                                <td>: {{$apbn->volume}}</td>
                              </tr>
                              <tr>
                                <td>Satuan Ukur Keluaran (Output)</td>
                                <td>: {{$apbn->satuan_ukur}}</td>
                              </tr>
                              <tr>
                                <td>Alokasi Dana</td>
                                <td>: {{buatrp($apbn->alokasi_dana)}}</td>
                              </tr>
                            </table>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
									<br>
                                    <table class="collapse" id="dynamic2"
                                           style="margin-left: 15px; width: 97%">
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
                                        <tr>
                                          <td>I</td>
                                          <td colspan="6">Biaya Fisik </td>
                                          <td >{{buatrp($apbn->total_biaya_fisik)}}</td>
                                        </tr>
                                        <tr>
                                          <td>II</td>
                                          <td colspan="6">Biaya Administrasi</td>
                                          <td>{{buatrp($apbn->alokasi_anggaran_biaya_administrasi)}}</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="6">Total</td>
                                          <td>{{buatrp($apbn->Total_keseluruhan)}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div style="margin-left:65%">
                          <center>
                          <label>Kepala Pushidrosal <br>Selaku<br>Pejabat Pembuat Komitmen,<br><br><br><br><br><br> Harja Susmoro <br> Laksamana Muda TNI</label>
                          </center>
                        </div>

                        <div class="panel panel-default">
                          <div style="page-break-after: always;">
                              -
                          </div>


                      </div>


                      <div class="panel panel-default">
                        <header class="page-header">
                          <div class="right-wrapper pull-right" style="width: 50%">
                              <h6>
                                <center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                                PUSAT HIDROGRAFI DAN OSEANOGRAFI
                                <hr></center>
                            </h6>
                          </div>

                        </header>
                            <div class="panel-heading">
								<br><center>
                                        URAIAN DAN PERINCIAN BIAYA ADMINSITRASI
                                <hr width="40%"></center>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                  <table class="none">
                                    <tr>
                                      <td>Unit Eselon I/II/III/Satker</td>
                                      <td>: {{$apbn->Unit_organisasi_satker}}</td>
                                    </tr>
                                    <tr>
                                      <td>Kegiatan</td>
                                      <td>: {{buatrp($apbn->alokasi_dana_uraian_biaya_administrasi)}}</td>
                                    </tr>
                                    <tr>
                                      <td>Waktu Pelaksanaan</td>
                                      <td>: {{$apbn->waktu_pelaksanaan}}</td>
                                    </tr>
                                    <tr>
                                      <td>Satuan Ukur Keluaran (Output)</td>
                                      <td>: {{$apbn->satuan_ukur_uraian_biaya_administrasi}}</td>
                                    </tr>
                                    <tr>
                                      <td>Alokasi Dana</td>
                                      <td>: {{buatrp($apbn->alokasi_dana_uraian_biaya_administrasi)}}</td>
                                    </tr>
                                  </table>
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Unit
                                            Organisasi : {{$apbn->Unit_organisasi_satker}}</label>
                                    </div>


                                    <br><table class="collapse" id="dynamic"
                                           style="margin-left: 15px; width: 97%">

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
                                        <tr>
                                          <td>I</td>
                                          <td colspan="4">Kebutuhan biaya pengadaan </td>
                                          <td >{{buatrp($apbn->kebutuhan_biaya_pengadaan)}}</td>
                                        </tr>
                                        <tr>
                                          <td>II</td>
                                          <td colspan="4">Biaya Fisik</td>
                                          <td>{{buatrp($apbn->biaya_fisik)}}</td>
                                        </tr>
                                        <tr>
                                          <td>III</td>
                                          <td colspan="4">Biaya Administrasi</td>
                                          <td>{{buatrp($apbn->biaya_administrasi)}}</td>
                                        </tr>
                                        <tr>
                                          <td>IV</td>
                                          <td colspan="4">Pagu anggaran</td>
                                          <td>{{buatrp($apbn->pagu_anggaran)}}</td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div style="margin-left:65%">
                          <center>
                          <label>Kepala Pushidrosal <br>Selaku<br>Pejabat Pembuat Komitmen,<br><br><br><br><br><br> Harja Susmoro <br> Laksamana Muda TNI</label>
                          </center>
                        </div>
                        <div class="panel panel-default">
                          <div style="page-break-after: always;">
                              -
                          </div>


                      </div>


                      <div class="panel panel-default">
                        <header class="page-header">
                          <div class="right-wrapper pull-right" style="width: 50%">
                              <h6>
                                <center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                                PUSAT HIDROGRAFI DAN OSEANOGRAFI
                                <hr></center>
                            </h6>
                          </div>

                        </header>
                            <div class="panel-heading">
								<br><center>
											SYARAT TEKNIS / SPESIFIKASI
									<hr width="40%"></center>
								</div>
                <br>
                <br>
                <br>
                <br>
								<div style="margin-left:30px;">
                  <div class="panel-body">
                    <table class="none">
                        <tr>
                          <td>Kementerian Negara/Lembaga</td>
                          <td>: {{$apbn->kementrian_negara}}</td>
                        </tr>
                        <tr>
                          <td>Unit Organisasi/Satker</td>
                          <td>: {{$apbn->unit_organisasi_satker_syarat_teknis_spesifikasi}}</td>
                        </tr>
                        <tr>
                          <td>Kegiatan</td>
                          <td>: {{$apbn->kegiatan_syarat_teknis_spesifikasi}}</td>
                        </tr>
                        <tr>
                          <td>Detail Kegiatan</td>
                          <td>: {{$apbn->datil_kegiatan}}</td>
                        </tr>
                        <tr>
                          <td>Keluaran</td>
                          <td>: {{$apbn->keluaran_syarat_teknis_spesifikasi}}</td>
                        </tr>
                        <tr>
                          <td>Volume</td>
                          <td>: {{$apbn->volume_syarat_teknis_spesifikasi}}</td>
                        </tr>
                        <tr>
                          <td>Satuan Ukur Keluaran (Output)</td>
                          <td>: {{$apbn->satuan_ukur_syarat_teknis_spesifikasi}}</td>
                        </tr>
                        <tr>
                          <td>Alokai Dana</td>
                          <td>: {{buatrp($apbn->alokasi_dana_syarat_teknis_spesifikasi)}}</td>
                        </tr>
                    </table>

                                    <br><table class="collapse" id="dynamic"
                                           style="margin-left: 15px; width: 97%">

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


                                        <?php
                                        $no = 1;
                                        foreach ($tabel_spesifikasi as $tabel_spesifikasi_val){?>

                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $tabel_spesifikasi_val->uraian_pekerjaan?></td>
                                            <td><?php echo $tabel_spesifikasi_val->spesifikasi?></td>
                                        </tr>
                                        <?php }?>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div style="margin-left:65%">
                          <center>
                          <label>Kepala Pushidrosal <br>Selaku<br>Pejabat Pembuat Komitmen,<br><br><br><br><br><br> Harja Susmoro <br> Laksamana Muda TNI</label>
                          </center>
                        </div>
                        <div class="panel panel-default">
                          <div style="page-break-after: always;">
                              -
                          </div>


                      </div>


                      <div class="panel panel-default">
                        <header class="page-header">
                          <div class="right-wrapper pull-right" style="width: 50%">
                              <h6>
                                <center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                                PUSAT HIDROGRAFI DAN OSEANOGRAFI
                                <hr></center>
                            </h6>
                          </div>

                        </header>
                            <div class="panel-heading">
								<br><br><center>
											GAMBAR / DENAH
									<hr width="40%"></center>
								</div>
							<div style="margin-left:30px;">
                  <div class="panel-body">
                    <table class="none">
                        <tr>
                          <td>Kementerian Negara/Lembaga</td>
                          <td>: {{$apbn->kementrian_negara_gambar_denah}}</td>
                        </tr>
                        <tr>
                          <td>Unit Organisasi/Satker</td>
                          <td>: {{$apbn->unit_organisasi_satker_gambar_denah}}</td>
                        </tr>
                        <tr>
                          <td>Kegiatan</td>
                          <td>: {{$apbn->kegiatan_gambar_denah}}</td>
                        </tr>
                        <tr>
                          <td>Detail Kegiatan</td>
                          <td>: {{$apbn->detail_kegiatan_gambar_denah}}</td>
                        </tr>
                        <tr>
                          <td>Keluaran</td>
                          <td>: {{$apbn->keluaran_gambar_denah}}</td>
                        </tr>
                        <tr>
                          <td>Volume</td>
                          <td>: {{$apbn->volume_gambar_denah}}</td>
                        </tr>
                        <tr>
                          <td>Satuan Ukur Keluaran (Output)</td>
                          <td>: {{$apbn->satuan_ukur_gambar_denah}}</td>
                        </tr>
                        <tr>
                          <td>Alokai Dana</td>
                          <td>: {{buatrp($apbn->alokasi_dana_gambar_denah)}}</td>
                        </tr>
                    </table>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">File Lampiran Gambar : {{$apbn->upload_gambar_gambar_denah}}</label>
										<br><center><img src="{{asset('uploads/form_gambar/'.$apbn->upload_gambar_gambar_denah.'')}}" width="600" height="400"></center>
									</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div style="margin-left:65%">
                          <center>
                          <label>Kepala Pushidrosal <br>Selaku<br>Pejabat Pembuat Komitmen,<br><br><br><br><br><br> Harja Susmoro <br> Laksamana Muda TNI</label>
                          </center>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <div style="page-break-after: always;">
                                  -
                              </div>


                          </div>


                          <div class="panel panel-default">
                            <header class="page-header">
                            	<div class="right-wrapper pull-right" style="width: 50%">
                                  <h6>
                              			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                              			PUSAT HIDROGRAFI DAN OSEANOGRAFI
                              			<hr></center>
                            		</h6>
                            	</div>

                            </header>
								<br><br><center>
											BAGAN ORGANISASI KEGIATAN
									<hr width="40%"></center>
							</div>
              <br>
              <br>
              <br>
							<div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambar Lampiran Bagan
                                            Organisasi : {{$apbn->upload_bagan_organisasi_gambar_denah}}</label>
										<br><center><img src="{{asset('uploads/form_gambar/'.$apbn->upload_bagan_organisasi_gambar_denah.'')}}" width="600" height="400"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div style="margin-left:65%">
                          <center>
                          <label>Kepala Pushidrosal <br>Selaku<br>Pejabat Pembuat Komitmen,<br><br><br><br><br><br> Harja Susmoro <br> Laksamana Muda TNI</label>
                          </center>
                        </div>
                        <div class="panel panel-default">
                          <div style="page-break-after: always;">
                              -
                          </div>


                      </div>


                      <div class="panel panel-default">
                        <header class="page-header">
                          <div class="right-wrapper pull-right" style="width: 50%">
                              <h6>
                                <center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
                                PUSAT HIDROGRAFI DAN OSEANOGRAFI
                                <hr></center>
                            </h6>
                          </div>

                        </header>
                            <div class="panel-heading">
								<br><br><center>
											SURAT PERNYATAAN PENANGGUNG JAWAB MUTLAK
									<hr width="40%"></center>
                            </div>
                            <div style="margin-left:30px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Nama : {{$apbn->yang_bertanggung_jawab_surat_pernyataan_mutlak}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Jabatan : {{$apbn->jabatan_surat_pernyataan_mutlak}}</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="nama_kegiatan" class="col-md-3 control-label">Upload Surat
                                            Pernyataan : {{$apbn->upload_surat_pernyataan_surat_pernyataan_mutlak}}</label>
											<br><center><img src="{{asset('uploads/form_gambar/'.$apbn->upload_surat_pernyataan_surat_pernyataan_mutlak.'')}}" width="600" height="400"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div style="margin-left:65%">
                      <center>
                      <label>Kepala Pushidrosal <br>Selaku<br>Pejabat Pembuat Komitmen,<br><br><br><br><br><br> Harja Susmoro <br> Laksamana Muda TNI</label>
                      </center>
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
