<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktualisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
				header('Access-Control-Allow-Origin: *');
				header('Access-Control-Allow-Credentials: true');
				header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
				header('Access-Control-Allow-Headers:Content-Type, token, Content-Length, X-Requested-With, *');
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('AktualisasiModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='aktualisasi';
        $tahun = $this->input->get('tahun');
        $data['tahun'] = $tahun;
        $data['misi'] = $this->AktualisasiModel->get_aktualisasi($tahun,'A');
        $data['B1a'] = $this->AktualisasiModel->get_aktualisasi($tahun,'B1a');
        $data['B1b'] = $this->AktualisasiModel->get_aktualisasi($tahun,'B1b');
        $data['B1c'] = $this->AktualisasiModel->get_aktualisasi($tahun,'B1c');
        $data['B2a'] = $this->AktualisasiModel->get_aktualisasi($tahun,'B2a');
        $data['B2b'] = $this->AktualisasiModel->get_aktualisasi($tahun,'B2b');
        $this->load->view('backend/aktualisasi/List',$data);
    }

    public function misi(){
      $this->AktualisasiModel->update_misi($this->input->post());
      redirect('backend/aktualisasi?tahun='.$this->input->post('tahun'));
    }

    public function sasaran(){
      $this->AktualisasiModel->update_sasaran($this->input->post());
      redirect('backend/aktualisasi?tahun='.$this->input->post('tahun'));
    }
}
