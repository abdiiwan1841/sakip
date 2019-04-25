@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Program</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Data Master</span></li>
                <li><span>Form Akun</span></li>
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

            <h2 class="panel-title">Form Akun</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
            <?php if(isset($akun->nama_akun)){ ?>
            <input type="hidden" name="id_akun" id="id_akun" value="{{$id}}">
            <?php }?>
            <div class="form-group">
                {!! Form::label('nama_akun', 'Nama akun', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-7">
                    <?php if (isset($akun->nama_akun)) {
                        $nm = $akun->nama_akun;
                    } else {
                        $nm = null;
                    } ?>
                    {!! Form::text('nama_akun', $nm, ['class' => 'form-control']) !!}
                    {!! $errors->first('nama_akun', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-3 control-label']) !!}


                <?php if (isset($akun->keterangan)) {
                    $ket = $akun->keterangan;
                } else {
                    $ket = null;
                } ?>
                <div class="col-md-7">
                    <textarea id="keterangan" name="keterangan" class="form-control">{{$ket}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3"></label>
                <div class="col-md-7">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ url('/list_akun')}}" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            {{Form::close()}}
        </div>
    </section>
</section>


@include('footer_admin');