<?php
// Nama : NIKOLAS RAMADHAN
// NRP : 203040049
?>

<?php
// Menghubungkan dengan file php lainnya
require 'functions.php';

// Melakukan query dari database
$buku = query("SELECT * FROM buku");

if (isset($_POST["cari"])) {
  $buku = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css materialize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- materialize icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- css lokal -->
 
  <title>Book Store</title>
</head>

<body>
  <div class="container">
    <h3 class="center">Menjual Buku Sekolah Menengah Kejuaruan</h3>

    <div class="row">
      <div class="col m9 s12">
        <div class="add">
          <a href="tambah.php" class="btn-floating btn-large waves-effect waves-light black"><i class="material-icons">add</i></a>
        </div>
      </div>
      <div class="col m3 s12">
        <div class="search">
          <form action="" method="POST">
            <input type="text" name="keyword" size="30" autofocus autocomplete="off">
            <button type="submit" name="cari" class="waves-effect waves-light brown darken-4 btn" style="font-size: 18px;"><i class="material-icons" style="margin-right: 10px;">search</i>Search</button>
          </form>
        </div>
      </div>
    </div>

    <table class="striped">
      <tr class="orange darken-2">
        <th class="center">No</th>
        <th class="center">Image</th>
        <th>Nama Buku</th>
        <th>Penerbit</th>
        <th>Tanggal terbit</th>
        <th class="center">Opsi</th>
      </tr>

      <?Php if (empty($buku)) : ?>
        <tr>
          <td colspan="7">
            <h1>Data tidak ditemukan</h1>
          </td>
        </tr>
      <?php else : ?>

        <?php $i = 1; ?>

        <?php foreach ($buku as $bk) : ?>
          <tr class="grey darken-3 white-text">
            <td class="center"><?= $i; ?></td>
            <td class="center"><img src="Image/<?= $bk['Image']; ?>" width="150px"></td>
            <td><?= $bk['Nama Buku']; ?></td>
            <td><?= $bk['Penerbit']; ?></td>
            <td><?= $bk['Tanggal Terbit']; ?></td>
            <td class="center">
              <a href="ubah.php?id=<?= $bk['id']; ?>" class="waves-effect waves-light blue darken-2 btn">Ubah</a>
              <a href="hapus.php?id=<?= $bk['id']; ?>" class="waves-effect waves-light red darken-2 btn" onclick="return confirm('Hapus Data?')">Hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</body>

</html>