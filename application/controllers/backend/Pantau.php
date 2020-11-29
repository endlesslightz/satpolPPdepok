<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pantau extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('PantauModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='pantau';
        $data['list']=$this->PantauModel->get_lokasi();
        $this->load->view('backend/pantau/List',$data);
    }

    public function tambah()
    {
        $data['link']='pantau';
        $this->load->view('backend/pantau/Tambah',$data);
    }

    public function add()
    {
        $this->PantauModel->add_lokasi($this->input->post());
        $this->session->set_flashdata('sukses','Data petugas berhasil ditambahkan');
        redirect(site_url('backend/pantau'));
    }

    public function edit()
    {
        $data['link']='pantau';
        $data['rincian']=$this->PantauModel->get_lokasi_by_id($this->input->get('id'));
        $this->load->view('backend/pantau/Edit',$data);
    }

    public function update()
    {
        $this->PantauModel->update_titik($this->input->post());
        $this->session->set_flashdata('sukses','Data titik berhasil diperbarui');
        redirect('backend/pantau');
    }

    public function delete(){
        $id = $this->input->get('id');
        $this->PantauModel->delete_titik($id);
        redirect('backend/pantau');
    }
}
