<?php $this->load->view('backend/tema/Header'); ?>

<section class="content" >
    <div class="container-fluid">
        <div class="block-header">
            <h2>Foto Pekerjaan</h2>
            <small class="text-muted">Foto Pekerjaan PT. Sartika Mitrasejati</small>
        </div>
        <form method="post" action="<?php echo site_url('backend/galeri/add'); ?>" enctype="multipart/form-data">
        <div class="row clearfix">
    			<div class="col-lg-12 col-md-12 col-sm-12">
    				<div class="card">
    					<div class="header">
    						<h2>Informasi Foto</h2>
    					</div>
    					<div class="body">
                  <div class="row clearfix">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <div class="form-line">
                                  <b>Judul Foto</b>
                                  <input type="text" class="form-control" name="judul" placeholder="Judul Foto" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <div class="form-line">
                                  <b>Deskripsi Foto</b>
                                  <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Foto" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <div class="form-line">
                              <div class="dz-message">
                                <b>Foto Pekerjaan</b><br>
                                  <img id="preview" src="<?php echo base_url('assets/backend/images/foto.png'); ?>" alt="foto pekerjaan" width="30%"><br>
                                  <em>Klik pada gambar untuk upload. Format gambar yang digunakan adalah .PNG, .JPG, .JPEG. Ukuran < 1 MB</em> </div>
                              <div class="fallback">
                                  <input type="hidden" name="id_karyawan" value="<?= $this->session->userdata('id_karyawan'); ?>">
                                  <input id="foto" name="foto" type="file"/>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <button type="submit" id="submit" class="btn btn-raised btn-primary waves-effect">Submit</button>
                          <a href="<?php echo site_url('backend/galeri'); ?>" class="btn btn-raised">Cancel</a>
                      </div>
                    </div>
                  </div>
        				</div>
        			</div>
        		</div>
        </form>
    </div>
</section>

<?php $this->load->view('backend/tema/Footer'); ?>
