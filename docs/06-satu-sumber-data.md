# 06 — Mekanisme Satu Sumber Data (Desktop & Mobile)

**Prinsip:** konten disimpan sekali per section; yang berbeda per perangkat hanya blok `style`.

## Skema database (ringkas, MySQL/PDO)
| Tabel | Kolom penting |
|---|---|
| `admins` | id, username, email, password_hash, last_login |
| `section_contents` | id, section_key, **version** (`draft`/`published`), **content_json**, **style_desktop_json**, **style_mobile_json**, enabled, sort_order, updated_at · UNIQUE(section_key, version) |
| `media` | id, path, original_name, mime, size, width, height, alt, created_at |
| `guests` | id, name, phone(opsional), group, **token** UNIQUE, link_active, created_at |
| `rsvps` | id, **guest_id UNIQUE**, status (`hadir`/`tidak_hadir`), attendees, message, is_visible, submitted_at, updated_at |
| `settings` | key, value (site title, favicon, SEO, publish status, timezone, rsvp on/off) |
Status “Belum Konfirmasi” = tamu **tanpa baris** di `rsvps`. UNIQUE(guest_id) menjamin satu RSVP aktif per tamu (update, bukan duplikat). Tidak ada tabel guestbook.

## Contoh `section_contents`
```
content_json        → {"groom":{"name":"Kevin","parents":"Bapak Kevin & Ibu Kevin","photo_id":12}, ...}   ← SATU KALI
style_desktop_json  → {"name_font_size":107,"photo_position":"right","frame":"lace","gap":48}
style_mobile_json   → {"name_font_size":64,"photo_position":"top","frame":"lace","gap":24}
```
Foto selalu mereferensikan `media.id`; template desktop dan mobile hanya memilih crop/ukuran berbeda.

## Alur render
```
Request /  atau /undangan/{token}
  → DeviceDetector (User-Agent, bisa dipaksa ?view=mobile|desktop, disimpan di cookie)
  → InvitationViewModelBuilder::build(token, 'published')   ← SATU view-model
       { couple, events[], gallery[], story[], rsvp config, guestName, settings,
         style: { desktop:{...}, mobile:{...} } }
  → View::render("invitation/{device}/index", $vm)
       └ include sections/*.php (masing-masing template memakai data yang sama)
```
Admin Preview memanggil builder yang sama dengan `version='draft'`. Jadi mengganti nama mempelai sekali otomatis muncul di desktop, mobile, dan preview.

## Draft → Publish
- Edit/Save Draft: tulis baris `version='draft'`.
- Publish: dalam satu **transaksi**, salin semua baris draft ke `published` (upsert).
- Reset Draft: salin `published` → `draft`.
- Pengunjung publik hanya membaca `published`.
