<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model('PetugasModel');
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='petugas';
        $data['petugas']=$this->PetugasModel->get_petugas();
        $this->load->view('backend/petugas/Petugas',$data);
    }

    public function tambah()
    {
        $data['link']='petugas';
        $this->load->view('backend/petugas/Tambah',$data);
    }

    public function detail()
    {
        $data['link']='petugas';
        $id = $this->uri->segment(4);
        $data['petugas']=$this->PetugasModel->get_detail($id);
        $this->load->view('backend/petugas/Detail',$data);
    }

    public function add()
    {
        $exist = $this->PetugasModel->get_akun($this->input->post('username'));
        if($exist<1){
            $this->PetugasModel->insert_biodata($this->input->post());
            $id = $this->PetugasModel->get_latest_biodata();
            $this->PetugasModel->insert_akun($this->input->post(), $id);
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
                $this->PetugasModel->edit_display($_FILES['profile']['name'], $id);
            } else {
                $this->PetugasModel->edit_display('index.png', $id);
            }
            $this->session->set_flashdata('sukses','Data petugas berhasil ditambahkan');
            redirect(site_url('backend/petugas'));
        } else {
            redirect(site_url('backend/petugas/tambah'));
        }
    }

    public function edit()
    {
        $data['link']='petugas';
        $id = $this->uri->segment(4);
        $data['petugas']=$this->PetugasModel->get_detail($id);
        $this->load->view('backend/petugas/Edit',$data);
    }

    public function update()
    {
        $this->PetugasModel->update_akun($this->input->post());
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
            $this->PetugasModel->edit_display($_FILES['profile']['name'], $this->input->post('id_petugas'));
        }
        $this->session->set_flashdata('sukses','Data petugas berhasil diperbarui');
        redirect(site_url('backend/petugas/detail/'.$this->input->post('id_petugas')));
    }

    public function delete()
    {
        $id = $this->input->get('id');
        // $id = $this->uri->segment(4);
        // echo $id;
        $this->PetugasModel->delete_akun($id);
        redirect(site_url('backend/petugas'));
    }
}
