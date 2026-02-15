<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: reservasi.php");
    exit;
}

$id = intval($_GET['id']);

// Update status menjadi ditolak
mysqli_query($koneksi, "
    UPDATE reservasi 
    SET status = 'ditolak'
    WHERE id = '$id'
");

header("Location: reservasi.php");
exit;
?>
