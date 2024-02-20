<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$namaUsers = $_SESSION['namaUsers'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang</title>
</head>
<body>
    <h2>Selamat Datang, <?php echo $username; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>