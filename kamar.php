<?php
include "../middleware/tamu.php";
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kamar</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        .card:hover {
            transform: scale(1.03);
            transition: 0.3s;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4">🏨 Daftar Kamar</h3>


    <div class="row">

        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM kamar ORDER BY id DESC");
        while ($k = mysqli_fetch_assoc($data)) :
        ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= $k['nama_kamar']; ?></h5>
                        <p class="text-muted">Tipe: <?= $k['tipe']; ?></p>
                        <p><b>Rp <?= number_format($k['harga']); ?></b> / malam</p>

                        <a href="pesan.php?id=<?= $k['id']; ?>" class="btn btn-primary w-100">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<a href="index.php" class="btn btn-secondary mb-3">⬅ Kembali</a>
</div>

</body>
</html>
