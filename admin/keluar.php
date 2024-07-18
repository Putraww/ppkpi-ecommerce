<?php
session_start();
unset($_SESSION['nama_lengkap']);
unset($_SESSION['email']);
unset($_SESSION['id_level']);
// session_destroy(); // digunakan untuk menghapus $_SESSION
header("location:login.php");

?>