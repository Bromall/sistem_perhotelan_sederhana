<?php
session_start();
include "../config/koneksi.php";

// Pastikan user sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id'];

// Ambil data user dari database
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id_user'"));

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Profil Saya</h4>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['nama']) ?>&background=0D8ABC&color=fff"
                             class="rounded-circle" width="100">
                    </div>

                    <table class="table table-borderless">
                        <tr>
                            <th>Nama</th>
                            <td><?= $user['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $user['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td><?= ucfirst($user['role']) ?></td>
                        </tr>
                    </table>

                    <div class="mt-3 d-flex justify-content-between">
                        <a href="edit_profil.php" class="btn btn-warning">Edit Profil</a>
                        <a href="ubah_password.php" class="btn btn-secondary">Ubah Password</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
