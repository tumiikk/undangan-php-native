<?php
/** Props: id, title, text, confirmLabel?, confirmVariant?(primary|danger|navy), cancelLabel? ; dibuka dengan data-modal-open="{id}" */
?>
<div class="modal-backdrop" id="<?= e($id) ?>" hidden role="dialog" aria-modal="true" aria-labelledby="<?= e($id) ?>-title" data-modal>
  <div class="modal">
    <h3 id="<?= e($id) ?>-title" class="font-display text-2xl font-semibold text-navy-deep"><?= e($title) ?></h3>
    <p class="mt-2 text-[14.5px] text-navy-ink/85"><?= e($text ?? '') ?></p>
    <div class="mt-6 flex flex-wrap justify-end gap-3">
      <?= component('button', ['label' => $cancelLabel ?? 'Batal', 'variant' => 'secondary', 'attrs' => ['data-modal-close' => true]]) ?>
      <?= component('button', ['label' => $confirmLabel ?? 'Ya, lanjutkan', 'variant' => $confirmVariant ?? 'primary', 'attrs' => ['data-modal-confirm' => true]]) ?>
    </div>
  </div>
</div>
