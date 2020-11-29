<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('JurnalModel','KaryawanModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='jurnal';
        $data['id'] = $this->input->get('id');
        $data['karyawan'] = $this->KaryawanModel->get_detail($data['id']);
        $data['jurnal'] = $this->JurnalModel->get_jurnal_karyawan($data['id']);
        $this->load->view('backend/jurnal/Detail',$data);
    }

    public function tambah()
    {
        $data['link']='jurnal';
        $data['id'] = $this->uri->segment(4);
        $data['karyawan'] = $this->KaryawanModel->get_detail($data['id']);
        $this->load->view('backend/jurnal/Tambah',$data);
    }

    public function add()
    {
        $data['link']='jurnal';
        $data['id'] = $this->input->post('id');
        $this->JurnalModel->insert_jurnal( $this->input->post());
        redirect(site_url('backend/jurnal?id='.$data['id']));
    }

    public function resume()
    {
        $data['link']='resume';
        $data['karyawan']=$this->KaryawanModel->get_karyawan();
        $this->load->view('backend/jurnal/List',$data);
    }

    public function detail()
    {
        $data['link']='resume';
        $data['id'] = $this->uri->segment(4);
        $data['jurnal'] = $this->JurnalModel->get_jurnal_karyawan($data['id']);
        $this->load->view('backend/jurnal/List',$data);
    }

    public function edit()
    {
        $data['link']='jurnal';
        $data['id'] = $this->input->get('id');
        $data['id_karyawan'] = $this->input->get('karyawan');
        $data['jurnal'] = $this->JurnalModel->get_detail($data['id']);
        $this->load->view('backend/jurnal/Edit',$data);
    }

    public function update()
    {
        $this->JurnalModel->update_jurnal($this->input->post());
        $jurnal = $this->JurnalModel->get_id_karyawan($this->input->post('id'));
        $this->session->set_flashdata('sukses','Data jurnal berhasil diperbarui');
        redirect(site_url('backend/jurnal?id='.$jurnal['id_karyawan']));
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $jurnal = $this->JurnalModel->get_id_karyawan($id);
        $this->JurnalModel->delete_jurnal($id);
        redirect(site_url('backend/jurnal?id='.$jurnal['id_karyawan']));
    }


}
