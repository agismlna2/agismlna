<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
session_destroy();

// Redirect pengguna kembali ke halaman login
header("Location: login/login.php");
exit;
?>