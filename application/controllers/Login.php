<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url','cookie','string'));
        $this->load->model('adminmodel');
    }

    public function index() {
        $cookie = get_cookie('sartikams');
        if ($this->session->userdata('nama')!='') {
            redirect(site_url('backend/dashboard'));
         } else if ($cookie!=''){
           $row = $this->adminmodel->get_by_cookie($cookie)->row_array();
           $this->adminmodel->update_lastlog($row['username']);
           $sesi = array(
               'username' => $row['username'],
               'password' => $row['password'],
               'last_login' => $row['last_login'],
               'nama' => $row['nama_lengkap'],
               'email' => $row['email'],
               'gambar' => $row['gambar'],
               'id_admin' => $row['id_admin'],
               'id_petugas' => $row['id_petugas'],
               'hak_akses' => $row['hak_akses']
           );
           $this->session->set_userdata($sesi);
           redirect('backend/dashboard');
         }
        $this->load->view('Login');
    }

    public function otentikasi() {
        $uname = $this->input->post('username');
        $pwd = md5($this->input->post('password'));
        $auth = $this->adminmodel->authmember($uname, $pwd);
        if ($auth == TRUE) {
            $row = $this->adminmodel->get_member_by_uname($this->input->post('username'));
            $this->adminmodel->update_lastlog($this->input->post('username'));
            if ($this->input->post('remember')!='') {
                $key = random_string('alnum', 64);
                set_cookie('sartikams', $key, 3600*24*30);
                $update_key = array(
                    'cookie' => $key
                );
                $this->adminmodel->update($update_key, $row['id_admin']);
            }
            $sesi = array(
                'username' => $row['username'],
                'password' => $row['password'],
                'last_login' => $row['last_login'],
                'nama' => $row['nama_lengkap'],
                'email' => $row['email'],
                'gambar' => $row['gambar'],
                'id_admin' => $row['id_admin'],
                'id_petugas' => $row['id_petugas'],
                'hak_akses' => $row['hak_akses']
            );
            $this->session->set_userdata($sesi);
            redirect('backend/dashboard');
        } else {
            $this->session->set_flashdata('error','Username atau password salah !');
            $sesi = array('flag' => '1');
            $this->session->set_userdata($sesi);
            redirect(base_url());
        }
    }

    function logout() {
        $sesi = array(
            'username' => $this->session->userdata('username'),
            'password' => $this->session->userdata('password'),
            'last_login' => $this->session->userdata('last_login'),
            'nama' => $this->session->userdata('nama'),
            'email' => $this->session->userdata('email'),
            'gambar' => $this->session->userdata('gambar'),
            'id_petugas' => $this->session->userdata('id_petugas'),
            'id_admin' => $this->session->userdata('id_admin'),
            'hak_akses' => $this->session->userdata('hak_akses')
        );
        delete_cookie('sartikams');
        $this->session->unset_userdata($sesi);
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function hal404()
    {
      $this->load->view('404');
    }

    function lupa(){
      if(isset($_POST['user_email'])) {
          $email=$_POST['user_email'];
          $checkdata=$this->adminmodel->cek_email($email);
          if($checkdata>0) {
            echo "Email terdaftar";
          } else {
            echo "Email tidak terdaftar sebagai anggota";
          }
          exit();
      }
    }

    function request_reset(){
      $token = $this->uri->segment(3);
      $checkdata=$this->adminmodel->cek_token($token);
      if($checkdata) {
        $datetime1 = new DateTime();
        $datetime2 = new DateTime($checkdata[0]['waktu']);
        $interval = $datetime1->diff($datetime2);
        $elapsed = $interval->format('%d');
        if($elapsed < 1){
          $data['status']=1;
          $data['token'] = $token;
          $data['email']=$checkdata[0]['email'];
        } else {
          $data['status']=2;
          $this->adminmodel->set_token_basi($token);
        }
      } else {
        $data['status']=0;
      }
      $this->load->view('Reset',$data);
      // echo $datetime1->format('Y-m-d H:i:s');
      // echo $datetime2->format('Y-m-d H:i:s');
      // echo $elapsed;
    }

    function ganti_password(){
      // print_r($this->input->post());
      $this->adminmodel->set_password_baru($this->input->post('email'),$this->input->post('password1'));
      $this->adminmodel->set_token_sukses($this->input->post('token'));
      $this->session->set_flashdata('error','Password Anda sudah berhasil diubah.');
      redirect(base_url());

    }

    function email_reset(){
      $this->load->library('email');
      $token = $this->adminmodel->generate_token();
      $this->adminmodel->request_reset($this->input->post('email'), $token);
      $config['protocol'] = "smtp";
      $config['smtp_host'] = "ssl://smtp.googlemail.com";
      $config['smtp_port'] = "465";
      $config['smtp_user'] = 'spampasigala@gmail.com';
      $config['smtp_pass'] = "vcslqbrtjsmjnhwo";
      $config['charset'] = "iso-8859-1";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $this->email->initialize($config);
      $this->email->from('spampasigala@gmail.com', 'SPAM PASIGALA');
      $list = array($this->input->post('email'));
      $this->email->to($list);
      $this->email->set_mailtype("html");
      $isi = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Reset Password SPAM PASIGALA</title>
      <style type="text/css" rel="stylesheet" media="all">
      /* Base ------------------------------ */

      *:not(br):not(tr):not(html) {
      font-family: Arial,  Helvetica, sans-serif;
      box-sizing: border-box;
      }

      body {
      width: 100% !important;
      height: 100%;
      margin: 0;
      line-height: 1.4;
      background-color: #F2F4F6;
      color: #74787E;
      -webkit-text-size-adjust: none;
      }

      p,
      ul,
      ol,
      blockquote {
      line-height: 1.4;
      text-align: left;
      }

      a {
      color: #3869D4;
      }

      a img {
      border: none;
      }

      a:link {
        text-decoration: none;
        color : white;
    }

      td {
      word-break: break-word;
      }
      /* Layout ------------------------------ */

      .email-wrapper {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F2F4F6;
      }

      .email-content {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      }
      /* Masthead ----------------------- */

      .email-masthead {
      padding: 25px 0;
      text-align: center;
      }

      .email-masthead_logo {
      width: 94px;
      }

      .email-masthead_name {
      font-size: 16px;
      font-weight: bold;
      color: #bbbfc3;
      text-decoration: none;
      text-shadow: 0 1px 0 white;
      }
      /* Body ------------------------------ */

      .email-body {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      border-top: 1px solid #EDEFF2;
      border-bottom: 1px solid #EDEFF2;
      background-color: #FFFFFF;
      }

      .email-body_inner {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #FFFFFF;
      }

      .email-footer {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
      }

      .email-footer p {
      color: #AEAEAE;
      }

      .body-action {
      width: 100%;
      margin: 30px auto;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
      }

      .body-sub {
      margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #EDEFF2;
      }

      .content-cell {
      padding: 35px;
      }

      .preheader {
      display: none !important;
      visibility: hidden;
      mso-hide: all;
      font-size: 1px;
      line-height: 1px;
      max-height: 0;
      max-width: 0;
      opacity: 0;
      overflow: hidden;
      }
      /* Attribute list ------------------------------ */

      .attributes {
      margin: 0 0 21px;
      }

      .attributes_content {
      background-color: #EDEFF2;
      padding: 16px;
      }

      .attributes_item {
      padding: 0;
      }
      /* Related Items ------------------------------ */

      .related {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      }

      .related_item {
      padding: 10px 0;
      color: #74787E;
      font-size: 15px;
      line-height: 18px;
      }

      .related_item-title {
      display: block;
      margin: .5em 0 0;
      }

      .related_item-thumb {
      display: block;
      padding-bottom: 10px;
      }

      .related_heading {
      border-top: 1px solid #EDEFF2;
      text-align: center;
      padding: 25px 0 10px;
      }
      /* Discount Code ------------------------------ */

      .discount {
      width: 100%;
      margin: 0;
      padding: 24px;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #EDEFF2;
      border: 2px dashed #9BA2AB;
      }

      .discount_heading {
      text-align: center;
      }

      .discount_body {
      text-align: center;
      font-size: 15px;
      }
      /* Social Icons ------------------------------ */

      .social {
      width: auto;
      }

      .social td {
      padding: 0;
      width: auto;
      }

      .social_icon {
      height: 20px;
      margin: 0 8px 10px 8px;
      padding: 0;
      }
      /* Data table ------------------------------ */

      .purchase {
      width: 100%;
      margin: 0;
      padding: 35px 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      }

      .purchase_content {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      }

      .purchase_item {
      padding: 10px 0;
      color: #74787E;
      font-size: 15px;
      line-height: 18px;
      }

      .purchase_heading {
      padding-bottom: 8px;
      border-bottom: 1px solid #EDEFF2;
      }

      .purchase_heading p {
      margin: 0;
      color: #9BA2AB;
      font-size: 12px;
      }

      .purchase_footer {
      padding-top: 15px;
      border-top: 1px solid #EDEFF2;
      }

      .purchase_total {
      margin: 0;
      text-align: right;
      font-weight: bold;
      color: #2F3133;
      }

      .purchase_total--label {
      padding: 0 15px 0 0;
      }
      /* Utilities ------------------------------ */

      .align-right {
      text-align: right;
      }

      .align-left {
      text-align: left;
      }

      .align-center {
      text-align: center;
      }
      /*Media Queries ------------------------------ */

      @media only screen and (max-width: 600px) {
      .email-body_inner,
      .email-footer {
        width: 100% !important;
      }
      }

      @media only screen and (max-width: 500px) {
      .button {
        width: 100% !important;
      }
      }
      /* Buttons ------------------------------ */

      .button {
      background-color: #3869D4;
      border-top: 10px solid #3869D4;
      border-right: 18px solid #3869D4;
      border-bottom: 10px solid #3869D4;
      border-left: 18px solid #3869D4;
      display: inline-block;
      color: #FFF;
      text-decoration: none;
      border-radius: 3px;
      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
      -webkit-text-size-adjust: none;
      }

      .button--green {
      background-color: #22BC66;
      border-top: 10px solid #22BC66;
      border-right: 18px solid #22BC66;
      border-bottom: 10px solid #22BC66;
      border-left: 18px solid #22BC66;
      }

      .button--red {
      background-color: #FF6136;
      border-top: 10px solid #FF6136;
      border-right: 18px solid #FF6136;
      border-bottom: 10px solid #FF6136;
      border-left: 18px solid #FF6136;
      }
      /* Type ------------------------------ */

      h1 {
      margin-top: 0;
      color: #2F3133;
      font-size: 19px;
      font-weight: bold;
      text-align: left;
      }

      h2 {
      margin-top: 0;
      color: #2F3133;
      font-size: 16px;
      font-weight: bold;
      text-align: left;
      }

      h3 {
      margin-top: 0;
      color: #2F3133;
      font-size: 14px;
      font-weight: bold;
      text-align: left;
      }

      p {
      margin-top: 0;
      color: #74787E;
      font-size: 16px;
      line-height: 1.5em;
      text-align: left;
      }

      p.sub {
      font-size: 12px;
      }

      p.center {
      text-align: center;
      }
      </style>
      </head>
      <body>
      <span class="preheader">Gunakan tautan berikut untuk mengatur ulang password. Tautan hanya akan valid selama 24 jam.</span>
      <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td class="email-masthead">
              <center><img src="http://spampasigala.com/assets/frontend/images/logo3.png" /><br>
              <h1 href="http://spampasigala.com">
              SPAM PASIGALA ONLINE MONITORING
              </h1>
              </td>
            </tr>
            <!-- Email Body -->
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                  <!-- Body content -->
                  <tr>
                    <td class="content-cell">
                      <h1></h1>
                      <p>Anda telah meminta untuk melakukan reset password akun SPAM PASIGALA. Gunakan tombol berikut untuk melakukan reset. <strong>Email reset password ini hanya akan valid selama 24 jam.</strong></p>
                      <!-- Action -->
                      <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center">
                                  <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>
                                        <a href="http://admin.spampasigala.com/login/request_reset/'.$token.'" class="button button--green" target="_blank">Reset password Anda</a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <p>Abaikan email ini jika Anda merasa tidak melakukan permintaan reset password untuk SPAM PASIGALA</p>
                      <p>Terima kasih,
                        <br>Tim SPAM PASIGALA</p>
                      <!-- Sub copy -->
                      <table class="body-sub">
                        <tr>
                          <td>
                            <p class="sub">Jika Anda merasa kesusahan untuk menekan tombol di atas, salin dan tempel URL di bawah ini ke dalam browser Anda.</p>
                            <p class="sub">http://admin.spampasigala.com/login/request_reset/'.$token.'</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="content-cell" align="center">
                      <p class="sub align-center">&copy; 2018 SPAM PASIGALA. All rights reserved.</p>
                      <p class="sub align-center">
                        Balai Wilayah Sungai Sulawesi III
                        <br>Jalan Sekolah Guru Perawat No.3, Pisang Utara, Kota Makassar
                        <br>Sulawesi Selatan 90222
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      </table>
      </body>
      </html>';

        $this->email->subject('Reset Password SPAM PASIGALA');
        $this->email->message($isi);
        $this->email->send();
    }

    function get(){
        $user= $this->adminmodel->get_admin();
        $arraydata = array();
        foreach ($user as $itemnya) {
            $arraydata[] = array("username"=>$itemnya->username, "password"=>$itemnya->password, "last_login"=>$itemnya->last_login);
        }
        echo(json_encode($arraydata));
    }

    function simpan(){
      $data = (array)json_decode(file_get_contents('php://input'));
       $val=array(
        'username' => $data['username'],
        'password' => $data['password'],
        'jk' => $data['jk'],
        'alamat' => $data['alamat']
       );
    $this->adminmodel->simpan($data['username'],$data['password']);
    echo "<script type='text/javascript'>alert('wakokwao');</script>";
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
