<?php
if ($_SERVER['REQUEST_URI'] === '/begalsepeda.com/index.php') {
    header('Location: /begalsepeda.com/', true, 302);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Begal Sepeda</title>
    <link rel="icon" href="https://www.gigaval.com/favicon.ico">
    <style>
        body{
            background-color: #1c2733;
            color: #fff;
        }
        .uhuy{
            margin-top: -5%;
            margin-bottom: -12%;
        }
        h1{
            text-align: center;
        }
        table{
            margin: 10%;
            width: 80%;
            border-collapse: collapse;
            border: none;
        }

        th{
            border-bottom: 1px solid #fff;
            border-top: 1px solid #fff;
        }

        td, th{
            
            text-align: left;
            padding-left: 10px;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: rgba(150, 79, 72, 0.1);
            color: white;
        }
        .fTable{
            transform: translateY(-130px);
        }
        .namaM, .nama_mk {
        color: #e91e63;
        }
    </style>
</head>
<body>
    <?php include "layout/nav.php"?>
    <?php include "layout/slidedhwkadhw.php"?>
    <main>
        <div class="uhuy">
            <h1>Tabel KRS</h1>
            <table class="fTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Mata Kuliah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connection/conn.php";
                    $no = 1;
                    // Query for retrieve data from krs table with mahasiswa and mata kuliah table
                    $query = mysqli_query($db, "SELECT mahasiswa.namaM, matakuliah.nama AS nama_mk, matakuliah.jumlah_sks
                                                FROM krs
                                                INNER JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
                                                INNER JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
                                                ORDER BY mahasiswa.namaM ASC");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['namaM'] ?></td>
                        <td><?= $data['nama_mk'] ?></td>
                        <td><span class="namaM"><?= $data['namaM'] ?></span> Mengambil Mata Kuliah <span class="nama_mk"><?= $data['nama_mk'] ?></span> (<?= $data['jumlah_sks'] ?> SKS)</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include "layout/footer.php"?>
</body>
</html>
