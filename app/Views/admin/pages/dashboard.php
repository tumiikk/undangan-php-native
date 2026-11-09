<?php
/** Vars: dummy */
$s = $dummy['stats'];
$respons = (int) round($s['sudah_rsvp'] / max(1, $s['total_tamu']) * 100);
$cards = [
    ['Total Tamu', $s['total_tamu'], 'users'],
    ['Sudah RSVP', $s['sudah_rsvp'], 'mail'],
    ['Hadir', $s['hadir'], 'check'],
    ['Tidak Hadir', $s['tidak_hadir'], 'close'],
    ['Belum Konfirmasi', $s['belum'], 'clock'],
    ['Total Ucapan', $s['ucapan'], 'heart'],
    ['Tingkat Respons', $respons . '%', 'chart'],
];
// Donut: hadir / tidak / belum
$parts = [['Hadir', $s['hadir'], '#2E6B4F'], ['Tidak Hadir', $s['tidak_hadir'], '#8A2F3B'], ['Belum Konfirmasi', $s['belum'], '#C5AD7A']];
$tot = max(1, array_sum(array_column($parts, 1)));
$r = 15.9155; $offset = 25; // mulai dari atas
$maxBar = max(array_column($dummy['rsvp_harian'], 'v'));
?>
<?php if (!empty($dummy['draft']['pending'])): ?>
  <div class="mb-6 flex flex-wrap items-center justify-between gap-3 rounded-card border border-gold bg-status-belum-bg px-5 py-4">
    <div class="flex items-start gap-3 text-status-belum">
      <?= icon('alert', 'mt-0.5 h-5 w-5 shrink-0') ?>
      <p class="text-[14.5px]"><strong class="font-semibold">Ada perubahan draft yang belum dipublish.</strong>
        Bagian: <?= e(implode(', ', $dummy['draft']['sections'])) ?> · disimpan <?= e($dummy['draft']['saved_at']) ?>.</p>
    </div>
    <?= component('button', ['label' => 'Publish sekarang', 'variant' => 'primary', 'size' => 'sm', 'attrs' => ['data-modal-open' => 'modal-publish']]) ?>
  </div>
<?php endif; ?>

<section aria-label="Ringkasan" class="grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-4">
  <?php foreach ($cards as $i => [$label, $val, $ic]): ?>
    <article class="stat-card <?= $i === 6 ? 'col-span-2 md:col-span-1' : '' ?>">
      <div class="flex items-start justify-between"><span class="stat-value"><?= e($val) ?></span><span class="relative z-10 text-gold"><?= icon($ic, 'h-6 w-6') ?></span></div>
      <p class="stat-label"><?= e($label) ?></p>
    </article>
  <?php endforeach; ?>
</section>

<div class="mt-6 grid gap-6 lg:grid-cols-5">
  <section class="card lg:col-span-2" aria-labelledby="h-donut">
    <h2 id="h-donut" class="card-title">Status Kehadiran</h2>
    <p class="text-[13.5px] text-navy-ink/70">Proporsi dari <?= e($s['total_tamu']) ?> undangan</p>
    <div class="mt-4 flex flex-col items-center gap-5 sm:flex-row lg:flex-col xl:flex-row">
      <svg viewBox="0 0 42 42" class="h-44 w-44 shrink-0 -rotate-0" role="img" aria-label="Diagram donat status kehadiran">
        <circle cx="21" cy="21" r="<?= $r ?>" fill="none" stroke="#F1E4D3" stroke-width="5.5"/>
        <?php foreach ($parts as [$l, $v, $c]): $pct = $v / $tot * 100; ?>
          <circle cx="21" cy="21" r="<?= $r ?>" fill="none" stroke="<?= $c ?>" stroke-width="5.5" stroke-dasharray="<?= round($pct, 2) ?> <?= round(100 - $pct, 2) ?>" stroke-dashoffset="<?= round($offset, 2) ?>"/>
          <?php $offset -= $pct; ?>
        <?php endforeach; ?>
        <text x="21" y="20.5" text-anchor="middle" font-family="Playfair Display, serif" font-size="7" font-weight="600" fill="#16244D"><?= e($respons) ?>%</text>
        <text x="21" y="26" text-anchor="middle" font-size="2.8" fill="#2C4B6D" letter-spacing=".3">RESPONS</text>
      </svg>
      <ul class="w-full space-y-2.5 text-[14px]">
        <?php foreach ($parts as [$l, $v, $c]): ?>
          <li class="flex items-center justify-between gap-3"><span class="flex items-center gap-2"><span class="h-3 w-3 rounded-sm" style="background:<?= $c ?>"></span><?= e($l) ?></span><strong class="font-serif text-navy-deep"><?= e($v) ?></strong></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <section class="card lg:col-span-3" aria-labelledby="h-bar">
    <h2 id="h-bar" class="card-title">RSVP Masuk per Hari</h2>
    <p class="text-[13.5px] text-navy-ink/70">7 hari terakhir (data contoh)</p>
    <div class="mt-5 flex h-52 items-end gap-3 border-b border-gold/50 px-1" role="img" aria-label="Grafik batang RSVP per hari">
      <?php foreach ($dummy['rsvp_harian'] as $b): $h = round($b['v'] / $maxBar * 100); ?>
        <div class="flex h-full flex-1 flex-col items-center justify-end gap-1">
          <span class="font-serif text-[12px] font-semibold text-navy-deep"><?= e($b['v']) ?></span>
          <div class="w-full max-w-[2.75rem] rounded-t-md bg-gradient-to-t from-navy-bg to-navy-ink/70" style="height:<?= $h ?>%"></div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-2 flex gap-3 px-1">
      <?php foreach ($dummy['rsvp_harian'] as $b): ?><span class="flex-1 text-center font-label text-[12px] text-navy-ink/75"><?= e($b['label']) ?></span><?php endforeach; ?>
    </div>
  </section>
</div>

<section class="mt-6" aria-labelledby="h-recent">
  <div class="mb-3 flex items-center justify-between"><h2 id="h-recent" class="card-title">Respons Terbaru</h2>
    <a href="/admin/rsvp" class="font-label text-[13px] font-semibold text-navy-ink underline decoration-gold underline-offset-4">Lihat semua</a></div>
  <?php
  $rows = [];
  foreach ($dummy['tamu_terbaru'] as $t) {
      $rows[] = [$t['nama'], ['html' => component('badge', ['status' => $t['status']])], $t['waktu']];
  }
  echo component('table', ['columns' => ['Nama Tamu', 'Status', 'Waktu'], 'rows' => $rows]);
  ?>
</section>
