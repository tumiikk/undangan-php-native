<?php /** Vars: menu, currentPath. Sidebar navy; di bawah lg menjadi drawer. */ ?>
<div class="fixed inset-0 z-40 bg-navy-deep/60 opacity-0 transition lg:hidden pointer-events-none" id="drawer-scrim" data-drawer-close></div>
<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex w-sidebar -translate-x-full flex-col overflow-y-auto bg-navy-bg text-cream-warm shadow-pop transition-transform duration-300 ease-soft scrollbar-thin lg:translate-x-0" aria-label="Navigasi utama">
  <div class="relative px-6 pb-4 pt-7 text-center">
    <button type="button" class="absolute right-3 top-3 rounded-full p-2 text-cream-warm/80 hover:bg-white/10 lg:hidden" data-drawer-close aria-label="Tutup menu"><?= icon('close') ?></button>
    <a href="/admin/dashboard" class="block">
      <span class="block font-display text-[11px] font-semibold uppercase tracking-[.35em] text-gold-text">The Wedding of</span>
      <span class="mt-1 block font-script text-[2.6rem] leading-none text-cream">Ayu &amp; Kevin</span>
    </a>
    <div class="divider mx-auto mt-4 max-w-[10rem]"><span class="divider-diamond"></span></div>
  </div>

  <nav class="flex-1 space-y-1 px-3 pb-6">
    <?php foreach ($menu as $item): ?>
      <?php if (!empty($item['children'])): ?>
        <?php $open = is_active_path($currentPath, $item['href']); ?>
        <div data-group>
          <button type="button" class="nav-link w-full" data-group-toggle aria-expanded="<?= $open ? 'true' : 'false' ?>">
            <?= icon($item['icon']) ?><span class="flex-1 text-left"><?= e($item['label']) ?></span>
            <?= icon('chevron-down', 'h-4 w-4 transition-transform' . ($open ? ' rotate-180' : '')) ?>
          </button>
          <ul class="nav-sub mt-1 space-y-0.5" <?= $open ? '' : 'hidden' ?>>
            <?php foreach ($item['children'] as $c): ?>
              <?php $soon = !empty($c['soon']); $cur = is_active_path($currentPath, $c['href']); ?>
              <li>
                <a class="nav-link py-2 text-[13.5px]" href="<?= $soon ? '#' : e($c['href']) ?>"<?= $cur ? ' aria-current="page"' : '' ?><?= $soon ? ' aria-disabled="true" tabindex="-1"' : '' ?>>
                  <?= icon($c['icon'], 'h-4 w-4') ?><span class="flex-1"><?= e($c['label']) ?></span>
                  <?php if ($soon): ?><span class="rounded-full bg-gold/25 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wider text-gold-soft">Segera</span><?php endif; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php else: ?>
        <?php $cur = is_active_path($currentPath, $item['href'], !empty($item['exact'])); ?>
        <a class="nav-link" href="<?= e($item['href']) ?>"<?= $cur ? ' aria-current="page"' : '' ?>><?= icon($item['icon']) ?><span><?= e($item['label']) ?></span></a>
      <?php endif; ?>
    <?php endforeach; ?>
    <div class="mt-4 border-t border-white/10 pt-4">
      <a class="nav-link text-[13px]" href="/admin/design-system"<?= is_active_path($currentPath, '/admin/design-system') ? ' aria-current="page"' : '' ?>><?= icon('palette') ?><span>Design System</span></a>
    </div>
  </nav>
</aside>
