<?php $this->load->view('backend/tema/Header'); ?>

<section class="content" >
    <div class="container-fluid">
        <div class="block-header">
            <h2>Tambah Jurnal</h2>
            <small class="text-muted">Karyawan PT. Sartika Mitrasejati</small>
        </div>
        <form method="post" action="<?php echo site_url('backend/jurnal/add'); ?>" enctype="multipart/form-data">
    <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Input Jurnal</h2>
					</div>
					<div class="body">
              <div class="row clearfix">
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="form-line">
                              <b>Tanggal</b>
                              <input type="hidden" value="<?php echo $id; ?>" name="id">
                              <input type="text" class="datepicker form-control" id="datepick" placeholder="Tanggal Jurnal" name="tanggal" required>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group drop-custum">
                      <b>Jenis Pekerjaan</b>
                        <select name="tipe" id="tipe" class="form-control show-tick" required>
                            <option value="kantor">Harian Kantor</option>
                            <option value="dinas">Dinas Luar Kota</option>
                            <option value="lembur">Lembur</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                          <div class="form-line">
                              <b>Jam Lembur</b>
                              <input type="text" class=" form-control" id="jam" placeholder="Jumlah jam" name="jam" readonly>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group">
                          <div class="form-line">
                              <b>Keterangan</b>
                              <!-- <input type="text" class="form-control" id="detail" placeholder="Tulis keterangan Anda secara detail" name="detail" required> -->
                              <textarea class="form-control no-resize" rows='4' name="detail" ></textarea>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row clearfix">

                  <div class="col-sm-12">
                      <button type="submit" class="btn btn-raised btn-primary waves-effect" >Submit</button>
                      <a href="<?php echo site_url('backend/jurnal?id='.$id); ?>" class="btn btn-raised">Cancel</a>
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
