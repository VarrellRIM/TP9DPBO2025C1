<?php


include("presenter/ProsesMahasiswa.php");

$tp = new ProsesMahasiswa();
$id = '';
$nim = '';
$nama = '';
$tempat = '';
$tl = '';
$gender = '';
$email = '';
$telp = '';
$title = 'Tambah';
$action = 'tambah';

// Jika ada parameter id, berarti mode edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = 'Edit';
    $action = 'update';
    
    // Ambil data mahasiswa berdasarkan id
    $data = $tp->getMahasiswaById($id);
    if ($data) {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];
    }
}

// Proses form submission
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    
    if ($action == 'tambah') {
        // Tambah data baru
        $tp->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
    } else {
        // Update data
        $tp->updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title><?= $title ?> Mahasiswa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Mahasiswa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><?= $title ?> Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $tempat ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tl">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tl" name="tl" value="<?= $tl ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki" <?= ($gender == 'Laki-laki') ? 'checked' : '' ?> required>
                                        <label class="form-check-label" for="laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" <?= ($gender == 'Perempuan') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $telp ?>" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
