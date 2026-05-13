<?php
// Navbar sederhana (opsional) - tetap cocok dengan sidebar kiri
$req = $req ?? ($_GET['hal'] ?? 'home');
$active = function (string $page) use ($req): string {
    return $req === $page ? 'active' : '';
};

$authUser = $_SESSION['AUTH'] ?? null;
$isLoggedIn = is_array($authUser);
$isAdmin = $isLoggedIn && (($authUser['role'] ?? '') === 'admin');
?>

<nav class="navbar navbar-expand-lg app-navbar" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-semibold" href="index.php?hal=home">AndrePages</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $active('home') ?>" href="index.php?hal=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $active('about') ?>" href="index.php?hal=about">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $active('contact') ?>" href="index.php?hal=contact">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $active('studies') ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Studies
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?hal=studies">Daftar Pendidikan</a></li>
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if (!$isLoggedIn) { ?>
          <li class="nav-item">
            <a class="nav-link <?= $active('login') ?>" href="index.php?hal=login">Login</a>
          </li>
        <?php } else { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars(($authUser['nama_lengkap'] ?? 'User') . ' (' . ($authUser['role'] ?? 'user') . ')') ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <?php if ($isAdmin) { ?>
                <li><span class="dropdown-item-text">Mode Admin</span></li>
                <li><hr class="dropdown-divider"></li>
              <?php } ?>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
