<?php

session_start();

if (isset($_SESSION["login"])) {
  header("Location: dashboard.php");
  exit;
}


require "functions/functions.php";

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "
            <script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
            </script>
        ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/plugins/adminLTE/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>DAFTAR</b></h1>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Daftar akun baru</p>

        <form action="" method="post" class="mb-4">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Ulangi Password" name="password2">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="register">Daftar</button>
            </div>
          </div>
        </form>

        <a href="login.php" class="text-center">Saya sudah memiliki akun baru</a>
      </div>
    </div>
  </div>
</body>

</html>