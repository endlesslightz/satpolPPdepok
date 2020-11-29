<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('StatusModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='status';
        $data['list'] = $this->StatusModel->get_status();
        $this->load->view('backend/status/List',$data);
    }
}
