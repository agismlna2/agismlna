<?php

include "../config.php";

// kalau tidak ada id di query string
if( !isset($_GET['id_kategori']) ){
    header('Location: ../kategori.php');
}

//ambil id dari query string
$id_kategori = $_GET['id_kategori'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM kategori WHERE id_kategori=$id_kategori";
$query = mysqli_query($conn, $sql);
$kategori = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Update Kategori</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Data Kategori</h3>
    </header>

    <form action="proses-edit-kategori.php" method="POST">

        <fieldset>

            <input type="hidden" name="id_kategori" value="<?php echo $kategori['id_kategori'] ?>" />

        <p>
            <label for="nama_kategori">Nama Kategori: </label>
            <input type="text" name="nama_kategori" placeholder="Kategori" value="<?php echo $kategori['nama_kategori'] ?>" />
        </p>
        <p>
            <label for="tgl_input">Tanggal Input: </label>
            <input type="datetime-local" name="tgl_input" value="<?php echo $kategori['tgl_input'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>