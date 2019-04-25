@include('header_admin');

        <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Form Rencana Kegiatan APBN</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>APBN</span></li>
                                <li><span>Form Rencana Kegiatan APBN</span></li>
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
                        
                                <h2 class="panel-title">Form Rencana Kegiatan APBN</h2>
                            </header>
                            <div class="panel-body">
                                 {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
								 
								
                                   <div class="form-group">
                                        <label for="nomor" class="col-md-3 control-label">Nomor</label>
                                        <div class="col-md-7">
                                             
                                            <input class="form-control" name="nomor" type="text" value="{{$kode}}" id="nomor" readonly>
											<input type="hidden" name="id" id="id" value="{{$id_rengiat}}">
                                            
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Klasifikasi</label>
                                        <div class="col-md-7">
                                             
                                            <input class="form-control" name="klasifikasi" type="text" id="klasifikasi">
                                            
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Lampiran</label>
                                        <div class="col-md-7">
                                             
                                            <input class="form-control" name="lampiran" type="text" id="lampiran">
                                            
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Perihal</label>
                                        <div class="col-md-7">
                                             
                                            <input class="form-control" name="perihal" type="text" id="perihal">
                                            
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Kepada</label>
                                        <div class="col-md-7">
                                             
                                            <input class="form-control" name="kepada" type="text" id="kepada">
                                            
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="" class="col-md-3 control-label">Isi</label>
                                        <div class="col-md-7">
                                             
                                            <textarea class="form-control" name="isi" type="text" id="isi"></textarea>
                                            
                                        </div>
                                    </div>
									
					
					<div class="form-group">
                        <label for="" class="col-md-3 control-label"><b>Tembusan</b></label>
                        <div class="col-md-7">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Tembusan Kepada</label>
                        <div class="col-md-7">
                            <input class="form-control" name="tembusan" type="text" value=""
                                   id="tembusan">
                        </div>
                    </div>
					
					<div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <br>
                            <a id="cobadeh" class="btn btn-primary" style="width:30%;">
                                Tambah
                            </a>
						</div>
                    </div>
					
                    <br><br>
					
					
                    <table class="table table-bordered table-responsive" id="dynamic"
                           style="margin-left: 15px; width: 97%">
                        <thead style="background-color:grey;color: white">
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Tembusan</center>
                            </th>
                            <th>
                                <center>Aksi</center>
                            </th>
                        </tr>
                        </thead>
                        <tbody style="background-color: #f9f9f9;">
                        </tbody>
                    </table>
					<br><br>

                                    

                                    <div class="form-group">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-7">
                                         {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                                          <a href="{{ url('/list_ceklist_Apbn/'.$id_rengiat)}}" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>

                                 {{Form::close()}}
                            </div>
                        </section>
    </section>


@include('footer_admin');

<script type="text/javascript">

    $(document).ready(function () {
        var i = 0;
        $('#cobadeh').click(function () {

            var a = $("#tembusan").val();


            if (a == "") {
                alert("Mohon Dilengkapi")
            } else {
                i++
                $('#dynamic').append(
                    '<tr id="row' + i + '">' +
                    '<td><center>' + i + '</td>' +
                    '<td><center>' + a + '<input type="hidden" value=' + a + ' name="tembusan[]"></center></td>' +
                    '<td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash-o"></i> Hapus</button></center></td>' +
                    '</tr>');
                $("#tembusan").val('');

            }
        });
    });

    $(document).on("click", ".btn_remove", function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();

    });


</script>
