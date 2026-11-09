# 02 — Manifest Aset Visual

Sumber utama aset: **PDF desktop** (resolusi paling tinggi). PDF mobile dikecilkan (page 240×480 pt) dan berisi gambar yang sama dengan resolusi lebih rendah, jadi aset mobile **tidak** dipakai sebagai sumber; template mobile memakai file yang sama dengan crop/posisi berbeda lewat pengaturan visual.

## Cara ekstraksi
- Semua foto di PDF ternyata **objek gambar terpisah** (bukan hasil crop halaman). Foto disalin sebagai **JPEG asli** tanpa kompresi ulang.
- Elemen UI (panel, frame, tombol, garis pembatas) berupa PNG ber-alpha; alpha digabung dari SMask PDF.
- Ornamen garis (daisy, bingkai renda, buket tulip, merpati, cupid) di PDF berupa **vektor**, bukan gambar. Ini di-render 300 DPI per kluster dan background-nya dibuang jadi transparan (`_reference/raw-extract/desktop-vector-crops/` berisi semua hasil kluster mentah).
- Seluruh hasil mentah ada di `_reference/raw-extract/` (desktop 95 file, mobile 93 file, nama: `p<halaman>_o<id objek>_<WxH>`).

## Batas kualitas (jujur)
- PDF yang dikirim bernama `compressed`; foto di dalamnya sudah berukuran kecil (kebanyakan 400–900 px, hanya 2 foto >1600 px). Foto galeri akan terlihat buram jika ditampilkan full-width di layar besar. Untuk kualitas final, sebaiknya foto asli dari kamera diganti **dengan nama file yang sama** (tidak mengubah kode).
- Dua gambar di halaman 11 galeri ("Our Moments") dan love story sudah **berbingkai/ber-polaroid di dalam PDF**; frame-nya diekstrak terpisah (`ui/frame-polaroid-*`).
- Foto venue (pantai/tebing) dan foto buket pink terlihat seperti **foto stok/placeholder**, bukan foto venue sebenarnya.

## Belum terekstrak bersih (perlu keputusan)
| Elemen | Alasan |
|---|---|
| Sketsa angsa (section Quote) | Vektor, menumpuk dengan teks dan foto; hasil crop tercampur background |
| Dua burung line-art (section Groom) | Menumpuk dengan teks "Kevin" |
| Cincin emas (Save the Date) | Menumpuk dengan kartu "Akad nikah" |
| Bingkai oval ornamen (Closing) | Background foto berubah-ubah |
| Ornamen daisy di Resepsi/Love Story | Sama dengan daisy yang sudah diekstrak (dipakai ulang, tinggal mirror/rotate) |
| Divider flourish emas, kupu-kupu, pesawat | Sudah ada sebagai raster di `ui/` |
Solusi: minta file ornamen asli (SVG/PNG transparan) dari Canva, atau saya isolasi manual di Tahap 2 dengan menyembunyikan layer di atasnya.

## Daftar aset siap pakai (`public/assets/images/`)
| File | Ukuran | Jenis |
|---|---|---|
| `backgrounds/cover-couple.jpg` | 1665x941 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `backgrounds/hands-tinted-blue.jpg` | 639x288 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `backgrounds/lake-tulips-mountain.jpg` | 736x414 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `backgrounds/quote-bg-couple-back.jpg` | 2250x1266 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `backgrounds/unri-lake-bw.jpg` | 800x221 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `backgrounds/unri-lake-strip.jpg` | 330x99 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `couple/bride.jpg` | 479x653 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `couple/couple-bw.jpg` | 836x471 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `couple/couple-sunset-portrait.jpg` | 358x471 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `couple/groom.jpg` | 505x744 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/bouquet-pink.jpg` | 497x274 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/couple-lake-vertical.jpg` | 502x811 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/first-meet-road.jpg` | 900x770 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/hands-color.jpg` | 639x288 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/moment-bench.jpg` | 900x596 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/moment-bridge.jpg` | 900x631 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/moment-grass.jpg` | 865x559 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/moment-sitting-grass.jpg` | 685x788 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/moment-standing-tree.jpg` | 532x1085 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/story-bench.jpg` | 745x649 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/story-bridge.jpg` | 625x576 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/story-lake-stones.jpg` | 792x619 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/story-sunset-steps.jpg` | 190x447 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/swans-dark.jpg` | 442x280 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/swans-strip-2.jpg` | 736x195 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/swans-strip.jpg` | 576x224 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/venue-akad-beach.jpg` | 393x690 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `gallery/venue-resepsi-beach.jpg` | 736x944 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `maps/static-osm-placeholder.jpg` | 751x439 | foto (JPEG asli dari PDF, tanpa re-encode) |
| `ornaments/cupid-gold.png` | 1098x839 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ornaments/daisy-blue-bottom-left.png` | 1105x720 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ornaments/daisy-blue-top-right.png` | 1105x720 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ornaments/daisy-gold-bottom-left.png` | 1105x720 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ornaments/daisy-gold-top-right.png` | 1105x720 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ornaments/doves-ribbon-gold.png` | 1376x919 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ornaments/floral-watercolor-left.png` | 206x608 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ornaments/floral-watercolor-right.png` | 206x608 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ornaments/hydrangea-corner-bottom.png` | 200x197 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ornaments/hydrangea-corner-top.png` | 220x314 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ornaments/lace-frame-portrait.png` | 1603x2044 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ornaments/orchid-white.png` | 370x409 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ornaments/tulip-bouquet-white.png` | 1261x1476 | vektor di-render 300 DPI, background dibuang jadi transparan |
| `ui/button-cream.png` | 732x158 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/button-frame.png` | 412x113 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/button-konfirmasi.png` | 503x91 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/button-login.png` | 498x99 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/button-white.png` | 390x113 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/card-cream-small.png` | 504x293 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/card-quote-cream.png` | 1029x766 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/card-white-b.png` | 504x270 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/card-white.png` | 458x315 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/cover-glass-panel.png` | 1235x990 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/diamond-small-a.png` | 41x40 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/diamond-small-b.png` | 41x40 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/divider-butterfly.png` | 663x45 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/divider-diamond-b.png` | 275x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/divider-diamond-c.png` | 321x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/divider-diamond-d.png` | 280x40 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/divider-diamond.png` | 412x45 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/divider-rings.png` | 550x68 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/envelope-back.png` | 1133x1119 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/envelope-front.png` | 1133x1119 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/field-login-a.png` | 518x99 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/field-login-b.png` | 518x99 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/field-white-a.png` | 436x158 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/field-white-b.png` | 436x90 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/field-white-c.png` | 436x90 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/field-white-textarea.png` | 436x203 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/flourish-gold-top.png` | 732x68 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/frame-arch.png` | 687x878 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/frame-polaroid-a.png` | 504x270 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/frame-polaroid-b.png` | 504x293 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/frame-rounded-a.png` | 320x428 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/frame-rounded-b.png` | 344x428 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/icon-envelope.png` | 69x68 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/icon-eye.png` | 40x20 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/icon-lock.png` | 40x60 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/icon-mail-small.png` | 40x60 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/icon-plane.png` | 69x68 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-dashed-a.png` | 755x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-dashed-b.png` | 733x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-dashed-c.png` | 344x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-dashed-d.png` | 321x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-dashed-e.png` | 1052x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-dotted.png` | 983x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-gold-a.png` | 321x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-gold-b.png` | 321x23 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-long.png` | 1920x45 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-plane.png` | 824x68 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/line-vertical-gold.png` | 23x270 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/login-panel.png` | 638x941 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/panel-beige.png` | 595x405 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/panel-cream-rounded.png` | 1600x968 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/paper-airmail.png` | 1400x840 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/paper-peach-shadow-b.png` | 1611x1560 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/paper-peach-shadow.png` | 1493x1545 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/seal-ribbon.png` | 206x248 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/seal-small.png` | 138x135 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/timeline-dot-a.png` | 69x68 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/timeline-dot-b.png` | 69x68 | raster dari PDF (PNG, alpha digabung dari SMask) |
| `ui/timeline-dot-c.png` | 69x68 | raster dari PDF (PNG, alpha digabung dari SMask) |

## Font
Font di PDF hanya tersedia sebagai **subset embedded** (tidak lengkap dan lisensinya tidak jelas), jadi **tidak diekstrak**. Lihat `03-design-system.md` untuk pemetaan dan pengganti.
