<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

$id = $_GET['id'];

// ambil data user
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$user  = mysqli_fetch_assoc($query);

// proses update
if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $role  = $_POST['role'];

    mysqli_query($koneksi, "
        UPDATE users SET
        nama='$nama',
        email='$email',
        role='$role'
        WHERE id='$id'
    ");

    header("Location: users.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow">
<div class="card-header bg-warning fw-bold">
✏ Edit User
</div>

<div class="card-body">
<form method="post">

<div class="mb-3">
<label class="form-label">Nama</label>
<input type="text" name="nama" class="form-control"
value="<?= $user['nama']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control"
value="<?= $user['email']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Role</label>
<select name="role" class="form-select" required>
<option value="admin" <?= $user['role']=='admin'?'selected':''; ?>>Admin</option>
<option value="user" <?= $user['role']=='user'?'selected':''; ?>>User</option>
</select>
</div>

<div class="d-flex justify-content-between">
<a href="users.php" class="btn btn-secondary">⬅ Kembali</a>
<button type="submit" name="simpan" class="btn btn-success">💾 Simpan</button>
</div>

</form>
</div>

</div>
</div>
</div>
</div>

</body>
</html>
