# 08 — Keputusan Terbuka (butuh jawaban sebelum Tahap 2–3)

1. **Wedding Gift dan Music** tidak ada di mockup. Opsi: (a) tidak dibuat, (b) dibuat sebagai section opsional **nonaktif secara default** dengan desain mengikuti gaya yang ada. Saran: (b).
2. **Alamat/jam Akad vs Resepsi**: apakah nama venue, alamat Jakarta/Bogor, dan jam yang sama itu placeholder? Perlu data asli. Peta di mockup hanya screenshot; implementasi peta: embed OpenStreetMap/Leaflet (tanpa API key) atau tombol Google Maps saja?
3. **Deteksi perangkat**: berdasarkan User-Agent di server (disarankan, template benar-benar terpisah; perlu `Vary: User-Agent`) atau lebar layar di JS (ada kedipan)? Tablet mengikuti yang mana?
4. **RSVP dari `/` tanpa token**: boleh (otomatis membuat tamu baru), atau hanya tamu bertoken yang boleh RSVP? Prompt meminta RSVP terhubung ke data tamu.
5. **Typo mockup** (“Berbahagina”, “Hohon”, “Let See”): diperbaiki atau dipertahankan persis?
6. **Font Amoresa Aged / TT Ramillas / Stoic**: punya lisensi? Jika tidak, pakai pengganti di `03-design-system.md`.
7. **Kualitas foto**: PDF `compressed`; bersedia mengirim foto asli untuk menggantikan file bernama sama?
8. **XLSX**: cukup CSV (aman di shared hosting) atau wajib XLSX?
