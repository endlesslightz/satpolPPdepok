<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Pengelolaan Shift dan Regu Pegawai</h2>
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
                    <h4 style="color:#007e7e;">Edit Shift</h4>
                    <?php
                    if(!empty($shift)){ ?>
                      <table class="table" border="0" style="width:100%; margin-bottom:0px !important;">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Jenis Shift</th>
                          <th>Jam Mulai</th>
                          <th>Jam Selesai</th>
                          <th>Toleransi Keterlambatan (menit)</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                     <?php
                     $no = 1;
                     foreach ($shift as $item) {
                           $mulai[$no] = $item->mulai;
                           $selesai[$no] = $item->selesai;
                           $toleransi[$no] = $item->toleransi;
                       ?>
                       <form class="form-group" action="<?= site_url('backend/shift/update') ?>" method="post">
                        <tr>
                          <td><?= $item->id_shift; ?> </td>
                          <td><?= $item->nama; ?></td>
                          <td>
                            <div class="md-form">
                              <input placeholder="Selected time" type="text" id="mulaipicker<?= $no ?>" name="mulai" class="form-control timepicker">
                            </div></td>
                          <td>
                            <div class="md-form">
                              <input placeholder="Selected time" type="text" id="selesaipicker<?= $no ?>" name="selesai" class="form-control timepicker">
                            </div>
                          </td>
                          <td><input type="text" id="toleransi<?= $no ?>" name="toleransi" class="form-control" /></td>
                          <td>
                            <input type="hidden" name="id_shift" value="<?= $item->id_shift ?>">
                            <input id="btn<?= $no ?>"  type="submit" class="btn btn-raised btn-info btn-sm waves-effect" value="Ubah Rincian Shift">
                           </td>
                        </tr>
                      </form>
                        <?php
                        $no++;
                        } ?>
                      </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="body">
                      <h4 style="color:#007e7e;">Penetapan Shift dan Lokasi</h4>
                      <form class="" action="<?php echo site_url('backend/shift/regu'); ?>" method="post">
                      <table height="240px" width="100%">
                        <tr>
                          <td>Nama Regu</td>
                          <td>:</td>
                          <td>
                            <select class="form-control" name="kode_regu">
                              <option value="1A">Regu 1-A</option>
                              <option value="1B">Regu 1-B</option>
                              <option value="1C">Regu 1-C</option>
                              <option value="2A">Regu 2-A</option>
                              <option value="2B">Regu 2-B</option>
                              <option value="2C">Regu 2-C</option>
                              <option value="3A">Regu 3-A</option>
                              <option value="3B">Regu 3-B</option>
                              <option value="3C">Regu 3-C</option>
                              <option value="4A">Regu 4-A</option>
                              <option value="4B">Regu 4-B</option>
                              <option value="4C">Regu 4-C</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Shift</td>
                          <td>:</td>
                          <td>
                              <select class="form-control" name="shift">
                                <option value="0">Normal</option>
                                <option value="1">Pagi</option>
                                <option value="2">Sore</option>
                                <option value="3">Malam</option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Area Lokasi</td>
                          <td>:</td>
                          <td>
                                <select class="form-control" name="area">
                                  <option value="1">Barat</option>
                                  <option value="2">Tengah</option>
                                  <option value="3">Timur</option>
                                </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Tanggal</td>
                          <td>:</td>
                          <td><input type="text" name="tanggal" id="datepick"/>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"><button class="btn btn-raised btn-success">Kirim Data</button></td>
                        </tr>
                      </table>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="body">
                      <h4 style="color:#007e7e;">Penetapan Kelompok Regu</h4>
                      <form class="" action="<?php echo site_url('backend/shift/petugas'); ?>" method="post">
                      <table height="240px" width="100%">
                        <tr>
                          <td>Nama Pegawai</td>
                          <td>:</td>
                          <td>
                                <select class="form-control" name="id_petugas">
                                  <?php foreach ($petugas as $item){ ?>

                                  <option value="<?= $item->id_petugas ?>"><?= $item->nama_lengkap ?></option>
                                <?php } ?>
                                </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Regu</td>
                          <td>:</td>
                          <td>
                            <select class="form-control" name="kode_regu">
                              <option value="1A">Regu 1-A</option>
                              <option value="1B">Regu 1-B</option>
                              <option value="1C">Regu 1-C</option>
                              <option value="2A">Regu 2-A</option>
                              <option value="2B">Regu 2-B</option>
                              <option value="2C">Regu 2-C</option>
                              <option value="3A">Regu 3-A</option>
                              <option value="3B">Regu 3-B</option>
                              <option value="3C">Regu 3-C</option>
                              <option value="4A">Regu 4-A</option>
                              <option value="4B">Regu 4-B</option>
                              <option value="4C">Regu 4-C</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"><button class="btn btn-raised btn-success">Kirim data</button></td>
                        </tr>
                      </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
          <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card">
                  <div class="body">
                    <h4 style="color:#007e7e;">Kalender Shift Regu</h4>
                    <div id="calendar"></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card">
                  <div class="body">
                    <h4 style="color:#007e7e;">Tabel Regu</h4>
                    <table id="regu" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Regu</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $idx = 1;
                        foreach ($regu as $item){ ?>
                          <tr>
                            <td><?= $idx ?></td>
                            <td><?= $item->nama_lengkap ?></td>
                            <td><?= $item->kode ?></td>
                          </tr>
                        <?php $idx++; } ?>
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
        </div>
	</div>
</section>

<script>
    document.getElementById('mulaipicker1').value="<?php echo $mulai[1]; ?>";
    document.getElementById('mulaipicker2').value="<?php echo $mulai[2]; ?>";
    document.getElementById('mulaipicker3').value="<?php echo $mulai[3]; ?>";
    document.getElementById('mulaipicker4').value="<?php echo $mulai[4]; ?>";
    document.getElementById('selesaipicker1').value="<?php echo $selesai[1]; ?>";
    document.getElementById('selesaipicker2').value="<?php echo $selesai[2]; ?>";
    document.getElementById('selesaipicker3').value="<?php echo $selesai[3]; ?>";
    document.getElementById('selesaipicker4').value="<?php echo $selesai[4]; ?>";
    document.getElementById('toleransi1').value="<?php echo $toleransi[1]; ?>";
    document.getElementById('toleransi2').value="<?php echo $toleransi[2]; ?>";
    document.getElementById('toleransi3').value="<?php echo $toleransi[3]; ?>";
    document.getElementById('toleransi4').value="<?php echo $toleransi[4]; ?>";
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
