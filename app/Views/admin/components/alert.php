<?php
/** Props: type(info|success|warning|error), text, title? */
$type = $type ?? 'info';
$ic = ['info' => 'info', 'success' => 'check', 'warning' => 'alert', 'error' => 'alert'][$type] ?? 'info';
?>
<div class="alert-<?= e($type) ?>" role="<?= $type === 'error' ? 'alert' : 'status' ?>">
  <?= icon($ic, 'mt-0.5 h-5 w-5 shrink-0') ?>
  <div><?php if (!empty($title)): ?><strong class="block font-semibold"><?= e($title) ?></strong><?php endif; ?><?= e($text ?? '') ?></div>
</div>
