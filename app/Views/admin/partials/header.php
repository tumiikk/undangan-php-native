<?php /** Vars: title, subtitle?, dummy. Header krim: judul, Preview/Save Draft/Publish, akun. */ ?>
<header class="sticky top-0 z-30 border-b border-gold/40 bg-cream/95 backdrop-blur">
  <div class="relative flex flex-wrap items-center gap-3 px-4 py-3 sm:px-6 lg:px-10">
    <img src="<?= e(asset('images/ornaments/daisy-blue-top-right.png')) ?>" alt="" class="pointer-events-none absolute right-0 top-0 hidden h-full w-auto opacity-25 xl:block">
    <button type="button" class="rounded-field p-2 text-navy-deep hover:bg-gold-soft/50 lg:hidden" data-drawer-open aria-label="Buka menu" aria-controls="sidebar"><?= icon('menu', 'h-6 w-6') ?></button>
    <div class="min-w-0 flex-1">
      <h1 class="truncate font-script text-[2.1rem] leading-tight text-navy-deep sm:text-4xl"><?= e($title ?? '') ?></h1>
      <?php if (!empty($subtitle)): ?><p class="-mt-1 truncate font-display text-[15px] italic text-navy-ink/75"><?= e($subtitle) ?></p><?php endif; ?>
    </div>

    <div class="relative z-10 flex flex-wrap items-center gap-2">
      <?php if (!empty($dummy['draft']['pending'])): ?>
        <span class="badge-belum hidden md:inline-flex" title="Disimpan <?= e($dummy['draft']['saved_at']) ?>">Draft belum dipublish</span>
      <?php endif; ?>
      <?= component('button', ['label' => 'Preview', 'variant' => 'ghost', 'size' => 'sm', 'icon' => 'eye', 'attrs' => ['data-demo' => 'Preview aktif di Tahap 3.']]) ?>
      <?= component('button', ['label' => 'Save Draft', 'variant' => 'secondary', 'size' => 'sm', 'icon' => 'save', 'attrs' => ['data-demo' => 'Save Draft aktif di Tahap 6.']]) ?>
      <?= component('button', ['label' => 'Publish', 'variant' => 'primary', 'size' => 'sm', 'icon' => 'upload', 'attrs' => ['data-modal-open' => 'modal-publish']]) ?>

      <div class="relative" data-dropdown>
        <button type="button" class="flex items-center gap-2 rounded-full border border-gold/50 bg-paper-white py-1 pl-1 pr-3 hover:bg-gold-soft/40" data-dropdown-toggle aria-haspopup="menu" aria-expanded="false">
          <span class="flex h-8 w-8 items-center justify-center rounded-full bg-navy-bg font-display text-sm font-semibold text-cream">A</span>
          <span class="hidden max-w-[9rem] truncate font-label text-[13px] font-semibold text-navy-deep sm:block"><?= e($dummy['admin']['name']) ?></span>
          <?= icon('chevron-down', 'h-4 w-4') ?>
        </button>
        <div class="absolute right-0 mt-2 hidden w-60 rounded-card border border-gold/50 bg-paper-soft p-2 shadow-pop" role="menu" data-dropdown-menu>
          <div class="border-b border-gold/30 px-3 py-2"><p class="font-label text-[13px] font-semibold text-navy-deep"><?= e($dummy['admin']['name']) ?></p><p class="truncate text-[12px] text-navy-ink/70"><?= e($dummy['admin']['email']) ?></p></div>
          <a href="/admin/pengaturan" role="menuitem" class="nav-link !text-navy-ink hover:!bg-gold-soft/50"><?= icon('user', 'h-4 w-4') ?>Akun &amp; pengaturan</a>
          <form method="post" action="/admin/logout"><?= csrf_field() ?><button type="submit" role="menuitem" class="nav-link w-full !text-status-tidak hover:!bg-status-tidak-bg"><?= icon('logout', 'h-4 w-4') ?>Keluar</button></form>
        </div>
      </div>
    </div>
  </div>
</header>
