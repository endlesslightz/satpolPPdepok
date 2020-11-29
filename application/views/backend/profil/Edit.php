<?php $this->load->view('backend/tema/Header'); ?>
<?php
foreach($karyawan as $item){
    $nama = $item->nama_lengkap;
    $username =  $item->username;
    $password =   $item->password;
    $email =   $item->email;
    $alamat =   $item->alamat;
    $telepon =   $item->telepon;
    $tanggal_lahir =   $item->tanggal_lahir;
    $tempat_lahir =   $item->tempat_lahir;
    $jabatan =   $item->jabatan;
    $NPWP =   $item->NPWP;
    $gambar =   $item->gambar;
    $jenis_kelamin =   $item->jenis_kelamin;
    $level =   $item->hak_akses;
    $id_petugas =   $item->id_petugas;
  }
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Data Pegawai Satpol PP</h2>
            <small class="text-muted">Edit Profil</small>
        </div>
        <form method="post" action="<?php echo site_url('backend/profil/update'); ?>" enctype="multipart/form-data">
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
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <div class="form-line">
                                  <b>Password</b>
                                  <input type="password" class="form-control" id="pass1" name="password" placeholder="Password" required>
                                  <input type="hidden" name="passwordlama" value="<?php echo $password; ?>">
                                  <input type="hidden" name="id_petugas" value="<?php echo $id_petugas; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <div class="form-line">
                                  <b>Ulangi Password</b>
                                  <input type="password" class="form-control" id="pass2" placeholder="Confirm Password" required>
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
						<h2>Biodata Pegawai</h2>
					</div>
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Nama Lengkap</b>
                                        <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Tempat Lahir</b>
                                        <input type="text" class="form-control" id="tempat_lahir" readonly placeholder="Tempat Lahir" name="tempat_lahir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Tanggal Lahir</b>
                                        <input type="text" class="datepicker form-control" readonly id="datepick" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group drop-custum">
                                    <b>Jenis Kelamin</b>
                                    <select name="jenis_kelamin" readonly class="form-control show-tick" required>
                                        <option value="L" <?php if($jenis_kelamin=='L') { echo 'selected'; } ?>>Laki-laki</option>
                                        <option value="P" <?php if($jenis_kelamin=='P') { echo 'selected'; } ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Nomor Telepon</b>
                                        <input type="text" class="form-control" id="telepon" readonly placeholder="No Telepon" name="telepon" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <div class="form-line">
                                      <b>Alamat</b>
                                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
                                  </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Email</b>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Nomor Pokok Wajib Pajak</b>
                                        <input type="text" class="form-control" id="NPWP" readonly placeholder="No. NPWP" name="NPWP">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <b>Jabatan</b>
                                        <input type="text" class="form-control" id="jabatan" readonly placeholder="Jabatan" name="jabatan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group drop-custum">
                                    <b>Level Akun</b>
                                    <select readonly name="level" class="form-control show-tick">
                                        <option value="admin" <?php if($level=='admin') { echo 'selected'; } ?>>Admin</option>
                                        <option value="standar" <?php if($level=='standar') { echo 'selected'; } ?>>Standar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    <div class="dz-message">
                                        <b>Foto Profil</b>
                                        <br>
                                        <?php if($gambar==''){ ?>
                                          <img id="preview" src="<?php echo base_url('assets/backend/images/user.png'); ?>" alt="your image" width="25%"><br>
                                        <?php } else { ?>
                                          <img id="preview" src="<?php echo base_url('assets/upload/profil/'.$gambar); ?>" alt="your image" width="25%"><br>
                                        <?php } ?>

                                        <em>Klik pada gambar untuk upload. Format gambar yang digunakan adalah .PNG, .JPG, .JPEG</em> </div>
                                    <div class="fallback">
                                        <input id="profile" name="profile" type="file"/>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-raised btn-primary waves-effect">Submit</button>
                                <a href="<?php echo site_url('backend/profil?id='.$item->id_petugas); ?>" class="btn btn-raised">Cancel</a>
                            </div>
                        </div>
                    </div>
      				</div>
      			</div>
      		</div>
        </form>
    </div>
</section>
<script>
    document.getElementById('nama_lengkap').value="<?php echo $nama; ?>";
    document.getElementById('username').value="<?php echo $username; ?>";
    document.getElementById('pass1').value="<?php echo $password; ?>";
    document.getElementById('pass2').value="<?php echo $password; ?>";
    document.getElementById('email').value="<?php echo $email; ?>";
    document.getElementById('alamat').value="<?php echo $alamat; ?>";
    document.getElementById('telepon').value="<?php echo $telepon; ?>";
    document.getElementById('datepick').value="<?php echo $tanggal_lahir; ?>";
    document.getElementById('tempat_lahir').value="<?php echo $tempat_lahir; ?>";
    document.getElementById('NPWP').value="<?php echo $NPWP; ?>";
    document.getElementById('jabatan').value="<?php echo $jabatan; ?>";
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
