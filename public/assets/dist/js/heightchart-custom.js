 <?php 
        $yearNow = date("Y");
        $monthNow = date("m");
        
    ?>
      
      $(function () { 
                Highcharts.chart('test', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pelaporan Kegiatan Sertifikasi <?= $yearNow ?>'
            },
            subtitle: {
                text: 'Source: Direktorat Standarisasi dan Pengendalian Mutu' 
            },
            xAxis: {

               <?php 
                 

                  $bulan =array('Jan','Feb','Mar','Apr','Mei','jun','Jul','Agu','Sep','Okt','Nov','Des');

                  echo "categories:[";
                  for ($i=0; $i < $monthNow ; $i++) { 
                    
                      echo "'".$bulan[$i]."',";
                  }
                  echo "],";
    
              ?>

                // categories: [
                //     'Jan',
                //     'Feb',
                //     'Mar',
                //     'Apr',
                //     'May',
                //     'Jun',
                //     'Jul'
                // ],
                crosshair: true
            },
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Jumlah Data'
                }
            },
            tooltip: {
              formatter: function () {
                  return '<b>' + this.series.name + '</b><br/>' +
                      this.point.y + ' ' + this.point.name.toLowerCase();
              }
           },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },

          
            series: [{
                name: 'Penerbitan',

                <?php

                      $check = $this->penerbitan->count_by(array("year(tanggal_terbit_sertifikasi)" => $yearNow ));

                      echo "data: [";
                      for ($i=1; $i <= $monthNow ; $i++) { 
              
                        $view = $this->penerbitan->count_by(array("year(tanggal_terbit_sertifikasi)" => $yearNow,"month(tanggal_terbit_sertifikasi)" => $i ));

                        echo $view.",";

                      }
                      echo "]";

                 ?>
                // data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6,]

            }, {
                name: 'Resertifikasi',

                <?php

                      $check = $this->perpanjangan->count_by(array("year(tanggal_terbit_sertifikasi)" => $yearNow ));
                      
                      echo "data: [";
                      for ($i=1; $i <= $monthNow ; $i++) { 
              
                        $view = $this->perpanjangan->count_by(array("year(tanggal_terbit_sertifikasi)" => $yearNow,"month(tanggal_terbit_sertifikasi)" => $i ));

                        echo $view.",";

                      }
                      echo "]";

                 ?>

                // data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0]

            }, {
                name: 'Pembekuan',

                 <?php

                      $check = $this->pembekuan->count_by(array("year(tanggal_pembekuan_sertifikasi)" => $yearNow ));
                      
                      echo "data: [";
                      for ($i=1; $i <= $monthNow ; $i++) { 
              
                        $view = $this->pembekuan->count_by(array("year(tanggal_pembekuan_sertifikasi)" => $yearNow,"month(tanggal_pembekuan_sertifikasi)" => $i ));

                        echo $view.",";

                      }
                      echo "]";

                 ?>

                // data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0]

            }, {
                name: 'Pengaktifan',
                <?php

                      $check = $this->pengaktifan->count_by(array("year(tanggal_pengaktifan_sertifikasi)" => $yearNow ));
                      
                      echo "data: [";
                      for ($i=1; $i <= $monthNow ; $i++) { 
              
                        $view = $this->pengaktifan->count_by(array("year(tanggal_pengaktifan_sertifikasi)" => $yearNow,"month(tanggal_pengaktifan_sertifikasi)" => $i ));

                        echo $view.",";

                      }
                      echo "]";

                 ?>
                // data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4]

            },{
                name: 'Pencabutan',
                <?php

                      $check = $this->pencabutan->count_by(array("year(tanggal_pencabutan_sertifikasi)" => $yearNow ));
                      
                      echo "data: [";
                      for ($i=1; $i <= $monthNow ; $i++) { 
              
                        $view = $this->pencabutan->count_by(array("year(tanggal_pencabutan_sertifikasi)" => $yearNow,"month(tanggal_pencabutan_sertifikasi)" => $i ));

                        echo $view.",";

                      }
                      echo "]";

                 ?>
                // data: [73.5, 37.6, 38.4, 69.7, 72.5, 86.5, 58.4]

            }]
        });
    });