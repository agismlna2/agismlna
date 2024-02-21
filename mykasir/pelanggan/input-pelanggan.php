<!DOCTYPE html>
<html>
<head>
    <title>Input Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="mt-5 container d-flex justify-content-center align-items-center">
   <div class="container w-100 shadow p-3 mb-5 bg-body-tertiary rounded">
    <h2 class="text-center">Daftar Member</h2>
    <form action="proses-input-pelanggan.php" method="POST">
        <div class="mb-3">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required>
        </div>

        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
        </div>

        <div class="mb-3">
            <label for="telepon">Nomor Telepon</label>
            <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon" required>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
    </form>
   </div>
</body>
</html>