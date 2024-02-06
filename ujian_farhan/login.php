<?php    

session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query ($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_array($login);
    if ($data['level'] == "admin") {
        $_SESSION ['username'] = $username;
        $_SESSION ['password'] = $password;
        echo "<script> 
            alert('Login Berhasil');
            window.location.href = 'dashboard_admin.php';
              </script>";
    } else if ($data['level'] == "petugas") {
        $_SESSION ['username'] = $username;
        $_SESSION ['password'] = $password;
        echo "<script> 
            alert('Login Berhasil');
            window.location.href = 'dashboard_petugas.html';
              </script>";
    } else {
        echo "<script> 
            alert('Login Gagal');
            window.location.href = 'login.html';
              </script>";
    }
}

?>