@include('header_admin');

        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Menu</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Setting</span></li>
                                <li><span>Menu</span></li>
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
                        
                                <h2 class="panel-title">Menu</h2>
                            </header>
                            <div class="panel-body">
                                 {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
                               <div class="form-group">
                                   <label class="control-label col-md-3">Nama Menu</label>
                                   <div class="col-md-7">

                                       <input type="text" class="form-control" name="nama_menu" placeholder="Home"   @isset($res) value="{{ $res->nama_menu }}"  @endisset>
                                   </div>
                               </div>

                              
                           
                               <div class="form-group">
                                   <label class="control-label col-md-3">Url</label>
                                   <div class="col-md-7">
                                       <input type="text" class="form-control" name="url" placeholder="/Home" @isset($res) value="{{ $res->url }}"  @endisset>
                                   </div>
                               </div>

                               
                               <div class="form-group">
                                   <label class="control-label col-md-3">Urutan</label>
                                   <div class="col-md-7">
                                       <input type="number" class="form-control" name="urutan" min="0" placeholder="" @isset($res) value="{{ $res->urutan }}"  @endisset>
                                   </div>
                               </div>

                                <div class="form-group">
                                   <label class="control-label col-md-3">Icon</label>
                                   <div class="col-md-7">
                                       <input type="text" class="form-control" name="icon"  placeholder="font-awesome - fa-home" @isset($res) value="{{ $res->icon }}"  @endisset>
                                   </div>
                               </div>

                            
                               <div class="form-group">
                                   <label class="control-label col-md-3">Keterangan</label>
                                   <div class="col-md-7">
                                        <textarea class="form-control" name="ket">@isset($res) {{ $res->ket }}  @endisset</textarea>
                                   </div>
                               </div>

                          
                               <div class="form-group">
                                   <label class="control-label col-md-3"></label>
                                   <div class="col-md-7">
                                        <button class="btn btn-primary" type="submit"> Simpan</button>
                                   </div>
                               </div>
                               {!! Form::close() !!}
                            </div>
                        </section>
        </section>



@include('footer_admin')