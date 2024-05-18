<?php
include 'koneksi.php';
if (isset($_POST['edit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET npm='$npm', nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'");
    if ($query) {
        $message = "Data berhasil diubah";
        $message = urlencode($message);
        header("Location:index-mhs.php?message={$message}");
    } else {
        $message = "Data gagal diubah";
        $message = urlencode($message);
        header("Location:add-mhs.php?message={$message}");
    }
}
?>