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
            <h2>Nota Pembelian</h2>
            <p>Tanggal: <?php echo date("d-m-Y"); ?></p>
            <p>ID TR : <?= $id_penjualan?></p>
        </div>
        <?php
        // Loop untuk menampilkan item-item pembelian
        $totalPembelian = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='item'>";
            echo "<span>ID Produk:</span> " . $row["id_produk"] . "<br>";
            echo "<span>Nama Produk:</span> " . $row["nama_produk"] . "<br>";
            echo "<span>Jumlah:</span> " . $row["jumlah_produk"] . "<br>";
            echo "<span>Total Harga:</span> " . $row["subtotal"] . "<br>";
            echo "</div>";
            $total_harga += $row["subtotal"];
        }
        ?>
        <div class="total">
            <p>Total Pembelian: Rp. <?php echo number_format($total_harga, 0,',', '.' )?></p>
        </div>
        <p>Terima kasih atas pembeliannya!</p>
        
    </div>
    
    
    <script>
     window.print();
    </script>
</body>
</html>

<?php
// Bebaskan hasil setelah digunakan
mysqli_free_result($result);

// Tutup koneksi database setelah selesai
mysqli_close($conn);
?>
</body>
</html>