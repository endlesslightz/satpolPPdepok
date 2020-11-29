<?php $this->load->view('backend/tema/Header');
?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Preview Surat Tugas <button type="button" name="button" class="btn btn-info btn-raised" onclick="printDiv('preview')">Cetak</button> </h2>
      </div>
        <div class="col-md-4">
          <center>
          </center>
        </div>
        </div>
      </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card" id="preview">
                  <div class="body" style="padding-left:50px">

                    <?php foreach ($rincian as $item) { ?>
                      <center>
                      <div class='col-md-9'>
                        <table>
                          <tr>
                            <td rowspan="3"> <img src="<?php echo base_url('assets/login/images/logodepok.png'); ?>" alt="" width="100px"> </td>
                            <td><center><h3> PEMERINTAH KOTA DEPOK </h3></center></td>
                          </tr>
                          <tr>
                            <td><center><h1>SATUAN POLISI PAMONG PRAJA</h1></center></td>
                          </tr>
                          <tr>
                            <td><center><p>Jl. Margonda Raya No 54 Depok 16431 Jawa Barat<br>Telp (021)7762959 Fax (021)77204217 Depok 16431</p></center></td>
                          </tr>
                        </table>
                      </div>
                      <hr>
                      <u>SURAT PERINTAH</u><br>
                      <?= $item->no_surat_tugas ?><br>
                    </center>
                    <p>Untuk kepentingan dinas, yang bertanda tangan di bawah ini :
                    <br>
                    <table width="70%">
                      <tr>
                        <td  width="20%">Nama</td>
                        <td>:</td>
                        <td>N LIENDA RATNANURDIANNY, SH, M.Hum</td>
                      </tr>
                      <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>197001271998032004</td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>Kepala Satuan Polisi Pamong Praja Kota Depok</td>
                      </tr>
                    </table>
                    </p>
                    <p>Memerintahkan kepada :<br>
                      <table width="70%">
                        <tr>
                          <td  width="20%">Nama</td>
                          <td>:</td>
                          <td><?= $item->nama_lengkap ?></td>
                        </tr>
                        <tr>
                          <td>NIP</td>
                          <td>:</td>
                          <td><?= $item->NIP ?></td>
                        </tr>
                        <tr>
                          <td>Jabatan</td>
                          <td>:</td>
                          <td><?= $item->jabatan ?></td>
                        </tr>
                      </table></p>
                    <?php } ?>
                    <p>Untuk :<br>
                    <?= $item->isi ?><br>
                    Demikian surat tugas ini, untuk dilaksanakan dengan penuh rasa tanggung jawab.
                    </p>
                    <br>
                    <table width="40%" style="float:right">
                      <tr>
                        <td>Ditetapkan di</td>
                        <td>:</td>
                        <td>Depok</td>
                      </tr>
                      <tr>
                        <td>Pada tanggal</td>
                        <td>:</td>
                        <td><?php echo date("d F Y",strtotime($item->tanggal));  ?></td>
                      </tr>
                      <tr>
                        <td colspan=3>Kepala Satuan Polisi Pamong Praja Kota Depok</td>
                      </tr>
                      <tr>
                        <td colspan=3>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan=3>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan=3>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan=3>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan=3><u>N LIENDA RATNANURDIANNY, SH, M.Hum</u></td>
                      </tr>
                      <tr>
                        <td colspan=3>NIP. 197001271998032004</td>
                      </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php $this->load->view('backend/tema/Footer'); ?>
