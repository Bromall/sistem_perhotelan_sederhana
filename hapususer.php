<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

/*
|==================================================
| HAPUS USER (MENYESUAIKAN users.php)
|==================================================
*/

if (!isset($_GET['id'])) {
    header("Location: users.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// pastikan user ada
$cek = mysqli_query($koneksi, "SELECT id FROM users WHERE id='$id'");
if (mysqli_num_rows($cek) == 0) {
    header("Location: users.php");
    exit;
}

// proses hapus
mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");

// kembali ke halaman user
header("Location: users.php");
exit;
?>
