<?php
/** Katalog komponen & token (docs/03). Semua teks Bahasa Indonesia. */
$colors = [
    ['navy-bg', '#2F486D', 'Sidebar, background gelap'], ['navy-ink', '#2C4B6D', 'Teks body, judul script'],
    ['navy-deep', '#16244D', 'Judul, nama, angka'], ['cream', '#F5F0E6', 'Latar area konten'],
    ['cream-warm', '#F1E4D3', 'Panel, teks di atas navy'], ['paper', '#F2EEEB', 'Kartu, panel kaca'],
    ['gold', '#C5AD7A', 'Ornamen, garis, bingkai'], ['gold-text', '#C2AD82', 'Teks emas'],
    ['gold-dark', '#7A6200', 'Teks tombol lokasi'], ['quote-ink', '#3F4962', 'Teks ayat'],
];
$fonts = [
    ['font-script', 'Pinyon Script', 'Judul script', 'Pengganti Amoresa Aged', 'Ayu & Kevin', 'text-4xl'],
    ['font-name', 'Allura', 'Nama pengantin', 'Pengganti Stoic / CAGenerated', 'Ayu & Kevin', 'text-4xl'],
    ['font-display', 'Cormorant Garamond', 'Subjudul, heading', 'Pengganti TT Ramillas', 'Hari bahagia yang akan selalu dikenang', 'text-2xl'],
    ['font-label', 'Fraunces', 'Label, tombol, UI', 'Sama dengan mockup', 'BUKA UNDANGAN · Konfirmasi Kehadiran', 'text-lg'],
    ['font-serif', 'Playfair Display', 'Ayat, angka, alamat', 'Sama dengan mockup', 'Rabu, 30 September 2026', 'text-xl'],
    ['font-form', 'DM Serif Display', 'Label form', 'Sama dengan mockup', 'Nama · Ucapan', 'text-xl'],
];
ob_start(); ?>
<div class="grid gap-4 md:grid-cols-2">
  <?= component('field', ['name' => 'ds_nama', 'label' => 'Nama', 'placeholder' => 'Nama lengkap tamu', 'help' => 'Contoh teks bantuan.']) ?>
  <?= component('field', ['name' => 'ds_email', 'label' => 'Email', 'type' => 'email', 'value' => 'salah-format', 'error' => 'Format email belum benar.']) ?>
  <?= component('field', ['name' => 'ds_status', 'label' => 'Pilih Kehadiran', 'type' => 'select', 'options' => ['' => 'Pilih salah satu', 'hadir' => 'Hadir', 'tidak' => 'Tidak Hadir']]) ?>
  <?= component('field', ['name' => 'ds_soft', 'label' => 'Gaya login (soft)', 'soft' => true, 'placeholder' => 'Email / Nama pengguna']) ?>
  <div class="md:col-span-2"><?= component('field', ['name' => 'ds_ucapan', 'label' => 'Ucapan', 'type' => 'textarea', 'placeholder' => 'Tulis doa dan ucapan']) ?></div>
</div>
<?php $tabForm = ob_get_clean();

ob_start(); ?>
<div class="flex flex-wrap items-center gap-3">
  <?= component('button', ['label' => 'Buka Undangan', 'variant' => 'primary']) ?>
  <?= component('button', ['label' => 'Lihat Lokasi', 'variant' => 'secondary']) ?>
  <?= component('button', ['label' => 'Masuk', 'variant' => 'navy']) ?>
  <?= component('button', ['label' => 'Hapus Tamu', 'variant' => 'danger', 'icon' => 'trash']) ?>
  <?= component('button', ['label' => 'Tombol ghost', 'variant' => 'ghost']) ?>
  <?= component('button', ['label' => 'Nonaktif', 'variant' => 'primary', 'attrs' => ['disabled' => true]]) ?>
  <?= component('button', ['label' => 'Kecil', 'variant' => 'secondary', 'size' => 'sm']) ?>
</div>
<?php $tabButton = ob_get_clean();

ob_start(); ?>
<div class="flex flex-wrap items-center gap-3">
  <?= component('badge', ['status' => 'hadir']) ?>
  <?= component('badge', ['status' => 'tidak']) ?>
  <?= component('badge', ['status' => 'belum']) ?>
  <?= component('badge', ['status' => 'info', 'label' => 'Draft']) ?>
</div>
<?php $tabBadge = ob_get_clean();

$section = static fn (string $id, string $title, string $html) =>
    '<section id="' . e($id) . '" class="mt-10"><h2 class="font-script text-4xl text-navy-deep">' . e($title) . '</h2>'
    . component('divider', ['class' => 'my-3 max-w-xs']) . $html . '</section>';
?>
<nav class="flex flex-wrap gap-2 text-[13px]" aria-label="Isi halaman">
  <?php foreach (['warna' => 'Warna', 'tipografi' => 'Tipografi', 'bentuk' => 'Bentuk & Bayangan', 'tombol' => 'Tombol', 'form' => 'Form', 'kartu' => 'Kartu & Badge', 'tabel' => 'Tabel & Halaman', 'tab' => 'Tab', 'umpan' => 'Modal, Alert, Toast', 'ornamen' => 'Divider & Empty State'] as $id => $l): ?>
    <a class="btn-secondary btn-sm" href="#<?= $id ?>"><?= e($l) ?></a>
  <?php endforeach; ?>
</nav>

<?php
// ---- Warna ----
ob_start(); ?>
<div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
  <?php foreach ($colors as [$name, $hex, $use]): ?>
    <div class="overflow-hidden rounded-card border border-gold/40 bg-paper-white shadow-soft">
      <div class="h-20" style="background:<?= e($hex) ?>"></div>
      <div class="p-3"><p class="font-label text-[13px] font-semibold text-navy-deep"><?= e($name) ?></p><p class="font-serif text-[12.5px] text-navy-ink"><?= e($hex) ?></p><p class="mt-1 text-[12px] text-navy-ink/70"><?= e($use) ?></p></div>
    </div>
  <?php endforeach; ?>
</div>
<?php echo $section('warna', 'Warna', ob_get_clean());

// ---- Tipografi ----
ob_start(); ?>
<div class="space-y-3">
  <?php foreach ($fonts as [$cls, $fam, $peran, $cat, $contoh, $size]): ?>
    <div class="card flex flex-wrap items-center justify-between gap-4">
      <div class="min-w-[12rem]"><p class="font-label text-[13px] font-semibold text-navy-deep"><?= e($cls) ?> · <?= e($fam) ?></p><p class="text-[12.5px] text-navy-ink/70"><?= e($peran) ?> — <?= e($cat) ?></p></div>
      <p class="<?= e($cls . ' ' . $size) ?> text-navy-deep"><?= e($contoh) ?></p>
    </div>
  <?php endforeach; ?>
</div>
<p class="mt-3 text-[13px] text-navy-ink/75">Font dihosting lokal (WOFF2) di <code>public/assets/fonts/</code>. Substitusi font berlisensi diatur di satu tempat: <code>scripts/copy-fonts.js</code> + <code>tailwind.config.js</code> (<code>fontFamily</code>).</p>
<?php echo $section('tipografi', 'Tipografi', ob_get_clean());

// ---- Bentuk ----
ob_start(); ?>
<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
  <?php foreach ([['rounded-field', 'radius field · 12px', 'shadow-soft'], ['rounded-card', 'radius card · 16px', 'shadow-card'], ['rounded-frame', 'radius frame · 20px', 'shadow-pop'], ['rounded-field', 'bingkai emas ganda', 'shadow-gold']] as [$r, $l, $sh]): ?>
    <div class="<?= e("$r $sh") ?> flex h-28 items-center justify-center bg-paper-soft p-3 text-center font-label text-[13px] text-navy-deep"><?= e($l) ?></div>
  <?php endforeach; ?>
</div>
<p class="mt-3 text-[13px] text-navy-ink/75">Spacing mengikuti skala Tailwind (basis 4px). Token tambahan: <code>section-y</code> (6rem), <code>section-y-sm</code> (3.5rem), <code>sidebar</code> (17rem).</p>
<?php echo $section('bentuk', 'Bentuk & Bayangan', ob_get_clean());

echo $section('tombol', 'Tombol', $tabButton);
echo $section('form', 'Field Form', '<div class="card">' . $tabForm . '</div>');

// ---- Kartu & badge ----
ob_start(); ?>
<div class="grid gap-4 md:grid-cols-3">
  <?= component('card', ['title' => 'Kartu standar', 'body' => '<p>Latar putih lembut dengan garis emas tipis.</p>']) ?>
  <?= component('card', ['title' => 'Kartu krim', 'variant' => 'cream', 'body' => '<p>Dipakai untuk panel sekunder.</p>', 'footer' => component('button', ['label' => 'Aksi', 'variant' => 'secondary', 'size' => 'sm'])]) ?>
  <article class="stat-card"><div class="stat-value">120</div><p class="stat-label">Kartu statistik</p></article>
</div>
<div class="mt-5"><?= $tabBadge ?></div>
<?php echo $section('kartu', 'Kartu & Badge Status', ob_get_clean());

// ---- Tabel & pagination ----
ob_start();
echo component('table', ['columns' => ['Nama', 'Status', 'Jumlah'], 'rows' => [
    ['Keluarga Bapak Hendra', ['html' => component('badge', ['status' => 'hadir'])], '4'],
    ['Rizky Maulana', ['html' => component('badge', ['status' => 'tidak'])], '0'],
    ['Bayu Anggara', ['html' => component('badge', ['status' => 'belum'])], '—'],
]]);
echo '<div class="mt-4">' . component('pagination', ['page' => 2, 'pages' => 5, 'base' => '#hal-']) . '</div>';
echo $section('tabel', 'Tabel & Pagination', ob_get_clean());

// ---- Tab ----
echo $section('tab', 'Tab', component('tabs', ['id' => 'contoh', 'items' => [
    ['id' => 'konten', 'label' => 'Konten', 'html' => '<p>Panel Konten (dipakai editor Tahap 3).</p>'],
    ['id' => 'desktop', 'label' => 'Tampilan Desktop', 'html' => '<p>Pengaturan visual desktop.</p>'],
    ['id' => 'mobile', 'label' => 'Tampilan Mobile', 'html' => '<p>Pengaturan visual mobile.</p>'],
]]));

// ---- Modal, alert, toast ----
ob_start(); ?>
<div class="grid gap-3 md:grid-cols-2">
  <?= component('alert', ['type' => 'info', 'text' => 'Informasi netral untuk admin.']) ?>
  <?= component('alert', ['type' => 'success', 'text' => 'Perubahan berhasil disimpan sebagai draft.']) ?>
  <?= component('alert', ['type' => 'warning', 'title' => 'Perhatian', 'text' => 'Ada perubahan yang belum dipublish.']) ?>
  <?= component('alert', ['type' => 'error', 'text' => 'Gagal menyimpan. Periksa isian Anda.']) ?>
</div>
<div class="mt-4 flex flex-wrap gap-3">
  <?= component('button', ['label' => 'Buka modal konfirmasi', 'variant' => 'primary', 'attrs' => ['data-modal-open' => 'modal-contoh']]) ?>
  <?= component('button', ['label' => 'Toast sukses', 'variant' => 'secondary', 'attrs' => ['data-toast' => 'success', 'data-toast-text' => 'Draft tersimpan.']]) ?>
  <?= component('button', ['label' => 'Toast galat', 'variant' => 'secondary', 'attrs' => ['data-toast' => 'error', 'data-toast-text' => 'Terjadi kesalahan.']]) ?>
</div>
<?= component('modal', ['id' => 'modal-contoh', 'title' => 'Reset draft?', 'text' => 'Draft akan dikembalikan ke versi yang dipublikasikan. Daftar tamu, RSVP, ucapan, dan akun admin tidak terpengaruh.', 'confirmLabel' => 'Ya, reset draft', 'confirmVariant' => 'danger']) ?>
<?php echo $section('umpan', 'Modal Konfirmasi, Alert, Toast', ob_get_clean());

// ---- Divider & empty state ----
ob_start(); ?>
<div class="card"><?= component('divider') ?></div>
<div class="mt-4"><?= component('empty-state', ['title' => 'Belum ada tamu', 'text' => 'Tambahkan tamu pertama untuk membuat tautan undangan personal.', 'action' => component('button', ['label' => 'Tambah Tamu', 'variant' => 'primary', 'icon' => 'plus'])]) ?></div>
<?php echo $section('ornamen', 'Divider & Empty State', ob_get_clean()); ?>
