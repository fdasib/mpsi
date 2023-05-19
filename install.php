<?php

// membuat koneksi
$conn = mysqli_connect("localhost", "root", "");
// cek koneksi
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Mengecek apakah database "mydatabase" sudah ada
$result = mysqli_query($conn, "SHOW DATABASES LIKE 'proklim_purbayan'");
$cek_database = mysqli_num_rows($result);

// Menampilkan pesan jika database sudah ada atau belum
if ($cek_database) {
    $tampil_database = "Database proklim_purbayan Sudah Ada";
} else {
    $tampil_database = "Database proklim_purbayan Belum Ada";
}

// Membuat Database
if (isset($_POST["buat_db"])) {
    $sql = "CREATE DATABASE proklim_purbayan";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Database proklim_purbayan Berhasil Dibuat');
                window.location.href='';
            </script>
        ";
    } else {
        echo "<script>
                alert('Error Membuat Database proklim_purbayan'" . mysqli_error($conn) . ");
                window.location.href='';
            </script>
        ";
    }
} elseif (isset($_POST["hapus_db"])) {
    $sql = "DROP DATABASE proklim_purbayan";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Database proklim_purbayan Berhasil Dihapus');
                window.location.href='';
            </script>
        ";
    } else {
        echo "<script>
                alert('Error Menghapus Database proklim_purbayan'" . mysqli_error($conn) . ");
                window.location.href='';
            </script>
        ";
    }
}

// Menambahkan database
if ($cek_database) {
    $conn = mysqli_connect("localhost", "root", "", "proklim_purbayan");

    require 'functions/functions.php';

    // sql untuk membuat table
    // Header
    $header = cek_tb("header");

    if (isset($_POST["buat_header"])) {
        $sql = "CREATE TABLE header (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            gambar VARCHAR(20) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        buat_tb($sql, "header", "buat");
    } elseif (isset($_POST["hapus_header"])) {
        $sql = "DROP TABLE header";
        buat_tb($sql, "header", "hapus");
    }


    // Program
    $program = cek_tb("program");

    if (isset($_POST["buat_program"])) {
        $sql = "CREATE TABLE program (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        judul VARCHAR(20) NOT NULL,
        keterangan text NOT NULL,
        gambar VARCHAR(20) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        buat_tb($sql, "program", "buat");
    } elseif (isset($_POST["hapus_program"])) {
        $sql = "DROP TABLE program";
        buat_tb($sql, "program", "hapus");
    }



    // About
    $about = cek_tb("about");

    if (isset($_POST["buat_about"])) {
        $sql = "CREATE TABLE about (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            text text NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        buat_tb($sql, "about", "buat");
    } elseif (isset($_POST["hapus_about"])) {
        $sql = "DROP TABLE about";
        buat_tb($sql, "about", "hapus");
    }


    // User
    $user = cek_tb("user");

    if (isset($_POST["buat_user"])) {
        $sql = "CREATE TABLE user (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(60) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        buat_tb($sql, "user", "buat");
    } elseif (isset($_POST["hapus_user"])) {
        $sql = "DROP TABLE user";
        buat_tb($sql, "user", "hapus");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/plugins/adminLTE/css/adminlte.min.css">
    <title>Install</title>
</head>

<body>
    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Informasi</h1>
                            <a href="">
                                <button type="button" class="btn btn-primary">
                                    Tambah Informasi
                                    <i class="nav-icon fa fa-plus-square"></i>
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table border="1" class="table table-hover table-dark" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Database/Table</th>
                                        <th>Keterangan</th>
                                        <th>Buat</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <form action="" method="post">
                                        <tr>
                                            <td>1</td>
                                            <td><b>proklim_purbayan</b></td>
                                            <td><?= $tampil_database; ?></td>
                                            <td>
                                                <button type="submit" name="buat_db" class="btn btn-primary" <?= ($cek_database) ? "disabled" : ""; ?>>
                                                    Buat
                                                </button>
                                            </td>
                                            <td>
                                                <button type="submit" name="hapus_db" class="btn btn-danger" <?= (!$cek_database) ? "disabled" : ""; ?>>
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <?php if ($cek_database) : ?>
                                            <tr>
                                                <td>2</td>
                                                <td><b>Header</b></td>
                                                <td><?= $header["text"]; ?></td>
                                                <td>
                                                    <button type="submit" name="buat_header" class="btn btn-primary" <?= ($header["cek"]) ? "disabled" : ""; ?>>
                                                        Buat
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="submit" name="hapus_header" class="btn btn-danger" <?= (!$header["cek"] && $cek_database) ? "disabled" : ""; ?>>
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><b>Program</b></td>
                                                <td><?= $program["text"]; ?></td>
                                                <td>
                                                    <button type="submit" name="buat_program" class="btn btn-primary" <?= ($program["cek"]  && $cek_database) ? "disabled" : ""; ?>>
                                                        Buat
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="submit" name="hapus_program" class="btn btn-danger" <?= (!$program["cek"]  && $cek_database) ? "disabled" : ""; ?>>
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><b>About</b></td>
                                                <td><?= $about["text"]; ?></td>
                                                <td>
                                                    <button type="submit" name="buat_about" class="btn btn-primary" <?= ($about["cek"]  && $cek_database) ? "disabled" : ""; ?>>
                                                        Buat
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="submit" name="hapus_about" class="btn btn-danger" <?= (!$about["cek"]  && $cek_database) ? "disabled" : ""; ?>>
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><b>User</b></td>
                                                <td><?= $user["text"]; ?></td>
                                                <td>
                                                    <button type="submit" name="buat_user" class="btn btn-primary" <?= ($user["cek"] && $cek_database) ? "disabled" : ""; ?>>
                                                        Buat
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="submit" name="hapus_user" class="btn btn-danger" <?= (!$user["cek"] && $cek_database) ? "disabled" : ""; ?>>
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>