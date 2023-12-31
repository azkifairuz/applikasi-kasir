<?php
session();
$idUser = $_SESSION['sesid_user'];
$username = $_SESSION['username'];
$roles = $_SESSION['seslevel'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo $title . " | " . $subtitle ?>
  </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet"
    href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet"
    href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet"
    href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet"
    href="<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet"
    href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <h1>Applikasi Kasir</h1>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            option <i class="far fa-bell"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">option</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url('login/gantiPassword/' . $idUser); ?>" class="dropdown-item ">
              <i class="fas fa-users mr-2"></i> Ganti Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url('login/logout') ?>" class="dropdown-item">
              <i class="fas fa-sign-out mr-2"></i> Logout
            </a>
            <div class="dropdown-divider"></div>

          </div>
        </li>


      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="col mt-3">
        <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: 0.8;  width: 30%; margin: 0 0 0 0;">
      </div>
      <div class="col"><a href="index3.html" class="brand-link">Aplikasi Kasir</a></div>



      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block text-capitalize text-xl-center">
              <?php
              echo $username;

              ?>

            </a>
            <a href="#" class="d-block text-capitalize text-xl-center">
              <?php
              if ($roles == 3) {
                echo "kasir";
              } else if ($roles == 2) {
                echo "admin gudang";
              } else {
                echo "super admin";
              }
              ?>


            </a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="<?= base_url('dasboard'); ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php
            if ($roles == 3) {
              ?>
              <li class="nav-item">
                <a href="<?php echo base_url('barangKeluar/formTambahBk'); ?>" class="nav-link">
                  <p>Pemesanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('produk'); ?>" class="nav-link">
                  <p>Produk</p>
                </a>
              </li>
              <?php
            } else if ($roles == 2) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('produk'); ?>" class="nav-link">
                    <p>Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('satuan'); ?>" class="nav-link">
                    <p>Satuan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('kategori'); ?>" class="nav-link">
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('supplier'); ?>" class="nav-link">
                    <p>Supplier</p>
                  </a>
                </li>
                <?php
            } else {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('barangMasuk'); ?>" class="nav-link">
                    <p>Barang Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('pegawai'); ?>" class="nav-link">
                    <p>Pegawai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('kategori'); ?>" class="nav-link">
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('supplier'); ?>" class="nav-link">
                    <p>Supplier</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('satuan'); ?>" class="nav-link">
                    <p>Satuan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('barangKeluar'); ?>" class="nav-link">
                    <p>Barang Keluar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('barangKeluar/historiBk'); ?>" class="nav-link">
                    <p>histori barang keluar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('barangMasuk/historiBm'); ?>" class="nav-link">
                    <p>histori barang masuk</p>
                  </a>
                </li>
                <?php
            }
            ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>