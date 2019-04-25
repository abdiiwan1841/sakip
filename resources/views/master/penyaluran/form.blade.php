@include('header_admin');

        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Form Penyaluran Anggaran</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Data Master</span></li>
                                <li><span>Form Penyaluran Anggaran</span></li>
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
                        
                                <h2 class="panel-title">Form Penyaluran Anggaran</h2>
                            </header>
                            <div class="panel-body">
                                 {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
								<?php if(isset($penyaluran->id_master_penyaluran_anggaran)){ ?>
									<input type="hidden" name="id_penyaluran" id="id_penyaluran" value="<?php echo $penyaluran->id_master_penyaluran_anggaran; ?>">
								<?php }?>
                                    <div class="form-group">
                                        {!! Form::label('penyaluran_anggaran', 'Penyaluran Anggaran', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-7">
                                              <?php if(isset($penyaluran->penyaluran_anggaran)){$nm = $penyaluran->penyaluran_anggaran;}else{$nm=null;} ?>
                                            {!! Form::text('penyaluran_anggaran', $nm, ['class' => 'form-control']) !!}
                                            {!! $errors->first('penyaluran_anggaran', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-3 control-label']) !!}

                                         
                                         <?php if(isset($penyaluran->keterangan)){$ket = $penyaluran->keterangan;}else{$ket=null;} ?>
                                        <div class="col-md-7">
                                           <textarea id="keterangan" name="keterangan" class="form-control">{{$ket}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-7">
                                         {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                                          <a href="{{ url('/list_penyaluran')}}" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>

                                 {{Form::close()}}
                            </div>
                        </section>
    </section>


@include('footer_admin');