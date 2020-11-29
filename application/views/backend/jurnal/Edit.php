<?php $this->load->view('backend/tema/Header'); ?>
<?php
foreach($jurnal as $item){
    $tanggal = $item->tanggal;
    $detail =  $item->detail;
    $tipe =   $item->tipe;
    $jam =   $item->jam;
  }
?>
<section class="content" >
    <div class="container-fluid">
        <div class="block-header">
            <h2>Edit Jurnal</h2>
            <small class="text-muted">Jurnal ID = <?php echo $id; ?></small>
        </div>
        <form method="post" action="<?php echo site_url('backend/jurnal/update'); ?>" enctype="multipart/form-data">
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
                            <option value="kantor" <?php if($tipe=='kantor') { echo 'selected'; } ?>>Harian Kantor</option>
                            <option value="dinas" <?php if($tipe=='dinas') { echo 'selected'; } ?>>Dinas Luar Kota</option>
                            <option value="lembur" <?php if($tipe=='lembur') { echo 'selected'; } ?>>Lembur</option>
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
                              <textarea class="form-control no-resize" rows='4' id="detail" name="detail" ></textarea>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row clearfix">
                  <div class="col-sm-12">
                      <button type="submit" class="btn btn-raised btn-primary waves-effect" >Submit</button>
                      <a href="<?php echo site_url('backend/jurnal?id='.$id_karyawan); ?>" class="btn btn-raised">Cancel</a>
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
    document.getElementById('datepick').value="<?php echo $tanggal; ?>";
    document.getElementById('tipe').value="<?php echo $tipe; ?>";
    document.getElementById('detail').value="<?php echo $detail; ?>";
    document.getElementById('jam').value="<?php echo $jam; ?>";
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
