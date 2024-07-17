<?php
// jika tombol simpan di tekan maka mengambil nilai email dan password
// (!) kebalikan
if (isset($_POST['simpan'])) {
    // $_FILES
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $_size = $_FILES['foto']['size'];

    $ekstensi = array('png', 'jpg', 'jpeg');
    $ext = pathinfo($foto, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        echo "Ekstensi gambar tidak sesuai!";
    } else {
        move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $foto);
    }



    // MASUKKAN KE DALAM TABLE USER (FIELD YG AKAN DI MASUKKAN) VALUES (INPUTAN MASING" KOLOM)
    $insert = mysqli_query($koneksi, "INSERT INTO barang 
    (nama_barang, harga, foto) VALUES ('$nama_barang', '$harga', '$foto')");
    if (!$insert) {

        header("location:?pg=tambah-produk&pesan=tambah-gagal");
    } else {

        header("location:?pg=produk&pesan=tambah-berhasil");
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);


}
if (isset($_POST['edit'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $_size = $_FILES['foto']['size'];

    $ekstensi = array('png', 'jpg', 'jpeg');
    $ext = pathinfo($foto, PATHINFO_EXTENSION);

    $id = $_GET['edit'];
    if (!in_array($ext, $ekstensi)) {
        echo "Ekstensi gambar tidak sesuai!";
    } else {
        unlink("upload/" . $rowEdit['foto']);
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/" . $foto);
        $update = mysqli_fetch_assoc($koneksi, "UPDATE barang SET nama_barang='$nama_barang', harga='$harga', foto='$foto' WHERE id ='$id'");
        header("location:?pg=produk&pesan=tambah-berhasil");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Nama barang</label>
        <input required value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_barang'] : '' ?>" type="text"
            class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang Yang Anda Pilih">
    </div>
    <div class="mb-3">
        <label for="">Harga</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['harga'] : '' ?>" type="number" class="form-control"
            name="harga" placeholder="Harga Produk">
    </div>
    <div class="mb-3">
        <label for="">Foto</label>
        <input value="" type="file" name="foto">
    </div>
    <div class="mb-3"><input type="submit" class="btn btn-primary" value="Simpan"
            name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"></input>
    </div>

</form>