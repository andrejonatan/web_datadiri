<?php
$userId = (int)($user['id'] ?? 1);
$stmt = $dbh->prepare('SELECT id, jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi FROM educations WHERE user_id = :id ORDER BY tahun_mulai DESC');
$stmt->execute([':id' => $userId]);
$rows = $stmt->fetchAll();

$isAdmin = $isAdmin ?? false;

$editId = (int)($_GET['edit_id'] ?? 0);
$editRow = null;
if ($isAdmin && $editId > 0) {
  $stmtE = $dbh->prepare('SELECT id, jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi FROM educations WHERE id = :id LIMIT 1');
  $stmtE->execute([':id' => $editId]);
  $editRow = $stmtE->fetch();
}
?>

<div class="card">
  <div class="card-header app-header">My Studies</div>
  <div class="card-body">

    <?php if ($isAdmin) { ?>
      <div class="alert alert-warning">Kamu login sebagai <strong>admin</strong>. Edit/tambah data tersedia.</div>

      <?php if ($editRow) { ?>
        <div class="card mb-4">
          <div class="card-header">Edit Pendidikan</div>
          <div class="card-body">
            <form method="post" action="controller/educationController.php" class="row g-3">
              <input type="hidden" name="proses" value="ubah" />
              <input type="hidden" name="id" value="<?= (int)$editRow['id'] ?>" />

              <div class="col-12 col-md-4">
                <label class="form-label">Jenjang</label>
                <input class="form-control" name="jenjang" value="<?= htmlspecialchars($editRow['jenjang']) ?>" required />
              </div>
              <div class="col-12 col-md-8">
                <label class="form-label">Institusi</label>
                <input class="form-control" name="institusi" value="<?= htmlspecialchars($editRow['institusi']) ?>" required />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">Jurusan</label>
                <input class="form-control" name="jurusan" value="<?= htmlspecialchars($editRow['jurusan'] ?? '') ?>" />
              </div>
              <div class="col-6 col-md-3">
                <label class="form-label">Tahun Mulai</label>
                <input class="form-control" type="number" name="tahun_mulai" min="1900" max="2100" value="<?= htmlspecialchars($editRow['tahun_mulai']) ?>" required />
              </div>
              <div class="col-6 col-md-3">
                <label class="form-label">Tahun Selesai</label>
                <input class="form-control" type="number" name="tahun_selesai" min="1900" max="2100" value="<?= htmlspecialchars($editRow['tahun_selesai'] ?? '') ?>" />
              </div>
              <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="2"><?= htmlspecialchars($editRow['deskripsi'] ?? '') ?></textarea>
              </div>
              <div class="col-12 d-flex gap-2">
                <button class="btn btn-app" type="submit">Update</button>
                <a class="btn btn-outline-secondary" href="index.php?hal=studies">Batal</a>
              </div>
            </form>
          </div>
        </div>
      <?php } ?>

      <p class="mb-2">
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTambah" aria-expanded="false" aria-controls="collapseTambah">
          Tambah Pendidikan
        </button>
      </p>
      <div class="collapse mb-4" id="collapseTambah">
        <div class="card">
          <div class="card-header">Tambah Pendidikan</div>
          <div class="card-body">
            <form method="post" action="controller/educationController.php" class="row g-3">
              <input type="hidden" name="user_id" value="1" />
              <input type="hidden" name="proses" value="simpan" />

              <div class="col-12 col-md-4">
                <label class="form-label">Jenjang</label>
                <input class="form-control" name="jenjang" placeholder="S1" required />
              </div>
              <div class="col-12 col-md-8">
                <label class="form-label">Institusi</label>
                <input class="form-control" name="institusi" placeholder="Nama Kampus" required />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">Jurusan</label>
                <input class="form-control" name="jurusan" placeholder="Informatika" />
              </div>
              <div class="col-6 col-md-3">
                <label class="form-label">Tahun Mulai</label>
                <input class="form-control" type="number" name="tahun_mulai" min="1900" max="2100" required />
              </div>
              <div class="col-6 col-md-3">
                <label class="form-label">Tahun Selesai</label>
                <input class="form-control" type="number" name="tahun_selesai" min="1900" max="2100" />
              </div>
              <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="2"></textarea>
              </div>
              <div class="col-12">
                <button class="btn btn-app" type="submit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php if (!$rows) { ?>
      <div class="alert alert-info mb-0">Data pendidikan belum ada. Isi di tabel <strong>educations</strong>.</div>
    <?php } else { ?>
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th>Jenjang</th>
              <th>Institusi</th>
              <th>Jurusan</th>
              <th>Tahun</th>
              <th>Deskripsi</th>
              <?php if ($isAdmin) { ?><th style="width: 90px;">Aksi</th><?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rows as $r) { ?>
              <tr>
                <td><?= htmlspecialchars($r['jenjang']) ?></td>
                <td><?= htmlspecialchars($r['institusi']) ?></td>
                <td><?= htmlspecialchars($r['jurusan']) ?></td>
                <td><?= htmlspecialchars($r['tahun_mulai']) ?> - <?= htmlspecialchars($r['tahun_selesai'] ?? '') ?></td>
                <td><?= nl2br(htmlspecialchars($r['deskripsi'] ?? '')) ?></td>
                <?php if ($isAdmin) { ?>
                  <td>
                    <div class="d-flex gap-2">
                      <a class="btn btn-sm btn-outline-secondary" href="index.php?hal=studies&edit_id=<?= (int)$r['id'] ?>">Edit</a>
                      <form method="post" action="controller/educationController.php" onsubmit="return confirm('Hapus data ini?');">
                        <input type="hidden" name="proses" value="hapus" />
                        <input type="hidden" name="id" value="<?= (int)$r['id'] ?>" />
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                      </form>
                    </div>
                  </td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    <?php } ?>

  </div>
</div>

<div class="card mt-3">
  <div class="card-header app-header">CV</div>
  <div class="card-body">
    <div class="mb-2"><strong>Summary</strong></div>
    <div class="mb-3"><?= nl2br(htmlspecialchars($profile['summary'] ?? 'Isi ringkasan CV kamu di profiles.summary.')) ?></div>

    <div class="mb-2"><strong>Skills</strong></div>
    <div class="mb-3"><?= nl2br(htmlspecialchars($profile['skills'] ?? 'Isi skill kamu di profiles.skills')) ?></div>

    <div class="mb-2"><strong>Experience</strong></div>
    <div><?= nl2br(htmlspecialchars($profile['experience'] ?? 'Isi pengalaman kamu di profiles.experience')) ?></div>
  </div>
</div>
