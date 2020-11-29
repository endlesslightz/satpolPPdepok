<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row clearfix">
        <div class="col-md-8">
          <h2>Resume Jurnal Karyawan</h2>
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
                    <h4 style="color:#007e7e;">Daftar Jurnal Karyawan</h4>
                    <?php foreach ($karyawan as $item) { ?>
                    <table border="0" width="100%">
                      <tr>
                        <td>ID karyawan</td>
                        <td>:</td>
                        <td><?php echo $item->id_karyawan; ?></td>
                        <td rowspan="4" width="20%"><button onclick="location.href='<?php echo site_url('backend/resume/'); ?>'" class="btn  btn-raised bg-teal btn-block waves-effect">Kembali ke Halaman Resume</button>
</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $item->nama_lengkap; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $item->email; ?></td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?php echo $item->jabatan; ?></td>
                      </tr>
                    </table>
                    <hr>
                    <?php
                    }
                    if(!empty($karyawan)){ ?>
                      <table id="list" class="table" border="0">
                        <thead>
                        <tr>
                          <th>No.</td>
                          <th>Waktu </th>
                          <th>Rincian</th>
                        </tr>
                      </thead>
                      <tbody>
                   <?php
                   $no = 0;
                   foreach ($list as $item) {
                     $no++; ?>
                     <tr>
                        <td width="20%"><?php echo $no; ?> </td>
                        <td><?php echo date("F Y",strtotime($item->waktu)); ?></td>
                        <td><button onclick="location.href='<?php echo site_url('backend/resume/detail?id_karyawan='.$item->id_karyawan.'&bulan='.date("m",strtotime($item->waktu)).'&tahun='.date("Y",strtotime($item->waktu))); ?>'" class="btn btn-raised btn-info  btn-sm waves-effect">Detail</button>
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
<?php $this->load->view('backend/tema/Footer'); ?>
