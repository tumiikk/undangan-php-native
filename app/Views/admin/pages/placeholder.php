<?php /** Vars: item (label, href, soon?) */ $soon = !empty($item['soon']); ?>
<div class="mx-auto max-w-3xl">
  <?= component('empty-state', [
      'title' => $soon ? 'Segera hadir' : $item['label'],
      'text' => $soon
          ? 'Bagian "' . $item['label'] . '" tidak ada di mockup dan belum diaktifkan. Menunggu keputusan pemilik proyek (docs/08, keputusan #1).'
          : 'Halaman "' . $item['label'] . '" akan dibuat pada tahap berikutnya (editor: Tahap 3–4, tamu/RSVP/laporan/pengaturan: Tahap 6).',
      'action' => component('button', ['label' => 'Kembali ke Dashboard', 'variant' => 'primary', 'href' => '/admin/dashboard']),
  ]) ?>
</div>
