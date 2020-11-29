<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Tabel Kehadiran Pegawai</h2>
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
                    <h4 style="color:#007e7e;">Tabel Kehadiran</h4>
                    <?php
                    if(!empty($list)){ ?>
                      <table class="table" id="list" border="0" style="width:100%">
                        <thead>
                        <tr>
                          <th width="10%">ID Pegawai</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Presensi Terakhir</th>
                          <!-- <th>Laporan Terakhir</th>
                          <th>Status</th>
                          <th>Aksi</th> -->
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($list as $item) { ?>
                      <tr>
                        <td><?= $item->id_petugas; ?> </td>
                        <td><?= $item->nama_lengkap; ?></td>
                        <td><?= $item->jabatan; ?></td>
                        <td><?= ($item->waktu!='') ? date("d F Y - H:i:s",strtotime($item->waktu)) : ' - ' ; ?></td>
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
