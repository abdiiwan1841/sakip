@include('header_admin');

<?php
function buatrp($angka)
{
 $jadi = "Rp ".number_format($angka,2,',','.');
 return $jadi;
}
?>


<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Pra Usulan Renbut Satker 2</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Renbut</span></li>
                <li><span>Form Pra Usulan Renbut Satker 2</span></li>
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
			<a class="panel-title" onclick="myFunction()">Hasil Usulan Renbut Satker 2</a>
        </header>
        <div class="panel-body" id="asd" style="display:none;">
		
            <table class="table table-bordered table-responsive"
                   style="margin-left: 15px; width: 97%" >
                <thead style="background-color: #a4a8c5;">
				<input type="hidden" name="id_renbin" value="{{$id_renbin}}">
                <tr>
					<th>
                        <center>Program / Kegiatan / Subkegiatan / Detail</center>
                    </th>
                    <th>
                        <center>Volume Kegiatan</center>
                    </th>
                    <th>
                        <center>Rencana Anggaran</center>
                    </th>
                    <th>
                        <center>Keterangan</center>
                    </th>
					<th>
                        <center>Aksi</center>
                    </th>
                </tr>
                </thead>
				@foreach($master_jawaban_renbin as $value2)
                <tbody style="background-color: #f9f9f9;">
				<?php $asd = DB::select(" SELECT * from master_jawaban_renbin where id_program = '".$value2->id_program."' and id_renbin = '".$id_renbin."' "); 
				foreach($asd as $value4){?>
						<?php $program = DB::select(" SELECT * from master_program where id_program = '".$value2->id_program."' "); 
						foreach($program as $value3){?>
								<tr>
									<td><b>{{$value3->nama_program}}</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
						
						<?php $kegiatan = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_kegiatan."' "); 
						foreach($kegiatan as $value5){?>
								<tr>
									<td><b>{{$value5->rencana}} ({{$value5->kode}})</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
						
						<?php $sub = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_sub."' "); 
						foreach($sub as $value6){?>
								<tr>
									<td><b>{{$value6->rencana}} ({{$value6->kode}})</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
								
								<tr>
									<td>{{$value4->detail_kegiatan}}</td>
									<td>{{$value4->volume}}</td>
									<td>{{buatrp($value4->anggaran)}}</td>
									<td>{{$value4->keterangan}}</td>
									@if($tahap == 2)
										@if($value4->status == 1)
										<td><center><input type="checkbox" checked disabled></center></td>
										@elseif($value4->status == 0)
										<td><center><input type="checkbox" disabled></center></td>
										@endif
									@endif
								</tr>
				<?php } ?>
                </tbody>
				@endforeach
            </table>
			@foreach($renbin as $value)
			<div class="panel-body">
			<div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Keterangan :</label>
                <div class="col-md-7">
					{{$value->keterangan}}
                </div>
            </div>
			</div>
			@endforeach
        </div>
    </section>
	
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title">Form Pra Usulan Renbut Satker 2</h2>
        </header>
        <div class="panel-body">
			@foreach($master_jawaban_renbin as $value2)
            <table class="table table-bordered table-responsive"
                   style="margin-left: 15px; width: 97%" >
                <thead style="background-color: #a5c3aa;">
				<input type="hidden" name="id_renbin" value="{{$id_renbin}}">
                <tr>
					<th>
                        <center>Program / Kegiatan / Subkegiatan / Detail</center>
                    </th>
                    <th>
                        <center>Volume Kegiatan</center>
                    </th>
                    <th>
                        <center>Rencana Anggaran</center>
                    </th>
                    <th>
                        <center>Keterangan</center>
                    </th>
					<th>
                        <center>Kelengkapan</center>
                    </th>
                </tr>
                </thead>
				
                <tbody style="background-color: #ecedf0;">
				<?php $asd = DB::select(" SELECT * from master_jawaban_renbin where id_program = '".$value2->id_program."' and id_renbin = '".$id_renbin."' "); 
				foreach($asd as $value4){?>
						<?php $program = DB::select(" SELECT * from master_program where id_program = '".$value2->id_program."' "); 
						foreach($program as $value3){?>
								<tr>
									<td><b>{{$value3->nama_program}}</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
						
						<?php $kegiatan = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_kegiatan."' "); 
						foreach($kegiatan as $value5){?>
								<tr>
									<td><b>{{$value5->rencana}} ({{$value5->kode}})</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
						
						<?php $sub = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_sub."' "); 
						foreach($sub as $value6){?>
								<tr>
									<td><b>{{$value6->rencana}} ({{$value6->kode}})</b></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
						<?php } ?>
								
								<tr>
									<td><a onclick="myFunction{{$value4->id_jawaban}}()">{{$value4->detail_kegiatan}}</a></td>
									<td>{{$value4->volume}}</td>
									<td>{{buatrp($value4->anggaran)}}</td>
									<td>{{$value4->keterangan}}</td>
									@if($tahap == 2)
										@if($value4->status_ == 1)
										<td><center><input type="checkbox" checked disabled></center></td>
										@elseif($value4->status_ == 0)
										<td><center><input type="checkbox" disabled></center></td>
										@endif
									@endif
								</tr>
				<?php } ?>
                </tbody>
            </table>
			@foreach($asd as $value4)
					<div id="asd{{$value4->id_jawaban}}" style="display:none; margin-left: 15px; width: 97%" >
					<br><center>Detail Kegiatan :<font color="blue" size="3"> {{$value4->detail_kegiatan}}</font><hr width="20%"></center>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>
								<center>No</center>
							</th>
							<th>
								<center>Komponen Pemeriksaan</center>
							</th>
							<th>
								<center>ADA/TIDAK</center>
							</th>
						</tr>
						</thead>
						<tbody>
						
						<tr>
							<th>
								<center>3</center>
							</th>
							<th>
								<center><a href="{{ url('detailrenbut_form2/'.$value4->id_jawaban) }}">Kerangka Acuan
										Kegiatan (KAK)/ TOR</a></center>
							</th>
							<th>
								<center><?php if ($value4->id_kerangka_acuan_kegiatan == null || $value4->id_kerangka_acuan_kegiatan == 0) {
										echo "TIDAK";
									} else {
										echo "ADA";
									}?></center>
							</th>
						</tr>
						<tr>
							<th>
								<center>4</center>
							</th>
							<th>
								<center><a href="{{ url('detailrenbut_form3/'.$value4->id_jawaban) }}">Uraian Kegiatan dan
										Rincian Biaya</a></center>
							</th>
							<th>
								<center><?php if ($value4->id_uraian_kegiatan_rincian_biaya == null || $value4->id_uraian_kegiatan_rincian_biaya == 0) {
										echo "TIDAK";
									} else {
										echo "ADA";
									}?></center>
							</th>
							
						</tr>
						<tr>
							<th>
								<center>5</center>
							</th>
							<th>
								<center><a href="{{ url('detailrenbut_form4/'.$value4->id_jawaban) }}">Uraian dan Perincian
										Biaya Administrasi</a></center>
							</th>
							<th>
								<center><?php if ($value4->id_uraian_biaya_administrasi == null || $value4->id_uraian_biaya_administrasi == 0) {
										echo "TIDAK";
									} else {
										echo "ADA";
									}?></center>
							</th>
						</tr>
						<tr>
							<th>
								<center>6</center>
							</th>
							<th>
								<center><a href="{{ url('detailrenbut_form5/'.$value4->id_jawaban) }}">Syarat - Syarat teknis
										Pelaksanaan</a></center>
							</th>
							<th>
								<center><?php if ($value4->id_syarat_teknis == null || $value4->id_syarat_teknis == 0) {
										echo "TIDAK";
									} else {
										echo "ADA";
									}?></center>
							</th>
						</tr>
						<tr>
							<th>
								<center>7</center>
							</th>
							<th>
								<center><a href="{{ url('detailrenbut_form6/'.$value4->id_jawaban) }}">Gambar/Denah</a>
								</center>
							</th>
							<th>
								<center><?php if ($value4->id_gambar_denah == null || $value4->id_gambar_denah == 0) {
										echo "TIDAK";
									} else {
										echo "ADA";
									}?></center>
							</th>
						</tr>
						<tr>
							<th>
								<center>8</center>
							</th>
							<th>
								<center><a href="{{ url('detailrenbut_form7/'.$value4->id_jawaban) }}">Bagan Organisasi
										Kegiatan</a></center>
							</th>
							<th>
								<center><?php if ($value4->id_bagan_organisasi == null || $value4->id_bagan_organisasi == 0) {
										echo "TIDAK";
									} else {
										echo "ADA";
									}?></center>
							</th>
						</tr>

						</tbody>
					</table>
					<br>
					<div class="form-group">
						<label for="nama_kegiatan" class="col-md-1 control-label"><b>Catatan</b></label>
						<div class="col-md-11">

							<textarea class="form-control" placeholder="<?php echo $value4->feedback; ?>" readonly></textarea>

						</div>
					</div>
						
						
					</div>
					<hr>
				
				<script>
				function myFunction{{$value4->id_jawaban}}() {
					var x = document.getElementById("asd{{$value4->id_jawaban}}");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
				}
				</script>
			@endforeach	
			
			
			@endforeach
			<a href="{{ url('/renbutkirim/'.$id_renbin)}}" style="margin-left: 15px;" class="btn btn-primary">Kirim Renbut</a>
        </div>
                    
    </section>

<script>
function myFunction() {
    var x = document.getElementById("asd");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

@include('footer_admin');

<script>
$(function () {
        var input = document.getElementById('rencana_anggaran');
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


        $("#update,#release").datepicker({
            dateFormat: "dd-mm-yy"
        });


    })
</script>
<script type="text/javascript">
function toAngka(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)};

    $(document).ready(function () {
        var z = 1;
        $('#tambah').click(function () {

            var a = $("#id_program").val();
            var b = $("#id_kegiatan").val();
			var c = $("#id_sub").val();
			var a1 = $('#id_program option:selected').attr('program_name');
			var b1 = $('#id_kegiatan option:selected').attr('kegiatan_name');
			var c1 = $('#id_sub option:selected').attr('sub_name');
			var d = $("#detail_kegiatan").val();
            var e = $("#volume").val();
			var f1 = $("#rencana_anggaran").val();
			var f2 = toAngka(f1);
			var f = parseInt(f2);
			var g = $("#keterangan").val();
			


            if (a == "" || b == "" || c == "" ) {
                alert("Mohon Dilengkapi")
            } else {
                z++
                $('#dynamic').append('<tr id="row' + z + '">' +
                    '<td><center><b>' + a1 + '</b><input type="hidden" value="' + a + '" name="id_program[]"></center></td>' +
                    '<td><center><b>' + b1 + '</b><input type="hidden" value="' + b + '" name="id_kegiatan[]"></center></td>' +
					'<td><center><b>' + c1 + '</b><input type="hidden" value="' + c + '" name="id_sub[]"></center></td>' +
					'<td><center>' + d + '<input type="hidden" value="' + d + '" name="detail_kegiatan[]"></center></td>' +
					'<td><center>' + e + '<input type="hidden" value="' + e + '" name="volume[]"></center></td>' +
					'<td><center>' + f1 + '<input type="hidden" value="' + f + '" name="rencana_anggaran[]"></center></td>' +
					'<td><center>' + g + '<input type="hidden" value="' + g + '" name="keterangan[]"></center></td>' +
                    '<td><center><button type="button" name="remove" id="' + z + '" class="btn btn-danger btn_remove_1">Hapus</button></center></td>' +
                    '</tr>');
            }
			$("#detail_kegiatan").val("");
			$("#volume").val("");
			$("#rencana_anggaran").val("");
			$("#keterangan").val("");
        });
    });
	
	

    $(document).on('click', '.btn_remove_1', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

</script>
