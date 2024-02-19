<?php

include("../config.php");

if(isset($_POST['simpan'])){
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    $tgl_input= $_POST['tgl_input'];

    // Melakukan sanitasi input
    $id_kategori = mysqli_real_escape_string($conn, $id_kategori);
    $nama_kategori = mysqli_real_escape_string($conn, $nama_kategori);
    $tgl_input = mysqli_real_escape_string($conn, $tgl_input);

    $sql = "UPDATE kategori SET 
    nama_kategori='$nama_kategori', 
    tgl_input='$tgl_input' 
    WHERE id_kategori='$id_kategori' ";

    $query = mysqli_query($conn, $sql);

    if($query) {
        header('Location: ../kategori.php');
        exit(); // Pastikan script berhenti setelah header
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}

?>