<?php
$querry = mysqli_query($koneksi, "SELECT * FROM member WHERE deleted_at = 0 ORDER BY id DESC");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "UPDATE member SET deleted_at = 1 WHERE id ='$id'");
    header('location:?pg=member&hapus=berhasil');
    // (*) untuk mengambil semua data yg ada pada database
}
?>
<div align="right" class="mb-3">
    <!-- <a href="?pg=tambah-member" class="btn btn-primary">Tambah Member</a> -->
</div>
<table class="table table-bordered">
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
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row['nama_lengkap'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['alamat'] ?></td>
            <td>
                <!-- <a href="?pg=tambah-member&edit=" class="btn btn-xs btn-success">Edit</a> | -->
                <a onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"
                    href="?pg=member&delete=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>