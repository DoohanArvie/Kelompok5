<?php
include("config_NidaAuliaKarima.php");

if (!isset($_GET['id_anggota'])) {
    // jika id tidak ada dalam query string
    header('Location: index.php');
}

// Ambil data no dari query string
$id = $_GET['id_anggota'];

// Cek apakah no ada dalam database
$sql = "SELECT * FROM anggota_kelompok WHERE id_anggota='$id'";
$result = mysqli_query($conn, $sql);
$anggota = mysqli_fetch_assoc($result);

// Jika no tidak ada dalam database
if (mysqli_num_rows($result) < 1) {
    die("data tidak ditemukan...");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota Kelompok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Anggota</h2>
        <form id="form" action="proses-edit-anggota_NidaAuliaKarima.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_anggota" class="form-label">No</label>
                <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?= $anggota['id_anggota'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $anggota['alamat'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" <?php if ($anggota['jenis_kelamin'] == "Laki-laki") echo "checked"; ?> required>
                    <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" <?php if ($anggota['jenis_kelamin'] == "Perempuan") echo "checked"; ?> required>
                    <label class="form-check-label" for="Perempuan">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" id="agama" name="agama" required>
                    <option value="Islam" <?php if ($anggota['agama'] == "Islam") echo "selected"; ?>>Islam</option>
                    <option value="Kristen" <?php if ($anggota['agama'] == "Kristen") echo "selected"; ?>>Kristen</option>
                    <option value="Katolik" <?php if ($anggota['agama'] == "Katolik") echo "selected"; ?>>Katolik</option>
                    <option value="Hindu" <?php if ($anggota['agama'] == "Hindu") echo "selected"; ?>>Hindu</option>
                    <option value="Budha" <?php if ($anggota['agama'] == "Budha") echo "selected"; ?>>Budha</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="universitas" class="form-label">Universitas</label>
                <input type="text" class="form-control" id="universitas" name="universitas" value="<?= $anggota['universitas'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $anggota['jurusan'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar saat ini:</label>
                <?php
                $gambar = $anggota['gambar']; // Nama file gambar dari database 
                $gambar_path = "uploads/" . $gambar; // Path gambar di folder img 
                if (!empty($gambar) && file_exists($gambar_path)) : ?> <!-- Cek apakah file gambar ada di folder img dan apakah file tersebut ada -->
                    <img src="<?= htmlspecialchars($gambar_path); ?>" id="GambarSaatIni" alt="Gambar saat ini" width="150" class="img-thumbnail"> <!-- Tampilkan gambar saat ini -->
                <?php endif; ?>
                <input type="hidden" name="gambar_old" value="<?= $anggota['gambar'] ?>">
            </div>
            <button type="submit" id="simpan" name="simpan" class="btn btn-primary">Edit</button>
            <a href="index.php" class="btn btn-danger btn-kembali">Kembali</a>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>