<?php

include "../config.php"; // Pastikan file configi.php ada dan terhubung dengan benar

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // tambahkan algoritma hash yang diinginkan, dalam kasus ini, PASSWORD_DEFAULT
    $level = $_POST['level'];

    $sql = "INSERT INTO users (username, alamat, telpon, password, level) VALUES ('$username', '$alamat', '$telpon', '$password', '$level')";

    if (mysqli_query($conn, $sql)) {
        header('Location: form-login.php');
        exit(); // Pastikan untuk keluar setelah mengarahkan pengguna
    } else {
        die("Input gagal: " . mysqli_error($conn));
    }
}

?>