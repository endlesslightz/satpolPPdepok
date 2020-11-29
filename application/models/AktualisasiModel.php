<?php

class AktualisasiModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//
  function get_aktualisasi($tahun,$kode) {
    $this->db->select('*');
    $this->db->where('tahun',$tahun);
    $this->db->where('kode',$kode);
    $this->db->from('aktualisasi');
    return $this->db->get()->result();
  }

  function update_misi($array){
    $data = array(
      'p1' => $array['Ap1'],
      'p2' => $array['Ap2'],
      'tw1' => $array['Atw1'],
      'tw2' => $array['Atw2'],
      'tw3' => $array['Atw3'],
      'tw4' => $array['Atw4']
    );
    $this->db->where('tahun',$array['tahun']);
    $this->db->where('kode','A');
    $this->db->update('aktualisasi',$data);
  }

  function update_sasaran($array){
    $data = array(
      'p1' => $array['B1ap1'],
      'p2' => $array['B1ap2'],
      'tw1' => $array['B1atw1'],
      'tw2' => $array['B1atw2'],
      'tw3' => $array['B1atw3'],
      'tw4' => $array['B1atw4']
    );
    $this->db->where('tahun',$array['tahun']);
    $this->db->where('kode','B1a');
    $this->db->update('aktualisasi',$data);

    $data = array(
      'p1' => $array['B1bp1'],
      'p2' => $array['B1bp2'],
      'tw1' => $array['B1btw1'],
      'tw2' => $array['B1btw2'],
      'tw3' => $array['B1btw3'],
      'tw4' => $array['B1btw4']
    );
    $this->db->where('tahun',$array['tahun']);
    $this->db->where('kode','B1b');
    $this->db->update('aktualisasi',$data);

    $data = array(
      'p1' => $array['B1cp1'],
      'p2' => $array['B1cp2'],
      'tw1' => $array['B1ctw1'],
      'tw2' => $array['B1ctw2'],
      'tw3' => $array['B1ctw3'],
      'tw4' => $array['B1ctw4']
    );
    $this->db->where('tahun',$array['tahun']);
    $this->db->where('kode','B1c');
    $this->db->update('aktualisasi',$data);

    $data = array(
      'p1' => $array['B2ap1'],
      'p2' => $array['B2ap2'],
      'tw1' => $array['B2atw1'],
      'tw2' => $array['B2atw2'],
      'tw3' => $array['B2atw3'],
      'tw4' => $array['B2atw4']
    );
    $this->db->where('tahun',$array['tahun']);
    $this->db->where('kode','B2a');
    $this->db->update('aktualisasi',$data);

    $data = array(
      'p1' => $array['B2bp1'],
      'p2' => $array['B2bp2'],
      'tw1' => $array['B2btw1'],
      'tw2' => $array['B2btw2'],
      'tw3' => $array['B2btw3'],
      'tw4' => $array['B2btw4']
    );
    $this->db->where('tahun',$array['tahun']);
    $this->db->where('kode','B2b');
    $this->db->update('aktualisasi',$data);
  }
}
