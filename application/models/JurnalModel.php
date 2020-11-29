<?php

class JurnalModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//
    function get_detail($id){
      $this->db->select('*');
      $this->db->from('jurnal');
      $this->db->where('id_jurnal',$id);
      return $this->db->get()->result();
    }

    function get_gaji($id){
      $this->db->select('*');
      $this->db->from('gaji');
      $this->db->where('id_karyawan',$id);
      return $this->db->get()->result();
    }

    function get_jurnal_karyawan($id){
      $this->db->select('*');
      $this->db->from('karyawan');
      $this->db->join('jurnal', 'jurnal.id_karyawan = karyawan.id_karyawan');
      $this->db->where('karyawan.id_karyawan',$id);
      return $this->db->get()->result();
    }

    function insert_jurnal($array)
    {
      $data = array(
          'tanggal' => $array['tanggal'],
          'detail' => $array['detail'],
          'tipe'=>  $array['tipe'],
          'jam'=>  $array['jam'],
          'id_karyawan'=>  $array['id']
      );
      $this->db->insert('jurnal', $data);
    }

    function delete_jurnal($id){
      $this->db->where('id_jurnal', $id);
      $this->db->delete('jurnal');
    }

    function get_id_karyawan($id){
      $this->db->select('id_karyawan');
      $this->db->from('jurnal');
      $this->db->where('id_jurnal',$id);
      return $this->db->get()->row_array('id_karyawan');
    }

    function update_jurnal($array) {
       $data = array(
           'tanggal' => $array['tanggal'],
           'tipe' => $array['tipe'],
           'jam'=>  $array['jam'],
           'detail'=>  $array['detail']
       );
       $this->db->where('id_jurnal', $array['id']);
       $this->db->update('jurnal', $data);
     }

     function get_jumlah_kantor($id, $bulan, $tahun)
     {
       $query=$this->db->query("SELECT *, COUNT(tipe) as jml FROM `jurnal` INNER JOIN karyawan USING (id_karyawan) WHERE jurnal.id_karyawan='".$id."' AND month(jurnal.tanggal)='".$bulan."' AND year(jurnal.tanggal)='".$tahun."' AND tipe='kantor'");
       return $query->result();
     }

     function get_jumlah_lembur($id, $bulan, $tahun)
     {
       $query=$this->db->query("SELECT *, COUNT(tipe) as jml FROM `jurnal` INNER JOIN karyawan USING (id_karyawan) WHERE jurnal.id_karyawan='".$id."' AND month(jurnal.tanggal)='".$bulan."' AND year(jurnal.tanggal)='".$tahun."' AND tipe='lembur'");
       return $query->result();
     }

     function get_jumlah_dinas($id, $bulan, $tahun)
     {
       $query=$this->db->query("SELECT *, COUNT(tipe) as jml FROM `jurnal` INNER JOIN karyawan USING (id_karyawan) WHERE jurnal.id_karyawan='".$id."' AND month(jurnal.tanggal)='".$bulan."' AND year(jurnal.tanggal)='".$tahun."' AND tipe='dinas'");
       return $query->result();
     }

    function get_resume_list($id)
    {
      $query=$this->db->query("SELECT *, jurnal.tanggal as waktu FROM `jurnal` INNER JOIN karyawan USING (id_karyawan) WHERE jurnal.id_karyawan='".$id."' GROUP BY month(jurnal.tanggal)");
      return $query->result();
    }

    function get_lemburan($id, $bulan, $tahun)
    {
      $query=$this->db->query("SELECT * FROM `jurnal` INNER JOIN karyawan USING (id_karyawan) WHERE jurnal.id_karyawan='".$id."' AND month(jurnal.tanggal)='".$bulan."' AND year(jurnal.tanggal)='".$tahun."' AND tipe='lembur'");
      return $query->result();
    }
}
