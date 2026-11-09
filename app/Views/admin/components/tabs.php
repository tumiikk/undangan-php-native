<?php
/** Props: id, items[ ['id'=>, 'label'=>, 'html'=>] ], active? — tab dikendalikan admin.js */
$active = $active ?? ($items[0]['id'] ?? '');
?>
<div data-tabs="<?= e($id) ?>">
  <div class="tabs" role="tablist">
    <?php foreach ($items as $it): ?>
      <button type="button" class="tab" role="tab" id="tab-<?= e($id . '-' . $it['id']) ?>" aria-controls="panel-<?= e($id . '-' . $it['id']) ?>" aria-selected="<?= $it['id'] === $active ? 'true' : 'false' ?>" data-tab="<?= e($it['id']) ?>"><?= e($it['label']) ?></button>
    <?php endforeach; ?>
  </div>
  <?php foreach ($items as $it): ?>
    <div class="rounded-b-card border border-t-0 border-gold/50 bg-paper-white p-5" role="tabpanel" id="panel-<?= e($id . '-' . $it['id']) ?>" aria-labelledby="tab-<?= e($id . '-' . $it['id']) ?>"<?= $it['id'] === $active ? '' : ' hidden' ?> data-tab-panel="<?= e($it['id']) ?>">
      <?= $it['html'] ?? '' ?>
    </div>
  <?php endforeach; ?>
</div>
