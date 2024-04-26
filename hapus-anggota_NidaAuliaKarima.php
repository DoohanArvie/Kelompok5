<?php
include("config_NidaAuliaKarima.php");

if (isset($_GET['id_anggota'])) {

    // Ambil id dari query string
    $id = $_GET['id_anggota'];
    $data = mysqli_query($conn, "SELECT * FROM anggota_kelompok WHERE id_anggota = $id");
    $row = mysqli_fetch_array($data);

    $gambar = $row['gambar'];
    if (file_exists("uploads/$gambar")) {
        unlink("uploads/$gambar");
    }
    // Buat query hapus
    $sql_delete = "DELETE FROM anggota_kelompok WHERE id_anggota=$id";
    $query_delete = mysqli_query($conn, $sql_delete);

    // Jika query hapus berhasil
    if ($query_delete) {
        // Perbarui ulang ID agar berurutan
        $sql_update = "SET @num := 0;
                       UPDATE anggota_kelompok SET id_anggota = @num := (@num+1);
                       ALTER TABLE anggota_kelompok AUTO_INCREMENT = 1;";
        $query_update = mysqli_multi_query($conn, $sql_update);

        // Apakah query update berhasil?
        if ($query_update) {
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Latihan PHP dan MYSQL - Nida</title>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
            </head>

            <body>
                <div class="container">
                    <div class="alert alert-success mt-5" role="alert">
                        Anggota berhasil dihapus.
                    </div>
                    <a href="list-daftar-anggota_NidaAuliaKarima.php" class="btn btn-primary">Kembali ke Daftar Anggota</a>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
            </body>

            </html>
<?php
            exit();
        } else {
            die("Gagal memperbarui ID anggota...");
        }
    } else {
        die("Gagal menghapus anggota...");
    }
} else {
    die("Akses dilarang...");
}
?>