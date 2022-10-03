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
    $Harga;

  public function __construct($Nama_Buku = "Nama Buku", $Penerbit = "Penerbit", $Tanggal_Terbit = "Tanggal Terbit", $Harga = 0)
  {
    // echo "Hello World!";
    $this->Nama_Buku = $Nama_Buku;
    $this->Penerbit = $Penerbit;
    $this->Tanggal_Terbit = $Tanggal_Terbit;
    $this->Harga = $Harga;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }
}

$produk1 = new Produk("arsip", "Erlangga", "10-11-2009", 10000);
$produk2 = new Produk("Tekper", "Erlangga", "11-10-2009", 50000);
$produk3 = new Produk("Kepegawaian");

echo "Buku : " . $produk1->getLabel();
echo "<br>";
echo "Bk : "  . $produk2->getLabel();
echo "<br>";
var_dump($produk3);
