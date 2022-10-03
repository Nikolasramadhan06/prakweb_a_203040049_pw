<?php
// Nama : NIKOLAS RAMADHAN
// NRP : 203040049
?>

<?php


class Produk
{
  public $Nama_Buku = "Nama Buku",
    $Penerbit = "Erlangga",
    $penerbit = "10-09-2009",
    $harga = 0;

  // public function sayHello()
  // {
  //   return "Hello World!";
  // }

  public function getLabel()
  {
    return "$this->Penerbit, $this->Tanggal_Terbit";
  }
}



$produk3 = new Produk();
$produk3->Nama_Buku = "arsip";
$produk3->Penerbit = "Erlangga";
$produk3->Tanggal_Terbit = "11-11-2011";
$produk3->harga = 30000;



// echo "<hr>";

$produk4 = new Produk();
$produk4->Nama_Buku= "Tekper";
$produk4->penerbit = "Erlangga";
$produk4->Tanggal_Terbit = "10-12-2010";
$produk4->harga = 50000;

echo "buku : " . $produk3->getLabel();
echo "<br>";
echo "bk: "  . $produk4->getLabel();
