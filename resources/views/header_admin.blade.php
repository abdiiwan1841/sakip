<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Sistem Akuntasi Informasi Pemerintah</title>
    <meta name="keywords" content="Etrade Finance | Kementerian Perdagangan Republik Indonesia"/>
    <meta name="description" content="Etrade Finance | Kementerian Perdagangan Republik Indonesia">
    <meta name="author" content="etrade.kemendag.go.id">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{url('asset_admin/vendor/bootstrap/css/bootstrap.css')}}"/>

    <link rel="stylesheet" href="{{url('asset_admin/vendor/font-awesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{url('asset_admin/vendor/magnific-popup/magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{url('asset_admin/vendor/bootstrap-datepicker/css/datepicker3.css')}}"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{url('asset_admin/vendor/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{url('asset_admin/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}"/>
    <link rel="stylesheet" href="{{url('asset_admin/vendor/morris/morris.css')}}"/>
    <link rel="stylesheet" href="{{url('asset_admin/vendor/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{url('asset_admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{url('asset_admin/stylesheets/theme.css')}}"/>


    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{url('asset_admin/stylesheets/skins/default.css')}}"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{url('asset_admin/stylesheets/theme-custom.css')}}">

    <link rel="stylesheet" href="{{url('asset_admin/vendor/summernote/summernote.css')}}" />
	<link href="{{url('asset_admin/select2.min.css')}}" rel="stylesheet" />
<script src="{{url('asset_admin/select2.min.js')}}"></script>
    <!-- Head Libs -->
    <script src="{{url('asset_admin/vendor/modernizr/modernizr.js')}}"></script>


    <!-- Vendor -->
    <script src="{{url('asset_admin/vendor/jquery/jquery.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{url('asset_admin/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{url('asset_admin/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{url('asset_admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('asset_admin/vendor/magnific-popup/magnific-popup.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{url('asset_admin/vendor/select2/select2.js')}}"></script>
    <script src="{{url('asset_admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <script src="{{url('asset_admin/vendor/select2/select2.js')}}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{url('asset_admin/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-appear/jquery.appear.js')}}"></script>
    <script src="{{url('asset_admin/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
    <script src="{{url('asset_admin/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{url('asset_admin/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
    <script src="{{url('asset_admin/vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{url('asset_admin/vendor/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{url('asset_admin/vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{url('asset_admin/vendor/raphael/raphael.js')}}"></script>
    <script src="{{url('asset_admin/vendor/morris/morris.js')}}"></script>
    <script src="{{url('asset_admin/vendor/gauge/gauge.js')}}"></script>
    <script src="{{url('asset_admin/vendor/snap-svg/snap.svg.js')}}"></script>
    <script src="{{url('asset_admin/vendor/liquid-meter/liquid.meter.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/jquery.vmap.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>

    <script src="{{url('asset_admin/vendor/summernote/summernote.js')}}"></script>

    <!-- Specific Page Vendor -->
    {{-- <script src="{{url('asset_admin/javascripts/jquery.maskMoney.min.js')}}"></script> --}}
    <script src="{{url('asset_admin/javascripts/jquery.mask.min.js')}}"></script>
    <script src="{{url('asset_admin/javascripts/jquery.numeric.min.js')}}"></script>
    <script src="{{url('asset_admin/vendor/select2/select2.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script src="{{url('asset_admin/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
    <style type="text/css">
        body {
            font-family: Segoe UI !important;
            font-weight: 600;
        }
    </style>
</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="../" class="logo">
                <div class="col-md-2">
                    <div class="row">
                    <img src="{{url('asset_admin/images/logo.png')}}" height="40" alt="Porto Admin"/>
                    </div>
                </div>
               <!--  <div class="col-md-10">
                <div class="row">
                Kementerian Perdagangan Republik Indonesia
                 </div>
                </div> -->
            </a>

            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                 data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <form action="pages-search-results.html" class="search nav-form">
                <div class="input-group input-search">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                    <span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
                </div>
            </form>

            <span class="separator"></span>



            <ul class="notifications">
			<?php
				$notif = DB::select("SELECT count(*) as counta from notif where id_penerima = '".Auth::user()->id."' and
				status = '0'");
					  foreach($notif as $lists)
					  {
						$counta = $lists->counta ;
					  }
			?>

                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">

                        <i class="fa fa-bell"></i>

                        <span class="badge">{{$counta}}</span>

                    </a>

                    <div class="dropdown-menu notification-menu" style="max-width:270px;">
                        <div class="notification-title">
                            <span class="pull-right label label-default">{{$counta}}</span>
                            Notifikasi
                        </div>

						<?php
							$notifdetail = DB::select("SELECT * from notif where id_penerima = '".Auth::user()->id."' and
							status = '0' order by id desc");
						?>
                        <div class="content" style="height: 350px;overflow: scroll;">
						@foreach($notifdetail as $list)
                            <ul>
								  <div style="text-align:right;">

											@if($list->keterangan == 'RENJA')
											<?php
												$renja = DB::select("SELECT * from renbin where id_renbin = '".$list->id_keterangan."'");
												foreach($renja as $listr)
												  {
													$status = $listr->status ;
													$kode = $listr->kode_rencana_kebutuhan;
												  }
											?>
												@if(empty($status))
												   <a href="{{ url('/pelaporanedit',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
												@else
													@if($status == 1)
														<a href="{{ url('/pascarenaku1',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@elseif($status == 2)
														<a href="{{ url('/pelaporanedit2',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@elseif($status == 3)
														<a href="{{ url('/pascarenaku2',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@elseif($status == 4)
														<a href="{{ url('/pelaporanedit3',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@elseif($status == 5)
														<a href="{{ url('/lihatrenja',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@endif
												@endif
												KODE : {{$kode}}
											@elseif($list->keterangan == 'RENGIAT')
												<!--buat rengiat-->
											<?php
												$rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$list->id_keterangan."'");
												foreach($rengiat as $listg)
												  {
													$id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
													$id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;
													$id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
													$id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
													$id_syarat_teknis = $listg->id_syarat_teknis;
													$id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
													$id_gambar_denah = $listg->id_gambar_denah;
													$id_bagan_organisasi = $listg->id_bagan_organisasi;
													$id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
													$keluaran = $listg->keluaran;
													$status_ = $listg->status_;
													$status = $listg->status;
												  }
											?>
											@if($status == 2)
												@if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak))
													<a href="{{ url('/hapusnotif',$list->id_keterangan)}}"><p class="btn btn-warn">data belom lengkap</p></a>
												@else
													@if(empty($status_) || $status_ == 2)
													<a href="{{ url('/checklist_rengiat_apbn',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@elseif($status_ == 1)
													<a href="{{ url('/list_ceklist_Apbn',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@else
													<a href="{{ url('/view_pelaporan_rengiat_apbn',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@endif
												@endif
                                                   @elseif($list->keterangan == 'POKJA')
                                                <a href="viewlap"><p class="btn btn-warn">buka</p></a>
											@else
												@if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak))
													<a href="{{ url('/hapusnotif',$list->id_keterangan)}}"><p class="btn btn-warn">data belom lengkap</p></a>
												@else
													@if(empty($status_) || $status_ == 2)
													<a href="{{ url('/checklist_rengiat_pnbp',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@elseif($status_ == 1)
													<a href="{{ url('/list_ceklist',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@else
													<a href="{{ url('/view_pelaporan_rengiat_pnbp',$list->id_keterangan)}}"><p class="btn btn-warn">buka</p></a>
													@endif
												@endif
											<?php
												$rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$list->id_keterangan."'");
												foreach($rengiat as $listg)
												  {
													$id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
													$id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;
													$id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
													$id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
													$id_syarat_teknis = $listg->id_syarat_teknis;
													$id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
													$id_gambar_denah = $listg->id_gambar_denah;
													$id_bagan_organisasi = $listg->id_bagan_organisasi;
													$id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
													$keluaran = $listg->keluaran;
												  }
											?>
												@if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak))
													<a href="{{ url('/hapusnotif',$list->id_keterangan)}}"><p class="btn btn-warn">data belom lengkap</p></a>
												@else
													<a href="#"><p class="btn btn-warn">buka</p></a>
												@endif
												Keluaran : {{$keluaran}}
											@endif
												Keluaran : {{$keluaran}}
											@endif
								  </div>
								  <div class="list-body">
									<?php
										$pengirim = DB::select("SELECT * from users where id = '".$list->id_pengirim."'");
									?>
									@foreach($pengirim as $listp)
										<div class="item-except text-sm text-muted h-1x">
											<p class="item-title _500">Pengirim : {{strtoupper($listp->name)}}</p>
											<p>{{$list->pesan}}</p>
										</div>
									@endforeach
								  </div>
                            </ul>
                            <hr/>
						@endforeach
                            <div class="text-right">
                                <a href="{{url('notifikasi')}}" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>

                </li>

                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-clock-o" style="font-size:20px"></i>
                        <span class="badge">{{$interval}}</span>
                    </a>

                    <div class="dropdown-menu notification-menu" style="max-width:270px;">
                        <div class="notification-title">
                            <span class="pull-right label label-default">{{$counta}}</span>
                            Notifikasi
                        </div>
                        <div class="content" style="height: 350px;overflow: scroll;">
                            @foreach($tgl1 as $val1)
                            <?php $data = DB::table('master_sub_upload_program_kerja')->where('id',$val1->id_sub_master_upload)->get()?>
                            @foreach($data as $val2)
                            <ul>
            								  <div style="text-align:right;">
            								  </div>
              							  <div class="list-body">
              									<div class="item-except text-sm text-muted h-1x">
              										<p style="font-size:12px" class="item-title _500">{{$val2->nama_sub_upload_progja}}</p>
              										<small style="font-size:9px;text-align:right;">{{$val2->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val1->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
              									</div>
              							  </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl2 as $val2)
                            <?php $data2 = DB::table('master_sub_upload_program_kerja')->where('id',$val2->id_sub_master_upload)->get()?>
                            @foreach($data2 as $val3)
                            <ul>
            								  <div style="text-align:right;">
            								  </div>
              							  <div class="list-body">
              									<div class="item-except text-sm text-muted h-1x">
              										<p style="font-size:12px" class="item-title _500">{{$val3->nama_sub_upload_progja}}</p>
              										<small style="font-size:9px;text-align:right;">{{$val3->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val2->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
              									</div>
              							  </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl3 as $val3)
                            <?php $data3 = DB::table('master_sub_upload_program_kerja')->where('id',$val3->id_sub_master_upload)->get()?>
                            @foreach($data3 as $val4)
                            <ul>
            								  <div style="text-align:right;">
            								  </div>
              							  <div class="list-body">
              									<div class="item-except text-sm text-muted h-1x">
              										<p style="font-size:12px" class="item-title _500">{{$val4->nama_sub_upload_progja}}</p>
              										<small style="font-size:9px;text-align:right;">{{$val4->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val3->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
              									</div>
              							  </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl4 as $val4)
                            <?php $data4 = DB::table('master_sub_upload_program_kerja')->where('id',$val4->id_sub_master_upload)->get()?>
                            @foreach($data4 as $val5)
                            <ul>
            								  <div style="text-align:right;">
            								  </div>
              							  <div class="list-body">
              									<div class="item-except text-sm text-muted h-1x">
              										<p style="font-size:12px" class="item-title _500">{{$val5->nama_sub_upload_progja}}</p>
              										<small style="font-size:9px;text-align:right;">{{$val5->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val4->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
              									</div>
              							  </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl5 as $val5)
                            <?php $data5 = DB::table('master_sub_upload_program_kerja')->where('id',$val5->id_sub_master_upload)->get()?>
                            @foreach($data5 as $val6)
                            <ul>
            								  <div style="text-align:right;">
            								  </div>
              							  <div class="list-body">
              									<div class="item-except text-sm text-muted h-1x">
              										<p style="font-size:12px" class="item-title _500">{{$val6->nama_sub_upload_progja}}</p>
              										<small style="font-size:9px;text-align:right;">{{$val6->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val5->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
              									</div>
              							  </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl6 as $val6)
                            <?php $data6 = DB::table('master_sub_upload_program_kerja')->where('id',$val6->id_sub_master_upload)->get()?>
                            @foreach($data6 as $val7)
                            <ul>
                              <div style="text-align:right;">
                              </div>
                              <div class="list-body">
                                <div class="item-except text-sm text-muted h-1x">
                                  <p style="font-size:12px" class="item-title _500">{{$val7->nama_sub_upload_progja}}</p>
                                  <small style="font-size:9px;text-align:right;">{{$val7->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val6->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
                                </div>
                              </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl7 as $val7)
                            <?php $data7 = DB::table('master_sub_upload_program_kerja')->where('id',$val7->id_sub_master_upload)->get()?>
                            @foreach($data7 as $val8)
                            <ul>
                              <div style="text-align:right;">
                              </div>
                              <div class="list-body">
                                <div class="item-except text-sm text-muted h-1x">
                                  <p style="font-size:12px" class="item-title _500">{{$val8->nama_sub_upload_progja}}</p>
                                  <small style="font-size:9px;text-align:right;">{{$val8->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val7->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
                                </div>
                              </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl8 as $val8)
                            <?php $data8 = DB::table('master_sub_upload_program_kerja')->where('id',$val8->id_sub_master_upload)->get()?>
                            @foreach($data8 as $val9)
                            <ul>
                              <div style="text-align:right;">
                              </div>
                              <div class="list-body">
                                <div class="item-except text-sm text-muted h-1x">
                                  <p style="font-size:12px" class="item-title _500">{{$val9->nama_sub_upload_progja}}</p>
                                  <small style="font-size:9px;text-align:right;">{{$val9->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val8->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
                                </div>
                              </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl9 as $val9)
                            <?php $data9 = DB::table('master_sub_upload_program_kerja')->where('id',$val9->id_sub_master_upload)->get()?>
                            @foreach($data9 as $val10)
                            <ul>
                              <div style="text-align:right;">
                              </div>
                              <div class="list-body">
                                <div class="item-except text-sm text-muted h-1x">
                                  <p style="font-size:12px" class="item-title _500">{{$val10->nama_sub_upload_progja}}</p>
                                  <small style="font-size:9px;text-align:right;">{{$val10->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val9->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
                                </div>
                              </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl10 as $val10)
                            <?php $data10 = DB::table('master_sub_upload_program_kerja')->where('id',$val10->id_sub_master_upload)->get()?>
                            @foreach($data10 as $val11)
                            <ul>
                              <div style="text-align:right;">
                              </div>
                              <div class="list-body">
                                <div class="item-except text-sm text-muted h-1x">
                                  <p style="font-size:12px" class="item-title _500">{{$val11->nama_sub_upload_progja}}</p>
                                  <small style="font-size:9px;text-align:right;">{{$val11->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val10->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
                                </div>
                              </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl11 as $val11)
                            <?php $data11 = DB::table('master_sub_upload_program_kerja')->where('id',$val11->id_sub_master_upload)->get()?>
                            @foreach($data11 as $val12)
                            <ul>
                              <div style="text-align:right;">
                              </div>
                              <div class="list-body">
                                <div class="item-except text-sm text-muted h-1x">
                                  <p style="font-size:12px" class="item-title _500">{{$val12->nama_sub_upload_progja}}</p>
                                  <small style="font-size:9px;text-align:right;">{{$val12->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val11->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
                                </div>
                              </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach

                            @foreach($tgl12 as $val12)
                            <?php $data12 = DB::table('master_sub_upload_program_kerja')->where('id',$val12->id_sub_master_upload)->get()?>
                            @foreach($data12 as $val13)
                            <ul>
                              <div style="text-align:right;">
                              </div>
                              <div class="list-body">
                                <div class="item-except text-sm text-muted h-1x">
                                  <p style="font-size:12px" class="item-title _500">{{$val13->nama_sub_upload_progja}}</p>
                                  <small style="font-size:9px;text-align:right;">{{$val13->ket }}  <a href="{{url('/laporan_upload_satker/upload/'.$val12->id_progja)}}" style="color:red">UPLOAD BERKAS</a> </small>
                                </div>
                              </div>
                            </ul>
                            <hr/>
                            @endforeach
                            @endforeach



                            <div class="text-right">
                                <a href="{{url('notifikasi')}}" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>


                </li>
            </ul>

            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="asset_admin/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle"
                             data-lock-picture="assets/images/!logged-user.jpg"/>
                    </figure>
                    <div class="profile-info" data-lock-name="{{Auth::user()->name}}" data-lock-email="{{Auth::user()->email}}">
                        <span class="name">{{Auth::user()->name}}</span>
                        <span class="role">
                            @if(Auth::user()->id_jenis_user == 1)
                                Super Admin
                            @elseif(Auth::user()->id_jenis_user == 2)
                                Bank
                            @else
                                User
                            @endif
                        </span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        @if(Auth::user()->id_jenis_user == 3)
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{url('profil')}}"><i class="fa fa-user"></i> My
                                Profile</a>
                        </li>
                        @endif
                        <li>
                            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i>
                                Lock Screen</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fa fa-power-off"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Menu
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
                     data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            <?php
                              $group = Auth::user()->id_jenis_user;
                              $menu = DB::table('p_hakakses')->where('id_jenis_user',$group)->join('p_menu','p_menu.id_menu','=','p_hakakses.id_menu')->orderBy('urutan','ASC')->get();

                              $submenu = DB::table('p_hakakses')->where('id_jenis_user',$group)->join('p_menu','p_menu.id_menu','=','p_hakakses.id_menu')->orderBy('urutan','ASC')->get();

                              ?>


                          @if(Auth::check() and $group)
                              @foreach($menu as $me)
                                 @if($me->parent == NULL && $me->level == NULL)
                                      @if($me->url !=NULL || $me->url == '#')
                                         <li><a href="{{url($me->url)}}"><i class="fa {{ $me->icon }}"></i>  {{ $me->nama_menu }}</a></li>

                                      @else

                                       <li class="nav-parent">
                                            <a>
                                                <i class="fa {{ $me->icon }}" aria-hidden="true"></i>
                                                <span>{{ $me->nama_menu }}</span>
                                            </a>

                                            <ul class="nav nav-children">
                                                @foreach($submenu as $sub)
                                                    @if($sub->parent == $me->id_menu)
                                                    @if($sub->url != "#")
                                                    <li><a href="{{ URL($sub->url) }}">{{$sub->nama_menu}}</a></li>
                                                    @else
                                                     <li class="nav-parent">
                                                    <a>
                                                        {{$sub->nama_menu}}
                                                    </a>
                                                    <ul class="nav nav-children">
                                                         @foreach($submenu as $tree)
                                                         @if($tree->parent == $sub->id_menu)

                                                         <li><a href="{{ url($tree->url) }}">{{$tree->nama_menu}}</a></li>

                                                         @endif
                                                         @endforeach
                                                    </ul>
                                                    </li>
                                                    @endif
                                                    @endif
                                                @endforeach
                                            </ul>

                                       </li>

                                      @endif
                                 @endif
                              @endforeach
                          @endif
                        </ul>
                    </nav>


                </div>

            </div>

        </aside>

<script type="text/javascript">
    function readmin(idx) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post('{{url('/readmen')}}',{id:idx,_token:token},function (data) {
             $(".notifications").load(" .notifications");
        });
    }
</script>
        <!-- end: sidebar -->
{{-- header --}}
