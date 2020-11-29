<?php $this->load->view('backend/tema/Header'); ?>

<section class="content page-calendar">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Rincian Presensi</h2>
          <?php foreach ($petugas as $item) { ?>
            <small class="text-muted"><a id="nama_petugas"><?= $item->nama_lengkap; ?></a></small><br />
            <small class="text-muted">Id Petugas : <a id="id_petugas"><?php echo $this->input->get('id'); ?></a></small>
          <?php } ?>

        </div>
        <div class="col-md-4">
          <center>
            <a href="<?php echo site_url('backend/presensi'); ?>"  class="btn btn-raised btn-info">Kembali ke daftar petugas</a>
          </center>
        </div>
      </div>
    </div>
      <div class="row clearfix">
          <div class="col-md-12 col-lg-12 col-xl-12">
              <div class="card m-t-20">
                  <div class="body">
                    <?php
                    if(!empty($rincian)){ ?>
                      <table class="table" id="list" border="0" style="width:100%">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Shift</th>
                          <th>Jam Masuk</th>
                          <th>Jam Keluar</th>
                          <th>Koordinat</th>
                          <th>Lokasi</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no = 0;
                      foreach ($rincian as $item) {
                      $no++;
                      ?>
                      <tr>
                        <td><?= $no; ?> </td>
                        <td><?= date("d F Y",strtotime($item->wkt_masuk)); ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= date("H:i:s",strtotime($item->wkt_masuk)); ?></td>
                        <td><?= ($item->wkt_keluar!='') ? date("H:i:s",strtotime($item->wkt_keluar)) : ' - ' ; ?></td>
                        <td><?= $item->lon ?>, <?= $item->lat ?></td>
                        <td><?= $item->lokasi ?></td>
                        <td>
                          <?php
                          $telatnya = date("H:i:s",strtotime("+10 minutes", strtotime($item->mulai)));
                          $masuknya = date("H:i:s",strtotime($item->wkt_masuk));
                          if ($telatnya > $masuknya) {
                          ?>
                          <button class="btn btn-success btn-raised btn-sm">Tepat waktu</button>
                        <?php } else { ?>
                          <button class="btn btn-danger btn-raised btn-sm">Terlambat</button>
                        <?php } ?>
                        </td>
                      </tr>
                        <?php } ?>
                      </tbody>
                     </table>
                    <?php } ?>
                  </div>
              </div>
          </div>
      </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-t-20">
                    <div class="body">
                        <button class="btn btn-raised btn-success btn-sm m-r-0 m-t-0" id="change-view-today">Hari Ini</button>
                        <!-- <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-day" >Day</button>
                        <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-week">Week</button>
                        <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-month">Month</button> -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
