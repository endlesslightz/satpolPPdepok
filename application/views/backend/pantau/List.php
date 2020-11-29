<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Daftar Titik Pemantauan</h2>
      </div>
        <div class="col-md-4">
          <center>
            <?php if ($this->session->userdata('hak_akses')!='standar') { ?>
            <a href="<?php echo site_url('backend/pantau/tambah'); ?>" class="btn btn-raised g-bg-cyan">Tambah Titik Pantau</a>
            <?php } ?>
           </center>
        </div>
        </div>
      </div>
      <?php if($this->session->flashdata('sukses')!=''){ ?>
        <div class="alert bg-green alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data titik pantau berhasil diperbarui!
      </div>
      <?php } ?>
        <div class="row clearfix js-sweetalert">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="body">
                    <h4 style="color:#007e7e;">Tabel Lokasi Titik Pantau</h4>
                    <?php
                    if(!empty($list)){ ?>
                      <table class="table" id="list" border="0" style="width:100%">
                        <thead>
                        <tr>
                          <th width="10%">Nomor</th>
                          <th>Nama Lokasi</th>
                          <th>Jenis</th>
                          <th>Zona</th>
                          <th>Koordinat</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no = 1;
                       foreach ($list as $item) { ?>
                      <tr>
                          <td><?= $no; ?> </td>
                          <td><?= $item->nama_titik; ?></td>
                          <td><?php if($item->jenis=='1') { ?>
                            Pelanggaran Perda
                          <?php } else if($item->jenis=='2') { ?>
                            Gangguan Tibum Tranmas
                          <?php } else if($item->jenis=='3') { ?>
                            Kerawanan Sosial
                          <?php } ?>
                          </td>
                          <td><?= $item->zona; ?></td>
                          <td><?= $item->lat.', '.$item->lon; ?></td>
                          <td><?= $item->keterangan; ?></td>
                        <td>
                        <button onclick="location.href='<?= site_url('backend/pantau/edit?id='.$item->id_titik); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Edit</button>
                        <button class="btn btn-raised btn-danger btn-sm" data-type="pantau" id="<?= $item->id_titik ?>">Hapus</buton>
</td>
                      </tr>
                        <?php $no++; } ?>
                      </tbody>
                     </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

<script>
  function konfirmasi(){
    if (window.confirm("Apakah Anda yakin mau menghapus data petugas ini?")) {
        window.location = "<?php echo site_url('backend/tugas/delete/'.$this->uri->segment(4)); ?>";
      }
  }
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
