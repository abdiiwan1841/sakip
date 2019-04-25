@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>APBN</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Rengiat</span></li>
                <li><span>Form APBN</span></li>
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

            <h2 class="panel-title">Form Rencana Kegiatan (APBN)</h2>
        </header>
        <div class="panel-body">

            {{Form::open(array('url' => $url,'method' => 'post'))}}
            {{csrf_field()}}

            <fieldset class="row">
			
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
						@if(empty($id_program))
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Program/Kode Program</label>
						@endif
                            <div class="col-sm-5">
                                {{-- {{ Form::text('email',null, array('class' => 'form-control', 'placeholder' => 'Email','disabled' => 'disabled')) }} --}}
								
								@if(empty($id_program))
                                <select class="form-control select2me" name="id_program" id="id_program">
                                    <option value='0' selected>- Pilih Program -</option>


                                    <?php foreach($rencana as $row){ ?>
                                    <option value="<?php echo $row->id_program; ?>"><?php echo $row->nama_program; ?></option>
                                    <?php } ?>

                                </select>
								@else
								<input class="form-control" name="id_program" value="{{$id_program}}" type="hidden">
								@endif
								
								@if(!empty($id_renbin_detail))
									<input name="id_renbin_detail" type="hidden" value="{{$id_renbin_detail}}">
								@endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
						@if(empty($id_kegiatan))
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Kegiatan/kode kegiatan</label>
						@endif
                            <div class="col-sm-5">
                                {{-- {{ Form::text('email',null, array('class' => 'form-control', 'placeholder' => 'Email','disabled' => 'disabled')) }} --}}
							@if(empty($id_kegiatan))
                                <select class="form-control select2me" name="id_kegiatan" id="id_kegiatan">
                                    <option value='0' selected>- Pilih Program Dahulu -</option>
                                </select>
							@else
								<input class="form-control" name="id_kegiatan" value="{{$id_kegiatan}}" type="hidden">
							@endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
						@if(empty($id_sub))
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Keluaran</label>
						@endif
                            <div class="col-sm-5">
                                {{-- {{ Form::text('keluaran',null, array('class' => 'form-control', 'placeholder' => 'Keluaran','disabled' => 'disabled')) }}--}}
							@if(empty($id_sub))
								<select class="form-control select2me" name="keluaran" id="keluaran">
                                </select>
							@else
								<input class="form-control" name="keluaran" value="{{$id_sub}}" type="hidden">
							@endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Detail
                                Kegiatan</label>
                            <div class="col-sm-5">
							@if(empty($id_sub))
                                {{ Form::text('detail_kegiatan',null, array('class' => 'form-control', 'placeholder' => 'Detail Kegiatan')) }}
							@else
								<input class="form-control" name="detail_kegiatan" value="{{$detail_kegiatan}}" type="text" readonly>
							@endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Akun</label>
                            <div class="col-sm-5">
                                {{-- {{ Form::text('email',null, array('class' => 'form-control', 'placeholder' => 'Email','disabled' => 'disabled')) }} --}}

                                <select class="form-control select2me" name="akun" id="akun">
                                    <option value='0' selected>- Pilih Akun -</option>


                                    <?php foreach($akun as $row2){ ?>
                                    <option value="<?php echo $row2->nama_akun; ?>"><?php echo $row2->nama_akun; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="myModalWithDatePicker">
                    <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Tanggal Rencana Kegiatan</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control pull-right datepicker" id="tglren" name="tglren" value="<?php echo date('d-m-Y') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alokasi Anggaran</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="alokasi_anggaran" name="alokasi_anggaran" placeholder="Alokasi Anggaran" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alokasi Anggaran Fisik</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="alokasi_anggaran_fisik" name="alokasi_anggaran_fisik" placeholder="Alokasi Anggaran Fisik">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Alokasi Anggaran Administrasi</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="alokasi_anggaran_biaya_administrasi" name="alokasi_anggaran_biaya_administrasi" placeholder="Alokasi Anggaran Administrasi">
                                {{--{{ Form::number('anggaran_administrasi',null, array('class' => 'form-control', 'placeholder' => 'Alokasi Anggaran Administrasi')) }}--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username">Penyaluran Anggaran</label>
                            <div class="col-sm-5">
                                <table class="table table-bordered table-responsive" id="dynamic"
                                       style="margin-left: 15px; width: 97%">
                                    <thead style="background-color: #286090;color: white">
                                    <tr>
                                        <th>
                                            <center>I</center>
                                        </th>
                                        <th>
                                            <center>II</center>
                                        </th>
                                        <th>
                                            <center>III</center>
                                        </th>
                                        <th>
                                            <center>IV</center>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody style="background-color: #f9f9f9;">
                                    <tr>
                                        <td><center><input type="radio" value="1" name="penyalurananggaran"></center></td>
                                        <td><center><input type="radio" value="2" name="penyalurananggaran"></center></td>
                                        <td><center><input type="radio" value="3" name="penyalurananggaran"></center></td>
                                        <td><center><input type="radio" value="4" name="penyalurananggaran"></center></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-sm-3 control-label text-sm-right pt-1" for="w1-username"></label>
                            <div class="col-sm-5">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

            </fieldset>


            {{Form::close()}}

        </div>
    </section>
</section>

<script type="text/javascript">
    $(function () {
        var input = document.getElementById('alokasi_anggaran');
        input.addEventListener('keyup', function (e) {
            input.value = formatRupiah(this.value, 'Rp ');
        });

        function formatRupiah(bilangan, prefix) {
            var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

    })

    $(function () {
        var input = document.getElementById('alokasi_anggaran_fisik');
        input.addEventListener('keyup', function (e) {
            input.value = formatRupiah(this.value, 'Rp ');
        });

        function formatRupiah(bilangan, prefix) {
            var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

    })

    $(function () {
        var input = document.getElementById('alokasi_anggaran_biaya_administrasi');
        input.addEventListener('keyup', function (e) {
            input.value = formatRupiah(this.value, 'Rp ');
        });

        function formatRupiah(bilangan, prefix) {
            var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

    })

    $('#tglren').datepicker({
        autoclose: true,
        container: '#myModalWithDatePicker',
        format: "dd-mm-yyyy"
    });
    $('#example').DataTable();
	
    $(document).ready(function () {
        $("#id_program").on("change", function () {
            var kegiatan = $("#id_program option:selected").val();

            $.get('{{url("/get_kegiatan")}}/' + kegiatan, function (data) {
                $('#id_kegiatan').html('');
                $('#id_kegiatan').append(data);
				$('#keluaran').append(data);
                // alert(data);
            })

        })

        $("#id_rak").on("change", function () {
            var box = $("#id_rak option:selected").val();

            $.get('{{url("/get_box")}}/' + box, function (data) {
                $('#id_box').html('');
                $('#id_box').append(data);
                // alert(data);
            })

        })
		
		$("#alokasi_anggaran_biaya_administrasi").on("change", function () {
            var fisik = $("#alokasi_anggaran_fisik").val();
			var administrasi = $("#alokasi_anggaran_biaya_administrasi").val();
			
			
			var anggaran = convertToAngka(fisik) + convertToAngka(administrasi);
			
			document.getElementById("alokasi_anggaran").value = convertToRupiah(anggaran);



        })
		
    })
</script>
<script>
function convertToAngka(rupiah)
{
	return parseInt(rupiah.replace(/[^0-9]/g, ''), 10);
}
function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
</script>


@include('footer_admin')