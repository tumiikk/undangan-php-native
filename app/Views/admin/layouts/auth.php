<?php /** Layout kosong untuk halaman login. Vars: title, content */ ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <title><?= e($title ?? 'Masuk') ?> · Ayu &amp; Kevin</title>
  <link rel="preload" href="<?= e(asset('fonts/pinyon-script-latin-400-normal.woff2')) ?>" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="<?= e(asset('css/admin.css')) ?>">
</head>
<body class="login-bg">
<?= $content ?>
<div class="toast-host" id="toast-host" aria-live="polite"></div>
<script src="<?= e(asset('js/admin/admin.js')) ?>" defer></script>
</body>
</html>
