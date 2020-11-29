<?php

class RiwayatModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//
  function get_riwayat($id) {
      $query=$this->db->query("SELECT * FROM `jurnal` WHERE id_karyawan = '".$id."'");
      return $query->result();
    }
}
