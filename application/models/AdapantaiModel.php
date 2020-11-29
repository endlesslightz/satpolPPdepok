<?php

class AdapantaiModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//


  function get_adapantai($tahun,$tabel) {
    $query=$this->db->query("SELECT * FROM ".$tabel." WHERE YEAR(tanggal)='".$tahun."'");
    return $query->result();
  }

  public function get_adapantai_by_id($id,$tabel)
  {
      $this->db->where('id_adapantai',$id);
      return $this->db->get($tabel)->result();
  }

  function add_adapantai($array,$tabel) {
    $data = array(
        'id_adapantai' => '',
        'tanggal' => $array['tanggal'],
        'nama' => $array['nama'],
        'lokasi' => $array['lokasi'],
        'jumlah' => $array['jumlah'],
    );
    $this->db->insert($tabel, $data);
  }

  function update_adapantai($array,$tabel) {
    $data = array(
        'tanggal' => $array['tanggal'],
        'nama' => $array['nama'],
        'lokasi' => $array['lokasi'],
        'jumlah' => $array['jumlah'],
    );
    $this->db->where('id_adapantai',$array['id_adapantai']);
    $this->db->update($tabel, $data);
  }

  public function delete_adapantai($id,$tabel)
  {
      $this->db->where('id_adapantai', $id);
      $this->db->delete($tabel);
  }
}
