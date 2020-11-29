<?php $this->load->view('backend/tema/Header'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
          <div class="row clearfix">
          <div class="col-md-9">
            <h2>Data Petugas</h2>
            <small class="text-muted">SATPOL PP KOTA DEPOK</small>
          </div>
          <div class="col-md-3">
            <?php if ($this->session->userdata('hak_akses')!='standar') { ?>
            <a href="<?php echo site_url('backend/petugas/tambah'); ?>" class="btn btn-raised g-bg-cyan">Tambah Petugas</a>
            <?php } ?>
            </div>
          </div>
        </div>

        <?php if($this->session->flashdata('sukses')!=''){ ?>
          <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data petugas berhasil ditambahkan!
        </div>
        <?php } ?>
        <div class="row clearfix">
          <?php foreach ($petugas as $item) { ?>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="member-card verified">
                            <div class="thumb-xl member-thumb">
                              <?php if ($item->gambar==""){ ?>
                                <img src="<?php echo base_url('assets/backend/images/user.png'); ?>" class="img-thumbnail rounded-circle" alt="profile-image">
                              <?php } else { ?>
                                <img src="<?php echo base_url('assets/upload/profil/'.$item->gambar); ?>" class="img-thumbnail rounded-circle" alt="profile-image">
                              <?php } ?>
                            </div>

                            <div class="">
                                <h4 class="m-b-5 m-t-20"><?php echo $item->nama_lengkap; ?></h4>
                                <p class="text-muted"><?php echo $item->jabatan; ?><span>
<!--  --><hr>
                                <a class="text-pink"><?php echo $item->unit_kerja; ?></a> </span>
                              </p>
                            </div>
                            <!-- <p class="text-muted"><?php echo $item->alamat; ?></p> -->
                            <a href="<?php echo site_url('backend/petugas/detail/'.$item->id_petugas); ?>"  class="btn btn-raised btn-info">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
        <div class="row clearfix">
            <div class="col-sm-12 text-center">
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('backend/tema/Footer'); ?>
