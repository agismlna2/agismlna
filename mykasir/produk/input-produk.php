<?php 

    include "../config.php";


   

    if (isset($_POST['submit'])) {
    
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $tgl_input = $_POST['tgl_input'];
       
       
       
    
        // buat query
        $sql = "INSERT INTO produk (nama_produk, harga, stok, tgl_input) VALUE ('$nama_produk', '$harga', '$stok', '$tgl_input')";
        $query = mysqli_query($conn, $sql);
    
        // apakah query simpan berhasil?
        if ($query) {
    // kalau berhasil alihkan ke halaman input-produk.php dengan status=sukses
     echo "
    <script>
         alert('berhasil');
        document.location= 'produk.php';
    </script>
   ";
        
      } else {
    // kalau gagal alihkan ke halaman input-produk.php dengan status=gagal
    echo "  
      <script>
      alert('gagal');
       document.location= 'produk.php';
     </script>
   ";
    // Tambahkan kode untuk menampilkan pesan error PHP atau MySQL
    echo "Error: " . mysqli_error($conn);
    // Ini akan menampilkan pesan error MySQL
          }
    }
   ?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Produk</title>
    
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"

      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"  />
    
</head>

<body>
  <div class="container shadow p-3 mb-3 bg-body-tertiary rounded">
    <header>
        <h3>Form Input Produk</h3>
    </header>

    <form action="" method="POST">

        <fieldset>

        <div class="form-group">
          <label for="nama_produk">Nama Produk:</label>
          <input type="text" class="form-control" name="nama_produk" />
       </div>
       
       <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="text" class="form-control" name="harga" />
       </div>

       <div class="form-group">
           <label for="stok">Stok:</label>
           <input type="text" class="form-control" name="stok" />
       </div> 
       
       <div class="form-group">
         <label for="tgl_input">Tanggal Input:</label>
         <input type="datetime-local" class="form-control" id="tgl_input" name="tgl_input"/>
            </div>
        
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </fieldset>

    </form>
  </div>
    </body>
</html>