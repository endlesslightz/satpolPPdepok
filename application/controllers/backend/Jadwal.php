<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('TugasModel','PetugasModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='jadwal';
        $this->load->view('backend/jadwal/Kalender',$data);
    }

    function kalender() {
        $item = $this->TugasModel->get_tugas();
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
            'petugas'=> $itemnya->nama_lengkap,
            'no_surat'=> $itemnya->no_surat_tugas,
            'isi'=> $itemnya->isi,
            'target'=> $itemnya->target,
             'title'   => $itemnya->sifat,
             'start'   => date("Y-m-d", strtotime($itemnya->tanggal)),
             'className'   =>'b-l b-2x b-primary'
           );
          }
          header('Content-Type: application/json');
          echo json_encode($arraydata, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        // echo('[{title:"kantor",start:"2018-12-12",className:"b-l b-2x b-greensea"},{title:"kantor",start:"2018-12-20",className:"b-l b-2x b-greensea"}]');
    }
}
