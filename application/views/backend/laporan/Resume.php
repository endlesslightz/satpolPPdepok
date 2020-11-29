<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Resume Laporan Pegawai</h2>
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
                    <h4 style="color:#007e7e;">Daftar Pegawai</h4>
                    <?php
                    if(!empty($petugas)){ ?>
                      <table class="table" border="0" style="width:100%">
                        <tr>
                          <td width="10%">ID Pegawai</td>
                          <td>Nama</td>
                          <td>Unit Kerja</td>
                          <td>Periode</td>
                          <td>Aksi</td>
                        </tr>
                     <?php
                     $no = 0;
                     foreach ($petugas as $item) { ?>
                       <form class="" action="<?= site_url('backend/laporan/detail') ?>" method="post">
                        <tr>
                          <td width="10%"><?= $item->id_petugas; ?> </td>
                          <td><?= $item->nama_lengkap; ?></td>
                          <td><?= $item->jabatan; ?></td>
                          <td>
                            <select id="periode<?= $no ?>" name="periode" class="periode form-control">
                              <option value="kosong">-- Pilih Periode --</option>
                              <?php
                                foreach($bulan as $key => $value){
                                  if ($item->id_petugas == $key){
                                    foreach($value[0] as $item2){
                                      if($item2->bulannya=='1'){
                                        $nama_bulan = 'Januari';
                                      }else if($item2->bulannya=='2'){
                                        $nama_bulan = 'Februari';
                                      }else if($item2->bulannya=='3'){
                                        $nama_bulan = 'Maret';
                                      }else if($item2->bulannya=='4'){
                                        $nama_bulan = 'April';
                                      }else if($item2->bulannya=='5'){
                                        $nama_bulan = 'Mei';
                                      }else if($item2->bulannya=='6'){
                                        $nama_bulan = 'Juni';
                                      }else if($item2->bulannya=='7'){
                                        $nama_bulan = 'Juli';
                                      }else if($item2->bulannya=='8'){
                                        $nama_bulan = 'Agustus';
                                      }else if($item2->bulannya=='9'){
                                        $nama_bulan = 'September';
                                      }else if($item2->bulannya=='10'){
                                        $nama_bulan = 'Oktober';
                                      }else if($item2->bulannya=='11'){
                                        $nama_bulan = 'November';
                                      }else if($item2->bulannya=='12'){
                                        $nama_bulan = 'Desember';
                                      }
                              ?>
                              <option value="<?= $item2->bulannya."-".$item2->tahunnya ?>"> <?= $nama_bulan." ".$item2->tahunnya ?> </option>
                              <?php
                                    }
                                  }
                                }
                              ?>
                            </select>
                          </td>
                          <td>
                            <input type="hidden" name="id_petugas" value="<?= $item->id_petugas ?>">
                            <input id="btn<?= $no ?>"  type="submit" class="btn btn-raised btn-info btn-sm waves-effect" value="Lihat Laporan">
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
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
