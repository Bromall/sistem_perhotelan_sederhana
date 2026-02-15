<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

$id = $_GET['id'];

// ambil data kamar
$query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

// proses update
if (isset($_POST['update'])) {
    $nama  = $_POST['nama_kamar'];
    $tipe  = $_POST['tipe'];
    $harga = $_POST['harga'];
    $desk  = $_POST['deskripsi'];

    mysqli_query($koneksi, "
        UPDATE kamar SET
        nama_kamar = '$nama',
        tipe       = '$tipe',
        harga      = '$harga',
        deskripsi  = '$desk'
        WHERE id   = '$id'
    ");

    header("Location: kamar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Kamar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow">
<div class="card-header bg-warning fw-bold">
Edit Kamar
</div>

<div class="card-body">
<form method="post">

<div class="mb-3">
<label class="form-label">Nama Kamar</label>
<input type="text" name="nama_kamar" class="form-control"
value="<?= $data['nama_kamar']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Tipe</label>
<input type="text" name="tipe" class="form-control"
value="<?= $data['tipe']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Harga</label>
<input type="number" name="harga" class="form-control"
value="<?= $data['harga']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Deskripsi</label>
<textarea name="deskripsi" class="form-control" rows="3"><?= $data['deskripsi']; ?></textarea>
</div>

<div class="d-flex justify-content-between">
<a href="kamar.php" class="btn btn-secondary">⬅ Kembali</a>
<button type="submit" name="update" class="btn btn-success">💾 Update</button>
</div>

</form>
</div>
</div>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
