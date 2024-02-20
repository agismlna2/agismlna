<?php

session_start();
include('../conn/koneksi.php'); // Sertakan file koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaUsers = $_POST['namaUsers'];
    $pass = $_POST['pass'];

    // Lakukan query ke database untuk memeriksa kredensial pengguna
    $sql = "SELECT * FROM users WHERE namaUsers='$namaUsers' AND pass='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Jika kredensial valid, set session dan alihkan ke halaman index
        $_SESSION['namaUsers'] = $namaUsers;
        header('Location: ../index.php');
        exit();
    } else {
        echo "Login Gagal. Coba lagi.";
    }
}

?>