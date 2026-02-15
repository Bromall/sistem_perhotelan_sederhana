<?php
include "../middleware/tamu.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Tamu</title>

    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f5f6fa;
        }
        .card-menu {
            transition: 0.3s;
            cursor: pointer;
            border-radius: 12px;
        }
        .card-menu:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 25px rgba(0,0,0,0.12);
        }
        .icon-large {
            font-size: 55px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            🏨 MyHotel — Dashboard Tamu
        </a>

        <div class="d-flex align-items-center">
            <span class="text-white me-3">
                Halo, <b><?= $_SESSION['nama']; ?></b>
            </span>
            <a href="../auth/logout.php" class="btn btn-outline-light btn-sm">
                Logout
            </a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container mt-4">

    <h3 class="mb-4 fw-bold">Menu Utama</h3>

    <div class="row g-4">

        <!-- CARD LIHAT KAMAR -->
        <div class="col-md-4">
            <div class="card card-menu p-4 text-center h-100"
                 onclick="window.location.href='kamar.php'">
                <div class="icon-large">🛏</div>
                <h5 class="mt-3 fw-bold">Lihat Kamar</h5>
                <p class="text-muted">Cek seluruh kamar yang tersedia</p>
            </div>
        </div>

        <!-- CARD RIWAYAT -->
        <div class="col-md-4">
            <div class="card card-menu p-4 text-center h-100"
                 onclick="window.location.href='riwayat.php'">
                <div class="icon-large">📜</div>
                <h5 class="mt-3 fw-bold">Riwayat Reservasi</h5>
                <p class="text-muted">Lihat histori pemesanan Anda</p>
            </div>
        </div>

        <!-- CARD PROFIL -->
        <div class="col-md-4">
            <div class="card card-menu p-4 text-center h-100"
                 onclick="window.location.href='profil.php'">
                <div class="icon-large">👤</div>
                <h5 class="mt-3 fw-bold">Profil Saya</h5>
                <p class="text-muted">Lihat & perbarui data profil Anda</p>
            </div>
        </div>

    </div>

</div>

</body>
</html>
