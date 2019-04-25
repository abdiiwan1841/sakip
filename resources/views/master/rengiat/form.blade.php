@include('header_admin');

        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Form Rencana Kegiatan</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Data Master</span></li>
                                <li><span>Form Rencana Kegiatan</span></li>
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
                        
                                <h2 class="panel-title">Form Rencana Kegiatan</h2>
                            </header>
                            <div class="panel-body">
                                 {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
								<?php if(isset($program->id_rencana_program_rengiat)){ ?>
									<input type="hidden" name="id_rencana_program_rengiat" id="id_rencana_program_rengiat" value="<?php echo $program->id_rencana_program_rengiat; ?>">
								<?php }?>
                                    <div class="form-group">
                                        {!! Form::label('rencana_program_rengiat', 'Nama Program', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-7">
                                              <?php if(isset($program->rencana_program_rengiat)){$nm = $program->rencana_program_rengiat;}else{$nm=null;} ?>
                                            {!! Form::text('rencana_program_rengiat', $nm, ['class' => 'form-control']) !!}
                                            {!! $errors->first('rencana_program_rengiat', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                <div class="form-group">
                                    {!! Form::label('status', 'Status', ['class' => 'col-md-3 control-label']) !!}
                                    <div class="col-md-7">
                                        <select name="status" class="form-control">
                                            <option value="1" <?php
                                                if (isset($program->status)) {
                                                if($program->status == '1'){
                                                    echo "selected";
                                                }
                                            } ?>>PNBP</option>
                                            <option value="2" <?php
                                                if (isset($program->status)) {
                                                    if($program->status == '2'){
                                                        echo "selected";
                                                    }
                                                } ?>>APBN</option>
                                        </select>
                                        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                    <div class="form-group">
                                        {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-3 control-label']) !!}

                                         
                                         <?php if(isset($program->keterangan)){$ket = $program->keterangan;}else{$ket=null;} ?>
                                        <div class="col-md-7">
                                           <textarea id="keterangan" name="keterangan" class="form-control">{{$ket}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-7">
                                         {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                                          <a href="{{ url('/list_program')}}" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>

                                 {{Form::close()}}
                            </div>
                        </section>
    </section>


@include('footer_admin');