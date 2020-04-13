<?php

class Home extends CI_Controller
{
  function_construct()
  {
    parent::_construct()
    $this->load->model(['modelbuku', 'modeluser', 'modelbooking']);
  }
  public function index()
  {
    $data = [
        'judul' => "katalog buku",
        'buku'  => $this->modelbuku->getbuku()->result(),
    ];

    if ($this->session->userdata('email')) {
        $user = $this->modeluser->cekData(['email' => $this->session-
>userdata('email')])->row_array();
        $data['user'] = $user['nama'];
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/daftarbuku', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer', $data);
  } else {
        $data['user'] = 'pengunjung';
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/daftarbuku', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer', $data);
  }
}
