

<!DOCTYPE html>
<html>
<head>
    <title>Register Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="mt-5 container d-flex justify-content-center align-items-center">
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
</d>
</div>
</b>
</html>