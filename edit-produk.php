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
</head>

<body>
    <header>
        <h3>Formulir Edit Data Produk</h3>
    </header>

    <form action="proses-edit-produk.php" method="POST">

        <fieldset>

            <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk'] ?>" />

        <p>
            <label for="nama_kategori">Kategori :</label>
            <input type="text" name="nama_kategori" placeholder="Kategori" value="<?php echo $produk['nama_kategori'] ?>" />
        </p>
        <p>
            <label for="nama_produk">Nama Produk :</label>
            <input type="text" name="nama_produk" value="<?php echo $produk['nama_produk']?>" />
        </p>
        <p>
            <label for="harga">Harga :</label>
            <input type="text" name="harga" value="<?php echo $produk['harga'] ?>" />
        </p>
        <p>
            <label for="stok">Stok :</label>
            <input type="text" name="stok" value="<?php echo $produk['stok']?>" />
        </p>
        <p>
            <label for="tgl_input">Tanggal Input :</label>
            <input type="datetime-local" name="tgl_input" value="<?php echo $produk['tgl_input']?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>