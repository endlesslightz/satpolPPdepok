<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Tabel Grafik Tugas</h2>
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
                    <h4 style="color:#007e7e;">Tabel Grafik Petugas</h4>
                    <div class="row clearfix">

                    <div class="col-lg-9">
                      <iframe src="<?php echo site_url('backend/grafik/kanvas?id='.$id.'&tahun='.$tahun.''); ?>" width="100%" frameborder="0" allowfullscreen onload="resizeIframe(this)"></iframe>

                    </div>
                    <div class="col-lg-3">
                      <?php foreach ($info as $item) { ?>
                      <h4>Informasi Grafik</h4>
                      <b>Nama : </b><?= $item->nama_lengkap ?>
                      <br><b>Pangkat : </b><?= $item->jabatan ?>
                      <br><b>Unit Kerja : </b><?= $item->unit_kerja ?>
                      <br><b>Tahun : </b><?= $tahun ?>

                    <?php } ?>

                      <br><br><h4>Pilih Grafik</h4>
                      <form class="" action="<?= site_url('backend/grafik/grafik_pres'); ?>" method="post">
                        <b>Petugas :</b>
                        <select class="form-control" name="id">
                          <?php foreach ($petugas as $item) { ?>
                            <option value="<?= $item->id_petugas ?>"><?= $item->nama_lengkap ?></option>
                          <?php } ?>
                        </select>
                        <b>Tahun :</b>

                        <select class="form-control" name="tahun">
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-raised btn-info btn-sm waves-effect" value="Lihat Grafik">
                      </form>
                    </div>
                  </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
