<?php

class ProfilModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//


    function get_detail($id){
      $this->db->select('*');
      $this->db->from('petugas');
      $this->db->join('admin', 'admin.id_petugas = petugas.id_petugas');
      $this->db->where('admin.id_petugas',$id);
      return $this->db->get()->result();
    }

   //  function get_karyawan(){
   //    $this->db->select('*');
   //    $this->db->from('karyawan');
   //    $this->db->join('admin', 'admin.id_karyawan = karyawan.id_karyawan');
   //    return $this->db->get()->result();
   //  }
   //
    function update_akun($array) {
       $data = array(
           'nama_lengkap' => $array['nama_lengkap'],
           'tempat_lahir' => $array['tempat_lahir'],
           'tanggal_lahir'=>  $array['tanggal_lahir'],
           'jenis_kelamin'=>  $array['jenis_kelamin'],
           'telepon'=>  $array['telepon'],
           'alamat'=>  $array['alamat'],
           'email'=>  $array['email'],
           'NPWP'=>  $array['NPWP'],
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

     function update_akun_app($array) {
        $data = array(
            'tempat_lahir' => $array['tempat_lahir'],
            'tanggal_lahir'=>  $array['tanggal_lahir'],
            'jenis_kelamin'=>  $array['jenis_kelamin'],
            'alamat'=>  $array['alamat'],
            'email'=>  $array['email'],
            'telepon'=>  $array['telepon']
        );
        $this->db->where('id_petugas', $array['id']);
        $this->db->update('petugas', $data);

        if( $array['password']==''){
          $data = array(
              'username' => $array['username']
          );
        } else {
          $data = array(
              'username' => $array['username'],
              'password' => md5($array['password'])
          );
        }
        $this->db->where('id_petugas', $array['id']);
        $this->db->update('admin', $data);
      }

      function update_firebase($array) {
         $data = array(
             'firebase' => $array['firebase']
         );
         $this->db->where('id_petugas', $array['id']);
         $this->db->update('admin', $data);
       }


    function edit_display($gambar,$id) {
       $data = array(
           'gambar' => $gambar
       );
       $this->db->where('id_petugas', $id);
       $this->db->update('admin', $data);
   }

}
