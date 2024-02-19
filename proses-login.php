<?php
session_start();
include "../config.php"; // Pastikan file config.php ada dan terhubung dengan benar

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];// tambahkan algoritma hash yang diinginkan, dalam kasus ini, PASSWORD_DEFAULT
  
  
  $sql ="SELECT * FROM users WHERE username = '$username'";
  $query = mysqli_query($conn, $sql);
  
  if ($query) {
    if (mysqli_num_rows($query) == 1) {
      $data = mysqli_fetch_assoc($query);
      if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $username;
        $level = $data['level'];
        if ($level == 'administrator') {
          header("location:../index.php");
          exit();
        } elseif($level == 'petugas') {
          header("location:../index.php");
          exit();
        } else{
          echo('level tidak valid');
        }
        
      } else {
        echo('password salah');
      }
      
    } else {
      echo('username tidak ditemukan');
    }
    
  } else {
    die("gagal query".mysqli_connect_error($conn));
  }
 
} else {
  echo('akses dilarang');
}


?>