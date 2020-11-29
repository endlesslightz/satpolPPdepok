<?php

class ShiftModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//

    function get_shift(){
      return $this->db->get('shift')->result();
    }

    function get_nama($id){
      $this->db->where('id_petugas',$id);
      return $this->db->get('petugas')->row('nama_lengkap');
    }

    function get_regu_by_nama($id){
      $this->db->where('id_petugas',$id);
      return $this->db->get('petugas_regu')->row('kode');
    }

    function get_regu(){
      $this->db->join('petugas','id_petugas');
      return $this->db->get('petugas_regu')->result();
    }

    function get_shift_regu(){
      $this->db->join('shift','id_shift');
      $this->db->join('area','id_area');
      return $this->db->get('jadwal_regu')->result();
    }

    function get_shift_petugas($id){
      $this->db->select('tanggal,nama,mulai,selesai,nama_area,wilayah');
      $this->db->join('shift','id_shift');
      $this->db->join('area','id_area');
      $this->db->join('petugas_regu','kode');
      $this->db->where('id_petugas',$id);
      return $this->db->get('jadwal_regu')->result();
    }

    function update_shift($array){
         $data = array(
             'mulai' => $array['mulai'],
             'selesai' => $array['selesai'],
             'toleransi'=>  $array['toleransi']
         );
         $this->db->where('id_shift', $array['id_shift']);
         $this->db->update('shift', $data);
    }

    function cek_petugas($array) {
        $query = $this->db->query("select * from petugas_regu where id_petugas='" .$array['id_petugas']."' LIMIT 1");
        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_petugas($array){
         $data = array(
             'kode' => $array['kode_regu']
         );
         $this->db->where('id_petugas', $array['id_petugas']);
         $this->db->update('petugas_regu', $data);
    }


    function add_petugas($array){
         $data = array(
             'kode' => $array['kode_regu'],
             'id_petugas' => $array['id_petugas']
         );
         $this->db->insert('petugas_regu', $data);
    }

    function cek_regu($array) {
        $query = $this->db->query("select * from jadwal_regu where kode='" .$array['kode_regu']."' AND tanggal='" .$array['tanggal']."' LIMIT 1");
        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_regu($array){
         $data = array(
             'id_area' => $array['area'],
             'id_shift' => $array['shift']
         );
         $this->db->where('kode', $array['kode_regu']);
         $this->db->where('tanggal', $array['tanggal']);
         $this->db->update('jadwal_regu', $data);
    }


    function add_regu($array){
         $data = array(
             'kode' => $array['kode_regu'],
             'tanggal' => $array['tanggal'],
             'id_area' => $array['area'],
             'id_shift' => $array['shift']
         );
         $this->db->insert('jadwal_regu', $data);
    }

}
