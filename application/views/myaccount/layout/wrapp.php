<?php
//Proteksi Halaman Admin
if ($this->session->userdata('role_id') == 5) {
    is_login();
    //Gabungan Semua layout
    require_once('header.php');
    require_once('sidebar.php');
    require_once('topbar.php');

    require_once('content.php');
    require_once('footer.php');
} else {
  $this->session->set_flashdata('message', '<div class="alert alert-danger">Akses tidak di berikan Silahkan Login</div> ');
  redirect('auth');
}
