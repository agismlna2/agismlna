<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="mt-5 container d-flex justify-content-center align-items-center">
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded w-50">
      <form action="proses-login.php" method="post">
        <h2 class="text-center">Login</h2>
          <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>
      
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
  
        <button class="btn btn-success" type="submit" name="login">Login</button>
      </form>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>