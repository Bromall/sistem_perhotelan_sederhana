<?php
session_start();
include "../config/koneksi.php";

// Cek login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id'];

// Ambil data user
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id_user'"));

// Update profil
if (isset($_POST['update'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "UPDATE users SET nama='$nama', email='$email' WHERE id='$id_user'");

    // Update session agar nama di navbar ikut berubah
    $_SESSION['nama'] = $nama;

    header("Location: profile.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">Edit Profil</h4>
                </div>

                <div class="card-body">

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" 
                                   value="<?= $user['nama'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" 
                                   value="<?= $user['email'] ?>" required>
                        </div>

                        <button type="submit" name="update" class="btn btn-warning">Simpan Perubahan</button>
                        <a href="profile.php" class="btn btn-secondary">Kembali</a>
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
