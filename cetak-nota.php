<?php
include "../config.php";

  $id_penjualan = $_GET['id_penjualan'];
  
  //query untuk membuat inner join table penjualan dan table detail_penjualan
   $sql = "SELECT penjualan.id_penjualan, penjualan.tgl_penjualan, penjualan.total_harga, detail_penjualan.id_produk, detail_penjualan.jumlah_produk, detail_penjualan.subtotal, produk.nama_produk, produk.harga
       FROM penjualan
       INNER JOIN detail_penjualan ON penjualan.id_penjualan =detail_penjualan.id_penjualan
       INNER JOIN produk ON detail_penjualan.id_produk = produk.id_produk
       WHERE penjualan.id_penjualan='$id_penjualan'";
    
  //eksekusi query
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  //cek apakah terjadi error dalam eksekusi query
  if (!$result) {
    die('Error: ' .mysqli_error($conn)); //tampilkan pesan error
  }
  ?>
  
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 300px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .detail {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .detail:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .detail p {
            margin: 5px 0;
            font-size: 14px;
        }
        .total {
            margin-top: 10px;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Struk Belanja</h2>
        <div class="detail">
            <p>Tanggal Penjualan: <?php echo $data['tgl_penjualan']; ?></p>
        </div>
    </div>
    <?php 
    // Inisialisasi total harga di luar loop
    $total_harga = 0;
    
    // Mulai loop dari hasil query
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="detail">
            <p>ID Produk: <?php echo $row['id_produk']; ?></p>
            <p>Nama Produk: <?php echo $row['nama_produk']; ?></p>
            <p>Jumlah Produk: <?php echo $row['jumlah_produk']; ?></p>
            <p>Total Harga: Rp.<?php echo $row['subtotal']; ?></p>
        </div>
        <?php 
        // Tambahkan subtotal ke total harga
        $total_harga += $row['subtotal'];
    } 
    ?>
    <div class="total">
        <p>Total Belanja: Rp.<?php echo $total_harga; ?></p>
    </div>
</div>
</body>
</html>