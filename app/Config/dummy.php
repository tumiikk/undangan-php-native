<?php
// DATA DUMMY Tahap 2. Diganti query database di Tahap 6.
return [
    'site' => ['title' => 'Ayu & Kevin', 'date' => 'Rabu, 30 September 2026'],
    'admin' => ['name' => 'Admin Ayu & Kevin', 'email' => 'admin@ayu-kevin.test'],
    'draft' => ['pending' => true, 'sections' => ['Cover', 'Couple', 'Events'], 'saved_at' => '9 Nov 2026, 14:20'],
    'stats' => [
        'total_tamu' => 120,
        'sudah_rsvp' => 84,
        'hadir' => 61,
        'tidak_hadir' => 23,
        'belum' => 36,
        'ucapan' => 58,
        'estimasi_orang' => 142,
    ],
    'rsvp_harian' => [
        ['label' => 'Sen', 'v' => 6], ['label' => 'Sel', 'v' => 11], ['label' => 'Rab', 'v' => 9],
        ['label' => 'Kam', 'v' => 17], ['label' => 'Jum', 'v' => 14], ['label' => 'Sab', 'v' => 19], ['label' => 'Min', 'v' => 8],
    ],
    'tamu_terbaru' => [
        ['nama' => 'Keluarga Bapak Hendra', 'status' => 'hadir', 'waktu' => '2 jam lalu'],
        ['nama' => 'Dinda Pratiwi', 'status' => 'hadir', 'waktu' => '5 jam lalu'],
        ['nama' => 'Rizky Maulana', 'status' => 'tidak', 'waktu' => 'Kemarin'],
        ['nama' => 'Siti Aisyah', 'status' => 'hadir', 'waktu' => 'Kemarin'],
        ['nama' => 'Bayu Anggara', 'status' => 'belum', 'waktu' => '—'],
    ],
];
