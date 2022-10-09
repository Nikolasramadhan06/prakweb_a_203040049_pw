<?php
// Nama : Nikolas Ramadhan
// NRP : 203040049
?>

<?php

class About
{
  public function index($nama = 'Nikolas', $pekerjaan = 'Mahasiswa')
  {
    // echo 'about/index';
    // echo "Halo, nama saya Egi Rahayu, saya adalah seorang Mahasiswa";
    echo "Halo, nama saya $nama, saya adalah seorang $pekerjaan";
  }

  public function page()
  {
    echo 'About/page';
  }
}
