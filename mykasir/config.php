<?php 
$conn = mysqli_connect('0.0.0.0:3306', 'root', 'root', 'mykasir');

if(!$conn){
    die("gagal terhubung". mysqli_connect_error());
}
?>