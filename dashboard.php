<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$my_user = $_SESSION["user"];

require 'functions/functions.php';
// $informasi = tampil("SELECT * FROM informasi");
$header = tampil("SELECT * FROM header");
$programs = tampil("SELECT * FROM program");
$about = tampil("SELECT * FROM about");
$users = tampil("SELECT * FROM user");

// var_dump($_SERVER["SERVER_NAME"]);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/plugins/adminLTE/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/plugins/fontawesome/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <title>Dashboard</title>
    <style>
        .aksi {
            width: 10px;
            text-align: center;
        }

        .fa-trash {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "pages/navbar/index.php"; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include "pages/sidebar/index.php" ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Header</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($header) : ?>
                                                <?php $i_header = 1; ?>
                                                <?php foreach ($header as $h) : ?>
                                                    <tr>
                                                        <td><?= $i_header; ?></td>
                                                        <td><?= $header["gambar"] ?></td>
                                                        <td class="aksi">
                                                            <a href="ubahGambar.php"><i class="fa fa-pen"></i></a>
                                                        </td>
                                                        <td class="aksi">
                                                            <a href="hapus.php" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php $i_header++; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4">Maaf Data Kosong</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Program</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Keterangan</th>
                                                <th>Gambar</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($programs) : ?>
                                                <?php $i_program = 1; ?>
                                                <?php foreach ($programs as $program) : ?>
                                                    <tr>
                                                        <td><?= $i_program; ?></td>
                                                        <!-- <td>Kantin Bunga Raya</td> -->
                                                        <td><?= $program["judul"] ?></td>
                                                        <td><?= $program["keterangan"] ?></td>
                                                        <td><?= $program["gambar"] ?></td>
                                                        <td class="aksi">
                                                            <a href="ubahGambar.php"><i class="fa fa-pen"></i></a>
                                                        </td>
                                                        <td class="aksi">
                                                            <a href="hapus.php" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php $i_program++; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4">Maaf Data Kosong</td>
                                                </tr>
                                            <?php endif; ?>
                                            <!-- <tr>
                                                <td>2</td>
                                                <td>Bank Sampah Bunga Raya</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, pariatur?</td>
                                                <td>logo2.jpg</td>
                                                <td class="aksi">
                                                    <a href="ubahGambar.php"><i class="fa fa-pen"></i></a>
                                                </td>
                                                <td class="aksi">
                                                    <a href="hapus.php" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Posyandu Purbayan IX</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, pariatur?</td>
                                                <td>logo3.jpg</td>
                                                <td class="aksi">
                                                    <a href="ubahGambar.php"><i class="fa fa-pen"></i></a>
                                                </td>
                                                <td class="aksi">
                                                    <a href="hapus.php" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">About</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Teks</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($about) : ?>
                                                <?php $i_about = 1; ?>
                                                <?php foreach ($about as $a) : ?>
                                                    <tr>
                                                        <td><?= $i_about; ?></td>
                                                        <td><?= $about["text"]; ?></td>
                                                        <td class="aksi">
                                                            <a href="ubahGambar.php"><i class="fa fa-pen"></i></a>
                                                        </td>
                                                        <td class="aksi">
                                                            <a href="hapus.php" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php $i_about++; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4">Maaf Data Kosong</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">User</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($users) : ?>
                                                <?php $i_about = 1; ?>
                                                <?php foreach ($users as $user) : ?>
                                                    <tr>
                                                        <td><?= $i_about; ?></td>
                                                        <td><?= $user["name"]; ?></td>
                                                        <td><?= $user["username"]; ?></td>
                                                        <td><?= $user["password"]; ?></td>
                                                        <td class="aksi">
                                                            <a href="ubahGambar.php"><i class="fa fa-pen"></i></a>
                                                        </td>
                                                        <td class="aksi">
                                                            <a href="hapus.php" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php $i_about++; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4">Maaf Data Kosong</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="">Proklim Purbayan</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="asset/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="asset/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Sparkline -->
    <!-- <script src="plugins/sparklines/sparkline.js"></script> -->
    <!-- JQVMap -->
    <!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
    <!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
    <!-- daterangepicker -->
    <!-- <script src="plugins/moment/moment.min.js"></script> -->
    <!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
    <!-- Summernote -->
    <script src="asset/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="asset/plugins/overlayScrollbars/js/OverlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="asset/plugins/adminLTE/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="asset/plugins/adminLTE/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="asset/plugins/adminLTE/js/pages/dashboard.js"></script>
</body>

</html>