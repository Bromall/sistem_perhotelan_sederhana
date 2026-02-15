<?php
session_start();
include "../config/koneksi.php";

// Pastikan user login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id'];

// Ambil data user
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id_user'"));

// Jika tombol submit ditekan
$message = "";

if (isset($_POST['update_pass'])) {
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi    = $_POST['konfirmasi'];

    // Cek password lama
    if (!password_verify($password_lama, $user['password'])) {
        $message = '<div class="alert alert-danger">Password lama salah!</div>';
    } 
    else if ($password_baru != $konfirmasi) {
        $message = '<div class="alert alert-warning">Konfirmasi password tidak cocok!</div>';
    } 
    else {
        // Hash password baru
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

        // Update password
        mysqli_query($koneksi, "UPDATE users SET password='$password_hash' WHERE id='$id_user'");

        $message = '<div class="alert alert-success">Password berhasil diubah!</div>';
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Password</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Ubah Password</h4>
                </div>

                <div class="card-body">

                    <?= $message ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="konfirmasi" class="form-control" required>
                        </div>

                        <button type="submit" name="update_pass" class="btn btn-secondary">Ubah Password</button>
                        <a href="profile.php" class="btn btn-dark">Kembali</a>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
