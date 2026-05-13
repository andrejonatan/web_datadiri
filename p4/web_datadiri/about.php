<?php
$about = $profile['about_me'] ?? 'Tulis deskripsi singkat tentang diri kamu di tabel profiles kolom about_me.';
?>

<div class="accordion" id="accordionAbout">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAbout" aria-expanded="true" aria-controls="collapseAbout">
        About Me
      </button>
    </h2>
    <div id="collapseAbout" class="accordion-collapse collapse show" data-bs-parent="#accordionAbout">
      <div class="accordion-body">
        <?= nl2br(htmlspecialchars($about)) ?>
      </div>
    </div>
  </div>
</div>
