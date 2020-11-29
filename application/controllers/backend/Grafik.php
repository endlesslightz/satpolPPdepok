<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('GrafikModel','PresensiModel','PetugasModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='grafik';
        $data['list']=$this->GrafikModel->get_karyawan();
        $this->load->view('backend/grafik/Tabel',$data);
    }

    function grafik_pres(){
        $data['link']='grafik_pres';
        $data['id']=$this->input->post('id');
        $data['tahun']=$this->input->post('tahun');
        $data['info'] = $this->PetugasModel->get_detail($data['id']);
        $data['petugas'] = $this->PetugasModel->get_petugas();
        // $data['karyawan'] = $this->PresensiModel->get_detail($data['id'],$data['tahun']);
        $this->load->view('backend/grafik/Grafik_pres',$data);
    }

    function grafik_tugas() {
        $data['link']='grafik_tugas';
        // $data['id']=$this->input->get('id');
        $data['tahun']=$this->input->post('tahun');
        $this->load->view('backend/grafik/Grafik_tugas',$data);
    }

    function grafik_perda_dev() {
        $data['link']='grafik_perda';
        $data['id']=$this->input->get('id');
        $data['tahun']=$this->input->get('tahun');
        $data['karyawan'] = $this->TugasModel->get_detail($data['id']);
        $this->load->view('backend/grafik/Data', $data);
    }

    function kanvas(){
      $data['id']=$this->input->get('id');
      $data['tahun']=$this->input->get('tahun');
      $data['karyawan'] = $this->PetugasModel->get_detail($data['id']);
      $this->load->view('backend/grafik/Data', $data);
    }

    function data_pres() {
        $data['id']=$this->input->get('id');
        $data['tahun']=$this->input->get('tahun');
        $item = $this->GrafikModel->get_riwayat_pres($data['id'],$data['tahun']);
        $arraydata = array();
        for ($i = 0; $i < 12 ; $i++) {
          $arraydata[$i] = 0;
          foreach ($item as $itemnya) {
            if($i==date("m",strtotime($itemnya->wkt_masuk))){
              $arraydata[$i] = floatval($itemnya->jumlah);
            }
          }
        }
        echo(json_encode($arraydata));
    }

}
