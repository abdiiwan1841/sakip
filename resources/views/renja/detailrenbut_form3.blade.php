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
        <h2>Form Rincian Anggaran Biaya APBN</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>APBN</span></li>
                <li><span>Form Rincian Anggaran Biaya APBN</span></li>
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

            <h2 class="panel-title">Form Rincian Anggaran Biaya APBN</h2>
        </header>

        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian Negara/Lembaga</label>
                <div class="col-md-7">
                  <?php if (isset($kerangka->kementrian_negara_lembaga)) {
                    $x = $kerangka->kementrian_negara_lembaga;
                } else {
                    $x = null;
                } ?>
                <input value="{{$x}}" class="form-control"  name="kementerian" type="text" id="kementerian">
                <input type="hidden" name="id" id="id" value="{{$id}}">

            </div>
        </div>

        <div class="form-group">
            <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Program</label>
            <div class="col-md-7">

               @if(isset($kerangka->id_program))

               @foreach($program as $asp)
               @if($asp->id_program == $kerangka->id_program)
                <input class="form-control" type="text" value="{{$asp->nama_program}}" readonly>
				<input class="form-control" type="hidden" name="program" value="{{$asp->id_program}}" >
               @endif
               @endforeach

               @else
               <select class="form-control select2me" name="program" id="program" required="">
                <option value='0' selected>- Program -</option>
                <?php foreach($program as $row){ ?>
                <option value="<?php echo $row->id_program; ?>"><?php echo $row->nama_program; ?></option>
                <?php } ?>
            </select>
            @endif

            

        </div>
    </div>

    <div class="form-group">
        <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Kegiatan</label>
        <div class="col-md-7">

          @if(isset($kerangka->id_kegiatan))

          @foreach($kegiatan as $keg)
          @if($keg->id_kegiatan == $kerangka->id_kegiatan)
            <input class="form-control" type="text" value="{{$keg->nama_kegiatan}}" readonly>
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
    <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran (output)</label>
    <div class="col-md-7">

     <select class="form-control select2me" name="keluaran" id="keluaran">
        <option value='0' selected>- Pilih Keluaran -</option>


        <?php foreach($kegiatan as $row2){ ?>
        <option value="<?php echo $row2->id_kegiatan; ?>"><?php echo $row2->nama_kegiatan; ?></option>
        <?php } ?>

    </select>

</div>
</div>

<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Detil Kegiatan</label>
    <div class="col-md-7">
       <?php if (isset($kerangka->detail_kegiatan)) {
        $detail_kegiatan = $kerangka->detail_kegiatan;
    } else {
        $detail_kegiatan = null;
    } ?>
    <input class="form-control" value="{{$detail_kegiatan}}" name="detil_kegiatan" type="text"  id="detil_kegiatan">

</div>
</div>

<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Volume</label>
    <div class="col-md-7">
        <?php if (isset($kerangka->volume_keluaran)) {
            $volume_keluaran = $kerangka->volume_keluaran;
        } else {
            $volume_keluaran = null;
        } ?>
        <input class="form-control"  name="volume" type="text" id="volume" value="{{$volume_keluaran}}">

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
        <input class="form-control"  name="satuan_ukur" type="text"  id="satuan_ukur" value="{{$satuan_ukur_keluaran}}">
    </div>
</div>
<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
    <div class="col-md-7">

        <input class="form-control"  name="alokasi_dana" type="number"  id="alokasi_dana">

    </div>
</div>

<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label"><b>Uraian Anggaran</b></label>
    <div class="col-md-7">

    </div>
</div>
<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Uraian Pekerjaan</label>
    <div class="col-md-7">

        <input class="form-control" name="uraian_pekerjaan" type="text" value="" id="uraian_pekerjaan">

    </div>
</div>
<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Jumlah</label>
    <div class="col-md-7">

        <input class="form-control" name="jumlah" type="number" value="" id="jumlah">

    </div>
</div>
<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Satuan</label>
    <div class="col-md-7">

        <select class="form-control select2me" name="satuan" id="satuan">
            <option value='0' selected>- Satuan -</option>

            <?php 
            $satuan = DB::select(" SELECT * from master_satuan ");
            foreach($satuan as $row){ ?>
            <option value="<?php echo $row->satuan; ?>"><?php echo $row->satuan; ?></option>
            <?php } ?>

        </select>

    </div>
</div>
<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Harga Satuan</label>
    <div class="col-md-7">

        <input class="form-control" name="harga_satuan" type="text" value="" id="harga_satuan">

    </div>
</div>
<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Harga Jasa</label>
    <div class="col-md-7">

        <input class="form-control" name="harga_jasa" type="text" value="" id="harga_jasa">

    </div>
</div>
<div class="form-group">
                <!--<label for="nama_kegiatan" class="col-md-3 control-label">Harga Material</label>
                <div class="col-md-7">
                    <input class="form-control" name="harga_material" type="text" value="" id="harga_material">
                </div>-->
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
            <thead style="background-color: #286090;color: white">
                <tr>
                    <th>
                        <center>Uraian</center>
                    </th>
                    <th>
                        <center>Jumlah</center>
                    </th>
                    <th>
                        <center>Satuan</center>
                    </th>
                    <th>
                        <center>Harga Satuan</center>
                    </th>
                    <th>
                        <center>Harga Jasa</center>
                    </th>
                    <th>
                        <center>Harga Material</center>
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
                    <td></td>
                    <td></td>

                </tr>
            </tbody>
        </table>

        <div class="form-group">
            <label for="Rekapitulasi" class="col-md-3 control-label"><b>Rekapitulasi</b></label>
            <div class="col-md-7">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-3 control-label">Biaya Fisik</label>
            <div class="col-md-7">
                <input class="form-control"  name="total_biaya_fisik" type="hidden" value="" id="total_biaya_fisik">
                <input class="form-control"  type="text" value="" id="total_biaya_fisik2">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-3 control-label">Biaya Administrasi</label>
            <div class="col-md-7">
                <?php if (isset($biaya_administrasi->biaya_administrasi)) {
                    $ba = $biaya_administrasi->biaya_administrasi;
                } else {
                    $ba = '';
                }?>
                <input class="form-control" readonly name="total_biaya_administrasi" type="number"
                value="<?php echo $ba;?>" id="total_biaya_administrasi">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-3 control-label">Total</label>
            <div class="col-md-7">
                <input class="form-control" readonly  name="Total_keseluruhan" type="number" value="" id="Total_keseluruhan">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2"></label>
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
        var input = document.getElementById('harga_satuan');
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
<script>
    $(function () {
        var input = document.getElementById('harga_jasa');
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
        if ($("#total_biaya_fisik").val() == '') {
            $("#total_biaya_fisik").val(0);
        }
        if ($("#total_biaya_administrasi").val() == '') {
            $("#total_biaya_administrasi").val(0);
        }
        $("#Total_keseluruhan").val(parseFloat($("#total_biaya_fisik").val()) + parseFloat($("#total_biaya_administrasi").val()));
        var i = 0;
        $('#cobadeh').click(function () {

            var a = $("#uraian_pekerjaan").val();
            var b = $("#jumlah").val();
            var c = $("#satuan").val();

            //var d = $("#harga_satuan").val();
            var d1 = $("#harga_satuan").val();
            var d2 = toAngka(d1);
            var d = parseInt(d2);

            //var e = $("#harga_jasa").val();
            var e1 = $("#harga_jasa").val();
            var e2 = toAngka(e1);
            var e = parseInt(e2);


            var g = $("#id").val();
            var Total_keseluruhan = $("#Total_keseluruhan").val();

            var material = (parseFloat(b) * parseFloat(d));
            var jumlah_total = (parseFloat(b) * parseFloat(d)) + parseFloat(e);


            if (a == "") {
                alert("Mohon Dilengkapi")
            } else {
                i++
                $('#dynamic').append(
                    '<tr id="row' + i + '">' +
                    '<td><center>' + a + '<input type="hidden" value="' + a + '" name="uraian_pekerjaan[]"></center></td>' +
                    '<td><center>' + b + '<input type="hidden" value="' + b + '" name="jumlah[]"></center></td>' +
                    '<td><center>' + c + '<input type="hidden" value="' + c + '" name="satuan[]"></center></td>' +
                    '<td><center>' + d1 + '<input type="hidden" value="' + d + '" name="harga_satuan[]"></center></td>' +
                    '<td><center>' + e1 + '<input type="hidden" value="' + e + '" name="harga_jasa[]"></center></td>' +
                    '<td><center>' + toRp(material) + '<input type="hidden" value="' + material + '" name="harga_material[]"></center></td>' +
                    '<td><center>' + toRp(jumlah_total) + '<input type="hidden" value="' + jumlah_total + '" name="jumlah_total[]"></center></td>' +
                    '<td style="display:none;"><center><input type="hidden" value=' + g + ' name="id_rincian_anggaran_biaya[]"></center></td>' +
                    '<td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash-o"></i> Hapus</button></center></td>' +
                    '</tr>');
                $("#uraian_pekerjaan").val('');
                $("#jumlah").val('');
                $("#satuan").val('');
                $("#harga_satuan").val('');
                $("#harga_jasa").val('');
                $("#harga_material").val('');

            }

            // Biaya Fisik
            var biaya_fisik = [];
            $('input[name^=jumlah_total]').each(function () {
                biaya_fisik.push($(this).val());
            });
            var total_biaya_fisik = 0;
            for (var i = 0; i < biaya_fisik.length; i++) {
                total_biaya_fisik += biaya_fisik[i] << 0;
            }

            var ados = toRp(total_biaya_fisik);

            console.log(total_biaya_fisik);
            $("#total_biaya_fisik").val(total_biaya_fisik);
            $("#total_biaya_fisik2").val(ados);

            //Total Keseluruhan

            $("#Total_keseluruhan").val(parseFloat($("#total_biaya_fisik").val()) + parseFloat($("#total_biaya_administrasi").val()));

            

        });
    });

    $(document).on("click", ".btn_remove", function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();

    });

    $(function () {

        $('#lanjut').on('click', function () {
            $('#myTab a[href="#menu1"]').tab('show');
        });

        $('#kembali').on('click', function () {
            $('#myTab a[href="#home"]').tab('show');
        });

        $("#tgl_pengeluaran").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });

</script>