<?php
$photoSrc = !empty($user['photo']) ? $user['photo'] : null;
$desc = $profile['about_me'] ?? ($profile['summary'] ?? 'Website data diri sederhana (CV & Pendidikan).');
?>

<div class="card">
  <div class="card-header app-header">Home</div>
  <div class="card-body">

    <div class="row g-3 align-items-stretch">
      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="profile-photo" style="border-color: rgba(0,0,0,.1); background: #fff;">
          <?php if ($photoSrc) { ?>
            <img src="<?= htmlspecialchars($photoSrc) ?>" alt="Foto" />
          <?php } else { ?>
            <div class="placeholder">masukkan foto di sini</div>
          <?php } ?>
        </div>
      </div>
      <div class="col-12 col-md-8">
        <h5 class="mb-2">Welcome</h5>
        <div class="text-muted mb-3" style="font-size: .95rem;">
          <?= nl2br(htmlspecialchars($desc)) ?>
        </div>
        <a href="index.php?hal=profile" class="btn btn-app">Lihat Profil</a>
      </div>
    </div>

  </div>
</div>
