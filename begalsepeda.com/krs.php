        <?php
            include "connection/conn.php";
            if (isset($_GET['id'])) {
                $id=htmlspecialchars($_GET["id"]);

                // $sql="delete from krs where id='$id' ";
                $sql = "DELETE FROM krs WHERE id='$id'";
                $hasil=mysqli_query($db,$sql);

                    if ($hasil) {
                        header("Location:krs.php");

                    }
                    else {
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
            margin-top: 5%;
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
            position: center;
            transform: translateY(-40px);
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
            cursor: pointer;
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
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34;
        }

        .namaM, .nama_mk {
        color: #e91e63;
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
                        <td colspan="5"><h1>Tabel KRS</h1></th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="editK.php">
                            <button type="button" class="btn btn-success">
                                <i class="fa-solid fa-plus"></i><b>  Tambah Data</b>
                            </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Mata Kuliah</th>
                        <th>Keterangan</th>
                        <th>Edit/Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connection/conn.php";
                    $no = 1;
                    // Query for retrieve data from krs table with mahasiswa and mata kuliah table
                    $query = mysqli_query($db, "SELECT krs.id, mahasiswa.namaM, matakuliah.nama AS nama_mk, matakuliah.jumlah_sks
                            FROM krs
                            INNER JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
                            INNER JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
                            ORDER BY mahasiswa.namaM ASC");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr class="gawul">
                        <td><?= $no++ ?></td>
                        <td><?= $data['namaM'] ?></td>
                        <td><?= $data['nama_mk'] ?></td>
                        <td><span class="namaM"><?= $data['namaM'] ?></span> Mengambil Mata Kuliah <span class="nama_mk"><?= $data['nama_mk'] ?></span> (<?= $data['jumlah_sks'] ?> SKS)</td>

                        <td>
                            <a href="editK.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="byel" role="button"><i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            </a>
                            <a onclick="deleteKRS('<?php echo htmlspecialchars($data['id']); ?>', '<?php echo htmlspecialchars($data['namaM']); ?>')" class="bred" role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
<script>
    function deleteKRS(id, namaM) {
        if (confirm('Yakin ingin menghapus data ' + namaM + '?')) {
            window.location.href = 'krs.php?id=' + id;
        }
    }
</script>
<?php include "layout/footer.php"?>
</html>
