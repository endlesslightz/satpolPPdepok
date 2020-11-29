<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Daftar Penugasan </h2>
      </div>
        <div class="col-md-4">
          <center>
          </center>
        </div>
        </div>
      </div>
      <?php if($this->session->flashdata('sukses')!=''){ ?>
        <div class="alert bg-green alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Surat Tugas berhasil diperbarui!
      </div>
      <?php } ?>
        <div class="row clearfix js-sweetalert">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="body">
                    <h4 style="color:#007e7e;">Tabel Penugasan</h4>
                    <?php
                    if(!empty($list)){ ?>
                      <table class="table" id="list" border="0" style="width:100%">
                        <thead>
                        <tr>
                          <th width="10%">Nomor Tugas</th>
                          <th>Tanggal</th>
                          <th>Sifat</th>
                          <th>Petugas</th>
                          <th>Isi</th>
                          <th>Target</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($list as $item) { ?>
                      <tr>
                          <td><?= $item->no_surat_tugas; ?> </td>
                          <td><?= ($item->tanggal!='') ? date("d F Y",strtotime($item->tanggal)) : ' - ' ; ?></td>
                          <td><?= $item->sifat; ?></td>
                          <td><?= $item->nama_lengkap; ?></td>
                          <td><?= $item->isi; ?></td>
                          <td><?= ($item->target!='') ? date("d F Y",strtotime($item->target)) : ' - ' ; ?></td>
                        <td>
                        <button onclick="location.href='<?= site_url('backend/tugas/cetak?id='.$item->id_tugas); ?>'" class="btn btn-raised btn-success  btn-sm waves-effect">Cetak</button>
                        <button onclick="location.href='<?= site_url('backend/tugas/edit?id='.$item->id_tugas); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Edit</button>
                        <button class="btn btn-raised btn-danger btn-sm" data-type="tugas" id="<?= $item->id_tugas ?>">Hapus Data</buton>
</td>
                      </tr>
                        <?php } ?>
                      </tbody>
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
</script>
<?php $this->load->view('backend/tema/Footer'); ?>
