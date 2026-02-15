<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_kamar = $_POST['nama_kamar'];
    $tipe       = $_POST['tipe'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];

    mysqli_query($koneksi, "
        INSERT INTO kamar (nama_kamar, tipe, harga, deskripsi)
        VALUES ('$nama_kamar', '$tipe', '$harga', '$deskripsi')
    ");

    header("Location: kamar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kamar</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card shadow-lg">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Kamar</h5>
                </div>

                <div class="card-body">
                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Nama Kamar</label>
                            <input type="text" name="nama_kamar" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipe</label>
                            <input type="text" name="tipe" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="kamar.php" class="btn btn-secondary">⬅ Kembali</a>
                            <button type="submit" name="simpan" class="btn btn-success">
                                💾 Simpan
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>
