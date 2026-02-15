<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: reservasi.php");
    exit;
}

$id = intval($_GET['id']);

// Update status menjadi diterima
mysqli_query($koneksi, "
    UPDATE reservasi 
    SET status = 'diterima'
    WHERE id = '$id'
");

header("Location: reservasi.php");
exit;
?>
