<?php
include 'koneksi.php';

// Mendapatkan data dari form
$NamaProduk = $_POST['NamaProduk'];
$Stok = $_POST['Stok'];
$Harga = $_POST['Harga'];

// Gunakan prepared statement untuk menghindari SQL injection
$sql = "INSERT INTO produk (NamaProduk, Stok, Harga) VALUES ('$NamaProduk', '$Stok', '$Harga')";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    echo "<script> 
    alert('Data Berhasil Dimasukkan');
    window.location.href = 'stok_barang.php';
    </script>";
} else {
    echo "Register Gagal" . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
