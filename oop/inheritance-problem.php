<?php
// Nama : NIKOLAS RAMADHAN
// NRP : 203040049
?>

<?php

class Produk
{
  public $Nama_Buku,
     $Penerbit,
     $Tanggal_Terbit,
    $Harga,
    $jmlHalaman,
    $waktuMain,
    $tipe;

  public function __construct($Nama_Buku = "Nama Buku", $Penerbit = "Penerbit", $Tanggal_Terbit = "Tanggal Terbit", $Harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe)
  {
    // echo "Hello World!";
    $this->Nama_Buku = $Nama_Buku;
    $this->Penerbit = $Penerbit;
    $this->Tanggal_Terbit = $Tanggal_Terbit;
    $this->Harga = $Harga;
    $this->jmlHalaman = $jmlHalaman;
    $this->waktuMain = $waktuMain;
    $this->tipe = $tipe;
  }

  public function getLabel()
  {
    return "$this->Penerbit, $this->Tanggal Terbit";
  }

  public function getInfoLengkap()
  {

    $str = "{$this->tipe} : {$this->Nama_Buku} | {$this->getLabel()}, (Rp. {$this->harga})";

    if ($this->tipe == "Buku") {
      $str .= " - {$this->jmlHalaman} Halaman.";
    } else if ($this->tipe == "Game") {
      $str .= " - {$this->waktuMain} Jam.";
    }

    return $str;
  }
}

class CetakInfoProduk
{
  public function cetak(Produk $produk)
  {
  
    $str = "{$produk->Nama_Buku} | {$produk->getLabel()}, (Rp. {$produk->harga})";
    return $str;
  }
}
$produk1 = new Produk("arsip", "Erlangga", "10-11-2009", 10000, 100, 0, "Buku");
$produk2 = new Produk("Tekper", "Erlangga", "11-10-2009", 50000, 0, 50, "Bk");




echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
