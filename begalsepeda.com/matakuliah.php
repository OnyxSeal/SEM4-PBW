<?php
            include "connection/conn.php";
            // Pengecekan apakah ada parameter kodemk dari URL
            if (isset($_GET['kodemk'])) {
                $kodemk = htmlspecialchars($_GET["kodemk"]);

                // Query untuk menghapus matakuliah dari database
                $sql = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";
                $hasil = mysqli_query($db, $sql);

                // Pengecekan apakah penghapusan berhasil
                if ($hasil) {
                    header("Location: matakuliah.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
                }
            }
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Begal Sepeda</title>
    <link rel="icon" href="https://www.gigaval.com/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body{
            background-color: #1c2733;
            color: #fff;
        }
        .uhuy{
            margin-top: 2%;
            margin-bottom: -10%;
        }
        h1{
            position: relative;
            text-align: left;
            line-height: 0.5;
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

        .gawul:nth-child(even) {
            background-color: rgba(150, 79, 72, 0.1);
            color: white;
        }
        .fTable{
            margin-top: -10px;
            transform: translateY(-10px);
            transform: translateX(-110px);
            width: 1100px;
            max-width: 1300px;
        }

        .bred {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            margin: 0px 2px 0px 2px;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .bred:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }

        .byel {
            text-decoration: none;
            color: #212529;
            background-color: #ffc107;
            border-color: #ffc107;
            margin: 0px 2px 0px 2px;
            padding: 0.375rem 0.55rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .byel:hover {
            color: #212529;
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 0.5;
            border-radius: 0.25rem;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34;
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        @media screen and (max-width: 768px) {
            main {
                flex-direction: column; /* Mengubah tata letak menjadi vertikal pada layar berukuran kecil */
                text-align: center; /* Pusatkan konten saat tata letak berubah menjadi vertikal */
            }
        }


    </style>
</head>
<body>
    <?php include "layout/nav.php"?>
    <main>
        <div class="uhuy">
            <table class="fTable">
                <thead>
                <tr>
                    <td colspan="5"><h1>Tabel Mata Kuliah</h1></th>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="addMK.php"create.php"">
                        <button type="button" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i><b>  Tambah Mata Kuliah</b>
                        </button>
                        </a>
                    </td>
                </tr>
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Jumlah SKS</th>
                        <th>Edit/Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connection/conn.php";
                    $no = 1;
                    // Query untuk mendapatkan data matakuliah dari database
                    $query = mysqli_query($db, "SELECT * FROM matakuliah ORDER BY nama ASC");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr class="gawul">
                            <td><?= $no++ ?></td>
                            <td><?= $data['kodemk'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jumlah_sks'] ?></td>
                            <td>
                                <!-- Link untuk mengarahkan ke halaman edit -->
                                <a href="editMK.php?kodemk=<?php echo htmlspecialchars($data['kodemk']); ?>" class="byel" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                                <!-- Button untuk menghapus matakuliah -->
                                <a onclick="deleteMatkul('<?php echo $data['kodemk']; ?>', '<?php echo $data['nama']; ?>')" class="bred" role="button"><i class="fa-solid fa-trash"></i></a>
                            </td>
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
<script>
    function deleteMatkul(kodemk, nama) {
        // Konfirmasi penghapusan matakuliah
        if (confirm('Yakin ingin menghapus mata kuliah ' + nama +'?')) {
            window.location.href = 'matakuliah.php?kodemk=' + kodemk;
        }
    }
</script>
</html>