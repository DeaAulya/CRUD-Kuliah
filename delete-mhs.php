<?php
if (isset($_GET['id'])) {
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm='$id'");
    if ($query) {
        $message = "Data berhasil dihapus!";
        $message = urlencode($message);
        header("Location:index-mhs.php?message={$message}");
    } else {
        $message = "Data gagal dihapus!";
        $message = urlencode($message);
        header("Location:add-mhs.php?message={$message}");
    }
}
?>