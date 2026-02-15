<?php
include "../middleware/tamu.php";
include "../config/koneksi.php";

$id_user   = $_SESSION['id'];
$id_kamar  = $_POST['id_kamar'];
$checkin   = $_POST['checkin'];
$checkout  = $_POST['checkout'];

$query = "INSERT INTO reservasi (user_id, kamar_id, tanggal_checkin, tanggal_checkout, status)
          VALUES ('$id_user', '$id_kamar', '$checkin', '$checkout', 'menunggu')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Reservasi berhasil! Menunggu konfirmasi admin.'); 
    window.location.href='riwayat.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
