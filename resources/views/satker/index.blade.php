@include('header_admin');

    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Master Satker</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Data Master</span></li>
                    <li><span>Master Satker</span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>
                <h2 class="panel-title">Satker</h2>
            </header>
            <div class="panel-body">
                <div class="wizard-tabs" style="float: left !important;">
                    <ul class="nav wizard-steps">
                        <li class="nav-item" style="width:230px; ">
                            <a href="{{ url('satker/add') }}"  class="nav-link text-center" style="background-color:#007bff !important; color: #fff;">
                                <i class="fa fa-plus-circle"></i> Buat Satker Baru
                            </a>
                        </li>
                    </ul>
                </div>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Nama Jenis Satker</center></th>
                            <th><center>Keterangan</center></th>
                            <th width="15%"><center>Aksi</center></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php $no++;?>
                    </tbody>
                </table>
            </div>
       </section>
    </section>
    <script type="text/javascript">
        $('#example1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":'{!! route('satker.getSatker') !!}',
                "dataType":"json",
                "type":"POST",
                "data":{_token: '{{csrf_token()}}'}
            },
            "columns": [
                {data: 'no'},
                {data: 'nama_jenis_satker'},
                {data: 'keterangan'},
                {data: 'aksi'}
            ],
            language: {
                processing: "Sedang memproses...",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Tidak ditemukan data yang sesuai",
                emptyTable: "Tidak ada data yang tersedia pada tabel ini",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                infoPostFix: "",
                search: "Cari:",
                url: "",
                infoThousands: ".",
                loadingRecords: "Sedang memproses...",
                paginate: {
                    first: "<<",
                    last: ">>",
                    next: "Selanjutnya",
                    previous: "Sebelum"
                },
                aria: {
                    sortAscending: ": Aktifkan untuk mengurutkan kolom naik",
                    sortDescending: ": Aktifkan untuk mengurutkan kolom menurun"
                }
            }
        });
    </script>

@include('footer_admin');