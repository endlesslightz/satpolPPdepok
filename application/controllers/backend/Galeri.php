<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('GaleriModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='galeri';
        $data['galeri']=$this->GaleriModel->get_foto();
        $this->load->view('backend/galeri/List',$data);
    }

    public function tambah()
    {
        $data['link']='galeri';
        $this->load->view('backend/galeri/Tambah',$data);
    }

    public function add()
    {
        $data['link']='galeri';
        // $this->load->library('ftp');
        $config['hostname'] = 'sartika-ms.com';
        $config['username'] = 'k0441236';
        $config['password'] = '67ut75ShZz';
        $config['port']     = 21;
        $config['passive']  = FALSE;
        $config['debug']  = TRUE;

        $ftp_conn = ftp_connect($config['hostname']) or die("Could not connect ");
        $login = ftp_login($ftp_conn, $config['username'],$config['password']);
        $target = "/sites/jurnal.sartika-ms.com/www/assets/upload/foto/".$_FILES['foto']['name'];
        // upload file
        $file = $_FILES["foto"]["tmp_name"];
        // ftp_put($conn_id, $remote_file_path, $_FILES["uploadedfile"]["tmp_name"],FTP_ASCII);
        if ($_FILES['foto']['size'] <= 0) {
            $this->session->set_flashdata('gagal','Data foto tidak ada');
         } else if ($_FILES['foto']['size'] > 1000000) {
            $this->session->set_flashdata('gagal','Ukuran foto lebih besar dari 1 MB');
         } else {
           if (ftp_put($ftp_conn, $target, $file, FTP_ASCII)) {
               $this->GaleriModel->insert_foto($this->input->post(),$_FILES['foto']['name']);
               $this->session->set_flashdata('sukses','Data foto berhasil ditambahkan');
             } else {
               $this->session->set_flashdata('gagal','Data foto gagal ditambahkan');
             }
         }
        ftp_close($ftp_conn);
        redirect(site_url('backend/galeri'));
    }

    public function delete(){
      $id = $this->input->post('id');
      $this->GaleriModel->delete_foto($id);
    }
}
