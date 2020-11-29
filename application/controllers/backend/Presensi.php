<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('PresensiModel'));
        // if ($this->session->userdata('nama')=='') {
        //     redirect(site_url());
        // }
    }

    public function index()
    {
      $data['link']='presensi';
      $data['list']=$this->PresensiModel->get_list();
      // $jurnal = $this->JurnalModel->get_id_karyawan($this->input->post('id'));
      // $this->session->set_flashdata('sukses','Data jurnal berhasil diperbarui');
      $this->load->view('backend/presensi/List',$data);
    }

    public function rincian()
    {
      $data['link']='presensi';
      $data['id']=$this->input->get('id');
      $data['rincian']=$this->PresensiModel->get_riwayat($data['id']);
      $data['petugas']=$this->PresensiModel->get_petugas($data['id']);
      $this->load->view('backend/presensi/Rincian',$data);
    }

    function kalender() {
        $data['id']=$this->input->get('id');
        $item = $this->PresensiModel->get_riwayat($data['id']);
        $arraydata = array();
          foreach ($item as $itemnya) {
            // if($itemnya->tipe=='kantor'){
            //   $className= 'b-l b-2x b-greensea';
            // } else if($itemnya->tipe=='dinas'){
            //   $className='b-l b-2x b-primary';
            // } else {
            //   $className= 'b-l b-2x b-lightred';
            // }
            $arraydata[] = array(
             'title'   => 'Hadir',
             'start'   => date("Y-m-d", strtotime($itemnya->wkt_masuk)),
             'className'   =>'b-l b-2x b-primary'
           );
          }
          header('Content-Type: application/json');
          echo json_encode($arraydata, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        // echo('[{title:"kantor",start:"2018-12-12",className:"b-l b-2x b-greensea"},{title:"kantor",start:"2018-12-20",className:"b-l b-2x b-greensea"}]');
    }

    public function masuk()
    {
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
        $this->PresensiModel->masuk($data);
        echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        // $this->load->view('backend/jurnal/Tambah',$data);
        // echo $data['id_petugas'] ;
        // return "success";
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
        $this->PresensiModel->keluar($data);
        echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        // $this->load->view('backend/jurnal/List',$data);
        // return "success";
    }

    public function coba(){
      $this->load->view('backend/presensi/Coba');
    }

}
