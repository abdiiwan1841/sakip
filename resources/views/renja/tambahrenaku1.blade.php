@include('header_admin');


<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Tambah Renbut</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Renbut</span></li>
                <li><span>Form Tambah Renbut</span></li>
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

            <h2 class="panel-title">Form Tambah Renbut</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => '/tambahrencana', 'class' => 'form-horizontal', 'files' => true]) !!}


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Sumber Anggaran</label>
                <div class="col-md-7">


                    <select class="form-control" name="sumber_anggaran">
                        <option value="APBN">APBN</option>
                        <option value="PNBP">PNBP</option>
                    </select>

                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-7">

                    <input class="form-control" name="tanggal" type="text" value="<?php echo date('d-m-Y')?>" readonly>

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Nomer Urut Kebutuhan</label>
                <div class="col-md-7">

                    <input class="form-control" name="kode" type="text" value="{{$kode}}" placeholder="{{$kode}}" readonly>

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Tahun Perencanaan</label>
                <div class="col-md-7">

                    <input class="form-control" name="tahun_perencanaan" type="number" value="" id="tahun_perencanaan">

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Program</label>
                <div class="col-md-7">

                    <select class="form-control select2" id="id_program"  onchange="getkegiatan()" >
                        <option value="">--Pilih Program--</option>
                        @foreach($program as $value)
                        <option value="{{$value->id_program}}" program_name="{{$value->nama_program}}" >{{$value->nama_program}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                <div class="col-md-7">
                      <div id="statekegiatan">
                    <select class="form-control select2" onchange="getsub()" id="id_kegiatan">
                        <option value="">--Pilih Kegiatan--</option>
                       
                    </select>
                </div>

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Sub Kegiatan</label>
                <div class="col-md-7">
                   <div id="statesub">
                    <select class="form-control select2" name="subkegiatan" id="id_sub">
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
          document.getElementById('id_sub').innerHTML=req.responseText;
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


  function getkegiatan() {
    var strURL = "{{url('ambilkegiatan')}}";
    var id_program = document.getElementById("id_program").value;


    var req = getXMLHTTP();

    if (req) {
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                if (req.status == 200) {
                    document.getElementById('id_kegiatan').innerHTML = req.responseText;
					 // $("#id_kegiatan").append(req.responseText);
					 $(document).ready(function() {
      $(".select2").select2();
      $(window).resize(function() {
    $('.select2').css('width', "100%");
});

    });
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
            }
                        //req.open("GET", strURL+ "?perusahaan=" + perusahaan, true);
                        req.open("GET", strURL + "/" + id_program, true);
                        req.send(null);

            }
   }

</script>



<div class="form-group">
                <!--<label for="nama_kegiatan" class="col-md-3 control-label">Kode akun</label>
                <div class="col-md-7">
                    <select class="form-control">
                        <option value="">--Pilih Akun--</option>
                        <option value="">MASIH DAMI</option>
                        <option value="">DAMI MASIH</option>
                    </select>
                </div>-->

                <div class="col-md-6 col-md-offset-3">
                    <br>
                    <a id="tambah" class="btn btn-primary" style="width:30%;">
                        Tambah
                    </a>
                </div>
            </div><br>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><h3><b>Rancangan Renbut</b></h3></label>
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
        <tbody style="background-color: #f9f9f9;">

            @foreach($shopping_list as $shop)


            <tr>
                <td><center> 
                     <input type="hidden" value="{{$shop->id}}" name="id_shop[]">
                    @foreach($program as $prog)
                    @if($shop->id_program==$prog->id_program)
                    <b> {{$prog->nama_program}} </b>
                    <input type="hidden" value="{{$shop->id_program}}" name="id_program[]">

                    @endif
                @endforeach</center></td>

                <td><center>     
                    @foreach($kegiatan as $keg)
                    @if($shop->id_kegiatan==$keg->id_rencana)
                    <b> {{$keg->rencana}} </b>
                    <input type="hidden" value="{{$shop->id_kegiatan}}" name="id_kegiatan[]">
                    @endif
                @endforeach</center></td>

                <td><center>
                    @foreach($subkegiatan as $sub)
                    @if($shop->id_sub==$sub->id_sub_kegiatan)
                    <b> {{$sub->nama_sub_kegiatan}} </b>
                    <input type="hidden" value="{{$shop->id_sub}}" name="id_sub[]">
                    @endif
                    @endforeach
                </center></td>

                <td><center>{{$shop->detail_kegiatan}}<input type="hidden" value="{{$shop->detail_kegiatan}}" name="detail_kegiatan[]"></center></td>

                <td><center>{{$shop->volume}}<input type="hidden" value="{{$shop->volume}}" name="volume[]"></center></td>

                <td><center>{{$shop->anggaran}}<input type="hidden" value="{{$shop->anggaran}}" name="rencana_anggaran[]"></center></td>

                <td><center>{{$shop->keterangan}}<input type="hidden" value="{{$shop->keterangan}}" name="keterangan[]"></center></td>

                <td><center></center></td></tr>
                @endforeach

            </tbody>
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
</section>


@include('footer_admin');

<script>
 $(document).ready(function() {
      $(".select2").select2();
      $(window).resize(function() {
    $('.select2').css('width', "100%");
});

    });
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
