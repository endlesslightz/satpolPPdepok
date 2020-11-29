<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-9">
          <h2>Galeri Foto</h2>
          <small class="text-muted">Semua Foto Pekerjaan PT. Sartika Mitrasejati</small>
        </div>
        <div class="col-md-3">
          <center>
            <a href="<?php echo site_url('backend/galeri/tambah'); ?>" class="btn btn-raised g-bg-cyan">Tambah Foto</a>
          </center>
        </div>
        </div>
      </div>

        <?php if($this->session->flashdata('sukses')!=''){ ?>
          <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Foto pekerjaan berhasil ditambahkan!
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('gagal')!=''){ ?>
          <div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('gagal'); ?>
        </div>
        <?php } ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="body">
                    <div class="row clearfix">
                      <?php
                      $n = 0;
                      foreach ($galeri as $item) {
                      $n++;
                      ?>
                      <div class="column col-sm-3">
                        <img src="<?php echo base_url('assets/upload/foto/'. $item->nama_file); ?>" onclick="openModal();currentSlide(<?= $n ?>)" class="hover-shadow galeri">
                        <br><?= $item->judul ?><br>(<?= $item->waktu ?>)<br>
                      </div>
                    <?php
                    } ?>
                    </div>

                    <!-- The Modal/Lightbox -->
                    <div id="myModal" class="modal">
                      <div class="modal-content">

                      <?php foreach ($galeri as $item) { ?>
                        <div class="mySlides">
                          <!-- <div class="numbertext">1 / 4</div> -->
                          <div class="caption-container">
                            <p id="caption"><?= $item->judul ?><br>(Diupload oleh <?= $item->nama_lengkap ?> pada <?= $item->waktu ?>)<br><?= $item->deskripsi ?></p>
                            <span class="close cursor"> <img src="<?php echo base_url('assets/backend/images/sampah.png'); ?>" class="sampah"  onclick="hapusFoto(<?= $item->id_foto ?>)"> </span>
                            <span class="close cursor" onclick="closeModal()">&times;</span>
                          </div>
                          <img src="<?php echo base_url('assets/upload/foto/'. $item->nama_file); ?>" style="width:100%">
                        </div>
                      <?php } ?>
                        <!-- Next/previous controls -->
                        <a class="prevs" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="nexts" onclick="plusSlides(1)">&#10095;</a>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
