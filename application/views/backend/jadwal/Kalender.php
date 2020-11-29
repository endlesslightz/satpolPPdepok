<?php $this->load->view('backend/tema/Header'); ?>
`
`<section class="content page-calendar">
    <div class="container-fluid">
      <div class="block-header">
        <h2>Jadwal Penugasan</h2>
      </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-t-20">
                    <div class="body">
                        <button class="btn btn-raised btn-success btn-sm m-r-0 m-t-0" id="change-view-today">Hari Ini</button>
                        <!-- <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-day" >Harian</button>
                        <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-week">Mingguan</button>
                        <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-month">Bulanan</button> -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
