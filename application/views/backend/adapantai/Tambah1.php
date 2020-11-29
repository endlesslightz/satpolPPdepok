<?php $this->load->view('backend/tema/Header'); ?>
<section class="content page-calendar">
    <div class="container-fluid">
      <div class="block-header">
        <h2>Tambah Titik Penertiban</h2>
      </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-t-20">
                    <div class="body">
                      <form class="" action="<?php echo site_url('backend/adapantai/add1'); ?>" method="post">
                        <div class="form-group">
                          <div class="form-line">
                              <b>Tanggal</b>
                              <input type="text" class="datepicker form-control" id="datepick" name="tanggal" placeholder="tanggal" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="form-line">
                        <b>Kegiatan</b>
                        <input type="text" class="form-control" name="nama" placeholder="kegiatan" required>
                      </div>
                    </div>
                      <div class="form-group ">
                        <div class="form-line">
                        <b>Nama Lokasi</b>
                        <input type="text" class="form-control" name="lokasi" placeholder="lokasi" required>
                      </div>
                    </div>
                      <div class="form-group">
                        <div class="form-line">
                            <b>Jumlah</b>
                            <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <button class="btn btn-info btn-raised">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
      </div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
