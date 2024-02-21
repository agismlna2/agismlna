<?php



include "../config.php";

// kalau tidak ada id di query string
if( !isset($_GET['id_produk']) ){
    header('Location: ../index.php');
}

//ambil id dari query string
$id_produk= $_GET['id_produk'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM produk WHERE id_produk=$id_produk";
$query = mysqli_query($conn, $sql);
$produk = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Update Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="mt-5 container d-flex justify-content-center align-items-center">
  <div class="container shadow p-3 mb-3 bg-body-tertiary rounded">
    <header>
        <h3>Formulir Edit Data Produk</h3>
    </header>

    <form action="proses-edit-produk.php" method="POST">
      
      <fieldset>
        
          <div class="form-group">
            <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk'] ?>" />
          </div>
          
        <div class="form-group">
            <label for="nama_produk">Nama Produk :</label>
            <input type="text" name="nama_produk" value="<?php echo $produk['nama_produk']?>" />
        </div>

        <div class="form-group">
            <label for="harga">Harga :</label>
            <input type="text" name="harga" value="<?php echo $produk['harga'] ?>" />
        </div>
        
        <div class="form-group">
            <label for="stok">Stok :</label>
            <input type="text" name="stok" value="<?php echo $produk['stok']?>" />
        </div>
        
        <div class="form-group">
            <label for="tgl_input">Tanggal Input :</label>
            <input type="datetime-local" name="tgl_input" value="<?php echo $produk['tgl_input']?>" />
        </div>
        
        <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
          
        

        </fieldset>


    </form>
  </div>
    </body>
</html>