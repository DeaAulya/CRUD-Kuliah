<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
            <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Daftar Data KRS (Kartu Rencana Studi)</h2>
                            <a href="add-krs.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                <div class="table-responsive">
                    <table class="table table-striped center-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Matakuliah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'koneksi.php';

                            $query = mysqli_query($koneksi, "SELECT mahasiswa.npm, mahasiswa.nama AS nama_mahasiswa, krs.matakuliah_kodemk, matakuliah.nama as nama_matkul, matakuliah.jumlah_sks 
                                FROM mahasiswa 
                                INNER JOIN krs ON mahasiswa.npm = krs.mahasiswa_npm
                                INNER JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
                                ORDER BY id ASC
                                ");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_mahasiswa'] ?></td>
                                    <td><?= $data['nama_matkul'] ?></td>
                                    <td>
                                        <span class="text-danger"><?= $data['nama_mahasiswa'] ?></span> mengambil mata kuliah <span class="text-danger"><?= $data['nama_matkul'] ?></span> (<?= $data['jumlah_sks'] ?> SKS)
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit-krs.php?id=<?= $data['npm'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete-krs.php?id=<?= $data['npm'] ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>