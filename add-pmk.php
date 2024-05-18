<?php
include 'koneksi.php';
if (isset($_POST['input'])) {
    $kodemk = $_POST['kodemk'];
    $matkul = $_POST['matkul'];
    $jumlah_sks = $_POST['jumlah_sks'];
    
    //Cek Kode MK di database
    $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT kodemk FROM matakuliah WHERE kodemk='$_POST[kodemk]'"));

    if (empty($_POST['kodemk'])||empty($_POST['matkul'])||empty($_POST['jumlah_sks'])) {
        $message = "Harap lengkapi data!";
        $message = urlencode($message);
        header("Location:add-mk.php?message={$message}");
    } else if ($cek > 0) {
        $message = "Kode mata kuliah sudah digunakan, silahkan ganti yang lain!";
        $message = urlencode($message);
        header("Location:add-mk.php?message={$message}");
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO matakuliah VALUES('$kodemk','$matkul','$jumlah_sks')");
        if ($query) {
            $message = "Data berhasil ditambahkan!";
            $message = urlencode($message);
            header("Location:index-mk.php?message={$message}");
        } else {
            $message_err = "Data gagal ditambahkan!";
            $message_err = urlencode($message_err);
            header("Location:index-mk.php?message_err={$message_err}");
        }
    }
}
?>