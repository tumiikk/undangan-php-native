<?php
/**
 * Menu sidebar admin (persis sesuai docs/05).
 * 'soon' => true  : item nonaktif/"segera" (Wedding Gift & Music, keputusan terbuka #1).
 * 'ready' => true : halaman sudah ada di Tahap 2; selain itu mengarah ke halaman placeholder.
 */
return [
    ['label' => 'Dashboard', 'icon' => 'home', 'href' => '/admin/dashboard', 'ready' => true, 'exact' => true],
    [
        'label' => 'Konten Undangan', 'icon' => 'heart', 'href' => '/admin/konten',
        'children' => [
            ['label' => 'Cover', 'icon' => 'cover', 'href' => '/admin/konten/cover'],
            ['label' => 'Introduction', 'icon' => 'text', 'href' => '/admin/konten/introduction'],
            ['label' => 'Quote/Ayat', 'icon' => 'quote', 'href' => '/admin/konten/quote'],
            ['label' => 'Couple', 'icon' => 'couple', 'href' => '/admin/konten/couple'],
            ['label' => 'Events', 'icon' => 'calendar', 'href' => '/admin/konten/events'],
            ['label' => 'Gallery', 'icon' => 'gallery', 'href' => '/admin/konten/gallery'],
            ['label' => 'Love Story', 'icon' => 'story', 'href' => '/admin/konten/love-story'],
            ['label' => 'Wedding Gift', 'icon' => 'gift', 'href' => '/admin/konten/wedding-gift', 'soon' => true],
            ['label' => 'Music', 'icon' => 'music', 'href' => '/admin/konten/music', 'soon' => true],
            ['label' => 'Closing', 'icon' => 'closing', 'href' => '/admin/konten/closing'],
        ],
    ],
    ['label' => 'Daftar Tamu', 'icon' => 'users', 'href' => '/admin/tamu'],
    ['label' => 'RSVP dan Ucapan', 'icon' => 'mail', 'href' => '/admin/rsvp'],
    ['label' => 'Laporan', 'icon' => 'chart', 'href' => '/admin/laporan'],
    ['label' => 'Pengaturan', 'icon' => 'settings', 'href' => '/admin/pengaturan'],
];
