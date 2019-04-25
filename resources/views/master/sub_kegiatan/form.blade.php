@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Subkegiatan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Data Master Subkegiatan</span></li>
                <li><span>Form Subkegiatan </span></li>
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

            <h2 class="panel-title">Form Subkegiatan</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group">
                <label for="id_program" class="col-md-3 control-label">Kegiatan</label>
                <div class="col-md-7">

                    <select class="form-control select2me" name="id_kegiatan" id="id_kegiatan">
                        <option value='0' selected>- Pilih Kegiatan -</option>


                        <?php foreach($kegiatan as $row){ ?>
                        <option value="<?php echo $row->id_kegiatan; ?>"><?php echo $row->nama_kegiatan; ?></option>
                        <?php } ?>

                    </select>

                </div>
            </div>


            <div class="form-group">
                {!! Form::label('nama_sub_kegiatan', 'Nama Sub Kegiatan', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-7">

                    {!! Form::text('nama_sub_kegiatan', '', ['class' => 'form-control']) !!}
                    {!! $errors->first('nama_sub_kegiatan', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-3 control-label']) !!}


                <div class="col-md-7">
                    <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3"></label>
                <div class="col-md-7">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ url('/list_subkegiatan')}}" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            {{Form::close()}}
        </div>
    </section>
</section>


@include('footer_admin');