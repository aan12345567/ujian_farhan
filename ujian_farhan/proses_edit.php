<?php
include 'koneksi.php';

$id_to_update = $_POST['id'];
$new_NamaProduk = $_POST['NamaProduk'];
$new_Stok = $_POST['Stok'];
$new_Harga = $_POST['Harga'];


$query_update = "UPDATE produk SET NamaProduk = '$new_NamaProduk', Stok = '$new_Stok', Harga = '$new_Harga' WHERE ProdukID = $id_to_update";
$result_update = mysqli_query($koneksi, $query_update);

if ($result_update) {
    echo "<script> 
            alert('Data Berhasil Diubah');
            window.location.href = 'stok_barang1.php';
              </script>";
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
