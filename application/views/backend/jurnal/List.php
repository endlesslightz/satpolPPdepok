<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Jurnal Karyawan</h2>
          <!-- <small class="text-muted">Nomor Id Karyawan : <?php echo $id; ?></small> -->
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
                    <h4 style="color:#007e7e;">Tabel Jurnal Karyawan</h4>
                    <?php
                    if(!empty($karyawan)){ ?>
                      <table class="table" border="0">
                        <tr>
                          <td width="20%">ID Karyawan </td>
                          <td>Nama</td>
                          <td>Jabatan</td>
                          <td>Login Terakhir</td>
                          <td>Aksi</td>
                        </tr>
                     <?php foreach ($karyawan as $item) { ?>
                      <tr>
                        <td width="20%"><?php echo $item->id_karyawan; ?> </td>
                        <td><?php echo $item->nama_lengkap; ?></td>
                        <td><?php echo $item->jabatan; ?></td>
                        <td><?php echo $item->last_login; ?></td>
                      </tr>
                        <?php } ?>
                      </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
