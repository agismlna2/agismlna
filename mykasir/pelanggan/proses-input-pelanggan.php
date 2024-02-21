<?php

include "../config.php"; // Pastikan file config.php ada dan terhubung dengan benar

if (isset($_POST['submit'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO pelanggan(nama_pelanggan, alamat, telepon) VALUES ('$nama_pelanggan', '$alamat', '$telepon')";

    if (mysqli_query($conn, $sql)) {
        header('Location: input-pelanggan.php');
        exit(); // Pastikan untuk keluar setelah mengarahkan pengguna
    } else {
        die("Input gagal: " . mysqli_error($conn));
    }
}

?>