<?php
// Nama : NIKOLAS RAMADHAN
// NRP : 203040049

?>

<?php
// Fungsi untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("Localhost", "root", "");
    mysqli_select_db($conn, "prakwe_a_203040049_pw");

    return $conn;
}

// Function untuk melakukan query dan memasukkannya kedalam array
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $nama_file = $_FILES['Image']['name'];
    $tipe_file = $_FILES['Image']['type'];
    $ukuran_file = $_FILES['Image']['size'];
    $error = $_FILES['Image']['error'];
    $tmp_file = $_FILES['Image']['tmp_name'];

    // Ketika tidak ada gambar yang dipilih
    if ($error == 4) {
        // echo "<script>
        //         alert('Pilih gambar terlebih dahulu!');
        //       </script>";
        return 'nophoto.jpg';
    }

    // Cek ekstensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
            alert('Yang anda pilih bukan gambar!');
          </script>";
        return false;
    }

    // Cek type file
    if ($tipe_file != 'Image/jpeg' && $tipe_file != 'Image/png') {
        echo "<script>
                alert('Yang anda pilih bukan gambar!');
              </script>";
        return false;
    }

    // Cek ukuran filw
    // Maksimal 5Mb == 5000000
    if ($ukuran_file > 5000000) {
        echo "<script>
                alert('Ukuran terlalu besar!');
              </script>";
        return false;
    }

    // Lolos pengecekan
    // Siap upload file
    // Generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, 'Image/' . $nama_file_baru);

    return $nama_file_baru;
}

// Fungsi untuk menambahkan data di database
function tambah($data)
{
    $conn = koneksi();

    $Nama_Buku = htmlspecialchars($data['Nama Buku']);
    $Penerbit = htmlspecialchars($data['Penerbit']);
    $Tanggal_Terbit = htmlspecialchars($data['Tanggal Terbit']);
    $Harga = htmlspecialchars($data['Harga']);
    // $img = htmlspecialchars($data['img']);

    // Upload gambar 
    $Image = upload();
    if (!$Image) {
        return false;
    }

    $query = "INSERT INTO buku
                        VALUES
                        ('', '$Image', '$Nama_Buku', '$Penerbit', '$Tanggal_Terbit', '$Harga')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus data di database
function hapus($id)
{
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengubah data di database
function ubah($data)
{

    $conn = koneksi();
    $id = ($data['id']);
    $Nama_Buku = htmlspecialchars($data['Nama Buku']);
    $Penerbit = htmlspecialchars($data['Penerbit']);
    $Tanggal_Terbit = htmlspecialchars($data['Tanggal Terbit']);
    $Harga = htmlspecialchars($data['Harga']);
    $Image = htmlspecialchars($data['Image']);

    $Image = upload();
    if (!$Image) {
        return false;
    }

    if ($Image == 'nophoto.jpg') {
        $Image = $Image;
    }

    $query = "UPDATE buku SET
                Nama Buku = '$Nama_Buku',
                Penerbit = '$Penerbit',
                Tanggal Terbit = '$Tanggal_Terbit',
                Harga = '$Harga',
                Image = '$Image'
                WHERE id = '$id'
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM buku WHERE
                Nama Buku LIKE '%$keyword%' OR
                Penerbit LIKE '%$keyword%' OR
                Tanggal Terbit LIKE '%$keyword%' OR
                Harga LIKE '%$keyword%' 
                ";
    return query($query);
}
?>