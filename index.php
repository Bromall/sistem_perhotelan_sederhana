<?php
session_start();

// Jika sudah login, redirect
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin') {
        header("Location: admin/index.php");
    } else {
        header("Location: user/index.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Reservasi Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-4">

        <div class="card p-4 shadow-lg">
            <h3 class="text-center mb-3">Login</h3>

            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='alert alert-danger'>{$_GET['msg']}</div>";
            }
            ?>

            <form action="auth/login.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="Masukkan email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100">Masuk</button>

                <p class="text-center mt-3">
                    Belum punya akun? <a href="auth/register.php">Daftar</a>
                </p>
            </form>
        </div>

    </div>
</div>

</body>
</html>
