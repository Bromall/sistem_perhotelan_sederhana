<?php
include "../middleware/admin.php"; 
include "../config/koneksi.php";

// Ambil semua data pengguna
$users = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Manajemen User</h3>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar User</h5>
        </div>

        <div class="card-body">

            <a href="tambahuser.php" class="btn btn-success mb-3">＋ Tambah User</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1; 
                    foreach ($users as $u) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= htmlspecialchars($u['nama']) ?></td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                           <td class="text-center">
                                <?php if ($u['role'] == 'admin'): ?>
                                <span class="badge bg-primary">Admin</span>
                                <?php else: ?>
                                <span class="badge bg-info text-dark">User</span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">

                                <a href="edituser.php?id=<?= $u['id'] ?>" 
                                   class="btn btn-warning btn-sm">
                                    ✏ Edit
                                </a>

                                <a href="hapususer.php?id=<?= $u['id'] ?>" 
                                   onclick="return confirm('Yakin ingin menghapus user ini?')"
                                   class="bt btn-danger btn-sm">
                                    🗑 Hapus
                                </a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                        <a href="index.php" class="btn btn-secondary">⬅ Kembali</a>

            </div>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
