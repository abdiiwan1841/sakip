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
        
        <h2>Evaluasi Program Kerja</h2>
     

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Evaluasi Program Kerja</span></li>
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
            @if(Auth::user()->id_jenis_user==3)
            <h2 class="panel-title">Master Program Kerja</h2>
            @else
            <h2 class="panel-title">Evaluasi Program Kerja</h2>
            @endif
        </header>
        <div class="panel-body">
         <div class="wizard-tabs" style="float: left !important;">
            <ul class="nav wizard-steps">

               <li class="nav-item" style="width:230px; ">
               

                

              @if(Auth::user()->id_jenis_user==3)
                <a href="{{ url('programkerja_add') }}"  class="nav-link text-center" style="background-color:#007bff !important; color: #fff;">
                 <i class="fa fa-plus-circle"></i> Tambah Data
             </a>
             @endif
                 

         </li>
     </ul>
 </div>

 <br><br>

    <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Notifikasi</a></li>
                <li><a data-toggle="tab" href="#menu1">List Prokja</a></li>
            </ul>
            <br>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                      @if(Auth::user()->id_jenis_user==1)
                    <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Kegiatan</center></th>
         
            <th><center>No Ktr</center></th>
            <th><center>Jumlah</center></th>
            <th><center>Minpro</center></th>
           
               <th><center>Kemajuan_admin</center></th>
                <th><center>Kemajuan_fisik</center></th>
                 <th><center>Keterangan</center></th>
                 <th><center>status</center></th>
            <th width="15%"><center>Aksi</center></th> 
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; 

        foreach($programnotif as $list){ ?>
        <tr>
            <td><center>{{$no}}</center></td>
            <td><center>{{$list->kegiatan}}</center></td>
         
            <td><center>{{$list->no_ktr }}</center></td>
            <th><center>{{buatrp($list->jumlah) }}</center></th>
            <th><center>{{buatrp($list->minpro) }}</center></th>
            <td><center>{{$list->kemajuan_admin}}</center></td>
            <td><center>{{$list->kemajuan_fisik }}</center></td>
            <th><center>{{$list->keterangan }}</center></th>
            <th><center>@if($list->status==1)
                    <button class="btn btn-danger">Belum di cek</button>

            @endif
        </center></th>
            <td><center>
             <a title="cek" href="{{ url('/editnotif',$list->id_detailprogramkerja)}}" class="btn btn-success btn-xs">Cek</a>
            </center></td>
        </tr>
        <?php $no++; } ?>

    </tbody>
</table>
@endif
                </div>
                  <div id="menu1" class="tab-pane fade">

 <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Program</center></th>
             <th><center>Satker</center></th>
            <th><center>Kegiatan</center></th>
              <th><center>Tahun</center></th>
            <th><center>Akun</center></th>
            <th width="15%"><center>Aksi</center></th> 
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; 

        foreach($programkerja as $list){ ?>
        <tr>
            <td><center>{{$no}}</center></td>
            <th><center>{{$list->nama_program }}</center></th>
             <th><center>{{$list->nama_jenis_satker }}</center></th>
            <th><center>{{$list->nama_kegiatan }}</center></th>
            <th><center>{{$list->tahun }}</center></th>
            <th><center>{{$list->nama_akun }}</center></th>
            <td><center>
             <a title="Detail" href="{{ url('/detailprogramkerja_add',$list->id_programkerja)}}" class="btn btn-primary btn-xs">Daftar Programkerja</a>

              @if(Auth::user()->id_jenis_user==3)
                <a title="hapus" href="{{ url('/programkerja_edit',$list->id_programkerja)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                {!! Form::open([
                'method'=>'DELETE',
                'url' => ['/list_programkerja', $list->id_programkerja],
                'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<span class="glyphicon glyphicon-trash">', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Hapus',
                'onclick'=>'return confirm("Confirm delete?")'
                )) !!}
                {!! Form::close() !!}
                @endif
            </center></td>
        </tr>
        <?php $no++; } ?>

    </tbody>
</table>
                  </div>
            </div>



</div>
</section>
</section>
<script type="text/javascript">
    $('#example1').DataTable();
</script>

@include('footer_admin');