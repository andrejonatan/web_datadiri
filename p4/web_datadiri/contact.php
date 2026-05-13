<?php
$githubUrl = $profile['github_url'] ?? '';
$instagramUrl = $profile['instagram_url'] ?? '';
$emailUser = $user['email'] ?? '';

$githubDefault = 'https://github.com/andrejonatan';
$instagramDefault = 'https://instagram.com/dresennn';
$emailDefault = 'jonatanandre01@gmail.com';

$githubHref = $githubUrl ?: $githubDefault;
$instagramHref = $instagramUrl ?: $instagramDefault;
$emailValue = $emailUser ?: $emailDefault;
$gmailHref = $emailValue ? ('mailto:' . $emailValue) : '';

$contacts = [
  [
    'label' => 'GitHub',
    'icon' => 'bi bi-github',
    'value' => $githubUrl ?: $githubDefault,
    'href' => $githubHref,
    'external' => true,
  ],
  [
    'label' => 'Instagram',
    'icon' => 'bi bi-instagram',
    'value' => $instagramUrl ?: $instagramDefault,
    'href' => $instagramHref,
    'external' => true,
  ],
  [
    'label' => 'Gmail',
    'icon' => 'bi bi-envelope',
    'value' => $emailValue,
    'href' => $gmailHref,
    'external' => false,
  ],
];
?>

<div class="card">
  <div class="card-header app-header">Contact</div>
  <div class="card-body">

    <?php foreach ($contacts as $item): ?>
      <?php
      $hasLink = !empty($item['href']);
      $visitClass = $hasLink ? 'btn btn-sm btn-outline-primary' : 'btn btn-sm btn-secondary disabled';
      $visitAttrs = $hasLink
        ? ''
        : 'tabindex="-1" aria-disabled="true"';
      ?>

      <div class="border rounded p-3 mb-2 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2" style="min-width: 0;">
          <i class="<?= htmlspecialchars($item['icon']) ?>"></i>
          <div style="min-width: 0;">
            <div class="fw-semibold"><?= htmlspecialchars($item['label']) ?></div>
            <div class="text-muted" style="font-size:.9rem; word-break: break-word;">
              <?= htmlspecialchars($item['value'] ?: '-') ?>
            </div>
          </div>
        </div>

        <a
          class="<?= $visitClass ?>"
          href="<?= htmlspecialchars($hasLink ? $item['href'] : '#') ?>"
          <?= $visitAttrs ?>
          <?php if ($hasLink && !empty($item['external'])): ?>target="_blank" rel="noopener"<?php endif; ?>
        >
          Visit
        </a>
      </div>
    <?php endforeach; ?>

  </div>
</div>
