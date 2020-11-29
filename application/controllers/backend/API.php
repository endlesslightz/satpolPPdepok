<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('ProfilModel','PresensiModel','adminmodel','StatusModel','PetugasModel','TugasModel','ShiftModel','PantauModel'));
    }

    public function index()
    {

    }

    public function presensi()
    {
      $id = $this->uri->segment(4);
      $data=$this->PresensiModel->get_riwayat($id);
      $json=array();
      foreach($data as $item){
        $json[] = array(
         'id_presensi'   =>  $item->id_presensi,
         'waktu_masuk'   => $item->wkt_masuk,
         'waktu_keluar'  => $item->wkt_keluar,
         'lng' => $item->lon,
         'lat' => $item->lat
        );
      }
      header('Content-Type: application/json');
      echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function profil()
    {
      $id = $this->uri->segment(4);
      $data=$this->ProfilModel->get_detail($id);
      $json=array();
      foreach($data as $item){
        $json[] = array(
         'id_petugas'   =>  $item->id_petugas,
         'nama_lengkap'   => $item->nama_lengkap,
         'tempat_lahir'  => $item->tempat_lahir,
         'tanggal_lahir' => $item->tanggal_lahir,
         'NIP' => $item->NIP,
         'telepon' => $item->telepon,
         'alamat'  => $item->alamat,
         'email' => $item->email,
         'jabatan' => $item->jabatan,
         'gambar' => $item->gambar
        );
      }
      header('Content-Type: application/json');
      echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function masuk(){
        date_default_timezone_set("Asia/Jakarta");
        // $data['link']='presensi';
        // $data['id_petugas'] = $this->input->post('id');
        // $data['wkt_masuk'] = date("Y-m-d H:i:s");
        // $data['lon'] = $this->input->post('lon');
        // $data['lat'] = $this->input->post('lat');
        // $this->PresensiModel->masuk($data);
        $json = json_decode(file_get_contents('php://input'), true);
        $data['id_petugas'] = $json['id'];
        $data['wkt_masuk'] = date("Y-m-d H:i:s");
        $data['lon'] = $json['lon'];
        $data['lat'] = $json['lat'];
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$data['lat'].','.$data['lon'].'&location_type=ROOFTOP&result_type=street_address&key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4';
        $content = file_get_contents($url);

        $json_map = json_decode($content, true);
        if(!empty($json_map['results'][0])){
          $data['lokasi']  = $json_map['results'][0]['formatted_address'];
        } else {
          $data['lokasi']  = 'Tidak Diketahui';
        }
        // $this->PresensiModel->masuk($data);
        // $this->PresensiModel->log($data,$data['wkt_masuk'],'Masuk');
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function coba(){
      $data = $this->input->post();
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function masukv2(){
        date_default_timezone_set("Asia/Jakarta");
        // $data['link']='presensi';
        $data['id_petugas'] = $_POST['id'];
        $data['wkt_masuk'] = date("Y-m-d H:i:s");
        $data['lon'] = $_POST['lon'];
        $data['lat'] = $_POST['lat'];
        // $this->PresensiModel->masuk($data);
        $config = array(
            'upload_path' => "./assets/upload/presensi/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "5048000"
            );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto'))
        {
          $data['foto']= $_FILES['foto']['name'];
        } else {
          $data['foto']= 'kosong';
        }
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$_POST['lat'].','.$_POST['lon'].'&location_type=ROOFTOP&result_type=street_address&key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4';
        $content = file_get_contents($url);
        $json_map = json_decode($content, true);
        if(!empty($json_map['results'][0])){
          $data['lokasi']  = $json_map['results'][0]['formatted_address'];
        } else {
          $data['lokasi']  = 'Tidak Diketahui';
        }
        $this->PresensiModel->masukv2($data);
        $this->PresensiModel->log($data,$data['wkt_masuk'],'Masuk');
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function update(){
        date_default_timezone_set("Asia/Jakarta");
        $json = json_decode(file_get_contents('php://input'), true);
        $data['id_petugas'] = $json['id'];
        $data['wkt'] = date("Y-m-d H:i:s");
        $data['lon'] = $json['lon'];
        $data['lat'] = $json['lat'];
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$data['lat'].','.$data['lon'].'&location_type=ROOFTOP&result_type=street_address&key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4';
        $content = file_get_contents($url);
        $json_map = json_decode($content, true);
        if(!empty($json_map['results'][0])){
          $data['lokasi']  = $json_map['results'][0]['formatted_address'];
        } else {
          $data['lokasi']  = 'Tidak Diketahui';
        }
        $this->PresensiModel->update($data);
        $this->PresensiModel->log($data,$data['wkt'],'Update');
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

   public function keluar()
      {
          $data['link']='presensi';
          $json = json_decode(file_get_contents('php://input'), true);
          $data['id_petugas'] = $json['id'];
          $data['lon'] = $json['lon'];
          $data['lat'] = $json['lat'];
          $data['id_presensi'] = $this->PresensiModel->get_latest_presensi($data['id_petugas']);
          $data['wkt_keluar'] = date("Y-m-d H:i:s");
          $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$data['lat'].','.$data['lon'].'&location_type=ROOFTOP&result_type=street_address&key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4';
          $content = file_get_contents($url);
          if(!empty($json_map['results'][0])){
            $data['lokasi']  = $json_map['results'][0]['formatted_address'];
          } else {
            $data['lokasi']  = 'Tidak Diketahui';
          }
          $this->PresensiModel->keluar($data);
          $this->PresensiModel->log($data, $data['wkt_keluar'],'Keluar');
          header('Content-Type: application/json');
          echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
      }

      public function keluarv2()
         {
             $data['link']='presensi';
             $data['id_petugas'] = $this->input->post('id');
             $data['wkt_masuk'] = date("Y-m-d H:i:s");
             $data['lon'] = $this->input->post('lon');
             $data['lat'] = $this->input->post('lat');
             $data['id_presensi'] = $this->PresensiModel->get_latest_presensi($data['id_petugas']);
             $data['wkt_keluar'] = date("Y-m-d H:i:s");
             $config = array(
                 'upload_path' => "./assets/upload/presensi/",
                 'allowed_types' => "gif|jpg|png|jpeg",
                 'overwrite' => TRUE,
                 'max_size' => "5048000"
                 );
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
             if ($this->upload->do_upload('foto'))
             {
               $data['foto']= $_FILES['foto']['name'];
             } else {
               $data['foto']= 'kosong';
             }
             $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$data['lat'].','.$data['lon'].'&location_type=ROOFTOP&result_type=street_address&key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4';
             $content = file_get_contents($url);
             if(!empty($json_map['results'][0])){
               $data['lokasi']  = $json_map['results'][0]['formatted_address'];
             } else {
               $data['lokasi']  = 'Tidak Diketahui';
             }
             $this->PresensiModel->log($data, $data['wkt_keluar'],'Keluar');
             $this->PresensiModel->keluarv2($data);
             header('Content-Type: application/json');
             echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
         }

    public function auth()
    {
      $json = json_decode(file_get_contents('php://input'), true);
      $auth = $this->adminmodel->authmember($json['uname'], md5($json['pwd']));
      if ($auth == TRUE) {
        $row = $this->adminmodel->get_member_by_uname($json['uname']);
        header('Content-Type: application/json');
        echo json_encode($row, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
      } else {

      }
    }

    public function authv2()
    {
      $json = json_decode(file_get_contents('php://input'), true);
      $auth = $this->adminmodel->authmember($json['uname'], md5($json['pwd']));
      if ($auth == TRUE) {
        $row = $this->adminmodel->get_member_by_uname($json['uname']);
        $this->PresensiModel->firebase($json['reg_id'],$json['uname']);
        header('Content-Type: application/json');
        echo json_encode($row, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
      } else {

      }
    }

    public function laporan()
    {
      $data['id']=$this->input->post('id');
      $data['judul']=$this->input->post('judul');
      $data['deskripsi']=$this->input->post('deskripsi');
      $data['lon']=$this->input->post('lon');
      $data['lat']=$this->input->post('lat');
      $data['mulai']=$this->input->post('mulai');
      $data['selesai']=$this->input->post('selesai');
      // $data['kategori']=$this->input->post('kategori');
      $data['waktu'] = date("Y-m-d H:i:s");
      $config = array(
          'upload_path' => "./assets/upload/laporan/",
          'allowed_types' => "gif|jpg|png|jpeg",
          'overwrite' => TRUE,
          'max_size' => "5048000"
          );
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('foto'))
      {
        $this->PresensiModel->add_laporan($data, $_FILES['foto']['name']);
      } else {
        $this->PresensiModel->add_laporan($data,'wakwau.jpg');
      }
      header('Content-Type: application/json');
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function edit_profil()
    {
        $json = json_decode(file_get_contents('php://input'), true);
        $this->ProfilModel->update_akun_app($json);
        header('Content-Type: application/json');
        echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function edit_firebase()
    {
        $json = json_decode(file_get_contents('php://input'), true);
        $this->ProfilModel->update_firebase($json);
        header('Content-Type: application/json');
        echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }


    public function get_all_petugas()
    {
        $data=$this->PetugasModel->get_petugas();
        $no = 0;
        $array = array();
        foreach($data as $item){
          $array[$no]['id_petugas']=$item->id_petugas;
          $array[$no]['nama_lengkap']=$item->nama_lengkap;
          $array[$no]['nip']=$item->NIP;
          $array[$no]['username']=$item->username;
          $array[$no]['password']=$item->password;
          $array[$no]['gambar']=$item->gambar;
          $array[$no]['alamat']=$item->alamat;
          $array[$no]['telepon']=$item->telepon;
          $array[$no]['email']=$item->email;
          $array[$no]['tempat_lahir']=$item->tempat_lahir;
          $array[$no]['tanggal_lahir']=$item->tanggal_lahir;
          $array[$no]['jabatan']=$item->jabatan;
          $array[$no]['unit_kerja']=$item->unit_kerja;
          $no++;
        }
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function add_tugas()
    {
        $json = json_decode(file_get_contents('php://input'), true);
        $this->TugasModel->insert_tugas($json);
        $reg_id=$this->TugasModel->get_firebase($json['id_petugas']);
        $notification = array();
        $registatoin_ids = $reg_id;
        $arrNotification= array();
        $arrData = array();
        $arrNotification["body"] = $json['sifat'].' - '.date("d F Y",strtotime($json['target']));
        $arrNotification["title"] = "E-Patrol Satpol PP Kota Depok";
        $arrNotification["sound"] = "default";
        $arrNotification["type"] = 1;
        $device_type= "Android";
         $url = 'https://fcm.googleapis.com/fcm/send';
          if($device_type == "Android"){
                $fields = array(
                    'to' => $registatoin_ids,
                    'data' => $arrNotification
                );
          } else {
                $fields = array(
                    'to' => $registatoin_ids,
                    'notification' => $arrNotification
                );
          }
          // Firebase API Key
          $headers = array('Authorization:key=AIzaSyBpeYKfNf612059C_E37zfnPjA0XFYkIKM','Content-Type:application/json');
         // Open connection
          $ch = curl_init();
          // Set the url, number of POST vars, POST data
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Disabling SSL Certificate support temporarly
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
          $result = curl_exec($ch);
          if ($result === FALSE) {
              die('Curl failed: ' . curl_error($ch));
          }
         $result = curl_exec($ch );
        curl_close( $ch );
        header('Content-Type: application/json');
        echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }


    public function get_tugas()
    {
        $json = json_decode(file_get_contents('php://input'), true);
        $data = $this->TugasModel->get_tugas_by_petugas($json);
        $no = 0;
        $array = array();
        foreach($data as $item){
          $array[$no]['nomor_surat']=$item->no_surat_tugas;
          $array[$no]['tanggal']=$item->tanggal;
          $array[$no]['target']=$item->target;
          $array[$no]['sifat']=$item->sifat;
          $array[$no]['isi']=$item->isi;
          $no++;
        }
        header('Content-Type: application/json');
        echo json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function get_online(){
			$data['total_online']=$this->StatusModel->get_jum_online();
      header('Content-Type: application/json');
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function get_latest_laporan(){
			$data['latest_laporan']=$this->StatusModel->get_latest_laporan();
      header('Content-Type: application/json');
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function get_latest_presensi(){
			$data['latest_presensi']=$this->StatusModel->get_latest_presensi();
      header('Content-Type: application/json');
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function get_titik_pantau(){
      $data['titik_pantau']=$this->PantauModel->get_lokasi_all();
      header('Content-Type: application/json');
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function get_shift(){
      $json = json_decode(file_get_contents('php://input'), true);
      $data['nama']=$this->ShiftModel->get_nama($json['id_petugas']);
      $data['regu']=$this->ShiftModel->get_regu_by_nama($json['id_petugas']);
			$data['shift']=$this->ShiftModel->get_shift_petugas($json['id_petugas']);
      header('Content-Type: application/json');
      echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
