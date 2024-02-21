<?php 
include "../config.php";

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login/login.php');
    exit();
}

$username = $_SESSION['username'];

// Cek apakah session cart sudah ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Inisialisasi sebagai array kosong jika belum ada
}

// Tambahkan produk ke keranjang saat ada request dengan parameter id_produk
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    
    //cek apakah produk sudah ada di keranjang
    if (isset($_SESSION['cart']['$id_produk'])) {
      // jika sudah, Tambahkan JUMLAH
      $_SESSION['cart']['$id_produk']++;
    } else {
      //jika belum, Tambahkan produk ke keranjang
      $_SESSION['cart']['id_produk'] = 1;
    }
    header('location:penjualan.php');
    // Cek apakah produk sudah ada di keranjang
}

//ambil data member
if (isset($_GET['id_pelanggan'])) {
  $id_pelanggan = $_GET['id_pelanggan'];
  $nama_pelanggan = $_GET['nama_pelanggan'];
} 




// Menghapus produk dari keranjang
if (isset($_GET['id_produk'])) {
    // Ambil 'id_produk' produk
    $id_produk = $_GET['id_produk'];

    // Hapus produk dari session jika ada
    if (isset($_SESSION['cart'][$id_produk])) {
        unset($_SESSION['cart'][$id_produk]);
        // Redirect kembali ke halaman sebelumnya atau halaman yang sesuai
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } 
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
    <?php include "../ui/nav-logo.php"; ?>
  <div class="container">
    
  <!--NAVBAR-->
    <div class="container-main w-100 d-flex flex-column justify-content-center">
       <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-light rounded-5 shadow-sm w-100 h-25" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-black); --bs-nav-pills-link-active-color: var(--bs-info); --bs-nav-pills-link-active-bg: var(--bs-white);">

            <li class="nav-item">
             <a class="btn btn-info" href="../index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-info" href="../produk/produk.php">Produk</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-info" href="../pelanggan/input-pelanggan.php">Pelanggan</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-primary" href="penjualan.php">Penjualan</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-info" href="../regis/registrasi.php">Karyawan</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-danger" href="../logout.php" onclick="return confirm('yakin logout?');">Logout</a>
            </li>
            </ul>
    </div>
    

    <!-- Kolom pencarian -->
   
   
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body overflow-auto">
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
                $sql ="SELECT * FROM produk WHERE id_produk LIKE '%$pencarian%' 
                OR nama_produk LIKE '%$pencarian%'
                ";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID BARANG</th>
                                <th>NAMA BARANG</th>
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
                                    <td><?=$data['nama_produk']; ?></td>
                                    <td><?=
                                    number_format($data['harga'], 0, ',', '.')
                                    ; ?></td>
                                    <td>
                                      <a href="delete/delete-produk.php?id_produk=<?= $data['id_produk'];?>" onclick="return confirm('yakin menghapus?');">delete</a>
                                      <a href="?id_produk=<?= $data['id_produk'];?>">masukan keranjang</a>
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
              <!--kolom member-->
              <table class="table" id="tabel-pesanan">
                <thead>
                  <tr>
                    <th>NO</th>
                   
                    <th>NAMA PRODUK</t>
                    <th>JUMLAH</th>
                    <th>TOTAL</th>
                    <th>KASIR</th>
                    <th>PELANGGAN</th>
                    <th>OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $subtotal = 0;
                  $no = 1;
                  foreach ($_SESSION['cart'] as $id_produk => $jumlah_produk) {
                      // Ambil informasi produk dari database
                      $sql = "SELECT * FROM produk WHERE id_produk='$id_produk' ";
                      $query = mysqli_query($conn, $sql);
                      $produk = mysqli_fetch_assoc($query);
                      
                      $total_harga = $jumlah_produk * $produk['harga'];
                      $subtotal += $total_harga;
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $produk['nama_produk'];?></td>
                    <td>
                      <input class="form-control jumlah_produk" type="number" name="jumlah_produk[]" value="<?= $jumlah_produk ?>" data-harga="<?= $produk['harga'] ?>" >
                    </td>
                    <td>
                      <input class="form-control total" type="text" name="subtotal[]" value="<?= number_format($subtotal, 0, ',', '.') ?>" readonly>
                    </td>
                    <td><?= $username;?></td>
                    <td>
                    <input class="form-control" type="text" name="pelanggan" id="pelanggan" value="<?= $nama_pelanggan?>" readonly>
                    <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan?>">
                    </td>
                    <td>
                      <a href="?id_produk=<?=$id_produk ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-3">
                  <label for="subtotal">TOTAL SEMUA :</label>
                  <input class="form-control" type="text" name="subtotal"id="subtotal" value="<?= number_format($subtotal, 0,',', '.' )?>" readonly>
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
      var subtotal = parseInt(document.getElementById('subtotal').value.replace(/\D/g,''));
      var uangBayar = parseInt(document.getElementById('uangBayar').value.replace(/\D/g,''));
      var uangKembalian = uangBayar - subtotal;
      document.getElementById('uangKembalian').value = uangKembalian;
    }

    function hitungTotal() {
      var subtotal = 0;
      var rows = document.querySelectorAll('#tabel-pesanan tbody tr');
      
      rows.forEach(function(row) {
        var jumlah_produk = parseInt(row.querySelector('.jumlah_produk').value);
        var harga = parseInt(row.querySelector('.jumlah_produk').getAttribute('data-harga'));
        var totalHarga = jumlah_produk * harga;
        subtotal += total_harga;
        row.querySelector('.total').value = total_harga.toLocaleString();
      });
      
      document.getElementById('subtotal').value = subtotal.toLocaleString();
    }

    var inputs = document.querySelectorAll('.jumlah_produk');
    inputs.forEach(function(input) {
      input.addEventListener('input', hitungTotal);
    });

    window.addEventListener('load', hitungTotal);
  </script>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>