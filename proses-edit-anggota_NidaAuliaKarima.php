<?php

include("config_NidaAuliaKarima.php");

// cek apakah tombol sudah diklik atau belum
if (isset($_POST['simpan'])) {
    // ambil data dari formulir
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $universitas = $_POST['universitas'];
    $jurusan = $_POST['jurusan'];
    $gambar_new = $_FILES['gambar']['name']; // Mengambil nama file gambar baru
    $gambar_old = $_POST['gambar_old']; // Mengambil nama file gambar lama
    // Jika tidak ada file gambar baru yang di-upload atau nama file baru sama dengan nama file lama
    if (empty($gambar_new) || $gambar_new == $gambar_old) {
        $update_gambar = $gambar_old; // Gunakan nama file gambar lama
    } else {
        // Jika ada file gambar baru yang di-upload sudah ada di folder img
        if (file_exists("img/$gambar_new")) {
            $_SESSION['pesan'] = 'Gambar ' . $gambar_new . ' sudah ada';
            header("Location: form_edit.php?no=$no");
            exit;
        }
        $update_gambar = $gambar_new; // Gunakan nama file gambar baru
    }

    // buat query update
    $sql = "UPDATE anggota_kelompok SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', universitas='$universitas', jurusan='$jurusan', gambar='$update_gambar' WHERE id_anggota=$id_anggota";
    $query = mysqli_query($conn, $sql);

    // apakah query disimpan berhasil ?
    if ($query) {
        if ($gambar_new != $gambar_old) { // Jika gambar lama tidak sama dengan gambar baru
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $update_gambar); // Upload gambar baru
            unlink("uploads/$gambar_old"); // Hapus gambar lama
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proses Edit Anggota | Kelompok Remangy</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .container {
                    margin-top: 50px;
                }

                .btn {
                    margin-top: 20px;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <div class="alert alert-success" role="alert">
                    Perubahan data anggota berhasil disimpan.
                </div>
                <a href="list-daftar-anggota_NidaAuliaKarima.php" class="btn btn-primary">Kembali ke Daftar Anggota</a>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
<?php
        exit();
    } else {
        // kalau gagal akan menampilkan pesan error
        die("Gagal menyimpan perubahan: " . mysqli_error($conn));
    }
} else {
    die("Akses dilarang...");
}
?>