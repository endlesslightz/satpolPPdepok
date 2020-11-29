<?php

class TugasModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//
    function get_tugas(){
      $this->db->select('*');
      $this->db->from('tugas');
      $this->db->join('petugas', 'tugas.id_petugas = petugas.id_petugas');
      $this->db->order_by('tanggal', 'desc');
      // $this->db->where('id_jurnal',$id);
      return $this->db->get()->result();
    }

    function get_tugas_by_id($id){
      $this->db->select('*');
      $this->db->from('tugas');
      $this->db->join('petugas', 'tugas.id_petugas = petugas.id_petugas');
      $this->db->order_by('tanggal', 'desc');
      $this->db->where('id_tugas',$id);
      return $this->db->get()->result();
    }

    function get_tugas_by_petugas($array){
      $this->db->select('*');
      $this->db->from('tugas');
      $this->db->join('petugas', 'tugas.id_petugas = petugas.id_petugas');
      $this->db->order_by('id_tugas', 'desc');
      $this->db->limit(15);
      $this->db->where('tugas.id_petugas',$array['id_petugas']);
      return $this->db->get()->result();
    }

    function insert_tugas($array){
      date_default_timezone_set("Asia/Jakarta");
      if(empty($array['id_titik'])){
        $array['id_titik']=='0';
      }
      $tanggal = date("Y-m-d");
      $data = array(
          'id_tugas' => '',
          'id_titik' => $array['id_titik'],
          'no_surat_tugas' => $array['nomor'],
          'tanggal' => $tanggal,
          'sifat'=>  $array['sifat'],
          'target'=>  $array['target'],
          'isi'=>  $array['isi'],
          'id_petugas'=>  $array['id_petugas']
      );
      $this->db->insert('tugas', $data);
  }

  function get_firebase($id){
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('id_petugas',$id);
    return $this->db->get()->row('firebase');
}

  function update_tugas($array){
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date("Y-m-d");
    $data = array(
        'no_surat_tugas' => $array['nomor'],
        'tanggal' => $tanggal,
        'sifat'=>  $array['sifat'],
        'target'=>  $array['target'],
        'isi'=>  $array['isi'],
        'id_petugas'=>  $array['id_petugas']
    );
    $this->db->where('id_tugas',$array['id_tugas']);
    $this->db->update('tugas', $data);
  }

  function delete_tugas($id){
    $this->db->where('id_tugas', $id);
    $this->db->delete('tugas');
  }

}
