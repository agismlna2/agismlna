<?php 
    include "../config.php";

    if (isset($_POST['submit'])) {
        $nama_kategori = $_POST['nama_kategori'];
        $tgl_input = $_POST['tgl_input'];
    
        // buat query
        $sql = "INSERT INTO kategori (nama_kategori, tgl_input) VALUES ('$nama_kategori', '$tgl_input')";
        $query = mysqli_query($conn, $sql);
    
        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman kategori.php dengan status=sukses
            echo "
            <script>
              alert('Berhasil');
              document.location= 'kategori.php';
            </script>
            ";
        } else {
            // kalau gagal alihkan ke halaman kategori.php dengan status=gagal
            echo "
            <script>
              alert('Gagal');
              document.location= 'kategori.php';
            </script>
            ";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kategori</title>
  </head>
  <body>
    <div class="content ">
        <h3>Tambah Kategori</h3>
        <form action="" method="POST">
          <fieldset>
            <div class="form-group">
              <label for="nama_kategori">Nama Kategori:</label>
              <input type="text" class="form-control" name="nama_kategori"/>
            </div>
            <div class="form-group">
              <label for="tgl_input">Tanggal Input:</label>
              <input type="datetime-local" class="form-control" name="tgl_input"/>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>