/* JS dashboard admin (tanpa dependensi). Drawer, grup menu, dropdown, modal, tab, toast, toggle password. */
(function () {
  'use strict';
  var $ = function (s, r) { return (r || document).querySelector(s); };
  var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)); };

  /* ---- Toast ---- */
  function toast(text, type) {
    var host = $('#toast-host');
    if (!host) return;
    var el = document.createElement('div');
    el.className = 'toast alert-' + (type || 'info');
    el.setAttribute('role', 'status');
    el.textContent = text;
    host.appendChild(el);
    setTimeout(function () { el.style.transition = 'opacity .3s'; el.style.opacity = '0'; setTimeout(function () { el.remove(); }, 300); }, 3800);
  }
  window.AdminToast = toast;

  /* ---- Drawer sidebar (mobile) ---- */
  var sidebar = $('#sidebar'), scrim = $('#drawer-scrim');
  function drawer(open) {
    if (!sidebar) return;
    sidebar.classList.toggle('-translate-x-full', !open);
    if (scrim) { scrim.classList.toggle('opacity-0', !open); scrim.classList.toggle('pointer-events-none', !open); }
    document.body.style.overflow = open ? 'hidden' : '';
  }
  $$('[data-drawer-open]').forEach(function (b) { b.addEventListener('click', function () { drawer(true); }); });
  $$('[data-drawer-close]').forEach(function (b) { b.addEventListener('click', function () { drawer(false); }); });

  /* ---- Grup submenu ---- */
  $$('[data-group-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var list = btn.parentElement.querySelector('ul');
      var open = btn.getAttribute('aria-expanded') !== 'true';
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (list) list.hidden = !open;
      var chev = btn.querySelector('svg:last-child');
      if (chev) chev.classList.toggle('rotate-180', open);
    });
  });
  $$('#sidebar [aria-disabled="true"]').forEach(function (a) { a.addEventListener('click', function (e) { e.preventDefault(); toast('Fitur ini segera hadir.', 'info'); }); });

  /* ---- Dropdown akun ---- */
  $$('[data-dropdown]').forEach(function (dd) {
    var t = $('[data-dropdown-toggle]', dd), m = $('[data-dropdown-menu]', dd);
    t.addEventListener('click', function (e) { e.stopPropagation(); var o = m.classList.toggle('hidden') === false; t.setAttribute('aria-expanded', o ? 'true' : 'false'); });
    document.addEventListener('click', function (e) { if (!dd.contains(e.target)) { m.classList.add('hidden'); t.setAttribute('aria-expanded', 'false'); } });
  });

  /* ---- Modal ---- */
  var lastFocus = null;
  function openModal(id) { var m = document.getElementById(id); if (!m) return; lastFocus = document.activeElement; m.hidden = false; var f = $('button', m); if (f) f.focus(); }
  function closeModal(m) { m.hidden = true; if (lastFocus) lastFocus.focus(); }
  $$('[data-modal-open]').forEach(function (b) { b.addEventListener('click', function () { openModal(b.getAttribute('data-modal-open')); }); });
  $$('[data-modal]').forEach(function (m) {
    m.addEventListener('click', function (e) { if (e.target === m) closeModal(m); });
    $$('[data-modal-close]', m).forEach(function (b) { b.addEventListener('click', function () { closeModal(m); }); });
    $$('[data-modal-confirm]', m).forEach(function (b) { b.addEventListener('click', function () { closeModal(m); toast('Demo Tahap 2: aksi belum fungsional (aktif di Tahap 6).', 'info'); }); });
  });
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    $$('[data-modal]').forEach(function (m) { if (!m.hidden) closeModal(m); });
    drawer(false);
  });

  /* ---- Tab ---- */
  $$('[data-tabs]').forEach(function (wrap) {
    var tabs = $$('[data-tab]', wrap), panels = $$('[data-tab-panel]', wrap);
    function show(id) {
      tabs.forEach(function (t) { t.setAttribute('aria-selected', t.getAttribute('data-tab') === id ? 'true' : 'false'); });
      panels.forEach(function (p) { p.hidden = p.getAttribute('data-tab-panel') !== id; });
    }
    tabs.forEach(function (t, i) {
      t.addEventListener('click', function () { show(t.getAttribute('data-tab')); });
      t.addEventListener('keydown', function (e) {
        var n = e.key === 'ArrowRight' ? i + 1 : e.key === 'ArrowLeft' ? i - 1 : null;
        if (n === null) return; n = (n + tabs.length) % tabs.length; tabs[n].focus(); show(tabs[n].getAttribute('data-tab'));
      });
    });
  });

  /* ---- Tombol demo & toast uji ---- */
  $$('[data-demo]').forEach(function (b) { b.addEventListener('click', function () { toast(b.getAttribute('data-demo'), 'info'); }); });
  $$('[data-toast]').forEach(function (b) { b.addEventListener('click', function () { toast(b.getAttribute('data-toast-text') || 'Contoh notifikasi.', b.getAttribute('data-toast')); }); });

  /* ---- Toggle password ---- */
  $$('[data-toggle-password]').forEach(function (b) {
    b.addEventListener('click', function () {
      var inp = document.getElementById(b.getAttribute('data-toggle-password'));
      if (!inp) return;
      var show = inp.type === 'password';
      inp.type = show ? 'text' : 'password';
      b.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
      b.setAttribute('aria-pressed', show ? 'true' : 'false');
    });
  });

  /* ---- Notifikasi flash dari server ---- */
  var fl = $('[data-flash]');
  if (fl) toast(fl.getAttribute('data-flash'), fl.getAttribute('data-flash-type') || 'info');
})();
