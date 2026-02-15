<?php
include "../middleware/tamu.php";
include "../config/koneksi.php";

$id = $_GET['id'];
$kamar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kamar WHERE id='$id'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reservasi Kamar</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="p-4 bg-light">

<div class="container">
    <h3 class="mb-4">🛏 Reservasi Kamar</h3>

    <a href="kamar.php" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card p-4 shadow-sm" style="max-width: 600px;">
        <form action="pesan_proses.php" method="POST">

            <input type="hidden" name="id_kamar" value="<?= $kamar['id']; ?>">

            <div class="mb-3">
                <label class="form-label">Nama Kamar</label>
                <input type="text" class="form-control" value="<?= $kamar['nama_kamar']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Check-in</label>
                <input type="date" name="checkin" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Check-out</label>
                <input type="date" name="checkout" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">
                Lakukan Reservasi
            </button>
        </form>
    </div>
</div>

</body>
</html>
