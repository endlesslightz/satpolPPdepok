<?php $this->load->view('backend/tema/Header'); ?>
<?php foreach($rincian as $item){
  $id = $item->id_tugas;
  $nomor = $item->no_surat_tugas;
  $sifat = $item->sifat;
  $target = $item->target;
  $petugas = $item->id_petugas;
  $isi = $item->isi;
} ?>

<section class="content" >
    <div class="container-fluid">
        <div class="block-header">
          <h2>Edit Data Penugasan</h2>
          <small class="text-muted">SATPOL PP KOTA DEPOK</small>
        </div>
        <form method="post" action="<?php echo site_url('backend/tugas/update'); ?>" enctype="multipart/form-data">
        <div class="row clearfix">
    			<div class="col-lg-12 col-md-12 col-sm-12">
    				<div class="card">
    					<div class="header">
    						<h2>Detail Tugas</h2>
    					</div>
    					<div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <b>Nomor Surat</b>
                                            <input type="text" class="form-control" id="nomor" placeholder="Nomor Surat Tugas" name="nomor" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <b>Sifat</b>
                                            <select class="form form-control" name="sifat">
                                              <option value="SEGERA">SEGERA</option>
                                              <option value="PENTING">PENTING</option>
                                              <option value="BIASA">BIASA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <b>Target Waktu</b>
                                            <input type="text" class="datepicker form-control" id="datepick" placeholder="Target" name="target" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group drop-custum">
                                      <b>Petugas</b>
                                        <select name="id_petugas" class="form-control show-tick" required>
                                            <?php foreach ($datanya as $items) { ?>
                                              <option value="<?= $items->id_petugas ?>" <?php if($petugas==$items->id_petugas){ echo "selected"; }?> ><?= $items->nama_lengkap ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                        <b>Isi Surat Tugas</b>
                                        <textarea name="isi" id="ckeditor"></textarea>
                                      </div>
                                  </div>
                                </div>
                                <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <div class="dz-message">
                                          <b>Foto Profil</b><br>
                                            <img id="preview" src="<?php echo base_url('assets/backend/images/user.png'); ?>" alt="your image" width="25%"><br>
                                            <em>Klik pada gambar untuk upload. Format gambar yang digunakan adalah .PNG, .JPG, .JPEG</em> </div>
                                        <div class="fallback">
                                            <input id="profile" name="profile" type="file"/>
                                        </div>
                                    </div>
                                </div>
                                </div> -->
                                <div class="col-sm-12">
                                  <input type="hidden" name="id_tugas" value="<?= $id ?>">
                                    <button type="submit" id="submit" class="btn btn-raised btn-primary waves-effect">Submit</button>
                                    <a href="<?php echo site_url('backend/tugas'); ?>" class="btn btn-raised">Cancel</a>
                                </div>
                            </div>
                        </div>
          				</div>
          			</div>
          		</div>
            </form>
        </div>
    </section>
<script type="text/javascript">
  document.getElementById('nomor').value="<?= $nomor ?>";
  document.getElementById('sifat').value="<?= $sifat ?>";
  document.getElementById('ckeditor').value="<?= $isi ?>";
  document.getElementById('datepick').value="<?= $target ?>";
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
