# 05 — Rancangan Dashboard & Navigasi

Layout: **sidebar navy kiri** (collapsible; di mobile jadi drawer) + header krim dengan nama website, tombol **Preview**, **Save Draft**, **Publish**. Mockup tidak punya desain dashboard (hanya halaman Admin Login desktop+mobile), jadi dashboard dirancang baru memakai token `03-design-system.md`.

## Menu
1. **Dashboard**: kartu ringkasan (Total tamu, Sudah RSVP, Hadir, Tidak hadir, Belum konfirmasi, Total ucapan, Tingkat respons) + donut status kehadiran + grafik batang RSVP per hari + indikator “ada perubahan draft belum dipublish”.
2. **Konten Undangan** (submenu, urutan = urutan undangan): Cover · Introduction (title card) · Quote/Ayat · Couple (Bride & Groom) · Events (Akad + Resepsi) · Gallery · Love Story · Wedding Gift* · Music* · Closing. Title card lain (Happiest Day, Prepare, Story Intro, Blessing) berada dalam satu grup “Pemisah”.
3. **Daftar Tamu**: tabel + cari + filter status, tambah/ubah/hapus, salin tautan `/undangan/{token}`, buat ulang token, nonaktifkan tautan, impor CSV (opsional, minta persetujuan).
4. **RSVP & Ucapan** (satu modul): tabel nama, status, jumlah hadir, ucapan, waktu; cari/filter; sembunyikan atau hapus ucapan.
5. **Laporan**: total undangan, respons, hadir, tidak hadir, belum konfirmasi, estimasi kehadiran (jumlah orang), persentase respons; ekspor **CSV** (XLSX hanya jika hosting mendukung library ringan).
6. **Pengaturan**: judul website, favicon, SEO (title, description, OG image), status publikasi, pengaturan RSVP (buka/tutup, maks. jumlah orang), pengaturan ucapan (tampilkan publik/moderasi), zona waktu, akun admin (ganti password).
*Wedding Gift & Music: tidak ada di mockup, lihat keputusan terbuka.

## Editor per section (bukan form seragam)
| Section | Kontrol khusus |
|---|---|
| Cover | foto background, opacity overlay, teks tanggal, label tamu default, label tombol |
| Title card | judul script, subjudul, foto kecil, ornamen on/off |
| Quote | teks ayat, sumber, foto background, ornamen sisi, sketsa angsa on/off |
| Couple | nama, nama orang tua, foto + crop/zoom per perangkat, bingkai (renda/oval), ornamen |
| Events | per acara: nama, tanggal/jam, nama tempat, alamat, koordinat peta, link Google Maps, foto venue, urutan |
| Gallery | upload multi-foto, urutan drag, pilih layout kolase, caption |
| Love Story | item timeline (tahun, judul, teks, foto) tambah/hapus/urut |
| Closing | judul, teks, foto oval |
Semua section: **tab Konten · tab Tampilan Desktop · tab Tampilan Mobile** (font, ukuran, alignment, jarak, posisi foto, background, warna dari palet terbatas). Tidak ada edit HTML/CSS mentah.

## Live Preview
Panel kanan (desktop) memuat `/admin/preview/{section}?device=desktop|mobile` di `iframe`; toggle perangkat (frame 1440 atau 390 px); preview satu section atau seluruh undangan. Form mengirim perubahan via `postMessage` (instan, tanpa simpan) dan Save Draft menyimpan ke DB. Di mobile admin: tab **Editor | Preview**.

## Draft / Publish
`Save Draft` → `Preview` → `Publish` (konfirmasi) · `Reset Draft` (konfirmasi; hanya menyalin ulang versi published ke draft; **tidak menyentuh** tamu, token, RSVP, ucapan, akun).
