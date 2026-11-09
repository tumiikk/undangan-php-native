<?php /** Props: title, text, action? (HTML tombol dari component()) — ornamen daisy hanya di sini & header */ ?>
<div class="relative overflow-hidden rounded-card border border-dashed border-gold/60 bg-paper-soft px-6 py-12 text-center">
  <img src="<?= e(asset('images/ornaments/daisy-blue-top-right.png')) ?>" alt="" class="pointer-events-none absolute -right-6 -top-4 w-44 opacity-40" loading="lazy">
  <img src="<?= e(asset('images/ornaments/daisy-gold-bottom-left.png')) ?>" alt="" class="pointer-events-none absolute -bottom-3 -left-6 w-40 opacity-50" loading="lazy">
  <div class="relative">
    <h3 class="font-script text-4xl text-navy-deep"><?= e($title) ?></h3>
    <?= component('divider', ['class' => 'mx-auto my-3 max-w-[14rem]']) ?>
    <p class="mx-auto max-w-md text-[14.5px] text-navy-ink/80"><?= e($text ?? '') ?></p>
    <?php if (!empty($action)): ?><div class="mt-5"><?= $action ?></div><?php endif; ?>
  </div>
</div>
