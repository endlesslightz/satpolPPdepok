<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Daftar Absensi Petugas</h2>
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
                    <h4 style="color:#007e7e;">Status Saat Ini</h4>
                    <?php
                    if(!empty($list)){ ?>
                      <table class="table" id="list" border="0" style="width:100%">
                        <thead>
                        <tr>
                          <th width="10%">ID Petugas</th>
                          <th>Nama</th>
                          <th>Pangkat</th>
                          <th>Absensi Terakhir</th>
                          <!-- <th>Presensi Keluar</th> -->
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($list as $item) { ?>
                      <tr>
                        <td><?= $item->id_petugas; ?> </td>
                        <td><?= $item->nama_lengkap; ?></td>
                        <td><?= $item->jabatan; ?></td>
                        <td><?= ($item->wkt_masuk!='') ? date("d F Y - H:i:s",strtotime($item->wkt_masuk)) : ' - ' ; ?></td>
                        <td>
                         <?php if ($item->wkt_keluar=='0000-00-00 00:00:00') { ?>
                          <h5><span class="badge badge-success">ONLINE</span></h5>
                       <?php } else { ?>
                          <h5><span class="badge badge-danger">OFFLINE</span></h5>
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
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
