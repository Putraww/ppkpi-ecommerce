<?php
$querry = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id DESC");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id ='$id'");
    header('location:?pg=testimoni&hapus=berhasil');
    // (*) untuk mengambil semua data yg ada pada database
}
?>
<div align="right" class="mb-3">
    <a href="?pg=tambah-testimoni" class="btn btn-primary">Testimoni</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($querry)): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['jabatan'] ?></td>
            <td><?php echo $row['deskripsi'] ?></td>
            <td><a href="?pg=tambah-testimoni&edit=<?php echo $row['id']; ?>" class="btn btn-xs btn-success">Edit</a> |
                <a onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"
                    href="?pg=testimoni&delete=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>