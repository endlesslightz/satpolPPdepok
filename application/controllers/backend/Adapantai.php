<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adapantai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('AdapantaiModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='aktualisasi';
    }

    public function ada1()
    {
      $data['link']='ada1';
      $tahun=$this->input->get('tahun');
      $data['list'] = $this->AdapantaiModel->get_adapantai($tahun,'adapantai1');
      $this->load->view('backend/adapantai/List1',$data);
    }

    public function tambah1()
    {
      $data['link']='ada1';
      $this->load->view('backend/adapantai/Tambah1',$data);
    }

    public function add1()
    {
      $data['link']='ada1';
      $tahun = date("Y", strtotime($this->input->post('tanggal')));
      $this->AdapantaiModel->add_adapantai($this->input->post(),'adapantai1');
      redirect('backend/adapantai/ada1?tahun='.$tahun);
    }

    public function edit1()
    {
      $id = $this->input->get('id');
      $data['link']='ada1';
      $data['list'] = $this->AdapantaiModel->get_adapantai_by_id($id,'adapantai1');
      $this->load->view('backend/adapantai/Edit1',$data);
    }

    public function update1()
    {
      $data['link']='ada1';
      $tahun = date("Y", strtotime($this->input->post('tanggal')));
      $this->AdapantaiModel->update_adapantai($this->input->post(),'adapantai1');
      redirect('backend/adapantai/ada1?tahun='.$tahun);
    }

    public function delete1()
    {
      $this->AdapantaiModel->delete_adapantai($this->input->get('id'),'adapantai1');
      redirect('backend/adapantai/ada1?tahun=2020');
    }

    public function ada2()
    {
      $data['link']='ada2';
      $tahun=$this->input->get('tahun');
      $data['list'] = $this->AdapantaiModel->get_adapantai($tahun,'adapantai2');
      $this->load->view('backend/adapantai/List2',$data);
    }

    public function tambah2()
    {
      $data['link']='ada2';
      $this->load->view('backend/adapantai/Tambah2',$data);
    }

    public function add2()
    {
      $data['link']='ada2';
      $tahun = date("Y", strtotime($this->input->post('tanggal')));
      $this->AdapantaiModel->add_adapantai($this->input->post(),'adapantai2');
      redirect('backend/adapantai/ada2?tahun='.$tahun);
    }

    public function edit2()
    {
      $id = $this->input->get('id');
      $data['link']='ada2';
      $data['list'] = $this->AdapantaiModel->get_adapantai_by_id($id,'adapantai2');
      $this->load->view('backend/adapantai/Edit2',$data);
    }

    public function update2()
    {
      $data['link']='ada2';
      $tahun = date("Y", strtotime($this->input->post('tanggal')));
      $this->AdapantaiModel->update_adapantai($this->input->post(),'adapantai2');
      redirect('backend/adapantai/ada2?tahun='.$tahun);
    }

    public function delete2()
    {
      $this->AdapantaiModel->delete_adapantai($this->input->get('id'),'adapantai2');
      redirect('backend/adapantai/ada2?tahun=2020');
    }

    public function ada3()
    {
      $data['link']='ada3';
      $tahun=$this->input->get('tahun');
      $data['list'] = $this->AdapantaiModel->get_adapantai($tahun,'adapantai3');
      $this->load->view('backend/adapantai/List3',$data);
    }

    public function tambah3()
    {
      $data['link']='ada3';
      $this->load->view('backend/adapantai/Tambah3',$data);
    }

    public function add3()
    {
      $data['link']='ada3';
      $tahun = date("Y", strtotime($this->input->post('tanggal')));
      $this->AdapantaiModel->add_adapantai($this->input->post(),'adapantai3');
      redirect('backend/adapantai/ada3?tahun='.$tahun);
    }

    public function edit3()
    {
      $id = $this->input->get('id');
      $data['link']='ada3';
      $data['list'] = $this->AdapantaiModel->get_adapantai_by_id($id,'adapantai3');
      $this->load->view('backend/adapantai/Edit3',$data);
    }

    public function update3()
    {
      $data['link']='ada3';
      $tahun = date("Y", strtotime($this->input->post('tanggal')));
      $this->AdapantaiModel->update_adapantai($this->input->post(),'adapantai3');
      redirect('backend/adapantai/ada3?tahun='.$tahun);
    }

    public function delete3()
    {
      $this->AdapantaiModel->delete_adapantai($this->input->get('id'),'adapantai3');
      redirect('backend/adapantai/ada3?tahun=2020');
    }
}
