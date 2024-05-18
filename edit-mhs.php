<?php
if (isset($_GET['id'])) {
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$id'");
$data = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                ?>
                    <div class="alert alert-danger my-4"><?= $message ?></div>
                <?php
                }
                ?>
                <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Edit Data Mahasiswa</h2>
                            <a href="index-mhs.php" class="btn btn-primary">Daftar Mahasiswa</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="edit-pmhs.php" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="text" name="npm" id="npm" class="form-control" value="<?= $data['npm'] ?>">
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?=$data['nama'] ?>">
                            </div>
                            <div class="mb-4">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-select">
                                    <option value="Teknik Informatika" <?= $data['jurusan'] == "Teknik Informatika" ? "Selected" : "" ?>>Teknik Informatika</option>
                                    <option value="Sistem Informasi" <?= $data['jurusan'] == "Sistem Informasi" ?"Selected" : "" ?>>Sistem Informasi</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control"><?=$data['alamat'] ?></textarea>
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>