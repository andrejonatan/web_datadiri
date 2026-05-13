<?php
  session_start();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Web</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
  <?php
  include_once 'koneksi.php';
  include_once 'models/Produk.php';
  include_once 'models/Jenis.php';
  include_once 'models/Member.php';
  $req = $_GET['hal'] ?? 'home';
  ?>

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'header.php'; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'menu.php'; ?>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="<?= ($req == 'produk_list') ? 'col-md-12' : 'col-md-8' ?>">
        <?php include_once $req . '.php'; ?>
      </div>

      <div class="col-md-4 <?= ($req == 'produk_list') ? 'd-none' : '' ?>">
        <?php include 'sidebar.php'; ?>
      </div>
    </div>

    <?php if ($req == 'produk_list') { ?>
      <div class="row mt-3">
        <div class="col-12 col-md-3">
          <?php include 'sidebar.php'; ?>
        </div>
      </div>
    <?php } ?>

    <br />

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'footer.php'; ?>
      </div>
    </div>

  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>