# STATUS TAHAP 2 — Design System + Fondasi Dashboard

**Status: SELESAI** (semua 7 langkah urutan kerja tuntas, tidak ada bagian setengah jadi).

## Asumsi default yang dipakai (mudah diganti)
1. Wedding Gift & Music: tampil nonaktif ("Segera") di menu, tidak dibuat.
2. Deteksi perangkat: User-Agent di server + override `?view=desktop|mobile`. Dipakai sekarang hanya untuk Login; landing di Tahap 5.
3. Font berlisensi diganti Google Fonts (Pinyon Script, Cormorant Garamond, Allura), ditandai di `scripts/copy-fonts.js` dan `tailwind.config.js`.
4. Ekspor: CSV (Tahap 6).
5. Typo mockup tidak disalin ke UI dashboard. Judul login memakai "Admin Masuk" (Bahasa Indonesia).
6. Tailwind v3.4.17 (CLI), sesuai instruksi.

## Cara menjalankan (Laragon)
1. Taruh folder di `C:\laragon\www\wedding-invitation-ayu-kevin`, arahkan virtual host/document root ke subfolder `public/` (Laragon auto-vhost: `http://wedding-invitation-ayu-kevin.test`, atur document root ke `public`).
2. `copy .env.example .env` (sesuaikan `APP_URL`).
3. `npm install` lalu `npm run build` (CSS sudah ikut terbuild di ZIP; font WOFF2 juga sudah ada).
4. Buka `/admin/login`, `/admin/dashboard`, `/admin/design-system`.
   Login desktop vs mobile: otomatis lewat User-Agent, atau paksa `/admin/login?view=mobile`.
5. Pengembangan tanpa Apache (opsional): `php -S 127.0.0.1:8000 -t public public/index.php`.

## File dibuat
- Root: `package.json`, `tailwind.config.js` (token), `tailwind.{admin,desktop,mobile}.config.js`, `.htaccess` (cadangan shared hosting), `.env.example` (diperbarui)
- `scripts/copy-fonts.js`, `resources/css/{fonts,admin,invitation-desktop,invitation-mobile}.css`
- Build: `public/assets/css/{admin,invitation-desktop,invitation-mobile}.css` (tiga file terpisah), `public/assets/fonts/*.woff2` (23 file, lokal)
- `public/index.php`, `public/.htaccess`, `public/uploads/.htaccess` (matikan eksekusi skrip)
- `app/bootstrap.php`; Core: `Env, Session, Request, Response, View, Router`
- `app/Helpers/functions.php` (`e()`, `asset()`, `component()`, `csrf_field()`, `icon()`, `is_mobile()`); `app/Config/{menu,icons,dummy}.php`
- `routes/web.php`, `routes/admin.php`
- Views admin: `layouts/{app,auth}`, `partials/{sidebar,header}`, `auth/{login-desktop,login-mobile}`, `pages/{dashboard,design-system,placeholder}`, 11 komponen di `components/`, `errors/{404,500}`
- `public/assets/js/admin/admin.js` (drawer, submenu, dropdown, modal, tab, toast, toggle password)

## File diubah/dihapus
Diubah: `.env.example`. Tidak ada file Tahap 1 yang dihapus atau ditimpa (`docs/01–08`, aset gambar utuh).

## Kriteria selesai
1. `npm install && npm run build` berhasil (diuji; peringatan "No utility classes" untuk CSS desktop/mobile wajar karena template landing baru ada di Tahap 5).
2. `/admin/design-system` menampilkan token (warna, font, bentuk) dan semua komponen.
3. Login (desktop + mobile terpisah) dan Dashboard memakai palet, font, ornamen, bingkai mockup.
4. Tiga CSS terpisah: admin, invitation-desktop, invitation-mobile.
5. Tidak ada rahasia di `public/`; `.env.example` ada; `.env` tidak ikut ZIP.
6. Diuji lewat browser headless: semua rute 200 (404 untuk rute tak dikenal), drawer, submenu, modal, tab, toast, toggle password, CSRF placeholder.

## Sengaja ditunda
- Autentikasi sungguhan, middleware auth (rute `/admin/*` sementara terbuka), database/migrasi, CRUD, upload → Tahap 6
- Editor section + Live Preview → Tahap 3–4; landing desktop/mobile → Tahap 5
- Tombol Preview/Save Draft/Publish hanya tampilan (toast demo)
- Wedding Gift & Music (menunggu keputusan #1)
- Font asli berlisensi (Amoresa Aged, TT Ramillas, Stoic), Alice, Cardo, The Seasons: belum dibundel; ditambah saat landing dikerjakan (Tahap 5)

## Catatan teknis
- Kelas komponen yang dirakit dinamis di PHP (`btn-*`, `badge-*`, `alert-*`) di-safelist di `tailwind.config.js`. Tambahkan varian baru di sana.
- Halaman placeholder otomatis dibuat dari `app/Config/menu.php`; saat halaman asli dibuat, tandai `'ready' => true` dan daftarkan rutenya.
- Langkah lanjut: Tahap 3 (editor Cover + Live Preview dengan data dummy).
