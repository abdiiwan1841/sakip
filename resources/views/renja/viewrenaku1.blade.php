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
        <h2>Detail Renbut</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Renbut</span></li>
                <li><span>Detail Renbut</span></li>
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

            <h2 class="panel-title">Detail Renbut</h2>
        </header>
        <div class="panel-body">
		<div id="table_wrapper">
			@foreach($renbin as $value)
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><b>Jenis Sumber Anggaran</b></label>
                <div class="col-md-7">
				{{$value->sumber_anggaran}}
                </div>
            </div>


            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><b>Tanggal</b></label>
                <div class="col-md-7">
				{{$value->tanggal}}
                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><b>Kode Rencana Kebutuhan</b></label>
                <div class="col-md-7">
				{{$value->kode_rencana_kebutuhan}}
                </div>
            </div>

            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><b>Tahun Perencanaan</b></label>
                <div class="col-md-7">
				{{$value->tahun_anggaran}}
                </div>
            </div>

			<br>
            <div class="form-group">
                <label for="nama_kegiatan" class="col-md-3 control-label"><h5><b>Detail Renbut</b></h5></label>
                <div class="col-md-7">
                </div>
            </div>

            <table class="table table-bordered table-responsive"
                   style="margin-left: 15px; width: 97%">
                <thead style="background-color: #cccccc;">
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
                  <td><center><a target="_blank" class="btn btn-info" href="{{url('/cetak_renbin/'.$value4->id_jawaban)}}"><i class="fa fa-print"></i></a></center></td>
								</tr>
				<?php } ?>
                </tbody>
				@endforeach
				<tfoot>
					<tr>
						<td colspan="2"><center><b>Total</b></center></td>
						<td><b>{{buatrp($value->jumlah_anggaran)}}</b></td>
						<td></td>
            <td></td>
					</tr>
				</tfoot>
            </table>

            <br><div class="form-group">
                <label class="col-md-5"></label>
                <div class="col-md-7">
                </div>
            </div>
		</div>
		@endforeach


            <!--<div class="form-group">
                <button class="btn btn-info" id="btnExport">Export to Excel</button>
            </div>-->
        </div>

    </section>
</section>


@include('footer_admin');

<script>
$(document).ready(function() {
  $("#btnExport").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
	var d = new Date();

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'detail_renja_'+ d.getDate() + '/' + d.getMonth() + '/' + d.getFullYear() + '/' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
});
</script>
