<?php
/** Props: title?, body (HTML tepercaya dari komponen/template, bukan input pengguna), footer?, variant?(cream), class? */
$base = ($variant ?? '') === 'cream' ? 'card-cream' : 'card';
?>
<section class="<?= e($base . ' ' . ($class ?? '')) ?>">
  <?php if (!empty($title)): ?><h2 class="card-title mb-3"><?= e($title) ?></h2><?php endif; ?>
  <div><?= $body ?? '' ?></div>
  <?php if (!empty($footer)): ?><div class="mt-4 border-t border-gold/30 pt-4"><?= $footer ?></div><?php endif; ?>
</section>
