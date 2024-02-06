<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Produk</h2>
    <?php  
    include 'koneksi.php';

    

    $id_to_update=$_GET['id'];
    $query_produk = "SELECT * FROM produk WHERE ProdukID=$id_to_update";
    $product = mysqli_query($koneksi, $query_produk);

    $product = mysqli_fetch_array($product);

    ?>

    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $product['ProdukID']; ?>">
        <label for="NamaProduk">Nama Produk:</label>
        <input type="text" id="NamaProduk" name="NamaProduk" value="<?php echo $product['NamaProduk']; ?>" required>

        <label for="Stok">Stok:</label>
        <input type="number" id="Stok" name="Stok" value="<?php echo $product['Stok']; ?>" required>

        <label for="Harga">Harga:</label>
        <input type="text" id="Harga" name="Harga" value="<?php echo $product['Harga']; ?>" required>

        <input type="submit" value="Simpan Perubahan">
    </form>
</div>

</body>
</html>
