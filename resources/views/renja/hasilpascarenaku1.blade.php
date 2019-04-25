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
        <h2>Form pra Usulan Renbut Satker</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Renbut</span></li>
                <li><span>Form pra Usulan Renbut Satker</span></li>
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
			<a class="panel-title" onclick="myFunction()">Hasil Usulan Renbut Satker</a>
        </header>
        <div class="panel-body" id="asd" style="display:none;">
		
            <table class="table table-bordered table-responsive"
                   style="margin-left: 15px; width: 97%;" >
                <thead style="background-color: #b2b6e4;">
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

            <h2 class="panel-title">Form Pra Usulan Renbut Satker</h2>
        </header>
		note: penolakan detail kebutuhan akan menjadi shopping list pada setiap satker 
        <div class="panel-body">
            
            @foreach($renbin as $value)
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Sumber Anggaran</label>
                <div class="col-md-7">
				{{$value->sumber_anggaran}}
                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-7">
				{{$value->tanggal}}
                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kode Rencana Kebutuhan</label>
                <div class="col-md-7">
				{{$value->kode_rencana_kebutuhan}}
                </div>
            </div>
			
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Tahun Perencanaan</label>
                <div class="col-md-7">
				{{$value->tahun_anggaran}}
                </div>
            </div>
			@endforeach
			
			{!! Form::open(['url' => '/editrencana1', 'class' => 'form-horizontal', 'files' => true]) !!}
			<br><hr>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Program</label>
                <div class="col-md-7">
				<input class="form-control" type="hidden" name="id_renbin" value="{{$id_renbin}}">
                    <select class="form-control" id="id_program">
                        <option value="">--Pilih Program--</option>
					@foreach($programs as $value)
                        <option value="{{$value->id_program}}" program_name="{{$value->nama_program}}" >{{$value->nama_program}}</option>
					@endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                <div class="col-md-7">

                    <select class="form-control" onchange="getsub()" id="id_kegiatan">
                        <option value="">--Pilih Kegiatan--</option>
						@foreach($kegiatans as $value)
                        <option value="{{$value->id_rencana}}" kegiatan_name="{{$value->rencana}}({{$value->kode}})">{{$value->rencana}} | {{$value->kode}}</option>
						@endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Sub Kegiatan</label>
                <div class="col-md-7">
					<div id="statesub">
                    <select class="form-control">
                        <option value="">--Pilih Sub Kegiatan--</option>
                    </select>
					</div>

                </div>
            </div>
			<hr>
			<div class="form-group">
                <label for="detail_kegiatan" class="col-md-3 control-label">Detail Kegiatan</label>
                <div class="col-md-7">
					<textarea class="form-control" id="detail_kegiatan" ></textarea>
                </div>
            </div>
			<div class="form-group">
                <label for="volume_kegiatan" class="col-md-3 control-label">Volume Kegiatan</label>
                <div class="col-md-7">
					<input class="form-control" type="text" id="volume">
                </div>
            </div>
			<div class="form-group">
                <label for="rencana_anggaran" class="col-md-3 control-label">Rencana Anggaran</label>
                <div class="col-md-7">
					<input class="form-control" type="text" id="rencana_anggaran">
                </div>
            </div>
			<div class="form-group">
                <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                <div class="col-md-7">
					<input class="form-control" value="" type="text" id="keterangan">
                </div>
            </div>
			

<script>
function getXMLHTTP(){
	var xmlhttp=false;
	try
	{
		xmlhttp=new XMLHttpRequest();
	}
	catch(e){
		try{
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e){
			try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e1){
				xmlhttp = false;
			}
		}
	}
	return xmlhttp;
}

function getsub() {
   var strURL = "{{url('getsub')}}";
   var id_kegiatan = document.getElementById("id_kegiatan").value;

   var req = getXMLHTTP();
    if (req) {
      req.onreadystatechange = function() {
			if (req.readyState == 4) {
				if (req.status == 200) {
					 document.getElementById('statesub').innerHTML=req.responseText;
				} else {
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}
		}
		//req.open("GET", strURL+ "?perusahaan=" + perusahaan, true);
		req.open("GET", strURL + "/" + id_kegiatan, true);
		req.send(null);

	}
}

</script>


			
            <div class="form-group">

                <div class="col-md-6 col-md-offset-3">
                    <br>
                    <a id="tambah" class="btn btn-primary" style="width:30%;">
                        Tambah
                    </a>
                </div>
            </div><br>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><h3><b>Rancangan Kebutuhan</b></h3></label>
                <div class="col-md-7">
                </div>
            </div>

            <table class="table table-bordered table-responsive" id="dynamic"
                   style="margin-left: 15px; width: 97%">
                <thead style="background-color: #286090;color: white">
                <tr>
					<th>
                        <center>Program</center>
                    </th>
					<th>
                        <center>Kegiatan (Kode)</center>
                    </th>
					<th>
                        <center>Subkegiatan (Kode)</center>
                    </th>
                    <th>
                        <center>Detail Kegiatan</center>
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
				<?php $asd2 = DB::select(" SELECT * from master_jawaban_renbin where id_program = '".$value2->id_program."' and id_renbin = '".$id_renbin."' and status = '1' "); 
				foreach($asd2 as $value4){?>
					<tr>
						<?php $program2 = DB::select(" SELECT * from master_program where id_program = '".$value2->id_program."' "); 
						foreach($program2 as $value3){?>
						<td>{{$value3->nama_program}}</td>
						<?php } ?>
						<?php $kegiatan2 = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_kegiatan."' "); 
						foreach($kegiatan2 as $value5){?>
						<td>{{$value5->rencana}}</td>
						<?php } ?>
						<?php $sub = DB::select(" SELECT * from master_rencana where id_rencana = '".$value4->id_sub."' "); 
						foreach($sub as $value6){?>
						<td>{{$value6->rencana}}</td>
						<?php } ?>
						<td>{{$value4->detail_kegiatan}}</td>
						<td>{{$value4->volume}}</td>
						<td>{{buatrp($value4->anggaran)}}</td>
						<td>{{$value4->keterangan}}</td>
						<td></td>
					</tr>
				<?php } ?>
                </tbody>
				@endforeach
            </table>

            <br><div class="form-group">
                <label class="col-md-5"></label>
                <div class="col-md-7">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                    <a href="#" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            {{Form::close()}}
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
