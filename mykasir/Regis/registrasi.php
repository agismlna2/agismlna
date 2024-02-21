

<!DOCTYPE html>
<html>
<head>
    <title>Register Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  
  <!--include nav logo-->
  <?php include "../ui/nav-logo.php" ?>
  
  <!--NAVIGASI-->
          <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-info rounded-5 shadow-sm w-100 h-25" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-black); --bs-nav-pills-link-active-color: var(--bs-info); --bs-nav-pills-link-active-bg: var(--bs-white);">
            <li class="nav-item">
             <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../produk/produk.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../penjualan/penjualan.php">Penjualan</a>
            <li class="nav-item">
              <a class="nav-link" href="registrasi.php">Karyawan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            </ul>
    </div>
  <!--NAVIGASI-->
  
   <div class="container w-100 shadow p-3 mb-5 bg-body-tertiary rounded">
    <h2 class="text-center">Registrasi Petugas</h2>
    <form action="proses-regis.php" method="POST">
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>

        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
        </div>

        <div class="mb-3">
            <label for="telpon">Nomor Telepon</label>
            <input type="text" name="telpon" class="form-control" placeholder="Nomor Telepon" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        
        <div class="mb-3">
        <label for="level">Level :</label>
        <select class="form-select" aria-label="Default select example" name="level" id="level">
          <option value="administrator">ADMINISTRATOR</option>
          <option value="petugas">KARYAWAN</option>
        </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
    </form>
</div>
</div>

<!-- DATA ADMINISTRATOR & PETUGAS -->

<div class="container w-100 shadow p-3 mb-5 bg-body-tertiary rounded">
          <h2 class="my-4">Data Administrator & petugas</h2>
             <form action="" method="get">
              <label for="exampleDataList" class="form-label">Cari Petugas</label>
              <input class="form-control mb-2"  name="pencarian" id="exampleDataList" placeholder="Type to search..." value="<?php if (isset($_GET['pencarian'])) { echo $_GET['pencarian']; }?>">
            </form>
          <table class="table table-bordered ">
            <thead class="table-dark">
              <tr>
                <th>NO</th>
                <th scope="col">ID</th>
                <th>USERNAME</th>
                <th>ALAMAT</th>
                <th>NO TELEPON</th>
                <th>JABATAN</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
              <?php 
      
              if (isset($_GET['pencarian'])) {
                  $pencarian = $_GET['pencarian'];
                   $sql ="SELECT * FROM users WHERE id_users LIKE '%$pencarian%'
                   OR username LIKE '%$pencarian%'  OR level LIKE '%$pencarian%'
                   ";
              }else{
                  $sql = "SELECT * FROM users";
              }
             
              $query = mysqli_query($conn, $sql);
              $no = 1; 
              
              while($data = mysqli_fetch_array($query)) :?>
              <tr>
                  <td><?=$no++; ?></td>
                  <td><?=$data['id_users']; ?></td>
                  <td><?=$data['username']; ?></t>
                  <td><?=$data['alamat']; ?></td>
                  <td><?=$data['telpon']; ?></td>
                  <td><?=$data['level']; ?></td>
                  <td>
                  <a href="../edit/edit-petugas.php?id_produk=<?= $data['id_users'];?>" class="btn btn-warning">EDIT</a> 
                  <a href="../hapus/hapus-petugas.php?id_produk=<?= $data['id_users'];?>" onclick="return confirm('yakin menghapus?');" class="btn btn-danger">HAPUS</a>
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