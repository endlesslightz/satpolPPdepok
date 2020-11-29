<?php $this->load->view('backend/tema/Header'); ?>

<section class="content" >
    <div class="container-fluid">
        <div class="block-header">
          <h2>Tambah Data Petugas</h2>
          <small class="text-muted">SATPOL PP KOTA DEPOK</small>
        </div>
        <form method="post" action="<?php echo site_url('backend/petugas/add'); ?>" enctype="multipart/form-data">
        <div class="row clearfix">
    			<div class="col-md-12">
    				<div class="card">
    					<div class="header">
    						<h2>Informasi Akun</h2>
    					</div>
    					<div class="body">
                  <div class="row clearfix">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <div class="form-line">
                                  <b>Username</b>
                                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <div class="form-line">
                                  <b>Password</b>
                                  <input type="password" class="form-control" id="pass1" name="password" placeholder="Password" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <div class="form-line">
                                  <b>Ulangi Password</b>
                                  <input type="password" class="form-control" id="pass2" placeholder="Ulangi Password" required>
                              </div>
                              <div class="registrationFormAlert" id="divCheckPasswordMatch">{{pesan}}
                          </div>
                      </div>
                  </div>
              </div>
  				</div>
  			</div>
  		</div>
    </div>
    <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Biodata Petugas</h2>
					</div>
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Nama Lengkap</b>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>NIP</b>
                                        <input type="text" class="form-control" placeholder="Nomor Induk Pegawai" name="NIP" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                      <b>NPWP</b>
                                        <input type="text" class="form-control" placeholder="Nomor Pokok Wajib Pajak" name="NPWP">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Tempat Lahir</b>
                                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                      <b>Tanggal Lahir</b>
                                        <input type="text" class="datepicker form-control" id="datepick" placeholder="Tanggal Lahir" name="tanggal_lahir" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group drop-custum">
                                  <b>Jenis Kelamin</b>
                                    <select name="jenis_kelamin" class="form-control show-tick" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                      <b>Nomor Telepon</b>
                                        <input type="text" class="form-control" placeholder="No Telepon" name="telepon" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <div class="form-line">
                                    <b>Alamat</b>
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" >
                                  </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                      <b>Email</b>
                                        <input type="email" class="form-control" placeholder="Email" name="email" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                      <b>Jabatan</b>
                                        <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group drop-custum">
                                  <b>Level Akun</b>
                                    <select name="level" class="form-control show-tick">
                                        <option value="standar">Standar</option>
                                        <option value="admin">Admin</option>
                                        <option value="superadmin">Super Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group drop-custum">
                                  <b>Unit Kerja</b>
                                    <select name="unit" class="form-control show-tick">
                                        <option value="Pelaksana Tugas">Pelaksana Tugas</option>
                                        <option value="Koordinator Jabatan Fungsional">Koordinator Jabatan Fungsional</option>
                                        <option value="Koordinator Seksi">Koordinator Seksi</option>
                                        <option value="Koordinator Bidang">Koordinator Bidang</option>
                                        <option value="Koordinator Sub Bagian">Koordinator Sub Bagian</option>
                                        <option value="Koordinator Sekretariat">Koordinator Sekretariat</option>
                                        <option value="Komando Utama">Komando Utama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
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
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-raised btn-primary waves-effect" disabled>Submit</button>
                                <a href="<?php echo site_url('backend/petugas'); ?>" class="btn btn-raised">Cancel</a>
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
