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
        <h2>Form List Ceklist APBN</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{URL::to('/home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>APBN</span></li>
                <li><span>Form List Ceklist APBN</span></li>
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

            <h2 class="panel-title">Form List Ceklist APBN</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
            <?php foreach($datalist as $list){ ?>
            <div class="form-group">
                <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Jenis Perencaan Kegiatan</label>
                <div class="col-md-7">

                    <select class="form-control select2me" name="id_rencana_program_rengiat"
                            id="id_rencana_program_rengiat">
                        <option value='0' selected>- Pilih Jenis Perencaan Kegiatan -</option>


                        <?php foreach($rencana as $row){ ?>
                        <option value="<?php echo $row->id_program; ?>" <?php if ($row->id_program == $list->id_program) {
                            echo "selected";
                        }?>><?php echo $row->nama_program; ?></option>
                        <?php } ?>

                    </select>

                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran</label>
                <div class="col-md-7">
					
						
                    <select class="form-control select2me" name="keluaran"
                            id="id_rencana_program_rengiat">
                        <option value='0' selected>- Pilih Jenis Perencaan Kegiatan -</option>


                        <?php foreach($kegiatan as $row2){ ?>
                        <option value="<?php echo $row2->id_kegiatan; ?>" <?php if ($row2->id_kegiatan == $list->keluaran) {
                            echo "selected";
                        }?>><?php echo $row2->nama_kegiatan; ?></option>
                        <?php } ?>

                    </select>
                    <!--<input class="form-control" name="keluaran" type="text" value="<?php echo $list->keluaran; ?>"
                           id="keluaran">-->

                </div>
            </div>

            <div class="form-group">
                <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Jenis Perencaan Kegiatan</label>
                <div class="col-md-7">

                    <select class="form-control select2me" name="id_rencana_program_rengiat"
                            id="id_rencana_program_rengiat">
                        <option value='0' selected>- Pilih Jenis Perencaan Kegiatan -</option>


                        <?php foreach($kegiatan as $row2){ ?>
                        <option value="<?php echo $row2->id_kegiatan; ?>" <?php if ($row2->id_kegiatan == $list->id_kegiatan) {
                            echo "selected";
                        }?>><?php echo $row2->nama_kegiatan; ?></option>
                        <?php } ?>

                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Detail Kegiatan</label>
                <div class="col-md-7">

                    <input class="form-control" name="detail_kegiatan" type="text"
                           value="<?php echo $list->detail_kegiatan; ?>" id="detail_kegiatan">

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Anggaran Fisik</label>
                <div class="col-md-7">

                    <input class="form-control" name="anggaran_fisik" type="text"
                           value="<?php echo buatrp($list->alokasi_anggaran_fisik); ?>" id="anggaran_fisik">

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Anggaran Administrasi</label>
                <div class="col-md-7">

                    <input class="form-control" name="anggaran_administrasi" type="text"
                           value="<?php echo buatrp($list->alokasi_anggaran_biaya_administrasi); ?>" id="anggaran_administrasi">

                </div>
            </div>
			<div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Update At</label>
                <div class="col-md-7">

                    <input class="form-control" name="update" type="text"
                           value="<?php echo $list->update_at; ?>" id="anggaran_administrasi"readonly>

                </div>
            </div>


        <!--
                                    <div class="form-group">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-7">
                                         {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('/list_kegiatan')}}" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>
-->
            <br><br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Komponen Pemeriksaan</center>
                    </th>
                    <th>
                        <center>ADA/TIDAK</center>
                    </th>
                    <th>
                        <center>Keterangan</center>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>
                        <center>1</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form1/'.$list->id_perencanaan_kegiatan) }}">Surat Pengantar
                                Kalakgiat</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_surat_pengantar_kalakgiat == null || $list->id_surat_pengantar_kalakgiat == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
							<?php 
							
							if ($list->id_surat_pengantar_kalakgiat == null || $list->id_surat_pengantar_kalakgiat == 0) {
                                echo "";
                            } else {
								$kalakgiat = DB::select(" SELECT * FROM kalakgiat where id_kalakgiat = '" . $list->id_surat_pengantar_kalakgiat . "'");
                                foreach($kalakgiat as $kalakgiat){$status = $kalakgiat->status;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>	
						</center>
                    </th>
                </tr>
				<tr>
                    <th>
                        <center>2</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form9/'.$list->id_perencanaan_kegiatan) }}">Upload Rencana Kegiatan</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_file_rencana_kegiatan == null || $list->id_file_rencana_kegiatan == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_file_rencana_kegiatan == null || $list->id_file_rencana_kegiatan == 0) {
                                echo "";
                            } else {
								$file_rencana_kegiatan = DB::select(" SELECT * FROM file_rencana_kegiatan where id = '" . $list->id_file_rencana_kegiatan . "'");
                                foreach($file_rencana_kegiatan as $file_rencana_kegiatan){$status = $file_rencana_kegiatan->status;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
						?>
						</center>
                    </th>
                </tr>
                <tr>
                    <th>
                        <center>3</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form2/'.$list->id_perencanaan_kegiatan) }}">Kerangka Acuan
                                Kegiatan (KAK)/ TOR</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_kerangka_acuan_kegiatan == null || $list->id_kerangka_acuan_kegiatan == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_kerangka_acuan_kegiatan == null || $list->id_kerangka_acuan_kegiatan == 0) {
                                echo "";
                            } else {
								$kerangka_acuan_kegiatan = DB::select(" SELECT * FROM kerangka_acuan_kegiatan where id_kerangka_acuan_kegiatan = '" . $list->id_kerangka_acuan_kegiatan . "'");
                                foreach($kerangka_acuan_kegiatan as $kerangka_acuan_kegiatan){$status = $kerangka_acuan_kegiatan->status_;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>
						</center>
                    </th>
                </tr>
                <tr>
                    <th>
                        <center>4</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form3/'.$list->id_perencanaan_kegiatan) }}">Uraian Kegiatan dan
                                Rincian Biaya</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_uraian_kegiatan_rincian_biaya == null || $list->id_uraian_kegiatan_rincian_biaya == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_uraian_kegiatan_rincian_biaya == null || $list->id_uraian_kegiatan_rincian_biaya == 0) {
                                echo "";
                            } else {
								$uraian_kegiatan_rincian_biaya = DB::select(" SELECT * FROM uraian_kegiatan_rincian_biaya where id_uraian_kegiatan_rincian_biaya = '" . $list->id_uraian_kegiatan_rincian_biaya . "'");
                                foreach($uraian_kegiatan_rincian_biaya as $uraian_kegiatan_rincian_biaya){$status = $uraian_kegiatan_rincian_biaya->status_;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>
						</center>
                    </th>
                </tr>
                <!-- <tr>
                        <th><center></center></th>
                        <th><center>Format RAB</center></th>
                        <th><center></center></th>
                        <th><center></center></th>
                </tr>
                <tr>
                        <th><center></center></th>
                        <th><center>Harga Satuan</center></th>
                        <th><center></center></th>
                        <th><center></center></th>
                </tr>
                <tr>
                        <th><center></center></th>
                        <th><center>Jumlah Harga/ Perhitungan</center></th>
                        <th><center></center></th>
                        <th><center></center></th>
                </tr> -->
                <tr>
                    <th>
                        <center>5</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form4/'.$list->id_perencanaan_kegiatan) }}">Uraian dan Perincian
                                Biaya Administrasi</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_uraian_biaya_administrasi == null || $list->id_uraian_biaya_administrasi == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_uraian_biaya_administrasi == null || $list->id_uraian_biaya_administrasi == 0) {
                                echo "";
                            } else {
								$uraian_biaya_administrasi = DB::select(" SELECT * FROM uraian_biaya_administrasi where id_uraian_biaya_administrasi = '" . $list->id_uraian_biaya_administrasi . "'");
                                foreach($uraian_biaya_administrasi as $uraian_biaya_administrasi){$status = $uraian_biaya_administrasi->status_;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>
						</center>
                    </th>
                </tr>
                <tr>
                    <th>
                        <center>6</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form5/'.$list->id_perencanaan_kegiatan) }}">Syarat - Syarat teknis
                                Pelaksanaan</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_syarat_teknis == null || $list->id_syarat_teknis == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_syarat_teknis == null || $list->id_syarat_teknis == 0) {
                                echo "";
                            } else {
								$syarat_teknis_spesifikasi = DB::select(" SELECT * FROM syarat_teknis_spesifikasi where id_syarat_teknis = '" . $list->id_syarat_teknis . "'");
                                foreach($syarat_teknis_spesifikasi as $syarat_teknis_spesifikasi){$status = $syarat_teknis_spesifikasi->status_;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>
						</center>
                    </th>
                </tr>
                <tr>
                    <th>
                        <center>7</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form6/'.$list->id_perencanaan_kegiatan) }}">Gambar/Denah</a>
                        </center>
                    </th>
                    <th>
                        <center><?php if ($list->id_gambar_denah == null || $list->id_gambar_denah == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_gambar_denah == null || $list->id_gambar_denah == 0) {
                                echo "";
                            } else {
								$gambar_denah = DB::select(" SELECT * FROM gambar_denah where id_gambar_denah = '" . $list->id_gambar_denah . "'");
                                foreach($gambar_denah as $gambar_denah){$status = $gambar_denah->status_;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>
						</center>
                    </th>
                </tr>
                <tr>
                    <th>
                        <center>8</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form7/'.$list->id_perencanaan_kegiatan) }}">Bagan Organisasi
                                Kegiatan</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_bagan_organisasi == null || $list->id_bagan_organisasi == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_bagan_organisasi == null || $list->id_bagan_organisasi == 0) {
                                echo "";
                            } else {
								$bagan_organisasi = DB::select(" SELECT * FROM bagan_organisasi where id_bagan_organisasi = '" . $list->id_bagan_organisasi . "'");
                                foreach($bagan_organisasi as $bagan_organisasi){$status = $bagan_organisasi->status_;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>
						</center>
                    </th>
                </tr>
                <tr>
                    <th>
                        <center>9</center>
                    </th>
                    <th>
                        <center><a href="{{ url('apbn_form8/'.$list->id_perencanaan_kegiatan) }}">Surat Pernyataan
                                Tanggung Jawab Mutlak</a></center>
                    </th>
                    <th>
                        <center><?php if ($list->id_surat_pernyataan_mutlak == null || $list->id_bagan_organisasi == 0) {
                                echo "TIDAK";
                            } else {
                                echo "ADA";
                            }?></center>
                    </th>
                    <th>
                        <center>
						<?php 
							
							if ($list->id_surat_pernyataan_mutlak == null || $list->id_surat_pernyataan_mutlak == 0) {
                                echo "";
                            } else {
								$surat_pernyataan_mutlak = DB::select(" SELECT * FROM surat_pernyataan_mutlak where id_surat_pernyataan_mutlak = '" . $list->id_surat_pernyataan_mutlak . "'");
                                foreach($surat_pernyataan_mutlak as $surat_pernyataan_mutlak){$status = $surat_pernyataan_mutlak->status_;}
								if($status == 1){echo "<input type='checkbox' checked disabled>";}
								else{echo "<input type='checkbox' disabled>";}
                            }
							
							?>
						</center>
                    </th>
                </tr>

                </tbody>
            </table>
            <br>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-1 control-label"><b>Catatan</b></label>
                <div class="col-md-11">

                    <textarea class="form-control" placeholder="<?php echo $list->feedback; ?>" readonly name="anggaran_administrasi" id="anggaran_administrasi"></textarea>

                </div>
            </div>
            <br>
            <div class="form-group">

                <div class="col-md-7">

                    <a href="{{ url('/rengiat_apbn')}}" class="btn btn-danger">Kembali ke Rencana Kegiatan APBN</a>
                </div>
            </div>
            <?php } ?>
            {{Form::close()}}
        </div>
    </section>
</section>


@include('footer_admin');