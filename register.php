<?php
session_start();
include "../config/koneksi.php";

// Inisialisasi variabel error agar tidak undefined
$error = "";
$success = "";

// Jika form disubmit
if (isset($_POST['register'])) {
    // Ambil input dan bersihkan
    $nama  = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validasi sederhana
    if ($nama === "" || $email === "" || $password === "") {
        $error = "Semua field harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        // Cek apakah email sudah terdaftar
        $stmt = mysqli_prepare($koneksi, "SELECT id FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $error = "Email sudah terdaftar.";
            mysqli_stmt_close($stmt);
        } else {
            mysqli_stmt_close($stmt);

            // Hash password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert data user (role default 'tamu')
            $ins = mysqli_prepare($koneksi, "INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, 'tamu')");
            if ($ins === false) {
                $error = "Gagal menyiapkan query: " . mysqli_error($koneksi);
            } else {
                mysqli_stmt_bind_param($ins, "sss", $nama, $email, $hash);
                $exec = mysqli_stmt_execute($ins);

                if ($exec) {
                    mysqli_stmt_close($ins);
                    // Redirect ke login dengan pesan sukses (opsional)
                    header("Location: login.php?msg=register_success");
                    exit;
                } else {
                    $error = "Gagal mendaftar: " . mysqli_stmt_error($ins);
                    mysqli_stmt_close($ins);
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register - Reservasi Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 shadow-lg">
                <h3 class="text-center mb-3">Daftar Akun</h3>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success); ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100" name="register" type="submit">Daftar Sekarang</button>

                    <p class="text-center mt-3">
                        Sudah punya akun? <a href="login.php">Masuk</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
