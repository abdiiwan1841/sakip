@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Kerangka Acuan Kegiatan APBN</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>APBN</span></li>
                <li><span>Form Kerangka Acuan Kegiatan APBN</span></li>
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

            <h2 class="panel-title">Form Kerangka Acuan Kegiatan APBN</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}
            <?php foreach($datalist as $list){ ?>

            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Form 1</a></li>
                <li><a data-toggle="tab" href="#menu1">form 2</a></li>
            </ul>

            <div class="tab-content">

                <div id="home" class="tab-pane fade in active">

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Kementerian Negara/Lembaga</label>
                        <div class="col-md-7">
                            <input class="form-control" name="kementerian" type="text" value="" id="kementerian">
                            <input style="display: none" name="id" id="id" value="{{$id}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Program</label>
                        <div class="col-md-7">

                            <select class="form-control select2me" name="id_program" id="program">
                                <option value='0' selected>- Program -</option>

                                <?php foreach($rencana as $row){ ?>
                                <option value="<?php echo $row->id_program; ?>" <?php if ($row->id_program == $list->id_program) {
                                    echo "selected";
                                }?>><?php echo $row->nama_program; ?></option>
                                <?php } ?>

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Hasil (Outcome)</label>
                        <div class="col-md-7">
                            <input class="form-control" name="hasil" type="text" value="" id="hasil">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_rencana_program_rengiat" class="col-md-3 control-label">Kegiatan</label>
                        <div class="col-md-7">

                            <select class="form-control select2me" name="id_kegiatan"
                                    id="id_kegiatan">
                                <option value='0' selected>- Pilih Kegiatan -</option>


                                <?php foreach($kegiatan as $row2){ ?>
                                <option value="<?php echo $row2->id_kegiatan; ?>" <?php if ($row2->id_kegiatan == $list->id_kegiatan) {
                                    echo "selected";
                                }?>><?php echo $row2->nama_kegiatan; ?></option>
                                <?php } ?>

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Indikator Kinerja Kegiatan</label>
                        <div class="col-md-7">
                            <input class="form-control" name="indikator_kinerja" type="text" value=""
                                   id="indikator_kinerja">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Jenis Keluaran</label>
                        <div class="col-md-7">
                            <input class="form-control" name="jenis_keluaran" type="text" value="" id="jenis_keluaran">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Volume Keluaran</label>
                        <div class="col-md-7">
                            <input class="form-control" name="volume_keluaran" type="number" value=""
                                   id="volume_keluaran">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Satuan Ukur Keluaran</label>
                        <div class="col-md-7">
                            <input class="form-control" name="satuan_ukur_keluaran" type="text" value="" id="satuan_ukur_keluaran">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label"><b>A. Latar Belakang</b></label>
                        <div class="col-md-7"></div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Dasar Hukum</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="dasar_hukum" type="text" id="dasar_hukum"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Gambaran Umum</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="gambaran_umum" type="text"
                                      id="gambaran_umum"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Penerimaan Manfaat</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="penerimaan_manfaat" type="text"
                                      id="penerimaan_manfaat"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-7">
                            <a href="{{ url('/list_ceklist_Apbn/'.$id)}}" class="btn btn-danger">Kembali</a>
                            <a id="lanjut" type="button" value="Lanjut" class="btn btn-primary">Lanjut</a>
                        </div>
                    </div>

                </div>

                <div id="menu1" class="tab-pane fade">

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Metode Pelaksanaan</label>
                        <div class="col-md-7">
                            <input class="form-control" name="metode_pelaksanaan" type="text" value=""
                                   id="metode_pelaksanaan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Tahapan Dan Waktu Pelaksanaan</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="tahapan_waktu" type="text" value=""
                                      id="tahapan_waktu"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label"><b>Waktu Pelaksanaan</b></label>
                        <div class="col-md-7">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Uraian Kegiatan</label>
                        <div class="col-md-7">
                            <input class="form-control" name="uraian_kegiatan" type="text" value=""
                                   id="uraian_kegiatan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Jadwal Waktu</label>
                        <div class="col-md-7">
                            <input class="form-control" name="jadwal_waktu" type="text" value="" id="jadwal_waktu">
                        </div>
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
                                <center>No</center>
                            </th>
                            <th>
                                <center>Uraian Kegiatan</center>
                            </th>
                            <th>
                                <center>Jadwal Waktu</center>
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

                    <br><br>
                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Waktu Pencapaian Keluaran</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="waktu_pencapaian" type="text" value=""
                                      id="waktu_pencapaian"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Biaya Yang DI perlukan</label>
                        <div class="col-md-7">
                            <input class="form-control" name="biaya_diperlukan" type="text" value=""
                                      id="biaya_diperlukan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-7">
                            <a id="kembali" value="kembali" class="btn btn-danger">Kembali</a>
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>

            </div>
            <?php } ?>
            {{Form::close()}}
        </div>
    </section>
</section>


@include('footer_admin');

<script type="text/javascript">
    $(function () {
        var input = document.getElementById('biaya_diperlukan');
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
    $(document).ready(function () {
        var i = 0;
        $('#cobadeh').click(function () {

            var a = $("#uraian_kegiatan").val();
            var b = $("#jadwal_waktu").val();
            var c = $("#id").val();


            if (a == "") {
                alert("Mohon Dilengkapi")
            } else {
                i++
                $('#dynamic').append(
                    '<tr id="row' + i + '">' +
                    '<td><center>' + i + '</td>' +
                    '<td><center>' + a + '<input type="hidden" value=' + a + ' name="uraian_kegiatan[]"></center></td>' +
                    '<td><center>' + b + '<input type="hidden" value="' + b + '" name="jadwal_waktu[]"></center></td>' +
                    '<td style="display: none"><center><input type="hidden" value=' + c + ' name="id_waktu_pelaksanaan[]"></center></td>' +
                    '<td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash-o"></i> Hapus</button></center></td>' +
                    '</tr>');
                $("#uraian_kegiatan").val('');
                $("#jadwal_waktu").val('');

            }
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
