<?php
$querry = mysqli_query($koneksi, "SELECT user.*, level.nama_level FROM user JOIN level ON user.id_level = level.id ORDER BY user.id DESC");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id ='$id'");
    header('location:?pg=user&hapus=berhasil');
}
?>
<div class="mb-3" align="right">
    <a href="?pg=tambah-user" class="btn btn-primary">Tambah Pengguna</a>
</div>
<table class="table table-border">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
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
                <td><?php echo $row['nama_level'] ?></td>
                <td><a href="?pg=tambah-user&edit=<?php echo $row['id']; ?>" class="btn btn-xs btn-success">Edit</a>|<a
                        onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"
                        href="?pg=user&delete=<?php echo $row['id'] ?>" class="btn btn-xs btn-danger">Delete</a>
                </td>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- WHERE MENGAMBIL SELURUH ROW -->