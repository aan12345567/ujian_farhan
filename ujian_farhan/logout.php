<?php
// Mulai session
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang diinginkan
echo "<script> 
            alert('Logout Berhasil');
            window.location.href = 'login.html';
              </script>";
exit;
?>
