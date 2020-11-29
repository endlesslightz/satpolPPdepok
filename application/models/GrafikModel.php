<?php

class GrafikModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//
    function get_riwayat_pres($id,$tahun) {
        $query=$this->db->query("SELECT *, count(id_petugas) as jumlah FROM `presensi` WHERE id_petugas='".$id."' AND year(wkt_masuk)='".$tahun."' GROUP BY month(wkt_masuk)");
        return $query->result();
      }


    function get_riwayat2($id,$tahun) {
        $query=$this->db->query("SELECT *, count(tipe) as jumlah FROM `jurnal` WHERE id_karyawan='".$id."' AND tipe='dinas' AND year(tanggal)='".$tahun."' GROUP BY month(tanggal)");
        return $query->result();
      }

    function get_riwayat3($id,$tahun) {
        $query=$this->db->query("SELECT *, count(tipe) as jumlah FROM `jurnal` WHERE id_karyawan='".$id."' AND tipe='lembur' AND year(tanggal)='".$tahun."' GROUP BY month(tanggal)");
        return $query->result();
      }


    function get_karyawan() {
      $this->db->select('*');
      $this->db->from('karyawan');
      return $this->db->get()->result();
    }
}
