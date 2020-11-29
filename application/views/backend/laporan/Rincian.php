<?php $this->load->view('backend/tema/Header');
if($bulan=='1'){
  $nama_bulan = 'Januari';
}else if($bulan=='2'){
  $nama_bulan = 'Februari';
}else if($bulan=='3'){
  $nama_bulan = 'Maret';
}else if($bulan=='4'){
  $nama_bulan = 'April';
}else if($bulan=='5'){
  $nama_bulan = 'Mei';
}else if($bulan=='6'){
  $nama_bulan = 'Juni';
}else if($bulan=='7'){
  $nama_bulan = 'Juli';
}else if($bulan=='8'){
  $nama_bulan = 'Agustus';
}else if($bulan=='9'){
  $nama_bulan = 'September';
}else if($bulan=='10'){
  $nama_bulan = 'Oktober';
}else if($bulan=='11'){
  $nama_bulan = 'November';
}else if($bulan=='12'){
  $nama_bulan = 'Desember';
}

$nama_hari = array( "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Resume Laporan Petugas</h2>
          <button class="no-print btn btn-raised btn-info waves-effect" onclick="printDiv('printMe')">Cetak Halaman</button>
      </div>
        <div class="col-md-4">
          <center>
            <button onclick="location.href='<?php echo site_url('backend/laporan'); ?>'" class="btn no-print btn-raised bg-teal waves-effect">Kembali ke Halaman List</button>
          </center>
        </div>
        </div>
      </div>
        <div class="row clearfix" id="printMe">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="body">
                    <center>
                      <h4>LAPORAN PENYELESAIAN KINERJA<br>BULAN <?= strtoupper($nama_bulan)." ".$tahun ?></h4>
                    </center>
                    <?php foreach ($petugas as $item) { ?>
                    <table border="0" width="100%">
                      <tr>
                        <td width="15%">Nama</td>
                        <td>:</td>
                        <td><?= $item->nama_lengkap; ?></td>
                      </tr>
                        <tr>
                          <td>ID Petugs</td>
                          <td>:</td>
                          <td><?= $item->id_petugas; ?></td>
                          <td rowspan="3" width="30%">
                          </td>
                        </tr>
                      <tr>
                        <td>Pangkat</td>
                        <td>:</td>
                        <td><?= $item->jabatan; ?></td>
                      </tr>
                      <tr>
                        <td>Unit Kerja</td>
                        <td>:</td>
                        <td><?= $item->unit_kerja; ?></td>
                      </tr>
                    </table>
                    <hr>
                    <?php
                    }
                    if(!empty($petugas)){ ?>
                      <table id="list2" class="table" border="0">
                        <thead>
                        <tr>
                          <th>No</td>
                          <th>Hari/Tanggal</th>
                          <th>Waktu</th>
                          <th>Lokasi</th>
                          <th width="25%">Uraian Kerja</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 0;
                          foreach($rincian as $item){
                          $no++;
                          ?>
                        <tr>
                           <td><?= $no ?></td>
                           <td><?= $nama_hari[date("w", strtotime($item->waktu))].", ".date("d F Y",strtotime($item->waktu)) ?></td>
                           <td><?= date("H:i:s",strtotime($item->waktu)) ?></td>
                           <td><?= $item->lokasi ?></td>
                           <td><?= $item->keterangan ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                            <tr>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td><br><br>
                                   Mengetahui<br>
                                   Kepala Satuan Polisi Pamong Praja Kota Depok<br><br><br>
                                   <b><u>N. Lienda Ratnanurdianny, S.H., M.Hum</u><br>
                                   NIP. 1970012719980320004</b>
                                 </br>
                               </td>
                           </tr>
                      </tfoot>
                  </table>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
