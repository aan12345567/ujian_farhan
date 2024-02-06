<?php
// Pastikan ada koneksi ke database sebelum menjalankan query
include 'koneksi.php';

// Tangkap data yang dikirimkan melalui formulir
$jumlah = $_POST['jumlah'];
$subtotal = $_POST['subtotal'];

// Query untuk menyimpan data ke dalam tabel penjualan_produk
$query = "INSERT INTO detailpenjualan (JumlahProduk, Subtotal) VALUES ('$jumlah', '$subtotal')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script> 
            alert('Data Berhasil Disimpan');
            window.location.href = 'dashboard_petugas.html';
              </script>";
} else {
    echo "Gagal menyimpan data penjualan produk: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
