<?php
include "../middleware/tamu.php";
include "../config/koneksi.php";

$id_user = $_SESSION['id'];

$data = mysqli_query($koneksi,"
    SELECT r.*, k.nama_kamar, k.tipe, k.harga
    FROM reservasi r
    JOIN kamar k ON r.kamar_id = k.id
    WHERE r.user_id='$id_user'
    ORDER BY r.id DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Reservasi</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="p-4 bg-light">

<div class="container">
    <h3 class="mb-4">📜 Riwayat Reservasi</h3>

    

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Kamar</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

        <?php while ($r = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $r['nama_kamar']; ?> (<?= $r['tipe']; ?>)</td>
                <td><?= $r['tanggal_checkin']; ?> → <?= $r['tanggal_checkout']; ?></td>
                <td>
                    <?php if ($r['status'] == "menunggu") : ?>
                        <span class="badge bg-warning text-dark">Menunggu</span>

                    <?php elseif ($r['status'] == "diterima") : ?>
                        <span class="badge bg-success">Diterima</span>

                    <?php else : ?>
                        <span class="badge bg-danger">Ditolak</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
<a href="index.php" class="btn btn-secondary mb-3">⬅ Kembali</a>
</div>

</body>
</html>
