<?php
if (!isset($_SESSION['id_member'])) {
    header("location:?pg=member&message=Upss-REGISTER-DULU");
} else {
    $id_member = $_SESSION['id_member'];
    $penjualan = mysqli_query($koneksi, "INSERT INTO penjualan (id_member, status) VALUES ('$id_member',0)");
}

?>
<!-- (!isset) jika tidak ada -->
<!-- (isset) jika ada-->