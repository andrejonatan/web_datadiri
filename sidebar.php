<?php
// expects: $req, $user, $profile, $authUser, $isAdmin

$active = function (string $page) use ($req): string {
    return $req === $page ? 'active' : '';
};

$photoSrc = !empty($user['photo']) ? $user['photo'] : null;
$authUser = $authUser ?? null;
$isLoggedIn = is_array($authUser);
$isAdmin = $isAdmin ?? false;
?>

<div class="app-sidebar">
  <div class="list-group">
    <a class="list-group-item list-group-item-action <?= $active('home') ?>" href="index.php?hal=home">
      <i class="bi bi-house me-2"></i>Home
    </a>
    <a class="list-group-item list-group-item-action <?= $active('about') ?>" href="index.php?hal=about">
      <i class="bi bi-person me-2"></i>About Me
    </a>
    <a class="list-group-item list-group-item-action <?= $active('contact') ?>" href="index.php?hal=contact">
      <i class="bi bi-envelope me-2"></i>Contact
    </a>
    <a class="list-group-item list-group-item-action <?= $active('studies') ?>" href="index.php?hal=studies">
      <i class="bi bi-mortarboard me-2"></i>My Studies
    </a>
    <a class="list-group-item list-group-item-action <?= $active('profile') ?>" href="index.php?hal=profile">
      <i class="bi bi-card-text me-2"></i>My Profile
    </a>

    <?php if ($isLoggedIn) { ?>
      <div class="list-group-item d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-shield-lock"></i>
          <span><?= htmlspecialchars(($authUser['nama_lengkap'] ?? 'User') . ' (' . ($authUser['role'] ?? 'user') . ')') ?></span>
        </div>
      </div>
      <a class="list-group-item list-group-item-action" href="logout.php">
        <i class="bi bi-box-arrow-right me-2"></i>Logout
      </a>
    <?php } else { ?>
      <a class="list-group-item list-group-item-action <?= $active('login') ?>" href="index.php?hal=login">
        <i class="bi bi-box-arrow-in-right me-2"></i>Login
      </a>
    <?php } ?>
  </div>
</div>
