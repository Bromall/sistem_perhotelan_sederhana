<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Cek apakah user sudah login
if (!isset($_SESSION['role'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Jika bukan admin
if ($_SESSION['role'] !== 'tamu') {
    header("Location: ../user/index.php");
    exit;
}
?>
