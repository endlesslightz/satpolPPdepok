<?php

class GaleriModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//

    function get_foto(){
      $this->db->select('*');
      $this->db->from('galeri');
      $this->db->join('karyawan', 'galeri.id_karyawan = karyawan.id_karyawan');
      return $this->db->get()->result();
    }

    function insert_foto($array,$nama_file){
        $data = array(
            'id_foto' => '',
            'id_karyawan' => $array['id_karyawan'],
            'judul' => $array['judul'],
            'nama_file' => $nama_file,
            'deskripsi' => $array['deskripsi']
        );
        return $this->db->insert('galeri', $data);
    }

    function delete_foto($id){
        $this->db->where('id_foto',$id);
        return $this->db->delete('galeri');
    }

}
