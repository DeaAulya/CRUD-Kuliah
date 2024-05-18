<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Data Mata Kuliah</title>
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
                            <h2>Input Data Mata Kuliah</h2>
                            <a href="index-mk.php" class="btn btn-primary">Daftar Mata Kuliah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add-pmk.php" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="kodemk" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" name="kodemk" id="kodemk" class="form-control" placeholder="Masukkan kode mata kuliah" required>
                            </div>
                            <div class="mb-4">
                                <label for="matkul" class="form-label">Nama Mata Kuliah</label>
                                <input type="text" name="matkul" id="matkul" class="form-control" placeholder="Masukkan nama mata kuliah" required>
                            </div>
                            <div class="mb-4">
                                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                                <div class="input-group mb-3">
                                    <select name="jumlah_sks" id="jumlah_sks" class="form-select">
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                    </select>
                                    <span class="input-group-text">SKS</span>
                                </div>
                            </div>
                            <button type="submit" name="input" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>