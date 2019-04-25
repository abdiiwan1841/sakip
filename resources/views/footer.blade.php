<!--  Demos -->
<section id="patners">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="batch-patners">
                    <div class="label-patners">
                        Link Terkait
                    </div>

                    <div class="col-md-12 row">
                        <div class="owl-carousel owl-theme">
                          
                            <div class="col-md-12 item">
                                <a href="http://www.kemendag.go.id/" title="kemendag.go.id" target="blank">
                                    <img src="http://www.kemendag.go.id/files/images/links/direktorat-jenderal-perdagangan-dalam-negeri1348424376.jpg" style="width: 150px;">

                                </a>
                            </div>

                            <div class="col-md-12 item">
                                <a href="http://www.kemenperin.go.id/" title="kemenperin.go.id" target="blank">
                                    <img src="http://www.kemendag.go.id/files/images/links/ditjen-standarisasi-dan-perlindungan-konsumen1348422988.jpg" style="width: 150px;">
                                </a>
                            </div>
                            <div class="col-md-12 item">
                                <a href="http://www.pertanian.go.id/" title="pertanian.go.id" target="blank">
                                    <img src="http://www.kemendag.go.id/files/images/links/direktorat-jenderal-perdagangan-luar-negeri1348684625.jpg" style="width: 150px;">
                                </a>
                            </div>
                            <div class="col-md-12 item">
                                <a href="https://www.esdm.go.id/" title="esdm.go.id" target="blank">
                                    <img src="http://www.kemendag.go.id/files/images/links/direktorat-jenderal-kerjasama-perdagangan-internasional1348684724.jpg" style="width: 150px;">
                                </a>
                            </div>
                            <div class="col-md-12 item">
                                <a href="http://lab-bpmb.kemendag.go.id/" title="lab-bpmb.kemendag.go.id" target="blank">
                                    <img src="" style="width: 100%; margin-top: 30px;">
                                </a>
                            </div>
                            <div class="col-md-12 item">
                                <a href="http://www.bsn.go.id/" title="bsn.go.id" target="blank">
                                    <img src="" style="width: 80%;">
                                </a>
                            </div>

                            <div class="col-md-12 item">
                                <a target="blank" href="http://inatrade.kemendag.go.id/" title="inatrade.kemendag.go.id">
                                    <img src="" style="width: 90%; margin-top: 20px;">
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<footer class="footer">
    <div class="col-md-12">
        <div class="container">
            <div class="row">

                <hr style="border-top:2px solid #012233;">

                <p>Ministry of Trade Republic of Indonesia<br>
                    M. I. Ridwan Rais Road, No. 5, Central Jakarta 10110, Phone No. (021) 3841961/62
                    <br>
                <p class="copyright">Copyright 2017, Public Relations Center and Trade Data and Information Center </p>

                </p>
            </div>
        </div>
    </div>
</footer>

<!-- vendors -->
<!-- <script src="../assets/vendors/highlight.js"></script> -->
<!-- <script src="../assets/js/app.js"></script> -->
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,

        })
    })


</script>

<!-- Bootstrap core JavaScript
================================================== -->

<script src="{{url('assets/assets/js/ie10-viewport-bug-workaround.js')}}"></script>

<script src="{{url('assets/dist/js/heightchart.js')}}"></script>





<script type="text/javascript">

    window.onload = function(){
        var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum&#39;at','Sabtu'];
        var bulan =['Januari','Februari','Maret','April','Mei','juni','Juli','Agustus','September','Oktober','November','Desember'];

        var tanggal = new Date().getDate();
        var _hari = new Date().getDay();
        var _bulan = new Date().getMonth();
        var _tahun = new Date().getYear();

        var hari = hari[_hari];
        var bulan = bulan[_bulan];

        var tahun = (_tahun + 1000) ? _tahun + 1900:_tahun;

        document.getElementById("main-date").innerHTML = hari +', ' +tanggal +' '+ bulan +' '+ tahun;



       

        $(".owl-dot").hide();

    }
</script>
</body>
</html>