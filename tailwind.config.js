/**
 * TOKEN DESAIN (sumber: docs/03-design-system.md). Dipakai bersama oleh tiga build.
 * Setiap build punya config sendiri (tailwind.admin|desktop|mobile.config.js) yang hanya
 * menentukan `content`, sehingga CSS desktop dan mobile tidak saling memuat.
 */
module.exports = {
  content: ['./app/Views/admin/**/*.php', './public/assets/js/admin/**/*.js'],
  // Kelas komponen yang dirakit dinamis di PHP (mis. 'btn-' . $variant) harus di-safelist.
  safelist: [
    { pattern: /^btn-(primary|secondary|navy|danger|ghost|sm|block)$/ },
    { pattern: /^badge-(hadir|tidak|belum|info)$/ },
    { pattern: /^alert-(info|success|warning|error)$/ },
    'card-cream',
  ],
  theme: {
    extend: {
      colors: {
        navy: { bg: '#2F486D', ink: '#2C4B6D', deep: '#16244D', night: '#1E3354' },
        cream: { DEFAULT: '#F5F0E6', warm: '#F1E4D3' },
        paper: { DEFAULT: '#F2EEEB', white: '#FFFFFF', soft: '#FBF8F3' },
        gold: { DEFAULT: '#C5AD7A', text: '#C2AD82', dark: '#7A6200', soft: '#E9DDBF' },
        quote: { ink: '#3F4962' },
        field: { line: '#8FA9C6', fill: '#FDFCFA' },
        status: {
          hadir: '#2E6B4F', 'hadir-bg': '#E3F0E8',
          tidak: '#8A2F3B', 'tidak-bg': '#F6E3E5',
          belum: '#7A6200', 'belum-bg': '#F6EDCF',
        },
      },
      fontFamily: {
        // SUBSTITUSI FONT: ganti di sini + scripts/copy-fonts.js bila font asli tersedia.
        script: ['"Pinyon Script"', 'cursive'],          // pengganti Amoresa Aged
        name: ['Allura', 'cursive'],                      // nama pengantin / pengganti Stoic
        display: ['"Cormorant Garamond"', 'Georgia', 'serif'], // pengganti TT Ramillas
        label: ['Fraunces', 'Georgia', 'serif'],
        body: ['Fraunces', 'Georgia', 'serif'],
        serif: ['"Playfair Display"', 'Georgia', 'serif'],
        form: ['"DM Serif Display"', 'Georgia', 'serif'],
      },
      borderRadius: { card: '16px', field: '12px', frame: '20px' },
      boxShadow: {
        card: '0 2px 4px rgba(22,36,77,.06), 0 10px 28px -8px rgba(22,36,77,.18)',
        soft: '0 1px 2px rgba(22,36,77,.08), 0 4px 14px -4px rgba(22,36,77,.14)',
        gold: 'inset 0 0 0 1px #C5AD7A, inset 0 0 0 4px #FBF3E2, inset 0 0 0 5px #D9C79C',
        pop: '0 18px 50px -12px rgba(22,36,77,.45)',
      },
      backgroundImage: {
        paper: "url('/assets/images/ui/paper-peach-shadow.png')",
      },
      spacing: { 'section-y': '6rem', 'section-y-sm': '3.5rem', sidebar: '17rem' },
      transitionTimingFunction: { soft: 'cubic-bezier(.22,.61,.36,1)' },
    },
  },
  plugins: [],
};
