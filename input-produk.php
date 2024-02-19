<?php 

    include "../config.php";


   

    if (isset($_POST['submit'])) {
    
       
        
        $nama_kategori = $_POST['nama_kategori'];
        $nama_produk = $_POST['nama_produk'];
        $img = $_POST['img'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $tgl_input = $_POST['tgl_input'];
       
    
        // buat query
        $sql1 = "INSERT INTO produk (nama_kategori, nama_produk, img, harga, stok, tgl_input) VALUE ('$nama_kategori', '$nama_produk', 'img', '$harga', '$stok', '$tgl_input')";
        $query1 = mysqli_query($conn, $sql1);
    
        // apakah query simpan berhasil?
        if ($query1) {
    // kalau berhasil alihkan ke halaman input-produk.php dengan status=sukses
    echo "
    <script>
        alert('berhasil');
        document.location= 'produk.php';
    </script>
    ";
          } else {
    // kalau gagal alihkan ke halaman input-produk.php dengan status=gagal
 //   echo "
  //  <script>
     //   alert('gagal');
      //  document.location= 'produk.php';
  //  </script>
  //  ";
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
</head>

<body>
    <header>
        <h3>Form Input Produk</h3>
    </header>

    <form action="" method="POST">

        <fieldset>
    
        <div>
          <label for="nama_kategori">Kategori:</label>
           <select class="form-control" name="nama_kategori" id="nama_kategori">
              <?php 
                 $sql2 = "SELECT * FROM kategori";
                 $query2 = mysqli_query($conn, $sql2);

                 while($data = mysqli_fetch_array($query2)) : ?>
                 <option><?= $data['nama_kategori']; ?></option>
                <?php endwhile; ?>
           </select>
        </div>
        
       
        
        <div class="form-group">
          <label for="nama_produk">Nama Produk:</label>
          <input type="text" class="form-control" name="nama_produk" />
       </div>
       
       <div class="form-group">
         <label for="img">Gambar</label>
         <input type="image" class="form-control" name="img" />
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

    </body>
</html>