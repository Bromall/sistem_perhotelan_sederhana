<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

$sql = mysqli_query($koneksi,"
SELECT reservasi.*, users.nama, kamar.nama_kamar 
FROM reservasi
JOIN users ON users.id = reservasi.user_id
JOIN kamar ON kamar.id = reservasi.kamar_id
ORDER BY reservasi.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Reservasi</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="p-4">

<h2>Kelola Reservasi</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Pemesan</th>
            <th>Kamar</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Status</th>
            <th width="220">Aksi</th>
        </tr>
    </thead>

   <tbody>
<?php while($r = mysqli_fetch_assoc($sql)): ?>
<tr id="row<?= $r['id']; ?>">
    <td><?= $r['nama']; ?></td>
    <td><?= $r['nama_kamar']; ?></td>
    <td><?= $r['tanggal_checkin']; ?></td>
    <td><?= $r['tanggal_checkout']; ?></td>

    <td id="status<?= $r['id']; ?>">
        <?php if($r['status'] == 'menunggu'): ?>
            <span class="badge bg-warning">Menunggu</span>
        <?php elseif($r['status'] == 'diterima'): ?>
            <span class="badge bg-success">Diterima</span>
        <?php else: ?>
            <span class="badge bg-danger">Ditolak</span>
        <?php endif; ?>
    </td>

    <td id="aksi<?= $r['id']; ?>">
    <?php if ($r['status'] == 'menunggu'): ?>

        <a href="reservasi_konfirmasi.php?id=<?= $r['id']; ?>"
           class="btn btn-success btn-sm">
           Konfirmasi
        </a>

        <a href="reservasi_tolak.php?id=<?= $r['id']; ?>"
           class="btn btn-danger btn-sm"
           onclick="
             fetch(this.href);
             document.getElementById('status<?= $r['id']; ?>').innerHTML =
               '<span class=\'badge bg-danger\'>Ditolak</span>';
             document.getElementById('aksi<?= $r['id']; ?>').innerHTML =
               '<span class=\'text-muted\'>Selesai</span>';
             document.getElementById('row<?= $r['id']; ?>').style.backgroundColor = '#fff';
             return false;
           ">
           Tolak
        </a>

    <?php else: ?>
        <span class="text-muted">Selesai</span>
    <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
