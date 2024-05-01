<?php
    include "connection/conn.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama npm
    if (isset($_GET['npm'])) {
        $npm = input($_GET["npm"]);

        $sql = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_assoc($query);
    }

    //Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $npm = htmlspecialchars($_POST["npm"]);
        $namaM = input($_POST["namaM"]);
        $jurusan = input($_POST["jurusan"]);
        $alamat = input($_POST["alamat"]);

        //Query update data pada tabel mahasiswa
        $sql = "UPDATE mahasiswa SET
                namaM = '$namaM',
                jurusan = '$jurusan',
                alamat = '$alamat'
                WHERE npm = '$npm'";

        //Mengeksekusi atau menjalankan query di atas
        $query = mysqli_query($db, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($query) {
            header("Location: mahasiswa.php");
        } else {
            echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="icon" href="https://www.gigaval.com/favicon.ico">
</head>

<style>
    body{
        background-color: #1c2733;
        color: #fff;
        }
    main {
        margin: 7% 20%;
    }
    h1 {
        border-bottom: 2px solid #e91e63;
    }

    .container {
        max-width: 500px;
        margin: 3% 20% auto;
        padding: 20px;
        background-color: #263545;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-group input[type="submit"] {
        background-color: #e91e63;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
        background-color: #0056b3;
    }

    #alamat {
        width: 100%;
        max-width: 100%;
        min-height: 70px;
        height: 100px;
        max-height: 100px;
    }
    #jurusan{
        width: 100%;
        height: 40px;
    }
</style>

<body>
    <?php include "layout/nav.php" ?>
    <main>
        <div>
            <h1>Edit Data Mahasiswa</h1>
        </div>
        <br>
        <div class="mb-3">
            <div class="container">
                <h2>Isi Data dengan Benar</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="namaM">Nama:</label>
                        <input type="text" id="namaM" name="namaM" placeholder="Isi Nama Lengkap" required value="<?php echo isset($data['namaM']) ? $data['namaM'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <select name="jurusan" id="jurusan">
                            <option value="Teknik Informatika" <?php echo isset($data['jurusan']) && $data['jurusan'] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi" <?php echo isset($data['jurusan']) && $data['jurusan'] == 'Sistem Informasi' ? 'selected' : ''; ?>>Sistem Informasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat"><?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?></textarea>
                    </div>
                    <input type="hidden" name="npm" value="<?php echo isset($data['npm']) ? $data['npm'] : ''; ?>" />
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>