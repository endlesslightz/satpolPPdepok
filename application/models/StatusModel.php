<?php

class StatusModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//


    function get_status(){
      $query=$this->db->query("SELECT * FROM `presensi` t1 INNER JOIN (SELECT MAX(wkt_masuk) masuk FROM presensi GROUP BY id_petugas) t2 ON t1.wkt_masuk=t2.masuk INNER JOIN petugas USING (id_petugas)");
      return $query->result();
    }

    function get_jum_petugas(){
      $query=$this->db->query("SELECT * FROM `petugas`");
      return $query->num_rows();
    }

    function get_jum_online(){
      $query=$this->db->query("SELECT * FROM `presensi` WHERE wkt_keluar='0000-00-00 00:00:00'");
      return $query->num_rows();
    }

    function get_latest_laporan(){
      $query=$this->db->query("SELECT * FROM `laporan` WHERE id_laporan=(SELECT max(id_laporan) FROM `laporan`)");
      return $query->result_array();
    }

    function get_latest_presensi(){
      $query=$this->db->query("SELECT * FROM `presensi` WHERE id_presensi=(SELECT max(id_presensi) FROM `presensi`)");
      return $query->result_array();
    }

}
