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
                                   <label class="control-label col-md-3">Parent Menu</label>
                                   <div class="col-md-7">
                    

                                       <input type="text" disabled="disabled" class="form-control" name="nama_menu" placeholder="Home"  
                                        value="{{$parent}}" 

                                        >

                                        <input type="hidden" class="form-control" name="id_menu" placeholder="Home" 

                                        value="{{$id_parent}}" 

                                        >

                                        <input type="hidden" name="level" value="{{$level}}">
                                   </div>
                               </div>


                               <div class="form-group">
                                   <label class="control-label col-md-3">Sub Menu</label>
                                   <div class="col-md-7">

                                       <input type="text" class="form-control" name="nama_submenu" placeholder="Submenu"  @isset($resed)  @if($resed->parent > 0) value="{{ $resed->nama_menu }}" @endif  @endisset>
                                   </div>
                               </div>

                              
                           
                               <div class="form-group">
                                   <label class="control-label col-md-3">Url</label>
                                   <div class="col-md-7">
                                       <input type="text" class="form-control" name="url" placeholder="/menu/submenu" @isset($resed)  @if($resed->parent > 0) value="{{ $resed->url }}" @endif @endisset>
                                   </div>
                               </div>

                               
                               <div class="form-group">
                                   <label class="control-label col-md-3">Urutan</label>
                                   <div class="col-md-7">
                                       <input type="number" class="form-control" name="urutan" min="0" placeholder="" @isset($resed)  @if($resed->parent > 0) value="{{ $resed->urutan }}" @endif @endisset>
                                   </div>
                               </div>

                                <div class="form-group">
                                   <label class="control-label col-md-3">Icon</label>
                                   <div class="col-md-7">
                                       <input type="text" class="form-control" name="icon"  placeholder="font-awesome - fa-home"  @isset($resed)  @if($resed->parent > 0) value="{{ $resed->icon }}" @endif @endisset>
                                   </div>
                               </div>

                            
                               <div class="form-group">
                                   <label class="control-label col-md-3">Keterangan</label>
                                   <div class="col-md-7">
                                        <textarea class="form-control" name="ket">@isset($resed)  @if($resed->parent > 0) {{ $resed->ket }} @endif @endisset</textarea>
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