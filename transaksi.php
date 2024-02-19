<?php 
include "../conn/koneksi.php";

session_start();

// Cek apakah session cart sudah ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Inisialisasi sebagai array kosong jika belum ada
}

// Tambahkan produk ke keranjang saat ada request dengan parameter idProduk
if (isset($_GET['idProduk'])) {
    $idProduk = $_GET['idProduk'];

    // Cek apakah produk sudah ada di keranjang
    if (isset($_SESSION['cart'][$idProduk])) {
        // Jika sudah, tambahkan jumlah
        $_SESSION['cart'][$idProduk]++;
    } else {
        // Jika belum, tambahkan produk ke keranjang
        $_SESSION['cart'][$idProduk] = 1;
    }
    header('location:transaksi.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    *, body {
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php include "../frontPart/navbar.php" ?>
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cari Barang</h5>
            <form action="" method="get" accept-charset="utf-8">
              <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="pencarian" aria-describedby="addon-wrapping" value="<?php if (isset($_GET['pencarian'])) { echo $_GET['pencarian']; }?>">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Hasil Pencarian</h5>
            <?php 
            if (isset($_GET['pencarian']) && !empty(trim($_GET['pencarian']))) {
                $pencarian = $_GET['pencarian'];
                $sql ="SELECT * FROM produk WHERE idProduk LIKE '%$pencarian%' OR category_name LIKE '%$pencarian%' 
                OR namaProduk LIKE '%$pencarian%'  OR tglInput LIKE '%$pencarian%'
                ";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>KATEGORI</th>
                                <th>MERK</th>
                                <th>HARGA</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1; 
                            while($data = mysqli_fetch_array($query)) {?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?=$data['namaProduk']; ?></td>
                                    <td><?=$data['category_name']; ?></td>
                                    <td><?=$data['merk']; ?></td>
                                    <td><?=
                                    number_format($data['harga'], 0, ',', '.')
                                    ; ?></td>
                                    <td>
                                      <a href="delete/delete-produk.php?idProduk=<?= $data['idProduk'];?>" onclick="return confirm('yakin menghapus?');">delete</a>
                                      <a href="?idProduk=<?= $data['idProduk'];?>">masukan keranjang</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "<p>Tidak ada hasil yang ditemukan.</p>";
                }
            } elseif (isset($_GET['pencarian']) && empty(trim($_GET['pencarian']))) {
                echo "<p>Silakan masukkan kata kunci pencarian.</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Kolom pencarian -->
    
    <!-- Kolom pembelian -->
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pesanan</h5>
            <form action="proses.php" method="post" accept-charset="utf-8">
              <table class="table" id="tabel-pesanan">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH</th>
                    <th>TOTAL</th>
                    <th>KASIR</th>
                    <th>OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $totalSemua = 0;
                  $no = 1;
                  foreach ($_SESSION['cart'] as $idProduk => $jumlah) {
                      // Ambil informasi produk dari database
                      $sql = "SELECT * FROM produk WHERE idProduk=$idProduk";
                      $query = mysqli_query($conn, $sql);
                      $produk = mysqli_fetch_assoc($query);
                      
                      $totalHargaProduk = $jumlah * $produk['harga'];
                      $totalSemua += $totalHargaProduk;
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $produk['namaProduk'] ?></td>
                    <td>
                      <input class="form-control jumlah" type="number" name="jumlah[]" value="<?= $jumlah ?>" data-harga="<?= $produk['harga'] ?>" >
                    </td>
                    <td>
                      <input class="form-control total" type="text" name="total[]" value="<?= number_format($totalHargaProduk, 0, ',', '.') ?>" readonly>
                    </td>
                    <td>ANDRI NURJAMAN</td>
                    <td>
                      <a href="hapus-dari-keranjang.php?idProduk=<?= $idProduk ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-3">
                  <label for="totalSemua">TOTAL SEMUA :</label>
                  <input class="form-control" type="text" name="totalSemua"id="totalSemua" value="<?= number_format($totalSemua, 0,',', '.' )?>" readonly>
                </div>
                <div class="col-md-3">
                  <label for="uangBayar">BAYAR</label>
                  <input class="form-control" type="text" name="uangBayar" id="uangBayar" oninput="hitungKembalian()">
                </div>
                <div class="col-md-3">
                  <label for="uangKembalian">KEMBALI</label>
                  <input class="form-control" type="text" name="uangKembalian" id="uangKembalian" value="" readonly>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-success btn-block" type="submit" name="submit">CHECKOUT</button> || <a href="../nota/cetak-nota.php">cetak nota</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Kolom pembelian -->
  </div>

  <script>
    function hitungKembalian() {
      var totalSemua = parseInt(document.getElementById('totalSemua').value.replace(/\D/g,''));
      var uangBayar = parseInt(document.getElementById('uangBayar').value.replace(/\D/g,''));
      var uangKembalian = uangBayar - totalSemua;
      document.getElementById('uangKembalian').value = uangKembalian;
    }

    function hitungTotal() {
      var totalSemua = 0;
      var rows = document.querySelectorAll('#tabel-pesanan tbody tr');
      
      rows.forEach(function(row) {
        var jumlah = parseInt(row.querySelector('.jumlah').value);
        var harga = parseInt(row.querySelector('.jumlah').getAttribute('data-harga'));
        var totalHarga = jumlah * harga;
        totalSemua += totalHarga;
        row.querySelector('.total').value = totalHarga.toLocaleString();
      });
      
      document.getElementById('totalSemua').value = totalSemua.toLocaleString();
    }

    var inputs = document.querySelectorAll('.jumlah');
    inputs.forEach(function(input) {
      input.addEventListener('input', hitungTotal);
    });

    window.addEventListener('load', hitungTotal);
  </script>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>