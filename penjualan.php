<?php
include "../config.php";

session_start();

// Cek apakah session cart sudah ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Inisialisasi sebagai array kosong jika belum ada
}

// Tambahkan produk ke keranjang saat ada request dengan parameter id_produk
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Cek apakah produk sudah ada di keranjang
    if (isset($_SESSION['cart'][$id_produk])) {
        // Jika sudah, tambahkan jumlah
        $_SESSION['cart'][$id_produk]++;
    } else {
        // Jika belum, tambahkan produk ke keranjang
        $_SESSION['cart'][$id_produk] = 1;
    }
    header('location:penjualan.php');
}
?>

<html>
  <head>
    <title>Keranjang</title>
  </head>
  <body>
   
    <h3>Keranjang Penjualan</h3>
    	<h5>Cari Barang</h5>
        <form action="" method="GET">
            <input class="form-control mb-2"  name="pencarian" id="exampleDataList" placeholder="Type to search..." value="<?php if (isset($_GET['pencarian'])) { echo $_GET['pencarian']; }?>">
        </form>
				
        <?php 
        if (isset($_GET['pencarian']) && !empty(trim($_GET['pencarian']))) {
            $pencarian = $_GET['pencarian'];
            $sql = "SELECT * FROM produk WHERE id_produk LIKE '%$pencarian%'
            OR nama_kategori LIKE '%$pencarian%' 
            OR nama_produk LIKE '%$pencarian%' OR tgl_input LIKE '%$pencarian%'
            ";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0) { ?>
            <h5>Hasil</h5>
            <div>
                <table border="1">
                    <thead class="table-dark">
                        <tr>
                            <th>ID PRODUK</th>
                            <th>KATEGORI PRODUK</th>
                            <th>NAMA PRODUK</th>
                            <th>HARGA</th>
                            <th>STOK</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while($data = mysqli_fetch_array($query)) {?>
                            <tr>
                                <td><?= $data['id_produk']; ?></td>
                                <td><?=$data['nama_kategori']; ?></td>
                                <td><?=$data['nama_produk']; ?></td>
                                <td><?=number_format($data['harga'], 0, ',', '.'); ?></td>
                                <td><?=$data['stok']; ?></td>
                                <td>
                                    <a href="?id_produk=<?= $data['id_produk'];?>">Masukan Keranjang</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } else {
                echo "<p>Data Tidak Ditemukan!</p>";
            }
        } elseif (isset($_GET['pencarian']) && empty(trim($_GET['pencarian']))) {
            echo "<p>Masukan Kata Kunci Pencarian</p>";
        }
        ?>
        
      <!--Table Pembelian-->
       <div class="card-body">
            <h5 class="card-title">Pesanan</h5>
            <form action="proses-penjualan.php" method="post" accept-charset="utf-8">
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
                  foreach ($_SESSION['cart'] as $id_produk => $jumlah_produk) {
                      // Ambil informasi produk dari database
                      $sql = "SELECT * FROM produk WHERE id_produk=$id_produk";
                      $query = mysqli_query($conn, $sql);
                      $produk = mysqli_fetch_assoc($query);
                      
                      $totalHargaProduk = $jumlah_produk * $produk['harga'];
                      $totalSemua += $totalHargaProduk;
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $produk['nama_produk'] ?></td>
                    <td>
                      <input class="form-control jumlah_produk" type="number" name="jumlah_produk[]" value="<?= $jumlah_produk ?>" data-harga="<?= $produk['harga'] ?>" >
                    </td>
                    <td>
                      <input class="form-control subtotal" type="text" name="subtotal" value="<?= number_format($totalHargaProduk, 0, ',', '.') ?>" readonly>
                    </td>
                    <td>Agis Maulana</td>
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
                  <button class="btn btn-success btn-block" type="submit" name="submit">CHECKOUT</button>
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
        var jumlah_produk = parseInt(row.querySelector('.jumlah_produk').value);
        var harga = parseInt(row.querySelector('.jumlah_produk').getAttribute('data-harga'));
        var totalHargaProduk = jumlah_produk * harga;
        totalSemua += totalHargaProduk;
        row.querySelector('.total').value = totalHargaProduk.toLocaleString();
      });
      
      document.getElementById('totalSemua').value = totalSemua.toLocaleString();
    }

    var inputs = document.querySelectorAll('.jumlah_produk');
    inputs.forEach(function(input) {
      input.addEventListener('input', hitungTotal);
    });

    window.addEventListener('load', hitungTotal);
  </script>
    
  </body>
</html>