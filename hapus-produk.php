<?php

include "../config.php";

if( isset($_GET['id_produk']) ){

    // ambil id dari query string
    $id_produk = $_GET['id_produk'];

    // buat query hapus
    $sql = "DELETE FROM produk WHERE id_produk=$id_produk";
    $query = mysqli_query($conn, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header("Location: ../produk.php?status=sukses");
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>