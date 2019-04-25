@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Program Kerja Detail</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Data Master</span></li>
                <li><span>Form Program</span></li>
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

            <h2 class="panel-title">Form Program Kerja Detail</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}

            <input type="hidden" name="idprogram" value="{{$id}}">
            
            <?php if(isset($program->id_detailprogramkerja)){ ?>
            <input type="hidden" name="id_detailprogramkerja" id="id_detailprogramkerja" value="<?php echo $program->id_detailprogramkerja; ?>">

            <input type="hidden" name="id_program" id="id_program" value="<?php echo $program->id_programkerja; ?>">
            <?php }?>

            <div class="form-group">

                <div class="col-lg-6">
                    <label>Nama Kegiatan</label>
                    <?php if (isset($program->kegiatan)) {
                        $nm = $program->kegiatan;
                    } else {
                        $nm = null;
                    } ?>
                    {!! Form::text('kegiatan', $nm, ['class' => 'form-control']) !!}
                    {!! $errors->first('kegiatan', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-lg-6">
                 <label>No KTR</label>
                 <?php if (isset($program->no_ktr)) {
                    $nm = $program->no_ktr;
                } else {
                    $nm = null;
                } ?>
                {!! Form::text('no_ktr', $nm, ['class' => 'form-control']) !!}
                {!! $errors->first('no_ktr', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">

            <div class="col-lg-6">
                <label>Tgl KTR</label>
                <?php if (isset($program->tgl_ktr)) {
                    $nm = $program->tgl_ktr;
                } else {
                    $nm = null;
                } ?>
                {!! Form::date('tgl_ktr', $nm, ['class' => 'form-control']) !!}
                {!! $errors->first('tgl_ktr', '<p class="help-block">:message</p>') !!}

            </div>
            <div class="col-lg-6">
                <label>Nila Kontrak</label>
                <?php if (isset($program->jumlah)) {
                    $nm = $program->jumlah;
                } else {
                    $nm = null;
                } ?>
                {!! Form::text('jumlah', $nm, ['class' => 'form-control','id' => 'jumlah' ]) !!}
                
                {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">

            <div class="col-lg-6">
                <label>Minpro</label>
                <?php if (isset($program->minpro)) {
                    $nm = $program->minpro;
                } else {
                    $nm = null;
                } ?>
                {!! Form::text('minpro', $nm, ['class' => 'form-control','id' => 'minpro']) !!}
                {!! $errors->first('minpro', '<p class="help-block">:message</p>') !!}
            </div>
              <div class="col-lg-6">
        <label>TDS KTR</label>
        <?php if (isset($program->tds_ktr)) {
            $nm = $program->tds_ktr;
        } else {
            $nm = null;
        } ?>
        {!! Form::text('tds_ktr', $nm, ['class' => 'form-control']) !!}
        {!! $errors->first('tds_ktr', '<p class="help-block">:message</p>') !!}
    </div>
     <div class="col-lg-6">
       <label>Keamajuan Admin</label>
       <div class="input-group">
       <?php if (isset($program->kemajuan_admin)) {
        $nm = $program->kemajuan_admin;
    } else {
        $nm = null;
    } ?>
    {!! Form::number('kemajuan_admin', $nm, ['class' => 'form-control','max'=>'100']) !!}
    {!! $errors->first('kemajuan_admin', '<p class="help-block">:message</p>') !!}
     <span class="input-group-addon">%</span>
 </div>
            
    </div>

<div class="form-group">

  
    <div class="col-lg-6">
     <label>Keamajuan Fisik</label>
       <div class="input-group">
     <?php if (isset($program->kemajuan_fisik)) {
        $nm = $program->kemajuan_fisik;
    } else {
        $nm = null;
    } ?>

    {!! Form::number('kemajuan_fisik', $nm, ['class' => 'form-control','max'=>'100']) !!}
    {!! $errors->first('kemajuan_fisik', '<p class="help-block">:message</p>') !!}
      <span class="input-group-addon">%</span>
 </div>
</div>
</div>

<div class="col-lg-6">
    <label>Keterangan</label>
     
    <?php if (isset($program->keterangan)) {
        $nm = $program->keterangan;
    } else {
        $nm = null;
    } ?>
    {!! Form::text('keterangan', $nm, ['class' => 'form-control']) !!}
    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
   

</div>
</div>


<div class="form-group">
    <div class="col-lg-6">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('/list_program')}}" class="btn btn-danger">Kembali</a>
    <!-- /input-group -->
</div>
<!-- /.col-lg-6 -->
<div class="col-lg-6">
 
<!-- /input-group -->
</div>
<!-- /.col-lg-6 -->
</div>



{{Form::close()}}
</div>
</section>
</section>

<script type="text/javascript">
    $(function () {


        var input = document.getElementById('jumlah');
        var input2 = document.getElementById('minpro');
        input.addEventListener('keyup', function (e) {
            input.value = formatRupiah(this.value, 'Rp ');
        });

          input2.addEventListener('keyup', function (e) {
            input2.value = formatRupiah(this.value, 'Rp ');
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

        $('#pagu').keyup(function (argument) {
          var a = $(this).val();
          var minpro = document.getElementById("minpro").value;
          var jumlah = document.getElementById("jumlah").value;
      
          var total = $('#sisa_ktr').val(parseInt(a) - ( parseInt(minpro) + parseInt(jumlah) ) );
          console.log(total);
          
      })
    })
    $( document ).ready(function() {
         
    });

</script>

@include('footer_admin');

