<?php
// Pastikan ada koneksi ke database sebelum menjalankan query
include 'koneksi.php';

// Tangkap data yang dikirimkan melalui formulir
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// Query untuk menyimpan data ke dalam tabel pelanggan
$query = "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES ('$nama', '$alamat', '$telepon')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script> 
    alert('Data Berhasil disimpan');
    window.location.href = 'penjualan.html';
      </script>";
} else {
    echo "Gagal menyimpan data pelanggan: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
