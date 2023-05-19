<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="asset/img/logo.png" alt="Purbayan" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Proklim Purbayan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="asset/img/author.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $my_user; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link <?= ($_SERVER["REQUEST_URI"] == "/MPSI/dashboard.php") ? "active" : ""; ?>">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tambah.php" class="nav-link  <?= ($_SERVER["REQUEST_URI"] == "/MPSI/tambah.php") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-plus-square"></i>
                        <p>
                            Tambah Data
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ubah.php" class="nav-link  <?= ($_SERVER["REQUEST_URI"] == "/MPSI/ubah.php") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-pen"></i>
                        <p>
                            Ubah Data
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="logout.php" class="nav-link bg-danger">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>