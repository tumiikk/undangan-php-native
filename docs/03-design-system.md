# 03 — Rancangan Design System

## Palet (nilai asli dibaca dari objek PDF)
| Token | Hex | Pemakaian |
|---|---|---|
| `navy-bg` | `#2F486D` | Background section gelap, background halaman admin login |
| `navy-ink` | `#2C4B6D` | Judul script di section krim, ornamen daisy biru, teks body di section krim |
| `navy-deep` | `#16244D` | Nama “Ayu & Kevin”, teks tanggal cover, judul kartu |
| `cream` | `#F5F0E6` | Background section terang (title card) |
| `cream-warm` | `#F1E4D3` | Teks di atas navy, panel beige kolase |
| `paper` | `#F2EEEB` / `#FFFFFF` | Kartu, field, panel kaca |
| `gold` | `#C5AD7A` | Ornamen emas, divider, judul di atas foto |
| `gold-text` | `#C2AD82` | Teks emas (Bride & Groom, Prepare For The Party) |
| `gold-dark` | `#7A6200` | Teks tombol LIHAT LOKASI (Resepsi) |
| `quote-ink` | `#3F4962` | Teks ayat |

Overlay foto cover/quote/closing = **navy ±55–65% di atas foto** (efek duotone biru).

## Tipografi (dipetakan dari font embedded di PDF)
| Peran | Font di mockup | Ukuran desktop | Ketersediaan / pengganti |
|---|---|---|---|
| Judul script besar | **Amoresa Aged** (78–97 pt) | 60–97 pt | Bukan Google Font, kemungkinan font berlisensi/Canva. **Perlu konfirmasi lisensi.** Pengganti terdekat gratis: *Pinyon Script* atau *Great Vibes* |
| Nama pengantin (Ayu) | **Allura** | 119 pt | Google Font |
| Nama Kevin | “CAGenerated” (varian Allura hasil Canva) | 107 pt | Pakai Allura |
| Subjudul title card | **TT Ramillas** (49–54 pt) | 49–54 pt | Berlisensi; pengganti: *Cormorant Garamond* atau *Gilda Display* |
| Label cover (THE WEDDING OF, tombol, login) | **Fraunces 9pt** | 18–32 pt | Google Font |
| Tanggal cover | **Alice** | 27 pt | Google Font |
| Ayat, alamat, timeline | **Playfair Display** | 20–33 pt | Google Font |
| Kutipan italic, undangan | **Cardo** Italic/Regular/Bold | 26–33 pt | Google Font |
| Nama orang tua, deskripsi | **Cormorant Garamond** Medium/Bold | 30–35 pt | Google Font |
| “Akad nikah” | **Stoic** (75 pt) | 75 pt | Tidak jelas sumbernya; pengganti: Allura |
| Tahun timeline | **The Seasons** Bold | 27–35 pt | Gratis (Kimmy Design), cek lisensi |
| Label form RSVP | **DM Serif Display** | 19–23 pt | Google Font |
Font akan di-host lokal (`public/assets/fonts/`, WOFF2) agar jalan di shared hosting tanpa CDN.

## Spacing, bentuk, komponen
- Skala spacing Tailwind (4 px base) + token section: `section-y` desktop 96–128 px, mobile 56–72 px.
- Sudut: kartu **rounded sedang (12–20 px)** dengan border tipis emas/biru muda; panel cover memakai **sudut terpotong (notch)**; foto: persegi, **arch**, **oval**, atau bingkai renda.
- Tombol utama: kotak krim dengan border emas ganda (cover, “BUKA UNDANGAN”), kartu putih untuk “LIHAT LOKASI”, tombol navy bergaris dengan ornamen ◆ untuk Login, tombol biru muda untuk “KONFIRMASI”.
- Field form: putih, rounded, border biru muda 2 px, label tebal di dalam kiri-atas.
- Divider: garis emas dengan ◆ di tengah, kupu-kupu, pesawat, cincin.
- Efek: tekstur kertas, bayangan lembut pada amplop dan kartu, foto polaroid.

## Dashboard memakai sistem yang sama
Background navy `#2F486D` untuk sidebar; area konten krim `#F5F0E6`; judul halaman Amoresa/Pinyon (kecil, hanya H1), body Cormorant/Fraunces; tombol dan field sama dengan login mockup. Ornamen (daisy) hanya di header dan empty state, bukan di setiap kartu supaya tetap fungsional.
