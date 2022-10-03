<?php
// Nama : NIKOLAS RAMADHAN
// NRP : 203040049
?>

<?php
require 'functions.php';

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                    alert('Data Berhasil ditambahkan!');
                    document.location.href = 'index.php';
                  </script>";
    } else {
        echo "<script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'index.php';
                  </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- materialize icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- css lokal -->
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data Buku </title>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-panel">
                <h5>Form Tambah Data</h5>
                <div class="input-field">
                    <input type="text" name="Nama Buku" id="Nama Buku" class="validate" autocomplete="off">
                    <label for="Nama Buku">Nama Buku</label>
                </div>
                <div class="input-field">
                    <input type="text" name="Nama Buku" id="Nama Buku">
                    <label for="Penerbit">Penerbit</label>
                </div>
                <div class="input-field">
                    <input type="text" name="Tanggal Terbit" id="Tanggal Terbit" class="validate" autocomplete="off">
                    <label for="Tanggal Terbit">Tanggal Terbit</label>
                </div>
                <div class="input-field">
                    <input type="text" name="Harga" id="Harga" class="validate" autocomplete="off">
                    <label for="Harga">Harga</label>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" multiple name="Image" class="Image" onchange="previewImage()">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload Gambar">
                    </div>
                    <img src="image/nophoto.jpg" width="150px" style="display: block;" class="img-preview">
                </div>
                <button class="waves-effect waves-light orange darken-4 btn" type="submit" name="tambah">Tambah Data!</button></a>
                <button class="waves-effect waves-light orange darken-4 btn" type="submit">
                    <a href="index.php" style='text-decoration: none; color: white;'>Kembali</a>
                </button>
            </div>
        </form>
    </div>

    <!-- script materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- script lokal -->
    <script src="script.js"></script>
</body>

</html>