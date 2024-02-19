<?php

include "../config.php";

if( isset($_GET['id_kategori']) ){

    // ambil id dari query string
    $id_kategori = $_GET['id_kategori'];

    // buat query hapus
    $sql = "DELETE FROM kategori WHERE id_kategori=$id_kategori";
    $query = mysqli_query($conn, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header("Location: ../kategori.php?status=sukses");
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>