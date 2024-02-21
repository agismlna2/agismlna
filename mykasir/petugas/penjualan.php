<?php
include "../config.php";

session_start();
$username = $_SESSION['username'];

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




  //AMBIL DATA PELANGGAN
  if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];
    $nama_pelanggan = $_GET['nama_pelanggan'];
  }
  






// Menghapus produk dari keranjang
if (isset($_GET['id_produk'])) {
    // Ambil id produk
    $idProduk = $_GET['id_produk'];

    // Hapus produk dari session jika ada
    if (isset($_SESSION['cart'][$id_produk])) {
        unset($_SESSION['cart'][$id_produk]);
        // Redirect kembali ke halaman sebelumnya atau halaman yang sesuai
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } 
} 

?>

<html>
  <head>
    <title>Keranjang</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php include "../ui/nav-logo.php" ?>
   <div class="container">
   
   <!--NAVBAR-->
    <div class="container-main w-100 d-flex flex-column justify-content-center">
       <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-info rounded-5 shadow-sm w-100 h-25" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-black); --bs-nav-pills-link-active-color: var(--bs-info); --bs-nav-pills-link-active-bg: var(--bs-white);">
            <li class="nav-item">
             <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../produk/produk.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="penjualan.php">Penjualan</a>
            <li class="nav-item">
              <a class="nav-link" href="../regis/registrasi.php">Karyawan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            </ul>
    </div>
    
    
    <!--CARI DATA PELANGGAN-->
    
    <h3>Data Pelanggan</h3>
    
     <div class="row mt-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cari Pelanggan</h5>
             <form action="" method="GET" accept-charset="utf-8">
              <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">@</span>
                
            <input type="text" class="form-control"  name="cari" id="exampleDataList" placeholder="Type to search..." value="<?php if (isset($_GET['cari'])) { echo $_GET['cari']; }?>">
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
        if (isset($_GET['cari']) && !empty(trim($_GET['cari']))) {
            $cari = $_GET['cari'];
            $sql = "SELECT * FROM pelanggan WHERE id_pelanggan LIKE '%$cari%'
            OR nama_pelanggan LIKE '%$cari%' OR alamat LIKE '%$cari%'
            ";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0) { ?>
           
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID PELANGGAN</th>
                            <th>NAMA PELANGGAN</t>
                            <th>ALAMAT</th>
                            <th>OPSI</t>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while($data = mysqli_fetch_array($query)) {?>
                            <tr>
                                <td><?= $data['id_pelanggan']; ?></td>
                                <td><?=$data['nama_pelanggan']; ?></t>
                                <td><?=$data['alamat']; ?></td>
                                <td>
                                    <a href="?id_pelanggan=<?= $data['id_pelanggan'];?>">Masukan Data Pelanggan Ke Keranjang</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } else {
                echo "<p>Data Tidak Ditemukan!</p>";
            }
        } elseif (isset($_GET['cari']) && empty(trim($_GET['cari']))) {
            echo "<p>Masukan Kata Kunci Pencarian</p>";
        }
        ?>
       </div>
     </div>
    </div>
   </div>
    
    
   <!--Cari Produk-->
    <h3>Keranjang Penjualan</h3>
    
     <div class="row mt-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cari Produk</h5>
             <form action="" method="GET" accept-charset="utf-8">
              <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">@</span>
                
            <input type="text" class="form-control"  name="pencarian" id="exampleDataList" placeholder="Type to search..." value="<?php if (isset($_GET['pencarian'])) { echo $_GET['pencarian']; }?>">
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
            $sql = "SELECT * FROM produk WHERE id_produk LIKE '%$pencarian%'
            OR nama_produk LIKE '%$pencarian%' OR tgl_input LIKE '%$pencarian%'
            ";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0) { ?>
           
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID PRODUK</th>
                            <th>NAMA PRODUK</t>
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
                                <td><?=$data['nama_produk']; ?></t>
                                <td><?=number_format($data['harga'], 0, ',', '.'); ?></td>
                                <td><?=$data['stok']; ?></td>
                                <td>
                                   <a href="hapus/hapus-produk.php?id_produk=<?= $data['id_produk'];?>" onclick="return confirm('yakin menghapus?');">delete</a>
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
       </div>
     </div>
    </div>
   </div>
        
<!-- Bagian HTML -->


<!-- Tabel Pembelian -->
  <div class="row mt-4">
   <div class="col-md-12">
    <div class="card">
     <div class="card-body">
        <h5 class="card-title">Pesanan</h5>
      <form action="proses-penjualan.php" method="post" accept-charset="utf-8">
        <table class="table" id="tabel-pesanan">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA BARANG</t>
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
                    
                    $total_harga = $jumlah_produk * $produk['harga'];
                    $subtotal += $total_harga;
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $produk['nama_produk'] ?></td>
                    <td>
                        <input class="form-control jumlah_produk" type="number" name="jumlah_produk[]" value="<?= $jumlah_produk ?>" data-harga="<?= $produk['harga'] ?>" >
                    </td>
                    <td>
                        <input class="form-control subtotal" type="text" name="subtotal" value="<?= number_format($subtotal, 0, ',', '.') ?>" readonly>
                    </td>
                    <td><? $username;?> </td>
                    <td>
                        <a href="hapus-dari-keranjang.php?id_produk=<?= $id_produk ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-3">
                <label for="subtotal">TOTAL SEMUA :</label>
                <input class="form-control" type="text" name="subtotal" id="subtotal" value="<?= number_format($subtotal, 0,',', '.' )?>" readonly>
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
    <!--KOLOM PEMBELIAN-->
   </div>
<!-- JavaScript -->
<script>
    function hitungKembalian() {
        var subtotal = parseInt(document.getElementById('subtotal').value.replace(/\D/g,''));
        var uangBayar = parseInt(document.getElementById('uangBayar').value.replace(/\D/g,''));
        if (!isNaN(subtotal) && !isNaN(uangBayar)) {
            var uangKembalian = uangBayar - subtotal;
            document.getElementById('uangKembalian').value = uangKembalian;
        }
    }

    function hitungTotal() {
        var subtotal = 0;
        var rows = document.querySelectorAll('#tabel-pesanan tbody tr');
        
        rows.forEach(function(row) {
            var jumlah_produk = parseInt(row.querySelector('.jumlah_produk').value);
            var harga = parseInt(row.querySelector('.jumlah_produk').getAttribute('data-harga'));
            if (!isNaN(jumlah_produk) && !isNaN(harga)) {
                var total_harga = jumlah_produk * harga;
                subtotal += total_harga;
                row.querySelector('.subtotal').value = total_hargak.toLocaleString();
            }
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