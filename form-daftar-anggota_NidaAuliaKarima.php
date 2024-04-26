<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP & MYSQL - Nida</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="text-center mt-3">
        <h1>Tambah Anggota Baru</h1>
        <h3>Kelompok Remangy</h3>
    </header>
    <div class="container mt-5">
        <form action="proses-tambah-anggota_NidaAuliaKarima.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" required></textarea>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" required>
                    <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select class="form-select" id="agama" name="agama" required>
                    <option selected disabled>Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Atheis">Atheis</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="universitas" class="form-label">Universitas:</label>
                <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Nama universitas" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Nama jurusan" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary" name="daftar">Tambah</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>