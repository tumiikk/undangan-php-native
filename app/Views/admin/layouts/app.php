<?php
/** Layout dashboard. Vars: title, subtitle?, content, menu, dummy, currentPath */
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <title><?= e($title ?? 'Admin') ?> · Admin Ayu &amp; Kevin</title>
  <link rel="preload" href="<?= e(asset('fonts/pinyon-script-latin-400-normal.woff2')) ?>" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="<?= e(asset('css/admin.css')) ?>">
</head>
<body>
<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-3 focus:top-3 focus:z-[90] focus:rounded-field focus:bg-white focus:px-4 focus:py-2">Lewati ke konten</a>
<div class="min-h-screen lg:pl-sidebar">
  <?= \App\Core\View::partial('admin/partials/sidebar', compact('menu', 'currentPath')) ?>
  <div class="flex min-h-screen flex-col">
    <?= \App\Core\View::partial('admin/partials/header', compact('title', 'subtitle', 'dummy')) ?>
    <main id="main" class="flex-1 px-4 py-6 sm:px-6 lg:px-10 lg:py-8">
      <?= $content ?>
    </main>
    <footer class="px-6 pb-6 text-center text-[12.5px] text-navy-ink/60">Dashboard Undangan Ayu &amp; Kevin · Tahap 2 (data dummy)</footer>
  </div>
</div>

<?= component('modal', [
    'id' => 'modal-publish', 'title' => 'Publikasikan perubahan?',
    'text' => 'Seluruh perubahan draft akan tampil kepada pengunjung undangan. (Demo Tahap 2: belum menyimpan apa pun.)',
    'confirmLabel' => 'Ya, publish',
]) ?>
<div class="toast-host" id="toast-host" aria-live="polite"></div>
<script src="<?= e(asset('js/admin/admin.js')) ?>" defer></script>
</body>
</html>
