<?php

class Login extends CI_Controller
{
    public function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
    $this->load->model('AksesModel');
    $this->load->library('encrypt');
  }

  public function index()
  {
    if ($this->session->userdata('authenticated')){
      // if ($this->session->userdata('level') == 1) {
        redirect('dashboard');
      // } elseif ($this->session->userdata('level') == 2) {
      //   redirect('dashboard');
      // } elseif ($this->session->userdata('level') == 3) {
      //   redirect('dashboard');
      // } elseif ($this->session->userdata('level') == 4) {
      //   redirect('dashboard');
      // } elseif ($this->session->userdata('level') == 5) {
      //   //   redirect('Maintenance');
      //   redirect('sales/transaksi');
      // } elseif ($this->session->userdata('level') == 6) {
      //   redirect('supervisor/dashboard/index/0');
      // } elseif ($this->session->userdata('level') == 7) {
      //   redirect('gudang_produksi/cekstok');
      // }
    }

    $this->load->view('login.php');
  }

  public function login()
  {
    // $post = $_POST;
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    
    $user = $this->login_model->getUsername($username);
    // $akses = $this->aksesmodel->getRole($user->id_role);
    // var_dump($user);die;
    
    // $pass = $this->encryption->decrypt('$2y$10$Ugsj9vmgDXpC1kmMhJ9KCe7jMPvSUKA/8ebNFG7DO.Aomlxi2.MDW');
    
    if (empty($user)) {
      $this->session->set_flashdata('empty', 'Periksa Kembali Username dan Password Anda !');
      redirect('login');
    } else{
      // $password_decrypt = $this->encrypt->decode($password);
      if ($password == md5($user->password)) {
          // var_dump($user);die;
            // if($user->id_akun == 1 || $user->id_akun == 10 || $user->id_akun == 5 || $user->id_akun == 6){
            // if (empty($user->id_gudang)) {
              $session = array(
                'authenticated' => true,
                'id_user' => $user->id_user,
                'nama_user' => $user->nama_user,
                'level' => $user->nama_role,
                'role' => $user->id_role
              );

          $this->session->set_userdata('ci_session_key_generate', TRUE);
          $this->session->set_userdata('ci_seesion_key', $session);
          // remember me
            if(!empty($this->input->post("rememberme"))) {
              setcookie ("loginId", $username, time()+ (365 * 24 * 60 * 60));
              setcookie ("loginPass", $user->password,  time()+ (365 * 24 * 60 * 60));
            } else {
              // This will make $_SESSION['otp'] available only for the next 5 minutes
              // $this->session->set_tempdata('otp', $your_value, 300);

              setcookie ("loginId","");
              setcookie ("loginPass","");
            }
            // }

          $this->session->set_userdata($session);

        //   echo $this->session->userdata('id_gudang');

          // if ($this->session->userdata('level') == "super admin") {
            redirect('dashboard');
          // } elseif (condition) {
          //   # code...
          // }
        } else {
          $this->session->set_flashdata('empty', 'Periksa Kembali Username dan Password Anda !');
          redirect('login');
        }
    }
  }

  public function logout()
  {
    if($this->session->flashdata('ganti_password')){
      $this->session->sess_destroy();
      $this->session->set_flashdata('ganti_password', 'Kata Sandi Berhasil Diganti, Silahkan Login Kembali');
      $this->load->view('login');
    } else {
      $this->session->sess_destroy();
      $this->session->unset_userdata('ci_seesion_key');
      $this->session->unset_userdata('ci_session_key_generate');
      redirect('login');
    }
  }
}