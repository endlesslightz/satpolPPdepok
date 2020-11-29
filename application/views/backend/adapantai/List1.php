<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Daftar Titik Penertiban Terintegrasi</h2>
      </div>
        <div class="col-md-4">
          <center>
            <?php if ($this->session->userdata('hak_akses')!='standar') { ?>
            <a href="<?php echo site_url('backend/adapantai/tambah1'); ?>" class="btn btn-raised g-bg-cyan">Tambah Data</a>
            <?php } ?>
           </center>
        </div>
        </div>
      </div>
      <?php if($this->session->flashdata('sukses')!=''){ ?>
        <div class="alert bg-green alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data berhasil diperbarui!
      </div>
      <?php } ?>
        <div class="row clearfix js-sweetalert">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="header">
                    <div class="row">
                      <div class="col-md-6">
                      <h4 style="color:#007e7e;">Tabel Lokasi Penertiban Terintegrasi Tahun <?= $_GET['tahun'] ?></h4>
                    </div>
                  </div>
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
                    <?php
                    if(!empty($list)){ ?>
                      <table class="table" id="adapantai" border="0" style="width:100%">
                        <thead>
                        <tr>
                          <th width="10%">Nomor</th>
                          <th>Tanggal</th>
                          <th>Kegiatan</th>
                          <th>Nama Lokasi</th>
                          <th>Jumlah</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no = 1;
                      $jml = 0;
                       foreach ($list as $item) { ?>
                      <tr>
                          <td><?= $no; ?> </td>
                          <td><?= $item->tanggal; ?></td>
                          <td><?= $item->nama; ?></td>
                          <td><?= $item->lokasi; ?></td>
                          <td><?= $item->jumlah; ?></td>
                        <td>
                        <button onclick="location.href='<?= site_url('backend/adapantai/edit1?id='.$item->id_adapantai); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Edit</button>
                        <button class="btn btn-raised btn-danger btn-sm" data-type="adapantai1" id="<?= $item->id_adapantai ?>">Hapus</buton>
</td>
                      </tr>
                        <?php
                        $no++;
                        $jml = $jml+$item->jumlah;
                      } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="4"><b>JUMLAH TOTAL</b></td>
                          <td colspan="2"><b><?= $jml ?></b></td>
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

<script>
  function konfirmasi(){
    if (window.confirm("Apakah Anda yakin mau menghapus data petugas ini?")) {
        window.location = "<?php echo site_url('backend/tugas/delete/'.$this->uri->segment(4)); ?>";
      }
  }
  document.getElementById("btn").onclick = function(){
    var thn = document.getElementById("tahun").value;
    window.location.href = "<?php echo site_url('/backend/adapantai/ada1?tahun=') ?>"+thn;
    }
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
