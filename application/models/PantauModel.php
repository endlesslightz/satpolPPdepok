<?php

class PantauModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('cookie');
    }

    public function add_lokasi($array)
    {
        $koordinat = explode(',', $array['koordinat']);
        $data = array(
             'id_titik' => '',
             'nama_titik' => $array['lokasi'],
             'jenis' => $array['jenis'],
             'zona' => $array['zona'],
             'keterangan' => $array['keterangan'],
             'lon' => $koordinat[1],
             'lat' => $koordinat[0]
         );
        $this->db->insert('titik_pantau', $data);
    }

    public function get_lokasi()
    {
        $this->db->where('id_titik !=', '0');
        return $this->db->get('titik_pantau')->result();
    }

    public function get_lokasi_all()
    {
        $this->db->order_by('id_titik', 'desc');
        return $this->db->get('titik_pantau')->result();
    }

    public function get_lokasi_by_id($id)
    {
        $this->db->where('id_titik',$id);
        return $this->db->get('titik_pantau')->result();
    }

    public function update_titik($array)
    {
      $koordinat = explode(',', $array['koordinat']);
      $data = array(
           'nama_titik' => $array['lokasi'],
           'jenis' => $array['jenis'],
           'zona' => $array['zona'],
           'keterangan' => $array['keterangan'],
           'lon' => $koordinat[1],
           'lat' => $koordinat[0]
       );
        $this->db->where('id_titik', $array['id_titik']);
        $this->db->update('titik_pantau', $data);
    }

    public function delete_titik($id)
    {
        $this->db->where('id_titik', $id);
        $this->db->delete('titik_pantau');
    }
}
