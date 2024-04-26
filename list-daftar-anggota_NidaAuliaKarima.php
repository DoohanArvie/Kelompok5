<?php
include("config_NidaAuliaKarima.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP & MYSQL - Nida</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .anggota {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
        }

        .anggota th {
            text-align: center;
            background-color: #FF69B4;
            /* Warna pink */
            color: white;
        }

        .anggota td,
        .anggota th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .anggota tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .anggota tr:hover {
            background-color: #ddd;
        }

        .fcc-btn1 {
            background-color: #008CBA;
            color: white;
            padding: 5px 15px;
            border-radius: 8px;
            text-decoration: none;
        }

        .fcc-btn2 {
            background-color: #f44336;
            color: white;
            padding: 5px 15px;
            border-radius: 8px;
            text-decoration: none;
        }

        .fcc-btn3 {
            background-color: #4CAF50;
            color: white;
            padding: 5px 15px;
            border-radius: 8px;
            text-decoration: none;
        }

        .bg-pink {
            background-color: #FF69B4;
        }

        .btn-pink {
            background-color: #FF69B4;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background-color: #D23669;
        }
    </style>
</head>

<body>
    <header class="bg-pink text-white text-center p-4">
        <h1>Daftar Anggota Kelompok Remangy</h1>
    </header>
    <nav class="p-3">
        <a class='btn btn-pink' href="form-daftar-anggota_NidaAuliaKarima.php">Tambah Anggota</a>
    </nav>
    <div class="container">
        <table class="table table-bordered anggota">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Universitas</th>
                    <th>Jurusan</th>
                    <th>Gambar</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM anggota_kelompok";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while ($anggota = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $anggota["id_anggota"]; ?></td>
                            <td><?php echo $anggota["nama"]; ?></td>
                            <td><?php echo $anggota["alamat"]; ?></td>
                            <td><?php echo $anggota["jenis_kelamin"]; ?></td>
                            <td><?php echo $anggota["agama"]; ?></td>
                            <td><?php echo $anggota["universitas"]; ?></td>
                            <td><?php echo $anggota["jurusan"]; ?></td>
                            <td> <?php
                                    if (!empty($anggota['gambar'])) { ?>
                                    <img src="uploads/<?php echo $anggota["gambar"]; ?>" width="100" class="img-thumbnail"> <?php
                                                                                                                        } ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="form-edit-anggota_NidaAuliaKarima.php?id_anggota=<?php echo htmlspecialchars($anggota['id_anggota']); ?>" class='btn btn-primary'>Edit</a>
                                    <a href="hapus-anggota_NidaAuliaKarima.php?id_anggota=<?php echo htmlspecialchars($anggota['id_anggota']); ?>" class='btn btn-danger'>Hapus</a>
                                </div>
                            </td>
                        </tr> <?php
                            }
                        } else { ?>
                    <tr>
                        <td colspan="8">
                            <p class="text-center">Tidak ada data</p>
                        </td>
                    </tr> <?php
                        } ?>
            </tbody>
        </table>
        <h3 class="mt-3">Total: <?php echo mysqli_num_rows($query) ?> Anggota baru</h3>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>