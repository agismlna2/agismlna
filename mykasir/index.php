<?php
  session_start();
  include "config.php";

  if (!isset($_SESSION['username'])) {
    header('Location:login/login.php');
    exit();
  }
  $username = $_SESSION['username'];
  
  function select($tb){

  global $conn;

  $sql = "SELECT * FROM $tb ";
  $query = mysqli_query($conn, $sql); 
  return $query;
}
$produk = select("produk");
$penjualan = select("penjualan");
$pelanggan = select("pelanggan");
$users = select("users");

?>

<html>
  <head>
    <title>Halaman Utama</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

   <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    
  </head>
  <body>
    <?php include "ui/nav-logo.php"; ?>
    <div class="container-main  d-flex justify-content-center flex-column mt-2"  >
    <?php include "ui/nav-bar.php"; ?>
    </div>
    
    <!--TOTAL SETIAP DATA-->
    <div class="container d-flex gap-2 shadow p-3 mb-3 bg-body-tertiary rounded">

      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-info">PRODUK</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($produk)?></p>
        </div>
      </div>
    
      
      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-info">PENJUALAN</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($penjualan)?></p>
        </div>
      </div>
      
      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-info">PELANGGAN</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($pelanggan)?></p>
        </div>
      </div>
      
      <div class="card   w-25 border-1">
        <h5 class="card-header text-white bg-info">PEGAWAI</h5>
        <div class="card-body">
          <h5 class="card-title ">TOTAL :</h5>
          <p class="card-text fs-1"><?= mysqli_num_rows($users)?></p>
        </div>
      </div>
      
 
      
    </div>
      
      
    </div>
    </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  
  <?php include "ui/footer.php"; ?>
  
</html>