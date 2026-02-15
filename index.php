<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

// Hitung jumlah data
$jml_kamar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kamar"))['total'];
$jml_tamu  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM users WHERE role='tamu'"))['total'];
$jml_reservasi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM reservasi"))['total'];
$jml_pending = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM reservasi WHERE status='menunggu'"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body { background-color: #f5f6fa; }
        .card-stat {
            transition: .3s;
            cursor: pointer;
        }
        .card-stat:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 22px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold">🏨 Admin Panel</a>

        <div>
            <span class="text-white me-3">
                Halo, <b><?= $_SESSION['nama']; ?></b>
            </span>
            <a href="../auth/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <h3 class="mb-4">Dashboard Admin</h3>

    <div class="row g-3">

        <!-- KAMAR -->
        <div class="col-md-3">
            <div class="card card-stat bg-primary text-white p-3">
                <h1>🛏</h1>
                <h4><?= $jml_kamar; ?></h4>
                <p>Kamar</p>
            </div>
        </div>

        <!-- TAMU -->
        <div class="col-md-3">
            <div class="card card-stat bg-success text-white p-3">
                <h1>👤</h1>
                <h4><?= $jml_tamu; ?></h4>
                <p>Tamu Terdaftar</p>
            </div>
        </div>

        <!-- RESERVASI -->
        <div class="col-md-3">
            <div class="card card-stat bg-warning text-dark p-3">
                <h1>📋</h1>
                <h4><?= $jml_reservasi; ?></h4>
                <p>Total Reservasi</p>
            </div>
        </div>

        <!-- MENUNGGU -->
        <div class="col-md-3">
            <div class="card card-stat bg-danger text-white p-3">
                <h1>⏳</h1>
                <h4><?= $jml_pending; ?></h4>
                <p>Menunggu Konfirmasi</p>
            </div>
        </div>

    </div>

    <!-- MENU -->
    <div class="row mt-4">

        <div class="col-md-4">
            <a href="kamar.php" class="text-decoration-none">
                <div class="card p-3 text-center">
                    <h1>🛏</h1>
                    <h5 class="fw-bold">Kelola Kamar</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="users.php" class="text-decoration-none">
                <div class="card p-3 text-center">
                    <h1>👥</h1>
                    <h5 class="fw-bold">Kelola User / Tamu</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="reservasi.php" class="text-decoration-none">
                <div class="card p-3 text-center">
                    <h1>📜</h1>
                    <h5 class="fw-bold">Kelola Reservasi</h5>
                </div>
            </a>
        </div>

    </div>
</div>

</body>
</html>
