<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Tabel Grafik Karyawan</h2>
      </div>
        <div class="col-md-4">
          <center>
          </center>
        </div>
        </div>
      </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="body">
                    <h4 style="color:#007e7e;">Tabel Grafik Karyawan</h4>
                    <?php
                    if(!empty($list)){ ?>
                      <table class="table" border="0" style="width:100%">
                        <tr>
                          <td width="5%"><b>No</b></td>
                          <td width="25%"><b>Nama Karyawan</b></td>
                          <td><b>2018</b></td>
                          <td><b>2019</b></td>
                          <td><b>2020</b></td>
                        </tr>
                     <?php
                     $no = 1;
                     foreach ($list as $item) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $item->nama_lengkap; ?></td>
                        <td><button onclick="location.href='<?= site_url('backend/grafik/Grafik?id='.$item->id_karyawan.'&tahun=2018'); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Lihat Grafik</button></td>
                        <td><button onclick="location.href='<?= site_url('backend/grafik/Grafik?id='.$item->id_karyawan.'&tahun=2019'); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Lihat Grafik</button></td>
                        <td><button onclick="location.href='<?= site_url('backend/grafik/Grafik?id='.$item->id_karyawan.'&tahun=2020'); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Lihat Grafik</button></td>
                      </tr>
                        <?php $no++; } ?>
                      </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
