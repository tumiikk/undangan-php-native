# 04 — Struktur Folder Final (PHP Native modular)

```
wedding-invitation-ayu-kevin/
├── app/
│   ├── Core/            Router, Request, Response, View, Database(PDO), Session, Csrf, Env, Container sederhana
│   ├── Controllers/
│   │   ├── Public/      InvitationController, RsvpController
│   │   └── Admin/       AuthController, DashboardController, ContentController, GuestController,
│   │                    RsvpAdminController, ReportController, SettingsController, MediaController, PublishController
│   ├── Models/          Admin, Guest, Rsvp, SectionContent, Media, Setting
│   ├── Services/        InvitationViewModelBuilder, ContentService (draft/publish), GuestLinkService,
│   │                    UploadService, ReportService/CsvExporter, DeviceDetector
│   ├── Middleware/      AuthMiddleware, CsrfMiddleware, GuestOnlyMiddleware, PublishedOnlyMiddleware
│   ├── Helpers/         e() escape, url(), asset(), format_date(), validators
│   ├── Config/          app.php, database.php, sections.php (skema field tiap section)
│   └── Views/
│       ├── invitation/
│       │   ├── desktop/ index.php + sections/ (cover, note-of-love, quote, blessing, bride, groom, happiest-day,
│       │   │            akad, prepare, resepsi, moments, story-intro, love-story, rsvp, closing)
│       │   ├── mobile/  struktur sama, template terpisah (+ music.php jika section Music diaktifkan)
│       │   └── shared/  hanya partial non-visual (meta, JSON-LD); TIDAK ada markup section bersama
│       └── admin/ layouts/, auth/, pages/(dashboard, content/*, guests, rsvp, reports, settings), partials/
├── routes/              web.php, admin.php
├── database/            migrations/ (SQL berurutan), seeds/ (admin awal + default content)
├── resources/css/       invitation-desktop.css, invitation-mobile.css, admin.css  (3 entry Tailwind)
├── resources/js/        sumber JS jika perlu bundling ringan
├── public/              ← satu-satunya folder yang menjadi document root
│   ├── index.php        front controller
│   ├── .htaccess        clean URL → index.php
│   ├── assets/{css,js/{desktop,mobile,admin},fonts,images/{couple,gallery,backgrounds,ornaments,ui,maps}}
│   └── uploads/         .htaccess: matikan eksekusi PHP
├── storage/             logs, cache, sessions (di luar public)
├── .env / .env.example  kredensial DB & rahasia (di luar public)
├── package.json, tailwind.config.js   (Node hanya untuk kompilasi Tailwind)
└── docs/
```
Keputusan kunci:
- **3 build Tailwind terpisah** (desktop, mobile, admin) supaya CSS desktop dan mobile benar-benar terpisah dan mobile tidak memuat CSS desktop.
- **Section pemisah** (note-of-love, blessing, happiest-day, prepare, story-intro) memakai satu skema data “title card” tetapi dua template (desktop/mobile) masing-masing.
- Shared hosting: jika document root tidak bisa diarahkan ke `public/`, disediakan `.htaccess` root yang meneruskan ke `public/` dan memblokir `app/`, `storage/`, `.env`.
- Folder kosong sudah dibuat di zip ini (berisi `.gitkeep`); belum ada kode aplikasi.
