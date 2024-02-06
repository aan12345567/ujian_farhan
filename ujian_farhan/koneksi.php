<?php   

$servername = "localhost";
$username = "root";
$password = "";
$database = "ujian_farhan";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die ("Koneksi Gagal :" . mysqli_connect_error());
} else {
    echo "";
}

?>