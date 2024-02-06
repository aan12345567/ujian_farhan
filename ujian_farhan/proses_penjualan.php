<?php

include 'koneksi.php';


$tanggal = $_POST['tanggal'];
$total = $_POST['total'];


$query = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga) VALUES ('$tanggal', '$total')";


if (mysqli_query($koneksi, $query)) {
    echo "<script> 
            alert('Data Berhasil Disimpan');
            window.location.href = 'detail_penjualan.html';
            </script>";
} else {
    echo "Gagal menyimpan data penjualan: " . mysqli_error($koneksi);
}


mysqli_close($koneksi);
?>
