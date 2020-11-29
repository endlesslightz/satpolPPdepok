<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: E-Patrol : Satpol PP Depok::</title>
<link rel="icon" href="<?php echo base_url('assets/login/images/logoepatrol.png'); ?>" type="image/x-icon">
<link href="<?php echo base_url('assets/backend/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/backend/plugins/morrisjs/morris.css'); ?>" rel="stylesheet" />
<!-- Custom Css -->
<link href="<?php echo base_url('assets/backend/css/main.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/backend/css/tambahan.css'); ?>" rel="stylesheet">
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?php echo base_url('assets/backend/css/themes/all-themes.css'); ?>" rel="stylesheet" />
<?php if ($link=='petugas'){ ?>
  <link href="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/backend/plugins/dropzone/dropzone.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet" />
<?php } else if ($link=='add_tugas'){ ?>
    <link href="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />
    <!-- <link href="<?php echo base_url('assets/backend/plugins/dropzone/dropzone.css'); ?>" rel="stylesheet"> -->
    <link href="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet" />
<?php } else if ($link=='jurnal'){ ?>
  <link href="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/datatables/datatables.css'); ?>" rel="stylesheet" />
<?php } else if ($link=='presensi'||$link=='jadwal'){ ?>
  <link href="<?php echo base_url('assets/backend/plugins/fullcalendar/fullcalendar.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/datatables/datatables.css'); ?>" rel="stylesheet" />
<?php } else if ($link=='status' || $link=='list_tugas'){ ?>
  <link href="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/backend/plugins/dropzone/dropzone.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/datatables/datatables.css'); ?>" rel="stylesheet" />
<?php } else if ($link=='struktur'){ ?>
  <!-- <link href="<?php echo base_url('assets/backend/css/orgchart.css'); ?>" rel="stylesheet"> -->
<?php } else if ($link=='shift'){ ?>
  <link href="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link href="<?php echo base_url('assets/backend/plugins/fullcalendar/fullcalendar.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/datatables/datatables.css'); ?>" rel="stylesheet" />
  <style media="screen">
    .ui-timepicker-container{
      z-index:10 !important;
    }
  </style>
<?php } else if ($link=='riwayat'){ ?>
  <link href="<?php echo base_url('assets/datatables/datatables.css'); ?>" rel="stylesheet" />
<?php } ?>
<script>
  function resizeIframe(obj) {
    obj.style.height = (obj.contentWindow.document.body.scrollHeight+20)+ 'px';
  }
</script>
</head>

<body class="theme-cyan" ng-app="App">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Silakan Tunggu...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12" ng-controller="TimeCtrl">
        <div class="navbar-header">
          <a href="javascript:void(0);" class="bars"></a>
          <a class="navbar-brand" href="#">Halo, <? echo $this->session->userdata('nama'); ?></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a id="waktu">{{waktu}}</a></li>
            <!-- <li><a title="Setting" href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li> -->
            <li><a title="Log Out" href="<?php echo site_url('login/logout'); ?>" ><i class="zmdi zmdi-sign-in"></i></a></li>
        </ul>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="<?php echo base_url('assets/login/images/logoepatrol.png'); ?>" alt=""> </div>
            <div class="admin-action-info"> <span>Satpol PP Kota Depok</span>
                <h3>E-PATROL</h3>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header"></li>
                <li <?php if($link=="dashboard"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/dashboard'); ?>"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li <?php if($link=="struktur"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/struktur'); ?>"><i class="zmdi zmdi-balance"></i><span>Struktur Organisasi</span></a></li>
                <!-- <li <?php if($link=="profil"){?> class="active open" <?php } ?>><a href="<?php echo site_url('backend/profil?id='.$this->session->userdata('id_karyawan')); ?>"><i class="zmdi zmdi-face"></i><span>Profil Pribadi</span></a></li> -->
                <li <?php if($link=="pantau"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/pantau'); ?>"><i class="zmdi zmdi-alert-octagon"></i><span>Titik Pantau</span></a></li>
                <li <?php if($link=="petugas"||$link=="jadwal"||$link=="status"||$link=="presensi"||$link=="shift"||$link=="laporan"){?> class="active open" <?php } ?>><a href="#" class="menu-toggle"><i class="zmdi zmdi-accounts"></i><span>Kepegawaian</span></a>
                  <ul class="ml-menu">
                    <li <?php if($link=="petugas"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/petugas'); ?>"><i class="zmdi zmdi-account"></i><span>Data Pegawai</span></a></li>
                    <li <?php if($link=="jadwal"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/jadwal'); ?>"><i class="zmdi zmdi-calendar"></i><span>Jadwal Penugasan</span></a></li>
                    <li <?php if($link=="status"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/status'); ?>"><i class="zmdi zmdi-check"></i><span>Status Pegawai</span></a></li>
                    <?php if ($this->session->userdata('hak_akses')!='standar') { ?>
                      <li <?php if($link=="presensi"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/presensi/'); ?>"><i class="zmdi zmdi-calendar-check"></i><span>Presensi Harian</span></a></li>
                      <li <?php if($link=="laporan"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/laporan'); ?>"><i class="zmdi zmdi-hospital"></i><span>Laporan Harian</span></a></li>
                      <li <?php if($link=="kedisiplinan"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/kedisiplinan'); ?>"><i class="zmdi zmdi-thumb-up-down"></i><span>Tingkat Kedisplinan</span></a></li>
                      <li <?php if($link=="shift"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/shift/'); ?>"><i class="zmdi zmdi-code-setting"></i><span>Shift & Regu</span></a></li>
                    <?php } else { ?>
                      <li <?php if($link=="presensi"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/presensi/rincian?id='.$this->session->userdata('id_petugas')); ?>"><i class="zmdi zmdi-calendar-check"></i><span>Presensi Harian</span></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <!-- <li <?php if($link=="aktualisasi"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/laporan'); ?>"><i class="zmdi zmdi-file-text"></i><span>Aktualisasi</span></a></li> -->
                <?php if ($this->session->userdata('hak_akses')=='superadmin') { ?>
                <li <?php if($link=="list_tugas"||$link=="add_tugas"){?> class="active open" <?php } ?>><a href="#" class="menu-toggle"><i class="zmdi zmdi-folder-star-alt"></i><span>Penugasan</span></a>
                  <ul class="ml-menu">
                    <li <?php if($link=="list_tugas"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/tugas'); ?>"><i class="zmdi zmdi-folder"></i><span>List Penugasan</span></a></li>
                    <li <?php if($link=="add_tugas"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/tugas/add'); ?>"><i class="zmdi zmdi-file-plus"></i><span>Tambah Penugasan</span></a></li>
                  </ul>
                </li>
              <?php } ?>
                <li <?php if($link=="aktualisasi"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/aktualisasi?tahun=2019'); ?>"><i class="zmdi zmdi-file-text"></i><span>Aktualisasi Data</span></a></li>
                <li <?php if($link=="grafik_pres"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/grafik/grafik_pres'); ?>"><i class="zmdi zmdi-chart"></i><span>Grafik Presensi</span></a></li>

                <!-- <li <?php if($link=="grafik_pres"||$link=="grafik_tugas"||$link=="grafik_perda"){?> class="active open" <?php } ?>><a href="#" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Grafik</span></a>
                  <ul class="ml-menu">
                    <li <?php if($link=="grafik_pres"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/grafik/grafik_pres'); ?>"><i class="zmdi zmdi-chart"></i><span>Presensi</span></a></li>
                    <li <?php if($link=="grafik_tugas"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/grafik/grafik_tugas'); ?>"><i class="zmdi zmdi-chart"></i><span>Penugasan</span></a></li>
                    <li <?php if($link=="grafik_perda"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/grafik/grafik_perda'); ?>"><i class="zmdi zmdi-chart"></i><span>Penegakan Perda</span></a></li>
                  </ul>
                </li> -->
                <li <?php if($link=="profil"){?> class="active open" <?php } else { ?> class="listnya" <?php } ?>><a href="<?php echo site_url('backend/profil?id='.$this->session->userdata('id_petugas')); ?>"><i class="zmdi zmdi-face"></i><span>Profil Diri</span></a></li>
                <li class="listnya"><a href="<?php echo site_url('login/logout'); ?>"><i class="zmdi zmdi-sign-in"></i><span>Keluar</span></a></li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->

    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red">
                        <div class="red"></div>
                        <span>Red</span> </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span> </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span> </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span> </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span> </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span> </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span> </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span> </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span> </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
