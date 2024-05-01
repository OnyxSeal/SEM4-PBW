<?php
    include "connection/conn.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mahasiswa_npm = htmlspecialchars($_POST["mahasiswa_npm"]);
        $matakuliah_kodemk = htmlspecialchars($_POST["matakuliah_kodemk"]);

        //Query insert data pada tabel krs
        $sql = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";

        //Mengeksekusi atau menjalankan query di atas
        $query = mysqli_query($db, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($query) {
            header("Location: krs.php");
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
    #mahasiswa_jurusan{
        width: 100%;
        height: 40px;
        margin-bottom: 20px;
    }
    #matakuliah_jurusan{
        width: 100%;
        height: 40px;
        margin-bottom: 20px;
    }
</style>

<body>
    <?php include "layout/nav.php" ?>
    <main>
        <div>
            <h1>KRS</h1>
        </div>
        <br>
        <div class="mb-3">
            <div class="container">
                <h2>Isi Data dengan Benar</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label for="NamaMahasiswa">Nama Mahasiswa:</label>
                <select name="mahasiswa_npm" id="mahasiswa_jurusan"> <!-- Ubah id menjadi mahasiswa_jurusan -->
                    <?php
                    // Ambil nama-nama mahasiswa dari tabel mahasiswa
                    $query_mahasiswa = mysqli_query($db, "SELECT npm, namaM FROM mahasiswa"); // Ubah query untuk mendapatkan npm juga
                    while ($mahasiswa = mysqli_fetch_assoc($query_mahasiswa)) {
                        echo "<option value='" . $mahasiswa['npm'] . "'>" . $mahasiswa['namaM'] . "</option>"; // Ubah value menjadi npm
                    }
                    ?>
                </select>

                <label for="Matakuliah">Mata Kuliah:</label>
                <select name="matakuliah_kodemk" id="matakuliah_jurusan"> <!-- Ubah id menjadi matakuliah_jurusan -->
                    <?php
                    // Ambil nama-nama mata kuliah dari tabel matakuliah
                    $query_matakuliah = mysqli_query($db, "SELECT kodemk, nama FROM matakuliah");
                    while ($matakuliah = mysqli_fetch_assoc($query_matakuliah)) {
                        echo "<option value='" . $matakuliah['kodemk'] . "'>" . $matakuliah['nama'] . "</option>";
                    }
                    ?>
                </select>
                <!-- <input type="hidden" name="kodemk" value="<?php echo isset($kodemk) ? $kodemk : ''; ?>" /> --> <!-- Hapus ini karena tidak diperlukan -->
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>" /> <!-- Tambahkan field hidden untuk id -->
                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>

                </form>
            </div>
        </div>
    </main>
</body>
</html>