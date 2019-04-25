@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Hasil Pra Renaku 1</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Renbut</span></li>
                <li><span>Hasil Pra Renaku 1</span></li>
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

            <h2 class="panel-title">Hasil Pra Renaku 1</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => 'buat', 'class' => 'form-horizontal', 'files' => true]) !!}


            <table class="table table-bordered table-responsive" id="dynamic"
                   style="margin-left: 15px; width: 97%">
                <thead style="background-color: #286090;color: white">
                <tr>
                    <th>
                        <center>Kode</center>
                    </th>
                    <th>
                        <center>Program/Giat/Sub Kegiatan/Akun</center>
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
            <br>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><h3><b>Hasil Pra Renaku 2</b></h3></label>
                <div class="col-md-7">
                </div>
            </div>

            <table class="table table-bordered table-responsive" id="dynamic"
                   style="margin-left: 15px; width: 97%">
                <thead style="background-color: #286090;color: white">
                <tr>
                    <th>
                        <center>Kode</center>
                    </th>
                    <th>
                        <center>Program/Giat/Sub Kegiatan/Akun</center>
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

            <br><div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-7">

                    <input class="form-control" name="tanggal" type="text" value="<?php echo date('d-m-Y')?>" id="tanggal">

                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Program</label>
                <div class="col-md-7">

                    <select class="form-control">
                        <option value="">--Pilih Program--</option>
                        <option value="">MASIH DAMI</option>
                        <option value="">DAMI MASIH</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kegiatan</label>
                <div class="col-md-7">

                    <select class="form-control">
                        <option value="">--Pilih Kegiatan--</option>
                        <option value="">MASIH DAMI</option>
                        <option value="">DAMI MASIH</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Sub Kegiatan</label>
                <div class="col-md-7">

                    <select class="form-control">
                        <option value="">--Pilih Sub Kegiatan--</option>
                        <option value="">MASIH DAMI</option>
                        <option value="">DAMI MASIH</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kode akun</label>
                <div class="col-md-7">
                    <select class="form-control">
                        <option value="">--Pilih Akun--</option>
                        <option value="">MASIH DAMI</option>
                        <option value="">DAMI MASIH</option>
                    </select>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <br>
                    <a id="cobadeh" class="btn btn-primary" style="width:30%;">
                        Tambah
                    </a>
                </div>
            </div><br>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><h3><b>Rekap Renaku 2</b></h3></label>
                <div class="col-md-7">
                </div>
            </div>

            <table class="table table-bordered table-responsive" id="dynamic"
                   style="margin-left: 15px; width: 97%">
                <thead style="background-color: #286090;color: white">
                <tr>
                    <th>
                        <center>Kode</center>
                    </th>
                    <th>
                        <center>Program/Giat/Sub Kegiatan/Akun</center>
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

            <br><div class="form-group">
                <label class="col-md-5"></label>
                <div class="col-md-7">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ url('#')}}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </section>
</section>


@include('footer_admin');

<script type="text/javascript">
    $(document).ready(function () {
        if($("#total_biaya_fisik").val() == ''){
            $("#total_biaya_fisik").val(0);
        }
        if($("#total_biaya_administrasi").val() == ''){
            $("#total_biaya_administrasi").val(0);
        }
        $("#Total_keseluruhan").val(parseFloat($("#total_biaya_fisik").val()) + parseFloat($("#total_biaya_administrasi").val()));
        var i = 0;
        $('#cobadeh').click(function () {

            var a = $("#uraian_pekerjaan").val();
            var b = $("#jumlah").val();
            var c = $("#satuan").val();
            var d = $("#harga_satuan").val();
            var e = $("#harga_jasa").val();
            var f = $("#harga_material").val();
            var g = $("#id").val();
            var Total_keseluruhan = $("#Total_keseluruhan").val();

            var jumlah_total = (parseFloat(b) * parseFloat(d)) + parseFloat(e) + parseFloat(f);



            if (a == "") {
                alert("Mohon Dilengkapi")
            } else {
                i++
                $('#dynamic').append(
                    '<tr id="row' + i + '">' +
                    '<td><center>' + i + '</td>' +
                    '<td><center>' + a + '<input type="hidden" value="' + a + '" name="uraian_pekerjaan[]"></center></td>' +
                    '<td><center>' + b + '<input type="hidden" value="' + b + '" name="jumlah[]"></center></td>' +
                    '<td><center>' + c + '<input type="hidden" value="' + c + '" name="satuan[]"></center></td>' +
                    '<td><center>' + d + '<input type="hidden" value="' + d + '" name="harga_satuan[]"></center></td>' +
                    '<td><center>' + e + '<input type="hidden" value="' + e + '" name="harga_jasa[]"></center></td>' +
                    '<td><center>' + f + '<input type="hidden" value="' + f + '" name="harga_material[]"></center></td>' +
                    '<td><center>' + jumlah_total + '<input type="hidden" value="' + jumlah_total + '" name="jumlah_total[]"></center></td>' +
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
            $('input[name^=jumlah_total]').each(function() {
                biaya_fisik.push($(this).val());
            });
            var total_biaya_fisik = 0;
            for(var i=0; i< biaya_fisik.length; i++){
                total_biaya_fisik +=biaya_fisik[i] << 0;
            }
            console.log(total_biaya_fisik);
            $("#total_biaya_fisik").val(total_biaya_fisik);

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

        $("#tanggal").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });

</script>