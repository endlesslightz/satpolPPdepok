<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('PresensiModel','PetugasModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='laporan';
        $data['petugas'] = $this->PetugasModel->get_petugas();
        $bulan = array();
        foreach ($data['petugas'] as $item) {
          $bulan[$item->id_petugas][]= $this->PetugasModel->get_bulan($item->id_petugas);
        }
        $data['bulan']=$bulan;
        $this->load->view('backend/laporan/Resume',$data);
    }

    public function all()
    {
      $data['link']='laporan';
      // $data['petugas'] = $this->PetugasModel->get_petugas();
      // $bulan = array();
      $data['list']=$this->PresensiModel->get_laporan_all();
      $this->load->view('backend/laporan/Laporan',$data);
    }

    public function detail()
    {
        if($this->input->post('periode')=='kosong'){
          redirect(site_url('/backend/laporan'));
        }
        $data['link']='laporan';
        $waktu = explode('-', $this->input->post('periode'));
        $data['bulan'] = $waktu[0];
        $data['tahun'] = $waktu[1];
        $data['petugas'] = $this->PetugasModel->get_detail($this->input->post('id_petugas'));
        $data['rincian'] = $this->PresensiModel->get_log($data['bulan'],$data['tahun'],$this->input->post('id_petugas'));
        // print_r($data['rincian']);
        $this->load->view('backend/laporan/Rincian',$data);
    }
}
