<?php

class PresensiModel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== function =======================//
  function log($array, $waktu, $ket){
    $data = array(
        'id_petugas' => $array['id_petugas'],
        'lon' => $array['lon'],
        'lat' => $array['lat'],
        'lokasi' => $array['lokasi'],
        'waktu' => $waktu,
        'keterangan' => $ket
    );
    $this->db->insert('log', $data);
  }

    function masuk($array)
    {
      $data = array(
          'id_petugas' => $array['id_petugas'],
          'id_jurnal' => '',
          'wkt_masuk' => $array['wkt_masuk'],
          'wkt_keluar' => '',
          'lon' => $array['lon'],
          'lat' => $array['lat'],
          'lokasi' => $array['lokasi'],
          'id_shift' => '',
          'foto_masuk' => '',
          'foto_keluar' => ''
      );
      $this->db->insert('presensi', $data);
    }


    function masukv2($array)
    {
      $data = array(
          'id_petugas' => $array['id_petugas'],
          'id_jurnal' => '',
          'wkt_masuk' => $array['wkt_masuk'],
          'wkt_keluar' => '',
          'lon' => $array['lon'],
          'lat' => $array['lat'],
          'lokasi' => $array['lokasi'],
          'id_shift' => '',
          'foto_masuk' => $array['foto'],
          'foto_keluar' => ''
      );
      $this->db->insert('presensi', $data);
    }

    function firebase($reg_id,$uname)
    {
      $data = array(
            'firebase' => $reg_id
        );
      $this->db->where('username', $uname);
      $this->db->update('admin', $data);
    }

    function keluar($array)
    {
      $data = array(
            'wkt_keluar' => $array['wkt_keluar'],
            'lon' => $array['lon'],
            'lat' => $array['lat'],
            'lokasi' => $array['lokasi']
        );
      $this->db->where('id_presensi', $array['id_presensi']);
      $this->db->update('presensi', $data);
    }

    function keluarv2($array)
    {
      $data = array(
            'wkt_keluar' => $array['wkt_keluar'],
            'lon' => $array['lon'],
            'lat' => $array['lat'],
            'lokasi' => $array['lokasi'],
            'foto_keluar' => $array['foto']
        );
      $this->db->where('id_presensi', $array['id_presensi']);
      $this->db->update('presensi', $data);
    }

    function get_latest_presensi($id) {
        $this->db->where("id_petugas", $id);
        $this->db->order_by("wkt_masuk", "desc");
        return $this->db->get('presensi')->row('id_presensi');
    }

    function get_list() {
      $query=$this->db->query("SELECT id_petugas, nama_lengkap, jabatan, max(wkt_masuk) as waktu FROM petugas LEFT JOIN presensi USING(id_petugas) GROUP BY id_petugas");
      return $query->result();
    }

    function get_riwayat($id) {
        // $query=$this->db->query("SELECT * FROM `presensi` INNER JOIN `shift` USING (id_shift) WHERE id_petugas = '".$id."' order by wkt_masuk desc");
        $query=$this->db->query("SELECT * FROM `presensi` INNER JOIN `shift` USING (id_shift) WHERE id_petugas = '".$id."' order by wkt_masuk desc");

        return $query->result();
      }

    function get_petugas($id)
      {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->join('admin', 'admin.id_petugas = petugas.id_petugas');
        $this->db->where('admin.id_petugas',$id);
        return $this->db->get()->result();
      }

    function get_laporan($a, $b, $c){
      $query=$this->db->query("SELECT * FROM presensi WHERE id_petugas='".$c."' AND MONTH(wkt_masuk)='".$a."' AND YEAR(wkt_masuk)='".$b."'");
      return $query->result();
    }

    function get_laporan_all(){
      $this->db->select('*');
      $this->db->from('laporan');
      $this->db->join('petugas', 'petugas.id_petugas = laporan.id_petugas');
      $this->db->order_by('waktu','desc');
      return $this->db->get()->result();
    }

    function get_log($a, $b, $c){
      $query=$this->db->query("SELECT * FROM `log` WHERE id_petugas='".$c."' AND MONTH(waktu)='".$a."' AND YEAR(waktu)='".$b."' AND NOT keterangan = 'Update' ");
      return $query->result();
    }

    function add_laporan($array, $gambar){
      $data = array(
          'id_laporan' => '',
          'id_petugas' => $array['id'],
          'judul' => $array['judul'],
          'deskripsi' => $array['deskripsi'],
          'mulai' => $array['mulai'],
          'selesai' => $array['selesai'],
          'waktu' => $array['waktu'],
          'lon' => $array['lon'],
          'lat' => $array['lat'],
          'gambar' => $gambar
      );
      $this->db->insert('laporan', $data);
    }

    function update($array){
      $data = array(
          'lon' => $array['lon'],
          'lat' => $array['lat'],
          'lokasi' => $array['lokasi']
      );
      $this->db->where('id_petugas', $array['id_petugas']);
      $this->db->update('presensi', $data);
    }

}
