<?php
// Halaman login (admin)
// expects: $dbh, $req

$flash = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = (string)($_POST['password'] ?? '');

  if ($username === '' || $password === '') {
    $flash = ['type' => 'danger', 'text' => 'Username dan password wajib diisi.'];
  } else {
    $stmt = $dbh->prepare('SELECT id, username, password_hash, nama_lengkap, role FROM users WHERE username = :u LIMIT 1');
    $stmt->execute([':u' => $username]);
    $row = $stmt->fetch();

    $ok = $row && !empty($row['password_hash']) && password_verify($password, $row['password_hash']);

    if ($ok) {
      $_SESSION['AUTH'] = [
        'id' => (int)$row['id'],
        'username' => $row['username'],
        'nama_lengkap' => $row['nama_lengkap'],
        'role' => $row['role'] ?? 'user',
      ];
      $target = 'index.php?hal=home';
      if (!headers_sent()) {
        header('Location: ' . $target);
        exit;
      }
      echo '<script>location.href=' . json_encode($target) . ';</script>';
      echo '<noscript><meta http-equiv="refresh" content="0;url=' . htmlspecialchars($target, ENT_QUOTES) . '"></noscript>';
      exit;
    }

    $flash = ['type' => 'danger', 'text' => 'Login gagal. Cek username/password.'];
  }
}
?>

<div class="card">
  <div class="card-header app-header">Login</div>
  <div class="card-body">

    <?php if ($flash) { ?>
      <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>"><?= htmlspecialchars($flash['text']) ?></div>
    <?php } ?>

    <form method="post" class="row g-3" autocomplete="off">
      <div class="col-12 col-md-6">
        <label class="form-label">Username</label>
        <input name="username" class="form-control" required />
      </div>
      <div class="col-12 col-md-6">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control" required />
      </div>
      <div class="col-12">
        <button class="btn btn-app" type="submit">Login</button>
      </div>
    </form>

  </div>
</div>
