<?php
session_start();

// Web Data Diri - layout mirip folder rwd
include_once 'koneksi.php';
include_once 'models/User.php';
include_once 'models/Profile.php';
include_once 'models/Education.php';

$allowedPages = [
    'home',
    'about',
    'contact',
    'studies',
    'profile',
  'login',
];

$req = $_GET['hal'] ?? 'home';
if (!in_array($req, $allowedPages, true)) {
    $req = 'home';
}

// Auth user (admin/user) - untuk hak akses edit
$authUser = $_SESSION['AUTH'] ?? null;
$isAdmin = is_array($authUser) && (($authUser['role'] ?? '') === 'admin');

// Ambil data "pemilik website" (default id=1) untuk ditampilkan
$userId = 1;
$objUser = new User();
$objProfile = new Profile();

$user = $objUser->getById($userId) ?: ['id' => 0, 'nama_lengkap' => 'User', 'email' => '-', 'photo' => null];
$profile = $objProfile->getByUserId($userId) ?: [];

?><!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Data Diri</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="css/style.css" rel="stylesheet" />
</head>

<body class="bg-light">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <?php include_once 'header.php'; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <?php if (file_exists('menu.php')) { include_once 'menu.php'; } ?>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-12 col-md-3">
        <?php include 'sidebar.php'; ?>
      </div>
      <div class="col-12 col-md-9">
        <?php include_once $req . '.php'; ?>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-12">
        <?php include_once 'footer.php'; ?>
      </div>
    </div>

  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
