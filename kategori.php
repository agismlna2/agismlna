<?php include "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
</head>
<body>
    <!--logo-->
    <?php include "../ui/nav-logo.php" ?>
    <div class="container-main w-100 d-flex flex-column justify-content-center">

      <!--navigasi-->
    <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-info rounded-5 shadow-sm w-100 h-25" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-black); --bs-nav-pills-link-active-color: var(--bs-info); --bs-nav-pills-link-active-bg: var(--bs-white);">
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../produk/produk.php">Produk</a>
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

    <!--form input kategori-->
    <div class="container-content mt-2 ms-3 d-flex flex-column">
        <?php include "input-kategori.php"; ?>

    <!--Data Kategori-->
    <div class="container w-100 shadow p-3 mb-5 bg-body-tertiary rounded">
        <table border="1">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $sql2 = "SELECT * FROM kategori";
                $query2 = mysqli_query($conn, $sql2); 
                ?>

                <?php 
                $nomor = 1;
                while($data = mysqli_fetch_assoc($query2)) :?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td>ctr-<?= $data['id_kategori']; ?></td>
                    <td><?= $data['nama_kategori']; ?></td>
                    <td><?= $data['tgl_input']; ?></td>
                    <td>
                        <a href="../edit/edit-kategori.php?id_kategori=<?= $data['id_kategori'];?>" class="btn btn-warning">Ubah</a>
                        <a href="../hapus/hapus-kategori.php?id_kategori=<?= $data['id_kategori'];?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</div>
</div>

</body>
</html>