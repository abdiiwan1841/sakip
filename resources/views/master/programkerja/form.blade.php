@include('header_admin');

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Form Programkerja</h2>

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

            <h2 class="panel-title">Form Programkerja</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => true]) !!}

            <?php if(isset($programkerja->id_programkerja)){ ?>
            <input type="hidden" name="id_programkerja" id="id_programkerja" value="<?php echo $programkerja->id_programkerja; ?>">
            <?php }?>


            <div class="form-group">
                {!! Form::label('tanggal', 'Tanggal', ['class' => 'col-md-3 control-label']) !!}
                <?php if (isset($programkerja->tanggal)) {
                    $tanggal =$programkerja->tanggal;
                } else {
                   $tanggal =date('Y-m-d') ;
               } ?>
               <div class="col-md-7">
                 {!! Form::date('tanggal', $tanggal, ['class' => 'form-control']) !!}
             </div>
         </div>



         <div class="form-group">
            {!! Form::label('akun', 'Akun', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-7">
              <select class="form-control select2" name="akun" id="akun" required="">
                @if(isset($programkerja->id_akun))
                @foreach($akun as $akuns)
                @if($programkerja->id_akun==$akuns->id_akun)
                <option value="<?php echo $akuns->id_akun; ?>" selected="selected"><?php echo $akuns->nama_akun; ?></option>
                @endif
                @endforeach
                @else

                <option value='0' selected>- Pilih Jenis Akun -</option>
                <?php foreach($akun as $row){ ?>
                <option value="<?php echo $row->id_akun; ?>"><?php echo $row->nama_akun; ?></option>
                <?php } ?>

                @endif
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('program', 'Program', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-7">
          <select class="form-control select2" name="program" id="program" onchange="getkegiatan()" required="">
            @if(isset($programkerja->id_program))

            @foreach($program as $prog)
            @if($prog->id_program==$programkerja->id_program)
            <option value="<?php echo $prog->id_program; ?>" selected="selected"><?php echo $prog->nama_program; ?></option>
            @endif
            @endforeach
            @else

            <option value='0' selected>- Pilih Jenis Program -</option>
            <?php foreach($program as $row){ ?>
            <option value="<?php echo $row->id_program; ?>"><?php echo $row->nama_program; ?></option>
            <?php } ?>

            @endif
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::label('kegiatan', 'Kegiatan', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        @if(isset($programkerja->id_kegiatan))

        @foreach($kegiatan as $keg)
          
            @if($keg->id_kegiatan==$programkerja->id_kegiatan)
              <select class="form-control select2" name="kegiatan" id="id_kegiatan" >
            <option value="<?php echo $keg->id_kegiatan; ?>" selected="selected"><?php echo $keg->nama_kegiatan; ?></option>
             </select>
            @endif
            @endforeach
            
        @else
        <div id="statekegiatan">
            <select class="form-control select2" name="kegiatan"
            id="id_kegiatan" >
            <option value='0' selected>
                -Pilih Kegiatan-
            </option>
        </select>
    </div>
    @endif
</div>
</div>


<div class="form-group">
    <label class="col-md-3"></label>
    <div class="col-md-7">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('/list_programkerja')}}" class="btn btn-danger">Kembali</a>
    </div>
</div>

{{Form::close()}}
</div>
</section>
</section>



<script type="text/javascript">
 $(document).ready(function() {
      $(".select2").select2();
      $(window).resize(function() {
    $('.select2').css('width', "100%");
});

    });
  function getkegiatan() {
    var strURL = "{{url('getkegiatan')}}";
    var id_program = document.getElementById("program").value;


    var req = getXMLHTTP();

    if (req) {
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                if (req.status == 200) {
                    document.getElementById('id_kegiatan').innerHTML = req.responseText;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
            }
                        //req.open("GET", strURL+ "?perusahaan=" + perusahaan, true);
                        req.open("GET", strURL + "/" + id_program, true);
                        req.send(null);

            }
   }




                function getXMLHTTP() {
                    var xmlhttp = false;
                    try {
                        xmlhttp = new XMLHttpRequest();
                    }
                    catch (e) {
                        try {
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        catch (e) {
                            try {
                                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                            }
                            catch (e1) {
                                xmlhttp = false;
                            }
                        }
                    }
                    return xmlhttp;
                }
            </script>

            @include('footer_admin');