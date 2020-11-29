<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model(array('TugasModel','PetugasModel','PantauModel'));
        if ($this->session->userdata('nama')=='') {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data['link']='list_tugas';
        $data['list']=$this->TugasModel->get_tugas();
        $this->load->view('backend/tugas/List',$data);
    }

    public function add()
    {
        $data['link']='add_tugas';
        $data['petugas']=$this->PetugasModel->get_petugas();
        $data['titik']=$this->PantauModel->get_lokasi_all();
        $this->load->view('backend/tugas/Tambah',$data);
    }

    public function insert()
    {
        // $data['link']='add_tugas';
        $this->TugasModel->insert_tugas($this->input->post());
        $reg_id=$this->TugasModel->get_firebase($this->input->post('id_petugas'));
        $notification = array();
        $registatoin_ids = $reg_id;
        $arrNotification= array();
        $arrData = array();
        $arrNotification["body"] = $this->input->post('sifat').' - '.date("d F Y",strtotime($this->input->post('target')));
        $arrNotification["title"] = "E-Patrol Satpol PP Kota Depok";
        $arrNotification["sound"] = "default";
        $arrNotification["type"] = 1;
        $device_type= "Android";

         $url = 'https://fcm.googleapis.com/fcm/send';
          if($device_type == "Android"){
                $fields = array(
                    'to' => $registatoin_ids,
                    'data' => $arrNotification
                );
          } else {
                $fields = array(
                    'to' => $registatoin_ids,
                    'notification' => $arrNotification
                );
          }
          // Firebase API Key
          $headers = array('Authorization:key=AIzaSyBpeYKfNf612059C_E37zfnPjA0XFYkIKM','Content-Type:application/json');
         // Open connection
          $ch = curl_init();
          // Set the url, number of POST vars, POST data
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Disabling SSL Certificate support temporarly
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
          $result = curl_exec($ch);
          if ($result === FALSE) {
              die('Curl failed: ' . curl_error($ch));
          }
         $result = curl_exec($ch );
        curl_close( $ch );
        redirect(site_url('backend/tugas'));
    }

    public function cetak()
    {
        $data['link']='list_tugas';
        $data['rincian']=$this->TugasModel->get_tugas_by_id($this->input->get('id'));
        $this->load->view('backend/tugas/Cetak',$data);
    }

    public function edit()
    {
        $data['link']='add_tugas';
        $data['datanya']=$this->PetugasModel->get_petugas();
        $data['rincian']=$this->TugasModel->get_tugas_by_id($this->input->get('id'));
        $this->load->view('backend/tugas/Edit',$data);
    }

    public function update()
    {
        $this->TugasModel->update_tugas($this->input->post());
        $this->session->set_flashdata('sukses','Data petugas berhasil diperbarui');
        redirect('backend/tugas');
    }

    public function delete(){
        $id = $this->input->get('id');
        $this->TugasModel->delete_tugas($id);
        redirect('backend/tugas');
    }

    public function push(){
        define( 'API_ACCESS_KEY', 'AIzaSyBpeYKfNf612059C_E37zfnPjA0XFYkIKM' );
        $registrationIds = array( 'dcT5TUBT2wU:APA91bHejLcPwoYm4stWcBpexwl9hOfYQMDO4wlF1iuNIoiJCuN3sLKQ2hVusedg0S2np3Gl6mdtFLuty5lsV1jXU6yf4wAh0ZH3s9ADabhGlC9Vq9CmbwFn0kpXoTUU3WbMfx7qN0n7' );
        // prep the bundle
        $msg = array
        (
        	'message' 	=> 'EPatrol',
        	'title'		=> 'This is a title. title',
        	'subtitle'	=> 'This is a subtitle. subtitle',
        	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
        	'vibrate'	=> 1,
        	'sound'		=> 1,
        	'largeIcon'	=> 'large_icon',
        	'smallIcon'	=> 'small_icon'
        );
        $fields = array
        (
        	'registration_ids' 	=> $registrationIds,
        	'data'			=> $msg
        );

        $headers = array
        (
        	'Authorization: key=' . API_ACCESS_KEY,
        	'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        echo $result;
    }


    public function push2($id, $isi){
        $notification = array();
        $registatoin_ids = $id;
        $arrNotification= array();
        $arrData = array();
        $arrNotification["body"] = $isi;
        $arrNotification["title"] = "E-Patrol Satpol PP Kota Depok";
        $arrNotification["sound"] = "default";
        $arrNotification["type"] = 1;
        $device_type= "Android";

         $url = 'https://fcm.googleapis.com/fcm/send';
          if($device_type == "Android"){
                $fields = array(
                    'to' => $registatoin_ids,
                    'data' => $arrNotification
                );
          } else {
                $fields = array(
                    'to' => $registatoin_ids,
                    'notification' => $arrNotification
                );
          }
          // Firebase API Key
          $headers = array('Authorization:key=AIzaSyBpeYKfNf612059C_E37zfnPjA0XFYkIKM','Content-Type:application/json');
         // Open connection
          $ch = curl_init();
          // Set the url, number of POST vars, POST data
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Disabling SSL Certificate support temporarly
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
          $result = curl_exec($ch);
          if ($result === FALSE) {
              die('Curl failed: ' . curl_error($ch));
          }
         $result = curl_exec($ch );
        curl_close( $ch );
        echo $result;
    }
}
