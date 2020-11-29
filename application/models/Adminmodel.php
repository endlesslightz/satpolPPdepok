<?php

class Adminmodel extends CI_Model {

    function __construct() {
        $this->load->database();
	      $this->load->helper('cookie');
    }

// ========================== AUTENTIKASI =======================//

    function authmember($uname, $pwd) {
        $query = $this->db->query("select * from admin where username='" .$uname. "' AND password ='" .$pwd. "' LIMIT 1");
        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

     function get_by_cookie($cookie)   {
       $this->db->select('*');
       $this->db->from('petugas');
       $this->db->join('admin', 'admin.id_petugas = petugas.id_petugas');
       $this->db->where('admin.cookie', $cookie);
       return $this->db->get();
   }

      function update($data, $id_user)   {
       $this->db->where('id_admin', $id_user);
       $this->db->update('admin', $data);
   }

// ========================== RESET PASSWORD =======================//

    function cek_email($email) {
      $this->db->where('email',$email);
      return $this->db->get('admin')->num_rows();
    }

    function cek_token($token) {
      $this->db->where('token',$token);
      $this->db->where('status','pending');
      return $this->db->get('reset')->result_array();
    }

    function set_token_basi($token) {
       $data = array(
           'status' => 'expired'
       );
       $this->db->where('token', $token);
       $this->db->update('reset', $data);
     }

    function set_token_sukses($token) {
       $data = array(
           'status' => 'success'
       );
       $this->db->where('token', $token);
       $this->db->update('reset', $data);
     }

    function generate_token(){
      // $length = 32;
      // $length = ($length < 4) ? 4 : $length;

       // return bin2hex(random_bytes(($length-($length%2))/2));
       return md5(uniqid(rand(), true));
    }

    function request_reset($email,$token){
      $data = array(
          'id_reset' => '',
          'email' => $email,
          'token' => $token,
          'status'=> 'pending'
      );
      $this->db->insert('reset', $data);
    }

    function set_password_baru($email, $pass) {
       $data = array(
           'password' => md5($pass)
       );
       $this->db->where('email', $email);
       $this->db->update('admin', $data);
     }
    // ========================== LOGIN =======================//

    function get_member_by_uname($uname) {
        $query = $this->db->query("SELECT * FROM admin INNER JOIN petugas USING(id_petugas) WHERE username='".$uname."'");
        return $query->row_array();
    }

    function edit_profile($post) {
        if($post['password']==$this->session->userdata('password'))
        {
        $data = array(
            'nama' => $post['nama'],
            'username' =>  $post['username'],
            'email' =>  $post['email']
        );
        } else {
        $data = array(
            'nama' => $post['nama'],
            'username' =>  $post['username'],
            'password' =>  md5($post['password']),
            'email' =>  $post['email']
        );
        }
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->update('admin', $data);

        $sesi = array(
            'username' => $post['username'],
            'password' => md5($post['password']),
            'nama' => $post['nama'],
            'email' => $post['email']
        );
        $this->session->set_userdata($sesi);
    }

     function edit_display($gambar) {
        $data = array(
            'gambar' => $gambar
        );
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->update('admin', $data);

        $sesi = array(
            'gambar' => $gambar
        );
        $this->session->set_userdata($sesi);
    }

    function update_lastlog($uname) {
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $data_log = array(
                'last_login'		=> $waktu
                );
        $this->db->where('username', $uname);
        $this->db->update('admin',$data_log);
    }

    function get_admin() {
        return $this->db->get('admin')->result();
    }

    function simpan($username, $pass) {
        $data = array(
            'id_admin' => '',
            'username' => $username,
            'password' => md5($pass),
            'last_login'=> date("Y-m-d H:i:s"),
            'hak_akses' => "admin"
        );
        $this->db->insert('admin', $data);
    }

}
