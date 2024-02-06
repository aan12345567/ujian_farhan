<?php      

include 'koneksi.php';

$name = $_POST ['nama'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$level = $_POST ['level'];

$sql = "INSERT INTO user (name, username, password, level) VALUES ('$name', '$username', '$password', '$level')";

$result = mysqli_query($koneksi, $sql);

if ($result) {
    echo "<script> 
    alert('Register Berhasil');
    window.location.href = 'dashboard_admin.html';
    </script>";
} else {
    echo "Register Gagal" . mysqli_error($koneksi);
}

?>