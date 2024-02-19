<?php

include "../config.php";

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_produk = $_POST['id_produk'];
    $nama_kategori = $_POST['nama_kategori'];
    $nama_produk= $_POST['nama_produk'];
    $harga= $_POST['harga'];
    $stok= $_POST['stok'];
    $tgl_input= $_POST['tgl_input'];

    // buat query update
    $sql = "UPDATE produk SET 
    nama_kategori='$nama_kategori', 
    nama_produk='$nama_produk',  harga='$harga',  stok='$stok',  tgl_input='$tgl_input'
    WHERE id_produk='$id_produk' ";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman produk.php
        header('Location: ../produk.php?status=sukses');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>