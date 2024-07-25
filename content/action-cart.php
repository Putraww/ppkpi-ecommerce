<?php
if (isset($_GET['delete-cart'])) {
    $id_produk = $_GET['delete-cart'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id_produk'] == $id_produk) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('Location: index.php?pg=cart');
        }
    }
} else {
    // memeriksa  barang ada atau tidak ada pda variabel session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (!isset($_SESSION['id_member'])) {
        header("location:?pg=member&message=Upss-Register-Dulu");
    } else {
        $id_member = $_SESSION['id_member'];
        $id_produk = $_POST['id_produk'];
        $queryCart = mysqli_query($koneksi, "SELECT * FROM barang WHERE id = '$id_produk'");
        $rowBarang = mysqli_fetch_assoc($queryCart);

        $product_exists = false;
        // periksa apakah produk sudah di keranjang
        foreach ($_SESSION['cart'] as $key => &$item) {
            // print_r($_SESSION);
            // die;
            if ($item['id_produk'] == $id_produk) {
                $item['qty'] += 1;
                $product_exists = true;
                break;
            }
        }
        $session_produk = array(
            'id_produk' => $id_produk,
            'nama_produk' => $rowBarang['nama_barang'],
            'qty' => 1,
            'harga' => $rowBarang['harga'],
            'foto' => $rowBarang['foto'],
        );
        if (!$product_exists) {
            // echo "jalan kesini";
            // die;
            $_SESSION['cart'][] = $session_produk;
        }
        header("location:index.php?tambah=cart-berhasil");

    }
}



// $penjualan = mysqli_query($koneksi, "INSERT INTO penjualan (id_member, status) VALUES ('$id_member',0)");


?>
<!-- (!isset) jika tidak ada -->
<!-- (isset) jika ada-->