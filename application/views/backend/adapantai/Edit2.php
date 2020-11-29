<?php $this->load->view('backend/tema/Header');
foreach ($list as $item) {
  $tanggal = $item->tanggal;
  $lokasi = $item->lokasi;
  $nama = $item->nama;
  $jumlah = $item->jumlah;
  $id = $item->id_adapantai;
}
?>
<section class="content page-calendar">
    <div class="container-fluid">
      <div class="block-header">
        <h2>Tambah Titik Penertiban</h2>
      </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-t-20">
                    <div class="body">
                      <form class="" action="<?php echo site_url('backend/adapantai/update2'); ?>" method="post">
                        <div class="form-group">
                          <div class="form-line">
                              <b>Tanggal</b>
                              <input type="text" class="datepicker form-control" id="datepick" name="tanggal" placeholder="tanggal" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="form-line">
                        <b>Kegiatan</b>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="kegiatan" required>
                      </div>
                    </div>
                      <div class="form-group ">
                        <div class="form-line">
                        <b>Nama Lokasi</b>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi" required>
                      </div>
                    </div>
                      <div class="form-group">
                        <div class="form-line">
                            <b>Jumlah</b>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <input type="hidden" name="id_adapantai" value="<?= $id ?>" required>
                        <button class="btn btn-info btn-raised">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
      </div>
</section>
<script>
document.getElementById('nama').value="<?= $nama ?>";
document.getElementById('lokasi').value="<?= $lokasi ?>";
document.getElementById('jumlah').value="<?= $jumlah ?>";
document.getElementById('datepick').value="<?= $tanggal ?>";
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
