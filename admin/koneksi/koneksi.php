<?php
$host_koneksi = "localhost:3307";
$user_koneksi = "root";
$password_koneksi = "";
$database_koneksi = "db_ecommerce";

$koneksi = mysqli_connect(
    $host_koneksi,
    $user_koneksi,
    $password_koneksi,
    $database_koneksi,
);

if (!$koneksi) {
    die('Koneksi Error : ' . mysqli_connect_error());
}