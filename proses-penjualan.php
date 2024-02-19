<?php 
include "../config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Fungsi untuk mendapatkan ID penjualan yang unik
function generateIdPenjualan() {
    return 'PJ' . date('YmdHis');
}

if (isset($_POST['submit'])) {
    $id_penjualan = generateIdPenjualan();
    $total_semua = $_POST['totalSemua'];
    $tgl_penjualan = date('Y-m-d H:i:s');
    
    
    
    $sqlPenjualan =  "INSERT INTO penjualan (id_penjualan, tgl_penjualan, total_harga, id_pelanggan) VALUES ('$id_penjualan', '$tgl_penjualan', '$total_semua','1')";
    $queryTr = mysqli_query($conn, $sqlPenjualan);
    
    if ($queryTr) {
        foreach ($_SESSION['cart'] as $id_produk => $jumlah_produk) {
            // Ambil informasi produk dari database
            $sqlProduk = "SELECT * FROM produk WHERE id_produk=$id_produk";
            $queryProduk = mysqli_query($conn, $sqlProduk);
            $produk = mysqli_fetch_assoc($queryProduk);

            $subtotal = $produk['harga'] * $jumlah_produk;
            
            $sqlDtr =  "INSERT INTO detail_penjualan (id_penjualan, id_produk, jumlah_produk, subtotal, id_users) VALUES ( '$id_penjualan', '$id_produk', '$jumlah_produk', '$subtotal' , '1')";
            
            $queryDtr = mysqli_query($conn, $sqlDtr);
        }

        if ($queryDtr) {
            unset($_SESSION['cart']);
            header("location:../nota/cetak-nota.php?id_penjualan=$id_penjualan");
            exit(); // Penting: pastikan untuk keluar setelah mengarahkan pengguna
        } else {
            die('gagal ' .mysqli_error($conn));
        }
    } else {
        die('gagal ' .mysqli_error($conn));
    }
}
?>