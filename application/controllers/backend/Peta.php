<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        // $this->load->model(array('GrafikModel','KaryawanModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $this->load->view('backend/map/Peta');
    }

    public function data(){
        $con = mysqli_connect("localhost", "saddang_satpolpp", "satpolppdepok", "saddang_satpolpp");
        // $sql = "SELECT `id_pos`, `nama_pos`, `long`, `lat`, `alamat`, `id_sensor`, sensor.tipe FROM pos INNER JOIN sensor USING (id_pos)";
              $sql = "SELECT * FROM `presensi` t1 INNER JOIN (SELECT MAX(wkt_masuk) masuk FROM presensi GROUP BY id_petugas) t2 ON t1.wkt_masuk=t2.masuk INNER JOIN petugas USING (id_petugas) INNER JOIN admin USING (id_petugas)";
              $result = mysqli_query($con, $sql);
              $pos = array();
              $no = 0;
              while ($rows = mysqli_fetch_array($result)) {
                  $pos[$no][0] = $rows['nama_lengkap'];
                  $pos[$no][1] = $rows['lat'];
                  $pos[$no][2] = $rows['lon'];
                  $pos[$no][3] = $rows['id_petugas'];
                  $pos[$no][4] = 'normal';
                  if ($rows['wkt_keluar']=='0000-00-00 00:00:00') {
                    $pos[$no][5] = 'online';
                    $pos[$no][6] = $rows['wkt_masuk'];
                  } else {
                    $pos[$no][5] = 'offline';
                    $pos[$no][6] = $rows['wkt_keluar'];
                  }
                  if($rows['foto_keluar']=='' && $rows['foto_masuk']==''){
                    $pos[$no][7] = 'profil/'.$rows['gambar'];
                  } else if ($rows['foto_keluar']!='' && $rows['foto_masuk']!=''){
                    $pos[$no][7] = 'presensi/'.$rows['foto_keluar'];
                  } else {
                    $pos[$no][7] = 'presensi/'.$rows['foto_masuk'];
                  }
                  $pos[$no][8] = $rows['lokasi'];
                  $no = $no + 1;
              }
              header('Content-Type: application/json');
              echo json_encode($pos, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    }

    public function data2(){
        $con = mysqli_connect("localhost", "saddang_satpolpp", "satpolppdepok", "saddang_satpolpp");
              $sql = "SELECT * FROM `titik_pantau` ";
              $result = mysqli_query($con, $sql);
              $pos = array();
              $no = 0;
              while ($rows = mysqli_fetch_array($result)) {
                  $pos[$no][0] = $rows['nama_titik'];
                  $pos[$no][1] = $rows['lat'];
                  $pos[$no][2] = $rows['lon'];
                  $pos[$no][3] = $rows['zona'];
                  $pos[$no][4] = $rows['jenis'];
                  $no = $no + 1;
              }
              header('Content-Type: application/json');
              echo json_encode($pos, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    }
}
