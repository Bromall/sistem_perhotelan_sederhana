<?php
include '../middleware/admin.php';
include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h3>Data Kamar</h3>
<a href="kamar_tambah.php" class="btn btn-primary mb-3">+ Tambah Kamar</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Kamar</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        $kamar = mysqli_query($koneksi, "SELECT * FROM kamar ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($kamar)) :
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_kamar']; ?></td>
            <td><?= $row['tipe']; ?></td>
            <td>Rp <?= number_format($row['harga']); ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td>
                <a href="kamar_edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="kamar_hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<a href="index.php" class="btn btn-secondary">⬅ Kembali</a>


</body>
</html>
