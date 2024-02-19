<?php 
include "../config.php";
?>

<html>
  <head>
    <title>Produk</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
  </head>
  <body>
     <?php include "../ui/nav-logo.php" ?>
    <div class="container-main w-100 d-flex flex-column justify-content-center">

      <!--navigasi-->
    <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-info rounded-5 shadow-sm w-100 h-25" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-black); --bs-nav-pills-link-active-color: var(--bs-info); --bs-nav-pills-link-active-bg: var(--bs-white);">
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../kategori/kategori.php">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../penjualan/penjualan.php">Penjualan</a>
            <li class="nav-item">
              <a class="nav-link" href="../admin/registrasi.php">Karyawan</a>
            </li>
            </u>
    </div>

    <!--form input data produk-->
      <div class="container-content mt-2 ms-3 d-flex flex-column">
        <?php include "input-produk.php" ?>
  
        <div class="container w-100 shadow p-3 mb-5 bg-body-tertiary rounded">
          <h2 class="my-4">Data Barang</h2>
             <form action="" method="get">
              <label for="exampleDataList" class="form-label">Cari Barang</label>
              <input class="form-control mb-2"  name="pencarian" id="exampleDataList" placeholder="Type to search..." value="<?php if (isset($_GET['pencarian'])) { echo $_GET['pencarian']; }?>">
            </form>
          <table class="table table-bordered ">
            <thead class="table-dark">
              <tr>
                <th>NO</th>
                <th scope="col">ID PRODUK</th>
                <th>KATEGORI</th>
                <th>NAMA PRODUK</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th>TANGGAL INPUT</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
              <?php 
      
              if (isset($_GET['pencarian'])) {
                  $pencarian = $_GET['pencarian'];
                   $sql ="SELECT * FROM produk WHERE id_produk LIKE '%$pencarian%' OR nama_kategori LIKE '%$pencarian%' 
                   OR nama_produk LIKE '%$pencarian%'  OR tgl_input LIKE '%$pencarian%'
                   ";
              }else{
                  $sql = "SELECT * FROM produk";
              }
             
              $query = mysqli_query($conn, $sql);
              $no = 1; 
              
              while($data = mysqli_fetch_array($query)) :?>
              <tr>
                  <td><?=$no++; ?></td>
                  <td><?=$data['id_produk']; ?></td>
                  <td><?=$data['nama_kategori']; ?></td>
                  <td><?=$data['nama_produk']; ?></td>
                  <td><?=$data['harga']; ?></td>
                  <td><?=$data['stok']; ?></td>
                  <td><?=$data['tgl_input']; ?></td>
                  <td>
                  <a href="../edit/edit-produk.php?id_produk=<?= $data['id_produk'];?>" class="btn btn-warning">ubah</a> 
                  <a href="../hapus/hapus-produk.php?id_produk=<?= $data['id_produk'];?>" onclick="return confirm('yakin menghapus?');" class="btn btn-danger">Hapus</a>
                  </td>
              </tr>
      
              <?php endwhile; ?>
              <!-- Tambahkan baris sesuai dengan data barang Anda -->
            </tbody>
          </table>

          
        </div>
      </div>
    </div>
  </div>
</div>
  </body>
</html>