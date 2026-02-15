<?php
session_start();
include "../config/koneksi.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($pass, $data['password'])) {

        // Simpan session per field
        $_SESSION['id']   = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        // Arahkan berdasarkan role
        if ($data['role'] == 'admin') {
            header("Location: ../admin/index.php");
        } else {
            header("Location: ../user/index.php");
        }
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card p-4 shadow">
          <h4 class="text-center">Login</h4>

          <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

          <form method="POST">
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100" name="login">Login</button>

            <p class="text-center mt-2">
              Belum punya akun? <a href="register.php">Daftar</a>
            </p>
          </form>
        </div>
    </div>
  </div>
</div>

</body>
</html>
