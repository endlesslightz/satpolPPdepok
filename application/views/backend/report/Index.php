<?php $this->load->view('backend/tema/Header'); ?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>HALAMAN REPORT</h2>
            <!-- <small class="text-muted">Welcome to Swift application</small> -->
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="header">
                    <!--  -->
                  </div>
                  <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Pemeriksaan</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Diagnosa</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="home">
						<center><a class="btn btn-sm" target="_blank" href="<?php echo site_url('backend/report/export_rekap_pemeriksaan/'.$year.'/'.$month); ?>"><i class="zmdi zmdi-file-text"></i><span> Export</span></a></center>
                          <table id="pemeriksaan" class="display" >
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>
									<?php 
										if($this->uri->segment(3)=='periode'){
											if($this->uri->segment(5,0)){	
												echo "Tanggal";
											}else{
												echo "Bulan";
											}
										}else{
											echo "Tahun";
										}
									?>
								</th>
                                <th>Jumlah Pemeriksaan</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no = 0;
                                foreach ($pemeriksaan as $item){
									if($this->uri->segment(3)=='periode'){
										if($this->uri->segment(5,0)){
											$link = $item->waktu;
											$periode = str_replace('-','/', $item->waktu);
										}else{
											$link = "<a href='".site_url('backend/report/periode/'.$this->uri->segment(4).'/'.$item->waktu."'>".$this->fungsi->convert_bulan($item->waktu))."</a>";
											$periode = $this->uri->segment(4).'/'.$item->waktu;
										}
									}else{
										$link = "<a href='".site_url('backend/report/periode/'.$item->waktu)."'>".$item->waktu."</a>";
										$periode = $item->waktu;
									}
                                $no++;
								?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $link ?></td>
                                <td><?php echo $item->total; ?> Pemeriksaan</td>
                                <td><a class="btn btn-sm" target="_blank" href="<?php echo site_url('backend/report/export_pemeriksaan/'.$periode); ?>"><i class="zmdi zmdi-file-text"></i><span> Export</span></a></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
						<center><a class="btn btn-sm" target="_blank" href="<?php echo site_url('backend/report/export_diagnosa/'.$year.'/'.$month); ?>"><i class="zmdi zmdi-file-text"></i><span> Export</span></a></center>
                          <table id="diagnosa" class="display" >
                            <thead>
                              <tr>
                                <th rowspan=2>No</th>
                                <th rowspan=2>
								<?php 
									if($this->uri->segment(3)=='periode'){
										if($this->uri->segment(5,0)){	
											echo "Tanggal";
										}else{
											echo "Bulan";
										}
									}else{
										echo "Tahun";
									}
								?>
								</th>
                                <th colspan=<?php echo $list_diagnosa->num_rows(); ?>>Diagnosa</th>
                                <!--th rowspan=2>Aksi</th-->
                              </tr>
							  <tr>
								<?php 
									foreach ($list_diagnosa->result() as $ld){ 
									$total[$ld->id_diagnosa] = 0;
								?>
								<th ><?php echo $ld->kode; ?></th>
								<?php } ?>
							  </tr>
                            </thead>
                            <tbody>
								<?php
								$no = 1;
								foreach ($pemeriksaan as $item){
									if($this->uri->segment(3)=='periode'){
										if($this->uri->segment(5,0)){
											$link = $item->waktu;
											$periode = str_replace('-','/', $item->waktu);
										}else{
											$link = "<a href='".site_url('backend/report/periode/'.$this->uri->segment(4).'/'.$item->waktu."'>".$this->fungsi->convert_bulan($item->waktu))."</a>";
											$periode = $this->uri->segment(4).'/'.$item->waktu;
										}
									}else{
										$link = "<a href='".site_url('backend/report/periode/'.$item->waktu)."'>".$item->waktu."</a>";
										$periode = $item->waktu;
									}
									
									foreach ($list_diagnosa->result() as $ld){ 
										$jumlah[$ld->id_diagnosa] = 0;
									}
									$p = explode('/', $periode);
									if(sizeof($p) == 3){
										$tahun = $p[0];
										$bulan = $p[1];
										$tanggal = $p[2];
									}else if(sizeof($p) == 2){
										$tahun = $p[0];
										$bulan = $p[1];
										$tanggal = '';
									}else if(sizeof($p) == 1){
										$tahun = $p[0];
										$bulan = '';
										$tanggal = '';
									}else{
										$tahun = '';
										$bulan = '';
										$tanggal = '';
									}
									$pemeriksaan2=$this->reportmodel->get_export_pemeriksaan($tahun, $bulan, $tanggal);
									foreach ($pemeriksaan2->result_array() as $row){
										foreach ($diagnosa as $item1) {
											$diag[]=$item1->diagnosa;
										}
										foreach ($tindakan as $item2) {
											$tind[]=$item2->tindakan;
										}
										foreach ($diagnosa as $item3) {
											foreach($gigi as $id_gigi){
												if(get_diag($id_gigi,$row[$id_gigi],$diag) != ''){
													if($item3->id_diagnosa == get_diag($id_gigi,$row[$id_gigi],$diag)){
														$jumlah[$item3->id_diagnosa] += 1;
													}
												}
											}
										}
									}
								?>
								<tr>
									<td><?php echo $no ?></td>
									<td><?php echo $link ?></td>
								<?php
									foreach ($diagnosa as $item4) {
										$total[$item4->id_diagnosa] += $jumlah[$item4->id_diagnosa];
										?><td><?php echo $jumlah[$item4->id_diagnosa]; ?></td><?php
									}
								?>
									<!--td><a class="btn btn-sm" href="<?php echo site_url('backend/report/export_diagnosa/'.$periode); ?>"><i class="zmdi zmdi-file-text"></i><span> Export</span></a></td-->
								</tr>
								<?php
									$no++;
								}
								?>
								<tr>
									<td colspan=2>Total</td>
									<?php
									foreach ($diagnosa as $item4) {
										?><td><?php echo $total[$item4->id_diagnosa]; ?></td><?php
									}
									?>
									<!--td><a class="btn btn-sm" href="<?php echo site_url('backend/report/export_diagnosa/'.$periode); ?>"><i class="zmdi zmdi-file-text"></i><span> Export</span></a></td-->
								</tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php 
function get_diag($id,$index,$diag){
	if ($index!="0-0"){
		$indDiag = explode("-",$index)[0];
		return $indDiag;
	}else{
		return "";
	}
}
$this->load->view('backend/tema/Footer'); 
?>
