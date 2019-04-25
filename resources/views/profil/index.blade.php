@include('header_admin');

        <section role="main" class="content-body"> 
                    <header class="page-header"> 
                        <h2>User Profil</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html"> 
                                        <i class="fa fa-home"></i>
                                    </a> 
                                </li>
                                <li><span>Halaman</span></li>
                                <li><span>User Profil</span></li>
                               
                            </ol>
                    
                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                        </div>
                    </header>


                    <div class="row">
                        <div class="col-md-4 col-lg-3">

                            <section class="panel">
                                <div class="panel-body">
                                    <div class="thumb-info mb-md">
                                        <img src="@if($countphoto > 0) {{url('uploads/registrasi-pengajuan/'.$photo->nama_file)}} @else {{url('asset_admin/images/!logged-user.jpg')}}  @endif" class="rounded img-responsive" alt="John Doe">
                                        <div class="thumb-info-title">
                                            <span class="thumb-info-inner">{{Auth::user()->name}}</span>
                                            {{-- <span class="thumb-info-type">CEO</span> --}}
                                        </div>
                                    </div>

                                {{--     <div class="widget-toggle-expand mb-md">
                                        <div class="widget-header">
                                            <h6>Profile Completion</h6>
                                            <div class="widget-toggle">+</div>
                                        </div>
                                        <div class="widget-content-collapsed">
                                            <div class="progress progress-xs light">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                    60%
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-expanded">
                                            <ul class="simple-todo-list">
                                                <li class="completed">Update Profile Picture</li>
                                                <li class="completed">Change Personal Information</li>
                                                <li>Update Social Media</li>
                                                <li>Follow Someone</li>
                                            </ul>
                                        </div>
                                    </div> --}}

                                   

                                    <hr class="dotted short">

                           {{--          <div class="social-icons-list">
                                        <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                                        <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                                        <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
                                    </div> --}}

                                </div>
                            </section>


                           

                          

                        </div>
                        <div class="col-md-12 col-lg-9">

                            <div class="tabs">
                                <ul class="nav nav-tabs tabs-primary">
                                    <li class="active">
                                        <a href="#overview" data-toggle="tab">Informasi Personal</a>
                                    </li>
                                    <li>
                                        <a href="#edit" data-toggle="tab">Informasi Perusahaan</a>
                                    </li>
                                    <li>
                                        <a href="#dokumen" data-toggle="tab">Dokumen Upload</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overview" class="tab-pane active">
                                        <h4 class="mb-xlg">Data Personal</h4>

                                        {{ Form::open(array('id' => 'form-input-perseorangan','url' => '/profil_update/'.$res->id)) }}

                                        {{csrf_field()}}
                                        <fieldset>

                                        <div class="form-group">

                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Nama</label>
                                            <div class="col-sm-7">
                                            {{ Form::text('nama_lengkap', $res->name, array('class' => 'form-control', 'placeholder' => 'Sesuai KTP')) }}
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Tempat Lahir</label>
                                            <div class="col-sm-7">
                                                <?php if(!empty($detail->tempat_lahir_perseorangan)){ $tmpt = $detail->tempat_lahir_perseorangan;}else{$tmpt = NULL;} ?>
                                                {{ Form::text('tempat_lahir',$tmpt, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Tanggal Lahir</label>
                                             <?php if(!empty($detail->tanggal_lahir_perseorangan)){ $tgl = $detail->tanggal_lahir_perseorangan;}else{$tgl = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{ Form::date('tanggal_lahir', $tgl, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar')) }}
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">NIK</label>
                                            <?php if(!empty($detail->nik_perseorangan)){ $nik = $detail->nik_perseorangan;}else{$nik = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{ Form::number('nik', $nik, array('class' => 'form-control', 'placeholder' => 'NIK KTP')) }}
                                            </div>

                                         </div>

                                        <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">NPWP</label>
                                        <?php if(!empty($detail->npwp_perseorangan)){ $npwp = $detail->npwp_perseorangan;}else{$npwp = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('npwp',$npwp, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar')) }}
                                        </div>
      
                                        </div>

                                        <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Email</label>

                                        <div class="col-sm-7">
                                            {{ Form::text('email', $res->email, array('class' => 'form-control', 'placeholder' => 'Untuk Validasi dan Verifikasi Akun')) }}
                                        </div>

                                      
                                        </div>


                                        <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">No Telp / HP</label>
                                         <?php if(!empty($detail->no_hp_perseorangan)){ $nohp = $detail->no_hp_perseorangan;}else{$nohp = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('no_hp', $nohp, array('class' => 'form-control', 'placeholder' => 'Menggunakan Nomor Yang Aktif')) }}
                                        </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Nama Ibu Kandung</label>
                                          <?php if(!empty($detail->nama_ibu_kandung)){ $nm_ibu = $detail->nama_ibu_kandung;}else{$nm_ibu = NULL;} ?>
                                          <div class="col-sm-7">
                                            {{ Form::text('ibu_kandung', $nm_ibu, array('class' => 'form-control', 'placeholder' => 'Isi dengan benar')) }}
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Status Penikahan</label>

                                             <?php if(!empty($detail->status_pernikahan)){ $sts = $detail->status_pernikahan;}else{$sts = NULL;} ?>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="status_pernikahan" id="stat">
                                                    <option value="lajang" @if($sts == 'lajang') selected="selected" @endif>Lajang</option>

                                                    <option value="menikah" @if($sts == 'menikah') selected="selected" @endif>Menikah</option>
                                                    
                                                   
                                                </select>
                                            </div>
                                        </div>

                                    <div class="menikah" style="display: none;">
                                    <hr class="dotted tall">
                                    <h4 class="mb-xlg">Informasi Pasangan(Apabila Menikah)</h4>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Nama Suami/Istri</label>

                                        <?php if(!empty($detail->nama_pasangan)){ $nmps = $detail->nama_pasangan;}else{$nmps = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('nama_pasangan', $nmps, array('class' => 'form-control', 'placeholder' => 'Sesuai KTP')) }}
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Tempat Lahir</label>
                                        <?php if(!empty($detail->tempat_lahir_pasangan)){ $tmptps = $detail->tempat_lahir_pasangan;}else{$tmptps = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('tempat_lahir_pasangan', $tmptps, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar')) }}
                                        </div>

                                    </div>

                                    <div class="form-group">
                                         <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Tanggal Lahir</label>
                                          <?php if(!empty($detail->tanggal_lahir_pasangan)){ $tglps = $detail->tanggal_lahir_pasangan;}else{$tglps = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::date('tanggal_lahir_pasangan', $tglps, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar')) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Nomor KTP</label>
                                        <?php if(!empty($detail->nomor_ktp_pasangan)){ $ktpps = $detail->nomor_ktp_pasangan;}else{$ktpps = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::number('nik_pasangan', $ktpps, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar')) }}
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">No Telp / HP</label>
                                          <?php if(!empty($detail->no_hp)){ $nohpps = $detail->no_hp;}else{$nohpps = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('no_hp_pasangan', $nohpps, array('class' => 'form-control', 'placeholder' => 'Menggunakan Nomor Yang Aktif')) }}
                                        </div>
                                    </div>

                                     <div class="form-group">
                                      
                                           <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alamat</label>
                                              <?php if(!empty($detail->alamat_pasangan)){ $almt_ps = $detail->alamat_pasangan;}else{$almt_ps = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{ Form::textarea('alamat_pasangan', $almt_ps, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar dan Jelas', 'style' => 'height:40px')) }}
                                            </div>
                                        </div>

                                  </div>

                                        <hr class="dotted tall">
                                        <h4 class="mb-xlg">Alamat</h4>

                                         
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Provinsi</label>
                                            <?php if(!empty($detail->kode_provinsi_perseorangan)){ $prov = $detail->kode_provinsi_perseorangan;}else{$prov = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{-- {{ Form::text('provinsi', $prov, array('class' => 'form-control', 'placeholder' => 'Provinsi')) }} --}}
                                                 <select data-plugin-selectTwo class="form-control populate" name="provinsi">
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach($provinsi as $pv)
                                                    <?php if($prov == $pv->kode_provinsi){$sel='selected="selected"';}else{$sel="";} ?>
                                                    <option {{$sel}} value="{{$pv->kode_provinsi}}">{{$pv->nama_provinsi}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                           <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Kabupaten</label>
                                            <?php if(!empty($detail->kode_kabupaten_perseorangan)){ $kab = $detail->kode_kabupaten_perseorangan;}else{$kab = NULL;} ?>
                                           <div class="col-sm-7">
                                           {{--  {{ Form::text('kabupaten', $kab, array('class' => 'form-control', 'placeholder' => 'Kabupaten')) }} --}}
                                             <select data-plugin-selectTwo class="form-control populate" name="kabupaten">
                                                    <option value="">Pilih Kabupaten</option>
                                                    @foreach($kabupaten as $kb)
                                                    @if($kb->kode_provinsi == $prov)
                                                    <?php if($kab == $kb->kode_kabupaten){$sel='selected="selected"';}else{$sel="";} ?>
                                                    <option {{$sel}} value="{{$kb->kode_kabupaten}}">{{$kb->nama_kabupaten}}</option>
                                                    @endif
                                                    @endforeach
                                             </select>

                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Kecamatan</label>
                                             <?php if(!empty($detail->kode_kecamatan_perseorangan)){ $kec = $detail->kode_kecamatan_perseorangan;}else{$kec = NULL;} ?>
                                            <div class="col-sm-7">
                                               {{--  {{ Form::text('kecamatan', $kec, array('class' => 'form-control', 'placeholder' => 'Kecamatan')) }} --}}
                                            <select data-plugin-selectTwo class="form-control populate" name="kecamatan">
                                                    <option value="">Pilih Kecamatan</option>
                                                    @foreach($kecamatan as $kc)
                                                    @if($kc->kode_kabupaten == $kab)
                                                    <?php if($kec == $kc->kode_kecamatan){$sel='selected="selected"';}else{$sel="";} ?>
                                                    <option {{$sel}} value="{{$kc->kode_kecamatan}}">{{$kc->nama_kecamatan}}</option>
                                                    @endif
                                                    @endforeach
                                             </select>

                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">KodePos</label>
                                             <?php if(!empty($detail->kode_pos_perseorangan)){ $kodepos = $detail->kode_pos_perseorangan;}else{$kodepos = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{ Form::text('kode_pos', $kodepos, array('class' => 'form-control', 'placeholder' => 'KodePos')) }}
                                            </div>
                                         </div>

                                        <div class="form-group">
                                      
                                           <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alamat</label>
                                             <?php if(!empty($detail->alamat_lengkap_perseorangan)){ $alamat_lengkap = $detail->alamat_lengkap_perseorangan;}else{$alamat_lengkap = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{ Form::textarea('alamat_lengkap', $alamat_lengkap, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar dan Jelas', 'style' => 'height:40px')) }}
                                            </div>
                                        </div>

                                       

                                        <hr class="dotted tall">
                                        <h4 class="mb-xlg">Change Password</h4>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileNewPassword">Password</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="profileNewPassword" value="{{$res->password_real}}">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                                            <div class="col-md-7">
                                                <input type="password" class="form-control" id="profileNewPassword" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                                            <div class="col-md-7">
                                                <input type="password" class="form-control" id="profileNewPasswordRepeat">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                              <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username"></label>
                                              <div class="col-sm-7">
                                                  <button type="submit" class="btn btn-primary">Update</button>
                                              </div>
                                        </div>

                                        </fieldset>
                                        
                                        {{Form::close()}}
                                       
                                    </div>
                                    <div id="edit" class="tab-pane">

                                        {{ Form::open(array('id' => 'form-input-perseorangan','url' => 'profil_company_update/'.$res->id)) }}
                                         {{csrf_field()}}
                                        <h4 class="mb-xlg">Data Perusahaan</h4>

                                        <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Nama Perusahaan</label>
                                        <?php if(!empty($detail->nama_perusahaan)){ $nm_perusahaan = $detail->nama_perusahaan;}else{$nm_perusahaan = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('nama_perusahaan', $nm_perusahaan, array('class' => 'form-control', 'placeholder' => 'Nama Perusahaan')) }}
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Bidang Usaha</label>
                                         <?php if(!empty($detail->bidang_usaha_perusahaan)){ $bu = $detail->bidang_usaha_perusahaan;}else{$bu = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('bidang_usaha', $bu, array('class' => 'form-control', 'placeholder' => 'Bidang Usaha')) }}
                                        </div>
                                        
                                     
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Jumlah Karyawan</label>
                                         <?php if(!empty($detail->jumlah_karyawan)){ $jk = $detail->jumlah_karyawan;}else{$jk = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::number('jumlah_karyawan', $jk, array('class' => 'form-control', 'placeholder' => 'Jumlah Karyawan')) }}
                                        </div>
                                        
                                   
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">TDP</label>
                                         <?php if(!empty($detail->tdp)){ $tdp = $detail->tdp;}else{$tdp = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('tdp', $tdp, array('class' => 'form-control', 'placeholder' => 'TDP')) }}
                                        </div>
                                        
                                         
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">No Telp Perusahaan</label>
                                         <?php if(!empty($detail->no_telp_perusahaan)){ $no_telp_perusahaan = $detail->no_telp_perusahaan;}else{$no_telp_perusahaan = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('nomor_telp', $no_telp_perusahaan, array('class' => 'form-control', 'placeholder' => 'No Telp Perusahaan')) }}
                                        </div>
                                        
                                       
                                      
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">NPWP Perusahaan</label>
                                         <?php if(!empty($detail->npwp_perusahaan)){ $npwp_perusahaan = $detail->npwp_perusahaan;}else{$npwp_perusahaan = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('npwp_perusahaan', $npwp_perusahaan, array('class' => 'form-control', 'placeholder' => 'NPWP Perusahaan')) }}
                                        </div>
                                        
                                        
                                    </div>

                                     <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Email Perusahaan</label>
                                        <?php if(!empty($detail->email_perusahaan)){ $email_perusahaan = $detail->email_perusahaan;}else{$email_perusahaan = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('email_perusahaan', $email_perusahaan, array('class' => 'form-control', 'placeholder' => 'Email Perusahaan')) }}
                                        </div>

                                       
                                     </div>

                                  

                                     <div class="form-group">
                                          <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">No Fax Perusahaan</label>
                                            <?php if(!empty($detail->no_fax_perusahaan)){ $no_fax_perusahaan = $detail->no_fax_perusahaan;}else{$no_fax_perusahaan = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('nomor_fax', $no_fax_perusahaan, array('class' => 'form-control', 'placeholder' => 'No Fax Perusahaan')) }}
                                        </div>
                                     </div>

                                    <div class="form-group">
                                          <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">SIUP</label>
                                          <?php if(!empty($detail->siup)){ $siup = $detail->siup;}else{$siup = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('siup', $siup, array('class' => 'form-control', 'placeholder' => 'SIUP')) }}
                                        </div>
                                     </div>

                            

                                    <div class="form-group">
                                          <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Tahun Berdiri</label>
                                           <?php if(!empty($detail->tahun_berdiri_perusahaan)){ $tahun_berdiri_perusahaan = $detail->tahun_berdiri_perusahaan;}else{$tahun_berdiri_perusahaan = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::number('tahun_berdiri', $tahun_berdiri_perusahaan, array('class' => 'form-control', 'placeholder' => 'Tahun Berdiri')) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Omset Perusahaan Pertahun (Rp)</label>
                                         <?php if(!empty($detail->omset_perusahaan_setahun)){ $omset_perusahaan_setahun = number_format($detail->omset_perusahaan_setahun, 0 , '' , '.') ;}else{$omset_perusahaan_setahun = NULL;} ?>
                                        <div class="col-sm-7">
                                            {{ Form::text('omset_perusahaan_setahun', $omset_perusahaan_setahun, array('class' => 'form-control omset', 'placeholder' => 'Omset Perusahaan Pertahun')) }}
                                        </div>
                                    </div>

                                      <hr class="dotted tall">
                                        <h4 class="mb-xlg">Alamat</h4>

                                         
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Provinsi</label>
                                              <?php if(!empty($detail->kode_provinsi_perusahaan)){ $provinsi_perusahaan = $detail->kode_provinsi_perusahaan;}else{$provinsi_perusahaan = NULL;} ?>
                                            <div class="col-sm-7">
                                               <select data-plugin-selectTwo class="form-control populate" name="provinsi_perusahaan">
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach($provinsi as $pv)
                                                    <?php if($provinsi_perusahaan == $pv->kode_provinsi){$sel='selected="selected"';}else{$sel="";} ?>
                                                    <option {{$sel}} value="{{$pv->kode_provinsi}}">{{$pv->nama_provinsi}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                         <div class="form-group">
                                           <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Kabupaten</label>
                                            <?php if(!empty($detail->kode_kabupaten_perusahaan)){ $kabupaten_perusahaan = $detail->kode_kabupaten_perusahaan;}else{$kabupaten_perusahaan = NULL;} ?>
                                           <div class="col-sm-7">
                                           {{--  {{ Form::text('kabupaten_perusahaan', $kabupaten_perusahaan, array('class' => 'form-control', 'placeholder' => 'Kabupaten')) }} --}}
                                            <select data-plugin-selectTwo class="form-control populate" name="kabupaten_perusahaan">
                                                    <option value="">Pilih Kabupaten</option>
                                                    @foreach($kabupaten as $kb)
                                                    @if($kb->kode_provinsi == $provinsi_perusahaan)
                                                    <?php if($kabupaten_perusahaan == $kb->kode_kabupaten){$sel='selected="selected"';}else{$sel="";} ?>
                                                    <option {{$sel}} value="{{$kb->kode_kabupaten}}">{{$kb->nama_kabupaten}}</option>
                                                    @endif
                                                    @endforeach
                                             </select>


                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Kecamatan</label>
                                              <?php if(!empty($detail->kode_kecamatan_perusahaan)){ $kecamatan_perusahaan = $detail->kode_kecamatan_perusahaan;}else{$kecamatan_perusahaan = NULL;} ?>
                                            <div class="col-sm-7">
                                               {{--  {{ Form::text('kecamatan_perusahaan', $kecamatan_perusahaan, array('class' => 'form-control', 'placeholder' => 'Kecamatan')) }} --}}
                                             <select data-plugin-selectTwo class="form-control populate" name="kecamatan_perusahaan">
                                                    <option value="">Pilih Kecamatan</option>
                                                    @foreach($kecamatan as $kc)
                                                    @if($kc->kode_kabupaten == $kabupaten_perusahaan)
                                                    <?php if($kecamatan_perusahaan == $kc->kode_kecamatan){$sel='selected="selected"';}else{$sel="";} ?>
                                                    <option {{$sel}} value="{{$kc->kode_kecamatan}}">{{$kc->nama_kecamatan}}</option>
                                                    @endif
                                                    @endforeach
                                             </select>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">KodePos</label>
                                             <?php if(!empty($detail->kode_pos_perusahaan)){ $kode_pos_perusahaan = $detail->kode_pos_perusahaan;}else{$kode_pos_perusahaan = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{ Form::text('kode_pos_perusahaan', $kode_pos_perusahaan, array('class' => 'form-control', 'placeholder' => 'KodePos')) }}
                                            </div>
                                         </div>

                                        <div class="form-group">
                                      
                                           <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alamat</label>
                                            <?php if(!empty($detail->alamat_lengkap_perusahaan)){ $alamat_lengkap_perusahaan = $detail->alamat_lengkap_perusahaan;}else{$alamat_lengkap_perusahaan = NULL;} ?>
                                            <div class="col-sm-7">
                                                {{ Form::textarea('alamat_lengkap_perusahaan', $alamat_lengkap_perusahaan, array('class' => 'form-control', 'placeholder' => 'Isi Dengan Benar dan Jelas', 'style' => 'height:40px')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                              <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username"></label>
                                              <div class="col-sm-7">
                                                  <button class="btn btn-primary">Update</button>
                                              </div>
                                        </div>

                                        {{Form::close()}}

                                    </div>

                                    <div id="dokumen" class="tab-pane">

                                     <div class="col-md-12">
                                            <p>Maksimal Ukuran File 1MB</p>
                                            <br>
                                    </div>
                                  
                                    @foreach($dokumen as $dokumen)

                                    {{ Form::open(array('url' => 'upload_dokumen/'.$res->id, 'id' => 'form-upload', 'enctype' => 'multipart/form-data')) }}


                                     

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">{{ $dokumen->nama_lampiran }}</label>
                                        <div class="col-sm-5">
                                            {{-- Form::file('myfile', array('class' => 'form-control')) --}}
                                            <input type="file" name="file{{ $dokumen->id_lampiran }}"  class="form-control file{{ $dokumen->id_lampiran }}">

                                            <input type="hidden" name="id_lampiran" value="{{$dokumen->id_lampiran}}">

                                            <input type="hidden" name="nama_lampiran" value="{{$dokumen->nama_lampiran}}">

                                        </div>
                                        <div class="col-md-4">
                                            @foreach($fileupload as $fl)

                                            @if(!empty($fl->id_lampiran))
                                                @if($fl->id_lampiran == $dokumen->id_lampiran)
                                                 <a target="blank" href="{{url('assets/lampiran/'.$fl->nama_file)}}" class="btn btn-success"><i class="fa fa-file-text"></i> File</a>
                                                @endif
                                            @else
                                            @endif
                                            @endforeach

                                             <button id="btn{{$dokumen->id_lampiran}}" type="button" class="btn btn-danger">Upload</button>
                                        </div>
                                    </div>
                                    <br>


                                    {{ Form::close() }}
                                    @endforeach
                                    
                            
                                    </div>


                                </div>
                            </div>
                        </div>
                      

                    </div>
                    <!-- end: page -->

         </section>


<script type="text/javascript">
    $("#stat").on('change',function () {
        var key = $('#stat option:selected').val();
        if(key == "lajang"){
            $('.menikah').css('display','none');
        }else{
            $('.menikah').css('display','block');
        }
    });
    
    // $('.omset').maskMoney({thousands:'.', decimal:',', precision:0});

    @if($sts == 'menikah') 
        $('.menikah').css('display','none');
        $('.menikah').css('display','block');
    @else
        $('.menikah').css('display','block');
        $('.menikah').css('display','none');
    @endif

   
    @for($i = 0; $i <= 7; $i++)
 
    $('.file{{$i}}').bind('change', function() {
      var bytes = this.files[0].size;
      var size = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
  
      if(size < 2){
         $('#btn{{$i}}').removeClass('btn-danger');
         $('#btn{{$i}}').addClass('btn-primary');
         $('#btn{{$i}}').attr('type','submit');
      }else{
         $('#btn{{$i}}').removeClass('btn-primary');
         $('#btn{{$i}}').addClass('btn-danger');
         $('#btn{{$i}}').attr('type','button');
         alert('Ukurna Dokumen Terlalu Besar!')
      }
    });

    @endfor

  

</script>

@include('footer_admin')

