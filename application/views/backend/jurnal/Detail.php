<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Jurnal Karyawan</h2>
          <small class="text-muted">Nomor Id Karyawan : <?php echo $id; ?></small>
      </div>
        <div class="col-md-4">
          <center>
          </center>
        </div>
        </div>
      </div>
        <div class="row clearfix js-sweetalert">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="card">
                  <div class="body">
                   <?php foreach ($karyawan as $item) { ?>
                      <h4 style="color:#007e7e;">Tabel Detail Jurnal <?php echo $item->nama_lengkap; ?></h4>
                    <?php } ?>
                    <table id="jurnal" class="display" >
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal</th>
                          <th>Jenis</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($jurnal as $item) {  ?>
                        <tr>
                          <td><?php echo $item->id_jurnal; ?></td>
                          <td><?php echo $item->tanggal; ?></td>
                          <td><?php echo $item->tipe; ?></td>
                          <td><?php echo $item->detail; ?></td>
                          <td>
                            <center>
                            <button onclick="location.href='<?php echo site_url('backend/jurnal/edit?id='.$item->id_jurnal.'&karyawan='.$id); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Edit</button>
                            <button class="btn btn-raised btn-danger hapus btn-sm waves-effect" id="<?php echo $item->id_jurnal; ?>" data-type="confirmjurnal">Hapus</button>
                            </center>
                          </td>
                        </tr>
                      <?php
                      }
                     ?>
                   </tbody>
                   </table>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card">
                  <div class="body">
                    <center>
                      <button onclick="location.href='<?php echo site_url('backend/jurnal/tambah/'.$id); ?>'" class="btn btn-raised btn-success waves-effect">Tulis Jurnal</button>
                    </center>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
