@include('header_admin');
	<section role="main" class="content-body">
        <header class="page-header">
            <h2>Form Satker</h2>
            <div class="right-wrapper pull-right">
            	<ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Data Master</span></li>
                    <li><span>Satker</span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>
                <h2 class="panel-title">Form Satker</h2>
            </header>
			<div class="panel-body">
                {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
				<?php if(isset($data->id_jenis_satker)){ ?>
				<input type="hidden" name="id_jenis_satker" id="id_jenis_satker" value="<?php echo $data->id_jenis_satker; ?>">
								<?php }?>
                <div class="form-group">
                	{!! Form::label('nama_jenis_satker', 'Nama Satker', ['class' => 'col-md-3 control-label']) !!}
                	<div class="col-md-7">
	              		<?php if(isset($data->nama_jenis_satker)){$nm = $data->nama_jenis_satker;}else{$nm=null;} ?>
	                	{!! Form::text('nama_jenis_satker', $nm, ['class' => 'form-control']) !!}
	                	{!! $errors->first('nama_jenis_satker', '<p class="help-block">:message</p>') !!}
                	</div>
                </div>
                <div class="form-group">
                    {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-3 control-label']) !!} 
                    <?php if(isset($data->keterangan)){$ket = $data->keterangan;}else{$ket=null;} ?>
                    <div class="col-md-7">
                       	<textarea id="keterangan" name="keterangan" class="form-control">{{$ket}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3"></label>
                    <div class="col-md-7">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ url('/satker')}}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
				{{Form::close()}}
            </div>
        </section>
    </section>
@include('footer_admin');