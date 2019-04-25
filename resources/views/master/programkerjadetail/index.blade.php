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
    <h2>Master Program Detail</h2>

    <div class="right-wrapper pull-right">
      <ol class="breadcrumbs">
        <li>
          <a href="index.html">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li><span>Data Master</span></li>
        <li><span>Master Program</span></li>
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

      <h2 class="panel-title">Master Program Kerja Detail</h2>
    </header>
    <div class="panel-body">
      @foreach($programkerja as $a)

      <div class="form-group">
        {!! Form::label('Satker', 'Satker', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-7">
          <input type="text" name="" value="{{$a->nama_jenis_satker}}" >
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('akun', 'Akun', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-7">
          <input type="text" name="" value="{{$a->nama_akun}}" >
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('program', 'Program', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-7">
          <input type="text" name="" value="{{$a->nama_program}}" >
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('kegiatan', 'Kegiatan', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-7">
         <input type="text" name="" value="{{$a->nama_kegiatan}}" >
       </div>
     </div>


     @endforeach
     <div class="wizard-tabs" style="float: left !important;">
      <ul class="nav wizard-steps">

       <li class="nav-item" style="width:230px; ">
 @if(Auth::user()->id_jenis_user==3)
        <a href="{{ url('programkerjadetail_add',$id)}}"  class="nav-link text-center" style="background-color:#007bff !important; color: #fff;">
         <i class="fa fa-plus-circle"></i> Tambah Program Kerja
       </a>
@endif
     </li>
   </ul>
 </div>
 <br><br>
 <table id="example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th><center>No</center></th>
      <th><center>Kegiatan</center></th>
      <th><center>Tanggal Update</center></th>
  
      <th><center>No Ktr</center></th>
      <th><center>Jumlah</center></th>
      <th><center>Minpro</center></th>
      <th><center>Kemajuan_admin</center></th>
      <th><center>Kemajuan_fisik</center></th>
     
      @if(Auth::user()->id_jenis_user==3)
      <th width="15%"><center>Aksi</center></th> 
      @endif
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;$no2 = 1; ?>

    @foreach($programkerjadetail as $list)
    <tr>
      <td><center>{{$no}}</center></td>
      <td><center>{{$list->kegiatan}}</center></td>
      <td><center>{{$list->update}}</center></td>
      
      <td><center>{{$list->no_ktr }}</center></td>
      <th><center>{{buatrp($list->jumlah) }}</center></th>
      <th><center>{{buatrp($list->minpro) }}</center></th>
      <td><center>{{$list->kemajuan_admin}}%</center></td>
      <td><center>{{$list->kemajuan_fisik }}%</center></td>
      @if(Auth::user()->id_jenis_user==3)
      <td>

        <center>
         

          <a title="adendum" href="{{ url('/adendum_edit',$list->id_detailprogramkerja)}}" class="btn btn-warning btn-xs">Adendum</a>
          @if($list->status_update != 2)
          <a title="edit" href="{{ url('/programkerjadetail_edit',$list->id_detailprogramkerja)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>

          <a href="{{ url("detailprogramkerjadelete/".$list->id_detailprogramkerja.'/'.$list->id_programkerja) }}" class="btn btn-danger btn-xs"  title="Hapus" id="delete"><i class="fa fa-trash"></i></a>
          @endif
        

        </center></td>  @endif
      </tr>
      @foreach($adendum as $listadendum)
      @if($list->id_detailprogramkerja == $listadendum->id_detailprogramkerja)
      <tr style="background-color: #c9d1f9">
        <td><center></center></td>
        <td><center>{{$list->kegiatan}}</center></td>
        <td><center>{{$list->update}}</center></td>
        
        <td><center>{{$listadendum->no_ktr }}</center></td>
        <th><center>{{buatrp($list->jumlah) }}</center></th>
        <th><center>{{buatrp($list->minpro) }}</center></th>
        <td><center>{{$listadendum->kemajuan_admin}}%</center></td>
        <td><center>{{$listadendum->kemajuan_fisik}}%</center></td>
        @if(Auth::user()->id_jenis_user==3)
        <td>

          <center>
            
          
            <a title="edit" href="{{ url("/edit_adendum/".$listadendum->id_adendum.'/'.$list->id_detailprogramkerja) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="{{ url("hapuseadendum/".$listadendum->id_adendum.'/'.$list->id_programkerja) }}" class="btn btn-danger btn-xs"  title="Hapus" id="delete"><i class="fa fa-trash"></i></a>
         

          </center></td>   @endif
        </tr>

        @endif

        <?php $no2++;  ?>
        @endforeach


        <?php $no++; ?>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
</section>
<script type="text/javascript">
  $('#example1').DataTable();
</script>

@include('footer_admin');