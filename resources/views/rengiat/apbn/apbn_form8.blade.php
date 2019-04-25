@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
       <h2>Surat Pernyataan Penanggung Jawab Mutlak</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{URL::to('/home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>APBN</span></li>
                <li><span>Surat Pernyataan Penanggung Jawab Mutlak</span></li>
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

            <h2 class="panel-title">Surat Pernyataan Penanggung Jawab Mutlak</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Nama</label>
                <div class="col-md-7">

                    <input class="form-control" name="nama" type="text" value="" id="nama">
                    <input style="display: none" name="id" id="id" value="{{$id}}">

                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Jabatan</label>
                <div class="col-md-7">

                    <input class="form-control" name="jabatan" type="text" value="" id="jabatan">

                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Upload Surat Pernyataan</label>
                <div class="col-md-7">
                    <input class="form-control" name="gambar" type="file" value="" id="surat">
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
            {{Form::close()}}
        </div>
    </section>
</section>


@include('footer_admin');