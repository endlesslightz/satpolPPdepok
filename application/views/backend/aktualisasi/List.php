<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>HALAMAN AKTUALISASI ADAPANTAI TAHUN <?= $tahun ?></h2>
            <!-- <small class="text-muted">Welcome to Swift application</small> -->
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="header">
                    <div class="row">
                      <div class="col-md-2">
                        Pilih Tahun :
                      </div>
                      <div class="col-md-3">
                        <select class="form-control" id="tahun" name="tahun">
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                        </select>
                      </div>
                      <div class="col-md-7">
                        <button type="button" class="btn btn-sm btn-success btn-raised waves-effect" name="button" id="btn">Pilih</button>
                      </div>
                    </div>
                  </div>
                  <div class="body">
                    <?php foreach($misi as $item) {
                      $Ap1 = $item->p1;
                      $Ap2 = $item->p2;
                      $Atw1 = $item->tw1;
                      $Atw2 = $item->tw2;
                      $Atw3 = $item->tw3;
                      $Atw4 = $item->tw4;
                      ?>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#misi">MISI</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sasaran">SASARAN STRATEGIS</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="misi">
                          <form  class="form-group" action="aktualisasi/misi" method="post">
                            <input type="hidden" name="tahun" value="<?php echo $this->input->get('tahun'); ?>">
                            <table class="table" >
                            <tbody>
                              <tr>
                                <td width=20%><b>Nama</b></td>
                                <td>:</td>
                                <td>Meningkatkan Kualitas Pelayanan Publik yang Profesional dan Transparan</td>
                              </tr>
                              <tr>
                                <td><b>Formula</b></td>
                                <td>:</td>
                                <td>
                                  Jumlah titik / kasus pelanggaran PERDA yang diselesaikan DIBAGI kasus yang dilaporkan
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <h3>TARGET</h3>
                          <table class="table" >
                            <tbody>
                              <tr>
                                <td width=20%>P1</td>
                                <td>:</td>
                                <td>
                                  <input type="text" id="Ap1" name="Ap1" class="form-control" />
                                </td>
                              </tr>
                              <tr>
                                <td>P2</td>
                                <td>:</td>
                                <td>
                                  <input type="text" id="Ap2" name="Ap2" class="form-control" />
                                </td>
                              </tr>
                              <tr>
                                <td>Persentase</td>
                                <td>:</td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                    $persen = ($item->p1/$item->p2)*100;
                                  } else {
                                    $persen = 0;
                                  }
                                  echo number_format((float)$persen, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>

                          <h3>REALISASI</h3>
                          <table class="table" >
                            <thead>
                              <tr>
                                <th colspan="2">Kode</th>
                                <th>Jumlah</th>
                                <th>Persentase</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td width=20%>Triwulan 1</td>
                                <td>:</td>
                                <td>
                                  <input type="text" id="Atw1" name="Atw1" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                    $persentw1 = ($item->tw1/$item->p2)*100;
                                  } else {
                                    $persentw1 = 0;
                                  }
                                  echo number_format((float)$persentw1, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Triwulan 2</td>
                                <td>:</td>
                                <td>
                                  <input type="text" id="Atw2" name="Atw2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw2 = ($item->tw2/$item->p2)*100;
                                } else {
                                  $persentw2 = 0;
                                }
                                  echo number_format((float)$persentw2, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Triwulan 3</td>
                                <td>:</td>
                                <td>
                                  <input type="text" id="Atw3" name="Atw3" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw3 = ($item->tw3/$item->p2)*100;
                                } else {
                                  $persentw3 = 0;
                                }
                                  echo number_format((float)$persentw3, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Triwulan 4</td>
                                <td>:</td>
                                <td>
                                  <input type="text" id="Atw4" name="Atw4" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw4 = ($item->tw4/$item->p2)*100;
                                } else {
                                  $persentw4 = 0;
                                }
                                  echo number_format((float)$persentw4, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <td width=20%><b>SIGMA</b></td>
                                <td>:</td>
                                <td><?= $item->tw1 ?></td>
                                <td>
                                  <?php

                                  $sigma = $persentw1+$persentw2+$persentw3+$persentw4;
                                  echo number_format((float)$sigma, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <button class="btn btn-raised btn-success" name="button">Update Misi</button>
                        </form>
                        </div>
                        <?php } ?>

                        <div role="tabpanel" class="tab-pane" id="sasaran">
                          <h1>1. Meningkatnya Ketertiban Umum</h1>
                          <form class="" action="aktualisasi/sasaran" method="post">
                          <input type="hidden" name="tahun" value="<?php echo $this->input->get('tahun'); ?>">
                          <table class="table">
                            <thead>
                              <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Indikator Sasaran (IKU)</th>
                                <th rowspan="2">Formula</th>
                                <th colspan="3">Target</th>
                                <th colspan="9">Realisasi</th>
                              </tr>
                              <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>%</th>
                                <th>TW1</th>
                                <th>%</th>
                                <th>TW2</th>
                                <th>%</th>
                                <th>TW3</th>
                                <th>%</th>
                                <th>TW4</th>
                                <th>%</th>
                                <th>SIGMA</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($B1a as $item) {
                                  $B1ap1 = $item->p1;
                                  $B1ap2 = $item->p2;
                                  $B1atw1 = $item->tw1;
                                  $B1atw2 = $item->tw2;
                                  $B1atw3 = $item->tw3;
                                  $B1atw4 = $item->tw4;
                                ?>
                              <tr>
                                <td>1. </td>
                                <td>Cakupan Penegakan Perda dan/atau Perwal</td>
                                <td>Jumlah titik/kasus pelanggaran PERDA yang diselesaikan DIBAGI jumlah titik/kasus yang dilaporkan/dipantau</td>
                                <td>
                                   <input type="text" id="B1ap1" name="B1ap1" class="form-control" />
                                </td>
                                <td>
                                  <input type="text" id="B1ap2" name="B1ap2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persen = ($item->p1/$item->p2)*100;
                                } else {
                                  $persen =0;
                                }
                                  echo number_format((float)$persen, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B1atw1" name="B1atw1" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw1 = ($item->tw1/$item->p2)*100;
                                } else {
                                  $persentw1 = 0;
                                }
                                  echo number_format((float)$persentw1, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B1atw2" name="B1atw2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw2 = ($item->tw2/$item->p2)*100;
                                } else {
                                  $persentw2 = 0;
                                }
                                  echo number_format((float)$persentw2, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B1atw3" name="B1atw3" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw3 = ($item->tw3/$item->p2)*100;
                                } else {
                                  $persentw3 = 0;
                                }
                                  echo number_format((float)$persentw3, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B1atw4" name="B1atw4" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw4 = ($item->tw4/$item->p2)*100;
                                } else {
                                  $persentw4 = 0;
                                }
                                  echo number_format((float)$persentw4, 2, '.', '')."%";
                                  ?></td>
                                <td>
                                  <?php
                                  $sigma = $persentw1+$persentw2+$persentw3+$persentw4;
                                  echo number_format((float)$sigma, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                            <?php } foreach ($B1b as $item) {
                                $B1bp1 = $item->p1;
                                $B1bp2 = $item->p2;
                                $B1btw1 = $item->tw1;
                                $B1btw2 = $item->tw2;
                                $B1btw3 = $item->tw3;
                                $B1btw4 = $item->tw4;?>
                              <tr>
                                <td>2. </td>
                                <td>Persentase Kawasan Rawan Trantibum yang Tertib</td>
                                <td>Jumlah titik rawan Trantibum ditertibkan DIBAGI jumlah titik pantau rawan Trantibum</td>
                                <td>
                                  <input type="text" id="B1bp1" name="B1bp1" class="form-control" />
                                </td>
                                <td>
                                  <input type="text" id="B1bp2" name="B1bp2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persen = ($item->p1/$item->p2)*100;
                                } else {
                                  $persen = 0;
                                }
                                  echo number_format((float)$persen, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B1btw1" name="B1btw1" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw1 = ($item->tw1/$item->p2)*100;
                                } else {
                                  $persentw1 = 0;
                                }
                                  echo number_format((float)$persentw1, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B1btw2" name="B1btw2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw2 = ($item->tw2/$item->p2)*100;
                                } else {
                                  $persentw2 = 0;
                                }
                                  echo number_format((float)$persentw2, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B1btw3" name="B1btw3" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw3 = ($item->tw3/$item->p2)*100;
                                } else {
                                  $persentw3 = 0;
                                }
                                  echo number_format((float)$persentw3, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B1btw4" name="B1btw4" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw4 = ($item->tw4/$item->p2)*100;
                                } else {
                                  $persentw4 = 0;
                                }
                                  echo number_format((float)$persentw4, 2, '.', '')."%";
                                  ?></td>
                                <td>
                                  <?php
                                  $sigma = $persentw1+$persentw2+$persentw3+$persentw4;
                                  echo number_format((float)$sigma, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                            <?php } foreach ($B1c as $item) {
                                $B1cp1 = $item->p1;
                                $B1cp2 = $item->p2;
                                $B1ctw1 = $item->tw1;
                                $B1ctw2 = $item->tw2;
                                $B1ctw3 = $item->tw3;
                                $B1ctw4 = $item->tw4;
                                ?>
                              <tr>
                                <td>3. </td>
                                <td>Cakupan Rasio Petugas Linmas</td>
                                <td>Jumlah Satuan Linmas DIBAGI Jumlah RT yang dilakukan pengawasan</td>
                                <td>
                                  <input type="text" id="B1cp1" name="B1cp1" class="form-control" />
                                </td>
                                <td>
                                  <input type="text" id="B1cp2" name="B1cp2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persen = ($item->p1/$item->p2)*100;
                                } else {
                                  $persen = 0;
                                }
                                  echo number_format((float)$persen, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B1ctw1" name="B1ctw1" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw1 = ($item->tw1/$item->p2)*100;
                                } else {
                                  $persentw1 = 0;
                                }
                                  echo number_format((float)$persentw1, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B1ctw2" name="B1ctw2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw2 = ($item->tw2/$item->p2)*100;
                                } else {
                                  $persentw2 =0;
                                }
                                  echo number_format((float)$persentw2, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B1ctw3" name="B1ctw3" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw3 = ($item->tw3/$item->p2)*100;
                                } else {
                                  $persentw3 =0;
                                }
                                  echo number_format((float)$persentw3, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B1ctw4" name="B1ctw4" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw4 = ($item->tw4/$item->p2)*100;
                                } else {
                                  $persentw4 = 0;
                                }
                                  echo number_format((float)$persentw4, 2, '.', '')."%";
                                  ?></td>
                                <td>
                                  <?php
                                  $sigma = $persentw1+$persentw2+$persentw3+$persentw4;
                                  echo number_format((float)$sigma, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>

                          <h1>2. Meningkatnya Ketentraman Masyarakat</h1>
                          <table class="table">
                            <thead>
                              <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Indikator Sasaran (IKU)</th>
                                <th rowspan="2">Formula</th>
                                <th colspan="3">Target</th>
                                <th colspan="9">Realisasi</th>
                              </tr>
                              <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>%</th>
                                <th>TW1</th>
                                <th>%</th>
                                <th>TW2</th>
                                <th>%</th>
                                <th>TW3</th>
                                <th>%</th>
                                <th>TW4</th>
                                <th>%</th>
                                <th>SIGMA</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($B2a as $item) {
                                $B2ap1 = $item->p1;
                                $B2ap2 = $item->p2;
                                $B2atw1 = $item->tw1;
                                $B2atw2 = $item->tw2;
                                $B2atw3 = $item->tw3;
                                $B2atw4 = $item->tw4; ?>
                              <tr>
                                <td>1. </td>
                                <td>Persentase Mitra Kerja Satpol PP yang aktif</td>
                                <td>Jumlah Anggota Mitra Kerja Satpol PP berpartisipasi DIBAGI Jumlah Anggota Mitra Kerja Satpol PP yang disediakan</td>
                                <td>
                                  <input type="text" id="B2ap1" name="B2ap1" class="form-control" />
                                </td>
                                <td>
                                  <input type="text" id="B2ap2" name="B2ap2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persen = ($item->p1/$item->p2)*100;
                                } else {
                                  $persen =0;
                                }
                                  echo number_format((float)$persen, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B2atw1" name="B2atw1" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw1 = ($item->tw1/$item->p2)*100;
                                } else {
                                  $persentw1=0;
                                }
                                  echo number_format((float)$persentw1, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B2atw2" name="B2atw2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw2 = ($item->tw2/$item->p2)*100;
                                } else {
                                  $persentw2=0;
                                }
                                  echo number_format((float)$persentw2, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B2atw3" name="B2atw3" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw3 = ($item->tw3/$item->p2)*100;
                                } else {
                                  $persentw3=0;
                                }
                                  echo number_format((float)$persentw3, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B2atw4" name="B2atw4" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw4 = ($item->tw4/$item->p2)*100;
                                } else {
                                  $persentw4=0;
                                }
                                  echo number_format((float)$persentw4, 2, '.', '')."%";
                                  ?></td>
                                <td>
                                  <?php
                                  $sigma = $persentw1+$persentw2+$persentw3+$persentw4;
                                  echo number_format((float)$sigma, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                            <?php } foreach ($B2b as $item) {
                                $B2bp1 = $item->p1;
                                $B2bp2 = $item->p2;
                                $B2btw1 = $item->tw1;
                                $B2btw2 = $item->tw2;
                                $B2btw3 = $item->tw3;
                                $B2btw4 = $item->tw4; ?>
                              <tr>
                                <td>2. </td>
                                <td>Cakupan Patroli Siaga Ketertiban Umum dan Kententraman Masyarakat</td>
                                <td>Banyaknya kelompok patroli dikalikan 3X patroli dalam sehari DIBAGI banyaknya kelompok kecamatan</td>
                                <td>
                                  <input type="text" id="B2bp1" name="B2bp1" class="form-control" />
                                </td>
                                <td>
                                  <input type="text" id="B2bp2" name="B2bp2" class="form-control" />
                                </td>
                                <td>
                                <?php
                                if($item->p2>0) {
                                  $persen = ($item->p1/$item->p2)*100;
                                } else {
                                  $persen = 0;
                                }
                                  echo number_format((float)$persen, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B2btw1" name="B2btw1" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw1 = ($item->tw1/$item->p2)*100;
                                } else {
                                  $persentw1 = 0;
                                }
                                  echo number_format((float)$persentw1, 2, '.', '')."%";
                                  ?>
                                </td>
                                <td>
                                  <input type="text" id="B2btw2" name="B2btw2" class="form-control" />
                                </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw2 = ($item->tw2/$item->p2)*100;
                                } else {
                                  $persentw2 = 0;
                                }
                                  echo number_format((float)$persentw2, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B2btw3" name="B2btw3" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw3 = ($item->tw3/$item->p2)*100;
                                } else {
                                  $persentw3=0;
                                }
                                  echo number_format((float)$persentw3, 2, '.', '')."%";
                                  ?></td>
                                  <td>
                                    <input type="text" id="B2btw4" name="B2btw4" class="form-control" />
                                  </td>
                                <td>
                                  <?php
                                  if($item->p2>0) {
                                  $persentw4 = ($item->tw4/$item->p2)*100;
                                } else {
                                  $persentw4 = 0;
                                }
                                  echo number_format((float)$persentw4, 2, '.', '')."%";
                                  ?></td>
                                <td>
                                  <?php
                                  $sigma = $persentw1+$persentw2+$persentw3+$persentw4;
                                  echo number_format((float)$sigma, 2, '.', '')."%";
                                  ?>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                            <button class="btn btn-raised btn-success" name="button">Update Sasaran</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<script type="text/javascript">

  document.getElementById('Ap1').value="<?php echo $Ap1; ?>";
  document.getElementById('Ap2').value="<?php echo $Ap2; ?>";
  document.getElementById('Atw1').value="<?php echo $Atw1; ?>";
  document.getElementById('Atw2').value="<?php echo $Atw2; ?>";
  document.getElementById('Atw3').value="<?php echo $Atw3; ?>";
  document.getElementById('Atw4').value="<?php echo $Atw4; ?>";
  document.getElementById('B1ap1').value="<?php echo $B1ap1; ?>";
  document.getElementById('B1ap2').value="<?php echo $B1ap2; ?>";
  document.getElementById('B1atw1').value="<?php echo $B1atw1; ?>";
  document.getElementById('B1atw2').value="<?php echo $B1atw2; ?>";
  document.getElementById('B1atw3').value="<?php echo $B1atw3; ?>";
  document.getElementById('B1atw4').value="<?php echo $B1atw4; ?>";
  document.getElementById('B1bp1').value="<?php echo $B1bp1; ?>";
  document.getElementById('B1bp2').value="<?php echo $B1bp2; ?>";
  document.getElementById('B1btw1').value="<?php echo $B1btw1; ?>";
  document.getElementById('B1btw2').value="<?php echo $B1btw2; ?>";
  document.getElementById('B1btw3').value="<?php echo $B1btw3; ?>";
  document.getElementById('B1btw4').value="<?php echo $B1btw4; ?>";
  document.getElementById('B1cp1').value="<?php echo $B1cp1; ?>";
  document.getElementById('B1cp2').value="<?php echo $B1cp2; ?>";
  document.getElementById('B1ctw1').value="<?php echo $B1ctw1; ?>";
  document.getElementById('B1ctw2').value="<?php echo $B1ctw2; ?>";
  document.getElementById('B1ctw3').value="<?php echo $B1ctw3; ?>";
  document.getElementById('B1ctw4').value="<?php echo $B1ctw4; ?>";
  document.getElementById('B2ap1').value="<?php echo $B2ap1; ?>";
  document.getElementById('B2ap2').value="<?php echo $B2ap2; ?>";
  document.getElementById('B2atw1').value="<?php echo $B2atw1; ?>";
  document.getElementById('B2atw2').value="<?php echo $B2atw2; ?>";
  document.getElementById('B2atw3').value="<?php echo $B2atw3; ?>";
  document.getElementById('B2atw4').value="<?php echo $B2atw4; ?>";
  document.getElementById('B2bp1').value="<?php echo $B2bp1; ?>";
  document.getElementById('B2bp2').value="<?php echo $B2bp2; ?>";
  document.getElementById('B2btw1').value="<?php echo $B2btw1; ?>";
  document.getElementById('B2btw2').value="<?php echo $B2btw2; ?>";
  document.getElementById('B2btw3').value="<?php echo $B2btw3; ?>";
  document.getElementById('B2btw4').value="<?php echo $B2btw4; ?>";
  document.getElementById("btn").onclick = function(){
    var thn = document.getElementById("tahun").value;
    window.location.href = "<?php echo site_url('/backend/aktualisasi?tahun=') ?>"+thn;
    }
</script>
<?php
$this->load->view('backend/tema/Footer');
?>
