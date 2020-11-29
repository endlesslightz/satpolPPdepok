<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model('ProfilModel');
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='profil';
        $data['id'] = $this->input->get('id');
        $data['karyawan']=$this->ProfilModel->get_detail($data['id']);
        $this->load->view('backend/profil/Detail',$data);
    }

    public function edit()
    {
        $data['link']='karyawan';
        $id = $this->uri->segment(4);
        $data['karyawan']=$this->ProfilModel->get_detail($id);
        $this->load->view('backend/profil/Edit',$data);
    }

    public function update()
    {
        $this->ProfilModel->update_akun($this->input->post());
        $config = array(
            'upload_path' => "./assets/upload/profil/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000"
            );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('profile'))
        {
            $this->ProfilModel->edit_display($_FILES['profile']['name'], $this->input->post('id_petugas'));
        }
        $this->session->set_flashdata('sukses','Data Pegawai berhasil diperbarui');
        redirect(site_url('backend/profil?id='.$this->input->post('id_petugas')));
    }
}
