<?php
session_start();
session_destroy(); // digunakan untuk menghapus $_SESSION
header("location:login.php");

?>