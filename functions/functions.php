<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "proklim_purbayan");
// Check connection
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

function buat_tb($sql, $tb, $aksi)
{
    global $conn;
    if ($aksi == "buat") {
        $aksi = ["Dibuat", "Membuat"];
    } elseif ($aksi == "hapus") {
        $aksi = ["Dihapus", "Menghapus"];
    }
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Table $tb Berhasil $aksi[0]');
                window.location.href='';
            </script>
        ";
    } else {
        echo "<script>
                alert('Gagal $aksi[1] Tabel $tb'" . mysqli_error($conn) . ");
                window.location.href='';
            </script>
        ";
    }
}

function cek_tb($db)
{
    global $conn;
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$db'");
    $cek_table = mysqli_num_rows($result);
    $tabel = [];

    if ($cek_table) {
        $text = "Tabel $db Ada";
    } else {
        $text = "Tabel $db Tidak ada";
    }

    $tabel["text"] = $text;
    $tabel["cek"] = $cek_table;

    return $tabel;
}

function tampil($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);

    $query = "INSERT INTO informasi (judul,  isi)
                VALUES
                    ('$judul', '$isi')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id, $kd)
{
    global $conn;
    if ($kd == 1) {
        $table = 'informasi';
    } else if ($kd == 2) {
        $table = 'gambar';
        hapusGambar($id);
    } else if ($kd == 3) {
        $table = 'runtext';
    }
    mysqli_query($conn, "DELETE FROM $table where id = $id");

    return mysqli_affected_rows($conn);
}

// Hapus gambar
function hapusGambar($id)
{
    $gambar = tampil("SELECT gambar FROM gambar WHERE id = $id");
    unlink("asset/img/" . $gambar[0]["gambar"]);
}

// Tambah Run Text
function runText($data)
{
    global $conn;

    $runtext = htmlspecialchars($data["runtext"]);

    $query = "INSERT INTO runtext (text)
                VALUES
                    ('$runtext')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Upload gambar
function upload()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
        <script>
            alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 5000000) {
        echo "
        <script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    // lolos pengecekan gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'asset/img/' . $namaFileBaru);
    return $namaFileBaru; // supaya menghasilkan nama file
}

// Tambah Gambar
function tambahGambar($data)
{
    global $conn;

    $namaGambar = htmlspecialchars($data["namaGambar"]);
    $gambar = upload();

    $query = "INSERT INTO gambar (gambar, nama_gambar)
                VALUES
                    ('$gambar', '$namaGambar')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Ubah Data Informasi
function ubahInformasi($data)
{
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);

    $query = "UPDATE informasi SET
                judul = '$judul',
                isi = '$isi'

            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Ubah Data Gambar
function ubahGambar($data)
{
    global $conn;

    $id = $data["id"];
    $namaGambar = htmlspecialchars($data["namaGambar"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru / tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        hapusGambar($id);
    }


    $query = "UPDATE gambar SET
                nama_gambar = '$namaGambar',
                gambar = '$gambar'

            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Ubah Data Run Text
function ubahRunText($data)
{
    global $conn;

    $id = $data["id"];
    $runtext = htmlspecialchars($data["runtext"]);

    $query = "UPDATE runtext SET
                text = '$runtext'

            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Registrasi

function registrasi($data)
{
    global $conn;

    $name = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada / belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username yang dipilih sudah terdaftar!');
            </script>
        ";

        return false;
    }

    // cek konfirmasi password
    if (
        $password !== $password2
    ) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!');
            </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user (name, username, password) VALUES('$name','$username', '$password')");

    return mysqli_affected_rows($conn);
}
