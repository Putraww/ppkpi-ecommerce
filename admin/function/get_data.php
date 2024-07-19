<?php
include 'admin/koneksi/koneksi.php';

function getData($koneksi, $id_member)
{
    $query = mysqli_query($koneksi, "SELECT * FROM member WHERE id = '$id_member'");
    $data = mysqli_fetch_array($query);
    return $data;

}

?>