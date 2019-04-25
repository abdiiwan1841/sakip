@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        
        <h2>Cetak Program Kerja</h2>
     

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
       
            <h2 class="panel-title"> Cetak Program Kerja</h2>
         
        </header>
        <div class="panel-body">
         <div class="wizard-tabs" style="float: left !important;">
            <ul class="nav wizard-steps">

               <li class="nav-item" style="width:230px; ">
               

                

         
                 

         </li>
     </ul>
 </div>
        {!! Form::open(['url' => '/laporanStok', 'class' => 'form-horizontal', 'files' => true]) !!}
                {{ csrf_field() }}
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Dari </label>
              <div class="col-sm-10">
                <input type="date" name="start" class="form-control" required="">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Sampai</label>
              <div class="col-sm-10">
                <input type="date" name="end" class="form-control" required="">
              </div>
            </div>
             

            <button type="submit" class="btn btn-info "><span class="glyphicon glyphicon-print"></span> Filter</button>
          </form>
 <br><br>


 <table id="example1" class="table table-bordered table-striped">
     <thead>
            <tr>
                   <tr>
                      <td rowspan="2" width="80"><center>No</center></td>
                      <td rowspan="2"><center>KEGIATAN</center></td>
                      <td rowspan="2"><center>Pagu (Rp)</center></td>
                      <td  colspan="2" ><center>KTR</center></td>
                      <td rowspan="2"><center>MINPRO</center></td>
                      <td rowspan="2"><center>SIsa KTR </center></td>
                      <td rowspan="2"><center>PELAKSANA</center></td>
                      <td rowspan="2"><center>TDS KTR</center></td>
                       <td  colspan="2" ><center>KEMAJUAN</center></td>
                       <td  rowspan="2" ><center>KET</center></td>

                  </tr>
                  <tr>
                      <td  ><center>No Tgl Ktr</center></td>
                      <td ><center>JUMLAH (Rp)</center></td>
                      <td ><center>ADMIN</center></td>
                      <td ><center>FISIK</center></td>
                   
                    
                  </tr>
                  <tr>
                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
                  </tr>
                 
            </tr>
          </thead>
    <tbody>
        <?php $no = 1; 


        foreach($programkerja as $list){ ?>
        <tr>
            <td><center>{{$no}}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            <td><center>{{$list->nama_program }}</center></td>
            
        </tr>
        <?php $no++; } ?>

    </tbody>
</table>
</div>
</section>
</section>


@include('footer_admin');