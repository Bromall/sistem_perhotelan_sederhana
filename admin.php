<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika belum login
if (!isset($_SESSION['role'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Jika bukan admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../user/index.php");
    exit;
}
?>
