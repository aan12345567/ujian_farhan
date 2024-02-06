<?php
include 'koneksi.php';

// Periksa apakah parameter 'id' telah diberikan
if (isset($_GET['id'])) {
    // Mendapatkan ID data yang akan dihapus dari parameter URL
    $id_to_delete = $_GET['id'];

    // Query DELETE untuk menghapus data produk
    $query_delete = "DELETE FROM produk WHERE ProdukID = $id_to_delete";
    
    // Eksekusi query DELETE
    if (mysqli_query($koneksi, $query_delete)) {
        echo "<script> 
            alert('Data Berhasil Dihapus');
            window.location.href = 'stok_barang1.php';
              </script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "Parameter 'id' tidak diberikan.";
    exit();
}

// Tutup koneksi
mysqli_close($koneksi);
?>
