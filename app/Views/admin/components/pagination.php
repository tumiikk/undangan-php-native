<?php
/** Props: page, pages, base (mis. '?page=') — sederhana: Sebelumnya, nomor, Berikutnya */
$page = max(1, (int) ($page ?? 1));
$pages = max(1, (int) ($pages ?? 1));
$base = $base ?? '?page=';
?>
<nav class="flex flex-wrap items-center justify-center gap-1.5" aria-label="Navigasi halaman">
  <a class="page-btn" href="<?= e($base . max(1, $page - 1)) ?>"<?= $page <= 1 ? ' aria-disabled="true"' : '' ?>><?= icon('chevron-left', 'h-4 w-4') ?><span class="sr-only">Sebelumnya</span></a>
  <?php for ($i = 1; $i <= $pages; $i++): ?>
    <a class="page-btn" href="<?= e($base . $i) ?>"<?= $i === $page ? ' aria-current="page"' : '' ?>><?= $i ?></a>
  <?php endfor; ?>
  <a class="page-btn" href="<?= e($base . min($pages, $page + 1)) ?>"<?= $page >= $pages ? ' aria-disabled="true"' : '' ?>><?= icon('chevron-right', 'h-4 w-4') ?><span class="sr-only">Berikutnya</span></a>
</nav>
