<?php
// Nama : Nikolas Ramadhan
// NRP : 203040049
?>

<?php

class Home extends Controller
{
  public function index()
  {
    $data['judul'] = 'Home';
    $data['nama'] = $this->model('user_model')->getUser();
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}
