<?php
$fullName = $user['nama_lengkap'] ?? 'User';
$email = $user['email'] ?? '-';

$tempatLahir = $profile['tempat_lahir'] ?? '-';
$tanggalLahir = $profile['tanggal_lahir'] ?? '-';
$alamat = $profile['alamat'] ?? '-';
$noHp = $profile['no_hp'] ?? '-';

$summary = $profile['summary'] ?? 'Isi ringkasan CV kamu di profiles.summary.';

$isAdmin = $isAdmin ?? false;

$showEdit = $isAdmin && (($_GET['edit'] ?? '') === '1');

$aboutMe = $profile['about_me'] ?? 'Tulis deskripsi singkat tentang diri kamu di profiles.about_me.';
$photoSrc = !empty($user['photo']) ? $user['photo'] : null;
?>

<div class="card">
  <div class="card-header app-header">My Profile</div>
  <div class="card-body">

    <?php if ($isAdmin) { ?>
      <div class="d-flex gap-2 mb-3">
        <a class="btn btn-outline-secondary" href="index.php?hal=profile&edit=1">Edit Profile</a>
        <?php if ($showEdit) { ?>
          <a class="btn btn-outline-secondary" href="index.php?hal=profile">Tutup</a>
        <?php } ?>
      </div>

      <div class="collapse mb-4 <?= $showEdit ? 'show' : '' ?>" id="collapseEditProfile">
        <div class="card">
          <div class="card-header">Edit Data Diri & CV</div>
          <div class="card-body">
            <form method="post" action="controller/profileController.php" class="row g-3">
              <input type="hidden" name="user_id" value="1" />

              <div class="col-12 col-lg-6">
                <label class="form-label">Nama Lengkap</label>
                <input class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($fullName) ?>" required />
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" value="<?= htmlspecialchars($email) ?>" required />
              </div>
              <div class="col-12">
                <label class="form-label">Photo (path)</label>
                <input class="form-control" name="photo" value="<?= htmlspecialchars($user['photo'] ?? 'img/sttnf.png') ?>" />
              </div>

              <div class="col-12 col-lg-6">
                <label class="form-label">Tempat Lahir</label>
                <input class="form-control" name="tempat_lahir" value="<?= htmlspecialchars($profile['tempat_lahir'] ?? '') ?>" />
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tanggal_lahir" value="<?= htmlspecialchars($profile['tanggal_lahir'] ?? '') ?>" />
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label">No HP</label>
                <input class="form-control" name="no_hp" value="<?= htmlspecialchars($profile['no_hp'] ?? '') ?>" />
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label">GitHub URL</label>
                <input class="form-control" name="github_url" value="<?= htmlspecialchars($profile['github_url'] ?? '') ?>" placeholder="https://github.com/username" />
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label">Instagram URL</label>
                <input class="form-control" name="instagram_url" value="<?= htmlspecialchars($profile['instagram_url'] ?? '') ?>" placeholder="https://instagram.com/username" />
              </div>
              <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="2"><?= htmlspecialchars($profile['alamat'] ?? '') ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">About Me</label>
                <textarea class="form-control" name="about_me" rows="3"><?= htmlspecialchars($profile['about_me'] ?? '') ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Summary (CV)</label>
                <textarea class="form-control" name="summary" rows="3"><?= htmlspecialchars($profile['summary'] ?? '') ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Skills</label>
                <textarea class="form-control" name="skills" rows="2"><?= htmlspecialchars($profile['skills'] ?? '') ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Experience</label>
                <textarea class="form-control" name="experience" rows="3"><?= htmlspecialchars($profile['experience'] ?? '') ?></textarea>
              </div>

              <div class="col-12 d-flex gap-2">
                <button class="btn btn-app" type="submit">Simpan</button>
                <a class="btn btn-outline-secondary" href="index.php?hal=profile">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="profile-card profile-hero p-3 mb-4">
      <div class="row g-3 align-items-stretch">
        <div class="col-12 col-lg-4 d-flex justify-content-center">
          <div class="profile-photo" style="border-color: rgba(255,255,255,.35);">
            <?php if ($photoSrc) { ?>
              <img src="<?= htmlspecialchars($photoSrc) ?>" alt="Foto" />
            <?php } else { ?>
              <div class="placeholder text-white-50">(foto kamu taruh nanti)</div>
            <?php } ?>
          </div>
        </div>
        <div class="col-12 col-lg-8">
          <div class="bg-white rounded-3 p-3 h-100">
            <div class="h5 mb-2">My Profile</div>
            <hr />
            <div><?= nl2br(htmlspecialchars($aboutMe)) ?></div>
            <div class="text-muted mt-3" style="font-size: .9rem;">Last updated</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-12 col-lg-6">
        <h5 class="mb-3">Data Diri</h5>
        <table class="table table-sm">
          <tr>
            <th style="width: 160px;">Nama</th>
            <td><?= htmlspecialchars($fullName) ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($email) ?></td>
          </tr>
          <tr>
            <th>Tempat Lahir</th>
            <td><?= htmlspecialchars($tempatLahir) ?></td>
          </tr>
          <tr>
            <th>Tanggal Lahir</th>
            <td><?= htmlspecialchars($tanggalLahir) ?></td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td><?= nl2br(htmlspecialchars($alamat)) ?></td>
          </tr>
          <tr>
            <th>No HP</th>
            <td><?= htmlspecialchars($noHp) ?></td>
          </tr>
        </table>
      </div>

      <div class="col-12 col-lg-6">
        <h5 class="mb-3">CV</h5>
        <div class="mb-2"><strong>Summary</strong></div>
        <div class="mb-3"><?= nl2br(htmlspecialchars($summary)) ?></div>

        <div class="mb-2"><strong>Skills</strong></div>
        <div class="mb-3"><?= nl2br(htmlspecialchars($profile['skills'] ?? '-')) ?></div>

        <div class="mb-2"><strong>Experience</strong></div>
        <div><?= nl2br(htmlspecialchars($profile['experience'] ?? '-')) ?></div>
      </div>
    </div>

  </div>
</div>
