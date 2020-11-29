<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
            <small class="text-muted">Selamat datang di aplikasi E-Patrol Satpol Pamong Praja Kota Depok</small>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect" style="margin-bottom:0 !important;">
                    <div class="icon"> <i class="zmdi zmdi-account col-blue"></i> </div>
                    <div class="content">
                        <div class="text">Pegawai Terdaftar</div>
                        <div class="number"><?= $total_petugas ?> </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect" style="margin-bottom:0 !important;">
                    <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
                    <div class="content">
                        <div class="text">Pegawai Aktif Saat Ini</div>
                        <div class="number" id="online"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect" style="margin-bottom:0 !important;">
                    <div class="icon"> <i class="zmdi zmdi-bug col-blush"></i> </div>
                    <div class="content">
                        <div class="text">Laporan Terbaru</div>
                        <div class="number" id="laporan"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect" style="margin-bottom:0 !important;">
                    <div class="icon"> <i class="zmdi zmdi-balance col-cyan"></i> </div>
                    <div class="content">
                        <div class="text">Presensi Terbaru</div>
                        <div class="number" id="presensi"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <!-- <div class="header">
                        <H4>INFORMASI APLIKASI</H4>
                    </div> -->
                    <iframe src=<?php echo base_url('backend/peta');?> width=100% height=500 frameBorder="0"></iframe>

                </div>
            </div>
        </div>
        <!-- <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <H4>INFORMASI APLIKASI</H4>
                    </div>
                    <div class="body">
                        <p>Pemilik : Nurcahya Pradana Taufik Prakisya</p>
                        <p>Tanggal Pembuatan : 16 Oktober 2018</p>
                        <p>Deskripsi : xxxxxxxxxxxx</p>
                    </div>
                </div>
            </div>
        </div> -->
	</div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript">
function requestData() {
    $.ajax({
        url: '<?php echo site_url()."backend/API/get_online" ?>',
        dataType: 'text',
        success: function (data) {
          var arr = JSON.parse(data);
          $('#online').html(arr['total_online']);
        },
        cache: false
    });
    $.ajax({
        url: '<?php echo site_url()."backend/API/get_latest_presensi" ?>',
        dataType: 'text',
        success: function (data2) {
          var arr2 = JSON.parse(data2);
          $('#presensi').html(arr2['latest_presensi'][0]['wkt_masuk']);
          // alert(arr2['latest_presensi'][0]['wkt_masuk']);
        },
        cache: false
    });
    $.ajax({
        url: '<?php echo site_url()."backend/API/get_latest_laporan" ?>',
        dataType: 'text',
        success: function (data3) {
          var arr3 = JSON.parse(data3);
          $('#laporan').html(arr3['latest_laporan'][0]['waktu']);
          // alert(arr3['latest_laporan'][0]['waktu']);

        },
        cache: false
    });
}
setInterval(requestData(),5000);
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
