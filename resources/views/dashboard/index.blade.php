@include('header_admin');

<script src="{{asset('/code/highcharts.js') }}"></script>
<script src="{{asset('/code/modules/data.js') }}"></script>
<script src="{{asset('/code/modules/drilldown.js') }}"></script>
<script src="{{asset('/code/modules/exporting.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<script src="{{asset('/code/highcharts-3d.js') }}"></script>



<section role="main" class="content-body">
    <header class="page-header">
        <h2>HOME</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                                <!-- <li><span>PNBP</span></li>
                                    <li><span>Rencana Kegiatan</span></li> -->
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

                                <h2 class="panel-title">Program Kerja Satker</h2>
                            </header>


                            <div class="panel-body">
                                <!-- <div class="wizard-tabs" style="float: left !important;"> -->
                                    <div style="float: right;">
                                        <label style="font-weight: bold;font-size: 1.5em;font-family: 'Arial';color: black;">Satker</label> &nbsp;&nbsp;&nbsp;
                                        <select class="form-control" name="id_satker" id="id_satker">
                                         <option  value='1' selected>- Pilih Satker -</option>
                                         <?php
                                         $kapro = DB::select("SELECT * from sakip.users where sakip.users.id_satker !='0'"); ?>
                                         <?php foreach($kapro as $row){ ?>
                                         <option value="<?php echo $row->id_satker; ?>"
                                          <?php if (isset($program)) {
                                            if ($program->id_satker == $row->id_satker) echo "selected";
                                        } ?> ><?php echo $row->name; ?></option>
                                        <?php } ?>

                                    </select>

                                </select>
                            </div>
                            <div style="float: right;">
                                <label style="font-weight: bold;font-size: 1.5em;font-family: 'Arial';color: black;">Kemajuan</label> &nbsp;&nbsp;&nbsp;
                                <select class="form-control" name="kemajuan" id="kemajuan">
                                 <option  value='1' selected>- Pilih Kemajuan -</option>

                                 <option value="1"  <?php if (isset($kemajuan)) {
                                            if ($kemajuan == 1) echo "selected";
                                        } ?> > Admin</option>
                                 <option value="2"  <?php if (isset($kemajuan)) {
                                            if ($kemajuan == 2) echo "selected";
                                        } ?> > Fisik</option>


                             </select>
                         </div>
                         <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                         <!-- </div> -->

                     </div>


                 </section>
             </section>


             <script type="text/javascript">




                function myFunction2() {
                    var thn = document.getElementById("mySelect2").value;
    // document.getElementById("demo").innerHTML = "You selected: " + x;
}
$(function () {
 $('#id_satker').on('change',function (e) {

    var kemajuan = document.getElementById("kemajuan").value;


    var id_satker = e.target.value;

    window.location.href = "{{url('getdata')}}/" + id_satker +'/'+kemajuan;


} )


})






Highcharts.chart('container2', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'UPDATE PROGRAM KERJA SATKER'
    },
    subtitle: {
        text: 'sumber : Satker'
    },




    xAxis: {
        categories: [
        @foreach($data as $val)

        '{{$val->kegiatan}}',

        @endforeach

        ]
    },
    yAxis: {
        title: {
            text: 'Presentase'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: false
            },
            // enableMouseTracking: false
        }
    },
    series: [{
        name:  @if($kemajuan==1)
        'Kemajuan Admin'
        @else
        'Kemajuan Fisik'
        @endif

        ,
        data: [  
        @if($kemajuan==1)
        @foreach($data as $val)
        {{$val->kemajuan_admin}},
        @endforeach
        @else
        @foreach($data as $val)
        {{$val->kemajuan_fisik}},
        @endforeach

        @endif

        ]
    }]
});


</script>

@include('footer_admin')