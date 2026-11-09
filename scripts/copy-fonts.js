/**
 * Menyalin WOFF2 (subset latin) dari paket @fontsource ke public/assets/fonts/
 * dan menulis resources/css/fonts.css. Jalankan: npm run fonts
 *
 * SUBSTITUSI FONT (satu tempat): ubah daftar FONTS di bawah ini.
 *  - Amoresa Aged  -> Pinyon Script   (script judul, berlisensi)
 *  - TT Ramillas   -> Cormorant Garamond (subjudul, berlisensi)
 *  - Stoic         -> Allura
 * Jika font asli sudah dilisensikan, taruh WOFF2 di public/assets/fonts/ dan ganti entri terkait.
 */
const fs = require('fs');
const path = require('path');

const FONTS = [
  { pkg: 'pinyon-script', family: 'Pinyon Script', weights: [400], styles: ['normal'] },
  { pkg: 'allura', family: 'Allura', weights: [400], styles: ['normal'] },
  { pkg: 'cormorant-garamond', family: 'Cormorant Garamond', weights: [400, 500, 600, 700], styles: ['normal', 'italic'] },
  { pkg: 'fraunces', family: 'Fraunces', weights: [400, 500, 600, 700], styles: ['normal'] },
  { pkg: 'playfair-display', family: 'Playfair Display', weights: [400, 500, 600, 700], styles: ['normal', 'italic'] },
  { pkg: 'dm-serif-display', family: 'DM Serif Display', weights: [400], styles: ['normal'] },
];

const root = path.resolve(__dirname, '..');
const out = path.join(root, 'public/assets/fonts');
fs.mkdirSync(out, { recursive: true });
let css = '/* DIHASILKAN oleh scripts/copy-fonts.js — jangan edit manual */\n';
for (const f of FONTS) {
  for (const style of f.styles) {
    for (const w of f.weights) {
      const name = `${f.pkg}-latin-${w}-${style}.woff2`;
      const src = path.join(root, 'node_modules/@fontsource', f.pkg, 'files', name);
      if (!fs.existsSync(src)) { console.warn('lewati (tidak ada):', name); continue; }
      fs.copyFileSync(src, path.join(out, name));
      css += `@font-face{font-family:'${f.family}';font-style:${style};font-weight:${w};font-display:swap;src:url('/assets/fonts/${name}') format('woff2');}\n`;
    }
  }
}
fs.writeFileSync(path.join(root, 'resources/css/fonts.css'), css);
console.log('Font disalin ke', out);
