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
        <h2>Form Penyusunan Biaya Administrasi </h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span></span></li>
                <li><span>Form Penyusunan Biaya Administrasi </span></li>
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

            <h2 class="panel-title">Form Penyusunan Biaya Administrasi </h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Unit Organisasi</label>
                <div class="col-md-7">

                    <input class="form-control" name="unit" type="text" value="" id="unit">

                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
                <div class="col-md-7">
                   <?php if (isset($kerangka->id_uraian_kegiatan_rincian_biaya)) {

                    foreach ($uraian as $key) {
                        if ($kerangka->id_uraian_kegiatan_rincian_biaya==$key->id_uraian_kegiatan_rincian_biaya) {
                             $alokasi_dana = $key->alokasi_dana;
                        }
                    }
                   
                } else {
                    $alokasi_dana = null;
                } ?>

                <input class="form-control" name="alokasi_dana" type="text" id="alokasi_dana" value="{{$alokasi_dana}}">
                <input style="display: none" name="id" id="id" value="{{$id}}">

            </div>
        </div>

        <div class="form-group">
            <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Kegiatan</label>
            <div class="col-md-7">
                @if(isset($kerangka->id_kegiatan))

                @foreach($kegiatan as $keg)
                @if($keg->id_kegiatan == $kerangka->id_kegiatan)
                <input class="form-control" type="text" value="{{$keg->nama_kegiatan}}">
			    <input class="form-control" type="hidden" name="id_kegiatan" value="{{$keg->id_kegiatan}}">
                @endif
                @endforeach

                @else
                <select class="form-control select2me" name="id_kegiatan"
                id="id_kegiatan">
                <option value='0' selected>- Pilih Kegiatan -</option>


                <?php foreach($kegiatan as $row2){ ?>
                <option value="<?php echo $row2->id_kegiatan; ?>"><?php echo $row2->nama_kegiatan; ?></option>
                <?php } ?>

            </select>
            @endif

        </div>
    </div>

    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Waktu Pelaksanaan</label>
        <div class="col-md-7">
              <?php if (isset($kerangka->waktu_pelaksanaan)) {
            $waktu_pelaksanaan = $kerangka->waktu_pelaksanaan;
        } else {
            $waktu_pelaksanaan = null;
        } ?>
            <input class="form-control" value="{{$waktu_pelaksanaan}}" name="waktu_pelaksanaan" type="text" value="" id="waktu_pelaksanaan">

        </div>
    </div>

    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Pengadaan</label>
        <div class="col-md-7">

            <input class="form-control" name="jenis_pengadaan" type="text" value="" id="jenis_pengadaan">

        </div>
    </div>
    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur</label>
        <div class="col-md-7">
                  <?php if (isset($kerangka->satuan_ukur_keluaran)) {
            $satuan_ukur_keluaran = $kerangka->satuan_ukur_keluaran;
        } else {
            $satuan_ukur_keluaran = null;
        } ?>
            <input class="form-control" value="{{$satuan_ukur_keluaran}}" name="satuan_ukur" type="text" id="satuan_ukur">

        </div>
    </div>

    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label"><b>Uraian Biaya Administrasi</b></label>
        <div class="col-md-7">

        </div>
    </div>
    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Uraian</label>
        <div class="col-md-7">

            <input class="form-control" name="uraian_masuk" type="text" value="" id="uraian_masuk">

        </div>
    </div>


    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Jumlah Satuan</label>
        <div class="col-md-7">

            <input class="form-control" name="jumlah_satuan_masuk" type="number" value="" id="jumlah_satuan_masuk">

        </div>
    </div>
    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Harga Satuan</label>
        <div class="col-md-7">

            <input class="form-control" name="harga_satuan_masuk" type="text" value="" id="harga_satuan_masuk">

        </div>
    </div>


    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan</label>
        <div class="col-md-7">

         <select class="form-control select2me" name="satuan_masuk" id="satuan_masuk">
            <option value='0' selected>- Satuan -</option>

            <?php 
            $satuan = DB::select(" SELECT * from master_satuan ");
            foreach($satuan as $row){ ?>
            <option value="<?php echo $row->satuan; ?>"><?php echo $row->satuan; ?></option>
            <?php } ?>

        </select>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <br>
        <a id="masuk" class="btn btn-primary" style="width:30%;">
            Tambah
        </a>
    </div>
</div><br><br>

<table class="table table-bordered table-responsive" id="dynamic"
style="margin-left: 15px; width: 97%">
<thead style="background-color: #286090;color: white">
    <tr>
        <th>
            <center>Uraian</center>
        </th>
        <th>
            <center>Jumlah Satuan</center>
        </th>
        <th>
            <center>Harga Satuan</center>
        </th>
        <th>
            <center>Satuan</center>
        </th>
        <th>
            <center>Jumlah Total</center>
        </th>
        <th>
            <center>Aksi</center>
        </th>
    </tr>
</thead>
<tbody style="background-color: #f9f9f9;">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</tbody>
</table>


<div class="form-group">
    <label for="" class="col-md-3 control-label">Kebutuhan biaya pengadaan</label>
    <div class="col-md-7">
        <input class="form-control" readonly name="kebutuhan_biaya_pengadaan" type="number" value="" id="kebutuhan_biaya_pengadaan">
    </div>
</div>

<div class="form-group">
    <label for="" class="col-md-3 control-label">Pagu anggaran</label>
    <div class="col-md-7">
        <input class="form-control" readonly name="pagu_anggaran" type="number" value="" id="pagu_anggaran">
    </div>
</div>

<div class="form-group">
    <label for="" class="col-md-3 control-label">Biaya Administrasi</label>
    <div class="col-md-7">
        <input class="form-control" readonly name="biaya_administrasi" type="number" value="" id="biaya_administrasi">
    </div>
</div>

<div class="form-group">
    <label for="" class="col-md-3 control-label">Biaya Fisik</label>
    <div class="col-md-7">
        <?php if(isset($biaya_fisik->total_biaya_fisik)){
            $bf = $biaya_fisik->total_biaya_fisik;
        }else {
            $bf = '';
        }?>
        <input class="form-control" readonly name="biaya_fisik" type="number" value="<?php echo $bf;?>" id="biaya_fisik">
    </div>
</div>

<br><br><div class="form-group">
    <label class="col-md-3"></label>
    <div class="col-md-7">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('/list_ceklist_Apbn/'.$id)}}" class="btn btn-danger">Kembali</a>
    </div>

</div>

{{Form::close()}}
</div>
</section>
</section>


@include('footer_admin');

<script>
    $(function () {
        var input = document.getElementById('harga_satuan_masuk');
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
    function toRp(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.\t'+e(d)+',00'}

    $(document).ready(function () {
        var i = 0;
        if($("#kebutuhan_biaya_pengadaan").val() == ''){
            $("#kebutuhan_biaya_pengadaan").val(0);
        }
        if($("#pagu_anggaran").val() == ''){
            $("#pagu_anggaran").val(0);
        }
        if($("#biaya_administrasi").val() == ''){
            $("#biaya_administrasi").val(0);
        }
        if($("#biaya_fisik").val() == ''){
            $("#biaya_fisik").val(0);
        }
        $('#masuk').click(function () {

            var a = $("#uraian_masuk").val();
            var b = $("#jumlah_satuan_masuk").val();

			//var c = $("#harga_satuan_masuk").val();
            var c1 = $("#harga_satuan_masuk").val();
            var c2 = toAngka(c1);
            var c = parseInt(c2);

            var d = $("#satuan_masuk").val();
            var e = $("#id").val();

            var jumlah = (parseFloat(b) * parseFloat(c));



            if (a == "") {
                alert("Mohon Dilengkapi")
            } else {
                i++
                $('#dynamic').append(
                    '<tr id="row' + i + '">' +

                    '<td><center>' + a + '<input type="hidden" value="' + a + '" name="uraian_keluar[]"></center></td>' +
                    '<td><center>' + b + '<input type="hidden" value="' + b + '" name="jumlah_keluar[]"></center></td>' +
                    '<td><center>' + c1 + '<input type="hidden" value="' + c + '" name="harga_satuan_keluar[]"></center></td>' +
                    '<td><center>' + d + '<input type="hidden" value="' + d + '" name="satuan_keluar[]"></center></td>' +

                    '<td><center>'+toRp(jumlah)+'<input type="hidden" value="' + jumlah + '" name="jumlah_total_keluar[]"></center></td>' +
                    '<td style="display:none;"><center><input type="hidden" value=' + e + ' name="id_keluar[]"></center></td>' +
                    '<td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash-o"></i> Hapus</button></center></td>' +
                    '</tr>');
                $("#uraian_masuk").val('');
                $("#jumlah_satuan_masuk").val('');
                $("#harga_satuan_masuk").val('');
                $("#satuan_masuk").val('');

            }

            // Biaya Administrasi
            var biaya_administrasi = [];
            $('input[name^=jumlah_total_keluar]').each(function() {
                biaya_administrasi.push($(this).val());
            });
            var total_biaya_administrasi = 0;
            for(var i=0; i< biaya_administrasi.length; i++){
                total_biaya_administrasi +=biaya_administrasi[i] << 0;
            }
            console.log(total_biaya_administrasi);
            $("#biaya_administrasi").val(total_biaya_administrasi);

            //Pagu Anggaran
            $("#pagu_anggaran").val(parseFloat($("#biaya_fisik").val()) + parseFloat($("#biaya_administrasi").val()));
            $("#kebutuhan_biaya_pengadaan").val($("#biaya_administrasi").val());
        });
    });

    $(document).on("click", ".btn_remove", function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();

    });

    $(function () {

        $('#lanjut').on('click', function() {
            $('#myTab a[href="#menu1"]').tab('show');
        });

        $('#kembali').on('click', function() {
            $('#myTab a[href="#home"]').tab('show');
        });

        $("#tgl_pengeluaran").datepicker({
            dateFormat: "dd-mm-yy"});
    });

</script>