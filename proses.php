<?php 
include "../conn/koneksi.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Fungsi untuk mendapatkan ID penjualan yang unik
function generatePenjualanId() {
    return 'PJ' . date('YmdHis') . rand(100, 999);
}

if (isset($_POST['submit'])) {
    $idTransaksi = generatePenjualanId();
    $totalSemua = $_POST['totalSemua'];
    $tgl = date('Y-m-d H:i:s');
    $idPelanggan = 1;
    
    $sqlTransaksi =  "INSERT INTO transaksi (idTransaksi, tgl, totalSemua, idPelanggan) VALUES ('$idTransaksi', '$tgl', '$totalSemua','$idPelanggan')";
    $queryTr = mysqli_query($conn, $sqlTransaksi);
    
    if ($queryTr) {
        foreach ($_SESSION['cart'] as $idProduk => $jumlah) {
            // Ambil informasi produk dari database
            $sqlProduk = "SELECT * FROM produk WHERE idProduk=$idProduk";
            $queryProduk = mysqli_query($conn, $sqlProduk);
            $produk = mysqli_fetch_assoc($queryProduk);

            $subtotal = $produk['harga'] * $jumlah;
            
            $sqlDtr =  "INSERT INTO detailTransaksi (idTransaksi, idProduk, jumlah, totalHarga, idUser) VALUES ( '$idTransaksi', '$idProduk', '$jumlah', '$subtotal' , '1')";
            
            $queryDtr = mysqli_query($conn, $sqlDtr);
        }

        if ($queryDtr) {
            unset($_SESSION['cart']);
            header("location:../nota/cetak-nota.php?idTransaksi=$idTransaksi");
            exit(); // Penting: pastikan untuk keluar setelah mengarahkan pengguna
        } else {
            die('gagal ' .mysqli_error($conn));
        }
    } else {
        die('gagal ' .mysqli_error($conn));
    }
}
?>