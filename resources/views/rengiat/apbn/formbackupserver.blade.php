@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>APBN</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Rengiat</span></li>
                <li><span>Form APBN</span></li>
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

            <h2 class="panel-title">Form Rencana Kegiatan (APBN)</h2>
        </header>
        <div class="panel-body">

            {{Form::open(array('url' => $url,'method' => 'post'))}}
            {{csrf_field()}}

            <fieldset class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Jenis Perencanaan
                                Kegiatan</label>
                            <div class="col-sm-5">
                                {{-- {{ Form::text('email',null, array('class' => 'form-control', 'placeholder' => 'Email','disabled' => 'disabled')) }} --}}

                                <select class="form-control select2me" name="id_rencana_program_rengiat"
                                        id="id_rencana_program_rengiat">
                                    <option value='0' selected>- Pilih Jenis Perencaan Kegiatan -</option>


                                    <?php foreach($rencana as $row){ ?>
                                    <option value="<?php echo $row->id_rencana_program_rengiat; ?>"><?php echo $row->rencana_program_rengiat; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1"
                                   for="w1-username">Satker/Kotama</label>
                            <div class="col-sm-5">
                                Dismat
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Program</label>
                            <div class="col-sm-5">
                                {{ Form::text('program',null, array('class' => 'form-control', 'placeholder' => 'Program')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Kode
                                Kegiatan</label>
                            <div class="col-sm-5">
                                {{ Form::text('kode_kegiatan',null, array('class' => 'form-control', 'placeholder' => 'Kode Kegiatan')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Keluaran</label>
                            <div class="col-sm-5">
                                {{ Form::text('keluaran',null, array('class' => 'form-control', 'placeholder' => 'Keluaran')) }}
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
                                {{ Form::text('detail_kegiatan',null, array('class' => 'form-control', 'placeholder' => 'Detail Kegiatan')) }}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Akun</label>
                            <div class="col-sm-5">
                                {{ Form::text('akun',null, array('class' => 'form-control', 'placeholder' => 'Akun')) }}
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
                                {{ Form::text('anggaran_fisik',null, array('class' => 'form-control', 'placeholder' => 'Alokasi Anggaran Fisik')) }}
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
                                {{ Form::text('anggaran_administrasi',null, array('class' => 'form-control', 'placeholder' => 'Alokasi Anggaran Administrasi')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Penyaluran
                                Anggaran</label>
                            <div class="col-sm-5">
                                {{ Form::text('penyaluran_anggaran',null, array('class' => 'form-control', 'placeholder' => 'Penyaluran Anggaran')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username"></label>
                            <div class="col-sm-5">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

            </fieldset>


            {{Form::close()}}

        </div>
    </section>
</section>

<script type="text/javascript">
    $('#example').DataTable();
</script>

@include('footer_admin')