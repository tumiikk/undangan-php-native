<?php
/** Props: status (hadir|tidak|belum) atau variant=info + label */
$map = ['hadir' => 'Hadir', 'tidak' => 'Tidak Hadir', 'belum' => 'Belum Konfirmasi'];
$status = $status ?? 'info';
echo '<span class="badge-' . e($status) . '">' . e($label ?? ($map[$status] ?? '')) . '</span>';
