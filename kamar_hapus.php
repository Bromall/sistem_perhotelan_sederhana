<?php
include "../middleware/admin.php";
include "../config/koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($koneksi, "DELETE FROM kamar WHERE id='$id'");
}

header("Location: kamar.php");
exit;
?>
