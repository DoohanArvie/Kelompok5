<?php
include("config_NidaAuliaKarima.php");

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $univ = $_POST['universitas'];
    $jurusan = $_POST['jurusan'];
    $gambar = $_FILES['gambar']['name'];
    $gambarContent = $_FILES['gambar']['tmp_name'];

    // Set path folder tempat menyimpan gambarnya
    // $gambar = "uploads/" . $nama_file;

    // Proses upload
    // if (move_uploaded_file($tmp_file, $gambar)) {
    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO anggota_kelompok (nama, alamat, jenis_kelamin, agama, universitas, jurusan, gambar) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$univ', '$jurusan', '$gambar')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        move_uploaded_file($gambarContent, 'uploads/' . $gambar); // Upload gambar

        header('Location: index_NidaAuliaKarima.php?status=sukses');
    } else {
        header('Location: index_NidaAuliaKarima.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
