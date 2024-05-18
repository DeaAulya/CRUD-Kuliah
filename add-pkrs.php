<?php
include 'koneksi.php';
if (isset($_POST['tambah'])) {
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];
    
    //Cek Kode MK di database
    $cek1 = mysqli_num_rows(mysqli_query($koneksi, "SELECT mahasiswa_npm FROM krs WHERE mahasiswa_npm='$_POST[mahasiswa_npm]'"));
    $cek2 = mysqli_num_rows(mysqli_query($koneksi, "SELECT matakuliah_kodemk FROM krs WHERE matakuliah_kodemk='$_POST[matakuliah_kodemk]'"));

    if (empty($_POST['mahasiswa_npm'])||empty($_POST['matakuliah_kodemk'])) {
        $message = "Harap lengkapi data!";
        $message = urlencode($message);
        header("Location:add-krs.php?message={$message}");
    } else if ($cek1 < 0 || $cek2 < 0) {
        $message = "Input data tidak terdaftar, pastikan kedua data sudah terdaftar sebelumnya!";
        $message = urlencode($message);
        header("Location:add-krs.php?message={$message}");
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO krs VALUES('AUTO_INCREMENT','$mahasiswa_npm','$matakuliah_kodemk')");
        if ($query) {
            $message = "Data berhasil ditambahkan!";
            $message = urlencode($message);
            header("Location:index-krs.php?message={$message}");
        } else {
            $message_err = "Data gagal ditambahkan, pastikan kedua data yang dinput sudah pernah terdaftar sebelumnya!";
            $message_err = urlencode($message_err);
            header("Location:index-krs.php?message_err={$message_err}");
        }
    }
}
?>