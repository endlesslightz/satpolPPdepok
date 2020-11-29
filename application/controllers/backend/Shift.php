<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shift extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('ShiftModel', 'PetugasModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='shift';
        $data['shift']=$this->ShiftModel->get_shift();
        $data['regu']=$this->ShiftModel->get_regu();
        $data['petugas']=$this->PetugasModel->get_petugas();
        $this->load->view('backend/shift/List',$data);
    }

    public function update()
    {
      $this->ShiftModel->update_shift($this->input->post());
      redirect(site_url('backend/shift'));
    }

    public function petugas()
    {
      $cek = $this->ShiftModel->cek_petugas($this->input->post());
      if($cek){
        $this->ShiftModel->update_petugas($this->input->post());
      }else{
        $this->ShiftModel->add_petugas($this->input->post());
      }
      redirect(site_url('backend/shift'));
    }


      public function regu()
      {
        $cek = $this->ShiftModel->cek_regu($this->input->post());
        if($cek){
          $this->ShiftModel->update_regu($this->input->post());
        }else{
          $this->ShiftModel->add_regu($this->input->post());
        }
        redirect(site_url('backend/shift'));
      }

    function kalender() {
        $item = $this->ShiftModel->get_shift_regu();
        $arraydata = array();
          foreach ($item as $itemnya) {
            if($itemnya->id_shift=='1'){
              $className= 'b-l b-2x b-greensea';
            } else if($itemnya->id_shift=='2'){
              $className='b-l b-2x b-primary';
            } else {
              $className= 'b-l b-2x b-lightred';
            }
            $arraydata[] = array(
             'title'   => $itemnya->kode.'-Area '.$itemnya->nama_area,
             'start'   => date("Y-m-d", strtotime($itemnya->tanggal)),
             'className'   =>$className,
             'kode'   => $itemnya->kode,
             'area'   => $itemnya->nama_area,
             'shift'   => $itemnya->nama,
           );
          }
          header('Content-Type: application/json');
          echo json_encode($arraydata, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
}
