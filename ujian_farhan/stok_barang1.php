<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #007bff;
            overflow: hidden;
        }
        li {
            float: left;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .actions {
            text-align: center;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="dashboard_petugas.html">Data Pembelian</a></li>
        <li><a href="pendataan_barang1.html">Pendataan Barang</a></li>
        <li><a href="stok_barang1.php">Stok Barang</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <?php

include 'koneksi.php';

$query_produk = "SELECT * FROM produk";
$result_produk = mysqli_query($koneksi, $query_produk);

if (mysqli_num_rows($result_produk) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>NamaProduk</th><th>Stok</th><th>Harga</th><th>Aksi</th></tr>";
    
    // Tampilkan data produk
    while ($row = mysqli_fetch_assoc($result_produk)) {
        echo "<tr>";
        echo "<td>".$row['NamaProduk']."</td>";
        echo "<td>".$row['Stok']."</td>";
        echo "<td>".$row['Harga']."</td>";
        echo "<td>
                <a href='edit.php?id=".$row['ProdukID']."'>Edit</a> | 
                <a href='hapus.php?id=".$row['ProdukID']."'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data produk.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>

    
</body>
</html>
