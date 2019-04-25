@include('header_admin');

<section role="main" class="content-body">
  <header class="page-header">
    <h2>Master SHOPING LIST</h2>
    
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
      
      <h2 class="panel-title"> SHOPING LIST</h2>
    </header>
    <div class="panel-body">
     <div class="wizard-tabs" style="float: left !important;">
      <ul class="nav wizard-steps">
        
    
   </ul>
 </div>

 <br><br>
 <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th><center>No</center></th>
      <th><center>Detali Kegiatan</center></th>
      <th><center>Volume</center></th>
      <th><center>Anggaran</center></th>
      <th><center>Satker</center></th>
      <th><center>Keterangan</center></th>
      @if(Auth::user()->id_jenis_user==3)
      <th width="15%"><center>Aksi</center></th> 
      @endif
    </tr>
  </thead>
  <tbody>
   
    <?php $no = 1;  ?>
   @if(Auth::user()->id_jenis_user==1)
    @foreach($shopinglist as $list)
     
     <tr>
      <td><center>{{$no}}</center></td>
      <td>{{$list->detail_kegiatan}}</td>
      <td>{{$list->volume}}</td>
      <td>{{$list->anggaran}}</td>
      <th>
        @foreach($renbin as $ren)
        @if($list->id_renbin==$ren->id_renbin)

        {{$ren->name}}

        @endif
        @endforeach

      </th>
      <td>{{$list->keterangan}}</td>
     
    </tr>
    <?php $no++; ?>
   
    @endforeach
    @else
    @foreach($shopinglistsatker2 as $listsatker)

    <tr>
      <td><center>{{$no}}</center></td>
       <td>{{$listsatker->detail_kegiatan}}</td>
      <td>{{$listsatker->volume}}</td>
      <td>{{$listsatker->anggaran}}</td>
      <th>{{$nama}}
      </th>
      <td>{{$listsatker->keterangan}}</td>
       

      <td> <a title="edit" href="{{ url('/editshop',$listsatker->id)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></a></td>
     
    </tr>
    <?php $no++; ?>
    @endforeach
    @endif
    
    
  </tbody>
  
</table>
</div>
</section>
</section>
<script type="text/javascript">
  $('#example1').DataTable();
</script>

@include('footer_admin');