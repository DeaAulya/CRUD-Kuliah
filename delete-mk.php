<?php
if (isset($_GET['id'])) {
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kodemk='$id'");
    if ($query) {
        $message = "Data berhasil dihapus!";
        $message = urlencode($message);
        header("Location:index-mk.php?message={$message}");
    } else {
        $message = "Data gagal dihapus!";
        $message = urlencode($message);
        header("Location:add-mk.php?message={$message}");
    }
}
?>