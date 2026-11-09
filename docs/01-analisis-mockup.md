# 01 — Analisis Mockup, Daftar Section, Perbandingan Desktop vs Mobile

Kedua PDF masing-masing **16 halaman**, urutan section **identik**. Lebar desktop 1440 pt dengan tinggi per halaman bervariasi (412–1500 pt); mobile 240 pt lebar × 480 pt (tinggi bervariasi).

## Karakter visual
Nuansa **navy blue + krim + emas pudar**, bergaya vintage-romantis: tipografi script berbintik (distressed), ornamen garis (daisy, tulip, merpati, cupid, angsa), bingkai renda, tekstur kertas, foto berwarna duotone biru pada cover/quote/closing. Bagian bergantian **gelap (navy)** dan **terang (krim)** sehingga terasa seperti lembaran-lembaran.

## Daftar section (urut dari atas)
| # | Key | Judul di mockup | Isi | Tipe |
|---|---|---|---|---|
| 1 | `cover` | The Wedding of Ayu & Kevin | Tanggal "Rabu, 30 September 2026", "Kepada Yth. Tamu Undangan", tombol BUKA UNDANGAN | Konten |
| 2 | `note-of-love` | A little note of love | “Sebuah kisah, sebuah janji, selamanya.” | Pemisah (title card) |
| 3 | `quote` | (tanpa judul) | QS. Ar-Rum: 21 | Konten |
| 4 | `blessing` | Yang Berbahagina *(typo di mockup)* | “Semoga kita dalam Lindungan NYA.” | Pemisah |
| 5 | `bride` | Bride & Groom — Ayu | Foto, nama, “Putri dari Bapak Ayu & Ibu Ayu”, kalimat pembuka | Konten |
| 6 | `groom` | Kevin | Foto, nama, “Putra dari Bapak Kevin & Ibu Kevin” | Konten |
| 7 | `happiest-day` | The Happiest Day | “Langkah Awal Kami” | Pemisah |
| 8 | `akad` | Save the Date | Undangan, “Akad nikah”, Rabu 30 Sept 2026 pukul 08:00–selesai, kolase foto, alamat (Edelweiss Wedding Hall, Bogor), peta, tombol LIHAT LOKASI | Konten (Event 1) |
| 9 | `prepare` | Prepare For The Party | “Hari bahagia yang akan selalu dikenang” | Pemisah |
| 10 | `resepsi` | Resepsi | Rabu 30 Sept 2026 pukul 08:00–selesai, foto venue, alamat (Jakarta Selatan), peta, LIHAT LOKASI | Konten (Event 2) |
| 11 | `moments` | Our Moments | Galeri kolase 8–10 foto, “Our First Meet”, “Yang sudah kami lalui bersama” | Konten (Gallery) |
| 12 | `story-intro` | Let See How This Story Begins *(typo)* | “Hari bahagia yang akan selalu dikenang” + foto oval B/W | Pemisah |
| 13 | `love-story` | Our Love Story | Timeline 2024 Pertemuan, 2025 Taaruf, 2026 Komitmen + foto | Konten |
| 14 | `rsvp` | Pray For Us | Form (Nama, Konfirmasi Kehadiran, Pilih Kehadiran, Ucapan) + daftar ucapan | Konten (RSVP+Ucapan) |
| 15 | `closing` | Hohon Doa Restu *(typo: Mohon)* | “Terimakasih Atas do’a dan kehadiran Bapak/Ibu” + foto oval | Konten |
| 16 | — | Admin Login | Halaman login admin (bukan bagian undangan) | Halaman admin |

**Section pemisah** (2, 4, 7, 9, 12) hanya judul script + satu kalimat + ornamen/foto. Disarankan dikelola sebagai satu tipe editor generik “Title Card”.

## Perbedaan desktop vs mobile
| Aspek | Desktop | Mobile |
|---|---|---|
| Cover | Panel kaca 1 baris lebar, ikon amplop di tombol | Panel kaca portrait penuh, judul bertumpuk 3 baris, tanpa ikon |
| Title card | Banner sangat lebar (±3.5:1), judul 1 baris, foto kecil di tepi | Dipadatkan jadi kartu hampir persegi; judul pecah 2 baris (“Yang / Berbahagina”), foto di bawah |
| Quote | Kartu lebar 1 blok + sketsa angsa di belakang teks | Kartu portrait, teks lebih banyak baris, angsa di bawah teks (tidak menimpa) |
| Bride / Groom | Foto bingkai renda kiri, nama + orang tua kanan, buket tulip | Tersusun vertikal; Bride & Groom dalam satu halaman panjang |
| Save the Date | 2 kolom: teks kiri, kolase kanan, peta di baris bawah | 1 kolom: teks, kolase, alamat, peta, tombol |
| Resepsi | 2 kolom (arch foto + peta di kiri, kartu di kanan) | 1 kolom: kartu dulu, lalu arch, alamat, peta |
| Gallery | Kolase 2 kolom | 1 kolom tumpuk + polaroid |
| Love Story | Timeline kiri, foto kanan | Timeline, teks lalu foto di bawahnya |
| RSVP | Form & daftar ucapan **berdampingan** | Form di atas, daftar ucapan di bawah (amplop terpisah) |
| Admin login | Burung+pita kiri, cupid kanan, ikon amplop/gembok/mata | Hanya cupid, tanpa ikon |

Kesimpulan: perbedaannya struktural, bukan sekadar breakpoint, jadi pemisahan template desktop dan mobile sesuai permintaan memang tepat.

## Temuan di mockup yang perlu dikonfirmasi (lihat juga `08-keputusan-terbuka.md`)
1. **Typo**: “Yang Berbahagina”, “Hohon Doa Restu” (maksudnya *Mohon*), “Let See How This Story Begins” (*Let's see*).
2. **Alamat dan waktu Akad vs Resepsi**: Akad di Jl. Raya Bojongkoneng, Klapanunggal, Bogor; Resepsi di Jl. Anggrek No. 12, Kebayoran Lama, Jakarta Selatan, padahal nama venue sama (“Edelweiss Wedding Hall”), tanggal dan jam **persis sama** (08:00–selesai), dan peta di kedua section memakai tangkapan peta yang sama (bukan lokasi aslinya). Ini terlihat seperti placeholder.
3. **Love Story**: teks 2025 dan 2026 identik (“Akhirnya kami memutuskan…”), juga placeholder.
4. **Nama orang tua**: placeholder (“Bapak Ayu & Ibu Ayu”).
5. **Wedding Gift dan Music tidak ada di mockup**, padahal ada di daftar menu dashboard di prompt.
6. Tanggal 30 September 2026 memang hari **Rabu** (sudah dicek).
