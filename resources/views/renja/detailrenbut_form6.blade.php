@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gambar/Denah</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{URL::to('/home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span></span></li>
                <li><span>Gambar/Denah</span></li>
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

            <h2 class="panel-title">Gambar/Denah</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
            <?php foreach($data as $list){ ?>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian Negara/Lembaga</label>
                <div class="col-md-7">

                    <input class="form-control" name="kementerian" readonly type="text"
                           value="<?php echo $list->kementrian_negara_lembaga; ?>" id="kementerian">
                    <input style="display: none" name="id" id="id" value="{{$id}}">

                </div>
            </div>

            <div class="form-group">
                <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Kegiatan</label>
                <div class="col-md-7">

                    <select class="form-control select2me" name="id_kegiatan"
                            id="id_kegiatan">
                        <option value='0' selected>- Pilih Kegiatan -</option>


                        <?php foreach($kegiatan as $row2){ ?>
                        <option value="<?php echo $row2->id_kegiatan; ?>" <?php if ($row2->id_kegiatan == $list->id_kegiatan) {
                            echo "selected";
                        }?>><?php echo $row2->nama_kegiatan; ?></option>
                        <?php } ?>

                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran</label>
                <div class="col-md-7">
					
					<select class="form-control select2me"  name="keluaran" id="keluaran" required>
                        <option value='0' selected>- Pilih Keluaran -</option>


                        <?php foreach($kegiatan as $row2){ ?>
                        <option value="<?php echo $row2->id_kegiatan; ?>" <?php if ($row2->id_kegiatan == $list->id_kegiatan) {
                            echo "selected";
                        }?>><?php echo $row2->nama_kegiatan; ?></option>
                        <?php } ?>

                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
                <div class="col-md-7">

                    <input class="form-control" name="detil_kegiatan" type="text" readonly
                           value="<?php echo $list->detail_kegiatan; ?>" id="detil_kegiatan">

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
                <div class="col-md-7">

                    <input class="form-control" name="volume" type="text" readonly
                           value="<?php echo $list->volume_keluaran; ?>" id="volume">

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
                <div class="col-md-7">

                    <input class="form-control" name="satuan_ukur" type="text" readonly
                           value="<?php echo $list->satuan_ukur_keluaran; ?>" id="satuan_ukur">

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                <div class="col-md-7">

                    <input class="form-control" name="alokasi_dana" type="text" readonly
                           value="<?php echo $list->biaya_yang_diperlukan; ?>" id="alokasi_dana">

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Gambar/Denah</label>
                <div class="col-md-7">
                    <input class="form-control" name="gambar" type="file" value="" id="gambar">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3"></label>
            <div class="col-md-7">
                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('/list_ceklist_Apbn/'.$id)}}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
        <?php } ?>
        {{Form::close()}}
        </div>
    </section>
</section>


@include('footer_admin');