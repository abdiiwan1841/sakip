@include('header_admin');

        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Form Kegiatan</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Data Master</span></li>
                                <li><span>Form Kegiatan</span></li>
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
                        
                                <h2 class="panel-title">Form Kegiatan</h2>
                            </header>
                            <div class="panel-body">
                                 {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
								 <input type="hidden" name="id_kegiatan" id="id_kegiatan" value="<?php echo $kegiatan->id_kegiatan; ?>">
								 <div class="form-group">
                                        <label for="id_program" class="col-md-3 control-label">Program</label>
                                        <div class="col-md-7">
                                             <?php if(isset($kegiatan->id_program)){$nm = $kegiatan->id_program;}else{$nm=null;} ?>
                                             <select class="form-control select2me" name="id_program" id="id_program">
											<option  value='0' selected>- Pilih Program -</option>
											
												
												<?php foreach($program as $row){ ?>
												<option value="<?php echo $row->id_program; ?>" <?php if($row->id_program == $kegiatan->id_program ){ echo "Selected"; } ?>><?php echo $row->nama_program; ?></option>
											<?php } ?>
											
										</select>
                                            
                                        </div>
                                    </div>
								 
								
								
                                    <div class="form-group">
                                        {!! Form::label('nama_kegiatan', 'Nama Kegiatan', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-7">
                                               <?php if(isset($kegiatan->nama_kegiatan)){$nm = $kegiatan->nama_kegiatan;}else{$nm=null;} ?>                                            
                                            {!! Form::text('nama_kegiatan', $nm, ['class' => 'form-control']) !!}
                                            {!! $errors->first('nama_kegiatan', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-3 control-label']) !!}

                                         
                                      
                                        <?php if(isset($kegiatan->keterangan_kegiatan)){$ket = $kegiatan->keterangan_kegiatan;}else{$ket=null;} ?>
                                        <div class="col-md-7">
                                           <textarea id="keterangan" name="keterangan" class="form-control">{{$ket}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-7">
                                         {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                                          <a href="{{ url('/list_kegiatan')}}" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>

                                 {{Form::close()}}
                            </div>
                        </section>
    </section>


@include('footer_admin');