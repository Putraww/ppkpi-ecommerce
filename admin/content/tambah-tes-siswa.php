<?php
if (isset($_POST['simpan'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    //MASUKKAN KE DALAM TABEL USER (FIELD YANG AKAN DI MASUKKAN)
    //VALUE (INPUTAN MASING-MASING KOLOM)

    $insert = mysqli_query($koneksi, "INSERT INTO tes_siswa (nama_lengkap, email, alamat) VALUES ('$nama_lengkap','$email','$alamat')");
    if (!$insert) {
        header("location:?pg=tambah-tes-siswa&pesan=tambah-gagal");
    } else {
        header("location:?pg=tes-siswa&pesan=tambah-berhasil");
    }
}


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $edit = mysqli_query($koneksi, "SELECT * FROM tes_siswa WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])) {
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $id = $_GET['edit'];

    $update = mysqli_query($koneksi, "UPDATE tes_siswa SET nama_lengkap='$nama_lengkap', alamat='$alamat', email='$email' WHERE id='$id'");
    header("location:?pg=tes-siswa&update=berhasi");
}


?>

<form action="" method="post">
    <div class="mb-3">
        <label for="">Nama Lengkap</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>" type="text"
            class="form-control" placeholder="Masukkan Nama Lengkap Anda" name="nama_lengkap">
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" type="email" class="form-control"
            placeholder="Masukkan Email Anda" name="email">
    </div>
    <div class="mb-3">
        <label for="">Alamat</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['alamat'] : '' ?>" type="alamat" class="form-control"
            placeholder="Masukkan Alamat Anda" name="alamat">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Simpan"
            name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
    </div>
</form>