<?php
    include "connection/conn.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama kodemk
    if (isset($_GET['kodemk'])) {
        $kodemk = input($_GET["kodemk"]);

        $sql = "SELECT * FROM matakuliah WHERE kodemk = '$kodemk'";
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_assoc($query);
    }

    //Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kodemk = htmlspecialchars($_POST["kodemk"]);
        $nama = input($_POST["nama"]);
        $jumlah_sks = input($_POST["jumlah_sks"]);

        //Query update data pada tabel matakuliah
        $sql = "UPDATE matakuliah SET
                nama = '$nama',
                jumlah_sks = '$jumlah_sks'
                WHERE kodemk = '$kodemk'";

        //Mengeksekusi atau menjalankan query di atas
        $query = mysqli_query($db, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($query) {
            header("Location: matakuliah.php");
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
    .form-group input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-group input[type="number"]::-webkit-inner-spin-button,
    .form-group input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
    h3{
        border-bottom: 1px solid white;
    }
    .deskrips{
        margin: 1px;
    }
    .warnTeks{
        text-align: center;
        margin-bottom: -30px;
    }
    .pinky{
        color: #e91e63;
    }
</style>

<body>
    <?php include "layout/nav.php" ?>
    <main>
        <div>
            <h1>Edit Data Matakuliah</h1>
            <div class="warnTeks">
                <h2>Mohon Ubah Data dengan Benar</h2>
            </div>
        </div>
        <br>
        <div class="mb-3">
            <div class="container">
                <h3>Mata Kuliah yang akan Diubah</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group deskrips">
                            <span class="pinky"><?php echo isset($data['nama']) ? $data['nama'] : ''; ?></span>
                            <span>dengan jumlah sks</span>
                            <span class="pinky"><?php echo isset($data['jumlah_sks']) ? $data['jumlah_sks'] : ''; ?></span>
                        </div>
                    </form>
            </div>
        </div>
        <div class="mb-3">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <h4><label for="nama">Nama Mata Kuliah:</label></h4>
                        <input type="text" id="nama" name="nama" placeholder="Isi Nama Matakuliah" required value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <h4><label for="jumlah_sks">Jumlah SKS:</label></h4>
                        <input type="number" id="jumlah_sks" name="jumlah_sks" placeholder="Isi Jumlah SKS" required value="<?php echo isset($data['jumlah_sks']) ? $data['jumlah_sks'] : ''; ?>">
                    </div>
                    <input type="hidden" name="kodemk" value="<?php echo isset($data['kodemk']) ? $data['kodemk'] : ''; ?>" />
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>