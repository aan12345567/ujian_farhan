<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #007bff;
            overflow: hidden;
        }
        nav li {
            float: left;
        }
        nav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav li a:hover {
            background-color: #0056b3;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard_admin.php">Data Pembelian</a></li>
            <li><a href="pendataan_barang.html">Pendataan Barang</a></li>
            <li><a href="stok_barang.php">Stok Barang</a></li>
            <li><a href="register_petugas.html">Register Petugas</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <?php
// Mengambil koneksi ke database (koneksi.php)
include 'koneksi.php';

// Query untuk mengambil data dari tabel pelanggan
$query_pelanggan = "SELECT * FROM pelanggan";
$result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

// Query untuk mengambil data dari tabel penjualan
$query_penjualan = "SELECT * FROM penjualan";
$result_penjualan = mysqli_query($koneksi, $query_penjualan);

// Memeriksa apakah query berhasil dieksekusi
if ($result_pelanggan && $result_penjualan) {
    // Menampilkan data pelanggan
    echo "<h2>Data Pelanggan</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nama</th><th>Alamat</th><th>Nomor Telepon</th></tr>";
    while ($row_pelanggan = mysqli_fetch_assoc($result_pelanggan)) {
        echo "<tr>";
        echo "<td>{$row_pelanggan['NamaPelanggan']}</td>";
        echo "<td>{$row_pelanggan['Alamat']}</td>";
        echo "<td>{$row_pelanggan['NomorTelepon']}</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Menampilkan data penjualan dan detail penjualan
    echo "<h2>Data Penjualan</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Tanggal Penjualan</th><th>Total Harga</th><th>Jumlah Produk</th><th>Subtotal</th></tr>";
    while ($row_penjualan = mysqli_fetch_assoc($result_penjualan)) {
        echo "<tr>";
        echo "<td>{$row_penjualan['TanggalPenjualan']}</td>";
        echo "<td>{$row_penjualan['TotalHarga']}</td>";
        
        // Query untuk mengambil data jumlah produk dan subtotal dari detailpenjualan
        $query_detail_penjualan = "SELECT COUNT(*), SUM(Subtotal) FROM detailpenjualan WHERE PenjualanID = {$row_penjualan['PenjualanID']}";
        $result_detail_penjualan = mysqli_query($koneksi, $query_detail_penjualan);
        $row_detail_penjualan = mysqli_fetch_assoc($result_detail_penjualan);
        echo "<td>{$row_detail_penjualan['COUNT(*)']}</td>";
        echo "<td>{$row_detail_penjualan['SUM(Subtotal)']}</td>";

        echo "</tr>";
    }
    echo "</table>";

    // Bebaskan hasil
    mysqli_free_result($result_pelanggan);
    mysqli_free_result($result_penjualan);
} else {
    echo "Gagal mengambil data.";
}

// Menutup koneksi
mysqli_close($koneksi);
?>

</body>
</html>
