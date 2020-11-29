<?php

class PetugasModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//

    function get_akun($username){
      $this->db->where('username',$username);
      return $this->db->get('admin')->num_rows();
    }

    function get_detail($id){
      $this->db->select('*');
      $this->db->from('petugas');
      $this->db->join('admin', 'admin.id_petugas = petugas.id_petugas');
      $this->db->where('admin.id_petugas',$id);
      return $this->db->get()->result();
    }

    function get_petugas(){
      $this->db->select('*');
      $this->db->from('petugas');
      $this->db->join('admin', 'admin.id_petugas = petugas.id_petugas');
      return $this->db->get()->result();
    }

    function insert_biodata($array){
        $data = array(
            'id_petugas' => '',
            'nama_lengkap' => $array['nama_lengkap'],
            'tempat_lahir' => $array['tempat_lahir'],
            'tanggal_lahir'=>  $array['tanggal_lahir'],
            'jenis_kelamin'=>  $array['jenis_kelamin'],
            'telepon'=>  $array['telepon'],
            'alamat'=>  $array['alamat'],
            'email'=>  $array['email'],
            'NIP'=>  $array['NIP'],
            'NPWP'=>  $array['NPWP'],
            'unit_kerja'=>  $array['unit'],
            'jabatan'=>  $array['jabatan']
        );
        $this->db->insert('petugas', $data);
    }

    function get_latest_biodata() {
        $this->db->order_by("id_petugas", "desc");
        return $this->db->get('petugas',1)->row('id_petugas');
    }

    function insert_akun($array,$id){
        $data = array(
            'id_admin' => '',
            'id_petugas' => $id,
            'username' => $array['username'],
            'password' => md5($array['password']),
            'gambar' => '',
            'last_login' => '',
            'hak_akses' => $array['level'],
        );
        $this->db->insert('admin', $data);
    }

    function delete_akun($id){
      $this->db->where('id_petugas', $id);
      $this->db->delete('admin');
      $this->db->where('id_petugas', $id);
      $this->db->delete('petugas');
    }

    function update_akun($array) {
       $data = array(
           'nama_lengkap' => $array['nama_lengkap'],
           'tempat_lahir' => $array['tempat_lahir'],
           'tanggal_lahir'=>  $array['tanggal_lahir'],
           'jenis_kelamin'=>  $array['jenis_kelamin'],
           'telepon'=>  $array['telepon'],
           'alamat'=>  $array['alamat'],
           'email'=>  $array['email'],
           'NIP'=>  $array['NIP'],
           'NPWP'=>  $array['NPWP'],
           'unit_kerja'=>  $array['unit'],
           'jabatan'=>  $array['jabatan']
       );
       $this->db->where('id_petugas', $array['id_petugas']);
       $this->db->update('petugas', $data);

       if( $array['password']==$array['passwordlama']){
         $data = array(
             'username' => $array['username'],
             'hak_akses'=> $array['level']
         );
       } else {
         $data = array(
             'username' => $array['username'],
             'password' => md5($array['password']),
             'hak_akses'=> $array['level']
         );
       }
       $this->db->where('id_petugas', $array['id_petugas']);
       $this->db->update('admin', $data);
     }


    function edit_display($gambar,$id) {
       $data = array(
           'gambar' => $gambar
       );
       $this->db->where('id_petugas', $id);
       $this->db->update('admin', $data);
   }

   function get_bulan($id) {
      $query=$this->db->query("SELECT MONTH(wkt_masuk) as bulannya, YEAR(wkt_masuk) as tahunnya FROM `presensi` WHERE id_petugas='".$id."' GROUP BY bulannya, tahunnya ORDER BY tahunnya");
      return $query->result();
  }


}
