<?php
$querry = mysqli_query($koneksi, "SELECT * FROM tes_siswa ORDER BY id DESC");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM tes_siswa WHERE id ='$id'");
    header('location:?pg=tes-siswa&hapus=berhasil');
}
?>
<div class="mb-3" align="right">
    <a href="?pg=tambah-tes-siswa" class="btn btn-primary">Tambah Siswa</a>
</div>
<table class="table table-border">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($querry)): ?>
            <!-- mysqli_fetch_assoc($querry) digunakan untuk mengambil atau memunculkan data -->
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_lengkap'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><a href="?pg=tambah-tes-siswa&edit=<?php echo $row['id']; ?>" class="btn btn-xs btn-success">Edit</a>|<a
                        onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"
                        href="?pg=tes-siswa&delete=<?php echo $row['id'] ?>" class="btn btn-xs btn-danger">Delete</a>
                </td>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- WHERE MENGAMBIL SELURUH ROW -->