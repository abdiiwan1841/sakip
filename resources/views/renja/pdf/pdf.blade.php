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
    width: 50%;
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

  </header>
</section>

    <?php $mj = DB::table('kerangka_acuan_kegiatan')
    ->join('master_program','kerangka_acuan_kegiatan.id_program','=','master_program.id_program')
    ->join('master_kegiatan','kerangka_acuan_kegiatan.id_kegiatan','=','master_kegiatan.id_kegiatan')
    ->where('id_kerangka_acuan_kegiatan',$value4->id_kerangka_acuan_kegiatan)
    ->get()?>
    @foreach($mj as $kak)

    <div class="panel panel-default">
        <div class="panel-heading">
<br><center>
                    <b>KERANGKA ACUAN KEGIATAN (TERM OF REFERENCEC)</b>
            </center>
        </div>
        <br>
        <br>
        <br>

        <div style="margin-left:30px;">
            <div class="panel-body">
              <table class="none">
                  <tr>
                    <td>Kementerian Negara/Lembaga</td>
                    <td>: {{$kak->kementrian_negara_lembaga}}</td>
                  </tr>
                  <tr>
                    <td>Unit Organisasi/Satker</td>
                    <td>: Mabesal / Pushidrosal.</td>
                  </tr>
                  <tr>
                    <td>Program</td>
                    <td>: {{$kak->nama_program}}</td>
                  </tr>
                  <tr>
                    <td>Hasil (Outcome)</td>
                    <td>: {{$kak->hasil}}</td>
                  </tr>
                  <tr>
                    <td>Kegiatan</td>
                    <td>: {{$kak->nama_kegiatan}}</td>
                  </tr>
                  <tr>
                    <td>Indikator Kinerja Kegiatan</td>
                    <td>: {{$kak->indikator_kinerja_kegiatan}}</td>
                  </tr>
                  <tr>
                    <td>Jenis Keluaran</td>
                    <td>: {{$kak->jenis_keluaran}}</td>
                  </tr>
                  <tr>
                    <td>Volume Keluaran</td>
                    <td>: {{$kak->volume_keluaran}}</td>
                  </tr>
                  <tr>
                    <td>Satuan Ukur Keluaran (Output)</td>
                    <td>: {{$kak->satuan_ukur_keluaran}}</td>
                  </tr>
              </table>

                <div>
                    <br><h4><b>A. Latar Belakang </b></h4>
                </div>

                <div class="form-group" style="margin-left:60px;">
                    <p>1. Dasar Hukum <br><br><br>
                      {{$kak->dasar_hukum}} <br><br>
                      2. Gambaran Hukum <br><br><br>
                      {{$kak->gambaran_umum}} <br><br>
                    </p>
                </div>

                <div>
                    <br><h4><b>B. Penerimaan Manfaat </b></h4>
                </div>

                <div class="form-group" style="margin-left:60px;">
                    <p>{{$kak->penerimaan_manfaat}}</p>
                </div>

                <div>
                    <br><h4><b>C. Strategi Pencapaian Keluaran </b></h4>
                </div>

                <div class="form-group" style="margin-left:60px;">
                    <p>1. Metode Pelaksanaan <br><br><br>
                      {{$kak->metode_pelaksanaan}}<br><br>
                      2. Tahapan Dan Waktu Pelaksanaan <br><br><br>
                      {{$kak->waktu_pelaksanaan}}<br><br>
                    </p>
                </div>

                <div class="form-group" style="margin-left:80px;">
                    <p>b. Waktu Pelaksanaan</p>
                    <table class="collapse">
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
                      $waktu = DB::table('waktu_pelaksanaan')->where('id_waktu_pelaksanaan',$kak->id_kerangka_acuan_kegiatan)->get();?>
                      @foreach($waktu as $val)
                      <tr>
                          <td><center><?php echo $no++?></center></td>
                          <td><center><?php echo $val->uraian_kegiatan?></center></td>
                          <td><center><?php echo $val->jadwal_waktu?></center></td>
                      </tr>
                      @endforeach
                    </table>
                </div>
                <div>
                    <br><h4><b>D. Waktu Pencapaian Keluaran </b></h4>
                    <p>{{$kak->waktu_pencapaian_keluaran}}</p>
                </div>
                <div>
                    <br><h4><b>E. Biaya Yang Diperlukan </b></h4>
                    <p>Total biaya yang diperlukan sesuai RAB terlampir sebesar {{buatrp($kak->biaya_yang_diperlukan)}}</p>
                </div>
                <br>
                <br>
                <br>
                <div align="right">
                    <label align="center">Kepala Pushidrosal <br>Selaku <br>Pejabat Pembuat Komitmen<br><br><br><br><br><br><br>Harjo Susmoro <br> Laksamana Muda TNI</label>
                </div>



                <div style="page-break-after: always;">
                    -
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <section role="main" class="content-body">
      <header class="page-header">
      	<div class="right-wrapper pull-right" style="width: 50%">
            <h5>
        			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
        			PUSAT HIDROGRAFI DAN OSEANOGRAFI
        			<hr></center>
      		</h5>
      	</div>

      </header>
    </section>

        <?php
            $mj2 = DB::table('uraian_kegiatan_rincian_biaya')
            ->join('master_program','uraian_kegiatan_rincian_biaya.program','=','master_program.id_program')
            ->join('master_kegiatan','uraian_kegiatan_rincian_biaya.kegiatan','=','master_kegiatan.id_kegiatan')
            ->where('id_uraian_kegiatan_rincian_biaya',$value4->id_uraian_kegiatan_rincian_biaya)
            ->get();
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
            <br><center>
                        <b>RINCIAN ANGGARAN BIAYA (RAB) <br> KELUARAN (OUTPUT) KEGIATAN TA.</b>
                </center>
            </div>
            <br>
            <br>
            <br>
    @foreach($mj2 as $ukr)

    <table class="none">
      <tr>
        <td>Kementerian Negara/Lembaga</td>
        <td>: {{$ukr->kementrian_negara_lembaga}}</td>
      </tr>
      <tr>
        <td>Unit Eselon I/II/III/Satker</td>
        <td>: {{$ukr->unit_organisasi_satker}}</td>
      </tr>
      <tr>
        <td>Program</td>
        <td>: {{$ukr->nama_program}}</td>
      </tr>
      <tr>
        <td>Kegiatan</td>
        <td>: {{$ukr->nama_kegiatan}}</td>
      </tr>
      <tr>
        <td>Detail Kegiatan</td>
        <td>: {{$ukr->detil_kegiatan}}</td>
      </tr>
      <tr>
        <td>Volume Keluaran</td>
        <td>: {{$ukr->keluaran}}</td>
      </tr>
      <tr>
        <td>Satuan Ukur Keluaran (Output)</td>
        <td>: {{$ukr->satuan_ukur}}</td>
      </tr>
      <tr>
        <td>Alokasi Dana</td>
        <td>: {{buatrp($ukr->alokasi_dana)}}</td>
      </tr>
    </table>

        <div style="margin-left:30px;">
            <div class="panel-body">



<br>
                <table class="collapse">
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
                    $rak = DB::table('rincian_anggaran_biaya')->where('id_rincian_anggaran_biaya',$ukr->id_uraian_kegiatan_rincian_biaya)->get();
                    ?>
                    @foreach($rak as $rincian_anggaran_biaya_val)
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
                    @endforeach
                    <tr>
                      <td>I</td>
                      <td colspan="6">Biaya Fisik </td>
                      <td >{{buatrp($ukr->total_biaya_fisik)}}</td>
                    </tr>
                    <tr>
                      <td>II</td>
                      <td colspan="6">Biaya Administrasi</td>
                      <td>{{buatrp($ukr->total_biaya_administrasi)}}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="6">Total</td>
                      <td>{{buatrp($ukr->Total_keseluruhan)}}</td>
                    </tr>
                </table>
              </div>
            </div>
        </div>
    @endforeach
    <br>
    <br>
    <div align="right">
        <label align="center">Kepala Pushidrosal <br>Selaku <br>Pejabat Pembuat Komitmen<br><br><br><br><br><br><br>Harjo Susmoro <br> Laksamana Muda TNI</label>
    </div>

    <div style="page-break-after: always;">
        -
    </div>

    <section role="main" class="content-body">
      <header class="page-header">
      	<div class="right-wrapper pull-right" style="width: 50%">
            <h5>
        			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
        			PUSAT HIDROGRAFI DAN OSEANOGRAFI
        			<hr></center>
      		</h5>
      	</div>

      </header>
    </section>

    <div class="panel panel-default">
        <div style="margin-left:30px;">
          <?php
            $mj3 = DB::table('uraian_biaya_administrasi')
            ->join('master_kegiatan','uraian_biaya_administrasi.Kegiatan','=','master_kegiatan.id_kegiatan')
            ->where('id_uraian_biaya_administrasi',$value4->id_uraian_biaya_administrasi)
            ->get();
          ?>

          <div class="panel panel-default">
              <div class="panel-heading">
              <br><center>
                          <b>URAIAN DAN PERINCIAN BIAYA ADMINISTRASI</b>
                  </center>
              </div>
              <br>
              <br>
              <br>
          @foreach($mj3 as $uba)

          <table class="none">
            <tr>
              <td>Unit Eselon I/II/III/Satker</td>
              <td>: {{$uba->Unit_organisasi_satker}}</td>
            </tr>
            <tr>
              <td>Kegiatan</td>
              <td>: {{$uba->nama_kegiatan}}</td>
            </tr>
            <tr>
              <td>Waktu Pelaksanaan</td>
              <td>: {{$uba->waktu_pelaksanaan}}</td>
            </tr>
            <tr>
              <td>Satuan Ukur Keluaran (Output)</td>
              <td>: {{$uba->satuan_ukur}}</td>
            </tr>
            <tr>
              <td>Alokasi Dana</td>
              <td>: {{buatrp($uba->alokasi_dana)}}</td>
            </tr>
          </table>

                <br><table class="collapse">

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
                    $ulba = DB::table('uraian_lengkap_biaya_administrasi')->where('id_uraian_lengkap',$uba->id_uraian_biaya_administrasi)->get();
                    ?>
                    @foreach($ulba as $uraian_lengkap_biaya_administrasi_val)

                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $uraian_lengkap_biaya_administrasi_val->uraian_pekerjaan?></td>
                        <td><?php echo $uraian_lengkap_biaya_administrasi_val->jumlah_satuan?></td>
                        <td><?php echo buatrp($uraian_lengkap_biaya_administrasi_val->harga_satuan)?></td>
                        <td><?php echo $uraian_lengkap_biaya_administrasi_val->satuan?></td>
                        <td><?php echo buatrp($uraian_lengkap_biaya_administrasi_val->jumlah)?></td>
                    </tr>
                    @endforeach
                    <tr>
                      <td>I</td>
                      <td colspan="4">Kebutuhan biaya pengadaan </td>
                      <td >{{buatrp($uba->kebutuhan_biaya_pengadaan)}}</td>
                    </tr>
                    <tr>
                      <td>II</td>
                      <td colspan="4">Biaya Fisik</td>
                      <td>{{buatrp($uba->biaya_fisik)}}</td>
                    </tr>
                    <tr>
                      <td>III</td>
                      <td colspan="4">Biaya Administrasi</td>
                      <td>{{buatrp($uba->biaya_administrasi)}}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="4">Pagu anggaran</td>
                      <td>{{buatrp($uba->pagu_anggaran)}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    <br>
    <br>
    <div align="right">
        <label align="center">Kepala Pushidrosal <br>Selaku <br>Pejabat Pembuat Komitmen<br><br><br><br><br><br><br>Harjo Susmoro <br> Laksamana Muda TNI</label>
    </div>

    <div style="page-break-after: always;">
        -
    </div>

    <section role="main" class="content-body">
      <header class="page-header">
      	<div class="right-wrapper pull-right" style="width: 50%">
            <h5>
        			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
        			PUSAT HIDROGRAFI DAN OSEANOGRAFI
        			<hr></center>
      		</h5>
      	</div>

      </header>
    </section>

    <div class="panel panel-default">
        <div style="margin-left:30px;">
<?php
  $mj4  = DB::table('syarat_teknis_spesifikasi')->where('id_syarat_teknis',$value4->id_syarat_teknis)->get();
?>
<div class="panel panel-default">
    <div class="panel-heading">
    <br><center>
                <b>SYARAT TEKNIS / SPESIFIKASI</b>
        </center>
    </div>
    <br>
    <br>
    <br>
@foreach($mj4 as $sts)
<table class="none">
    <tr>
      <td>Kementerian Negara/Lembaga</td>
      <td>: {{$sts->kementrian_negara}}</td>
    </tr>
    <tr>
      <td>Unit Organisasi/Satker</td>
      <td>: {{$sts->unit_organisasi_satker}}</td>
    </tr>
    <tr>
      <td>Program</td>
      <td>: {{$kak->nama_program}}</td>
    </tr>
    <tr>
      <td>Kegiatan</td>
      <td>: {{$sts->kegiatan}}</td>
    </tr>
    <tr>
      <td>Detail Kegiatan</td>
      <td>: {{$sts->datil_kegiatan}}</td>
    </tr>
    <tr>
      <td>Keluaran</td>
      <td>: {{$sts->keluaran}}</td>
    </tr>
    <tr>
      <td>Volume</td>
      <td>: {{$sts->volume}}</td>
    </tr>
    <tr>
      <td>Satuan Ukur Keluaran (Output)</td>
      <td>: {{$sts->satuan_ukur}}</td>
    </tr>
    <tr>
      <td>Alokai Dana</td>
      <td>: {{buatrp($sts->alokasi_dana)}}</td>
    </tr>
</table>
                <br><table class="collapse ">

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
                    $ts   = DB::table('table_spesifikasi')->where('id_table_spesifikasi',$sts->id_syarat_teknis)->get();
                    ?>
                    @foreach($ts as $tabel_spesifikasi_val)
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $tabel_spesifikasi_val->uraian_pekerjaan?></td>
                        <td><?php echo $tabel_spesifikasi_val->spesifikasi?></td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    @endforeach

    <br>
    <br>
    <div align="right">
        <label align="center">Kepala Pushidrosal <br>Selaku <br>Pejabat Pembuat Komitmen<br><br><br><br><br><br><br>Harjo Susmoro <br> Laksamana Muda TNI</label>
    </div>



    <div style="page-break-after: always;">
        -
    </div>

    <section role="main" class="content-body">
      <header class="page-header">
      	<div class="right-wrapper pull-right" style="width: 50%">
            <h5>
        			<center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
        			PUSAT HIDROGRAFI DAN OSEANOGRAFI
        			<hr></center>
      		</h5>
      	</div>

      </header>
    </section>

    <div class="panel panel-default">
        <div style="margin-left:30px;">

        <?php
            $mj5  = DB::table('gambar_denah')->where('id_gambar_denah',$value4->id_gambar_denah)->get();
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
            <br><center>
                        <b>GAMBAR / DENAH</b>
                </center>
            </div>
            <br>
            <br>
            <br>

          @foreach($mj5 as $gd)
          <table class="none">
              <tr>
                <td>Kementerian Negara/Lembaga</td>
                <td>: {{$gd->kementrian_negara}}</td>
              </tr>
              <tr>
                <td>Unit Organisasi/Satker</td>
                <td>: {{$gd->unit_organisasi_satker}}</td>
              </tr>
              <tr>
                <td>Kegiatan</td>
                <td>: {{$gd->kegiatan}}</td>
              </tr>
              <tr>
                <td>Detail Kegiatan</td>
                <td>: {{$gd->detil_kegiatan}}</td>
              </tr>
              <tr>
                <td>Keluaran</td>
                <td>: {{$gd->keluaran}}</td>
              </tr>
              <tr>
                <td>Volume</td>
                <td>: {{$gd->volume}}</td>
              </tr>
              <tr>
                <td>Satuan Ukur Keluaran (Output)</td>
                <td>: {{$gd->satuan_ukur}}</td>
              </tr>
              <tr>
                <td>Alokai Dana</td>
                <td>: {{buatrp($gd->alokasi_dana)}}</td>
              </tr>
          </table>

<br><center><img src="{{asset('uploads/form_gambar/'.$gd->upload_gambar.'')}}" width="600" height="400"></center>
</div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

@endforeach

<div align="right">
    <label align="center">Kepala Pushidrosal <br>Selaku <br>Pejabat Pembuat Komitmen<br><br><br><br>Harjo Susmoro <br> Laksamana Muda TNI</label>
</div>


<div style="page-break-after: always;">
    -
</div>

<section role="main" class="content-body">
  <header class="page-header">
    <div class="right-wrapper pull-right" style="width: 50%">
        <h5>
          <center>TENTARA NASIONAL INDONESIA ANGKATAN LAUT<br>
          PUSAT HIDROGRAFI DAN OSEANOGRAFI
          <hr></center>
      </h5>
    </div>

  </header>
</section>

<?php
    $mj6   = DB::table('bagan_organisasi')->where('id_bagan_organisasi',$value4->id_bagan_organisasi)->get();
?>
<div class="panel panel-default">
    <div class="panel-heading">
    <br><center>
                <b>BAGAN ORGANISASI</b>
        </center>
    </div>
    <br>
    <br>
    <br>
@foreach($mj6 as $bo)
<div style="margin-left:30px;">
        <div class="panel-body">
            <div class="form-group">
<br><center><img src="{{asset('uploads/form_gambar/'.$bo->upload_bagan_organisasi.'')}}" width="700" height="500"></center>
            </div>
        </div>
    </div>
</div>

@endforeach

        </div>

    </section>
</section>


<script type="text/javascript">
    window.onload = function () {
        window.print();
    }
</script>
