<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP & MYSQL - Nida</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8eafa;
            background-image: url('https://i.pinimg.com/564x/58/34/35/5834359ba14eef2e5b328f595fb29375.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 80px;
        }


        header {
            background-color: #ff7eb9;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        h1 {
            margin-bottom: 0;
        }

        h3 {
            margin-top: 0px;
            font-size: 24px;
            color: #ff7eb9;
        }

        nav {
            background-color: rgba(255, 192, 203, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #ff1493;
            font-weight: bold;
            font-size: 18px;
        }

        nav ul li a:hover {
            color: white;
            background-color: #ff1493;
            padding: 8px 12px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h3>Daftar Anggota Kelompok Remangy</h3>
        <h2>Latihan - Nida Aulia Karima</h2>
    </header>
    <div class="container mt-5">
        <h3>Menu</h3>
        <div class="row">
            <div class="col-md-3">
                <nav>
                    <ul>
                        <li><a href="form-daftar-anggota_NidaAuliaKarima.php">Daftar Angota</a></li>
                        <li><a href="list-daftar-anggota_NidaAuliaKarima.php">List Anggota </a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>