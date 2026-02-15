<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

// proses simpan
if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);
    $role  = $_POST['role'];

    mysqli_query($koneksi, "
        INSERT INTO users (nama, email, password, role)
        VALUES ('$nama', '$email', '$pass', '$role')
    ");

    header("Location: users.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow">
<div class="card-header bg-primary text-white fw-bold">
Tambah User
</div>

<div class="card-body">
<form method="post">

<div class="mb-3">
<label class="form-label">Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Role</label>
<select name="role" class="form-select">
    <option value="">-- Pilih Role --</option>
    <option value="admin">Admin</option>
    <option value="user">User</option>
</select>
</div>

<div class="d-flex justify-content-between mt-4">
    <a href="users.php" class="btn btn-secondary">⬅ Kembali</a>
    <button type="submit" name="simpan" class="btn btn-success">💾 Simpan</button>
</div>
