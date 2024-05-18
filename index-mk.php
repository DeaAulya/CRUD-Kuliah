<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Mata Kuliah</title>
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
                    <div class="alert alert-success my-4"><?= $message ?></div>
                <?php
                } else if (isset($_GET['message_err'])) {
                    $message_err = $_GET['message_err'];
                ?>
                    <div class="alert alert-danger my-4"><?= $message_err ?></div>
                <?php
                }
                ?>
                
                <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Daftar Mata Kuliah</h2>
                            <a href="add-mk.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Mata Kuliah</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>Jumlah SKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM matakuliah");
                                foreach ($query as $data) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['kodemk'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['jumlah_sks'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit-mk.php?id=<?= $data['kodemk'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete-mk.php?id=<?= $data['kodemk'] ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>