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
        <h2>Syarat Teknis/Spesifikasi</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <<a href="{{URL::to('/home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span></span></li>
                <li><span>Syarat Teknis/Spesifikasi</span></li>
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

            <h2 class="panel-title">Syarat Teknis/Spesifikasi</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian Negara/Lembaga</label>
                <div class="col-md-7">
                  <?php if (isset($kerangka->kementrian_negara_lembaga)) {
                    $kementrian_negara_lembaga = $kerangka->kementrian_negara_lembaga;
                } else {
                    $kementrian_negara_lembaga = null;
                } ?>
                <input class="form-control" value="{{$kementrian_negara_lembaga}}" name="kementerian" type="text" id="kementerian">
                <input style="display: none" name="id" id="id" value="{{$id}}">

            </div>
        </div>

        <div class="form-group">
            <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Kegiatan</label>
            <div class="col-md-7">

                <select class="form-control select2me" name="id_kegiatan"
                id="id_kegiatan">
                <option value='0' selected>- Pilih Kegiatan -</option>


                <?php foreach($kegiatan as $row2){ ?>
                <option value="<?php echo $row2->id_kegiatan; ?>"><?php echo $row2->nama_kegiatan; ?></option>
                <?php } ?>

            </select>

        </div>
    </div>

    <div class="form-group">
        <label for="nama_kegiatan" class="col-md-3 control-label">Keluaran</label>
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

        <input class="form-control" name="detil_kegiatan" type="text"  id="detil_kegiatan">

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
                <input class="form-control" value="{{$volume_keluaran}}" name="volume" type="number" id="volume">

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
        <input class="form-control" name="satuan_ukur" type="text" id="satuan_ukur">

    </div>
</div>
<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label">Alokasi Dana</label>
    <div class="col-md-7">

        <input class="form-control" name="alokasi_dana" type="number" id="alokasi_dana">

    </div>
</div>

<div class="form-group">
    <label for="nama_kegiatan" class="col-md-3 control-label"><b>Rincian Spesifikasi</b></label>
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
    <label for="nama_kegiatan" class="col-md-3 control-label">Spesifikasi</label>
    <div class="col-md-7">
        <input class="form-control" name="spesifikasi" type="text" value="" id="spesifikasi">
    </div>
    <div class="col-md-6 col-md-offset-3">
        <br>
        <a id="cobadeh" class="btn btn-primary" style="width:30%;">
            Tambah
        </a>
    </div>
</div><br><br>

<table class="table table-bordered table-responsive" id="dynamic"
style="margin-left: 15px; width: 97%">
<thead style="background-color: #286090;color: white">
    <tr>
        <th>
            <center>No</center>
        </th>
        <th>
            <center>Uraian</center>
        </th>
        <th>
            <center>Spesifikasi</center>
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
    </tr>
</tbody>
</table>


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

<script type="text/javascript">
    $(document).ready(function () {
        var i = 0;
        $('#cobadeh').click(function () {

            var a = $("#uraian_pekerjaan").val();
            var f = $("#spesifikasi").val();
            var g = $("#id").val();

            if (a == "") {
                alert("Mohon Dilengkapi")
            } else {
                i++
                $('#dynamic').append(
                    '<tr id="row' + i + '">' +
                    '<td><center>' + i + '</td>' +
                    '<td><center>' + a + '<input type="hidden" value="' + a + '" name="uraian_pekerjaan[]"></center></td>' +
                    '<td><center>' + f + '<input type="hidden" value="' + f + '" name="spesifikasi[]"></center></td>' +
                    '<td style="display:none;"><center><input type="hidden" value=' + g + ' name="id_uraian_pekerjaan[]"></center></td>' +
                    '<td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash-o"></i> Hapus</button></center></td>' +
                    '</tr>');
                $("#uraian_pekerjaan").val('');
                $("#spesifikasi").val('');

            }
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